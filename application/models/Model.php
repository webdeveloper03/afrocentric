<?php
class Model extends MY_Model{
    public function ping($user_id){
        $this->db->query("UPDATE users SET last_ping = '". date("Y-m-d H:i:s") ."' WHERE id = ". (int)$user_id);
    }
    
    public function getSettings($type='', $key = ""){
        $settingdata = array();
        if($key != "") {
            $this->db->where(['setting_type'=> $type, 'setting_key'=> $key]);
        } else {
            $this->db->where('setting_type', $type);
        }
        $getSetting = $this->db->get_where('setting', array('setting_status' => 1))->result_array();
        foreach ($getSetting as $setting) {
            $settingdata[$setting['setting_key']] = $setting['setting_value'];
        }
        return $settingdata;
    }

    public function getAllSettings($type=[]){
        $settingdata = array();
        $this->db->where_in('setting_type', $type);
        $records = $this->db->get_where('setting', array('setting_status' => 1))->result();
        foreach ($records as $record) {
            if(!array_key_exists($record->setting_type,$settingdata)){
                $settingdata[$record->setting_type] = [];
            }
            $settingdata[$record->setting_type][$record->setting_key] = $record->setting_value;
        }
        return $settingdata;
    }

    public function create($table, $data){
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }

    public function update($table, $data, $condition = NULL){
        if ($condition){
            foreach ($condition as $key => $value) $this->db->where($key, $value);
        }
        return $this->db->update($table, $data);
    }

    public function getById($table, $id){
        return $this->db->get_where($table,array('id'=>$id))->row();
    }
}
?>