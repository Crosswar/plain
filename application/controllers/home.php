<?php

class Home extends CI_Controller
{   
    function __construct() 
    {
        parent::__construct();
    }
    
    function index($start = 0)//index page
    {
        $this->load->view('main/header');
        $this->load->view('main/content');
        $this->load->view('main/footer');
    }
}