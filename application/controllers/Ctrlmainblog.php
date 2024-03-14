<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Ctrlmainblog extends CI_Controller {

     public function __construct() 
       { 
        parent::__construct();
            $this->load->model('blog/Mdlaccounts');
	     // $config['upload_path'] = './images/data/countries';
                      		//$config['allowed_types'] = 'gif|jpg|png';
                      		//$config['max_size']	= '500';
                      		//$config['max_width']  = '100';
                      		//$config['max_height']  = '100';
                      		//$this->load->library('upload', $config);
                      		//$this->upload->do_upload();	  
        $this->load->model('blog/Mdlmetaproperties');                  
        $this->load->model("blog/Mdlslant");            		
        
        $this->load->model('blog/Mdlgeneral');
        $this->load->model('blog/Mdlslideshow');
        $this->load->model('blog/Mdlattributes');
        $this->load->model('blog/Mdlmenu');
        //$this->load->model('blog/mdlShop');
        $this->load->model('blog/Mdlpages');
        $this->load->helper(array('form', 'url'));
        //$this->load->library(array('form_validation','session'));
        $this->load->library('Color');
        //$this->load->library('Crypt');
        $this->load->library('Core');
        //$this->load->library('Url');
        $this->load->library('Language');
        $this->load->library('Validator');
        //$this->load->model("blog/mdlShopProducts");
        $this->load->model("blog/Mdlitemslider");
        //$this->load->model("mdlErrors");
        $this->load->database();
        }
                
    public function index() 
        {

            //$this->uri->segment(1); // controller
            $Sitename = $this->uri->segment(1); // action
            //$this->uri->segment(3); // 1stsegment
            //$this->uri->segment(4); // 2ndsegment
            
        //IMPORTANT TO UPDATE SITES NAME URL//
        $Sitename = $this->uri->segment(1);$this->core->init();if($Sitename!=""){$PIID=$this->Mdlaccounts->getAccountPIID($Sitename);           $this->core->setData($PIID,$Sitename);}

  
        if($Sitename!="")
          {
          
          $PIID=$this->Mdlaccounts->getAccountPIID($Sitename);           
          $this->core->setData($PIID,$Sitename);

              if($PIID==0)
                {
                if($Sitename=='shop')
                  {return false;}
                elseif($Sitename=='account')
                  {return false;}
                elseif($Sitename=='admin')
                  {return false;}
                elseif($Sitename=='product')
                  {return false;}
                elseif($Sitename=='home')
                  {
                  redirect(base_url());
                  }
                elseif($Sitename=='other')
                  {return false;}
                else
                  {
                  $this->load->view('errors/html/Error_general'); 
                  return false;                  
                  }
                }
              else
                {

                }              
          }
          
          
        $this->load->view('blog/header/Header'); 
             
        $this->load->view('controls/share/Share');   
        
        $this->load->view('blog/Cssglobal');
        
        $this->load->view('controls/scrolltop/Autoscrolltop');
      
        $this->load->view('blog/header/Topbar');   
        
    
                 
        $this->load->view('controls/menu/Menu'); 
       
                
        ///THIS for HOME///
        $themeID=1;
        $data = $this->Mdlgeneral->getTheme();  
              //$data['rgb'] = $this->color->string_to_rgb($data["nBackColor"]);
              //$data['rgbh'] = $this->color->string_to_rgb($data["hBackColor"]);
              $data["user"]=$Sitename;
         
         
        //$this->load->view('controls/slicebox/slicebox'); 
        $this->load->view('blog/content/home/Home');
        
        $this->load->view('controls/slidingtext/Slidingtext');
        
        $this->load->view('blog/content/home/Postblogsummary');  
        
          
        $this->load->view('blog/content/home/Slantslideshow'); 
        
        
        $data["citations"] = $this->Mdlitemslider->getData("citations");
        
        $this->load->view('blog/content/home/Itemslider',$data); 
        
        
        $this->load->view('blog/footer/Footer',$data); 
        
        
      
        }  
    

      
        

        



}

?>
