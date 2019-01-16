<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function get_car_price($carInfo) {
    return get_car_option($carInfo, 'price');
}

function get_car_name($carInfo) {
    return get_car_option($carInfo, 'name');
}

function get_car_plz($carInfo) {
    return get_car_option($carInfo, 'plz');
}

function get_car_timestamp($carInfo) {
    return get_car_option($carInfo, 'timestamp');
}

function get_car_value($keys, $carInfo, $default = '') {
    foreach ($keys as $field) {
        if (array_key_exists($field, $carInfo) && !empty($carInfo[$field])) {
            return $carInfo[$field];
        }
    }
    return $default;
}

function get_car_city($carInfo) {
    return get_car_option($carInfo, 'city');
}
function get_car_option($carInfo, $key) {
    switch ($key) {
        case 'EZ':
            return get_car_value(array('Erstzulassungsjahr'), $carInfo, '').' '.get_car_value(array('Erstzulassungsmonat'), $carInfo, '');
        case 'KM':
            return get_car_value(array('Kilometerstand', 'km'), $carInfo, '');
        case 'color':
            return get_car_value(array('farbe_hersteller', 'Farbe_laut_Hersteller', 'Aussenfarbe'), $carInfo, '');
        case 'num_doors':
            return get_car_value(array('AnzahlTüren', 'Anzahl_der_türen'), $carInfo, '');
        case 'fuel_type':
            return get_car_value(array('Kraftstoffart', 'Kraftstoff'), $carInfo, '');
        case 'type_of_motor':
            return get_car_value(array('Getriebe', 'Getriebeart'), $carInfo, '');
        case 'price':
            $price = get_car_value(array('Price', 'preis'), $carInfo, '');
            if (empty($price)) {
//                return 'No Price';
                return _l('no_price');
            }
            return $price.' €';
        case 'timestamp':
            return get_car_value(array('Erstellungsdatum', 'seit', 'Zeitstempel'), $carInfo, '');
        case 'plz':
            return get_car_value(array('PLZ'), $carInfo, '');
        case 'name':
            return get_car_value(array('name', 'Name', 'title'), $carInfo, 'No Title');
        case 'idc':
            return get_car_value(array('IDc'), $carInfo);
        case 'maker':
            return get_car_value(array('Marke'), $carInfo);
        case 'model':
            return get_car_value(array('Modell', 'Model'), $carInfo);
        case 'city':
            return get_car_value(array('Ort'), $carInfo);
        case 'photos':
            return get_car_photos($carInfo);
        case 'seller_phone':
            return get_car_value(array('handler_nummer', 'Tel'), $carInfo);
    }
    return '';
}

function car_options() {
    return array('EZ', 'KM', 'color', 'num_doors', 'fuel_type', 'type_of_motor');
}

function equip_options() {
    return array('Klima', 'Navi', 'Leder', 'Xenon', 'Einparkhilfe', 'Schiebedach', 'Alufelgen', 'Allrad', 'Sportpaket', 'ESP', 'ABS', 'Unfall');
}

function has_equip($carInfo, $equip) {
    return stristr(get_car_value(array('Ausstattung', 'ausstattung', 'ausstatung'), $carInfo, ''), $equip);
}

function car_details() {
    return array('Ort' => 'city', 'Erstellungsdatum' => 'timestamp', 'Anzeigennummer' => 'idc', 'Marke' => 'maker', 'Modell' => 'model', 'Kilometerstand' => 'KM', 'Erstzulassungsjahr' => 'EZ');
}

function get_car_photos($carInfo) {
    $arr = array(
        'fotos' => ', ',
        'photoslink' => ' ',
        'foto_url' => ' '
    );
    foreach ($arr as $key => $value) {
        if (array_key_exists($key, $carInfo)) {
            //mobile -> explode by ', '
            return explode($value, $carInfo[$key]);
        }
    }
    
    return array();
}

function get_car_img($carInfo) {
    $photos = get_car_photos($carInfo);
    if (count($photos) > 0) {
        return $photos[0];
    }
    return '';
}
