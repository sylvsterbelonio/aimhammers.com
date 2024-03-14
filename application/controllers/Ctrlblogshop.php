<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ctrlblogshop extends CI_Controller {

     function __construct() 
        { 
        parent::__construct();
        
	      $config['upload_path'] = './images/data/countries';
                      		$config['allowed_types'] = 'gif|jpg|png';
                      		$config['max_size']	= '500';
                      		$config['max_width']  = '100';
                      		$config['max_height']  = '100';
                      		$this->load->library('upload', $config);
                      		$this->upload->do_upload();	  
        $this->load->model('blog/Mdlmetaproperties');                              		
        $this->load->model('blog/Mdlaccounts');
        $this->load->model('blog/Mdlgeneral');
        $this->load->model('blog/Mdlslideshow');
        $this->load->model('Mdlproduct');
        $this->load->model('blog/Mdlmenu');
        $this->load->model('blog/Mdlcustomer');
        $this->load->model('blog/Mdlshop');
        $this->load->library('Navhead');
        $this->load->helper(array('form', 'url'));
        $this->load->library(array('form_validation','session'));
        $this->load->library('Color');
        $this->load->library('Crypt');
        $this->load->library('Encrypt');
        $this->load->library('Core');
        $this->load->library("Language");
        $this->load->library("Validator");
        $this->load->library("Url");
        $this->load->model("Mdlerrors"); 
        $this->load->model("blog/Mdlattributes");
        $this->load->database();
        
        }


        function shop()
        {

        //IMPORTANT TO UPDATE SITES NAME URL//
        $Sitename = $this->uri->segment(1);$this->core->init();if($Sitename!=""){$PIID=$this->Mdlaccounts->getAccountPIID($Sitename);           $this->core->setData($PIID,$Sitename);}
        //////////////////////////////////////
                   
        $this->load->view('blog/Cssglobal');
    
        $this->load->view('blog/header/Header2'); 
        $this->load->view('controls/scrolltop/Autoscrolltop');
        
        $data["lang"] = $this->language->topbar("topbar");
        $this->load->view('blog/header/Topbar');     
             
        $this->load->view('controls/menu/Menu'); 
        
        $data["category"]="Online Shopping Area";
        $this->load->view('blog/content/learnmore/Navheading',$data);     
        
        //variables HERE//
        $data["side_categories"]=$this->Mdlshop->getCategories(); 
        $data["cboCountries"] =  $this->Mdlshop->getCountries(1); 
        $data['fcbolstSort'] = array(
            'productName'         => 'Product Name',
            'productName desc'   => 'Product Name Desc',
            'retailPrice'           => 'Price',
            'retailPrice desc' =>'Price Desc',
            'love'         => 'Popularity',
            'like'        => 'Top Rated'
            );
            $data['fcboSort']=array(
            'name'=>'cboSort',
            'id'=>'cboSort',
            'style'=>'padding:5px 10px;',
            );        
        $data['fcbolstView'] = array(
            'grid'         => 'Grid View',
            'list'           => 'List View'
            );
            $data['fcboView']=array(
            'name'=>'cboView',
            'id'=>'cboView',
            'style'=>'padding:5px 10px',
            );         
        
        $data["listProducts"] = $this->Mdlshop->getProducts("",$this->config->item("gpiid"),$this->config->item("gcountryID"),"productName",0,12);
        $data["navProducts"] = $this->Mdlshop->navigationFooter("grid","",$this->config->item("gpiid"),$this->config->item("gcountryID"),"productName",0,12);
        
        $data["listDetailsProducts"] =$this->Mdlshop->getDetailProdutcs("",$this->config->item("gpiid"),$this->config->item("gcountryID"),"productName",0,12);
        //THIS IS FOR RIGHT CATEGORY DISPLAY//
        $data["listTopRatedProducts"] = $this->Mdlshop->getTopRatedProducts($this->config->item("gpiid"),$this->config->item("gcountryID"),"like");
        $data["listPopularProducts"] = $this->Mdlshop->getTopRatedProducts($this->config->item("gpiid"),$this->config->item("gcountryID"),"love");
        $data["listNewProducts"]=$this->Mdlshop->getNewArrivals($this->config->item("gcountryID"));
        

        $data["PIID"]=$this->config->item("gpiid");
        $this->load->view('blog/content/shop/Shop',$data);
        $this->load->view('blog/footer/Footer');

        }
        
        function setViewType()
        {
        
        //IMPORTANT TO UPDATE SITES NAME URL//
        $Sitename = $this->uri->segment(1);$this->core->init();if($Sitename!=""){$PIID=$this->Mdlaccounts->getAccountPIID($Sitename);           $this->core->setData($PIID,$Sitename);}
        //////////////////////////////////////
          
            $PIID = $_POST["piid"];
            $typeView = $_POST["typeview"];
            $countryID = $_POST["countryID"];
            $order = $_POST["sort"];
            $page = $_POST["page"];
            $limit = $_POST["limit"];
            $themeID = $this->Mdlaccounts->getThemeID($PIID); 
            $html="";
            $searchValue=$_POST["category"];
            
            if($_POST["pageType"]=="")
              {
                  if($typeView=="grid") $html = $this->Mdlshop->getProducts($searchValue,$PIID,$countryID,$order,$page,$limit);
                  else $html = $this->Mdlshop->getDetailProdutcs($searchValue,$PIID,$countryID,$order,$page,$limit);              
              }
            else
              {
                  if($typeView=="grid") $html = $this->Mdlshop->getPackages($searchValue,$PIID,$countryID,$order,$page,$limit);
                  else $html = $this->Mdlshop->getDetailProdutcs($searchValue,$PIID,$countryID,$order,$page,$limit);               
              }

            
            echo $html;
        }
        
        function setNavigationFooter()
        {
            $PIID = $_POST["piid"];
            $typeView = $_POST["typeview"];
            $countryID = $_POST["countryID"];
            $order = $_POST["sort"];
            $page = $_POST["page"];
            $limit = $_POST["limit"];
            $searchValue=$_POST["category"];
            
             if($_POST["pageType"]=="")
                {
                echo $this->Mdlshop->navigationFooter($typeView,$searchValue,$PIID,$countryID,$order,$page,$limit);    
                }
            else
                {
                echo $this->Mdlshop->navigationFooter_package($typeView,$searchValue,$PIID,$countryID,$order,$page,$limit);   
                }
               
        }
        
        function link_categories_countries()
        {
            $PIID="0";
            //IMPORTANT TO UPDATE SITES NAME URL//
            $Sitename = $this->uri->segment(1);$this->core->init();if($Sitename!=""){$PIID=$this->Mdlaccounts->getAccountPIID($Sitename);           $this->core->setData($PIID,$Sitename);}
            //////////////////////////////////////              
            $this->load->view('blog/Cssglobal');
            $searchValue="";
            if(isset($_GET["search"])) $searchValue = $this->crypt->decrypt($_GET["search"]);
            if($Sitename!="")
              {
              
              $PIID=$this->Mdlaccounts->getAccountPIID($Sitename);           
              $this->core->setData($PIID,$Sitename);
                  if($PIID==0)
                    {
                    if($Sitename=='shop')
                      {}
                    elseif($Sitename=='account')
                      {return false;}
                    elseif($Sitename=='admin')
                      {return false;}
                    elseif($Sitename=='product')
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
        
              
              $this->load->view('blog/header/Header2'); 
          
              $this->load->view('blog/header/Autoscrolltop');
          
              $this->load->view('blog/header/Topbar'); 
              $this->load->view('controls/menu/Menu'); 
              
              $data["category"]="Online Shopping Area[shop]";     
              $packageInfo = $this->Mdlproduct->getSiteTitle();   
              $data["division"] = $packageInfo["title"];
              $this->load->view('blog/content/learnmore/Navheading',$data); 
        //variables HERE//
   
        $data["side_categories"]=$this->Mdlshop->getCategories(); 
        $data["cboCountries"] =  $this->Mdlshop->getCountries(1); 
        $data['fcbolstSort'] = array(
            'productName'         => 'Product Name',
            'productName desc'   => 'Product Name Desc',
            'retailPrice'           => 'Price',
            'retailPrice desc' =>'Price Desc',
            'love'         => 'Popularity',
            'like'        => 'Top Rated'
            );
            $data['fcboSort']=array(
            'name'=>'cboSort',
            'id'=>'cboSort',
            'style'=>'padding:5px 10px',
            );        
        $data['fcbolstView'] = array(
            'grid'         => 'Grid View',
            'list'           => 'List View'
            );
            $data['fcboView']=array(
            'name'=>'cboView',
            'id'=>'cboView',
            'style'=>'padding:5px 10px',
            );         


        $catCol = explode("/",$this->url->getURL());
        $catCol = explode("?",$catCol[count($catCol)-1]);
        $typeMode = $catCol[0];
        
          $search = "";
          //if(isset($_GET["search"]))  $search = $packageInfo["countryID"];
          $data["listProducts"] = $this->Mdlshop->getPackages($packageInfo["countryID"],$this->config->item("gpiid"),$this->config->item("gcountryID"),"packageName",0,12);
          $data["navProducts"] = $this->Mdlshop->navigationFooter_package("grid",$packageInfo["countryID"],$this->config->item("gpiid"),$this->config->item("gcountryID"),"productName",0,12);          

        //$data["listDetailsProducts"] =$this->mdlShop->getDetailProdutcs("",$PIID,$countryID,"productName");
        //THIS IS FOR RIGHT CATEGORY DISPLAY//
        $data["listTopRatedProducts"] = $this->Mdlshop->getTopRatedProducts($this->config->item("gpiid"),$this->config->item("gcountryID"),"like");
        $data["listPopularProducts"] = $this->Mdlshop->getTopRatedProducts($this->config->item("gpiid"),$this->config->item("gcountryID"),"love");
        $data["listNewProducts"]=$this->Mdlshop->getNewArrivals($this->config->item("gcountryID"));
        
        //
        
        $data["PIID"]=$this->config->item("gpiid");
        $this->load->view('blog/content/shop/Shop',$data);

        $this->load->view('blog/footer/Footer');
        }
        function link_categories()
        {
        $PIID="0";
        //IMPORTANT TO UPDATE SITES NAME URL//
        $Sitename = $this->uri->segment(1);$this->core->init();if($Sitename!=""){$PIID=$this->Mdlaccounts->getAccountPIID($Sitename);           $this->core->setData($PIID,$Sitename);}
        //////////////////////////////////////
                   
        $this->load->view('blog/Cssglobal');
        $searchValue="";
        if(isset($_GET["search"])) $searchValue = $this->crypt->decrypt($_GET["search"]);


      
        if($Sitename!="")
          {
          
          $PIID=$this->Mdlaccounts->getAccountPIID($Sitename);           
          $this->core->setData($PIID,$Sitename);
              if($PIID==0)
                {
                if($Sitename=='shop')
                  {}
                elseif($Sitename=='account')
                  {return false;}
                elseif($Sitename=='admin')
                  {return false;}
                elseif($Sitename=='product')
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
        
              
        $this->load->view('blog/header/Header2'); 
    
        $this->load->view('blog/header/Autoscrolltop');
    
        $this->load->view('blog/header/Topbar'); 
        $this->load->view('controls/menu/Menu'); 

    
        $data["category"]="Online Shopping Area[shop]";
        $data["division"] = $searchValue;
        $this->load->view('blog/content/learnmore/Navheading',$data); 
       
        //variables HERE//
   
        $data["side_categories"]=$this->Mdlshop->getCategories(); 
        $data["cboCountries"] =  $this->Mdlshop->getCountries(1); 
        $data['fcbolstSort'] = array(
            'productName'         => 'Product Name',
            'productName desc'   => 'Product Name Desc',
            'retailPrice'           => 'Price',
            'retailPrice desc' =>'Price Desc',
            'love'         => 'Popularity',
            'like'        => 'Top Rated'
            );
            $data['fcboSort']=array(
            'name'=>'cboSort',
            'id'=>'cboSort',
            'style'=>'padding:5px 10px',
            );        
        $data['fcbolstView'] = array(
            'grid'         => 'Grid View',
            'list'           => 'List View'
            );
            $data['fcboView']=array(
            'name'=>'cboView',
            'id'=>'cboView',
            'style'=>'padding:5px 10px',
            );         


        $catCol = explode("/",$this->url->getURL());
        $catCol = explode("?",$catCol[count($catCol)-1]);
        $typeMode = $catCol[0];
        
        if($typeMode!="globalpackages")
          {  
          $data["listProducts"] = $this->Mdlshop->getProducts($searchValue,$this->config->item("gpiid"),$this->config->item("gcountryID"),"productName",0,12);
          $data["navProducts"] = $this->Mdlshop->navigationFooter("grid",$_GET["search"],$this->config->item("gpiid"),$this->config->item("gcountryID"),"productName",0,12);          
          }
        else
          {
          //GLOBAL PACKAGE AREA
          $search = "";
          if(isset($_GET["search"]))  $search = $_GET["search"];
          $data["listProducts"] = $this->Mdlshop->getPackages($searchValue,$this->config->item("gpiid"),$this->config->item("gcountryID"),"packageName",0,12);
          $data["navProducts"] = $this->Mdlshop->navigationFooter_package("grid",$searchValue,$this->config->item("gpiid"),$this->config->item("gcountryID"),"productName",0,12);          


          }
        
        
        //$data["listDetailsProducts"] =$this->mdlShop->getDetailProdutcs("",$PIID,$countryID,"productName");
        //THIS IS FOR RIGHT CATEGORY DISPLAY//
        $data["listTopRatedProducts"] = $this->Mdlshop->getTopRatedProducts($this->config->item("gpiid"),$this->config->item("gcountryID"),"like");
        $data["listPopularProducts"] = $this->Mdlshop->getTopRatedProducts($this->config->item("gpiid"),$this->config->item("gcountryID"),"love");
        $data["listNewProducts"]=$this->Mdlshop->getNewArrivals($this->config->item("gcountryID"));
        
        //
        
        $data["PIID"]=$this->config->item("gpiid");
        $this->load->view('blog/content/shop/Shop',$data);

        $this->load->view('blog/footer/Footer');

        }
        
        
}

?>
