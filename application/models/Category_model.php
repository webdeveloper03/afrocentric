<?php

require_once(APPPATH.'models/Model.php');

class Category_model extends Model{
    
    public function getCategories($filter = array()){

        $where = '1';
        if(isset($filter['searchKey']) && $filter['searchKey']){
            $searchKey = $filter['searchKey'];
            $where .= " AND ( c.name LIKE '%{$searchKey}%' OR pc.name LIKE '%{$searchKey}%' )";
        }

        $order = 'c.name ASC';
		if(isset($filter['order'])){
			if($filter['order']==1){
				$order = 'c.name DESC';
			} else if($filter['order']==2){
				$order = 'c.created_at DESC';
			} else if($filter['order']==3){
				$order = 'c.created_at ASC';
			} 
            //$sql.= " ORDER BY c.id DESC ";
        }
        
        $sql = "SELECT SQL_CALC_FOUND_ROWS c.*,pc.name as parent_name,(SELECT count(pc.category_id) FROM product_categories pc WHERE pc.category_id = c.id ) as total_product FROM categories c LEFT JOIN categories pc ON pc.id = c.parent_id WHERE {$where} 
        ORDER BY {$order}";

        if (isset($filter['page'],$filter['limit'])) {
            $offset = (($filter['page']-1) * $filter['limit']);
            $sql.= " LIMIT {$offset},". $filter['limit'];
        }

        $records = $this->db->query($sql)->result();
        $total = $this->db->query("SELECT FOUND_ROWS() AS total")->row()->total;

        $data = array();
        foreach ($records as $key => $value) {
            $records[$key]->total_product = (int)$value->total_product;
            $records[$key]->image_url = upload_url('category',$value->image);
        }

        return array($records,$total);
    }
    
    public function getCategoryById($id){
        $record = $this->db->query("SELECT * FROM categories WHERE id = ". (int)$id)->row();
        $record->image_url = upload_url('category',$record->image);
        return $record;
    }
    
    public function getCategoryTotalProduct($categoryId){
        $result = $this->db->query("SELECT count(category_id) as total_product FROM product_categories WHERE category_id = ". (int)$categoryId)->row();
        return $result->total_product;
    }
}