<?php
$this->load->model("blog/mdlGeneral");

$this->load->model("blog/mdlVideoSearch");
$theme = $this->mdlGeneral->getTheme();
$search="";
$videoVersion="All";
if(isset($_GET["videoVersion"])) $videoVersion = $_GET["videoVersion"];
if(isset($_GET["post"])) $search = $_GET["post"];


?>

<style>
.upper-wrapper-container{
width:100%;

position:relative;
padding:5px;
}
.upper-wrapper-container button{
font-size:100%;
}
.upper-left-wrapper-container {
float:left;
}
.upper-right-wrapper-container {
float:right;
}
.video-container {position:relative;padding-bottom:56.25%;padding-top:30px;height:0;overflow:hidden;}.video-container iframe, .video-container object, .video-container embed {position:absolute;top:0;left:0;width:100%;height:100%;}

.block{
width:100%;
display:block;
}
  .list-wrapper{
  width:25%;
  }
.right-pane{
width:30%;
}

  .list-wrapper:hover{
  cursor:pointer;
  background:<?=$theme["nBackColor"]?>;
  color:<?=$theme["nForeColor"]?>;
  }
  
.upper-left-wrapper-container button{
padding:3px 0px 3px 3px;border-radius:0px;border-top-left-radius:5px;border-bottom-left-radius:5px;
}
.upper-left-wrapper-container select{
padding:6px 0px 6px 3px;float:right;border-radius:0px;border-top-right-radius:5px;border-bottom-right-radius:5px;
}

</style>

<div class="ui-widget-content">
      <table class="ui-widget-table">
          <tr>
              <td colspan=2>
                  <div class="upper-wrapper-container ui-widget-header">
                      <div class="upper-left-wrapper-container">
                          <button id="list-general-area"><img oncontextmenu='return false;' src="<?=base_url()?>images/system/companyprofile.png"></button>
                          <select id="cboVideoVersion">
                              <?=$this->mdlVideoSearch->getVideoVersion((isset($_GET["videoVersion"])) ? $_GET["videoVersion"] : '')?>
                          </select>
                      </div>
                      <div class="upper-right-wrapper-container">
                          <input id="txtsearch" type="text">
                          <button id="cmdsearch">Search</button>
                      </div>
                      <div style="clear:both"></div>
                  </div>
              </td>
          </tr>
          <tr>
<?php

if(isset($_GET["post"]))
{

    $details = $this->mdlVideoSearch->getFullPostDetails($_GET["post"]);

?>
              
              <td valign=top>
                  <div style="padding-top:10px;">           
                      <div class="video-container"><iframe id="youtubeLoader"  width="630" height="400" src="https://www.youtube.com/embed/x?modestbranding=1&amp;rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe></div>
                  </div>            
              </td>
              <td class="right-pane" style="" valign=top>
              
              <div style="padding-top:10px;width:100%">
              <table border=0 style="width:100%;max-width:300px">
              <tr>
              <td valign=top  style="width:40%;height:80px"><img src="<?=base_url()?>images/data/products/feature images/processc247.png" style="width:100%;height:100%"></td>
              <td valign=top>
              <div class="block"><span style="color:red">Title Here Title Here Title Here Title Here Title Here </span</span></div>
              <div class="block">Sb title here</div>
              <div class="block"><i>By: Sylvster</i></div>
              </td>
              </tr>
              </table>
              </div>
              
              <div style="width:100%">
              <table border=0 style="width:100%;border:1px solid red">
              <tr>
              <td valign=top  style="width:40%;height:80px"><img src="<?=base_url()?>images/data/products/feature images/processc247.png" style="width:100%;max-width:130px;height:100%"></td>
              <td valign=top>
              <div class="block"><span style="color:red">Title Here Title Here Title Here Title Here Title Here</span></div>
              <div class="block">Sb title here</div>
              <div class="block" style="clear:both;font-size:70%"><i><b>Date Published:</b></i> 2014-2-2</div>
              <div class="block"><span style="float:left;font-size:70%"><i><b>By:</b> Sylvster</i></span><span style="float:right;font-size:70%"><i><b>Views:</b>1,213</i></span></div>
              
              </td>
              </tr>
              </table>
              </div>
              
              <div style="">
              <table border=0 style="width:100%;max-width:300px">
              <tr>
              <td valign=top  style="width:40%;height:80px"><img src="<?=base_url()?>images/data/products/feature images/processc247.png" style="width:100%;height:100%"></td>
              <td valign=top>
              <div class="block"><span style="color:red">Title Here Title Here Title Here Title Here Title Here</span></div>
              <div class="block">Sb title here</div>
              <div class="block"><i>By: Sylvster</i></div>
              </td>
              </tr>
              </table>
              </div>
              
              <div style="">
              <table border=0 style="width:100%;max-width:300px">
              <tr>
              <td valign=top  style="width:40%;height:80px"><img src="<?=base_url()?>images/data/products/feature images/processc247.png" style="width:100%;height:100%"></td>
              <td valign=top>
              <div class="block"><span style="color:red">Title Here Title Here Title Here Title Here Title Here</span></div>
              <div class="block">Sb title here</div>
              <div class="block"><i>By: Sylvster</i></div>
              </td>
              </tr>
              </table>
              </div>
              
              <div style="">
              <table border=0 style="width:100%;max-width:300px">
              <tr>
              <td valign=top  style="width:40%;height:80px"><img src="<?=base_url()?>images/data/products/feature images/processc247.png" style="width:100%;height:100%"></td>
              <td valign=top>
              <div class="block"><span style="color:red">Title Here Title Here Title Here Title Here Title Here</span></div>
              <div class="block">Sb title here</div>
              <div class="block"><i>By: Sylvster</i></div>
              </td>
              </tr>
              </table>
              </div>
              </td>

      <?php } else { ?>
              <td>
                  <style>
                  .header-wrapper-box{line-height:2;color:<?=$theme["nBackColor"]?>;}
                  .footer-wrapper-box:hover{cursor:pointer;border:1px solid <?=$theme["hForeColor"]?>;background:<?=$theme["nBorderColor"]?>;}
                  .footer-wrapper-box{padding:5px;color:<?=$theme["nForeColor"]?>;font-size:100%}
                  .list-wrapper-box a{text-decoration:none;color:black;}
                  .list-wrapper-box a:hover{text-decoration:underline;color:<?=$theme["nBackColor"]?>;}  
                  .list-wrapper-box:hover{cursor:pointer;text-decoration:underline;color:<?=$theme["nBackColor"]?>;}
                  .list-wrapper-box img{width:100%;}
                  .list-wrapper-box span:nth-of-type(1){display:block}
                  .list-wrapper-box span:nth-of-type(1) b{font-size:70%;} 
                  .list-wrapper-box span:nth-of-type(2) {float:left;font-size:80%;}
                  .list-wrapper-box span:nth-of-type(3) {float:right;font-size:80%;}  
                  .list-wrapper-box{width:25%;padding:0px 5px 0px 0px;}
                  @media only screen and (max-width: 760px),(min-device-width: 768px) and (max-device-width: 1024px)  {
                	.right-pane{width:100%;}
                  .list-wrapper-box img{border:0px solid <?=$theme["nBackColor"]?>;-moz-transition: all 0.3s;  -webkit-transition: all 0.3s;  -ms-transition: all 0.3s;transition: all 0.3s;}
                  .list-wrapper-box img:hover{border:5px solid <?=$theme["nBackColor"]?>;}
                  .list-wrapper-box{width:100%;padding:0px;}
                	}
                  </style>
                  <table id="wp-all-wrapper" border=0 class="ui-widget-table"><?=$this->mdlVideoSearch->getListVideos($this->crypt->encrypt("Product Info"),1,$videoVersion)?></table>      
              </td>
      <?php } ?>
          </tr>
      </table>
</div>

<script>



$("#cmdsearch").click(function(e) {
         $(function(){
             $.post("<?=base_url()?>learnmore/product-presentation/search",{type:"Product Info",search:$("#txtsearch").val(),videoVersion:$("#cboVideoVersion").val()}, function(data){
             $("#wp-all-wrapper").empty().append(data);
             $("#txtsearch").val("").focus();
             });         
         });
});

$("#txtsearch").keypress(function(e) {
    if(e.which == 13) {
    $("#cmdsearch").trigger("click");
    }
});

$("#cboVideoVersion").change(function() {

<?php if($search=="") {?>
window.location.href="<?=base_url()?>learnmore/product-presentation?videoVersion="+$("#cboVideoVersion").val();
<?php 
} 
else 
{ 
?>
window.location.href="<?=base_url()?>learnmore/product-presentation?videoVersion="+$("#cboVideoVersion").val()+"&post=<?=$search?>";
<?php
}
?>


});


$("#list-general-area").click(function() {window.location.href="<?=base_url()?>learnmore/product-presentation";});
$(function(){$.getScript("<?=base_url()?>js/product-presentation.js.php");});</script>
