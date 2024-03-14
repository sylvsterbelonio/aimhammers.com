<?php


$this->load->model("mdlProduct");
$this->load->model('blog/mdlGeneral');
$this->load->library("Color");

$theme = $this->mdlGeneral->getTheme();
$rgb = $this->color->string_to_rgb($theme["nBackColor"]);
$datax = $this->mdlProduct->openFullProductDetails($PID); //PRODUCT ids



?>
<link rel="stylesheet" type="text/css" href="<?=base_url()?>controls/lightbox/css/lightbox.min.css" /> 
<style>

.share-btn-wrp {	list-style: none;	display: block;	margin: 5px;	padding: 5px;	width: 32px;	left: 0px;	position: fixed;	z-index:999999999999;	opacity:0.8;}
.share-btn-wrp .button-wrap{	text-indent:-100000px;	width:32px;	height: 32px;	cursor:pointer;		z-index:1000000000000000000;	transition: width 0.1s ease-in-out;}
.share-btn-wrp > .facebook{	background: url(<?=base_url()?>images/system/share-icons.png) no-repeat -42px 0px;}
.share-btn-wrp > .facebook:hover{	opacity:1;background: url(<?=base_url()?>images/system/share-icons.png) no-repeat -4px -0px;	width:38px;}
.share-btn-wrp > .twitter{	background: url(<?=base_url()?>images/system/share-icons.png) no-repeat -42px -34px;}
.share-btn-wrp > .twitter:hover{opacity:1;	background: url(<?=base_url()?>images/system/share-icons.png) no-repeat -4px -34px;	width:38px;}
.share-btn-wrp > .digg{	background: url(<?=base_url()?>images/system/share-icons.png) no-repeat -42px -68px;}.share-btn-wrp > 
.digg:hover{	opacity:1; background: url(<?=base_url()?>images/system/share-icons.png) no-repeat -4px -68px;	width:38px;}
.share-btn-wrp > .stumbleupon{	background: url(<?=base_url()?>images/system/share-icons.png) no-repeat -42px -102px;}
.share-btn-wrp > .stumbleupon:hover{opacity:1;	background: url(<?=base_url()?>images/system/share-icons.png) no-repeat -4px -102px;	width:38px;}
.share-btn-wrp > .delicious{	background: url(<?=base_url()?>images/system/share-icons.png) no-repeat -42px -136px;}
.share-btn-wrp > .delicious:hover{opacity:1;	background: url(<?=base_url()?>images/system/share-icons.png) no-repeat -4px -136px;	width:38px;}
.share-btn-wrp > .gplus{	background: url(<?=base_url()?>images/system/share-icons.png) no-repeat -42px -170px;}
.share-btn-wrp > .gplus:hover{opacity:1;	background: url(<?=base_url()?>images/system/share-icons.png) no-repeat -4px -170px;	width:38px;}
.share-btn-wrp > .email{	background: url(<?=base_url()?>images/system/share-icons.png) no-repeat -42px -408px;}
.share-btn-wrp > .email:hover{opacity:1;	background: url(<?=base_url()?>images/system/share-icons.png) no-repeat -4px -408px;	width:38px;}
@media all and (max-width: 699px) {	.share-btn-wrp{		width: 100%;		text-align: center;		position: fixed;		bottom: 1px;	}	.share-btn-wrp .button-wrap {		display: inline-block;		margin-left: -2px;		margin-right: -2px;	}}

.container-tab{
max-width:<?=$theme["maxWidth"]?>;
width:100%;
background:<?=$theme["container"]?>;
background-repeat:no-repeat;
border:1px solid <?=$theme["nBorderColor"]?>;
border-radius:5px;
}

.tabs{
width:100%;
}

.tabs label {
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
	font-size: 14px;
	line-height: 40px;
	height: 40px;
	position: relative;
	padding: 0 20px;
    float: left;
	display: block;
	width: auto;

	letter-spacing: 1px;
	text-transform: uppercase;
	font-weight: bold;
	text-align: center;
	text-shadow: 1px 1px 1px rgba(255,255,255,0.3);
    border-radius: 3px 3px 0 0;
    box-shadow: 2px 0 2px rgba(0,0,0,0.1), -2px 0 2px rgba(0,0,0,0.1);
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



.content div h1{
font-family: "Arial Narrow", Arial Narrow, sans-serif;
color:<?=$theme["nBackColor"]?>;
font-size:18px;
line-height:60px;
padding-left: 15px;
}

.content div p {
font-family: "Arial Narrow", Arial Narrow, sans-serif;
	font-size: 18px;
	line-height: 25px;
	text-align: justify;
	margin: 0px 0px 0 0;
	color: #2d2d2d;
	padding-left: 15px;
  text-indent:45px;
	border-left: 8px solid rgba(<?=$rgb?> 0.8);

}
.list-ui-li:before {
    font-size:20px;
    margin-right:10px;
    content: "*";
    color: red; /* or whatever color you prefer */
}

.list-ul{
font-family: "Arial Narrow", Arial Narrow, sans-serif;
	font-size: 18px;
	line-height: 25px;
	text-align: justify;
	margin: 20px 20px 0 0;
	color: #2d2d2d;
	padding-left: 15px;
  text-indent:45px;
	border-left: 8px solid rgba(<?=$rgb?> 0.8);
	list-style:none;
}
.left-header{

float:left;

}

.left-header h1{
font-family: "Arial Narrow", Arial Narrow, sans-serif;
background:rgba(0,0,0,0.5);
font-size:24px;
float:right;
color:white;
padding:5px 5px 10px 10px;

}
.left-header h1 span{
font-size:12px;
}
.left-header div{
font-size:24px;
float:right;
color:white;
}

.right-header{
float:right;
font-size:24px;
float:right;
color:white;
padding:5px 5px 10px 10px;

text-align:center;
}
.right-header h1{
padding:0px;
margin:10px 10px 0 0;
background:transparent;
font-size:45px;
line-height:40px;
}

.like{
  -moz-transition: all 0.3s;  
  -webkit-transition: all 0.3s;  
  -ms-transition: all 0.3s;
  transition: all 0.3s;
  font-size:10px;background:#76aebe;
  padding:2px 10px;
  border-radius:5px;
  color:white;
  border:1px solid #1154c3
}
.like:hover{
  cursor:pointer;
  background:#1154c3;
}
.like-active{
  background:#1154c3;
}
.love{
  -moz-transition: all 0.3s;  
  -webkit-transition: all 0.3s;  
  -ms-transition: all 0.3s;
  transition: all 0.3s;
  font-size:10px;
  background:#fb899c;
  padding:2px 10px;border-radius:5px;
  color:white;
  border:1px solid #e50e37
}
.love:hover{
  cursor:pointer;
  background:#e50e37;
}
.love-active{
  background:#e50e37;
}
.share{
  -moz-transition: all 0.3s;  
  -webkit-transition: all 0.3s;  
  -ms-transition: all 0.3s;
  transition: all 0.3s;
  font-size:10px;background:#a2ff9b;
  padding:2px 10px;border-radius:5px;
  color:white;
  border:1px solid #33d027
}
.share:hover{
  cursor:pointer;
  background:#33d027;
}
</style>

               <ul  class="share-btn-wrp">
                     <li class="facebook button-wrap">Facebook</li>
                     <li class="twitter button-wrap">Tweet</li>
                     <li class="gplus button-wrap">Google Share</li>
                     <li class="email button-wrap">Email</li>
                     <li class="digg button-wrap">Digg</li>
                     <li class="stumbleupon button-wrap">StumbleUpon</li>
                     <li class="delicious button-wrap">Delicious</li>                  
               </ul>  
                    
<div class="container-tab">


<div class="right-header">


<span onclick="" class="like"><img src="<?=base_url()?>images/system/like.png" height=9 width=10><span>1</span></span>
<span onclick="" class="love"><img src="<?=base_url()?>images/system/love.png" height=9 width=11 ><span>2</span></span>
<span onclick="" class="share"><img src="<?=base_url()?>images/system/love.png" height=9 width=11 ><span>2</span></span>
  
<button id="cmdMinus" style="font-size:12px;border-radius:0px;border-top-left-radius:5px;border-bottom-left-radius:5px">-</button>    
<input id="txtQuantity" type="text" size=3 style="text-align:center;border-radius:0px">
<button id="cmdPlus" style="font-size:12px;border-radius:0px;border-top-right-radius:5px;border-bottom-right-radius:5px">+</button>  
<button id="cmdCard" style="font-size:12px"><img src="<?=base_url()?>images/system/cart.png" ><span class="button-text">Add to Cart</span></button>
</div>                   



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
border-radius:5px;
width:400px;
margin-top:10px;
z-index:1;
}

@media only screen and (max-width: 620px) {
  .image_description{
  width:90%;
  }

}


.image_description p{
font-size:14px;
text-indent:45px;
text-align:justify;
line-height:25px;
}


.image_header{
width:100%;padding:10px 10px 20px 20px;
}



.mydetails{
width:500px;margin:0px auto;

}
.mydetails p{
font-family: "PT Sans Narrow", Arial, sans-serif;
line-height:30px;
font-size:14px;
text-align:justify;
text-indent:45px;
}

.mydetails h1{
color:<?=$theme["nBackColor"]?>;
font-size:18px;
line-height:55px;
font-weight:500px;
}

.mydetails ul{
font-size:14px;
line-height:30px;
margin-left:10px;

}
.mydetails ul li{
margin-left:40px;

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
font-size:11px;
color:<?=$theme["nBackColor"]?>
}

#youtubeLoader{
background-image:url(<?=base_url()?>images/gif/ajax-loader@2x.gif);
background-repeat:no-repeat;
background-position:center;
}
.mydetails img{
width:100%;border-radius:15px;margin:5px;
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
</style>





 
  <link rel="stylesheet" href="<?=base_url()?>controls/tabcontrol/bootstrap.min.css">
  
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">PRODUCT</a></li>
    <li><a data-toggle="tab" href="#menu1">DETAILS</a></li>
    <li><a data-toggle="tab" href="#menu2">CONTENT</a></li>
    <li><a data-toggle="tab" href="#menu3">HEALTH BENEFITS</a></li>
    <li><a data-toggle="tab" href="#menu4">TESTIMONIES</a></li>
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
        <div class="image_header" style="position:relative;">
            <div class="image_description" >
                <h3><?=$datax["productName"]?></h3>
                <p>
                    <?=$datax["details"]?>
                </p>
                <h1 align=right><?=$datax["price"]?></h1>
            </div>
            <img oncontextmenu="return false;" src="<?=$datax["imgBackground"]?>" style="width:100%">
            <img oncontextmenu="return false;" src="<?=$datax["imgFeatures"]?>" style="position:absolute;bottom:25px;right:25px;">
        </div>
    </div>
    <div id="menu1" class="tab-pane fade" > 
        <div class="mydetails" >
                <?=$datax["fulldetails"]?> 
        </div>   
    </div>
    <div id="menu2" class="tab-pane fade">
        <div class="mydetails">
                <?=$datax["content"]?> 
        </div> 
    </div>
    <div id="menu3" class="tab-pane fade">
        <div class="mydetails">
                <?=$datax["benefit"]?> 
        </div> 	
    </div>    
    <div id="menu4" class="tab-pane fade">
					<div class="container-testimony">
    					<div class="search-testimony">
    					     <table align=right style="margin:5px;"><tr><td valign=top><input id="txtSearch" type="text" style="border-top-right-radius:0px;border-bottom-right-radius:0px;"></td><td><button id="cmdSearch" style="border-bottom-left-radius:0px;border-top-left-radius:0px;">Search</button></td></tr></table>
    					</div>	
    				  <div class="left-testimony">
                  <div class="mytestimonies" style="border-right:1px solid <?=$theme["container2"]?>;margin-left:10px">
                      <iframe id="youtubeLoader"  width="630" height="400" src="https://www.youtube.com/embed/<?=$datax["ytData"]?>?modestbranding=1&amp;rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
                      <h1 align=center><?=$datax["ytTitle"]?></h1>
                      <hr class="ui-hr">
                      <h3 align=center><i><?=$datax["ytSubTitle"]?></i></h3>
                      <p><?=$datax["ytContent"]?> - <i style="font-size:11px;">(<b>Date Shared:</b> <?=$datax["ytSharedDt"]?>)</i></p>
                      <table style="width:100%"><tr><td align=left><span class="mytestimonies-footer"><span class="highlight">Category:</span> <?=$datax["ytCategory"]?> <span class="highlight">Tags:</span> <?=$datax["ytTag"]?> </span></td><td align=right><span class="mytestimonies-footer"><span class="highlight">By:</span> <?=$datax["ytAuthor"]?></span></td></tr></table>
                  </div>
              </div>
    				  <div class="right-testimony">
    				       <div id="lstyoutube">
                      <?=$datax["listYoutube"]?>
                   </div>
              </div> 
              <div style="clear:both">
              </div>
					</div>
    </div>
    
  </div>
</div>

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
 background:#e3e3e3;
 cursor:pointer;
 margin-bottom:5px;
 }
  
 .list-testimony:hover{
 background:<?=$theme["container2"]?>;
 cursor:pointer;
 
 
 }
 
 
 .container-testimony{
 width:100%;
 display:block;
 border:1px solid <?=$theme["container2"]?>;

 }
 .search-testimony{
 width:100%;
 background:<?=$theme["container2"]?>;
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
 float:left;
 right:0px;
 top:270px;
 font-size:14px;
 overflow-y:auto;
 }
 
 button{
 font-size:12px;
 }
 </style>  


<script src="<?=base_url()?>controls/lightbox/js/lightbox-plus-jquery.js"></script>		
<script type="text/javascript" src="<?=base_url()?>js/scrolltop/modernizr.custom.11333.js"></script>
<script type="text/javascript" src="<?=base_url()?>js/scrolltop/jquery.easing.1.3.js"></script>
<script>

function openYoutube(data){
  $("#youtubeLoader").attr("src","https://www.youtube.com/embed/"+data+"?modestbranding=1&amp;rel=0&amp;showinfo=0");
}

$("#cmdSearch").click(function(e) {
         $(function(){
             $.post("<?=base_url()?>shop/event/searchYoutube",{search:$("#txtSearch").val(),pid:<?=$PID?>}, function(data){
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

$(document).ready(function(){
    var pageTitle	= document.title; //HTML page title
    var pageUrl		= location.href; //Location of this page
	
	$('.share-btn-wrp li').click(function(event){
		var shareName = $(this).attr('class').split(' ')[0]; //get the first class name of clicked element
		switch(shareName) //switch to different links based on different social name
		{
			case 'facebook':
				OpenShareUrl('https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent(pageUrl) + '&amp;title=' + encodeURIComponent(pageTitle));
				break;
			case 'twitter':
				OpenShareUrl('http://twitter.com/home?status=' + encodeURIComponent(pageTitle + ' ' + pageUrl));
				break;
			case 'digg':
				OpenShareUrl('http://www.digg.com/submit?phase=2&amp;url=' + encodeURIComponent(pageUrl) + '&amp;title=' + encodeURIComponent(pageTitle));
				break;
			case 'stumbleupon':
				OpenShareUrl('http://www.stumbleupon.com/submit?url=' + encodeURIComponent(pageUrl) + '&amp;title=' + encodeURIComponent(pageTitle));
				break;
			case 'delicious':
				OpenShareUrl('http://del.icio.us/post?url=' + encodeURIComponent(pageUrl) + '&amp;title=' + encodeURIComponent(pageTitle));
				break;
			case 'gplus':
				OpenShareUrl('https://plus.google.com/share?url=' + encodeURIComponent(pageUrl) + '&amp;title=' + encodeURIComponent(pageTitle));
				break;
			case 'email':
				OpenShareUrl('mailto:?subject=' + pageTitle + '&body=Found this useful link for you : ' + pageUrl);
				break;
		}
		
	});
		
	function OpenShareUrl(openLink){
		//Parameters for the Popup window
        winWidth    = 650; 
        winHeight   = 450;
        winLeft     = ($(window).width()  - winWidth)  / 2,
        winTop      = ($(window).height() - winHeight) / 2,
        winOptions   = 'width='  + winWidth  + ',height=' + winHeight + ',top='    + winTop    + ',left='   + winLeft;
        window.open(openLink,'Share This Link',winOptions); //open Popup window to share website.
        return false;
	}
});
</script>












