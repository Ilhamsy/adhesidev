<?php
class login_m extends CI_model
{
 public function admin($username='',$password='')
 {
return $this->db->query("SELECT * from admin where username='$username' AND password='$password' limit 1");
 }

}