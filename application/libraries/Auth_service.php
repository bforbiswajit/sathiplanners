<?php

/* 
 * FirstMe Server API
 * Author : Biswajit Bardhan  * 
 */

class Auth_service
{
    public function __construct()
    {
        $this->load->library('session');
        if(!$this->session->userdata('userId'));
            //implement authentication for every page
        /*$headers = apache_request_headers();
        if(!isset($headers['Api-Key']) || $headers['Api-Key'] != '1234')
        {
            //echo json_encode(array("status" => "error", "message" => array("Title" => "Unauthorised Access Restricted.", "Code" => "401")));
            die("Unauthorised Access Restricted.");
        }*/
    }
}