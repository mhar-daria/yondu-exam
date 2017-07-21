<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Recipe_Model extends CI_Model {

	protected $table = 'recipe';

	public function __construct() {

		parent::__construct();
	}

	public function createRecipe( $data = array() ) {

		if ( ! isset($data['created_at']) )
		{

			$data['created_at'] = date('Y-m-d H:i:s');
		}

		if ( ! isset($data['publish_date']) )
		{

			$data['publish_date'] = date('Y-m-d');
		}

		$this->db->insert($this->table, $data);

		return $this->db->insert_id();
	}

	public function getRecipes( $category_name = NULL )
	{

		if ( empty($category_name) )
		{

			return FALSE;
		}

		return $this->db
			->from($this->table)
			->join('category', 'category.category_name = recipe.category_name')
			->where('recipe.category_name', $category_name)
			->get()
			->result_array();
	}

	public function getFeaturedRecipes($order_by = 'DESC', $limit = 3)
	{

		return $this->db
			->from($this->table)
			->join('category', 'category.category_name = recipe.category_name')
			->order_by('recipe.id', $order_by)
			->limit($limit)
			->get()
			->result_array();
	}

	public function getRecipe( $recipe_title = NULL, $category_name = NULL )
	{

		if ( empty($recipe_title) )
		{

			return FALSE;
		}
// fn_print_die($recipe_title, $category_name);
		if ( ! empty($category_name) )
		{

			$this->db->where('category_name', $category_name);
		}

		$recipe = $this->db->where('title_key', $recipe_title)->get($this->table)->row_array();

		return empty($recipe) 
			? FALSE 
			: $recipe;
	}

	public function getRecipeById( $id = null )
	{

		$recipe = $this->db->where('id', $id)->get($this->table)->row_array();

		return empty($recipe) 
			? FALSE 
			: $recipe;
	}

	public function updateRecipe( $id=null, $data=[] )
	{

		$this->db->where('id', $id)
			->update($this->table, $data);

		return true;
	}

	public function hasSameOrigin( $id = null, $recipe_name = null )
	{

		$recipe = $this->db->where('id !=', $id)->where('title_key', fn_permalink($recipe_name))
			->get($this->table)->row_array();

		return $recipe;
	}

	public function get_random()
	{

		return $this->db->query('SELECT img_path, recipe_name, category_name
		  FROM recipe AS r1 JOIN
		       (SELECT CEIL(RAND() *
		                     (SELECT MAX(id)
		                        FROM recipe)) AS id)
		        AS r2
		 WHERE r1.id >= r2.id
		 ORDER BY r1.id ASC
		 LIMIT 1')->row_array();
	}
}
