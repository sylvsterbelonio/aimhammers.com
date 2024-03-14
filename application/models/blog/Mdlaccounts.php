<?php
class Mdlaccounts extends CI_Model   {

 public function __construct()
        {
                parent::__construct();
                $this->load->library('session');
                $this->load->library('encrypt');
        }
        //This will generate a 256 bit hex value
        public function generateSalt(){
          $characters = '0123456789abcdef';
          $length = 64; 
        
          $string = '';
          for ($max = mb_strlen($characters) - 1, $i = 0; $i < $length; ++ $i)
          {
            $string .= mb_substr($characters, mt_rand(0, $max), 1);
          }
          return $string;
        }     
        public function testPassword($fPassword, $fSaltFromDatabase, $fHashFromDatabase){
        if (hash_hmac("sha256", $fPassword, $fSaltFromDatabase) === $fHashFromDatabase){
          return(true);
        }else{
          return(false);
        }
      }
           
     private function nextID($field,$table)
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
 public function validateLogin($username,$password)
        {
        
        $query = $this->db->get_where('tblsystemuser', array('username' => $username));
         if ($query->num_rows() == 1)
         {
       
        foreach ($query->result() as $row)
            {
            //return $this->encrypt->decode($row->password);            
            if($this->testPassword($password, $row->salt, $row->password)){
                
                
                $newdata = array(
                'userid'  => $row->PIID,
                'userlvl'     =>$row->userLevel,
                'logged_in' => TRUE
                );
                $this->session->set_userdata($newdata);
  
                
                return "1";
                          
                
              }else{
                return "Sorry, your email and password does not match, please try again.";
              }
            }
                   
         
         }
         else
          {
          return "No Email Address Existed, Please check again and reenter your email.";
          }

        
        }       
 public function check_username($username)
        {
        $query = $this->db->get_where('tblsystemuser', array('username' => $username));
        if ($query->num_rows() == 1)
        { 
            return "Email Address is already taken. Please try another email."; 
        } 
        return 1;       
        } 

 public function check_referral_codes($accountCode)
        {
        $query = $this->db->get_where('tblaccount_codes', array('accountCode' => $accountCode));
        if ($query->num_rows() == 1)
        { 
            foreach ($query->result() as $row)
                {
                if($row->isAvailable==0)
                      {
                      return 1;
                      }
                else return "This referral ID is not yet used. Please contact the administrator for ask assistance.";
                }
        }
        return "The refferal ID does not exist. Please check the codes and reenter again!";                
        }   
         
 public function check_codes($accountCode,$serialCode)
        {
        $query = $this->db->get_where('tblaccount_codes', array('accountCode' => $accountCode, 'securityCode' => $serialCode));
        if ($query->num_rows() == 1)
        { 
            foreach ($query->result() as $row)
                {
                if($row->isAvailable==1)
                      {
                      return 1;
                      }
                else return "Your Code is no longer available. Please contact the administrator to ask assistance.";
                }
        }
        return "Your Code does not match. Please check the codes and reenter again!";                
        }       

        private function getAccountCodes($refID,$codID)
              {
               $data = array();
               $query = $this->db->get_where('tblaccount_codes', array('accountCode' => $refID));
                foreach ($query->result() as $row)
                    {
                    $data["referralID"]=$row->codeID;
                    }              
               $query = $this->db->get_where('tblaccount_codes', array('accountCode' => $codID));
                foreach ($query->result() as $row)
                    {
                    $data["accountID"]=$row->codeID;
                    }     
              return $data;          
              }
 
 public function create_accounts($list)
        {




          $piid = $this->nextID("PIID","tblpersonalinfo");
          //PERSONAL INFO
          $getCodes = $this->getAccountCodes($list["referral"],$list["code"]);


                   
          $data = array(
              'piid' => $piid ,
              'referralID' => $getCodes["referralID"] ,     
              'codeID'=>$getCodes["accountID"] ,     
              'firstName' => $list["fname"] ,              
              'lastName' => $list["lname"] ,   
              'emailAddress' => $list["email"] ,  
              'siteURL' =>  'member-site-'.$piid,
              'createdBy' => $piid,
              'createdDt' => date('Y-m-d H:i:s', time()),
              'updatedBy' => $piid,
              'updatedDt' => date('Y-m-d H:i:s', time())
          );
    		   $this->db->insert('tblpersonalinfo', $data); 
    		  //SYSTEM USER
    		   
    		  //$encrypted_string = $this->encrypt->encode($list["password"]);
          $salt = $this->generateSalt();
          $hash = hash_hmac("sha256", $list["password"], $salt);
              		  
    		  $data = array(
              'PIID' => $piid ,
              'username' => $list["email"] ,    
              'salt' => $salt, 
              'password'=> $hash ,     
              'userLevel' => 3 ,              
              'createdBy' => $piid,
              'createdDt' => date('Y-m-d H:i:s', time()),
              'updatedBy' => $piid,
              'updatedDt' => date('Y-m-d H:i:s', time())
          );
    		  $this->db->insert('tblsystemuser', $data); 

    		  $data = array(
    		      'isAvailable' => 0,
              'dtCodeProcessed' => date('Y-m-d H:i:s', time())
          );
          $this->db->where('codeID',$getCodes["accountID"]);       
      		$this->db->update('tblaccount_codes',$data); 
              		  		  
    		  return 1;          
         
        }
 
 
 public function getUserLevel($PIID)
        {
        $data   =  "";
        $query = $this->db->get_where('tblpersonalinfo', array('siteURL' => $site));
        if ($query->num_rows() == 1)
        { 
            foreach ($query->result() as $row)
            {
            return $row->PIID;
            }
        }
        return "0";
        }

 public function getThemeID($PIID)
        {
        $data   =  "";
        $query = $this->db->get_where('tblthemes', array('PIID' => $PIID));
        if ($query->num_rows() == 1)
        { 
            foreach ($query->result() as $row)
            {
            return $row->themeID;
            }
        }
        return "1";       
        }
        
 public function checkAccountSite($site)
        {
        $data   =  "";
        $query = $this->db->get_where('tblpersonalinfo', array('siteURL' => $site));
        if ($query->num_rows() == 1)
        { 
            foreach ($query->result() as $row)
            {
            return true;
            }
        }
        return false;
        }
                 
 public function getAccountPIID($site)
        {
        $data   =  "";
        $query = $this->db->get_where('tblpersonalinfo', array('siteURL' => $site));
        if ($query->num_rows() == 1)
        { 
            foreach ($query->result() as $row)
            {
            return $row->PIID;
            }
        }
        return "0";
        }   
 public function getSiteName($piid)
        {
        $data   =  "";
        $query = $this->db->get_where('tblpersonalinfo', array('PIID' => $piid));
        if ($query->num_rows() == 1)
        { 
            foreach ($query->result() as $row)
            {
            return $row->siteURL;
            }
        }
        return "";        
        }    
        
 public function getPhoto_Header_PIID($piid)
        {
        $sql = "SELECT source FROM tblmedia INNER JOIN tblpersonalinfo   ON (tblmedia.mediaID = tblpersonalinfo.mediaID) where PIID=".$piid;
        $query = $this->db->query($sql); 
        foreach ($query->result() as $row)
        {
        return base_url().$row->source;
        }
        return base_url().'images/system/nophoto.jpg';
        }
                  
 public function getPhoto_Header()
        {
        $sql = "SELECT source FROM tblmedia INNER JOIN tblpersonalinfo   ON (tblmedia.mediaID = tblpersonalinfo.mediaID) where PIID=".$this->config->item("gpiid");
        $query = $this->db->query($sql); 
        foreach ($query->result() as $row)
        {
        return base_url().$row->source;
        }
        return base_url().'images/system/nophoto.jpg';
        }
        
        
 public function getContactsInfo_Header()
        {
        $html='<div class="contact">
        <p>';
        $query = $this->db->get_where('tblpersonalinfo', array('PIID' => $this->config->item("gpiid")));
        if ($query->num_rows() == 1)
        { 
            foreach ($query->result() as $row)
            {
              $html.='<b class="yourName">'.$row->firstName.' '.$row->middleName.' '.$row->lastName.'</b></p><hr class="ui-hr">';
              $sql = "SELECT  tblpersonalinfo_contacts.type, tblpersonalinfo_contactlist.value,source,`mode`,siteurl FROM   tblpersonalinfo_contactlist  INNER JOIN tblpersonalinfo_contacts    ON (tblpersonalinfo_contactlist.contactID = tblpersonalinfo_contacts.contactID) where PIID=".$this->config->item("gpiid");
              $query2 = $this->db->query($sql); 
              foreach ($query2->result() as $row)
                {
                if ($row->mode=="View")
                  {
                  $html.='<div class="listcontacts" >
                        <img src="'.base_url().$row->source.'" width=30 height=30 style="float:left">
                        <span>'.$row->value.'</span>
                        </div>';                  
                  }
                else
                  {
                  $html.='<div class="listcontacts" >
                        <a class="person" href="'.$row->siteurl.'" target="_blank"><img src="'.base_url().$row->source.'" width=30 height=30 style="float:left">
                        <span>'.$row->value.'</span>
                        </a></div>';                     
                  }
                }
            }
        }
        else
        {
        //DEFAULT CONTACT INFO FROM HUMMER
        $query = $this->db->get_where('tblpersonalinfo', array('PIID' => 0));
        foreach ($query->result() as $row)
            {
              $html.='<b class="yourName">'.$row->firstName.' '.$row->middleName.' '.$row->lastName.'</b></p><hr class="ui-hr">';
              $sql = "SELECT  tblpersonalinfo_contacts.type, tblpersonalinfo_contactlist.value,source,`mode`,siteurl FROM   tblpersonalinfo_contactlist  INNER JOIN tblpersonalinfo_contacts    ON (tblpersonalinfo_contactlist.contactID = tblpersonalinfo_contacts.contactID) where PIID=0";
              $query2 = $this->db->query($sql); 
              foreach ($query2->result() as $row)
                {
                if ($row->mode=="View")
                  {
                  $html.='<div class="listcontacts" >
                        <img src="'.base_url().$row->source.'" width=30 height=30 style="float:left">
                        <span>'.$row->value.'</span>
                        </div>';                  
                  }
                else
                  {
                  $html.='<div class="listcontacts" >
                        <a class="person" href="'.$row->siteurl.'" target="_blank"><img src="'.base_url().$row->source.'" width=30 height=30 style="float:left">
                        <span>'.$row->value.'</span>
                        </a></div>';                     
                  }
                }            
            }
        }
        return $html;
        }
        
 public function getAuthorShort($piid)
        {
        $query = $this->db->get_where('tblpersonalinfo', array('PIID' => $piid));
        foreach ($query->result() as $row)
            {
            if($row->lastName!="")
            return substr($row->firstName,0,1).". ".$row->lastName;
            else
            return $row->firstName.' '.$row->lastName;
            }
        return "Unknown";
        }       
        
        
}
?>
