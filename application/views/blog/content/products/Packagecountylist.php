<?php
$this->load->model("Mdlproduct");
$this->load->model('blog/Mdlgeneral');
$this->load->library("Color");

$theme = $this->Mdlgeneral->getTheme();
$rgb = $this->color->string_to_rgb($theme["nBackColor"]);
$prgb = $this->color->string_to_rgb($theme["pBackColor"]);
$hrgb = $this->color->string_to_rgb($theme["hForeColor"]);
//$datax = $this->Mdlproduct->openFullPackageDetails($packageID); //PRODUCT ids

?>

<link rel="stylesheet" type="text/css" href="<?=base_url()?>css/productfulldetails.css" /> 
<link rel="stylesheet" type="text/css" href="<?=base_url()?>css/ui-icons/ui-icons.css" />
<style>

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



.tab-content{
background:<?=$theme["container2"]?>;
border:1px solid transparent;
}

</style>
				
 

  <link rel="stylesheet" href="<?=base_url()?>controls/tabcontrol/bootstrap.min.css">
  


<div class="container-tab">
                 

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

        <div style="width:100%;padding:5px">
        <style>
        .list-package-content{
        list-style:none;text-align:center
        }
        .list-package-content li{
        display:inline-block;margin:10px
        }
        .list-package-content li div{
        width:180px;height:auto;background:white;padding:5px;border-radius:5px;
        box-shadow:6px 6px 10px 1px #a0a0a0;
        -webkit-transition: all .3s ease-in-out;
    		-moz-transition: all .3s ease-in-out;
    		-ms-transition: all .3s ease-in-out;
    		-o-transition: all .3s ease-in-out;
    		transition: all .3s ease-in-out; 
        }
        .list-package-content li a:hover{
        color:<?=$theme["nBackColor"]?>
        }
        .list-package-content li div:hover{
        cursor:pointer;
        border:1px solid <?=$theme["nBorderColor"]?>;
        }
        .list-package-content li div img{
        width:100%
        }
        .list-package-content li div h4{
        color:<?=$theme["nBackColor"]?>
        }
        </style>
        <ul class="list-package-content">
            <?=$PackageLinkList?>  
        </ul>
        
        
        </div>
        

        

        
    </div>
  

  </div>
</div>





<script>

$('img').bind("contextmenu", function (e) { e.preventDefault(); });  
$('img').mousedown(function(){return false});

</script>

 

<script type="text/javascript" src="<?=base_url()?>js/scrolltop/modernizr.custom.11333.js"></script>
<script type="text/javascript" src="<?=base_url()?>js/scrolltop/jquery.easing.1.3.js"></script>














