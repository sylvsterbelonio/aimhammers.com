<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Youtube {

  function getVideo($data)
        {
        $CI =& get_instance(); 
        $CI->load->library("Csswrapper");    
        $separate = explode("[",$data);
        $html="";
        
        if (strpos($data, '[') !== false) 
            {
            $separate = explode("[",$data);
            $attrList = str_replace("]","",$separate[1]);
            $col_attr = explode(":",$attrList);
            
            $margin=0;
            
            if($col_attr[0]=="margin") $margin = $col_attr[1];
            
            $css_builder = $CI->csswrapper->imageWrapper($attrList);

            $html.="<style>.lightbox{display:none;}
                    .mydetails-video{padding:50px;
                    background:black;
                    background-image:url(".base_url()."images/gif/ajax-loader@2x.gif);
                    background-postion:center;
                    background-repeat:no-repeat;
                    }
                    </style>";
                                 
            $html='<style>.video-container {position:relative;padding-bottom:56.25%;padding-top:30px;height:0;overflow:hidden;}.video-container iframe, .video-container object, .video-container embed {position:absolute;top:0;left:0;width:100%;height:100%;}</style>';        
            $html.='<div class="mydetails-video" style="margin-bottom:10px;margin-left:'.$margin.'px;margin-right:'.$margin.'px;background:#ebebeb;background-image:url('.base_url().'images/gif/ajax-loader@2x.gif);background-position:center;background-repeat:no-repeat" ><div class="video-container"><iframe  src="//www.youtube.com/embed/'.$separate[0].'?modestbranding=1&amp;rel=0&amp;showinfo=0" frameborder="0" allowfullscreen="0"></iframe></div></div>';
            return $html;  
                        
            }
        else
            {
            $html='<style>.video-container {position:relative;padding-bottom:56.25%;padding-top:30px;height:0;overflow:hidden;}.video-container iframe, .video-container object, .video-container embed {position:absolute;top:0;left:0;width:100%;height:100%;}</style>';        
            $html.='<div class="video-container"><iframe  src="//www.youtube.com/embed/'.$data.'?modestbranding=1&amp;rel=0&amp;showinfo=0" frameborder="0" allowfullscreen="0"></iframe></div>';
            return $html;            
            }
        
               

        }

}
?>
