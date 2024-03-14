<?php
$this->load->model("blog/mdlGeneral");
 $this->load->library('Color');
$theme = $this->mdlGeneral->getTheme();
$rgb = $this->color->string_to_rgb($theme["container"]);
$red = $this->color->string_to_rgb($theme["nBorderColor"]);
?>


<style>




/* STRUCTURE */

#pagewrap {
	width: <?=$theme["maxWidth"]?>px;
	margin: 0px auto;
	border:1px solid red;
	background:rgba(<?=$red?>,0.5);
}

.clearfix:before, .clearfix:after { content: " "; display: table; }
.clearfix:after { clear: both; }
.main-post{
	margin: 0 auto;
}
.column {
	float: left;
	width: 33.33%;
	min-height: 300px;
	position: ;
	border: 1px solid <?=$theme["nBorderColor"]?>;
		background-color: <?=$theme["nBackColor"]?>;
		background-image: -moz-linear-gradient(<?=$theme["nBorderColor"]?>, <?=$theme["pBackColor"]?>); 
		background-image: -webkit-gradient(linear, left top, left bottom, from(<?=$theme["nBorderColor"]?>), to(<?=$theme["pBackColor"]?>));	
		background-image: -webkit-linear-gradient(<?=$theme["nBorderColor"]?>, <?=$theme["pBackColor"]?>);	
		background-image: -o-linear-gradient(<?=$theme["nBorderColor"]?>, <?=$theme["pBackColor"]?>);
		background-image: -ms-linear-gradient(<?=$theme["nBorderColor"]?>, <?=$theme["pBackColor"]?>);
		background-image: linear-gradient(<?=$theme["nBorderColor"]?>, <?=$theme["pBackColor"]?>);
			-moz-transition: all 0.6s;  
  -webkit-transition: all 0.6s;  
  -ms-transition: all 0.6s;
  transition: all 0.6s;
}

.column:nth-child(2),.column:nth-child(3) {
				-moz-box-shadow: 0 1px 1px <?=$theme["pBackColor"]?>, 0 1px 0 <?=$theme["nBackColor"]?> inset;
		-webkit-box-shadow: 0 1px 1px <?=$theme["pBackColor"]?>, 0 1px 0 <?=$theme["nBackColor"]?> inset;
		box-shadow: 0 1px 1px <?=$theme["pBackColor"]?>, 0 1px 0 <?=$theme["nBackColor"]?> inset;
}

@media screen and (max-width: 65.0625em) {
.column{
width:33.2%;
}
}
@media screen and (max-width: 64.5em) {
.column{
width:32.5%;
}
}

@media screen and (max-width: 61.0625em) {
.column{
width:28%;
}
}

@media screen and (max-width: 55.0625em) {
.column{
width:25%;
}
}

@media screen and (max-width: 50.0625em) {	
.column{		
width: 100%;		
min-width:10px;
}	
.column h3{
text-align:left;
}
.column:nth-child(2) ,.column:nth-child(3)
{						
-moz-box-shadow: 0 1px 1px <?=$theme["pBackColor"]?>, 0 1px 0 <?=$theme["nBackColor"]?> inset;
-webkit-box-shadow: 0 1px 1px <?=$theme["pBackColor"]?>, 0 1px 0 <?=$theme["nBackColor"]?> inset;
box-shadow: 0 1px 1px <?=$theme["pBackColor"]?>, 0 1px 0 <?=$theme["nBackColor"]?> inset;}
}
.column h3{
font-size:250%;
padding:10px;
		border: 1px solid <?=$theme["nBorderColor"]?>;
		background-color: <?=$theme["nBorderColor"]?>;
		background-image: -moz-linear-gradient(<?=$theme["nBorderColor"]?>, <?=$theme["pBackColor"]?>); 
		background-image: -webkit-gradient(linear, left top, left bottom, from(<?=$theme["nBorderColor"]?>), to(<?=$theme["pBackColor"]?>));	
		background-image: -webkit-linear-gradient(<?=$theme["nBorderColor"]?>, <?=$theme["pBackColor"]?>);	
		background-image: -o-linear-gradient(<?=$theme["nBorderColor"]?>, <?=$theme["pBackColor"]?>);
		background-image: -ms-linear-gradient(<?=$theme["nBorderColor"]?>, <?=$theme["pBackColor"]?>);
		background-image: linear-gradient(<?=$theme["nBorderColor"]?>, <?=$theme["pBackColor"]?>);
				-moz-box-shadow: 0 1px 1px <?=$theme["pBackColor"]?>, 0 1px 0 <?=$theme["nBackColor"]?> inset;
		-webkit-box-shadow: 0 1px 1px <?=$theme["pBackColor"]?>, 0 1px 0 <?=$theme["nBackColor"]?> inset;
		box-shadow: 0 1px 1px <?=$theme["pBackColor"]?>, 0 1px 0 <?=$theme["nBackColor"]?> inset;
color:<?=$theme["nForeColor"]?>;
}

.postList{
			-moz-transition: all 0.6s;  
  -webkit-transition: all 0.6s;  
  -ms-transition: all 0.6s;
  transition: all 0.6s;
}

.postList{
    color:<?=$theme["hForeColor"]?>;
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
		box-shadow: 0 1px 1px white, 0 1px 0 <?=$theme["container"]?> inset;		
}
.postList:hover{
color:<?=$theme["hForeColor"]?>;
		border: 1px solid <?=$theme["nBorderColor"]?>;
		background: <?=$theme["pBackColor"]?>;
		-moz-box-shadow: 0 1px 1px <?=$theme["pBackColor"]?>, 0 1px 0 <?=$theme["nBackColor"]?> inset;
		-webkit-box-shadow: 0 1px 1px <?=$theme["pBackColor"]?>, 0 1px 0 <?=$theme["nBackColor"]?> inset;
		box-shadow: 0 1px 1px <?=$theme["pBackColor"]?>, 0 1px 0 <?=$theme["nBackColor"]?> inset;
cursor:pointer;
}
</style>

  <link rel="stylesheet" href="<?=base_url()?>/controls/bxslider/css/jquery.bxslider.css" type="text/css" />
  <script src="<?=base_url()?>/controls/bxslider/js/jquery.bxslider.js"></script>
<style>


.bx-wrapper .bx-pager.bx-default-pager a:hover,
.bx-wrapper .bx-pager.bx-default-pager a.active {
	background: <?=$theme["hForeColor"]?>;
}
.bx-wrapper .bx-pager.bx-default-pager a {
	background: <?=$theme["container"]?>;
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

.bxslider{

}
.bx-next, .bx-prev{
display:none
}
.bx-wrapper {
margin: 0 auto 40px;
background:red;
}
.bx-content-paragraph{
color:<?=$theme["nForeColor"]?>;
}


</style>  
<div id="pagewrap">

        

		
 <div class="main-post clearfix">
            <div  class="column">
            <h3 align=center>CURRENT ACTIVITIES</h3>
            <div class="postWrapper">

              <ul id="bxslider1" class='bxslider'>
                <li>
                
                <div class="postList" style="padding:5px">
                <table style="margin:5px;width:100%" border=0>
                <tr>
                <td rowspan=3 style="width:70px;" valign=top><img src="images/system/noproduct.png" width=70 height=70 ></td><td valign=top height=20 >
                <span style="font-size:16px;" class="hover"><b>YOUR TITLE NAME HERE</b><br>
                <i><span class="bx-content-paragraph" >by: Sylvster</span></i></td>
                </tr>
                <tr>
                <td style="font-size:14px;" class="bx-content-paragraph">This is the sentence you want to see this and see the wonderful.This is the sentence you want to see this ... </td>
                </tr>
                <tr>
                <td class="hover" align=right style="font-size:12px;padding:5px;"><i>March 10, 2016 04:23 AM&nbsp;</i></td>
                </tr>
                </table>
                </div>


                
                <div class="postList" style="padding:5px">
                <table style="margin:5px;width:100%" border=0>
                <tr>
                <td rowspan=3 style="width:70px;" valign=top><img src="images/system/noproduct.png" width=70 height=70 ></td><td valign=top height=20 >
                <span style="font-size:16px;" class="hover"><b>YOUR TITLE NAME HERE</b><br>
                <i><span class="bx-content-paragraph" >by: Sylvster</span></i></td>
                </tr>
                <tr>
                <td style="font-size:14px;" class="bx-content-paragraph">This is the sentence you want to see this and see the wonderful.This is the sentence you want to see this ... </td>
                </tr>
                <tr>
                <td class="hover" align=right style="font-size:12px;padding:5px;"><i>March 10, 2016 04:23 AM&nbsp;</i></td>
                </tr>
                </table>
                </div>
                
                <div class="postList" style="padding:5px">
                <table style="margin:5px;width:100%" border=0>
                <tr>
                <td rowspan=3 style="width:70px;" valign=top><img src="images/system/noproduct.png" width=70 height=70 ></td><td valign=top height=20 >
                <span style="font-size:16px;" class="hover"><b>YOUR TITLE NAME HERE</b><br>
                <i>by: Sylvster</i></td>
                </tr>
                <tr>
                <td style="font-size:14px;" class="bx-content-paragraph">This is the sentence you want to see this and see the wonderful.This is the sentence you want to see this ... </td>
                </tr>
                <tr>
                <td class="hover" align=right style="font-size:12px;padding:5px;"><i>March 10, 2016 04:23 AM&nbsp;</i></td>
                </tr>
                </table>
                </div>
               
                                                              
                </li>
                <li>
                
                
               <div class="postList" style="padding:5px">
                <table style="margin:5px;width:100%" border=0>
                <tr>
                <td rowspan=3 style="width:70px;" valign=top><img src="images/system/noproduct.png" width=70 height=70 ></td><td valign=top height=20 >
                <span style="font-size:16px;" class="hover"><b>YOUR TITLE NAME HERE</b><br>
                <i><span class="bx-content-paragraph" >by: Sylvster</span></i></td>
                </tr>
                <tr>
                <td style="font-size:14px;" class="bx-content-paragraph">This is the sentence you want to see this and see the wonderful.This is the sentence you want to see this ... </td>
                </tr>
                <tr>
                <td class="hover" align=right style="font-size:12px;padding:5px;"><i>March 10, 2016 04:23 AM&nbsp;</i></td>
                </tr>
                </table>
                </div>


                
                <div class="postList" style="padding:5px">
                <table style="margin:5px;width:100%" border=0>
                <tr>
                <td rowspan=3 style="width:70px;" valign=top><img src="images/system/noproduct.png" width=70 height=70 ></td><td valign=top height=20 >
                <span style="font-size:16px;" class="hover"><b>YOUR TITLE NAME HERE</b><br>
                <i><span class="bx-content-paragraph" >by: Sylvster</span></i></td>
                </tr>
                <tr>
                <td style="font-size:14px;" class="bx-content-paragraph">This is the sentence you want to see this and see the wonderful.This is the sentence you want to see this ... </td>
                </tr>
                <tr>
                <td class="hover" align=right style="font-size:12px;padding:5px;"><i>March 10, 2016 04:23 AM&nbsp;</i></td>
                </tr>
                </table>
                </div>
                
                <div class="postList" style="padding:5px">
                <table style="margin:5px;width:100%" border=0>
                <tr>
                <td rowspan=3 style="width:70px;" valign=top><img src="images/system/noproduct.png" width=70 height=70 ></td><td valign=top height=20 >
                <span style="font-size:16px;" class="hover"><b>YOUR TITLE NAME HERE</b><br>
                <i>by: Sylvster</i></td>
                </tr>
                <tr>
                <td style="font-size:14px;" class="bx-content-paragraph">This is the sentence you want to see this and see the wonderful.This is the sentence you want to see this ... </td>
                </tr>
                <tr>
                <td class="hover" align=right style="font-size:12px;padding:5px;"><i>March 10, 2016 04:23 AM&nbsp;</i></td>
                </tr>
                </table>
                </div>
                
                
                </li>
                <li>
                
               <div class="postList" style="padding:5px">
                <table style="margin:5px;width:100%" border=0>
                <tr>
                <td rowspan=3 style="width:70px;" valign=top><img src="images/system/noproduct.png" width=70 height=70 ></td><td valign=top height=20 >
                <span style="font-size:16px;" class="hover"><b>YOUR TITLE NAME HERE</b><br>
                <i><span class="bx-content-paragraph" >by: Sylvster</span></i></td>
                </tr>
                <tr>
                <td style="font-size:14px;" class="bx-content-paragraph">This is the sentence you want to see this and see the wonderful.This is the sentence you want to see this ... </td>
                </tr>
                <tr>
                <td class="hover" align=right style="font-size:12px;padding:5px;"><i>March 10, 2016 04:23 AM&nbsp;</i></td>
                </tr>
                </table>
                </div>


                
                <div class="postList" style="padding:5px">
                <table style="margin:5px;width:100%" border=0>
                <tr>
                <td rowspan=3 style="width:70px;" valign=top><img src="images/system/noproduct.png" width=70 height=70 ></td><td valign=top height=20 >
                <span style="font-size:16px;" class="hover"><b>YOUR TITLE NAME HERE</b><br>
                <i><span class="bx-content-paragraph" >by: Sylvster</span></i></td>
                </tr>
                <tr>
                <td style="font-size:14px;" class="bx-content-paragraph">This is the sentence you want to see this and see the wonderful.This is the sentence you want to see this ... </td>
                </tr>
                <tr>
                <td class="hover" align=right style="font-size:12px;padding:5px;"><i>March 10, 2016 04:23 AM&nbsp;</i></td>
                </tr>
                </table>
                </div>
                
                <div class="postList" style="padding:5px">
                <table style="margin:5px;width:100%" border=0>
                <tr>
                <td rowspan=3 style="width:70px;" valign=top><img src="images/system/noproduct.png" width=70 height=70 ></td><td valign=top height=20 >
                <span style="font-size:16px;" class="hover"><b>YOUR TITLE NAME HERE</b><br>
                <i>by: Sylvster</i></td>
                </tr>
                <tr>
                <td style="font-size:14px;" class="bx-content-paragraph">This is the sentence you want to see this and see the wonderful.This is the sentence you want to see this ... </td>
                </tr>
                <tr>
                <td class="hover" align=right style="font-size:12px;padding:5px;"><i>March 10, 2016 04:23 AM&nbsp;</i></td>
                </tr>
                </table>
                </div>
                
                </li>
              </ul>
              
              
    




                                            
            </div>
  			   	</div>
  				  <div class="column">
            <h3 align=center>HEALTH & EDUCATION</h3>

              <ul id="bxslider2" class='bxslider'>
                <li>
                
                <div class="postList" style="padding:5px">
                <table style="margin:5px;width:100%" border=0>
                <tr>
                <td rowspan=3 style="width:70px;" valign=top><img src="images/system/noproduct.png" width=70 height=70 ></td><td valign=top height=20 >
                <span style="font-size:16px;" class="hover"><b>YOUR TITLE NAME HERE</b><br>
                <i><span class="bx-content-paragraph" >by: Sylvster</span></i></td>
                </tr>
                <tr>
                <td style="font-size:14px;" class="bx-content-paragraph">This is the sentence you want to see this and see the wonderful.This is the sentence you want to see this ... </td>
                </tr>
                <tr>
                <td class="hover" align=right style="font-size:12px;padding:5px;"><i>March 10, 2016 04:23 AM&nbsp;</i></td>
                </tr>
                </table>
                </div>


                
                <div class="postList" style="padding:5px">
                <table style="margin:5px;width:100%" border=0>
                <tr>
                <td rowspan=3 style="width:70px;" valign=top><img src="images/system/noproduct.png" width=70 height=70 ></td><td valign=top height=20 >
                <span style="font-size:16px;" class="hover"><b>YOUR TITLE NAME HERE</b><br>
                <i><span class="bx-content-paragraph" >by: Sylvster</span></i></td>
                </tr>
                <tr>
                <td style="font-size:14px;" class="bx-content-paragraph">This is the sentence you want to see this and see the wonderful.This is the sentence you want to see this ... </td>
                </tr>
                <tr>
                <td class="hover" align=right style="font-size:12px;padding:5px;"><i>March 10, 2016 04:23 AM&nbsp;</i></td>
                </tr>
                </table>
                </div>
                
                <div class="postList" style="padding:5px">
                <table style="margin:5px;width:100%" border=0>
                <tr>
                <td rowspan=3 style="width:70px;" valign=top><img src="images/system/noproduct.png" width=70 height=70 ></td><td valign=top height=20 >
                <span style="font-size:16px;" class="hover"><b>YOUR TITLE NAME HERE</b><br>
                <i>by: Sylvster</i></td>
                </tr>
                <tr>
                <td style="font-size:14px;" class="bx-content-paragraph">This is the sentence you want to see this and see the wonderful.This is the sentence you want to see this ... </td>
                </tr>
                <tr>
                <td class="hover" align=right style="font-size:12px;padding:5px;"><i>March 10, 2016 04:23 AM&nbsp;</i></td>
                </tr>
                </table>
                </div>
               
                                                              
                </li>
                <li>
                
                
               <div class="postList" style="padding:5px">
                <table style="margin:5px;width:100%" border=0>
                <tr>
                <td rowspan=3 style="width:70px;" valign=top><img src="images/system/noproduct.png" width=70 height=70 ></td><td valign=top height=20 >
                <span style="font-size:16px;" class="hover"><b>YOUR TITLE NAME HERE</b><br>
                <i><span class="bx-content-paragraph" >by: Sylvster</span></i></td>
                </tr>
                <tr>
                <td style="font-size:14px;" class="bx-content-paragraph">This is the sentence you want to see this and see the wonderful.This is the sentence you want to see this ... </td>
                </tr>
                <tr>
                <td class="hover" align=right style="font-size:12px;padding:5px;"><i>March 10, 2016 04:23 AM&nbsp;</i></td>
                </tr>
                </table>
                </div>


                
                <div class="postList" style="padding:5px">
                <table style="margin:5px;width:100%" border=0>
                <tr>
                <td rowspan=3 style="width:70px;" valign=top><img src="images/system/noproduct.png" width=70 height=70 ></td><td valign=top height=20 >
                <span style="font-size:16px;" class="hover"><b>YOUR TITLE NAME HERE</b><br>
                <i><span class="bx-content-paragraph" >by: Sylvster</span></i></td>
                </tr>
                <tr>
                <td style="font-size:14px;" class="bx-content-paragraph">This is the sentence you want to see this and see the wonderful.This is the sentence you want to see this ... </td>
                </tr>
                <tr>
                <td class="hover" align=right style="font-size:12px;padding:5px;"><i>March 10, 2016 04:23 AM&nbsp;</i></td>
                </tr>
                </table>
                </div>
                
                <div class="postList" style="padding:5px">
                <table style="margin:5px;width:100%" border=0>
                <tr>
                <td rowspan=3 style="width:70px;" valign=top><img src="images/system/noproduct.png" width=70 height=70 ></td><td valign=top height=20 >
                <span style="font-size:16px;" class="hover"><b>YOUR TITLE NAME HERE</b><br>
                <i>by: Sylvster</i></td>
                </tr>
                <tr>
                <td style="font-size:14px;" class="bx-content-paragraph">This is the sentence you want to see this and see the wonderful.This is the sentence you want to see this ... </td>
                </tr>
                <tr>
                <td class="hover" align=right style="font-size:12px;padding:5px;"><i>March 10, 2016 04:23 AM&nbsp;</i></td>
                </tr>
                </table>
                </div>
                
                
                </li>
                <li>
                
               <div class="postList" style="padding:5px">
                <table style="margin:5px;width:100%" border=0>
                <tr>
                <td rowspan=3 style="width:70px;" valign=top><img src="images/system/noproduct.png" width=70 height=70 ></td><td valign=top height=20 >
                <span style="font-size:16px;" class="hover"><b>YOUR TITLE NAME HERE</b><br>
                <i><span class="bx-content-paragraph" >by: Sylvster</span></i></td>
                </tr>
                <tr>
                <td style="font-size:14px;" class="bx-content-paragraph">This is the sentence you want to see this and see the wonderful.This is the sentence you want to see this ... </td>
                </tr>
                <tr>
                <td class="hover" align=right style="font-size:12px;padding:5px;"><i>March 10, 2016 04:23 AM&nbsp;</i></td>
                </tr>
                </table>
                </div>


                
                <div class="postList" style="padding:5px">
                <table style="margin:5px;width:100%" border=0>
                <tr>
                <td rowspan=3 style="width:70px;" valign=top><img src="images/system/noproduct.png" width=70 height=70 ></td><td valign=top height=20 >
                <span style="font-size:16px;" class="hover"><b>YOUR TITLE NAME HERE</b><br>
                <i><span class="bx-content-paragraph" >by: Sylvster</span></i></td>
                </tr>
                <tr>
                <td style="font-size:14px;" class="bx-content-paragraph">This is the sentence you want to see this and see the wonderful.This is the sentence you want to see this ... </td>
                </tr>
                <tr>
                <td class="hover" align=right style="font-size:12px;padding:5px;"><i>March 10, 2016 04:23 AM&nbsp;</i></td>
                </tr>
                </table>
                </div>
                
                <div class="postList" style="padding:5px">
                <table style="margin:5px;width:100%" border=0>
                <tr>
                <td rowspan=3 style="width:70px;" valign=top><img src="images/system/noproduct.png" width=70 height=70 ></td><td valign=top height=20 >
                <span style="font-size:16px;" class="hover"><b>YOUR TITLE NAME HERE</b><br>
                <i>by: Sylvster</i></td>
                </tr>
                <tr>
                <td style="font-size:14px;" class="bx-content-paragraph">This is the sentence you want to see this and see the wonderful.This is the sentence you want to see this ... </td>
                </tr>
                <tr>
                <td class="hover" align=right style="font-size:12px;padding:5px;"><i>March 10, 2016 04:23 AM&nbsp;</i></td>
                </tr>
                </table>
                </div>
                
                </li>
              </ul>
              </div>
  				  <div class="column">
            <h3 align=center>BUSINESS TRAININGS</h3>
 
              <ul id="bxslider3" class='bxslider'>
                <li>
                
                <div class="postList" style="padding:5px">
                <table style="margin:5px;width:100%" border=0>
                <tr>
                <td rowspan=3 style="width:70px;" valign=top><img src="images/system/noproduct.png" width=70 height=70 ></td><td valign=top height=20 >
                <span style="font-size:16px;" class="hover"><b>YOUR TITLE NAME HERE</b><br>
                <i><span class="bx-content-paragraph" >by: Sylvster</span></i></td>
                </tr>
                <tr>
                <td style="font-size:14px;" class="bx-content-paragraph">This is the sentence you want to see this and see the wonderful.This is the sentence you want to see this ... </td>
                </tr>
                <tr>
                <td class="hover" align=right style="font-size:12px;padding:5px;"><i>March 10, 2016 04:23 AM&nbsp;</i></td>
                </tr>
                </table>
                </div>


                
                <div class="postList" style="padding:5px">
                <table style="margin:5px;width:100%" border=0>
                <tr>
                <td rowspan=3 style="width:70px;" valign=top><img src="images/system/noproduct.png" width=70 height=70 ></td><td valign=top height=20 >
                <span style="font-size:16px;" class="hover"><b>YOUR TITLE NAME HERE</b><br>
                <i><span class="bx-content-paragraph" >by: Sylvster</span></i></td>
                </tr>
                <tr>
                <td style="font-size:14px;" class="bx-content-paragraph">This is the sentence you want to see this and see the wonderful.This is the sentence you want to see this ... </td>
                </tr>
                <tr>
                <td class="hover" align=right style="font-size:12px;padding:5px;"><i>March 10, 2016 04:23 AM&nbsp;</i></td>
                </tr>
                </table>
                </div>
                
                <div class="postList" style="padding:5px">
                <table style="margin:5px;width:100%" border=0>
                <tr>
                <td rowspan=3 style="width:70px;" valign=top><img src="images/system/noproduct.png" width=70 height=70 ></td><td valign=top height=20 >
                <span style="font-size:16px;" class="hover"><b>YOUR TITLE NAME HERE</b><br>
                <i>by: Sylvster</i></td>
                </tr>
                <tr>
                <td style="font-size:14px;" class="bx-content-paragraph">This is the sentence you want to see this and see the wonderful.This is the sentence you want to see this ... </td>
                </tr>
                <tr>
                <td class="hover" align=right style="font-size:12px;padding:5px;"><i>March 10, 2016 04:23 AM&nbsp;</i></td>
                </tr>
                </table>
                </div>
               
                                                              
                </li>
                <li>
                
                
               <div class="postList" style="padding:5px">
                <table style="margin:5px;width:100%" border=0>
                <tr>
                <td rowspan=3 style="width:70px;" valign=top><img src="images/system/noproduct.png" width=70 height=70 ></td><td valign=top height=20 >
                <span style="font-size:16px;" class="hover"><b>YOUR TITLE NAME HERE</b><br>
                <i><span class="bx-content-paragraph" >by: Sylvster</span></i></td>
                </tr>
                <tr>
                <td style="font-size:14px;" class="bx-content-paragraph">This is the sentence you want to see this and see the wonderful.This is the sentence you want to see this ... </td>
                </tr>
                <tr>
                <td class="hover" align=right style="font-size:12px;padding:5px;"><i>March 10, 2016 04:23 AM&nbsp;</i></td>
                </tr>
                </table>
                </div>


                
                <div class="postList" style="padding:5px">
                <table style="margin:5px;width:100%" border=0>
                <tr>
                <td rowspan=3 style="width:70px;" valign=top><img src="images/system/noproduct.png" width=70 height=70 ></td><td valign=top height=20 >
                <span style="font-size:16px;" class="hover"><b>YOUR TITLE NAME HERE</b><br>
                <i><span class="bx-content-paragraph" >by: Sylvster</span></i></td>
                </tr>
                <tr>
                <td style="font-size:14px;" class="bx-content-paragraph">This is the sentence you want to see this and see the wonderful.This is the sentence you want to see this ... </td>
                </tr>
                <tr>
                <td class="hover" align=right style="font-size:12px;padding:5px;"><i>March 10, 2016 04:23 AM&nbsp;</i></td>
                </tr>
                </table>
                </div>
                
                <div class="postList" style="padding:5px">
                <table style="margin:5px;width:100%" border=0>
                <tr>
                <td rowspan=3 style="width:70px;" valign=top><img src="images/system/noproduct.png" width=70 height=70 ></td><td valign=top height=20 >
                <span style="font-size:16px;" class="hover"><b>YOUR TITLE NAME HERE</b><br>
                <i>by: Sylvster</i></td>
                </tr>
                <tr>
                <td style="font-size:14px;" class="bx-content-paragraph">This is the sentence you want to see this and see the wonderful.This is the sentence you want to see this ... </td>
                </tr>
                <tr>
                <td class="hover" align=right style="font-size:12px;padding:5px;"><i>March 10, 2016 04:23 AM&nbsp;</i></td>
                </tr>
                </table>
                </div>
                
                
                </li>
                <li>
                
               <div class="postList" style="padding:5px">
                <table style="margin:5px;width:100%" border=0>
                <tr>
                <td rowspan=3 style="width:70px;" valign=top><img src="images/system/noproduct.png" width=70 height=70 ></td><td valign=top height=20 >
                <span style="font-size:16px;" class="hover"><b>YOUR TITLE NAME HERE</b><br>
                <i><span class="bx-content-paragraph" >by: Sylvster</span></i></td>
                </tr>
                <tr>
                <td style="font-size:14px;" class="bx-content-paragraph">This is the sentence you want to see this and see the wonderful.This is the sentence you want to see this ... </td>
                </tr>
                <tr>
                <td class="hover" align=right style="font-size:12px;padding:5px;"><i>March 10, 2016 04:23 AM&nbsp;</i></td>
                </tr>
                </table>
                </div>


                
                <div class="postList" style="padding:5px">
                <table style="margin:5px;width:100%" border=0>
                <tr>
                <td rowspan=3 style="width:70px;" valign=top><img src="images/system/noproduct.png" width=70 height=70 ></td><td valign=top height=20 >
                <span style="font-size:16px;" class="hover"><b>YOUR TITLE NAME HERE</b><br>
                <i><span class="bx-content-paragraph" >by: Sylvster</span></i></td>
                </tr>
                <tr>
                <td style="font-size:14px;" class="bx-content-paragraph">This is the sentence you want to see this and see the wonderful.This is the sentence you want to see this ... </td>
                </tr>
                <tr>
                <td class="hover" align=right style="font-size:12px;padding:5px;"><i>March 10, 2016 04:23 AM&nbsp;</i></td>
                </tr>
                </table>
                </div>
                
                <div class="postList" style="padding:5px">
                <table style="margin:5px;width:100%" border=0>
                <tr>
                <td rowspan=3 style="width:70px;" valign=top><img src="images/system/noproduct.png" width=70 height=70 ></td><td valign=top height=20 >
                <span style="font-size:16px;" class="hover"><b>YOUR TITLE NAME HERE</b><br>
                <i>by: Sylvster</i></td>
                </tr>
                <tr>
                <td style="font-size:14px;" class="bx-content-paragraph">This is the sentence you want to see this and see the wonderful.This is the sentence you want to see this ... </td>
                </tr>
                <tr>
                <td class="hover" align=right style="font-size:12px;padding:5px;"><i>March 10, 2016 04:23 AM&nbsp;</i></td>
                </tr>
                </table>
                </div>
                

                </li>
              </ul>           
              </div>

  				  </div>
</div>

<script>
$(document).ready(function(){
  $('#bxslider1').bxSlider({
  height:500,
  auto: true, //set automatic slides
  //mode: 'vertical|horizontal|fade',
  //captions: true,
  pause: 5000,
  //infiniteLoop: false,
  //hideControlOnEnd: true,
  //startSlide: 2, //the start of slide when first loaded
  //moveSlides: 1,
  minSlides: 1, //minimum slides if zoom in
  //maxSlides: 3, //max slides to display in one container
  //slideMargin: 10, //margin of each side of every slides
  //slideWidth: 100 //the width of all slides
  //ticker: true,
  //speed:6000,  
  onSliderLoad: function(){
    // do funky JS stuff here
    //alert('Slider has finished loading. Click OK to continue!');
    $(".bx-viewport").css("height",450).css("margin-left",5);


  },
  onSlideAfter: function(){
    // do mind-blowing JS stuff here
    //alert('A slide has finished transitioning. Bravo. Click OK to continue!');
  }
});

  $('#bxslider2').bxSlider({
  height:500,
  auto: true, //set automatic slides
  pause: 7000,
  minSlides: 1, //minimum slides if zoom in
  onSliderLoad: function(){
     $(".bx-viewport").css("height",450).css("margin-left",5);
  },
  onSlideAfter: function(){
    // do mind-blowing JS stuff here
    //alert('A slide has finished transitioning. Bravo. Click OK to continue!');
  }
});

  

  $('#bxslider3').bxSlider({
  height:500,
  auto: true, //set automatic slides
  pause: 9000,
  adaptiveHeight: false,
  minSlides: 1, //minimum slides if zoom in
  onSliderLoad: function(){
     $(".bx-viewport").css("height",450).css("margin-left",5);
  },
  onSlideAfter: function(){
    // do mind-blowing JS stuff here
    //alert('A slide has finished transitioning. Bravo. Click OK to continue!');
  }
});
});
</script>
