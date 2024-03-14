<?php
$this->load->model("mdlProduct");
$theme = $this->mdlGeneral->getTheme();
?>


<style>
.comments{
max-width:<?=$theme["maxWidth"]?>;
margin:0px auto;
border:1px solid <?=$theme["container2"]?>;
background: <?=$theme["container"]?>;
padding:20px;
}
.list-comments
{
width:100%;
margin:5px;
border: <?=$theme["nBorderColor"]?>;
background:red;
}
</style>



<div class="comments">
<h1>Comments</h1>
  <div class="list-comments">
  asdawdawdw
  </div>

</div>
