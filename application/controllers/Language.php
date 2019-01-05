<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Language extends CI_Controller {

	public function switch_lang($lang)
	{
		$this->session->set_userdata('language', $lang);
		redirect($_SERVER['HTTP_REFERER']);
	}
}
