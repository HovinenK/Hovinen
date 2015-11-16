<?php
class PostsModel{
	private $dbh;
	private $user="Hovinen";
	private $pass="12345";
	private $db="Hovinen";
	private $charset="UTF8";
	private $host="localhost";


/**конструктор  http:/phpfaq.ru/pdo  метод создание объектов*/
public function PostsModel(){
	$dsn = "mysql:host=$this->host;dbname=$this->db;charset=$this->charset";
	$opt = array(
	 PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
	 PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
	);

	$this->dbh = new PDO($dsn, $this->user, $this->pass, $opt);	
} 


public function get_all_posts(){
	$sql='SELECT id,title FROM post';
	$stmt=$this->dbh->query($sql);

	$posts=array();
	while ($row= $stmt -> fetch()){
		$posts[]=$row;
	}
	return $posts;
}

public function get_post_by_id($id)
{
	$sql="SELECT `title`,`content`,`autor`,`date`  FROM post WHERE id=?";
	$stmt= $this -> dbh -> prepare($sql);
	$stmt -> execute([$id]);
	$post = $stmt -> fetch();
	return $post;
}

public function add_post()
{
	if(!isset($_REQUEST['add_autor'])
		|| !isset($_REQUEST['add_date'])
			|| !isset($_REQUEST['add_title']) 
				|| !isset($_REQUEST['add_content'])){
		return false;
	}

	

	$autor=$_REQUEST['add_autor'];
	$date=$_REQUEST['add_date'];
	$title=$_REQUEST['add_title'];
	$content=$_REQUEST['add_content'];
	$sql="INSERT INTO post(`date`,`autor`,`title`,`content`)
	VALUES(?, ? , ?, ?)";
	//$link = open_database_connection();
	//mysql_query($sql, $link);	
	$stmt= $this -> dbh -> prepare($sql);
	//close_database_connection($link);
	$stmt -> execute([$date,$autor,$title,$content]);
	return true;
}

public function delete_post($id)
{

	$sql="DELETE FROM post WHERE id=?";
	$stmt= $this -> dbh -> prepare($sql);
	//$link=open_database_connection();
	//mysql_query($sql,$link);
	//close_database_connection($link);
	//return;
	$stmt -> execute([$id]);

}



}