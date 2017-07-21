<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Recipe extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function category()
	{

		$featured_img = $this->recipe_model->get_random();
		$recipe = $this->recipe_model->getRecipes($this->page);

		$data = [];
		$data['title'] = $this->page;

		$data['records'] = $recipe;
		$data['featured_img'] = $featured_img;
		$data['upload_path'] = 'public/images/uploads/';

		return $this->load->view('head/header')
			->view('page/recipe/common', $data)
			->view('footer/footer');
	}

	public function get( $recipe_title = NULL )
	{

		$featured_img = $this->recipe_model->get_random();
		$recipe = $this->recipe_model->getRecipe($recipe_title, $this->page);

		$data = [];

		$data['recipe'] = $recipe;
		$data['featured_img'] = $featured_img;
		$data['upload_path'] = 'public/images/uploads/';
		
		return $this->load->view('head/header')
			->view('page/recipe/common-view.php', $data)
			->view('footer/footer');
	}

	public function edit( $recipe_title = NULL )
	{

		$featured_img = $this->recipe_model->get_random();
		$recipe = $this->recipe_model->getRecipe($recipe_title, $this->page);

		$data = [];

		$data['recipe'] = $recipe;
		$data['featured_img'] = $featured_img;
		$data['upload_path'] = 'public/images/uploads/';

		return $this->load->view('head/header')
			->view('page/recipe/edit', $data)
			->view('footer/footer');
	}

	protected $page;
	protected $method;

	public function __construct() 
	{

		parent::__construct();

		$this->page = $this->uri->segment(1);
		$this->method = $this->uri->segment(2);
		$this->load->model('category_model', '', TRUE);
		$this->load->model('recipe_model', '', TRUE);
	}

	public function create()
	{

		$data = [
			'categories' => $this->category_model->getCategories(),
		];
		
		$this->load->view('head/header')
			->view('page/recipe/create', $data)
			->view('footer/footer');
	}

	public function post() {

		$data = $this->security->xss_clean($this->input->post());

		if ( empty( $data['recipe_name'] ) )
		{

			$this->session->set_flashdata('error', 'Recipe Title should not be null');
			return redirect('/recipe/create');
		}

		if ( ! isset( $_FILES['recipe_img'] ) )
		{

			$this->session->set_flashdata('error', 'Recipe Image should not be null');
			return redirect('/recipe/create');
		}

		if ( empty( $data['category_name'] ) )
		{

			$this->session->set_flashdata('error', 'Category Name should not be null');
			return redirect('/recipe/create');
		}

		if ( empty( $data['recipe_details'] ) )
		{

			$this->session->set_flashdata('error', 'Recipe Details should not be null');
			return redirect('/recipe/create');
		}

		$recipe_exists = $this->recipe_model->getRecipe($data['recipe_name']);

		if ( $recipe_exists !== FALSE )
		{

			$this->session->set_flashdata('error', 'Recipe Title already exist!');
			return redirect('/recipe/create');
		}

		$data['recipe_details'] = htmlentities($data['recipe_details']);

		$config = [];

		$document_root = $_SERVER['DOCUMENT_ROOT'];
		$config['upload_path'] = $document_root.'/public/images/uploads/';
		$config['remove_spaces'] = TRUE;
		$config['encrypt_name'] = TRUE;
		$config['allowed_types'] = 'gif|png|tiff|jpeg|jpg|png';

		$recipe_title = strtolower($data['recipe_name']);

		$recipe_title = fn_permalink($recipe_title);

		if ( ! is_dir($config['upload_path'].$recipe_title) ) 
		{

			mkdir($config['upload_path'].$recipe_title);
		}

		$config['upload_path'] = $config['upload_path'].$recipe_title;

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('recipe_img') )
		{

			$this->session->set_flashdata('error', $this->upload->display_errors());
			return redirect('recipe/create');
		}

		$upload_data = $this->upload->data();

		$img_path = $recipe_title.'/'.$upload_data['file_name'];
		$data['img_path'] = $img_path;
		$data['title_key'] = $recipe_title;

		$this->recipe_model->createRecipe($data);

		$this->session->set_flashdata('success', 'You have successfully add new recipe');

		return redirect('/recipe/create');
	}

	public function put( $id = null ) {

		$data = $this->security->xss_clean($this->input->post());

		$original_records = $this->recipe_model->getRecipeById($id);

		if ( empty( $data['recipe_name'] ) )
		{

			$this->session->set_flashdata('error', 'Recipe Title should not be null');
			return redirect('/'.$original_records['category_name'].'/edit/'.$original_records['title_key']);
		}

		if ( empty( $data['category_name'] ) )
		{

			$this->session->set_flashdata('error', 'Category Name should not be null');
			return redirect('/'.$original_records['category_name'].'/edit/'.$original_records['title_key']);
		}

		if ( empty( $data['recipe_details'] ) )
		{

			$this->session->set_flashdata('error', 'Recipe Details should not be null');
			return redirect('/'.$original_records['category_name'].'/edit/'.$original_records['title_key']);
		}

		$recipe_exists = $this->recipe_model->hasSameOrigin($id, $data['recipe_name']);

		if ( $recipe_exists )
		{

			$this->session->set_flashdata('error', 'Recipe Title already exist!');
			return redirect('/'.$original_records['category_name'].'/edit/'.fn_permalink($original_records['title_key']));
		}

		$data['recipe_details'] = htmlentities($data['recipe_details']);

		if ( isset($_FILES['recipe_img']['name']) && !empty($_FILES['recipe_img']['name']) )
		{

			$config = [];

			$document_root = $_SERVER['DOCUMENT_ROOT'];
			$config['upload_path'] = $document_root.'/public/images/uploads/';
			$config['remove_spaces'] = TRUE;
			$config['encrypt_name'] = TRUE;
			$config['allowed_types'] = 'gif|png|tiff|jpeg|jpg|png';

			$recipe_title = strtolower($data['recipe_name']);

			$recipe_title = fn_permalink($recipe_title);

			if ( ! is_dir($config['upload_path'].$recipe_title) ) 
			{

				mkdir($config['upload_path'].$recipe_title);
			}

			$config['upload_path'] = $config['upload_path'].$recipe_title;

			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload('recipe_img') )
			{

				$this->session->set_flashdata('error', $this->upload->display_errors());
				return redirect('/'.$original_records['category_name'].'/edit/'.$original_records['title_key']);
			}

			$upload_data = $this->upload->data();

			$img_path = $recipe_title.'/'.$upload_data['file_name'];
			$data['img_path'] = $img_path;
			$data['title_key'] = $recipe_title;
		}

		$this->recipe_model->updateRecipe($id, $data);

		$this->session->set_flashdata('success', 'You have successfully update ' . $data['recipe_name']);

		return redirect('/'.$data['category_name'].'/edit/'.fn_permalink($original_records['recipe_name']));
	}
}
