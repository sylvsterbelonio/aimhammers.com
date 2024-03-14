<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Csswrapper {
            
            public function getTitleAttributes($title)
                    {
                    $CI =& get_instance();                    
                    $CI->load->model("blog/Mdlgeneral");  
                    $CI->load->library("Url");                       
                    if (strpos($title, '[') !== false) 
                        {
                        $col = explode("[",$title);
                        $leftTitle=$col[0];
                        $col2 = explode("]",$col[1]);
                        
                        //DETECT THAT IT IS A LINK
                        $col3 = explode("~",$col2[0]);
                        if($col3[0]=="a")
                            {
                            $rightTitle=$col2[1];
                            return $leftTitle.$CI->url->getlinkURL($col3[1]).$rightTitle;
                            
                            }
                        return $title;
                        
                        }
                    else
                        {
                        return $title;
                        }
                    }

            private function searchAttributes($attributes)
                    {    
                    $CI =& get_instance();                    
                    $CI->load->model("blog/Mdlgeneral");     
                    $div = $CI->Mdlgeneral->getStyleAttr("div","padding");    
                                       
                    $col = explode(":",$attributes);
                    if($col[0]=="size")
                    {
                        if($col[1]=="full")
                            return "width:100%;";
                    }
                    elseif($col[0]=="height")
                        return"height:".$col[1]."px;";
                    elseif($col[0]=="width")
                        return"width:".$col[1]."px;";  
                    elseif($col[0]=="align")
                    {
                        if($col[1]=="center")
                            {
                            return 'margin:0 auto;display:block;';
                            }
                        elseif($col[1]=="right")
                            {
                            return 'float:right';
                            }
                    }
                    elseif($col[0]=="corner")
                    {
                        return "border-radius:".$col[1]."px;";  
                    }
                    }
  function imageWrapper($listProperties)
        {
                $css="";
                $attr = explode(",",$listProperties);
                
                if(count($attr)==1)
                    {
                    return $this->searchAttributes($attr[0]);
                    }
                else
                    {
                    for($i=0;$i<=count($attr)-1;$i++)
                        {
                           $css.=$this->searchAttributes($attr[$i]);
                        }
                                     
                    }
                

         return $css;        
        }



}

?>
