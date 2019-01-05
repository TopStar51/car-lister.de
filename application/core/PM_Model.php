<?php

class PM_Model extends CI_Model
{
    public function check_special_field($tName, $fieldName, $value, $includeDeleted = false) {
        $this->db->select('*');
        $this->db->from($tName);
        if (!$includeDeleted) {
            $this->db->where('is_delete', '0');
        }
        $this->db->where($fieldName, $value);

        return empty($this->db->get()->row()) ? false : true;
    }

    public function get_sum_value($tName, $fName, $wStr) {
        $this->db->select('SUM('.$fName.') AS sumVal');
        $this->db->from($tName);
        if (!empty($wStr)) $this->db->where($wStr);
        $this->db->where('is_delete', '0');
        return $this->db->get()->row()->sumVal;
    }

    public function get_max_value($tName, $fName, $wStr) {
        $this->db->select('MAX('.$fName.') AS maxVal');
        $this->db->from($tName);
        if (!empty($wStr)) $this->db->where($wStr);
        $this->db->where('is_delete', '0');
        return $this->db->get()->row()->maxVal;
    }

    public function get_min_value($tName, $fName, $wStr) {
        $this->db->select('MIN('.$fName.') AS minVal');
        $this->db->from($tName);
        if (!empty($wStr)) $this->db->where($wStr);
        $this->db->where('is_delete', '0');
        return $this->db->get()->row()->minVal;
    }

    public function get_count_value($tName, $wStr) {
        $this->db->select('COUNT(*) AS cntVal');
        $this->db->from($tName);
        if (!empty($wStr)) $this->db->where($wStr);
        $this->db->where('is_delete', '0');
        return $this->db->get()->row()->cntVal;
    }

    public function get_config($tName) {
        $this->db->select('*');
        $this->db->from($tName);
        return $this->db->get()->row();
    }

    public function get_info($tName, $fNo, $sStr = "*", $isStructured = true) {
        $this->db->select($sStr);
        $this->db->from($tName);
        if ($isStructured) $this->db->where('is_delete', '0');
        $this->db->where('id', $fNo);
        return $this->db->get()->row();
    }

    public function get_info_with_where($tName, $wStr, $sStr = "*", $isStructured = true) {
        $this->db->select($sStr);
        $this->db->from($tName);
        if ($isStructured) $this->db->where('is_delete', '0');
        $this->db->where($wStr);
        return $this->db->get()->row();
    }

    public function get_list_from_nos($tName, $fNos, $sStr = '*', $wStr = '') {
        $fNoList = explode(',', $fNos);

        $this->db->select($sStr);
        $this->db->from($tName);
        $this->db->where_in('id', $fNoList);
        if (!empty($wStr)) $this->db->where($wStr);

        return $this->db->get()->result_array();
    }

    public function get_max_no($tName, $fName = 'id', $wStr = '') {
        $this->db->select('MAX('.$fName.') as maxno');
        $this->db->from($tName);
        if (!empty($wStr)) $this->db->where($wStr);

        $row = $this->db->get()->row();
        return (isset($row)) ? $row->maxno : 0;
    }

    public function get_list($tName, $count = 0, $wStr = '', $orderitem = '', $orderby = '', $sStr = '*', $isStructured = true, $start = 0) {
        $this->db->select($sStr);
        $this->db->from($tName);
        if ($isStructured) $this->db->where('is_delete', '0');
        if ($count > 0)
            $this->db->limit($count, $start);
        if ($wStr)
            $this->db->where($wStr);

        if (!empty($orderitem)) {
            $this->db->order_by($orderitem, $orderby);
        }
        return $this->db->get()->result_array();
    }

    public function update_info($tName, $info) {
        $curtime = date('Y-m-d H:i:s');
        $info['updated_at'] = $curtime;

        $this->db->where('id', $info['id']);
        foreach ($info as $key => $value) {
            $this->db->set($key, $value);
        }
        $this->db->update($tName);
    }

    public function save_info($tName, $info, $isStructured = true) {
        $data = array();

        if ($isStructured) {
            $curtime = date('Y-m-d H:i:s');
            if (empty($info['created_at'])) $info['created_at'] = $curtime;
            $info['updated_at'] = $curtime;
        }

        foreach ($info as $key => $value) {
            $data[$key] = $value;
        }
        $this->db->insert($tName, $data);
        return $this->db->insert_id();
    }

    public function delete_info($tName, $fNos) {
        $fNoList = explode(',', $fNos);
        $this->db->where_in('id', $fNoList);
        $this->db->set('is_delete', '1');
        $this->db->update($tName);
    }

    public function delete_info_completely($tName, $fNos) {
        $fNoList = explode(',', $fNos);
        $this->db->where_in('id', $fNoList);
        $this->db->delete($tName);
    }

    public function delete_info_with_where($tName, $wStr) {
        $this->db->where($wStr);
        $this->db->set('is_delete', '1');
        $this->db->update($tName);
    }

    public function delete_info_with_where_completely($tName, $wStr) {
        $this->db->where($wStr);
        $this->db->delete($tName);
    }

    public function get_total_count_for_table($tName, $input, $searchArray, $where = '') {

        $this->db->select('*');
        $this->db->from($tName);
        $this->db->where('is_delete', '0');

        $search = strtolower($input['search']['value']);
        if($search != '') {
            $searchWhereArray = array();
            foreach ($searchArray as $searchItem) {
                $searchWhereArray[] = "($searchItem LIKE '%".strtolower($search)."%')";
            }
            $this->db->where("(" . implode(" OR ", $searchWhereArray) . ")");
        }
        if ($where != '') {
            $this->db->where($where);
        }

        return count($this->db->get()->result_array());
    }

    public function get_data_for_table($tName, $input, $searchArray, $where = '', $orderby = '') {
        $this->db->select('*');
        $this->db->from($tName);
        $this->db->where('is_delete', '0');

        $search = strtolower($input['search']['value']);
        if($search != '') {
            $searchWhereArray = array();
            foreach ($searchArray as $searchItem) {
                $searchWhereArray[] = "($searchItem LIKE '%".strtolower($search)."%')";
            }
            $this->db->where("(" . implode(" OR ", $searchWhereArray) . ")");
        }
        if ($where != '') {
            $this->db->where($where);
        }

        if ($orderby != '')
            $this->db->order_by($orderby);

        if($input['length'] > 0)
            $this->db->limit($input['length'], $input['start']);

        $data['list'] = $this->db->get()->result_array();
        $data['count'] = $this->get_total_count_for_table($tName, $input, $searchArray, $where);
        return $data;
    }

    public function get_data($table,$id){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where('id',$id);
        $this->db->where('is_delete','0');
        $data = $this->db->get()->row_array();
        return $data;
    }

    public function get_owner($table){
        $this->db->select('id,name');
        $this->db->from($table);
        $data = $this->db->get()->result_array();
        return $data;
    }

    public function get_status_list($table){
        $this->db->select('*');
        $this->db->from($table);
        $data = $this->db->get()->result_array();
        return $data;
    }

    public function get_users($table){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where('type','USER');
        $data = $this->db->get()->result_array();
        return $data;
    }
    public function get_cur_devs($table,$id = ''){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where('id',$id);
        $data = $this->db->get()->row_array();
        return $data;
    }
    public function get_developr_name($table,$id){
        $this->db->select('name');
        $this->db->from($table);
        $this->db->where('id',$id);
        $data = $this->db->get()->row_array();
        return $data['name'];
    }

    public function get_field_value($table,$id,$field,$ref_table = '',$ref_field = '',$type= 0){
        $result = "";
        if($type == 1){
            foreach($id as $key => $value){
                if(!empty($value)){
                    $this->db->select($field);
                    $this->db->from($table);
                    $this->db->where('id',$value);
                    $data = $this->db->get()->row_array();
                    $result .= $data[$field].",";
                }
            }
            $result = substr($result,0,-1);
        }
        if($type == 0){
            $this->db->select($field);
            $this->db->from($table);
            $this->db->where('id',$id);
            $data = $this->db->get()->row_array();
            $result = $data[$field];
        }

        if(!empty($ref_table) && !empty($ref_field)){
            $result_list = explode(',',$result);
            $result = "";
            foreach($result_list as $key => $value){
                if(!empty($value)){
                    $this->db->select($ref_field);
                    $this->db->from($ref_table);
                    $this->db->where('id',$value);
                    $data = $this->db->get()->row_array();
                    $result .= $data[$ref_field].",";
                }
            }
            $result = substr($result,0,-1);
        }
        return $result;
    }

    //Get site name
    public function get_sites_info(){
        $this->db->select('*');
        $this->db->from('base_site');
        $this->db->where('is_delete', '0');
        return $this->db->get()->result_array();
    }

    //by Elvis 2018-11-24
    public function save($table, $record) {
        if ( isset($record['id'])) {
            //update
            $this->update_info($table, $record);
            return true; //success            
        } else {
            return $this->save_info($table, $record);
        }
    }
}
