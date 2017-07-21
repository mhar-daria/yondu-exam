<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_Model extends CI_Model {

	protected $table = 'category';

	public function __construct() {

		parent::__construct();
	}

	public function getCategories() {

		return $this->db->get($this->table)->result_array();
	}
}
