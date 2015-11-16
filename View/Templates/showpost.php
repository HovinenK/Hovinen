<?php ob_start()?>

<h2><?php echo $post['title'];?> </h2>
<div>Дата: <?php echo $post['date'];?></div>
<div>Автор: <?php echo $post['autor'];?></div>
<div>Текст статьи: <?php echo $post['content'];?></div>	

<?php $content=ob_get_clean();?>

<?php include "View/Templates/temp.php";?>