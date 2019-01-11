<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends PM_Controller {

    public function index()
    {
        if ($this->isLogin) {
            redirect('User');
        }

        $this->load->view('login/index');
        $this->load->view('login/jslink');
    }

    public function ajax_login() {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $response = array();
        $response['state'] = 'failed';

        if (empty($email) || empty($password)) {
            $response['message'] = 'Email or Password is Empty.';
            return $this->load_json($response);
        }

        $where = array();
        $where['email'] = $email;
        $where['passwort'] = sha1($password);

        $user = $this->PM_Model->get_info_with_where('users', $where);

        if (empty($user)) {
            $response['message'] = 'Wrong Email or Password.';
            return $this->load_json($response);
        }

        $this->user_session_create($user);

        //Set Default Language
        $this->session->set_userdata('language', 'EN');

        $response['state'] = 'success';
        $response['url'] = 'cars';

        $this->load_json($response);
    }

    public function user_session_create($user) {
        $this->session->set_userdata(array(
            'id' => $user->id,
            'email' => $user->email,
            'type' => $user->type,
            'logged_in' => true
        ));
    }

    public function logout() {
        session_destroy();
        redirect('/');
    }
}
