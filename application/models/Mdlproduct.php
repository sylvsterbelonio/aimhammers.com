<?php
class Mdlproduct extends CI_Model   {

 public function __construct()
        {
                parent::__construct();
                $this->load->model("blog/Mdlshop");
                $this->load->model("blog/Mdlgeneral");
                $this->load->model("blob/Mdlaccounts");
                $this->load->library("Date");
                $this->load->library("Url");
                $this->load->library("Wrapper");
                $this->load->library("Color");
                $this->load->model("blog/Mdlvideosearch");
                $this->load->library("Date");
        }
    
    function nextID($field,$table)
        {
        $data=0;
        $sql = "select max($field) as 'max' from $table";
        $query = $this->db->query($sql);
        foreach ($query->result_array() as $row) 
            {
            $data=($row["max"]);
            }
        $data = $data + 1;
        return $data++;
        }

    function getCategory()
        {
        $html="";
        $sql = "SELECT *  FROM  tblproduct_category order by categoryName";
        $query = $this->db->query($sql);
        $html="Category Name<br><select id='cboProductsCategoryName' name='ProductsCategoryName' value='0' class='ui-widget-content ui-corner-all' style='padding:5px;width:100%'>";
        $html.="<option value='0'>Select Category</option>";
        foreach ($query->result_array() as $row) 
            {
            $html.="<option value='".$row["PCID"]."'>".$row["categoryName"]."</option>";
            }
        $html.="</select>";
        return $html;
        }
                
    function searchList($type,$searchValue,$sidx,$sord,$start,$limit) {
    
        $data = array();
        $where="";
        
        if($type!="")  $where = " WHERE $type LIKE '$searchValue%' ";
               
        $thesql = "SELECT PID, tblproduct.PCID, tblproduct_category.categoryName, tblproduct.mediaID, tblmedia.source, productName,description, units, binaryPoints, commissionalPoints, positionalPoints,weight  FROM    tblproduct_category   right JOIN  tblproduct       ON (tblproduct_category.PCID = tblproduct.PCID)  left JOIN  tblmedia     ON (tblmedia.mediaID = tblproduct.mediaID) $where ORDER BY $sidx $sord LIMIT $start, $limit";     
        $query = $this->db->query($thesql);
        foreach ($query->result_array() as $row) 
            {
            $data[]=$row;
            }
            
        return $data;
    }	

    function searchListCount($type,$searchValue) {
        $data = 0;
        $where="";
        if($type!="")  $where = " WHERE $type LIKE '$searchValue%' ";
      
        $thesql="SELECT count(*) as 'count' FROM    tblproduct_category   right JOIN  tblproduct       ON (tblproduct_category.PCID = tblproduct.PCID)  left JOIN  tblmedia     ON (tblmedia.mediaID = tblproduct.mediaID) $where";
    
        $query = $this->db->query($thesql);
        foreach ($query->result_array() as $row) 
            {
            $data=$row['count'];
            }
            
        return $data;
    }
    
		function save_record($PCID,$mediaID,$productName,$description, $units,$binaryPoints,$commissionalPoints,$positionalPoints,$weight,$id,$piid)
    {
      if($id=="0")
          {
          $PID = $this->nextID("PID","tblproduct");
          
          $data = array(
              'PID' => $PID ,
              'PCID' => $PCID ,              
              'mediaID' => $mediaID,
              'productName' => $productName,
              'description' =>$description,
              'units' => $units,
              'binaryPoints' => $binaryPoints,
              'commissionalPoints' => $commissionalPoints,
              'positionalPoints' => $positionalPoints,
              'weight' => $weight,
              'createdBy' => $piid,
              'createdDt' => date('Y-m-d H:i:s', time()),
              'updatedBy' => $piid,
              'updatedDt' => date('Y-m-d H:i:s', time())
          );
    		  $this->db->insert('tblproduct', $data); 
    		  return true;          
          }
      else
          {
          $data = array(
              'PCID' => $PCID ,              
              'mediaID' => $mediaID,
              'productName' => $productName,
              'units' => $units,
              'binaryPoints' => $binaryPoints,
              'commissionalPoints' => $commissionalPoints,
              'positionalPoints' => $positionalPoints,
              'weight' => $weight,
              'updatedBy' => $piid,
              'updatedDt' => date('Y-m-d H:i:s', time())
          );
          $this->db->where('PID', $id);       
      		$this->db->update('tblproduct',$data);           
          }

    }
    
    function delete_record($id)
  	{
  		$this->db->where('PID', $id);
  		$this->db->delete('tblproduct'); 
  		return true;
  	} 

    function add_media($ext, $source,$piid)
    {     
    $curDate = date("Ymd");
          $mediaID = $this->nextID("mediaID","tblmedia");
          $fileNamex = "picture".$piid.$mediaID.$curDate.".".$ext;
          $source = $source.$fileNamex;
          $data = array(
  		        'mediaID' => $mediaID,
              'type' => 'upload' ,
              'fileName' =>$fileNamex,
              'categoryFolder' => 'products',
              'source' => $source,
              'uploadedBy' => $piid,
              'uploadedDt' => date('Y-m-d H:i:s', time())
          );    
    		  $this->db->insert('tblmedia', $data); 
    		  return $mediaID.'~'.$source;       
    }
    
    //THIS IS FOR PRODUCT DETAILS FULL EQUIPPTED//
    
    function setListStyle($value)
    {
    $col = explode("~",$value);
    $html="<ul>";
    for($i=0;$i<count($col);$i++)
        {
        $html.="<li>".$col[$i]."</li>";
        }
    return $html."</ul>";
    }
    

                
    function openFullPackageDetails($packageID)
        {
            //initialize default
            $data=array();
            $data["PID"]=$packageID;
            $data["pageID"]=0;
            $data["countryID"]=0;
            $data["productName"]="???";
            $data["details"]="";
            $data["imgBackground"]=base_url()."images/system/noimage.jpg"; 
            $data["imgFeatures"]=base_url()."images/system/noimage.jpg"; 
            $data["price"]="?.??";
            
                
            $theme = $this->Mdlgeneral->getTheme();
            $prgb = $this->color->string_to_rgb($theme["pBackColor"]);
            
            
            $sql="SELECT tblpackage.packageID,tblpackage.countryID, tblpackage.pageID,packageName,details,imageURL  FROM tblpackage_details INNER JOIN tblpackage   ON (tblpackage_details.packageID = tblpackage.packageID) where tblpackage.packageID=$packageID ";
            $query = $this->db->query($sql);
            foreach ($query->result() as $row) 
                {
                    
                    $data["PID"] = $row->packageID;
                    $data["pageID"] = $row->pageID;
                    $data["countryID"] = $row->countryID;
                    $data["productName"] = $row->packageName;
                    $data["details"]=$this->Mdlshop->getDetailProdutcs_arrangeParagraph($row->details);
                    
                    $col = explode("~",$row->imageURL);
                    if(count($col)>1)
                    {
                    $data["imgBackground"]=base_url().$col[0]; 
                    $data["imgFeatures"]=base_url().$col[1];            
                    }
                    else
                    {
                    $data["imgBackground"]=""; 
                    $data["imgFeatures"]="";            
                    }
         
                    $data["price"] = $this->Mdlshop->getPackagePrice($packageID,$data["countryID"]);
                }
            
            
            //GET ITEM LIST PRODUCTS
            $html="";
            $sql="SELECT tblpackage_item.packageID,countryID,tblproduct.pageID,tblproduct.PID,priceSymbol, tblblog_pages.url, tblmedia.source,productName, retailPrice,quantity,(retailPrice* quantity) as 'total' FROM   tblproduct   INNER JOIN tblpackage_item        ON (tblproduct.PID = tblpackage_item.PID)   INNER JOIN tblmedia       ON (tblmedia.mediaID = tblproduct.mediaID)   INNER JOIN tblblog_pages        ON (tblblog_pages.pageID = tblproduct.pageID)   INNER JOIN tblproduct_price   ON (tblproduct_price.PID = tblproduct.PID)  where tblpackage_item.packageID=$packageID and tblproduct_price.countryID=".$data["countryID"]." order by productName";
            $query = $this->db->query($sql);
            $totalItems=0;
            $symbol="";
            $flag=0;
            foreach ($query->result() as $row) 
                {
                $flag=$row->countryID;
                $totalItems+=$row->total;
                $symbol=$row->priceSymbol;
                $html.='
                      <div class="item-list-products">
                        <table>
                            <tr>
                                <td class="price-left-image" rowspan=2>
                                    <div><img src="'.$this->url->getimgURL($row->source).'"></div>
                                </td>
                                <td colspan=9 align=center class="price-left-heading">
                                    <div>
                                        <span><a style="color:'.$theme["nBackColor"].'" href="'.$this->setURLProducts($row->pageID).'">'.$row->productName.'</a></span>
                                    </div>
                                </td>                   
                            </tr>
                            <tr>
                                <td colspan=2 align=right bgcolor="'.$theme["nBorderColor"].'">
                                    <span style=""><b>Price:</b> <span class="desc-price-right">'.$row->priceSymbol.' '.number_format($row->retailPrice,2).'</span></span>
                                </td>
                                <td colspan=2 align=right bgcolor="'.$theme["nBackColor"].'">
                                    <span style=""><b>Quantity:</b> <span class="desc-price-right">'.$row->quantity.'</span></span>
                                </td>
                                <td colspan=2 align=right bgcolor="'.$theme["pBackColor"].'">
                                  <span style=""><b>Total:</b> <span class="desc-price-right">'.$row->priceSymbol.' '.number_format($row->total,2).'<span></span></span></span>
                                </td>
                                </tr>
                        </table>
                      </div>
                ';
                }
                
                $html.='
               <div  class="item-list-products-footer">
                    Grand Total <span>'.$symbol.' '.number_format($totalItems,2).'</span>
                </div>
                ';
                
                $data["items"]=$html;
                  //GET FLAG COUNTRY
                  $data["flag"]=base_url()."images/system/noimage.jpg";
                  $sql="select * FROM   tblref_country   INNER JOIN tblmedia    ON (tblref_country.mediaID = tblmedia.mediaID) where countryID=".$flag;
                  $query = $this->db->query($sql);
                  foreach ($query->result() as $row) 
                        {
                            $data["flag"] = $this->url->getimgURL($row->source);
                        }

          //GET PACKAGE INCLUSIONS AND BENEFITS
              //INCLUSIONS
              $sql="SELECT * FROM  tblpackage_list_inclusions  INNER JOIN tblpackage_inclusions   ON (tblpackage_list_inclusions.packageContentID = tblpackage_inclusions.packageContentID) where tblpackage_inclusions.packageID=".$data["PID"]." and category = 'inclusions' order by `order`";
              $query = $this->db->query($sql);
              $data["packageInclusions"]="";
              foreach ($query->result() as $row)
                    {
                    $data["packageInclusions"].=$this->wrapper->setData($row->packageContentID,$row->type,$row->title,$row->content,$row->order);
                    }
              //BENEFITS
              $sql="SELECT * FROM  tblpackage_list_inclusions  INNER JOIN tblpackage_inclusions   ON (tblpackage_list_inclusions.packageContentID = tblpackage_inclusions.packageContentID) where tblpackage_inclusions.packageID=".$data["PID"]." and category = 'benefits' order by `order`";
              $query = $this->db->query($sql);
              $data["packageBenefits"]="";
              foreach ($query->result() as $row)
                    {
                    $data["packageBenefits"].=$this->wrapper->setData($row->packageContentID,$row->type,$row->title,$row->content,$row->order);
                    }                    

          //GET RELATED PRODUCTS HERE//
          $sql="SELECT tblpackage.pageID,source,packageName FROM  tblmedia  INNER JOIN tblpackage       ON (tblmedia.mediaID = tblpackage.mediaID)   INNER JOIN tblblog_pages        ON (tblblog_pages.pageID = tblpackage.pageID)   INNER JOIN tblproduct_category   ON (tblproduct_category.PCID = tblpackage.PCID) where countryID=$flag and tblpackage.packageID!=".$data["PID"]." order by packageName";
          $query = $this->db->query($sql);
          $data["relatedProduct"]="<ul class='bxslider5'>";
          if($query->num_rows()>0)
              {
                  foreach ($query->result() as $row)
                        {
                        $data["relatedProduct"].="<li class='ui-widget-animate-6s'><a href='".$this->setURLProducts($row->pageID)."'><img style='width:100%' class='unselectable' src='".base_url().$this->getOneImage($row->source)."' title='".$row->packageName."'></a></li>";
                        }
                  $data["relatedProduct"].="</ul>";            
              }
            else
              {
                  $data["relatedProduct"]="";
              }
               
            return $data;        
        }
    
    
    function openFullProductDetails($PID)
    {
    $data=array();
    
    $sql="SELECT tblproduct.PID,productName,details,tblproduct.pageID,imageURL FROM  tblproduct_details  INNER JOIN tblproduct    ON (tblproduct_details.PID = tblproduct.PID) where tblproduct.PID=$PID ";

    $query = $this->db->query($sql);
        foreach ($query->result() as $row) 
            {
            $data["PID"] = $row->PID;
            $data["pageID"] = $row->pageID;
            $data["productName"] = $row->productName;
            $data["details"]=$this->Mdlshop->getDetailProdutcs_arrangeParagraph($row->details);
            
            $col = explode("~",$row->imageURL);
            if(count($col)>1)
            {
            $data["imgBackground"]=base_url().$col[0]; 
            $data["imgFeatures"]=base_url().$col[1];            
            }
            else
            {
            $data["imgBackground"]=""; 
            $data["imgFeatures"]="";            
            }

             
            $data["price"] = $this->Mdlshop->getPrice($PID,$this->config->item("gcountryID"));
            }
    
    //FULL DETAILS DATA HERE//
    $html="";
    $sql = "SELECT * FROM   tblblog_pages   INNER JOIN tblblog_pages_content     ON (tblblog_pages.pageID = tblblog_pages_content.pageID) where tblblog_pages.PIID=".$this->config->item("gpiid")." and tblblog_pages_content.pageID=".$data["pageID"]." and tblblog_pages_content.category='full-details' group by tblblog_pages_content.contentID order by tblblog_pages_content.order";
    $query = $this->db->query($sql);
        foreach ($query->result() as $row) 
            {
            $html.=$this->wrapper->setData($row->contentID,$row->type,$row->title,$row->content,$row->order);
            }
    $data["fulldetails"]=$html;        
    
    //CONTENTS HERE//
    $html="";
    $sql = "SELECT * FROM   tblblog_pages   INNER JOIN tblblog_pages_content     ON (tblblog_pages.pageID = tblblog_pages_content.pageID) where tblblog_pages.PIID=".$this->config->item("gpiid")." and tblblog_pages_content.pageID=".$data["pageID"]." and tblblog_pages_content.category='content' group by tblblog_pages_content.contentID order by tblblog_pages_content.order";
    $query = $this->db->query($sql);
        foreach ($query->result() as $row) 
            {
            $html.=$this->wrapper->setData($row->contentID,$row->type,$row->title,$row->content,$row->order);
            }
    $data["content"]=$html;     

    //BENEFITS HERE//
    $html="";
    $sql = "SELECT * FROM   tblblog_pages   INNER JOIN tblblog_pages_content     ON (tblblog_pages.pageID = tblblog_pages_content.pageID) where tblblog_pages.PIID=".$this->config->item("gpiid")." and tblblog_pages_content.pageID=".$data["pageID"]." and tblblog_pages_content.category='benefits' group by tblblog_pages_content.contentID order by tblblog_pages_content.order";
    $query = $this->db->query($sql);
        foreach ($query->result() as $row) 
            {
            $html.=$this->wrapper->setData($row->contentID,$row->type,$row->title,$row->content,$row->order);
            }
    $data["benefit"]=$html;   
    
    //LOAD TESTIMONIES
    $html="";
    $count=0;
    $data["ytPos"]=""; $data["ytPhoto"] = base_url()."images/system/noproduct.png";$data["ytTitle"] = "";$data["ytSubTitle"] ="";$data["ytContent"] = "";$data["ytCategory"] = "";$data["ytTag"] = "";$data["ytData"] = "";$data["ytAuthor"] =  "";$data["ytSharedDt"] = "";
     
     
     
    $curPostID = $this->getCoveredFeaturesTestimony($PID); 
    $values = $this->Mdlvideosearch->getFullPostDetails($this->crypt->encrypt($curPostID),"");   
               
                    $data["ytcpostID"] = $curPostID;
                    $data["ytTitle"] = $values["title"];
                    $data["ytSubTitle"] ="";
                    $data["ytContent"] =($values["subtitle"]!="") ? $values["subtitle"]." - " : '';
                    $data["ytCategory"] = $this->getCategoryP($PID);
                    $data["ytTag"] =$values["searchTag"];
                    $data["ytData"] = $values["data"];
                    $data["ytAuthor"] =  $values["by"];
                    $data["ytSharedDt"] = $values["gapDate"];
                    $data["ytPhoto"] = $values["pheader"];
                    $data["ytPos"] = $values["position"];    
                    $data["ytView"]= $values["views"];          
           
    $sql="SELECT tblblog_post.postID, tblblog_post_content.content, tblblog_post.title,featuredImage,datePublished,searchTag,postBy  FROM  tblblog_post_content  INNER JOIN tblblog_post   ON (tblblog_post_content.postID = tblblog_post.postID)  INNER JOIN tblproduct_globaltestimony    ON (tblblog_post.postID = tblproduct_globaltestimony.postID) where tblproduct_globaltestimony.pid=$PID and tblblog_post.postID!=$curPostID";
    $query = $this->db->query($sql);
        foreach ($query->result() as $row) 
            {
                if($count==0)
                    {

                    }
            $html.='<div class="list-testimony" onclick="openYoutube(\''.$row->content.'\','.$row->postID.');">
                    <table >
                    <tr>
                    <td rowspan=4 valign=top><img oncontextmenu="return false" draggable="false" src="'.$this->url->getimgURL($row->featuredImage).'" height=85 width=100 style="margin-right:3px"></td>
                    <td valign=top><span class="testimony-header" style="padding-left:4px;">'.$row->title.'</span ><span style="font-size:10px;font-style:italic">- '.$this->date->getTimeGap($row->datePublished).'</span></td>
                    </tr>
                    <tr>
                    <td valign=bottom><span style="font-size:12px;padding-left:4px;"><b style="">Tag:</b> '.$row->searchTag.'</span>
                    <br>
                    <span style="font-size:12px;"><b style="padding-left:4px;">Shared By:</b> '.$this->mdlAccounts->getAuthorShort($row->postBy).'</span>
                    </td>
                    </tr>                        
                    <tr>
                    <td valign=top></td>
                    </tr>
                    </table>                           
              </div>';
            }    
    
    $data["listYoutube"]=$html;
       
    //GET RELATED PRODUCTS HERE//
    $sql="SELECT tblproduct.pageID, tblproduct_category.categoryName,  tblproduct.productName,tblmedia.source,tblblog_pages.url FROM  tblproduct_category   INNER JOIN tblproduct    ON (tblproduct_category.PCID = tblproduct.PCID)  INNER JOIN tblmedia   ON (tblmedia.mediaID = tblproduct.mediaID)  INNER JOIN tblblog_pages   ON (tblblog_pages.pageID = tblproduct.pageID)  where tblproduct.PID!= ".$data["PID"]." and tblproduct_category.categoryName like '".$this->getCategoryName($data["PID"])."%'";
    $query = $this->db->query($sql);
    $data["relatedProduct"]="<ul class='bxslider5'>";
    foreach ($query->result() as $row)
            {
            $data["relatedProduct"].="<li class='ui-widget-animate-6s'><a href='".$this->setURLProducts($row->pageID)."'><img style='width:100%' class='unselectable' src='".base_url().$this->getOneImage($row->source)."' title='".$row->productName."'></a></li>";
            }
    $data["relatedProduct"].="</ul>";
        
    return $data;
    }
    
        private function getCategoryP($PID)
                {
                $sql = "SELECT categoryName FROM   tblproduct_category INNER JOIN tblproduct   ON (tblproduct_category.PCID = tblproduct.PCID) where tblproduct.pid=$PID";
                $query = $this->db->query($sql);   
                foreach ($query->result() as $row)  
                    {
                    return $row->categoryName;
                    }
                return "";                   
                }
    
        private function getCoveredFeaturesTestimony($PID)
                {
                $sql = "SELECT * from tblproduct_globaltestimony where PID=$PID and mode='Covered Features'";
                $query = $this->db->query($sql);   
                foreach ($query->result() as $row)  
                    {
                    return $row->postID;
                    }
                return 0;                
                }
        private function setURLProducts($pageID)
                {
                $sql = "SELECT * FROM tblblog_pages where pageID=$pageID";
                $query = $this->db->query($sql);   
                foreach ($query->result() as $row)  
                    {
                      if($this->config->item("sitename")!="shop")
                          return $this->server->base_url().$this->config->item("sitename")."/".$row->url;

                      else
                        {
                          return $this->server->base_url().$row->url;
                        }                        
                    }              
                }     
    
        private function getCategoryName($pid)
              {
                  $sql="SELECT tblproduct_category.categoryName FROM  tblproduct_category  INNER JOIN tblproduct    ON (tblproduct_category.PCID = tblproduct.PCID) where tblproduct.PID=$pid";
                  $query = $this->db->query($sql);
                  foreach ($query->result() as $row)
                        {
                        return $row->categoryName;
                        }     
              }
         private function getOneImage($source)
              {
              $col = explode(",",$source);
              return $col[0];
              }
    
    
    function searchYoutube($pid,$search,$postID)
    {
    $html="";
        
   $sql = "SELECT tblblog_post.postID, tblproduct_globaltestimony.PID,tblblog_post_content.content, tblblog_post.title,featuredImage,datePublished,searchTag,postBy  FROM  tblblog_post_content  INNER JOIN tblblog_post   ON (tblblog_post_content.postID = tblblog_post.postID)  INNER JOIN tblproduct_globaltestimony    ON (tblblog_post.postID = tblproduct_globaltestimony.postID) where tblproduct_globaltestimony.pid=$pid and  tblblog_post.title like '%$search%' and tblblog_post.postID!=$postID";
    $query = $this->db->query($sql);

    if($query->num_rows()>0)
    {
        foreach ($query->result() as $row) 
            {
            $html.='<div class="list-testimony" onclick="openYoutube(\''.$row->content.'\','.$row->postID.');">
                    <table >
                    <tr>
                    <td rowspan=4 valign=top><img oncontextmenu="return false" draggable="false" src="'.$this->url->getimgURL($row->featuredImage).'" height=85 width=100 style="margin-right:3px"></td>
                    <td valign=top><span class="testimony-header" style="padding-left:4px;">'.$row->title.'</span ><span style="font-size:10px;font-style:italic">- '.$this->date->getTimeGap($row->datePublished).'</span></td>
                    </tr>
                    <tr>
                    <td valign=bottom><span style="font-size:12px;padding-left:4px;"><b style="">Tag:</b> '.$row->searchTag.'</span>
                    <br>
                    <span style="font-size:12px;"><b style="padding-left:4px;">Shared By:</b> '.$this->Mdlaccounts->getAuthorShort($row->postBy).'</span>
                    </td>
                    </tr>                        
                    <tr>
                    <td valign=top></td>
                    </tr>
                    </table>                            
              </div>';
            }
            }
        else
            {
            $html="<h5 align=center style='color:red'>-No Results Found-</h5>";
            }
        return $html;
    }
    
    function getSiteTitle()
        {
            $col = explode("/", $this->url->getURL());
            $col[count($col)-1];
            $data = array();
            $buildSite="";        
            $data["countryID"]="0";
            $data["title"]="";
            $data["pageID"] = "0";
            
            for($i=count($col)-1;$i>=count($col)-3;$i--)
                {
                if($i==count($col)-1) $buildSite=$col[$i]."/";
                else $buildSite .= $col[$i]."/";
                }
            //REVERSE THE SEQUNCE
            $col=explode("/",$buildSite);
            for($i=count($col)-1;$i>=0;$i--)
                {
                if($i==count($col)-1) $buildSite=$col[$i]."/";
                else $buildSite .= $col[$i]."/";            
                }     
            //REMOVE THE FIRST AND LAST SLASH//
            $buildSite = substr($buildSite,1,strlen($buildSite)); //first SLASH
            $buildSite = substr($buildSite,0,strlen($buildSite)-1); //last SLASH
      
            //FUNCTIONAL BEVERAGES//
            if (strpos($buildSite, 'functionalbeverages') !== false || strpos($buildSite, 'globalpackages') !== false)  
                {
                if (strpos($buildSite, 'mychoco') !== false || strpos($buildSite, 'vida') !== false)  
                    {
                    //do nothing here//
                    }
                else
                    {
                    $buildSite = $buildSite;  
                    }
                }   
            
            $sql="select * FROM   tblblog_pages where url='$buildSite'";
            $query = $this->db->query($sql);    
            foreach ($query->result() as $row) 
                {
                $data["pageID"] = $row->pageID;
                $data["title"] = $row->title;
                }
            $sql = "SELECT tblpackage.countryID FROM   tblblog_pages  INNER JOIN  tblpackage    ON (tblblog_pages.pageID = tblpackage.pageID) where parents=".$data["pageID"]." limit 0,1";
            $query = $this->db->query($sql);    
            foreach ($query->result() as $row) 
                {
                $data["countryID"] = $row->countryID;
                }            
                  
        return $data;
        }
   
   
   function getPackageListContent()
        {
        $col = explode("/", $this->url->getURL());
            $col[count($col)-1];
            $data = array();
            $buildSite="";        
            $data["countryID"]="0";
            $data["title"]="";
            $data["pageID"] = "0";
            
            for($i=count($col)-1;$i>=count($col)-3;$i--)
                {
                if($i==count($col)-1) $buildSite=$col[$i]."/";
                else $buildSite .= $col[$i]."/";
                }
            //REVERSE THE SEQUNCE
            $col=explode("/",$buildSite);
            for($i=count($col)-1;$i>=0;$i--)
                {
                if($i==count($col)-1) $buildSite=$col[$i]."/";
                else $buildSite .= $col[$i]."/";            
                }     
            //REMOVE THE FIRST AND LAST SLASH//
            $buildSite = substr($buildSite,1,strlen($buildSite)); //first SLASH
            $buildSite = substr($buildSite,0,strlen($buildSite)-1); //last SLASH
      
            //FUNCTIONAL BEVERAGES//
            if (strpos($buildSite, 'functionalbeverages') !== false || strpos($buildSite, 'globalpackages') !== false)  
                {
                if (strpos($buildSite, 'mychoco') !== false || strpos($buildSite, 'vida') !== false)  
                    {
                    //do nothing here//
                    }
                else
                    {
                    $buildSite = $buildSite;  
                    }
                }  
                
                $buildSite = 'shop/'.$buildSite;
                //REMOVE LIST url
                $buildSite = substr($buildSite,0,strlen($buildSite)-5); //first SLASH      
                
                $sql = "SELECT * FROM tblblog_pages where url='$buildSite'";
                $query = $this->db->query($sql);    
                $html="";
                foreach ($query->result() as $row) 
                  {
                         
                  $pageID = $row->pageID;
                  $sql = "SELECT tblpackage.packageName, tblblog_pages.url,tblmedia.source FROM   tblblog_pages  INNER JOIN tblpackage    ON (tblblog_pages.pageID = tblpackage.pageID)  INNER JOIN tblmedia   ON (tblmedia.mediaID = tblpackage.mediaID) where tblblog_pages.parents = $pageID order by tblpackage.packageName";
                  $query = $this->db->query($sql);    
                  foreach ($query->result() as $row) 
                      {
                      $html.='
                            <li>
                            <a href="'.$this->url->getlinkURL($row->url).'">
                            <div>
                            <img src="'.$this->url->getimgURL($row->source).'">
                            <h4 align=center>'.$row->packageName.'</h4>
                            </div>
                            </a>
                            </li>
                      ';
                      }
                  }
                return $html;  
        } 
        private function getLinkURL($countryName)
              {
              $sql="SELECT * FROM tblblog_pages where title like '$countryName' limit 0,1";
              $query = $this->db->query($sql);    
              foreach ($query->result() as $row) 
                  {
                  return $this->url->getlinkURL($row->url)."/list";
                  }
              return "";
              }
    function getCountryLinkList($countryID_excluded)
        {
        $html="";
        $sql="SELECT tblref_country.countryID, countryName, tblmedia.source  FROM    tblref_country   INNER JOIN tblpackage       ON (tblref_country.countryID = tblpackage.countryID)   left JOIN tblmedia      ON (tblmedia.mediaID = tblref_country.mediaID) where tblpackage.countryID!=$countryID_excluded group by tblpackage.countryID order by countryName";
        $query = $this->db->query($sql);    
        foreach ($query->result() as $row) 
            {
            $html.='<li>
            <a href="'.$this->getLinkURL($row->countryName).'"><div onclick="openCountry(\'aa\');"><img src="'.$this->url->getimgURL($row->source).'" title="'.ucfirst($row->countryName).'"></div>
            <span>'.ucfirst(strtolower($row->countryName)).'</span></a></li>';
            }
      
        return $html;
        }
    function getProductfromSite($type="products")
        {
        $col = explode("/", $this->url->getURL());
        $col[count($col)-1];
        $data = array();
        $buildSite="";
        
        $data["PID"]=0;
        $data["pageID"]=0;
        $data["packageID"]=0;
        $data["category_url"]="";
        $data["category"]="";
        $data["product"]="";
        $data["countryID"]=0;
        for($i=count($col)-1;$i>=count($col)-3;$i--)
            {
            if($i==count($col)-1) $buildSite=$col[$i]."/";
            else $buildSite .= $col[$i]."/";
            }
        //REVERSE THE SEQUNCE
        $col=explode("/",$buildSite);
        for($i=count($col)-1;$i>=0;$i--)
            {
            if($i==count($col)-1) $buildSite=$col[$i]."/";
            else $buildSite .= $col[$i]."/";            
            }     
        //REMOVE THE FIRST AND LAST SLASH//
        $buildSite = substr($buildSite,1,strlen($buildSite)); //first SLASH
        $buildSite = substr($buildSite,0,strlen($buildSite)-1); //last SLASH
    
        //FUNCTIONAL BEVERAGES//
        if (strpos($buildSite, 'functionalbeverages') !== false || strpos($buildSite, 'globalpackages') !== false)  
            {
            if (strpos($buildSite, 'mychoco') !== false || strpos($buildSite, 'vida') !== false)  
                {
                //do nothing here//
                }
            else
                {
                $buildSite ='shop/'.$buildSite;  
                }
            }            
 
          if($type=="products")
              {
                    //GET PRODUCT INFO
                    $sql= "SELECT tblproduct.PID,tblblog_pages.pageID FROM  tblproduct   INNER JOIN tblblog_pages   ON (tblproduct.pageID = tblblog_pages.pageID) where url ='".$buildSite."'";
                    

                                
                    $query = $this->db->query($sql);
                    if($query->num_rows()>0)
                        {
                            foreach ($query->result() as $row) 
                            {
                            $data["PID"]=$row->PID;
                            $data["pageID"]=$row->pageID;
                            }                
                        }
                    $sql = "SELECT categoryName,productName,tblproduct_category.pageID as 'pgIDc' FROM  tblproduct_category  INNER JOIN tblproduct     ON (tblproduct_category.PCID = tblproduct.PCID) where tblproduct.PID=".$data["PID"];
                    $query = $this->db->query($sql);
                    foreach ($query->result() as $row) 
                        {   
                            $data["category_url"] = $this->getCategoryURL($row->pgIDc);  
                            $data["category"]=$row->categoryName;
                            $data["product"]=$row->productName; 
                        }
                            
                    return $data;
                  
     
              }
             
           elseif($type=="package list")
              {
              $sql = "SELECT * FROM tblblog_pages where url='".$buildSite."'";
              $query = $this->db->query($sql);
              foreach ($query->result() as $row) 
                    {
                    $col = explode("/", $this->url->getURL());
                    $data["category"]=$col[count($col)-2];
                    $data["pageID"]=$row->pageID;
                    }
              
              //GET THE MOTHER pageID
              $myquery = $buildSite = substr($buildSite,0,strlen($buildSite)-5);  
              $sql = "SELECT * FROM   tblblog_pages  where tblblog_pages.url='$myquery'";
              $query = $this->db->query($sql);    
              $motherPageID=0;
              foreach ($query->result() as $row) $motherPageID = $row->pageID;
              $data["countryID"]=$motherPageID;
              
              //GET COUNTRY ID
              $countryID=0;
              $sql="SELECT countryID FROM  tblblog_pages  INNER JOIN tblpackage   ON (tblblog_pages.pageID = tblpackage.pageID) where tblblog_pages.parents=$motherPageID limit 0,1";
              $query = $this->db->query($sql);    
              foreach ($query->result() as $row) $countryID = $row->countryID;
              $data["countryID"]=$countryID;
                                  
              return $data;
              }
           else
              {
                                  //GET PACKAGE INFO
                    $sql= "SELECT tblpackage.packageID,tblblog_pages.pageID FROM tblblog_pages INNER JOIN tblpackage   ON (tblblog_pages.pageID = tblpackage.pageID) where url ='".$buildSite."'";
                                         
                    $query = $this->db->query($sql);
                    if($query->num_rows()>0)
                        {
                            foreach ($query->result() as $row) 
                            {
                            $data["packageID"]=$row->packageID;
                            $data["pageID"]=$row->pageID;
                            }                
                        }
                    $sql = "SELECT categoryName,packageName,tblpackage.countryID, tblproduct_category.pageID as 'pgIDc'  FROM  tblproduct_category  INNER JOIN tblpackage  ON (tblproduct_category.PCID = tblpackage.PCID) where tblpackage.packageID=".$data["packageID"];
                    $query = $this->db->query($sql);
                    foreach ($query->result() as $row) 
                        {   
                            $data["category_url"] = $this->getCategoryURL($row->pgIDc);  
                            $data["category"]=$row->categoryName;
                            $data["product"]=$row->packageName; 
                            $data["countryID"]=$row->countryID; 
                            
                        }      
                    return $data;
                    
              }

        }
        
                            
                    private function getCategoryURL($categoryID)
                          {
                          $sql = "SELECT * FROM tblblog_pages where pageID=$categoryID";
                          $query = $this->db->query($sql);
                          foreach ($query->result() as $row)
                                {
                                return $row->url;
                                }               
                          }       
}
?>
