<?php
function open_database_connection()
{
	$link=mysql_connect('localhost', 'Hovinen','12345');
	mysql_select_db('Hovinen', $link);
	mysql_query('SET NAMES utf8');
	return $link;
}

function close_database_connection($link)
{
	mysql_close($link);
}


function get_all_posts()
{
	$link = open_database_connection();
	$sql = "SELECT * FROM post";
	$result = mysql_query($sql, $link);
	$posts = array();
	while($row = mysql_fetch_assoc($result))
		{
		$posts[] = $row;
		}
	close_database_connection($link);
	return $posts;
}


function get_post($id)
{
	$link= open_database_connection();
	$sql="SELECT `title`,`content`,`autor`,`date`  FROM post WHERE id='$id'";
	$result=mysql_query($sql,$link);
	/*$post=$row;*/
	$post=mysql_fetch_assoc($result);
	close_database_connection($link);
	return $post;
}

function add_post()
{
	if(!isset($_REQUEST['add_autor'])
		|| !isset($_REQUEST['add_date'])
			|| !isset($_REQUEST['add_title']) 
				|| !isset($_REQUEST['add_content'])){
		return;
	}

	$autor=$_REQUEST['add_autor'];
	$date=$_REQUEST['add_date'];
	$title=$_REQUEST['add_title'];
	$content=$_REQUEST['add_content'];
	$sql="INSERT INTO post(`date`,`autor`,`title`,`content`)
	VALUES('$date','$autor','$title','$content')";
	$link = open_database_connection();
	mysql_query($sql, $link);	

	close_database_connection($link);
	return;
}
function delete_post($id)
{
	$sql="DELETE FROM post WHERE id='$id'";
	$link=open_database_connection();
	mysql_query($sql,$link);
	close_database_connection($link);
	return;
}
/*function update_post($id)
{
	$sql="UPDATE post WHERE id='$id'";
	$link=open_database_connection();
	mysql_query($sql,$link);
	close_database_connection($link);
	return;
}*/