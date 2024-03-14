<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
//$route['default_controller'] = "main";
//$route[':any/shop']="ctrlMainBlog/shop";
$route['default_controller'] = "Ctrlmainblog";//HOME PAGE//

//////ABOUT MODULES//
$route['company'] = "Ctrlblogabout/company"; 
$route['company/event/getData'] = "Ctrlblogabout/getData";
$route[':any/company'] = "Ctrlblogabout/company";

$route['board-of-directors']="Ctrlblogabout/board_of_directors";
$route[':any/board-of-directors'] = "Ctrlblogabout/board_of_directors";
$route['business-partners']="Ctrlblogabout/company_partners";
$route[':any/business-partners'] = "Ctrlblogabout/company_partners";
$route['business-partners']="Ctrlblogabout/company_partners";
$route[':any/alive-foundation'] = "Ctrlblogabout/alive_foundation";
$route['alive-foundation'] = "Ctrlblogabout/alive_foundation";
$route[':any/tie-ups'] = "Ctrlblogabout/tie_ups";
$route['tie-ups'] = "Ctrlblogabout/tie_ups";


///////CUSTOMER MODULES//
$route['account/signout'] = "ctrlBlog_Customers/signOut";
$route['account/signin'] = "ctrlBlog_Customers/signIn";
$route['account/register'] = "ctrlBlog_Customers/register";
$route['account/verifyemail'] = "ctrlBlog_Customers/checkEmailExist";

$route['account/errors'] = "ctrlBlog_Customers/errors";


$route['hit/lovelike'] = "ctrlBlog_Customers/addLoveLike";
$route[':any/account/signout'] = "ctrlBlog_Customers/signOut";
$route[':any/account/signin'] = "ctrlBlog_Customers/signIn";
$route[':any/account/register'] = "ctrlBlog_Customers/register";
$route[':any/hit/lovelike'] = "ctrlBlog_Customers/addLoveLike";
///////SHOP MODULES//////
$route['shop']="Ctrlblogshop/shop";//SHOP MODULES//
$route[':any/shop']="Ctrlblogshop/shop";

$route['shop/event/typeview']="Ctrlblogshop/setViewType"; //SEARCHING VIEW TYPE - GRID||LIST
$route['shop/event/navigationFooter']="Ctrlblogshop/setNavigationFooter";

    //////CATEGORY PRODUCTS//
    
    $route['shop/aimworldproducts']="Ctrlblogshop/link_categories";    
    $route['shop/burn']="Ctrlblogshop/link_categories";      
    $route['shop/functionalbeverages']="Ctrlblogshop/link_categories";     
    $route['shop/naturalceuticals']="Ctrlblogshop/link_categories";        
    $route['shop/nutritionalcosmeceuticals']="Ctrlblogshop/link_categories";      
    $route['shop/nutritionalsupport']="Ctrlblogshop/link_categories";  
    $route['shop/services']="Ctrlblogshop/link_categories";     
    $route['shop/globalpackages']="Ctrlblogshop/link_categories";             
    $route[':any/shop/aimworldproducts']="Ctrlblogshop/link_categories";
    $route[':any/shop/burn']="Ctrlblogshop/link_categories";   	
    $route[':any/shop/functionalbeverages']="Ctrlblogshop/link_categories";	
    $route[':any/shop/naturalceuticals']="Ctrlblogshop/link_categories";     
    $route[':any/shop/nutritionalcosmeceuticals']="Ctrlblogshop/link_categories";
    $route[':any/shop/nutritionalsupport']="Ctrlblogshop/link_categories";
    $route[':any/shop/services']="Ctrlblogshop/link_categories";
    $route[':any/shop/globalpackages']="Ctrlblogshop/link_categories";      

//PRODUCTS//////////////////////////////////////////////////////////////////////
    $route['product']="Ctrlblogproducts";
    $route['product/event/quickview']="Ctrlblogproducts/quickview";
    $route['product/form/details']="Ctrlblogproducts/loadDialogDetails";
 
    //NATURA CEUTICALS
    $route['shop/naturalceuticals/:any']="Ctrlblogproducts/productFullDetails";
    $route[':any/shop/naturalceuticals/:any']="Ctrlblogmyproducts/productFullDetails";
    //FUNCTIONAL BEVERAGES    
    $route['shop/functionalbeverages/:any']="Ctrlblogproducts/productFullDetails";
    $route[':any/shop/functionalbeverages/:any']="Ctrlblogproducts/productFullDetails";
    $route['shop/functionalbeverages/liven-coffee/:any']="Ctrlblogproducts/productFullDetails";
    $route[':any/shop/functionalbeverages/liven-coffee/:any']="Ctrlblogproducts/productFullDetails";            
    //BURN
    $route['shop/burn/:any']="Ctrlblogproducts/productFullDetails";
    $route[':any/shop/burn/:any']="Ctrlblogproducts/productFullDetails";
    //NUTRITIONAL SUPPPORT
    $route['shop/nutritionalsupport/:any']="Ctrlblogproducts/productFullDetails";
    $route[':any/shop/nutritionalsupport/:any']="Ctrlblogproducts/productFullDetails";    
    //NUTRICOSMETIUTICALS
    $route['shop/nutritionalcosmeceuticals/:any']="Ctrlblogproducts/productFullDetails";
    $route[':any/shop/nutritionalcosmeceuticals/:any']="Ctrlblogproducts/productFullDetails";   
    //SERVICES      
    $route['shop/services/:any']="Ctrlblogproducts/productFullDetails";
    $route[':any/shop/services/:any']="Ctrlblogproducts/productFullDetails";    
    //BURN
    $route[':any/shop/burn/burncoffee']="Ctrlblogproducts/productFullDetails";
    $route[':any/shop/nutritionalsupport/c247']="Ctrlblogproducts/productFullDetails";
    //AIM WORLD PRODUCTS
    $route['shop/aimworldproducts/:any']="Ctrlblogproducts/productFullDetails";
    $route[':any/shop/aimworldproducts/:any']="Ctrlblogproducts/productFullDetails";   
    //GLOBAL PACKAGES
    
    $route['shop/globalpackages/:any'] = "Ctrlblogshop/link_categories_countries";   
    $route[':any/shop/globalpackages/:any'] = "Ctrlblogshop/link_categories_countries";   
   
    $route['shop/globalpackages/:any/list'] = "Ctrlblogproducts/packageFullDetails_list";      
    $route['shop/globalpackages/:any/:any'] = "Ctrlblogproducts/packageFullDetails";  
    $route[':any/shop/globalpackages/:any/:any']="Ctrlblogproducts/packageFullDetails";  
                
    $route['shop/event/searchYoutube'] = "Ctrlblogproducts/searchYoutube";
    $route['shop/event/getVideoInfo'] = "Ctrlblogproducts/getVideoInfo";
    

        
//LEARN MORE////////////////////////////////////////////////////////////////////
    $route['learnmore']="Ctrlbloglearnmore";
    $route[':any/learnmore']="Ctrlbloglearnmore";
    $route['learnmore/company-policies']="Ctrlbloglearnmore/companypolicy";
    $route[':any/learnmore/company-policies']="Ctrlbloglearnmore/companypolicy";
    $route['learnmore/product-presentation']="Ctrlbloglearnmore/productPresentation";
    $route['learnmore/product-presentation/more']="Ctrlbloglearnmore/getListMore";
    $route['learnmore/product-presentation/rightmore']="Ctrlbloglearnmore/getRightListMore";
    $route['learnmore/product-presentation/search']="ctrlBlog_Learnmore/searchListMore";
    $route['learnmore/product-presentation/rightsearch']="Ctrlbloglearnmore/searchRightListMore";
    $route[':any/learnmore/product-presentation']="Ctrlbloglearnmore/productPresentation";      
    $route['learnmore/aim-trainings']="Ctrlbloglearnmore/aim_trainings";
        
    $route['learnmore/company-policies/learn']="Ctrlbloglearnmore/companypolicy";
    $route[':any/learnmore/company-policies/learn']="Ctrlbloglearnmore/companypolicy"; 
       
//CONTROLS//////////////////////////////////////////////////////////////////////
    $route['controls/bxslider']="ctrlControls/bxslider";
        
//THIS IS FOR OTHER SITES///////////////////////////////////////////////////////
    $route['other/:any']="ctrlBlog_Othersite/getOtherSite";
    $route[':any/others']="ctrlBlog_Othersite/getOtherSite";      
    
//CONTROL PANEL - FOR ALL USERS/////////////////////////////////////////////////    
    $route['control-panel'] = "ctrlBlog_ControlPanel";   
    $route['control-panel/register'] = "ctrlBlog_ControlPanel/register"; 
    $route['control-panel/login'] = "ctrlBlog_ControlPanel/login";
    $route['control-panel/register/validate'] = "ctrlBlog_ControlPanel/new_account";  
    $route['control-panel/form'] = "ctrlBlog_ControlPanel/getControl";  
    //Integrator
    $route['control-panel/integrator']="ctrlBlog_ControlPanel/dbIntegrator";
    $route['control-panel/integrator/events']="ctrlBlog_ControlPanel/dbIntegrator_Events";
    //MEDIA
    $route['control-panel/getmedias']="ctrlBlog_ControlPanel/loadMedia";  
    $route['control-panel/openmedias']="ctrlMedia/openMediaDetails";
    //CONTACT INFO
    $route['control-panel/getpics']="ctrlBlog_ControlPanel/get_img_contact";  
    $route['control-panel/contactlist/load']="ctrlBlog_ControlPanel/load_contact";
    $route['control-panel/contactlist/save']="ctrlBlog_ControlPanel/save_contact";  
    $route['control-panel/contactlist/delete']="ctrlBlog_ControlPanel/delete_contact";  
    $route['control-panel/contactlist/getRecord']="ctrlBlog_ControlPanel/get_contact";  
    //PROFILES
    $route['control-panel/profile/crop'] = "ctrlCropper";  
    $route['control-panel/profile/load']="ctrlBlog_ControlPanel/load_profile";  
    $route['control-panel/profile/load/sub']="ctrlBlog_ControlPanel/load_profile_sub_view";  
    $route['control-panel/profile/save']="ctrlBlog_ControlPanel/save_profile";    
    $route['control-panel/profile/overview/validate']="ctrlBlog_ControlPanel/validate_field";    
    $route['control-panel/profile/overview/save']="ctrlBlog_ControlPanel/save_overview_profile";  
    
    
//THIS IS FOR ADMIN/////////////////////////////////////////////////////////////
    $route['admin'] = "main";
    $route['login'] = "admin/confirm";
    $route['admin/accordionMenu'] = "admin/getAccordionMenu";
    $route['admin/:any'] = "main/login";
    
    $route['country/:any'] = "ctrlCountry/getListCountries";
    $route['countrylist/:any'] = "ctrlCountry/getListForm";
    $route['ctrlCountry'] = "ctrlCountry/uploadFlag";
    $route['ctrlCountry/:any'] = "ctrlCountry/getListForm";
    $route['bco/:any'] = "ctrlBCO/getListBCO";
    $route['ctrlBCO/:any'] = "ctrlBCO/getListForm";
    $route['operation/:any'] = "ctrlOperation/getListOperation";
    $route['ctrlOperation/:any'] = "ctrlOperation/getListForm";
    $route['pcategory/:any'] = "ctrlPCategory/getListPCategory";
    $route['ctrlPCategory/:any'] = "ctrlPCategory/getListForm";
    $route['product/:any'] = "ctrlProduct/getListProduct";
    $route['ctrlproduct/:any'] = "ctrlProduct/getListForm";
    $route['productdetails/:any'] = "ctrlProductDetails/getListPrice";
    $route['globalTestimony/:any'] = "ctrlProductDetails/getListGTestimony";
    $route['ctrlProductDetails/:any'] = "ctrlProductDetails/getListForm";
    $route['package/:any'] = "ctrlPackage/getListPackage";
    $route['itempackage/:any'] = "ctrlPackage/getListPackage_item";
    $route['ctrlpackage/:any'] = "ctrlPackage/getListForm";
    
    $route['ctrlTheme/:any'] = "ctrlTheme/getForm";
    
    $route['media/:any'] = "ctrlMedia/getListMedia";
    $route['ctrlMedia/:any'] = "ctrlMedia/getListForm";

$route[':any']="ctrlmainblog";
$route['404_override'] = '';
$route['scaffolding_trigger'] = "";