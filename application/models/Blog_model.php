<?php

require_once(APPPATH.'models/Model.php');

class Blog_model extends Model{
    
    public function getBlogs($filter = array()){

        $where = '1';
        if(isset($filter['searchKey']) && $filter['searchKey']){
            $searchKey = $filter['searchKey'];
            $where .= " AND ( b.name LIKE '%{$searchKey}%' OR bc.name LIKE '%{$searchKey}%' )";
        }

        $order = 'b.name ASC';
		if(isset($filter['order'])){
			if($filter['order']==1){
				$order = 'b.name DESC';
			} else if($filter['order']==2){
				$order = 'b.created_at DESC';
			} else if($filter['order']==3){
				$order = 'b.created_at ASC';
			} 
        }
        
        $sql = "SELECT SQL_CALC_FOUND_ROWS b.*, bc.name as blog_category_name FROM blogs b
        LEFT JOIN blog_categories bc ON bc.id = b.blog_category_id
        WHERE {$where} 
        ORDER BY {$order}";

        if (isset($filter['page'],$filter['limit'])) {
            $offset = (($filter['page']-1) * $filter['limit']);
            $sql.= " LIMIT {$offset},". $filter['limit'];
        }

        $records = $this->db->query($sql)->result();
        $total = $this->db->query("SELECT FOUND_ROWS() AS total")->row()->total;

        foreach($records as $key => $value){
            $records[$key]->image_url =upload_url('blogs',$value->image);
        }
        
        return [$records,$total];
    }

    public function getBlog($id=0){

        $where = "b.id={$id}";

        $sql = "SELECT b.*, bc.name as blog_category_name FROM blogs b
        LEFT JOIN blog_categories bc ON bc.id = b.blog_category_id
        WHERE {$where}";

        $record = $this->db->query($sql)->row();
        $record->image_url =upload_url('blogs',$record->image);
        return $record;
    }

    public function getBlogCategories($filter = array()){

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
            //$sql.= " ORDER BY c.id DESC ";
        }
        
        $sql = "SELECT SQL_CALC_FOUND_ROWS * FROM blog_categories bc
        WHERE {$where} 
        ORDER BY {$order}";

        if (isset($filter['page'],$filter['limit'])) {
            $offset = (($filter['page']-1) * $filter['limit']);
            $sql.= " LIMIT {$offset},". $filter['limit'];
        }

        $records = $this->db->query($sql)->result();
        $total = $this->db->query("SELECT FOUND_ROWS() AS total")->row()->total;

        return [$records,$total];
    }
}