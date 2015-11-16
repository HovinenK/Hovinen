<?php
function render_template($path,array $args)
{
	extract($args);
	ob_start();
	require $path;
	$html=ob_get_clean();
	return $html;
}

function list_action()
{	
	$postsModel = new PostsModel();
	$posts = $postsModel -> get_all_posts(); 
	$html=render_template("View/Templates/list.php",array('posts'=>$posts));
	return $html;
	/*require "View/T*/
}

function admin_action()
{
	$postsModel = new PostsModel();
	$posts = $postsModel-> get_all_posts();
	require "View/Templates/admin.php";
	/*
	{
	if (isset($_POST['submit']))
		{
	add_post();
		}
	$posts=get_all_posts();
	$html=render_template('View/Templates/admin.php',array('posts'=>$posts));
	return $html;
	//require "view/templates/admin.php";
	}*/
}

function avtor_action($id)
{
	$html=render_template('view/templates/avtor.php',array());
	require "View/Templates/avtor.php";
}


function add_action() 
{
	$postsModel = new PostsModel();
	$postsModel->add_post();
	
	$posts = $postsModel-> get_all_posts();
	$html=render_template("View/Templates/admin.php",array('posts'=>$posts));
	//return new Response($html);
	/*require "View/Templates/admin.php";*/
	return $html;
}


function showpost_action($id)
{
	$postsModel = new PostsModel();
	$post = $postsModel-> get_post_by_id($id);
	$html=render_template("View/Templates/showpost.php",array('post'=>$post));
	//return new Response($html);
	//require "View/Templates/showpost.php";
	return $html;
}

/*function add_action() 
{
	add_post();
	$postsModel = new PostsModel();
	$posts=$postsModel->get_all_posts();

	$html=render_template("View/Templates/admin.php",array('posts'=>$posts));
	//return new Response($html);

	/*require "View/Templates/admin.php";*/

	/*return $html;*/


function delete_action($id)
{
	
	$postsModel = new PostsModel();
	$postsModel-> delete_post($id);
	$posts = $postsModel-> get_all_posts();
	$html=render_template("View/Templates/admin.php",array('posts'=>$posts));
	return $html;
	

/*function delete_action($id)
{
	delete_post($id);
	$posts = get_all_posts();
	$html=render_template("View/Templates/admin.php",array('posts'=>$posts));
	return $html;
}*/
}
/*function update_action($id)
{
	update_post($id);
	$posts = get_all_posts();
	$html=render_template("View/Templates/admin.php",array('posts'=>$posts));
	return $html;

	/*add_post();
	$postsModel = new PostsModel();
	$posts = $postsModel-> get_all_posts();
	$html=render_template("View/Templates/admin.php",array('posts'=>$posts));
	//return new Response($html);
	/*require "View/Templates/admin.php";*/
	
