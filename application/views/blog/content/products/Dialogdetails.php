<?php
$this->load->model('blog/Mdlgeneral');
$this->load->model('blog/Mdlshopproducts');
$this->load->library('Color');
$theme=$this->Mdlgeneral->getTheme($PIID);
$rgb = $this->color->string_to_rgb($theme["nBackColor"]);

?>

  <link rel="stylesheet" href="<?=base_url()?>/controls/bxslider/css/jquery.bxslider.css" type="text/css" />
  <script src="<?=base_url()?>/controls/bxslider/js/jquery.bxslider.js"></script>

<style>

.clearfix:before, .clearfix:after { content: " "; display: table; }
.clearfix:after { clear: both; }
.main{
	margin: 0 auto;
}
.column {
	float: left;
	width: 50%;
	padding: 0px 5px;
	min-height: 300px;
	position: relative;
	overflow-y:hidden;
}
.main clearfix{
overflow-y:hidden;

}
.column:nth-child(2) {
	box-shadow: -1px 0 0 rgba(180,180,180,0.5);
}

@media screen and (max-width: 50.0625em) {	.column {		overflow-y:auto; width: 100%;		min-width: auto;		min-height: auto;		padding: 1em; 	}	.column:nth-child(2) {		box-shadow: 0 -1px 0 rgba(<?=$rgb?>,0.5);	}}
.img-dialog-preview {width:100%;border-radius:5px;display:none;}
.column h2 {color:<?=$theme["nBackColor"]?>;}

.quantity-action{
border:1px solid <?=$theme["bBackColor"]?>;
background:<?=$theme["nBackColor"]?>;
color:<?=$theme["nForeColor"]?>;
width:20px;
font-size:200%;
border-radius:5px
}
.quantity-action:hover{
cursor:pointer;
border:1px solid <?=$theme["hForeColor"]?>;
background:<?=$theme["hBackColor"]?>;
color:<?=$theme["hForeColor"]?>;
}
.quantity-action:active{
border:1px solid <?=$theme["nBackColor"]?>;
background:<?=$theme["pBackColor"]?>;
color:<?=$theme["nForeColor"]?>;
}
.dialog-right-header{
background:<?=$theme["pBackColor"]?>;
width:100%;
border:1px solid <?=$theme["bBackColor"]?>;
height:60px;border-radius:5px;
overflow:hidden;
}



.bx-wrapper .bx-prev:hover {
	background:rgba(<?=$rgb?>,1) url(<?=base_url()?>controls/bxslider/css/images/controls.png) no-repeat 0 -32px;
}

.bx-wrapper .bx-next:hover {
	background:rgba(<?=$rgb?>,1) url(<?=base_url()?>controls/bxslider/css/images/controls.png) no-repeat -43px -32px;
}


.md-close-details{
color:<?=$theme["nBackColor"]?>;
}
.md-close-details:hover{
cursor:pointer;
}

#dialog-right-header-product{
font-size:20px;
line-height:25px;
margin:15px;
}


.bx-wrapper .bx-pager.bx-default-pager a:hover,
.bx-wrapper .bx-pager.bx-default-pager a.active {
	background: <?=$theme["nBackColor"]?>;
}
.bx-wrapper .bx-pager.bx-default-pager a {
	background: <?=$theme["container2"]?>;
	}

.bx-wrapper .bx-loading {
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

#bx-pager a:hover img,
#bx-pager a.active img {
	border: solid <?=$theme["nBackColor"]?> 1px;
}

.share-btn-wrp{
font-size:150%;
}
</style>

          <div class="main clearfix">
            <div id="dialog-background-wait" class="column">

  					   <div   style="width:100%">
                  <ul id="dialog-left-slideshow" class="bxslider">
                      <?=$srcData?>
                  </ul>
               </div>
  			   	</div>
  				  <div class="column" style="overflow-y:hidden">
              <h2 id="dialog-right-header-product" align=center><?=$productName?></h2>
              <hr class="ui-hr"><br>
              <?=$likelove?>
              <button id="cmdViewQDetails" style="margin-bottom:5px;float:right"><img src="<?=base_url()?>images/system/details.png" height=17 width=15><span class="button-text">View Details</span></button>
              <br><br>
              <div class="dialog-right-header" > 
                  <table align=right   style="width:100%">
                      <tr>
                          <td rowspan=2 style="color:<?=$theme["nForeColor"]?>;border-radius:5px" valign=center><span id="dialog-price" style="color:white;font-size:450%;margin-top:5px;padding-left:10px;display:block"><?=$price?></span></td>
                          <td rowspan=2 style="color:<?=$theme["nForeColor"]?>;font-size:200%;" align=right>Quantity</td>
                          <td rowspan=2 align=right style="width:25px;"><input id="txtquantity" onblur="quantity(this);" type="text" size=1 style="text-align:center;height:40px;width:100%"></td> 
                          <td class="quantity-action" align=center onclick="quantityAction(document.getElementById('txtquantity'),'+')">+</td>
                          <td rowspan=2 align=center><button style="padding:5px 5px"><img src="<?=base_url()?>images/system/cart.png" style="margin-top:5px;" ><span style="line-height:30px"><span class="cart-details-text">Cart</span></span></button></td>
                      </tr>
                      <tr>
                          <td align=center valign="top" class="quantity-action" style="" align=center onclick="quantityAction(document.getElementById('txtquantity'),'-')">-</td>
                      </tr>
                  </table>
              </div>
              <div id="dialog-content" style="width:100%;border-radius:5px;overflow:auto;line-height:25px;padding-top:20px;font-size:12px;">
                  <?=$content?>
              </div>
              <br>
              <div id="dialog-bottom-footer" style="background: white;padding:15px;line-height:30px;font-size:14px;">
                  <?=$categories?>
              </div>    
  				  </div>
          </div>
          
<script>



$(document).ready(function(){
    var pageTitle	= document.title; //HTML page title
    var pageUrl		= location.href; //Location of this page
	

$('#cmdViewQDetails').click(function(event){


window.location.href="<?=$this->Mdlshop->setURLProducts($PageID,$site,$pageType)?>";


});

  $('.bxslider').bxSlider({
  
  auto: true
  });


});
 
  
</script>          
