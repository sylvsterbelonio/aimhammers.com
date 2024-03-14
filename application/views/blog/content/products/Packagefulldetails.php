<?php
$this->load->model("Mdlproduct");
$this->load->model('blog/Mdlgeneral');
$this->load->library("Color");

$theme = $this->Mdlgeneral->getTheme();
$rgb = $this->color->string_to_rgb($theme["nBackColor"]);
$prgb = $this->color->string_to_rgb($theme["pBackColor"]);
$hrgb = $this->color->string_to_rgb($theme["hForeColor"]);
$datax = $this->Mdlproduct->openFullPackageDetails($packageID); //PRODUCT ids



?>

<link rel="stylesheet" type="text/css" href="<?=base_url()?>css/productfulldetails.css" /> 
<link rel="stylesheet" type="text/css" href="<?=base_url()?>css/ui-icons/ui-icons.css" />
<style>
body{
min-width:300px;
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

padding:10px 10px 10px 20px;
background:rgba(0,0,0,.5);

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
width:100%;padding:10px 10px 10px 10px;
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
.left-background{
width:60%;
}
.right-img-features{
height:90px;
}



.right-img-features div{
width:100%;height:auto;
}
.img-background{
margin-right:0 auto;width:100%;
border:1px solid white;
}
.img-features{
}

.price-left-image{
width:22.5%;

}
.price-left-image div{
width:100%;height:auto;
}
.price-left-image div img{
width:100%;
border-top-left-radius:5px;
border-bottom-left-radius:5px;

}
.price-left-heading{
padding-top:5px;padding-left:5px
}
.price-left-heading div{
width:100%;
}
.desc-price-right{
float:right;
font-size:150%;
}

              .item-list-products{
              border:1px solid #a5a5a5;margin-top:5px;box-shadow: 0px 1px 10px 1px #a5a5a5;border-radius:5px;
              }
              .item-list-products table{
              width:100%;border-bottom-right-radius:0px;
              }
              .item-list-products table tr:nth-of-type(1) td:nth-of-type(2) div span{
              font-size:140%;font-weight:bold;color:green;margin-left:4px;
              }
              .item-list-products table tr:nth-of-type(2) td:nth-of-type(1){
              padding:0px 5px 0px 5px;
              }
              .item-list-products table tr:nth-of-type(2) td:nth-of-type(1){
              font-size:140%;font-weight:;color:white
              }
              .item-list-products table tr:nth-of-type(2) td:nth-of-type(2){
              padding:0px 5px 0px 5px
              }
              .item-list-products table tr:nth-of-type(2) td:nth-of-type(2) span{
              font-size:150%;color:white
              }
              .item-list-products table tr:nth-of-type(2) td:nth-of-type(3){
              padding:0px 5px 0px 5px;border-bottom-right-radius:5px
              }
              .item-list-products table tr:nth-of-type(2) td:nth-of-type(3) span{
              font-size:150%;color:white
              }
              .item-list-products-footer{
              border:1px solid #a5a5a5;;background:<?=$theme["pBackColor"]?>;color:<?=$theme["nForeColor"]?>;padding:10px;font-size:200%;margin-top:5px;box-shadow: 0px 1px 10px 1px #a5a5a5;border-radius:5px;
              }
              .item-list-products-footer span{
              float:right;
              }
             #divProductItems{
            padding:10px
            }
            #divProductItems div:nth-of-type(1){
            font-size:140%;font-weight:bold;color:<?=$theme["nBackColor"]?>;line-height:1.5;
            } 
            
                          
                .gp-content-benefits{
                width:100%
                }
                .gp-content-benefits tr:nth-of-type(1) td,.gp-content-benefits tr:nth-of-type(2) td{
                width:50%;
                }
                .gp-content-benefits tr:nth-of-type(1) td h4{
                font-weight:bold;
                color:<?=$theme["nBackColor"]?>;
                }
               
              
                            
	@media 
	only screen and (max-width: 760px),
	(min-device-width: 768px) and (max-device-width: 1024px)  {
	.gp-content-benefits tr:nth-of-type(1) td,.gp-content-benefits tr:nth-of-type(2) td{
	width:100%;
	}
	.price-left-image div img{
	border-top-right-radius:5px;
	border-bottom-right-radius:5px;

	}
.item-list-products table tr:nth-of-type(2) td:nth-of-type(1){
              border-top-left-radius:5px;
              }
	
	.item-list-products table tr:nth-of-type(2) td:nth-of-type(1){
	border-top-right-radius:5px;
	}
	.item-list-products table tr:nth-of-type(2) td:nth-of-type(2),.item-list-products table tr:nth-of-type(2) td:nth-of-type(1){
	padding:10px 10px 10px 10px;
	
	}
 .item-list-products table tr:nth-of-type(2) td:nth-of-type(3){
border-bottom-left-radius:5px;padding:10px;
}
.item-list-products-footer{
margin:10px 10px 10px 10px;
font-size:200%;
font-weight:bold;
}
.item-list-products table tr{
padding:10px;
}
.desc-price-right{
margin-right:5px;
}

.price-left-heading div{
text-align:center;
}

.price-left-image{
width:100%;
}

.price-left-image div{
width:200px;
height:200px;
margin:0 auto;
text-align:center;
}
.price-left-image div img{
width:100%;
height:auto;
}



.left-background{
width:100%;
}
.right-img-features{
height:auto;
align:center;
}
.right-img-features div{
width:200px;
height:200px;
margin:0 auto;
}
.right-img-features div img{
width:100%;
height:100%;
}

      .img-features{
      width:400px;
      height:400px;
      margin:0 auto;
      }


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
    <li class="active"><a data-toggle="tab" href="#home"><span class="ui-icon ui-icon-suitcase" style="float:left;margin-right:5px"></span>GLOBAL PACKAGE</a></li>
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
        <div style="width:100%;padding:10px 3px 1px 10px;background:rgba(0,0,0,0.8);border:1px solid black">
        <style>
        .list-countries-links{
        text-align:center;
        }
        .list-countries-links li{
        display:inline-block;
        text-align:center;
        margin:0 auto;
        }
        .list-countries-links li div{
        background:background:rgba(0,0,0,0.8);;
        padding:5px;
        margin:0px 5px 0px 5px;
        border-radius:50%;
				-webkit-transition: all .2s ease-in-out;
		-moz-transition: all .2s ease-in-out;
		-ms-transition: all .2s ease-in-out;
		-o-transition: all .2s ease-in-out;
		transition: all .2s ease-in-out;          
        }
        .list-countries-links li div:hover{
        cursor:pointer;
        background:<?=$theme["nBorderColor"]?>;
       
        }
        .list-countries-links li img{
        border-radius:50%;
        width:60px;
        height:60px;
     opacity:0.7;
                display:inline-block;border-radius:50%;
				-webkit-transition: all .3s ease-in-out;
		-moz-transition: all .3s ease-in-out;
		-ms-transition: all .3s ease-in-out;
		-o-transition: all .3s ease-in-out;
		transition: all .3s ease-in-out;   
		
        }
         .list-countries-links li img:hover{
         opacity:1;
         }
         .list-countries-links a:hover{
         color:white;
         }
         .list-countries-links li span{
         color:white;display:block;font-size:200%;
         }
        </style>
        <ul class="list-countries-links">
            <?=$countryLinkList?>
        </ul>
        
        
        </div>
        <div class="image_header" style="position:relative;">        
            <table class="ui-widget-table" style="border-collapse:collapse;margin-right:10px" >
            
            <tr>
                  <td class="left-background" rowspan=2 valign=top>
                      <img oncontextmenu="return false;" src="<?=$datax["imgBackground"]?>" class="img-background" >
                  </td>  
                  <td align=center class="right-img-features" bgcolor="#eeeeee">
                      <div><img oncontextmenu="return false;" src="<?=$datax["imgFeatures"]?>"></div>
                  </td>
          <td valign=top bgcolor="<?=$theme["pBackColor"]?>"> 
            <div style="text-align:center;height:100%;display:block;margin:0;color:white;padding:0;padding:10px 20px 10px 20px">
                <div style="width:80px;margin:0 auto"><img src="<?=$datax["flag"]?>" style="width:100%"></div>
                <span class="unselectable" style="font-size:250%;line-height:2"><?=$datax["productName"]?></span>
                <p class="unselectable" style="text-align:center;border:1px solid white">
                    
                </p>
                <span style="font-size:400%"><?=$datax["price"]?></span>
            </div>          
          </td>
            
            </tr>
            <tr>
            <td colspan=2 valign=top bgcolor="white">
            

            
              <div id="divProductItems" style="">
                  <div style="font-size:240%;text-align:center">
                      <span>Product Items</span>
                  </div>
                  <?=$datax["items"]?>           
              </div>
            
            </td>
            </tr>
            <tr>
            
                <td colspan=5>
                <table class="gp-content-benefits">
                    <tr>
                    <td valign=top>
                    <h4>Global Package Content:</h4>
                    <hr class="ui-hr">
                    <?=$datax["packageInclusions"]?>
                    </td>
                    
                    <td valign=top>
                    <h4>All Lifetime Benefits:</h4>
                    <hr class="ui-hr">
                    <?=$datax["packageBenefits"]?>
                    </td>
                    
                    </tr>
                    
                </table>

                <style>.li-b{font-size:100%;}</style>
                    
                
                
                </td>
            
            
            </tr>
            
            </table>
            
            
            
            
            
            
           
        </div>
        

        

        
    </div>
  

  </div>
</div>


<?php if($datax["relatedProduct"]!=""){  ?>
<div class="ui-widget-content" style="text-align:center">
<span style="font-size:150%;color:<?=$theme["nBackColor"]?>" >RELATED GLOBAL PACKAGES</span>


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
<?php 

}?>
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












