<?php
class Profile extends PM_Controller {
	function __construct() {
		parent::__construct();
	}

	function index() {

		$this->load_view('profile');
	}

	function update_profile() {
		$data = $this->input->post();
		$this->load->model('PM_Model');
		$data['id'] = $this->my_id;
		if ($this->PM_Model->save('users', $data)) {
			$this->load_json(['state' => 'success']);
		} else {
			$this->load_json(['state' => 'fail']);
		}
	}

	function update_password() {
		$data = $this->input->post();
		$this->load->model('PM_Model');
        $user_data = $this->PM_Model->get_info('users', $this->my_id);

        if ($user_data->passwort != sha1($data['cur_password']))
			return $this->load_json(['state' => 'fail']);

		$updateinfo = [];
		$updateinfo['id'] = $this->my_id;
		$updateinfo['passwort'] = sha1($data['new_password']);

		if ($this->PM_Model->save('users', $updateinfo)) {
			$this->load_json(['state' => 'success']);
		} else {
			$this->load_json(['state' => 'fail']);
		}
	}
}