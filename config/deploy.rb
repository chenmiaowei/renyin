# config valid only for Capistrano 3.1
lock '3.5.0'

set :application, 'officeabd'
#set :repo_url, 'git@example.com:me/my_repo.git'
set :scm, :copy
set :exclude_dir, "{.svn,.git,vendor,Gemfile,Gemfile.*,Capfile,SCHILY.*,uploads}"

# Default branch is :master
# ask :branch, proc { `git rev-parse --abbrev-ref HEAD`.chomp }.call

# Default deploy_to directory is /var/www/my_app
set :deploy_to, '/data/website/renyin'

# Default value for :scm is :git
# set :scm, :git

# Default value for :format is :pretty
# set :format, :pretty

# Default value for :log_level is :debug
# set :log_level, :debug

# Default value for :pty is false
# set :pty, true

# Default value for :linked_files is []
# set :linked_files, %w{config/database.yml}

# Default value for linked_dirs is []
# set :linked_dirs, %w{bin log tmp/pids tmp/cache tmp/sockets vendor/bundle public/system}

# Default value for default_env is {}
# set :default_env, { path: "/opt/ruby/bin:$PATH" }
# set :default_env, { path: "~/.rbenv/shims:~/.rbenv/bin:$PATH" }

# Default value for keep_releases is 5

set :format, :pretty
set :log_level, :debug
set :keep_releases, 5



namespace :deploy do
  httpd_user = "apache"
  httpd_group = "apache"

  task :update_source do
    on roles(:all) do
	  puts "\n\n=== Svn update ===\n\n"
	  system "svn update"
	end
  end
  desc 'Restart application'
  task :restart do
    on roles(:all) do
      puts "restart app"
      execute "ln", "-s", "#{shared_path}/wp-content/uploads", "#{current_path}/wp-content/uploads"
      # Your restart mechanism here, for example:
    end
  end

  desc "Update hat"
  task :update_hat do
    on roles(:all) do
      upload!(".htaccess", "#{current_path}")
    end
  end

  desc "export sql"
  task :export_sql do
    sh "/usr/local/mysql/bin/mysqldump -u root wordpress > /Users/air/Downloads/sites/wordpress/archive.sql"
    on roles(:all) do
      execute "cp", "--force", "#{current_path}/wp-config.#{fetch(:environment)}.php", "#{current_path}/wp-config.php"
      #upload!("archive.sql", "#{current_path}")
    end
    sh "rm /Users/air/Downloads/sites/wordpress/archive.sql"
    on roles(:all) do
      #execute "echo", "DROP DATABASE IF EXISTS officeabd", "|", "mysql", "-u", "root", '"--password=128b9103CC"'
      #execute "echo", "CREATE DATABASE IF NOT EXISTS officeabd", "|", "mysql", "-u", "root", '"--password=128b9103CC"'
      #execute "mysql", "-u", "root", '"--password=128b9103CC"', "officeabd", "<", "#{current_path}/archive.sql"
      within current_path do
        execute "wp", "search-replace", "localhost.wordpress.com", "121.40.80.24:8812", "--allow-root"
      end
    end
  end

  desc "Update upload"
  task :update_upload do
    on roles(:all) do
        tar_file = "uploads"
        system "tar -czf upload.tar.gz wp-content/#{tar_file}"

        tmp_file = capture("mktemp")

        upload!("upload.tar.gz", tmp_file)


        execute "mkdir", "-p", "#{shared_path}/#{tar_file}"
        execute :tar, "-xzf", tmp_file, "-C", shared_path
        execute :chmod, "-R", "0744", "#{shared_path}/#{tar_file}"
        execute :chown, "-R", "#{httpd_user}:#{httpd_group}", "#{shared_path}/#{tar_file}"
        execute :rm, tmp_file

        system "rm -rf upload.tar.gz"
    end
  end

  desc "Update theme"
  task :update_theme do
    on roles(:all) do
        tar_file = "zhiguan"
        system "tar -czf upload.tar.gz wp-content/themes/#{tar_file}"

        tmp_file = capture("mktemp")

        upload!("upload.tar.gz", tmp_file)

        #execute "mkdir", "-p", "#{shared_path}/#{tar_file}"
        execute :tar, "-xzf", tmp_file, "-C", shared_path
        #execute :chmod, "-R", "0744", "#{shared_path}/#{tar_file}"
        #execute :chown, "-R", "#{httpd_user}:#{httpd_group}", "#{shared_path}/#{tar_file}"
        execute :rm, tmp_file
        execute "ln", "-sfn", "#{shared_path}/wp-content/themes/#{tar_file}", "/var/www/html/wp-content/themes/#{tar_file}"

        system "rm -rf upload.tar.gz"
    end
  end



  after :publishing, :restart
  after :publishing, :update_hat
  #after :publishing, :export_sql

  after :restart, :clear_cache do
    on roles(:web), in: :groups, limit: 3, wait: 10 do
      # Here we can do anything such as:
      # within release_path do
      #   execute :rake, 'cache:clear'
      # end
    end
  end

end
