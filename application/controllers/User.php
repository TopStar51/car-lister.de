<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends PM_Controller {

    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load_js('assets/global/scripts/datatable.js');
        $this->load_js('assets/global/plugins/datatables/datatables.min.js');
        $this->load_js('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js');
        $this->load_css('assets/global/plugins/bootstrap-select/css/bootstrap-select.css');
        $this->load_js('assets/global/plugins/bootstrap-select/js/bootstrap-select.min.js');

        $this->load_view('user/management');
    }

    public function ajax_get_users()
    {
        $input = $this->input->post();

        $where['type'] = 'USER';

        if (isset($input['action']) && $input['action'] == 'filter' )
        {
            if ($input['name'] != '' )
                $where['name like'] = '%'.$input['name'].'%';
            if ($input['email'] != '' )
                $where['email like'] = '%'.$input['email'].'%';
            if ($input['phone'] != '' )
                $where['telefon like'] = '%'.$input['phone'].'%';
            if ($input['address'] != '' )
                $where['adresse like'] = '%'.$input['address'].'%';
            if ($input['filter_status'] != '' )
                $where['is_active'] = $input['filter_status'];
        }

        $user_list = $this->PM_Model->get_list('users', 0, $where);

        $iTotalRecords = count($user_list);
        $iDisplayLength = $iTotalRecords;
        $iDisplayStart = 0;

        $records = array();
        $records["data"] = array();

        for( $i = $iDisplayStart; $i < $iDisplayLength; $i ++ )
        {
            $user_info = $user_list[$i];

            if($user_info['is_active']) {
                $status = 'Active';
                $color="green";
            } else {
                $status = 'Inactive';
                $color = "yellow";
            }
            $records["data"][] = array(
                $i + 1,
                $user_info['name'].'<input type="hidden" class="user-name" value="'.$user_info['name'].'"/>',
                $user_info['email'].'<input type="hidden" class="user-email" value="'.$user_info['email'].'"/>',
                $user_info['telefon'].'<input type="hidden" class="user-phone" value="'.$user_info['telefon'].'"/>',
                $user_info['adresse'].'<input type="hidden" class="user-address" value="'.$user_info['adresse'].'"/>',
                '<button type="button" class="btn btn-circle '.$color.' btn-outline">'.$status.'</button>'.'<input type="hidden" class="user-status" value="'.$user_info['is_active'].'"/>',
                '<a href="javascript:;" class="btn btn-sm btn-outline btn-primary edit"><i class="fa fa-edit"></i> Edit </a>
                <a href="javascript:;" class="btn btn-sm btn-outline btn-danger delete"><i class="fa fa-remove"></i> Delete </a>
                <input type="hidden" class="user-id" value="'.$user_info['id'].'" />'
            );
        }

        $records['recordsTotal'] = $iTotalRecords;
        $records["recordsFiltered"] = $iTotalRecords;

        echo $this->load_json($records);
    }

    public function ajax_delete_user() {
        $input = $this->input->post();

        $this->PM_Model->delete_info('users', $input['id']);

        $response = array();
        $response['state'] = 'success';
        $this->load_json($response);
    }

    public function ajax_update_user() {
        $input = $this->input->post();

        $userdata = array();
        $userdata['id'] = $input['uid'];
        $userdata['name'] = $input['name'];
        $userdata['email'] = $input['email'];
        $userdata['telefon'] = $input['phone'];
        $userdata['adresse'] = $input['address'];
        $userdata['is_active'] = $input['user_status'];

        $this->PM_Model->update_info('users', $userdata);

        $response = array();
        $response['state'] = 'success';
        $this->load_json($response);
    }

    public function add()
    {
        $this->load_css('assets/global/plugins/bootstrap-select/css/bootstrap-select.css');
        $this->load_js('assets/global/plugins/bootstrap-select/js/bootstrap-select.min.js');

        $this->load_view('user/add');
    }

    public function ajax_add_user()
    {
        $data = $this->input->post();

        $user_with_same_email = $this->PM_Model->get_info_with_where('users', 'email = "'.$data['email'].'"');

        if (isset($user_with_same_email)) {
            $response['state'] = $this->lang->line('failed');
            $response['message'] = $this->lang->line('email_duplicated');
            $this->load_json($response);
            return;
        }
        unset($data['confirm_password']);
        $data['passwort'] = sha1($data['passwort']);
        $id = $this->PM_Model->save_info('users', $data);
        $response = array();
        $response['state'] = 'failed';

        if ( $id > 0 )
        {
            $response['state'] = 'success';
        }
        else
        {
            $response['message'] = $this->lang->line('user_create_err');
        }

        $this->load_json($response);
    }
}