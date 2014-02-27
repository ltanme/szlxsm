<link type="text/css" href="<?php echo base_path().path_to_theme();?>/css/workroom_css.css" rel="Stylesheet" />
<link type="text/css" href="<?php echo base_path().path_to_theme();?>/css/workroom_album.css" rel="Stylesheet" />
<SCRIPT language="javascript" type="text/javascript" src="<?php echo base_path().path_to_theme();?>/js/sinaflash.js"></SCRIPT>
<SCRIPT language="javascript" type="text/javascript" src="<?php echo base_path().path_to_theme();?>/js/heiphoto.js"></SCRIPT>

 
<table width="100%" border="0" cellspacing="0" cellpadding="0" height="100%">
  <tr>
    <td valign="top">
        <div class="text_bt">
    	<div class="text_bt_title">
    	 <?php 
              print_r($workroom_list[0]->title);
         ?> 
        </div>
        <div class="text_bt_title_right">
            <div class="ecCont">
                <div id="ecbFullScreen" title="全屏浏览">
                    <div class="buttonCont" id="fullScreenFlash"></div>
                </div>
                <div id="ecbSpeed">
                    <div class="buttonCont1" id="ecbSpeedInfo">5秒</div>
                </div>
                <div id="ecbPre" title="上一张">
                	<div class="ecbPre_mz"></div>
                </div>
                <div id="ecbPlay">
                    <div class="play" id="ecpPlayStatus"></div>
                </div>
                <div id="ecbNext" title="下一张">
                	<div class="ecbNext_mz"></div>
                </div>
                <div id="ecbMode" title="列表模式(tab)">
                	<div class="ecbMode_mz"></div>
                </div>
                <div id="ecbModeReturn" title="返回幻灯模式(tab)" style="display:none;">
                	<div class="ecbModeReturn_mz"></div>
                </div>
                <div id="ecbLine">
                    <div class="buttonCont"></div>
                </div>
                
              <!-- 速度条 begin -->
                <div id="SpeedBox">
                    <div id="SpeedCont">
                        <div id="SpeedSlide"></div>
                        <div id="SpeedNonius"></div>
                    </div>
                </div>
              <!-- 速度条 end -->
            </div>
      
        </div>
    </div>
    
    <div style="display:none"><SPAN id="txtTitle"></SPAN><SPAN id="total"><SPAN class="cC00"></SPAN></SPAN></div>
    <!--/////////////////////////////////////////////////////////////////////////////-->
  <div id="wrap">
    <div class="pic">
      <!--相册代码开始-->      
      <div id="eFramePic">
      	<!--/大图显示区-->
        <div id="efpBigPic">
          <div id="efpClew"></div>
          <div id="d_BigPic"></div>
          <div class="arrLeft1" id="efpLeftArea" title="上一张"></div>
          <div class="arrRight1" id="efpRightArea" title="下一张"></div>
          <div id="endSelect">
            <div id="endSelClose"></div>
            <div class="bg"></div>
            <div class="E_Cont">
              <P>您已经浏览完所有图片</P>
              <P>
              <A id="rePlayBut" href="javascript:void(0)">重新播放</A>
              <A id="nextPicsBut" href="javascript:void(0)">播放下一图集</A>
              </P>
            </div>
          </div>
          <!-- endSelect end -->
        </div>
        
        <!--/作品介绍 相关链接-->
        <div id="efpTxt">
        	<div class="others"> 
            </div>
        	<span> 
			</span>
        	<h2 id="d_picTit"></h2>
        	<div id="d_picTime"></div>
        	<div id="d_picIntro"></div>
        </div>
        <!--作品介绍 相关链接/作品缩略图-->
        <div id="efpPicList">
        	<!--/上一个图集-->
          <div id="efpPreGroup" style="display:none;">
            <div id="efpPrePic">
              <div id="efpPreTxt">&lt;&lt;上一图集</div>
              <a href='#'>没有上一个图集了</a>
            </div>
          </div>
          <!--上一个图集/上-->
          <div id="efpListLeftArr"></div>
          <!--上/中间缩略图部分-->
          <div id="efpPicListCont"></div>
          <!--中间缩略图部分/下-->
          <div id="efpListRightArr"></div>
          <!--下/下一个图集-->
          <div id="efpNextGroup" style="display:none;">
            <div id="efpNextPic">
            	<div id="efpPreTxt">下一图集&gt;&gt;</div>
				<a href='#'></a>
            </div>
          </div>
          <!--下一个图集/-->
        </div>
        <!--缩略图/-->
      </div>
      <div id="ePicList"><!--列表模式--></div>
      
      <div id="eData" style="DISPLAY: none">
	   <!--中间缩略图片 第一段为大图，第二段和三段为小图/-->
	   
       <div id="eData" style="DISPLAY: none">
	   <!--中间缩略图片 第一段为大图，第二段和三段为小图/-->
	     
		
		 
		 
<?php
	     foreach($workroom_list as $key=>$value){
?> 
	          	  <dl><dt><dd><?php echo file_create_url($value->uri); ?><dd>
			      <?php echo _photos_l($value->uri);?><dd>
			      <?php echo _photos_l($value->uri);?><dd>
			      <dd><div></div><div></div><dd><dd>1</dd></dl> 
<?php
	     }
?>
 
  
		 
      </div>
		  
      </div>
      <SCRIPT language="javascript" type="text/javascript">
          <!--//--><![CDATA[//><!--
          var dataInfo = {
              title : "<?php print_r($workroom_list[0]->title);?>"
          };
          function echoFocus(){
              var flashPic = "",flashTxt = "";
              var newHref;
              var datas = sina.$('eData').getElementsByTagName('dl');
              for(var i=0;i<datas.length;i++){
                  //try{
                      var title,pic,middlePic,smallPic,datetime,intro,commUrl;
                      title = datas[i].getElementsByTagName('dt');
                      if(title){
                          title = title[0].innerHTML;
                      }else{
                          title = 'null';
                      };
                      var info = datas[i].getElementsByTagName('dd');
                      if(info){
                          pic = info[0].innerHTML;
                          middlePic = info[1].innerHTML;
                          smallPic = info[2].innerHTML;
                          datetime = info[3].innerHTML;
                          intro = info[4].innerHTML;
                          commUrl = info[5].getElementsByTagName('a');
                          imageId = info[6].innerHTML;
                          commUrl = '';
          
                      };
                      epidiascope.add({
                                      src : pic,
                                      lowsrc_b : middlePic,
                                      lowsrc_s : smallPic,
                                      date : datetime,
                                      title : title,
                                      text : intro,
                                      comment : commUrl,
                                      id : imageId
                                  });
                      if(flashPic != ""){flashPic += "|"};
                      flashPic += encodeURIComponent(pic);
                      
                      if(flashTxt != ""){flashTxt += "|"};
                      flashTxt += encodeURIComponent(title) + "#" + encodeURIComponent(intro.replace(/<.*?>/g,'')); 
                  //}catch(e){}
              };
              epidiascope.autoPlay = false;
              epidiascope.init();
              fullFlash(flashTxt,flashPic);
              
              if(Math.random()<=0.01){
                  epidiascope.stop();
              };
          };
          function fullFlash(txt,pic){
              var flashurl = "<?php echo base_path().path_to_theme();?>/images/photo.swf";
              var fullScreen = new sinaFlash(flashurl, "fullScreenObj", "100%", "100%", "8", "#000000");
              fullScreen.addParam("quality", "best");
              fullScreen.addParam("wmode", "transparent");
              fullScreen.addParam("allowFullScreen", "true");
              fullScreen.addParam("allowScriptAccess","always");
              fullScreen.addVariable("mylinkpic", pic);		
              fullScreen.addVariable("infotxt",dataInfo.title);
              fullScreen.addVariable("mytxt",txt);
              fullScreen.addVariable("fulls_btnx","0");
              fullScreen.addVariable("fulls_btny","0");
              fullScreen.addVariable("fulls_btnalpha","0")
              fullScreen.write("fullScreenFlash");
          };
          function flash_to_js(name){
              name = new String(name);
              var status = name.split("|");
              epidiascope.speedBar.setGrade(status[1]);
              epidiascope.select(parseInt(status[0]));
          };
          function js_to_flash(){
              epidiascope.stop();
              return epidiascope.selectedIndex + "|" + epidiascope.speedBar.grade;
          };
          var sendT = {
              getHeader : function(){
                  return document.getElementById("txtTitle").innerHTML + '-' + document.getElementById("d_picTit").innerHTML;
              },
              getFirstImgSrc : function(){
                  if (document.getElementById("d_BigPic").getElementsByTagName("img")[0]){ 
                      return document.getElementById("d_BigPic").getElementsByTagName("img")[0].src;
                  }else{
                      return null;
                  }
              }
          } 
          echoFocus();
          //--><!]]>
          </SCRIPT>
    </div>
    <!-- /pleft -->
  </div>
  <!--设计师信息-->
        
    </td>
     
  </tr>
</table>
<br/>
<br/>
<br/>
 
 
 
