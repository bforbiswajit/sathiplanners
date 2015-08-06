<?php

/* 
 * FirstMe Server API
 * Author : Biswajit Bardhan  * 
 */

defined('BASEPATH') OR exit('Forbidden!');

class TestController extends CI_Controller
{
    public function index()
    {
        $this->load->view('templates/template.php');
    }
    
    public function TestView(){
        $this->load->view('header.php');
        $this->load->view('add_mine.php');
        $this->load->view('footer.php');
    }
}