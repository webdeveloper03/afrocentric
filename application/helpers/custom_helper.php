<?php

function c_date($date , $f = "d-m-Y"){
    return date($f,strtotime($date));
}

function c_datetime($date , $f = "d-m-Y h:i A"){
    return date($f,strtotime($date));
}

function c_address($record=''){
    $address = $record->Addressone;
    if($record->Addresstwo){
        if($address) $address .= ', ';
        $address .= $record->Addresstwo;
    } 
    if($record->City){
        if($address) $address .= ', ';
        $address .= $record->City;
    } 
    if($record->StateProvince){
        if($address) $address .= ', ';
        $address .= $record->StateProvince;
    } 
    if($record->Country){
        if($address) $address .= ', ';
        $address .= $record->Country;
    } 
    if($record->Zip){
        if($address) $address .= ', ';
        $address .= $record->Zip;
    } 
    return $address;
}

function c_rating($rating=0){
    $ratingAvg = (int) $rating;
    $result = '';
    for($i=1; $i <= $ratingAvg; $i++) { 
        $result .= '<img alt="image" src="'.base_url('assets/store/default/').'img/st.png" class="mr-1">';
    }
    while($ratingAvg < 5) {
        $result .= '<img alt="image" src="'.base_url('assets/store/default/').'img/st1.png" class="mr-1">';
        $ratingAvg++;
    }
    return $result;
}

function c_pr($arr, $isExit=false){
    echo '<pre>';print_r($arr);
    if($isExit) exit;
}

function upload_url($dir, $image){
    if($image == ''){
        $updated = 'no_image_available.png';
    } else {
        $updated = $dir.'/'.$image;
    }
    return base_url("assets/uploads/{$updated}");
}

?>