<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cars extends PM_Controller {

    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
    	$view_params = array();
    	$view_params['kleinanzeigen_last_id'] = $this->PM_Model->get_max_value('autos_kleinanzeigen', 'id', '', false);
        $this->load_view('cars', $view_params);
    }

    public function get_new_data()
    {
    	$resp = array();
    	$last_id = $this->input->post('last_id');
    	$where['id >='] = $last_id;
    	$resp['car_info'] = $this->PM_Model->get_list('autos_kleinanzeigen', 0, $where);
    	$this->load_json($resp);
    }
}