<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cars extends PM_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('car_model', 'car');
        $this->load->helper('car_helper');
    }

    public function index()
    {
    	$view_params = array();
        $view_params['cars'] = $this->car->new_cars($this->my_id);
        $this->load_js('assets/custom/js/slick.min.js');
        $this->load_css('assets/custom/css/carousel.css');
        $this->load_view('cars', $view_params);
    }

    public function get_new_data()
    {
//    	$resp = array();
//    	$last_id = $this->input->post('last_id');
//    	$where['id >='] = $last_id;
//    	$resp['car_info'] = $this->PM_Model->get_list('autos_kleinanzeigen', 0, $where);
//    	$this->load_json($resp);
        
        $new_cars = $this->car->new_cars($this->my_id);
        $this->load->view('cars/_cars', array('cars' => $new_cars));
    }
    
    public function api_park() {
        $car_id = $this->input->post('car_id');
        $car_type = $this->input->post('car_type');
        $this->car->park($this->my_id, $car_id, $car_type);
    }
    
    public function detail_car() {
        $car_id = $this->input->post('car_id');
        $car_type = $this->input->post('car_type');
        $carInfo = $this->car->detail($car_id, $car_type);
        if (!empty($carInfo)) {
            $this->load->view('cars/_detail', array('carInfo' => $carInfo));
        } else {
        }
    }
    
    public function delete_car() {
        $car_id = $this->input->post('car_id');
        $car_type = $this->input->post('car_type');
        $this->car->add_to_delete($this->my_id, $car_id, $car_type);
        
        $this->load_json(array('status' => true));
    }
    
    public function search() {
        $search = $this->input->post('search');
        //how do i search?
        $cars = $this->car->new_cars($this->my_id, $search);

        $this->load->view('cars/_cars', array('cars' => $cars));
    }
}