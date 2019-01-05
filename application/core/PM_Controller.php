<?php

class PM_Controller extends CI_Controller
{
    public $isLogin;
    public $userEmail;
    public $curTime;
    public $my_id;
    public $user_type;

    public $custom_css_list = array();
    public $custom_js_list = array();
    public $view_list = array();

    public $path = array();

    public $language;

    public function __construct()
    {
        parent::__construct();

        $this->load->model('PM_Model');

        $this->load->helper('gf_func_helper');

        $this->isLogin = false;

        if (!empty($this->session->userdata('logged_in')) && ($this->session->userdata('logged_in') == true)) {
            $this->isLogin = true;
            $this->my_id = $this->session->userdata('id');
            $this->userEmail = $this->session->userdata('email');
            $this->user_type = $this->session->userdata('type');
        }

        $this->curTime = date('Y-m-d H:i:s');

        // check privilege
        $this->path[0] = strtolower($this->uri->segment(1));
        $this->path[1] = strtolower($this->uri->segment(2));

        if ($this->path[0] != 'login' && $this->isLogin == FALSE) {
            redirect('Login');
        }

        $this->language = $this->session->userdata('language');

        switch ($this->language) {
            case 'EN':
                $this->lang->load('english_lang', 'english');
                break;
            default:
                $this->lang->load('german_lang', 'german');
                break;
        }
    }

    public function __call($method, $arguments) {
        if ($method === 'load_css') {
            $this->custom_css_list[] = $arguments[0];
        } elseif ($method === 'load_js') {
            $this->custom_js_list[] = $arguments[0];
        } else {
            die("<p>" . $method . " doesn't exist</p>");
        }
    }
    
    protected function load_view($viewName, $contentData = NULL)
    {
        $this->load->model('PM_Model');

        // content data
        $contentData['language'] = $this->language;
        $contentData['user_data'] = $this->PM_Model->get_info('users', $this->my_id);

        $this->view_list[] = array($viewName.'/index', $contentData);

        $contentData['path'] = $this->path;

        $this->load->view('partial/layout', $contentData);
        $this->load->view('partial/global-js');
        $this->load->view($viewName.'/jslink', $contentData);
    }

    protected function load_json($data) {
        echo json_encode($data);
    }
}

?>
