<?php
class mdlShopProducts extends CI_Model   {

 public $PIID="0";
 

 public function __construct()
        {
                parent::__construct();
                $this->load->library('Crypt');
                $this->load->library('Url');
                $this->load->model('blog/Mdlshop');
                $this->load->model('blog/Mdlaccounts');
                $this->load->model('blog/Mdlgeneral');
                
        }
 
 function getPID()
        {

        return $PIID;
        }
 
   
 function getUrl($pageID)
        {
        $query = $this->db->get_where('tblblog_pages', array('pageID' => $pageID));
        if ($query->num_rows() == 1)
        { 
            foreach ($query->result() as $row)
            {
            return $row->url;
            }
        }
        return "";
        }
  
 function getPageID($PID)
        {
        $sql="SELECT * FROM   tblblog_pages    INNER JOIN  tblproduct    ON (tblblog_pages.pageID = tblproduct.pageID) where tblproduct.pid=$PID";
        $query = $this->db->query($sql);
        foreach ($query->result() as $row) 
            {      
            return $row->pageID;  
            }
        return 0;
        }      
 function getPackagePageID($packageID)
        {
        $sql="SELECT * FROM   tblblog_pages  INNER JOIN  tblpackage    ON (tblblog_pages.pageID = tblpackage.pageID) where tblpackage.packageID=$packageID";
        $query = $this->db->query($sql);
        foreach ($query->result() as $row) 
            {      
            return $row->pageID;  
            }
        return 0;
        }   
                 
 function openDetails($pageType="",$piid,$pid,$countryID,$home,$segment)
        {
            //PRODUCTS
            if($pageType=="")
                {                
                    $sql="SELECT tblproduct_category.pageID as 'catpgID',categoryName,tblproduct.PID, tblproduct.pageID as 'pgID',productName,source,details FROM   tblproduct_category   INNER JOIN tblproduct        ON (tblproduct_category.PCID = tblproduct.PCID)  INNER JOIN tblmedia       ON (tblmedia.mediaID = tblproduct.mediaID)  INNER JOIN tblproduct_details      ON (tblproduct_details.PID = tblproduct.PID)  INNER JOIN tblproduct_price    ON (tblproduct_price.PID = tblproduct.PID) where tblproduct.PID=$pid";
                    $query = $this->db->query($sql);
                    foreach ($query->result() as $row) 
                        {
                        $data["productName"] = $row->productName;
                        $data["content"] = $this->Mdlshop->getDetailProdutcs_arrangeParagraph($row->details);
                        $data["price"] = $this->Mdlshop->getPrice($row->PID,$countryID);            
                        
                        $data["srcData"]=""; //element,max gallery image
                        $data["srcData"]="<li><img src=".base_url()."images/system/noproduct.png></li>";
                        $sql="SELECT tblblogs_gallery.mediaID, source FROM  tblmedia INNER JOIN  tblblogs_gallery   ON (tblmedia.mediaID = tblblogs_gallery.mediaID) where PID=".$pid;
                        $query2 = $this->db->query($sql);
                        $count=0;
                        
                        foreach ($query2->result() as $row2) 
                        {
                        if($count==0) $data["srcData"]= '<li><img src="'.$this->url->getimgURL($row2->source).'"></li>';
                        else $src[$count]=  $data["srcData"].= '<li><img src="'.$this->url->getimgURL($row2->source).'"></li>';
                        $count++;
                        }
                                               
                        $encrypted = $this->crypt->encrypt($row->categoryName);  
                        $data["categoryLinks"]="Category: ";
                                                
                        //ALL PRODUCTS
                        if($segment!="shop") $data["categoryLinks"] .= '<a href="'.base_url().$segment.'/shop/?'.'search='.$encrypted.'">ALL PRODUCTS</a>, ';
                        else $data["categoryLinks"] .= '<a href="'.base_url().'shop/?'.'search='.$encrypted.'">ALL PRODUCTS</a>, ';
                        
                        //CATEGORY AREA//
                        if($segment!="shop") $data["categoryLinks"] .= '<a href="'.base_url().$segment.'/shop/'.$this->getUrl($row->catpgID).'?'.'search='.$encrypted.'">'.$row->categoryName.'</a>';
                        else $data["categoryLinks"] .= '<a href="'.base_url().'shop/'.$this->getUrl($row->catpgID).'?'.'search='.$encrypted.'">'.$row->categoryName.'</a>';
                                                      
                        $data['likelove']='                     
                                 <span onclick="openDialog('.$piid.',\''.$row->PID.'\',\'like\',this)" class="'.$this->Mdlshop->retrieveCustomerHits("like",$row->PID).'"><img src="'.base_url().'images/system/like.png" height=9 width=10><span>'.$this->Mdlshop->countRank($piid,"like","products",$row->PID).'</span></span>
                                 <span onclick="openDialog('.$piid.',\''.$row->PID.'\',\'love\',this)" class="'.$this->Mdlshop->retrieveCustomerHits("love",$row->PID).'"><img src="'.base_url().'images/system/love.png" height=9 width=11 ><span>'.$this->Mdlshop->countRank($piid,"love","products",$row->PID).'</span></span>';
                                                            
                        return $data["productName"]."~".$data["content"]."~".$data["price"]."~".$data["srcData"]."~".$data["categoryLinks"]."~".$data["likelove"];
                        
                        }                  
                            
                } 
            else
                {
                      $this->Mdlgeneral->getTheme();      
                      $fontSize = $this->Mdlgeneral->getStyleAttr("p","font-size");
                      
                      $sql="select tblproduct_category.pageID as 'catpgID',categoryName,tblpackage.packageID,tblpackage.pageID as 'pgID', packageName,source, details FROM  tblproduct_category   INNER JOIN tblpackage     ON (tblproduct_category.PCID = tblpackage.PCID)  INNER JOIN tblmedia    ON (tblmedia.mediaID = tblpackage.mediaID)  left JOIN tblpackage_details      ON (tblpackage_details.packageID = tblpackage.packageID) where tblpackage.packageID=$pid";
                      $query = $this->db->query($sql);
                      foreach ($query->result() as $row) 
                            {
                                $data["productName"] = $row->packageName;
                                $data["content"] = "<p style='margin:0;margin-left:18px;font-size:150%'>".($row->details)."</p>";
                                $data["price"] = $this->Mdlshop->getPackagePrice($row->packageID,$countryID);            
                                
                                $data["srcData"]=""; //element,max gallery image
                                $data["srcData"]="<li><img src=".base_url()."images/system/noproduct.png></li>";
                                $sql="SELECT tblblogs_gallery.mediaID, source FROM  tblmedia INNER JOIN  tblblogs_gallery   ON (tblmedia.mediaID = tblblogs_gallery.mediaID) where pageType='package' and PID=".$pid;
                                $query2 = $this->db->query($sql);
                                $count=0;
                                foreach ($query2->result() as $row2) 
                                {
                                    if($count==0) $data["srcData"]= '<li><img src="'.$this->url->getimgURL($row2->source).'"></li>';
                                    else $src[$count]=  $data["srcData"].= '<li><img src="'.$this->url->getimgURL($row2->source).'"></li>';
                                    $count++;
                                }
                                
                                $encrypted = $this->crypt->encrypt($row->categoryName);  
                                $data["categoryLinks"]="Category: ";

                        //ALL PRODUCTS
                        if($segment!="shop") $data["categoryLinks"] .= '<a href="'.base_url().$segment.'/shop/?'.'search='.$encrypted.'">ALL PRODUCTS</a>, ';
                        else $data["categoryLinks"] .= '<a href="'.base_url().'shop/?'.'search='.$encrypted.'">ALL PRODUCTS</a>, ';
                        
                        //CATEGORY AREA//
                        if($segment!="shop") $data["categoryLinks"] .= '<a href="'.base_url().$segment.'/shop/'.$this->getUrl($row->catpgID).'?'.'search='.$encrypted.'">'.$row->categoryName.'</a>';
                        else $data["categoryLinks"] .= '<a href="'.base_url().'shop/'.$this->getUrl($row->catpgID).'?'.'search='.$encrypted.'">'.$row->categoryName.'</a>';
                                                      
                        $data['likelove']='                     
                                 <span onclick="openDialog('.$piid.',\''.$row->packageID.'\',\'like\',this)" class="'.$this->Mdlshop->retrieveCustomerHits("like",$row->packageID).'"><img src="'.base_url().'images/system/like.png" height=9 width=10><span>'.$this->Mdlshop->countRank($piid,"like","products",$row->packageID).'</span></span>
                                 <span onclick="openDialog('.$piid.',\''.$row->packageID.'\',\'love\',this)" class="'.$this->Mdlshop->retrieveCustomerHits("love",$row->packageID).'"><img src="'.base_url().'images/system/love.png" height=9 width=11 ><span>'.$this->Mdlshop->countRank($piid,"love","products",$row->packageID).'</span></span>';
                                                            
                        return $data["productName"]."~".$data["content"]."~".$data["price"]."~".$data["srcData"]."~".$data["categoryLinks"]."~".$data["likelove"];

                            
                            }                
                }      
      

        

        }
}
?>
