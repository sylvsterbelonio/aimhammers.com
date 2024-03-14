<?php
class Mdlmetaproperties extends CI_Model   {

 public function __construct()
        {
                parent::__construct();
                $this->load->library("Url");
        }
 
 public function getPageNo()
        {
        
        $data = explode("/",$this->url->getURL());
        
        $urlFinder="";
        for($i=3;$i<count($data);$i++)
            {
            if($i==3) $urlFinder=$data[$i];
            else $urlFinder.="/".$data[$i];
            }
        $urlFinder = str_replace("index.php/","",$urlFinder);
        

        if($urlFinder=="index.php") $urlFinder="home";
        //BUSINESS PARTNERS
        if($urlFinder=="business-partners") $urlFinder=$urlFinder.="#business-partners"; 
        
                
        $query = $this->db->get_where('tblblog_pages', array('url' => $urlFinder));
        foreach ($query->result() as $row)
            {
            return $row->pageID;
            } 
        
        return 0;
        }
 
 public function getMeta($pageID=0)
        {                       $data=array();
                                $data["ogTitle"]="";
                                $data["title"]="";
                                $data["ogDescription"]="";
                                $data["ogUrl"]="";
                                $data["ogIcon"]="";
                                $data["ogImage"]="";
                                $data["meta_keywords"]="";
                                $data["ogLocale"] = "";
                                $data["ogType"] = "";
                                $data["ogSitename"] = "";
                                $data["ogPublisher"] ="";
                                $data["ogAuthor"] = "";
                                $data["ogAppid"] =0;
                                $data["icon"]="";
                                        
        $pageID=$this->getPageNo();
        
        
        $query = $this->db->get_where('tblblog_pages', array('pageID' => $pageID));

        //CHECK IF THERE IS A PAGE EXIST IN THE tblblog_pages
        if ($query->num_rows() == 1)
        { 

            $sql = "SELECT * FROM  tblblog_pages  where tblblog_pages.pageID=".$pageID;
            $queryx = $this->db->query($sql);
           
            if ($queryx->num_rows() == 1)
                {
             
                    foreach ($queryx->result() as $row)
                    {
 
                    //THIS IS FROM PAGE ONLY!
                    $data["ogTitle"]=$row->title;
                    $data["title"]=$row->title." - Alliance in Motion Global Inc.";
                    $data["ogDescription"]=$row->meta_description;
                    $data["ogUrl"]=base_url().str_replace("home","",$row->url);
                    $data["ogIcon"]=$this->url->getimgURL($row->meta_icon);
                    $data["ogImage"]=$this->url->getimgURL($row->meta_image);
                    $data["meta_keywords"]=$row->meta_keywords;
                    }
                    

                        $sql = "SELECT concat(firstName,' ',middleName,' ',lastName) as 'fullname',locale, `type`,publisher,site_name, author, app_id FROM  tblpersonalinfo  INNER JOIN tblblog_pages_fbmeta   ON (tblpersonalinfo.PIID = tblblog_pages_fbmeta.PIID) where tblpersonalinfo.PIID = ".$this->config->item("gpiid");
                        $query2 = $this->db->query($sql);
                         if ($query2->num_rows() == 1)
                            {
                            foreach ($query2->result() as $row)
                                {
                                $data["ogLocale"] = $row->locale;
                                $data["ogType"] = $row->type;
                                $data["ogSitename"] = $row->fullname." | ".$row->site_name;
                                $data["ogPublisher"] = $row->publisher;
                                $data["ogAuthor"] = $row->author;
                                $data["ogAppid"] = $row->app_id;
                                }                   
                            }
                          else
                            {
                            $data["meta_author"]="Hummer~HUMMER The Solution Partner in Life";   
                            }
                        
                         
                
                
                }
            else
                {
                //LOAD THE DEFAULT META DATA!
                $query = $this->db->get_where('tblblogs_language_lang', array('category' => "meta", 'type' => "reset",'languageID'=>$this->config->item("glanguageID")));        
                //CHECK IF THERE IS A LANGUAGE AVAILABLE 
                if($query->num_rows()>0)
                {
                foreach ($query->result() as $row)
                  {

                    if($row->subtype=="title") $data["title"]=$row->value;
                    else if ($row->subtype=="image") $data["meta_image"]=$row->value;
                    else if ($row->subtype=="description") $data["meta_description"]=$row->value;
                    else if ($row->subtype=="keywords") $data["meta_keywords"]=$row->value;       
                    else if ($row->subtype=="author") $data["meta_author"]=$row->value;   
                    else if ($row->subtype=="icon") $data["icon"]=$row->value;              
                  }
                  
                  
                $query2 = $this->db->get_where('tblpersonalinfo', array('PIID' => $this->config->item("gpiid")));
                         if ($query2->num_rows() == 1)
                            {
                            foreach ($query2->result() as $row)
                                {
                                $data["meta_author"] = $row->firstName." ".$row->middleName." ".$row->lastName;
                                }                   
                            }
                          else
                            {
                            $data["meta_author"]=$data["meta_author"]=trim($row->value);  
                            }
                              
                  return $data;                       
                }
                else
                {
                //USE THE DEFAULT ENGLISH LANGUAGE//
                $query = $this->db->get_where('tblblogs_language_lang', array('category' => "meta", 'type' => "reset",'languageID'=>1));
                foreach ($query->result() as $row)
                  {
                    if($row->subtype=="title") $data["title"]=$row->value;
                    else if ($row->subtype=="image") $data["meta_image"]=$row->value;
                    else if ($row->subtype=="description") $data["meta_description"]=$row->value;
                    else if ($row->subtype=="keywords") $data["meta_keywords"]=$row->value;   
                    else if ($row->subtype=="author") $data["meta_author"]=$row->value;   
                    else if ($row->subtype=="icon") $data["icon"]=$row->value;              
                  }              
                    return $data;         
                }  
                }
        }     

        return $data;       
        }
}
?>
