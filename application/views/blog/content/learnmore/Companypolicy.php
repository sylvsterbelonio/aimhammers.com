<?php
$this->load->model("blog/Mdlpages");
$page = $this->Mdlpages->load("learnmore/company-policies");
?>
<div class="ui-widget-content" ><?=$page?></div>
<style>.text-wrapper-header{font-size:130%;}</style>
