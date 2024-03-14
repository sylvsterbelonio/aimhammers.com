<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ctrlbloglearnmore extends CI_Controller {

     function __construct() 
        { 
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model('blog/Mdlgeneral');
        $this->load->library(array('form_validation','session'));        
        $this->load->model('blog/Mdlmetaproperties');  
        $this->load->model('blog/Mdlshopproducts');
        $this->load->model('blog/Mdlmenu');     
        $this->load->model("blog/Mdlvideosearch");
        $this->load->model("blog/Mdlpages");
        $this->load->model("Mdlsystemuser");
        $this->load->model('Mdlproduct');
        $this->load->library('Validator');
        $this->load->library('Number');
        $this->load->library('Navhead');
        $this->load->model("blog/Mdllearnmore");
        $this->load->library('Core');
        $this->load->library('Color');
        $this->load->library("Language");       
        $this->load->library("Url"); 
        
        $this->load->database();
        }
        
      function index()
        {
        
        //IMPORTANT TO UPDATE SITES NAME URL//
        $Sitename = $this->uri->segment(1);$this->core->init();if($Sitename!=""){$PIID=$this->Mdlaccounts->getAccountPIID($Sitename);           $this->core->setData($PIID,$Sitename);}
        //////////////////////////////////////
        

        $this->load->view('blog/header/Header2'); 
        $this->load->view('blog/Cssglobal');
        $this->load->view('controls/share/Share');   
        $this->load->view('controls/scrolltop/Autoscrolltop');
        $this->load->view('blog/header/Topbar');     
        $this->load->view('controls/menu/Menu');   
        
        $data["category"]="Learn More";
        $this->load->view('blog/content/learnmore/Navheading',$data); 
        $this->load->view('blog/content/learnmore/Learnmore');
        $this->load->view('blog/footer/Footer'); 
        
        }
        
      function productPresentation()
        {
        //IMPORTANT TO UPDATE SITES NAME URL//
        $Sitename = $this->uri->segment(1);$this->core->init();if($Sitename!=""){$PIID=$this->Mdlaccounts->getAccountPIID($Sitename);           $this->core->setData($PIID,$Sitename);}
        //////////////////////////////////////
                    
        $this->load->view('blog/header/Header2'); 
        $this->load->view('blog/Cssglobal');
        $this->load->view('controls/share/Share');   
        $this->load->view('controls/scrolltop/Autoscrolltop');
        $this->load->view('blog/header/Topbar');     
        $this->load->view('controls/menu/Menu');   
        
        $data["category"]="Learn More[learnmore]";
        $data["division"]="Product Presentation";
        $this->load->view('blog/content/learnmore/Navheading',$data); 
        $this->load->view('blog/content/learnmore/Videosearch');
        $this->load->view('blog/footer/Footer');              
        
        }  
        
      function aim_trainings()
        {

        //IMPORTANT TO UPDATE SITES NAME URL//
        $Sitename = $this->uri->segment(1);$this->core->init();if($Sitename!=""){$PIID=$this->Mdlaccounts->getAccountPIID($Sitename);           $this->core->setData($PIID,$Sitename);}
        //////////////////////////////////////        
        
        $this->load->view('blog/header/Header2'); 
        $this->load->view('blog/Cssglobal');
        $this->load->view('controls/share/Share');   
        $this->load->view('controls/scrolltop/Autoscrolltop');
        $this->load->view('blog/header/Topbar');     
        $this->load->view('controls/menu/Menu');   
        
        $data["category"]="Learn More[learnmore]";
        $data["division"]="Aim Global Trainings";
        $this->load->view('blog/content/learnmore/Navheading',$data); 
        $this->load->view('blog/content/learnmore/Videosearchtrainings');
        $this->load->view('blog/footer/Footer');       
            
        }
        
      function getRightListMore()
        {
        //echo $_POST["videoVersion"];
        if(isset($_POST["data"]) && isset($_POST["type"]) && isset($_POST["videoVersion"])) 
        echo $this->Mdlvideosearch->getRightListVideos($this->crypt->encrypt($_POST["type"]),$_POST["data"],$this->crypt->encrypt($_POST["videoVersion"]),$this->crypt->encrypt($_POST["postID"]),$_POST["searchTag"]);
        else $this->load->view('errors/html/Error_route'); 
        }          
      function getListMore()
        {
        
        if(isset($_POST["data"]) && isset($_POST["type"]) && isset($_POST["videoVersion"])) echo $this->Mdlvideosearch->getListVideos($this->crypt->encrypt($_POST["type"]),$_POST["data"],$_POST["videoVersion"]);
        else $this->load->view('errors/html/Error_route'); 
        }  
        
      function searchRightListMore()
        {
        if(isset($_POST["tag"]) && isset($_POST["data"]) && isset($_POST["type"]) && isset($_POST["search"]) && isset($_POST["videoVersion"])) 
        echo $this->Mdlvideosearch->searchRightListVideos($this->crypt->encrypt($_POST["type"]),$_POST["data"],$_POST["tag"],$_POST["videoVersion"],$_POST["postID"],$_POST["search"]);
        else 
        $this->load->view('errors/html/Error_route'); 
        }         
        
      function searchListMore()
        {
        if(isset($_POST["type"]) && isset($_POST["search"]) && isset($_POST["videoVersion"])) echo $this->Mdlvideosearch->searchListVideos($this->crypt->encrypt($_POST["type"]),$_POST["search"],$_POST["videoVersion"]);
        else $this->load->view('errors/html/Error_route'); 
        // echo $this->mdlVideoSearch->searchListVideos($this->crypt->encrypt("Product Info"),"");
        }          


                
      function companypolicy()
        {

        //IMPORTANT TO UPDATE SITES NAME URL//
        $Sitename = $this->uri->segment(1);$this->core->init();if($Sitename!=""){$PIID=$this->Mdlaccounts->getAccountPIID($Sitename);           $this->core->setData($PIID,$Sitename);}
        //////////////////////////////////////
                   
        $this->load->view('blog/Cssglobal');
        $this->load->view('controls/share/Share');   
        $this->load->view('blog/header/Header2'); 
        $this->load->view('controls/scrolltop/Autoscrolltop');
        $this->load->view('blog/header/Topbar');     
        $this->load->view('controls/menu/Menu');   
        

        $data["category"]="Learn More[learnmore]";
        $data["division"]="Company Policies";
        $this->load->view('blog/content/learnmore/Navheading',$data); 
        $this->load->view('blog/content/learnmore/Companypolicy');
        $this->load->view('blog/footer/Footer');         
        }
        
}

?>
