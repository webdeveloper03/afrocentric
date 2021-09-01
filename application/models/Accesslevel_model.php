<?php

require_once(APPPATH.'models/Model.php');

class Accesslevel_model extends Model {
    
    public function getRecords($filter = array()){
        $where = '1';
        if(isset($filter['searchKey']) && $filter['searchKey']){
            $searchKey = $filter['searchKey'];
            $where .= " AND ( name LIKE '%{$searchKey}%' )";
        }

        $order = 'name ASC';
		if(isset($filter['order'])){
			if($filter['order']==1){
				$order = 'name DESC';
			} else if($filter['order']==2){
				$order = 'created_at DESC';
			} else if($filter['order']==3){
				$order = 'created_at ASC';
			} 
        }
        
        $sql = "SELECT SQL_CALC_FOUND_ROWS access_levels.* FROM access_levels
        WHERE {$where} 
        ORDER BY {$order}";

        if (isset($filter['page'],$filter['limit'])) {
            $offset = (($filter['page']-1) * $filter['limit']);
            $sql.= " LIMIT {$offset},". $filter['limit'];
        }

        $records = $this->db->query($sql)->result();
        $total = $this->db->query("SELECT FOUND_ROWS() AS total")->row()->total;

        return array($records,$total);
    }
}