<?php

/* 
 * FirstMe Server API
 * Author : Biswajit Bardhan  * 
 */

defined('BASEPATH') OR exit('Forbidden!');

class Login_model extends CI_Model {
    public $em;
    public function __construct()
    {
        parent::__construct();
        $this->em = $this->doctrine->em;
    }
    
    public function Login($email, $password){
        if(($user = $this->em->getRepository('Entities\User')->findOneBy(array("email" => $email))) == NULL)
            return FALSE;

        $salt = strlen($password).substr($email, 0, strlen(strlen($email)));
        if(crypt($password, $salt) != $user->getPassword()){
            $data['err_msg'] = "Sorry, User/Password Mismatch.";
            $this->session->set_userdata($data);
            
            return FALSE;
        }
        else{
            $data['err_msg'] = "";
            $data['userId'] = $user->getId();
            $data['type'] = $user->getType();
            $data['name'] = $user->getName();
            $data['lastLogin'] = $user->getLastlogin();
            
            $this->session->set_userdata($data);
            $this->db->update('user',array("lastLogin" => date('Y-m-d H:i:s')), array("id" => $user->getId()));
            return TRUE;
        }
    }
}