<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ctrlblogabout extends CI_Controller {

     function __construct() 
        { 
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library(array('form_validation','session')); 
        $this->load->model('blog/Mdlmetaproperties');          
        $this->load->model('blog/Mdlaccounts');   
        $this->load->model('blog/Mdlgeneral');
        $this->load->model('blog/Mdlmenu');
        $this->load->model('blog/Mdlcompany');
        $this->load->model("blog/Mdlpages");
        $this->load->library("Language");
        $this->load->library("Validator");
        $this->load->library("Core");
        $this->load->library("Color");
        $this->load->database();
        }
        
     public function index()
        {
        
        echo "BLOG AGOUT";
        
        }   
     public function company()
        {
        
        
        $Sitename = $this->uri->segment(1); // action
        
      
        $this->core->init();
        if($Sitename!="")
          {
          $PIID=$this->Mdlaccounts->getAccountPIID($Sitename);           
          $this->core->setData($PIID,$Sitename);             
          }
        
  
        $this->load->view('blog/header/Header2'); 
        $this->load->view('blog/Cssglobal');
        $this->load->view('controls/share/Share');
           
        $this->load->view('controls/scrolltop/Autoscrolltop');
        
        $this->load->view('blog/header/Topbar');     
        $this->load->view('controls/menu/Menu');   
             
         
   
         
        $data["caption"]="Our Company";
        $this->load->view('blog/content/company/Navheading',$data); 
        $data["link"]="";
         
        $this->load->view('blog/content/company/Company_toolstrip');
    
        if(isset($_GET["link"])) $data["link"] = $_GET["link"]; 
        $this->load->view('blog/content/company/Company',$data);  
        
        $this->load->view('blog/footer/Footer');      
        
     
        }
        
   
     function board_of_directors()
        {
        

        $this->load->view('blog/header/Header2'); 
        $this->load->view('blog/Cssglobal');
        $this->load->view('controls/share/Share');
        $this->load->view('controls/scrolltop/Autoscrolltop');
        $this->load->view('blog/header/Topbar');     
        $this->load->view('controls/menu/Menu');   
        

        
        $data["caption"]="Board of Directors";
        $this->load->view('blog/content/company/Navheading',$data);
        $this->load->view('blog/content/company/Company_toolstrip');      
        $this->load->view('blog/content/company/Boardofdirectors');
       
        $this->load->view('blog/footer/Footer');         
        }   
        
     function company_partners()
        {
        $this->load->view('blog/header/Header2'); 
        $this->load->view('blog/Cssglobal');
        $this->load->view('controls/share/Share');
        $this->load->view('controls/scrolltop/Autoscrolltop');
        $this->load->view('blog/header/Topbar');     
        $this->load->view('controls/menu/Menu');   
        
      
        
        $data["caption"]="Business Partners";
        $this->load->view('blog/content/company/Navheading',$data);           
        $this->load->view('blog/content/company/Company_toolstrip');
        $this->load->view('blog/content/company/Companypartners');
        
        $this->load->view('blog/footer/Footer');  
        }   
        
     function alive_foundation()
        {
        //PERFECT CODE - BY GOD'S POWER!! JESUS CHRIST
        $this->load->view('blog/header/Header2'); 
        $this->load->view('blog/Cssglobal');
        $this->load->view('controls/share/Share');
        $this->load->view('controls/scrolltop/Autoscrolltop');
        $this->load->view('blog/header/Topbar');     
        $this->load->view('controls/menu/Menu');   
        
        $data["caption"]="Alive Foundation";
        $this->load->view('blog/content/company/Navheading',$data);             
        $this->load->view('blog/content/company/Company_toolstrip');
        $this->load->view('blog/content/company/Alivefoundation');   
        $this->load->view('blog/footer/Footer');
             
        }   
        
     function tie_ups()
        {
        $this->load->view('blog/header/Header2'); 
        $this->load->view('blog/Cssglobal');
        $this->load->view('controls/share/Share');
        $this->load->view('controls/scrolltop/Autoscrolltop');
        $this->load->view('blog/header/Topbar');     
        $this->load->view('controls/menu/Menu');   
        
        $data["caption"]="Tie Up Schools";
        $this->load->view('blog/content/company/Navheading',$data);             
        $this->load->view('blog/content/company/Company_toolstrip');        
        $this->load->view("blog/content/company/Tieups");
        $this->load->view('blog/footer/Footer');
        }   
        
     function getData()
        {
        if(isset($_POST["title"]))
            {
            
               $type = $_POST["title"];
               if($type=="Company Profile") echo $this->Mdlcompany->getData("company?link=Company%20Profile");
               else if($type=="The Right Business") echo  $this->Mdlcompany->getData("company?link=The%20Right%20Business");
               else if($type=="Company Presentation") echo  $this->Mdlcompany->getData("company?link=Company%20Presentation");
               else if($type=="Vision, Mission and Objectives") echo  $this->Mdlcompany->getData("company?link=Vision,%20Mission%20and%20Objectives");
            }
        else
            {
                $this->load->view("errors/html/Error_route");
            }
      
        }      
      
     
}        
?>
