<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Parking extends PM_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('car_model', 'car');
        $this->load->helper('car_helper');
    }

    public function index()
    {
        $cars = $this->car->parked_cars($this->my_id);
        $this->load_js('assets/custom/js/slick.min.js');
        $this->load_css('assets/custom/css/carousel.css');
        $this->load_view('parking', array('cars' => $cars));
    }
    
    public function parked_cars() {
        $search = $this->input->post('search');
        $cars = $this->car->parked_cars($this->my_id, $search);
        echo $this->load->view('cars/_cars', array('cars' => $cars), true);
    }
    
    public function delete_park() {
        $car_id = $this->input->post('car_id');
        $car_type = $this->input->post('car_type');
        if (empty($car_id) || empty($car_type)) {
            $this->load_json(array('status' => false, 'msg' => 'wrong car id or type'));
            return;
        }
        
        $this->car->delete_park($this->my_id, $car_id, $car_type);
        
        $this->load_json(array('status' => true));
    }
}