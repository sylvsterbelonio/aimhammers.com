<?php
$this->load->model("blogs/Mdlmetaproperties");
$this->load->model("blogs/Mdlaccounts");
$this->load->model("blogs/Mdlgeneral");
$this->load->library("Color");

$meta = $this->Mdlmetaproperties->getMeta(0); //DEFAULT META
$photos = $this->Mdlaccounts->getPhoto_Header();
$theme=$this->Mdlgeneral->getTheme();  
$rgb = $this->color->string_to_rgb($theme["nBackColor"]);

  
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:og="http://ogp.me/ns#" xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="description" content="<?=$meta["ogDescription"]?>" />
        <meta name="keywords" content="<?=$meta["meta_keywords"]?>" />
        
        <link rel="canonical" href="<?=$meta["ogUrl"]?>" />
        <meta property="og:locale" content="<?=$meta["ogLocale"]?>" />
        <meta property="og:type" content="<?=$meta["ogType"]?>" />
        <meta property="og:title" content="<?=$meta["ogTitle"]?>" />
        <meta property="og:description" content="<?=$meta["ogDescription"]?>" />
        <meta property="og:url" content="<?=$meta["ogUrl"]?>" />
        <meta property="og:site_name" content="<?=$meta["ogSitename"]?>" />
        <meta property="article:publisher" content="<?=$meta["ogPublisher"]?>" />
        <meta property="article:author" content="<?=$meta["ogAuthor"]?>" />
        <meta property="fb:app_id" content="<?=$meta["ogAppid"]?>" />
        <meta property="og:image" content="<?=$meta["ogImage"]?>" />

        <link rel="SHORTCUT ICON" type="image/x-icon" href="<?=$meta["ogIcon"]?>">	
       
        <script src="<?=base_url()?>controls/tabcontrol/jquery.min.js"></script>
        <script src="<?=base_url()?>controls/tabcontrol/bootstrap.min.js"></script>
        
		    <script type="text/javascript" src="<?=base_url()?>controls/slicebox/js/modernizr.custom.46884.js"></script>           
        <script type="text/javascript" src="<?=base_url()?>js/jquery.min.1.8.2.js"></script>
        
        <script type="text/javascript" src="<?=base_url()?>js/scrolltop/modernizr.custom.11333.js"></script>
        
        <script type="text/javascript" src="<?=base_url()?>js/scrolltop/jquery.easing.1.3.js"></script>
        
        <script type="text/javascript" src="<?=base_url()?>js/signDialog/modernizr.custom.dialog.js"></script>

        <script src="<?=base_url()?>js/jquery.json-2.2.min.js" type="text/javascript"></script>     




<title><?php echo $meta["title"];?></title>
</head>
<body style="margin:0px">
<div class="top-container"></div>


<style>
*,
*:after,
*:before {
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	box-sizing: border-box;
	padding: 0;
	margin: 0;
}

</style>


