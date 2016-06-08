<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class userModel extends CI_Model
{
     function __construct()
     {
          // Call the Model constructor
          parent::__construct();
     }

     //get the username & password from tbl_usrs
     function getUser($usr, $pwd)
     {
          $sql = "select * from users where userName = '" . $usr . "' and userPassword = '" . md5($pwd) . "' and userStatus = 'active'";
          $query = $this->db->query($sql);
          return $query->num_rows();
     }
     //insert into user table
    function insertUser($data)
    {
    	
        return $this->db->insert('users', $data);
    }
    
    
}?>