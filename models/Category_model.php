<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category_model extends Prud_Model{

	function __construct() {
		parent::__construct();
	}

	public function get_category($category_id){
		$this->slave->select('*');
		$this->slave->from('hs_category');
		$this->slave->where("category_id", $category_id);
		$obj = $this->slave->get()->row();
		return $obj;
	}

	public function get_all_subcategory($category_id){
		$this->slave->select('*');
		$this->slave->from('hs_category as c');
		$this->slave->join('hs_category as cp', 'c.category_id=cp.category_id');
		$this->slave->where("c.parent_id", $category_id);
		$subcategory = $this->slave->get()->result();
		return $subcategory;
	}


}
