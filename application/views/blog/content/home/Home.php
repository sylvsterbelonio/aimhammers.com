<?php
$this->load->model("Mdlpages");
$data = $this->Mdlpages->load("home");

 $this->load->model("blog/Mdlattributes");
 $attr = $this->Mdlattributes->getSliceBoxAttr(0);
//if($data!='false') echo $data;
//else $this->load->view("errors/html/error_route");



$this->load->model("Mdlgeneral");
$this->load->library("Color");
$this->load->model("Mdlslideshow");
$slideshows = $this->Mdlslideshow->getSlideShow();  
$theme = $this->Mdlgeneral->getTheme();
$rgb = $this->color->string_to_rgb($theme["nBackColor"]);
?>


 
 
 

        <?=$data?>
  
