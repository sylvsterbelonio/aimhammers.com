<?php
$this->load->model("blog/Mdlpages");
$page = $this->Mdlpages->load("alive-foundation");
?>
<div class="ui-widget-content" >
<?=$page?>  
</div>
<style>.text-wrapper-header,.bxslider li h1,.text-wrapper-paragraph{font-size:130%;}</style>

