<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cars extends PM_Controller {

    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load_view('cars');
    }

}