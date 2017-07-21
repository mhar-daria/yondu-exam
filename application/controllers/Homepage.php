<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage extends CI_Controller {

	public function __construct()
	{

		parent::__construct();
		$this->load->model('category_model', '', TRUE);
		$this->load->model('recipe_model', '', TRUE);
	}

	public function index()
	{
		
		$data = [];
		$featured_img = $this->recipe_model->get_random();

		$featured_recipe = $this->recipe_model->getFeaturedRecipes();
		$data['featured_img'] = $featured_img;
		$data['upload_path'] = 'public/images/uploads/';
		$data['featured_recipe'] = $featured_recipe;

		$this->load->view('head/header')
							 ->view('page/homepage', $data)
							 ->view('footer/footer');
	}
}
