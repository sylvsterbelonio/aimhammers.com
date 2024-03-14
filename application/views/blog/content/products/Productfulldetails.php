<?php
$this->load->model("Mdlproduct");
$this->load->model('blog/Mdlgeneral');
$this->load->library("Color");

$theme = $this->Mdlgeneral->getTheme();
$rgb = $this->color->string_to_rgb($theme["nBackColor"]);
$hrgb = $this->color->string_to_rgb($theme["hForeColor"]);
$datax = $this->Mdlproduct->openFullProductDetails($PID); //PRODUCT ids



?>

<link rel="stylesheet" type="text/css" href="<?=base_url()?>css/productfulldetails.css" /> 
<link rel="stylesheet" type="text/css" href="<?=base_url()?>css/ui-icons/ui-icons.css" />
<style>
body{
min-width:900px;
}
.container-tab{
max-width:<?=$theme["maxWidth"]?>;
background:<?=$theme["container"]?>;
border:1px solid <?=$theme["nBorderColor"]?>;
}

.tabs label {
	color: <?=$theme["nForeColor"]?>;
		border: 1px solid <?=$theme["nBorderColor"]?>;
		background-color: <?=$theme["nBackColor"]?>;
		background-image: -moz-linear-gradient(<?=$theme["nBorderColor"]?>, <?=$theme["pBackColor"]?>); 
		background-image: -webkit-gradient(linear, left top, left bottom, from(<?=$theme["nBorderColor"]?>), to(<?=$theme["pBackColor"]?>));	
		background-image: -webkit-linear-gradient(<?=$theme["nBorderColor"]?>, <?=$theme["pBackColor"]?>);	
		background-image: -o-linear-gradient(<?=$theme["nBorderColor"]?>, <?=$theme["pBackColor"]?>);
		background-image: -ms-linear-gradient(<?=$theme["nBorderColor"]?>, <?=$theme["pBackColor"]?>);
		background-image: linear-gradient(<?=$theme["nBorderColor"]?>, <?=$theme["pBackColor"]?>);
		-moz-box-shadow: 0 1px 1px <?=$theme["pBackColor"]?>, 0 1px 0 <?=$theme["nBackColor"]?> inset;
		-webkit-box-shadow: 0 1px 1px <?=$theme["pBackColor"]?>, 0 1px 0 <?=$theme["nBackColor"]?> inset;
		box-shadow: 0 1px 1px <?=$theme["pBackColor"]?>, 0 1px 0 <?=$theme["nBackColor"]?> inset;
}

.tabs input:hover + label {
    background-color: <?=$theme["pBackColor"]?>;
		background-image: -moz-linear-gradient(blue,  yellow);	
		background-image: -webkit-gradient(linear, left top, left bottom, from(<?=$theme["nBackColor"]?>), to(<?=$theme["pBackColor"]?>));
		background-image: -webkit-linear-gradient(<?=$theme["nBackColor"]?>, <?=$theme["pBackColor"]?>);
		background-image: -o-linear-gradient(<?=$theme["nBackColor"]?>, <?=$theme["pBackColor"]?>);
		background-image: -ms-linear-gradient(<?=$theme["nBackColor"]?>, <?=$theme["pBackColor"]?>);
		background-image: linear-gradient(<?=$theme["nBackColor"]?>, <?=$theme["pBackColor"]?>);
		color:<?=$theme["hForeColor"]?>;
}

.tabs label:after {
	background: <?=$theme["nBackColor"]?>;
	color:<?=$theme["nBackColor"]?>;
}

.tabs input:checked + label {
  background: <?=$theme["hBackColor"]?>;
  color: <?=$theme["hForeColor"]?>;
  border: 1px solid <?=$theme["hForeColor"]?>;
		background-image: -moz-linear-gradient(<?=$theme["hBackColor"]?>, <?=$theme["nBorderColor"]?>); 
		background-image: -webkit-gradient(linear, left top, left bottom, from(<?=$theme["hBackColor"]?>), to(<?=$theme["nBorderColor"]?>));	
		background-image: -webkit-linear-gradient(<?=$theme["hBackColor"]?>, <?=$theme["nBorderColor"]?>);	
		background-image: -o-linear-gradient(<?=$theme["hBackColor"]?>, <?=$theme["nBorderColor"]?>);
		background-image: -ms-linear-gradient(<?=$theme["hBackColor"]?>, <?=$theme["nBorderColor"]?>);
		background-image: linear-gradient(<?=$theme["hBackColor"]?>, <?=$theme["nBorderColor"]?>);  
}
.content div h1{color:<?=$theme["nBackColor"]?>;}
.content div p {border-left: 8px solid rgba(<?=$rgb?> 0.8);}
.list-ul{border-left: 8px solid rgba(<?=$rgb?> 0.8);}

</style>
           <style>
.nav-tabs{
background:<?=$theme["pBackColor"]?>;
}

.nav-tabs>li>a{
font-size:12px;
margin-right:2px;line-height:1.42857143;border:1px solid transparent;border-radius:4px 4px 0 0;
	color: <?=$theme["nForeColor"]?>;
font-family: "PT Sans Narrow", Arial, sans-serif;
		border: 1px solid <?=$theme["nBorderColor"]?>;
		background-color: <?=$theme["nBackColor"]?>;
		background-image: -moz-linear-gradient(<?=$theme["nBorderColor"]?>, <?=$theme["pBackColor"]?>); 
		background-image: -webkit-gradient(linear, left top, left bottom, from(<?=$theme["nBorderColor"]?>), to(<?=$theme["pBackColor"]?>));	
		background-image: -webkit-linear-gradient(<?=$theme["nBorderColor"]?>, <?=$theme["pBackColor"]?>);	
		background-image: -o-linear-gradient(<?=$theme["nBorderColor"]?>, <?=$theme["pBackColor"]?>);
		background-image: -ms-linear-gradient(<?=$theme["nBorderColor"]?>, <?=$theme["pBackColor"]?>);
		background-image: linear-gradient(<?=$theme["nBorderColor"]?>, <?=$theme["pBackColor"]?>);
		-moz-box-shadow: 0 1px 1px <?=$theme["pBackColor"]?>, 0 1px 0 <?=$theme["nBackColor"]?> inset;
		-webkit-box-shadow: 0 1px 1px <?=$theme["pBackColor"]?>, 0 1px 0 <?=$theme["nBackColor"]?> inset;
		box-shadow: 0 1px 1px <?=$theme["pBackColor"]?>, 0 1px 0 <?=$theme["nBackColor"]?> inset;
    border-top-left-radius:5px;		
    border-top-right-radius:5px;	
}

.nav-tabs{border-bottom:1px solid <?=$theme["nBorderColor"]?>;}
.nav-tabs>li>a:hover{
cursor:pointer;
  background: <?=$theme["hBackColor"]?>;
  color: <?=$theme["hForeColor"]?>;
  border: 1px solid <?=$theme["hForeColor"]?>;
		background-image: -moz-linear-gradient(<?=$theme["hBackColor"]?>, <?=$theme["nBorderColor"]?>); 
		background-image: -webkit-gradient(linear, left top, left bottom, from(<?=$theme["hBackColor"]?>), to(<?=$theme["nBorderColor"]?>));	
		background-image: -webkit-linear-gradient(<?=$theme["hBackColor"]?>, <?=$theme["nBorderColor"]?>);	
		background-image: -o-linear-gradient(<?=$theme["hBackColor"]?>, <?=$theme["nBorderColor"]?>);
		background-image: -ms-linear-gradient(<?=$theme["hBackColor"]?>, <?=$theme["nBorderColor"]?>);
		background-image: linear-gradient(<?=$theme["hBackColor"]?>, <?=$theme["nBorderColor"]?>);  

}
.nav-tabs>li.active>a,.nav-tabs>li.active>a:focus,.nav-tabs>li.active>a:hover{
cursor:default;
  background: <?=$theme["hBackColor"]?>;
  color: <?=$theme["hForeColor"]?>;
  border: 1px solid <?=$theme["hForeColor"]?>;
		background-image: -moz-linear-gradient(<?=$theme["hBackColor"]?>, <?=$theme["nBorderColor"]?>); 
		background-image: -webkit-gradient(linear, left top, left bottom, from(<?=$theme["hBackColor"]?>), to(<?=$theme["nBorderColor"]?>));	
		background-image: -webkit-linear-gradient(<?=$theme["hBackColor"]?>, <?=$theme["nBorderColor"]?>);	
		background-image: -o-linear-gradient(<?=$theme["hBackColor"]?>, <?=$theme["nBorderColor"]?>);
		background-image: -ms-linear-gradient(<?=$theme["hBackColor"]?>, <?=$theme["nBorderColor"]?>);
		background-image: linear-gradient(<?=$theme["hBackColor"]?>, <?=$theme["nBorderColor"]?>);  
border-bottom-color:transparent
}

.image_description{
font-size:14px;
color:white;
padding:10px 20px 10px 20px;
position:absolute;
background:rgba(0,0,0,.5);

width:400px;

z-index:1;
}

@media only screen and (max-width: 620px) {
  .image_description{
  width:90%;
  }

}

.image_description h3{
font-size:200%;
}
.image_description p{
font-size:140%;
text-indent:45px;
text-align:justify;
line-height:25px;
}


.image_header{
width:100%;padding:20px 10px 10px 20px;
}



@media (max-width:568px){
.image_description{
width:90%;
}
.mydetails{

width:100%;
}

}


.mytestimonies{
width:650px;
padding:5px;
}
.mytestimonies h1{
color:<?=$theme["nBackColor"]?>;
font-size:22px;
margin-left:5px;
line-height:-10px;
margin-top: 0px;
font-weight:500px;
}
.mytestimonies h3{
font-size:18px;
margin-left:5px;
margin-top: 0px;
font-weight:500px;
}
.mytestimonies p{
font-family: "PT Sans Narrow", Arial, sans-serif;
line-height:30px;
font-size:14px;
text-align:justify;
text-indent:45px;
}
.mytestimonies-footer{
font-family: "PT Sans Narrow", Arial, sans-serif;
line-height:30px;
font-size:14px;
}
.highlight{
font-size:150%;
color:<?=$theme["nBackColor"]?>
}


.mydetails img{

border:1px solid <?=$theme["container2"]?>;
  -moz-transition: all 0.6s;  
  -webkit-transition: all 0.6s;  
  -ms-transition: all 0.6s;
  transition: all 0.6s;
}

.mydetails img:hover{
 box-shadow: 0px 0px 15px <?=$theme["nBorderColor"]?>;
 opacity:0.8;
}
.tab-content{
background:<?=$theme["container2"]?>;
border:1px solid transparent;
}

</style>


          		
 <style>
 .left-testimony div{
 border-right:1px solid <?=$theme["container2"]?>;margin-left:10px
 }
 .left-testimony h1{
 margin-top:10px;
 }
 
 .left-testimony:nth-of-type(4){
 font-size:11px;
 }
 .left-testimony div:nth-of-type(1){
 
 }

.comments{
max-width:<?=$theme["maxWidth"]?>;
margin:0px auto;
background: <?=$theme["container2"]?>;
padding:20px;
}
.comments span{
font-size:400%;
}
.list-comments
{
width:100%;

}
</style>  
  <link rel="stylesheet" href="<?=base_url()?>controls/tabcontrol/bootstrap.min.css">
  


<div class="container-tab">
    <div class="right-header">
        <span onclick="" class="like"><img src="<?=base_url()?>images/system/like.png" height=9 width=10><span>1</span></span>
        <span onclick="" class="love"><img src="<?=base_url()?>images/system/love.png" height=9 width=11 ><span>2</span></span>
        <span onclick="" class="share"><img src="<?=base_url()?>images/system/love.png" height=9 width=11 ><span>2</span></span>
        <button id="cmdMinus">-</button>    
        <input id="txtQuantity" type="text" size=3>
        <button id="cmdPlus">+</button>  
        <button id="cmdCard"><img src="<?=base_url()?>images/system/cart.png" ><span class="button-text">Add to Cart</span></button>
    </div>                   

  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home"><span class="ui-icon ui-icon-suitcase" style="float:left;margin-right:5px"></span>PRODUCT</a></li>
    <li><a data-toggle="tab" href="#menu4"><span class="ui-icon ui-icon-video" style="float:left;margin-right:5px"></span>VIDEOS</a></li>
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
        
        <div class="image_header" style="position:relative;">
            <div class="image_description" >
                <h3 class="unselectable"><?=$datax["productName"]?></h3>
                <p class="unselectable">
                    <?=$datax["details"]?>
                </p>
                <h1 align=right><?=$datax["price"]?></h1>
            </div>
            <img oncontextmenu="return false;" src="<?=$datax["imgBackground"]?>" style="width:99%;margin-right:10px">
            <img oncontextmenu="return false;" src="<?=$datax["imgFeatures"]?>" style="position:absolute;bottom:25px;right:25px;">
        </div>
        
        <h3 style="background:<?=$theme["nBackColor"]?>;color:<?=$theme["nForeColor"]?>;padding:10px"  align=center>DETAILS</h3>
        
                <div class="mydetails" style="margin:0;width:100%">
                <?=$datax["fulldetails"]?> 
        </div>   
        
        <h3 style="background:<?=$theme["nBackColor"]?>;color:<?=$theme["nForeColor"]?>;padding:10px" align=center>CONTENT</h3>
        
                <div class="mydetails" style="margin:0;width:100%">
                <?=$datax["content"]?> 
        </div> 
        
        <h3 style="background:<?=$theme["nBackColor"]?>;color:<?=$theme["nForeColor"]?>;padding:10px"  align=center>HEALTH BENEFITS</h3>
        
                <div class="mydetails" style="margin:0;width:100%">
                <?=$datax["benefit"]?> 
        </div> 	
        
    </div>
  
    <div id="menu4" class="tab-pane fade">
					<div class="container-testimony" style="padding:5px">
    					<div class="search-testimony">
    					     <table align=right style="margin:5px;"><tr><td valign=top><input id="txtSearch" type="text" style="border-top-right-radius:0px;border-bottom-right-radius:0px;"></td><td><button id="cmdSearch" style="border-bottom-left-radius:0px;border-top-left-radius:0px;">Search</button></td></tr></table>
    					</div>	
  				  <div class="left-testimony" style="margin:0;padding:0">
                  <div class="mytestimonies" style="border:1px solid #d1d1d1;margin:0;">
                      <iframe id="youtubeLoader" class="ui-state-animate-wait-method-b"  width="637" height="400" src="https://www.youtube.com/embed/<?=$datax["ytData"]?>?modestbranding=1&amp;rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
                      <h1 id="lblTitle" align=center ><?=$datax["ytTitle"]?></h1>
                      <h3 align=center><i ><?=$datax["ytSubTitle"]?></i></h3>
                      <p id="lblsubTitle"><?=$datax["ytContent"]?><i style="" id="lblGap"> <?=$datax["ytSharedDt"]?></i></p>
                      <hr class="ui-hr">
                      <div style="float:left" style="font-size:200%"><span class="highlight" style="font-size:200%" >Category:</span> <span style="font-size:200%"><?=$datax["ytCategory"]?></span></div>
                      <div style="float:right" style="font-size:200%"><span class="highlight" style="font-size:200%">Tags:</span> <span style="font-size:200%"><?=$datax["ytTag"]?></span> </div>
                      
                      <div style="clear:both;margin:0">
                      <table border=0>
                      <tr>
                      <td rowspan=2><img id="imgPhoto" src="<?=$datax["ytPhoto"]?>" height=80 width=80 style="margin-right:10px"></td>
                      <td valign=top>
                      <span style="display:block;font-size:180%;margin-top:10px;margin-right:5px"><b style="color:<?=$theme["nBackColor"]?>">Views:</b></span>
                      <span style="display:block;font-size:200%;margin-top:10px;"><b style="color:<?=$theme["nBackColor"]?>">By:</b> </span>
                     
                      </td>
                      <td valign=top>
                      <span id="lblView" style="font-size:200%;display:block;margin-top:10px"> <?=$datax["ytView"]?></span>
                      <span id="lblAuthor" style="font-size:200%;display:block;margin-top:10px"><?=$datax["ytAuthor"]?></span>
                       <span style="display:block;font-size:180%;"><i id="lblPos"><?=$datax["ytPos"]?></i></span>
                      </td>
                      </tr>
                      <tr>
                      <td></td>
                      </tr>
                      </table>
                      </div>
                      
                  <div style="margin:0;padding:0;">
                  
                  <div class="comments" style="padding:10px 5px 10px 5px;margin:0;background:rgba(<?=$rgb?>,0.3)">
                  <span style="color:<?=$theme["nBackColor"]?>;font-size:230%;margin-left:15px;">Comments</span>
                    <div class="list-comments" style="margin:0">
                    
                    </div>
                    <textarea style="width:100%;height:100px;margin:0"></textarea>
                    <div style="font-size:200%;padding:10px 20px 10px 20px;margin-top:5px;float:right;background:<?=$theme["nBackColor"]?>;color:<?=$theme["nForeColor"]?>">
                    Post
                    </div>
                    <div style="clear:both"></div>
                  
                  </div>                  
                  </div>

                      
                  </div>
              </div>
    				  <div class="right-testimony" style="padding:0px;margin-left:5px">
    				       <div id="lstyoutube" style="border:1px solid #d1d1d1;margin-top:0px;padding:5px">
                      <?=$datax["listYoutube"]?>
                   </div>
              </div> 
              <div style="clear:both">
              </div>
					</div>
    </div>
    
  </div>
</div>

<input id="post" type="hidden" value="<?=$datax["ytcpostID"]?>">

<div class="ui-widget-content" style="text-align:center">
<span style="font-size:150%;color:<?=$theme["nBackColor"]?>" >RELATED PRODUCTS</span>


  <link rel="stylesheet" href="<?=base_url()?>/controls/bxslider/css/jquery.bxslider.css" type="text/css" />
  <script src="<?=base_url()?>/controls/bxslider/js/jquery.min.js"></script>
  <script src="<?=base_url()?>/controls/bxslider/js/jquery.bxslider.js"></script>
  
<style>
.bx-wrapper{
width:100%;
}

.bx-wrapper .bx-prev:hover {
	background:rgba(<?=$rgb?>,1) url(<?=base_url()?>controls/bxslider/css/images/controls.png) no-repeat 0 -32px;
}

.bx-wrapper .bx-next:hover {
	background:rgba(<?=$rgb?>,1) url(<?=base_url()?>controls/bxslider/css/images/controls.png) no-repeat -43px -32px;
}


.bx-wrapper .bx-caption {
	background: <?=$theme["nBackColor"]?>;
	background: rgba(<?=$rgb?>, 0.75);
	margin-bottom: -10px;
}

.bx-wrapper .bx-pager.bx-default-pager a:hover,
.bx-wrapper .bx-pager.bx-default-pager a.active {
	background: <?=$theme["nBackColor"]?>;
}
.bx-wrapper .bx-pager.bx-default-pager a {
	background: <?=$theme["container2"]?>;
	}

.bx-wrapper .bx-loading {
    margin-top:2%;
    border: 4px solid <?=$theme["container"]?>; /* Light grey */
    border-top: 4px solid <?=$theme["nBackColor"]?>; /* Blue */
}

#bx-pager{
	text-align: center;
	margin-top: -25px;

}

#bx-pager a {
	margin: 0 3px;
}

#bx-pager a img {
	padding: 3px;
	border: solid #ccc 1px;
}

.bxslider5 li img{
	border: solid <?=$theme["container"]?> 1px;
}

.bxslider5 li img:hover{
	border: solid <?=$theme["nBackColor"]?> 1px;
}
#bx-pager a:hover img,
#bx-pager a.active img,#bx-wrapper {
	border: solid <?=$theme["nBackColor"]?> 1px;
}

.bx-wrapper{
margin:0 auto 15px;
}

.bxslider li:hover{
border:1px solid <?=$theme["nBackColor"]?>;
}

</style>
<br><br>

<?=$datax["relatedProduct"]?>


</div>

<script>
$(document).ready(function(){
  $('.bxslider5').bxSlider({
  auto: true,
  mode: 'horizontal',
  hideControlOnEnd: true,
  moveSlides: 1,
  minSlides: 1,
  maxSlides: 4,
  slideMargin: 5,
  slideWidth: 230,
  onSliderLoad: function(){
  $(".bx-next,.bx-prev").hide();
  },
  onSlideAfter: function(){
  }
});
});

$( ".bxslider5" ).hover(function() {$(".bx-next,.bx-prev").show();$(".bx-caption").fadeIn(500);}, function() {if ($(".bx-controls-direction:hover").length != 0) {}else{$(".bx-next,.bx-prev").hide();$(".bx-caption").fadeOut(500);}   });

$('img').bind("contextmenu", function (e) { e.preventDefault(); });  
$('img').mousedown(function(){return false});

</script>

 <style>
 
 
 @media (max-width:1050px){ 
 .mytestimonies{
 width:550px;
 }
  #youtubeLoader{
  width:540px;
  height:400px;
  } 
}

 @media (max-width:890px){ 
 .mytestimonies{
 width:450px;
 }
  #youtubeLoader{
  width:440px;
  height:300px;
  } 
}

 @media (max-width:568px){
#youtubeLoader{
width:100%;
}
}

 .testimony-header{
 color:<?=$theme["nBackColor"]?>;
 font-size:14px;
 }


 .list-testimony{
 background:rgba(<?=$rgb?>,0.1);
 cursor:pointer;
 margin-bottom:5px;
 }
  
 .list-testimony:hover{
 background:rgba(<?=$hrgb?>,0.2);
 cursor:pointer;
 color:<?=$theme["nBackColor"]?>;
 }
 
 .container-testimony{
 width:100%;
 display:block;
 border:1px solid <?=$theme["container2"]?>;

 }
 .search-testimony{
 width:100%;
 background:rgba(<?=$rgb?>,0.1);
 border:1px solid <?=$theme["container2"]?>;
 height:40px;
 
 }
 .left-testimony{
float:left;

 }
 .right-testimony{

 width:34%;
 min-width:300px;
 padding:5px;
 float:left;right:0px;top:270px;font-size:14px;overflow-y:auto; 
 }
 
 button{font-size:12px;}
 
 .li-b,text-wrapper-header{
 font-size:120%;
 }
 </style>  

<script type="text/javascript" src="<?=base_url()?>js/scrolltop/modernizr.custom.11333.js"></script>
<script type="text/javascript" src="<?=base_url()?>js/scrolltop/jquery.easing.1.3.js"></script>

<script>




function openYoutube(data,post){
  $("#youtubeLoader").attr("src","https://www.youtube.com/embed/"+data+"?modestbranding=1&amp;rel=0&amp;showinfo=0");

         $(function(){
             $.post("<?=base_url()?>shop/event/searchYoutube",{search:$("#txtSearch").val(),pid:<?=$PID?>,post:post}, function(data){
             $("#lstyoutube").empty().append(data);
             $("#txtSearch").val("");
             });   
             
             $.post("<?=base_url()?>shop/event/getVideoInfo",{post:post}, function(data){
             var ret = $.parseJSON(data);
             
             $("#lblTitle").empty().append(ret.title);
             $("#lblsubTitle").empty().append(ret.subtitle);
             $("#imgPhoto").attr("src",ret.pheader)
             $("#lblGap").empty().append(ret.gapDate);
             $("#lblView").empty().append(ret.views);
             $("#lblAuthor").empty().append(ret.by);
             $("#lblPos").empty().append(ret.position);             
             });                     
         });    
}

$("#cmdSearch").click(function(e) {
         $(function(){
             $.post("<?=base_url()?>shop/event/searchYoutube",{search:$("#txtSearch").val(),pid:<?=$PID?>,post:$("#post").val()}, function(data){

             $("#lstyoutube").empty().append(data);
             $("#txtSearch").val("");
             });         
         });
});

$("#txtSearch").keypress(function(e) {
    if(e.which == 13) {
    $("#cmdSearch").trigger("click");
    }
});
</script>












