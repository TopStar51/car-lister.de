<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Car_model
 *
 * @author Elvis
 */
class Car_Model extends PM_Model {
    public $table1 = 'autos_kleinanzeigen';
    public $table2 = 'autos_mobile';
    public $table3 = 'autos_scout24';
    public $max_count = 5;//this is when there's thousands of cars, we only need 5 ~ 10 cars to show, not all of them at once
    
    //put your code here
    function __construct() {
        parent::__construct();
    }
    
    function new_cars($user_id, $search = '') {
        $last_ids = $this->get_list('user_last_car', 0, 'user_id = '.$user_id);
        $cars = array();
        foreach ($last_ids as $last_id) {
            //max 5 cars should be get from db once
            $this->db->select('*, \''.$last_id['car_type'].'\' as car_type')->
                    from($last_id['car_type'])
                    ->where('id > '.$last_id['last_id'])
                    ->order_by('id')
                    ->limit($this->max_count);

            if (!empty($search)) {
                $table = $last_id['car_type'];
                if ($table === 'autos_kleinanzeigen') {
                    $field = 'Name';
                } else if ($table === 'autos_mobile') {
                    $field = 'name';
                } else if ($table === 'autos_scout24') {
                    $field = 'title';
                }

                $this->db->like($field, $search, 'both');
            }

            $each_cars = $this->db->get()->result_array();
            
            if (!empty($each_cars)) {
                // update last_id
                $last_id['last_id'] = $each_cars[count($each_cars) -1]['id'];
                $this->update_info('user_last_car',$last_id);
            }
            
            $cars = array_merge($cars, $each_cars);
        }

        return $cars;
    }
    
    function park($user_id, $car_id, $car_type) {
        //car_type means, car_table
        $parkInfo = array(
            'user_id' => $user_id,
            'car_id' => $car_id,
            'car_type' => $car_type
        );
        $parkExist = $this->get_info_with_where('user_park', $parkInfo);
        if (empty($parkExist)) {
            $this->save('user_park', $parkInfo);
        } else {
            $parkExist['is_delete'] = '0';
            $this->update_info('user_park', $parkInfo);
        }
    }
    
    function parked_cars($user_id, $search = '') {
//        $this->get_list('user_park', 'user_id = '.$user_id);
        $tables = array($this->table1, $this->table2, $this->table3);
        
        $cars = array();
        
        foreach ($tables as $table) {
            $this->db->select('k.*, u.car_type')
                ->from('user_park u')
                ->join($table.' k', 'k.id = u.car_id', 'left')
                ->where('u.user_id', $user_id)
                ->where('u.is_delete', '0')
//                ->where('k.is_delete', '\'0\'')
                ->where('u.car_type', $table);
            
            if (!empty($search)) {
                if ($table === 'autos_kleinanzeigen') {
                    $field = 'Name';
                } else if ($table === 'autos_mobile') {
                    $field = 'name';
                } else if ($table === 'autos_scout24') {
                    $field = 'title';
                }
                
                $this->db->like($field, $search, 'both');
            }
            
//            exit($this->db->get_compiled_select());
            $result = $this->db->get()->result_array();
            $cars = array_merge($cars, $result);
        }
        
        return $cars;
    }
    
    function delete_park($user_id, $car_id, $car_type) {
        $info = array();
        $info['user_id'] = $user_id;
        $info['car_id'] = $car_id;
        $info['car_type'] = $car_type;
//        $this->update_info('user_park', $info);
        $this->delete_info_with_where_completely('user_park', $info);
    }
    
    function detail($car_id, $car_type) {
        return $this->get_info_arr($car_type, $car_id);
    }
    
    function add_to_delete($user_id, $car_id, $car_type) {
        $deleteInfo = array(
            'user_id' => $user_id,
            'car_id' => $car_id,
            'car_type' => $car_type
        );
        $deleteExist = $this->get_info_with_where('user_deleted', $deleteInfo);
        if (empty($deleteExist)) {
            $this->save('user_deleted', $deleteInfo);
        } else {
            //no need to do?
//            $deleteExist['is_delete'] = '0';
//            $this->update_info('user_park', $parkInfo);
        }
    }
}
