<?php 

	if ( !function_exists('fn_print_die'))
	{

		function fn_print_die() {
			for ( $i = 0; $i < func_num_args(); $i++ ) {
				fn_print( func_get_arg($i) );
			}
			die();
		}
	}

	if ( !function_exists('fn_print') )
	{

		function fn_print() {
			for ( $i = 0; $i < func_num_args(); $i++ ) {
				echo '<pre style="border-radius: 5px; border: 1px solid #808080; padding: 5px;  background: #2F4F4F; color: #FFF; margin: 5px 5px; float: left; clear: both;">';
				print_r( func_get_arg($i) );
				echo "</pre>";
			}
		}
	}


	if( !function_exists('fn_print_r') )
	{

		function fn_print_r() {
			for ( $i = 0; $i < func_num_args(); $i++ ) {
				fn_print( func_get_arg($i) );
			}
		}
	}

	if( !function_exists('fn_get_categories'))
	{

		function fn_get_categories()
		{

			$CI =& get_instance();

			$CI->load->model('category_model');

			return $CI->category_model->getCategories();
		}
	}

	if( !function_exists('fn_permalink'))
	{

		function fn_permalink( $url='', $glue = '-' )
		{

			if ( empty( $url ) )
        return false;

      $url = trim($url);

      $spChars = array(
          '/[&]/i'  => "and",
          '/hrs/i' => "hours",
      );

      $newName = preg_replace(
          "/([ ]{1,})/",
          "{$glue}",
          preg_replace(
              "/[^\w ]/",
              "",
              preg_replace(
                  array_keys($spChars),
                  array_values($spChars),
                  $url
              )
          )
      );

      return strtolower($newName);
		}
	}

 ?>