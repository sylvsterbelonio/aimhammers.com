<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ctrlblogproducts extends CI_Controller {

     function __construct() 
        { 
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model('blog/Mdlgeneral');
        $this->load->library(array('form_validation','session'));        
        $this->load->model('blog/Mdlmetaproperties');  
        $this->load->model('Mdlsystemuser');  
        $this->load->model('blog/Mdlshopproducts');
        $this->load->model('blog/Mdlvideosearch');
        $this->load->model('blog/Mdlmenu');     
        $this->load->model('blog/Mdlshopproducts');     
        $this->load->model('Mdlproduct');
        $this->load->library('Validator');
        $this->load->library('Core');
        $this->load->library("Language");  
        $this->load->library("Navhead");          
        $this->load->library("Url"); 
        $this->load->database();
        }

    function index() 
        {
        $data["heading"]="INVALID URL SITE";
        $data["message"]="<p>The host address you are trying to access does not exist or the account has been deactivated, please try to visit our web page link.</p> 
        <h3 align=center><a href=''>Click Here</a></h3>";
        $this->load->view('errors/html/error_general',$data); 
        }
        
    function loadDialogDetails()
        {
        
        $data=$this->Mdlgeneral->getTheme();  
        $PIID="0";
        //IMPORTANT TO UPDATE SITES NAME URL//
        $Sitename = $this->uri->segment(1);$this->core->init();if($Sitename!=""){$PIID=$this->Mdlaccounts->getAccountPIID($Sitename);           $this->core->setData($PIID,$Sitename);}
        //////////////////////////////////////
                
        if($_GET["segments"]!="shop")
          {
           $PIID=$this->Mdlaccounts->getAccountPIID($_GET["segments"]); 
          }
        
        $data["PIID"]=$PIID;  
        $data["site"]="";
        if(isset($_GET["site"])) $data["site"] = $_GET["site"];
        $data["pageType"]="";
        if(isset($_GET["pageType"])) $data["pageType"] = $_GET["pageType"];

        $openDetails = $this->Mdlshopproducts->openDetails($data["pageType"],$PIID,$_GET["pid"],$_GET["countryID"],$_GET["home"],$_GET["segments"]);
        $col = explode("~",$openDetails);
        $data["productName"] = $col[0]; //productname
        $data["content"] = $col[1]; //content
        $data["price"] = $col[2];
        $data["srcData"] = $col[3];
        $data["categories"] = $col[4];
        $data["likelove"] = $col[5];
        
        if($data["pageType"]=="")
        $data["PageID"]=$this->Mdlshopproducts->getPageID($_GET["pid"]);
        else
        $data["PageID"]=$this->Mdlshopproducts->getPackagePageID($_GET["pid"]);

        $this->load->view('blog/content/products/Dialogdetails',$data); 
        }    
        
    function quickview()
        {
        $result= $this->Mdlshopproducts->openDetails($_POST["pid"],$_POST["countryID"]);
        echo json_encode($result);
        }
    
    function packageFullDetails_list()
        {
        //IMPORTANT TO UPDATE SITES NAME URL//
        $Sitename = $this->uri->segment(1);$this->core->init();if($Sitename!=""){$PIID=$this->Mdlaccounts->getAccountPIID($Sitename);           $this->core->setData($PIID,$Sitename);}
        //////////////////////////////////////
        $ProductInfo = $this->Mdlproduct->getProductfromSite("package list");
        
        $data["pageID"]=$ProductInfo["pageID"];
      
        if($data["pageID"]!=0)
            {
                $this->load->view('blog/Cssglobal');        
                $this->load->view('controls/share/Share');   
                $this->load->view('blog/header/Header2',$data); 
                $this->load->view('controls/scrolltop/Autoscrolltop');
                
                $data["lang"] = $this->language->topbar("topbar");
                
                $this->load->view('blog/header/Topbar');     
                     
                $this->load->view('controls/menu/Menu'); 
                        
                $data["category"]="Online Shopping Area[shop]";
                //$col = explode("/",$ProductInfo["category_url"]);
                $data["division"] = "Global Packages[globalpackages]";
                $col = explode("/", $this->url->getURL());
                $data["section"] = ucfirst($col[count($col)-2]);
                $this->load->view('blog/content/learnmore/Navheading',$data);     
                $data["countryLinkList"]=$this->Mdlproduct->getCountryLinkList($ProductInfo["countryID"]);    
                
                $data["PackageLinkList"]=$this->Mdlproduct->getPackageListContent();                    
                $this->load->view('blog/content/products/Packagecountylist',$data);
                //$this->load->view('controls/comments/comments');
                $this->load->view('blog/footer/Footer');             
            }
        else
            {
            $this->load->view("errors/html/error_route");
            }
        
        
        }    
    function packageFullDetails()
        {
        //IMPORTANT TO UPDATE SITES NAME URL//
        $Sitename = $this->uri->segment(1);$this->core->init();if($Sitename!=""){$PIID=$this->Mdlaccounts->getAccountPIID($Sitename);           $this->core->setData($PIID,$Sitename);}
        //////////////////////////////////////
        $ProductInfo = $this->Mdlproduct->getProductfromSite("global package");
        
        $data["pageID"]=$ProductInfo["pageID"];
        
        if($data["pageID"]!=0 && $data["pageID"]!="")
            {  
                $this->load->view('blog/Cssglobal');        
                $this->load->view('controls/share/Share');   
                $this->load->view('blog/header/Header2',$data); 
                $this->load->view('controls/scrolltop/Autoscrolltop');
                
                $data["lang"] = $this->language->topbar("topbar");
                
                $this->load->view('blog/header/Topbar');     
                     
                $this->load->view('controls/menu/Menu'); 
                
                $data["packageID"] = $ProductInfo["packageID"];
        
                $data["category"]="Online Shopping Area[shop]";
                $col = explode("/",$ProductInfo["category_url"]);
                
                $word = explode(" ",ucfirst(strtolower($ProductInfo["category"])));
                $data["division"] = $word[0]." ".ucfirst($word[1])."[".$col[1]."]";
                
                $segment = explode("/",$this->url->getURL());
                
                $data["section"] = ucfirst($segment[count($segment)-2])."[".$segment[count($segment)-2]."/list]";
                $data["subsection"] = $ProductInfo["product"];
                
                $this->load->view('blog/content/learnmore/Navheading',$data);           
        
                $data["countryLinkList"]=$this->Mdlproduct->getCountryLinkList($ProductInfo["countryID"]);
                
                $this->load->view('blog/content/products/Packagefulldetails',$data);
                //$this->load->view('controls/comments/comments');
                $this->load->view('blog/footer/Footer');                       
            }
        else        
            {
                $this->load->view("errors/html/error_route");
            }        
        }
        function productFDetails()
            {
           
            $this->load->view('blog/Cssglobal');    
            $this->load->view('blog\content\products\Sample');
            $this->load->view('blog\content\products\Packagefulldetails');

            }
    function productFullDetails()
        {
        
        //IMPORTANT TO UPDATE SITES NAME URL//
        
        $Sitename = $this->uri->segment(1);$this->core->init();if($Sitename!=""){$PIID=$this->Mdlaccounts->getAccountPIID($Sitename);           $this->core->setData($PIID,$Sitename);}
        //////////////////////////////////////
        $ProductInfo = $this->Mdlproduct->getProductfromSite();
        
        $data["pageID"]=$ProductInfo["pageID"];
                
        if($data["pageID"]!=0)
            {
  
                
                $this->load->view('blog/header/Header2'); 
                $this->load->view('blog/Cssglobal');
                $this->load->view('controls/share/Share');
                $this->load->view('controls/scrolltop/Autoscrolltop');
                
                $data["lang"] = $this->language->topbar("topbar");
                
                $this->load->view('blog/header/Topbar');     
                     
                $this->load->view('controls/menu/Menu'); 
                
                $data["PID"] = $ProductInfo["PID"];
                
                $data["category"]="Online Shopping Area[shop]";
                $col = explode("/",$ProductInfo["category_url"]);
                $data["division"] = $ProductInfo["category"]."[".$col[1]."]";
                $data["section"] = $ProductInfo["product"];
                $this->load->view('blog/content/learnmore/Navheading',$data);         

                $this->load->view('blog/content/products/Productfulldetails',$data);
                $this->load->view('blog/footer/Footer');            
            
            }
        else
            {
                $this->load->view("errors/html/Error_route");
            }

        }    
    
    function searchYoutube()
        {
        if(isset($_POST["pid"]) && isset($_POST["search"]) && isset($_POST["post"]))
        echo $this->Mdlproduct->searchYoutube($_POST["pid"],$_POST["search"],$_POST["post"]);
        else
        $this->load->view("errors/html/error_route");
        }
    function getVideoInfo()
        {
        if(isset($_POST["post"])) 
        echo json_encode($this->mdlVideoSearch->getFullPostDetails($this->crypt->encrypt($_POST['post']),''));
        else
        $this->load->view("errors/html/error_route");        
        }     

}
?>
