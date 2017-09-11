<html><head><link href="css/lrtk.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="js/terminator2.2.min.js" async="true"></script><script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="js/koala.min.1.5.js"></script>

<!-- ´úÂë ¿ªÊ¼ -->
</head><body><div id="fsD1" class="focus">
    <div id="D1pic1" class="fPic">
        <div class="fcon" style="display: block;">
            <a href="register.asp" target="_blank"><img src="images/01.jpg" border="0" style="opacity: 0.95;"></a>
        </div>



        <div class="fcon" style="display: none;">
            <img src="images/02.jpg" style="opacity: 1; ">

        </div>



      <div class="fcon" style="display: none;">
            <img src="images/03.jpg" style="opacity: 1; ">

        </div>

    </div>
    <div class="fbg">
    <div class="D1fBt" id="D1fBt">
        <a href="javascript:void(0)" hidefocus="true" target="_self" class="current"><i>1</i></a>
        <a href="javascript:void(0)" hidefocus="true" target="_self" class=""><i>2</i></a>
        <a href="javascript:void(0)" hidefocus="true" target="_self" class=""><i>3</i></a>
    </div>
    </div>
    <span class="prev"></span>
    <span class="next"></span>
</div>
<script type="text/javascript">
	Qfast.add('widgets', { path: "js/terminator2.2.min.js", type: "js", requires: ['fx'] });
	Qfast(false, 'widgets', function () {
		K.tabs({
			id: 'fsD1',   //½¹µãÍ¼°ü¹üid
			conId: "D1pic1",  //** ´óÍ¼Óò°ü¹üid
			tabId:"D1fBt",
			tabTn:"a",
			conCn: '.fcon', //** ´óÍ¼ÓòÅäÖÃclass
			auto: 1,   //×Ô¶¯²¥·Å 1»ò0
			effect: 'fade',   //Ð§¹ûÅäÖÃ
			eType: 'click', //** Êó±êÊÂ¼þ
			pageBt:true,//ÊÇ·ñÓÐ°´Å¥ÇÐ»»Ò³Âë
			bns: ['.prev', '.next'],//** Ç°ºó°´Å¥ÅäÖÃclass
			interval: 3000  //** Í£¶ÙÊ±¼ä
		})
	})
</script>
<!-- ´úÂë ½áÊø --></body></html>