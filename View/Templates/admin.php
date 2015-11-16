<?php ob_start()?>
<h2> Администратирование странички </h2>
<form action="/Hovinen/index.php/add" method="POST" name="form1">
	<table>
		<tr>
		<td>Автор:</td>
		<td><input type="text" name="add_autor"></td>
		</tr>
		<tr>
		<td>Дата:</td>
		<td><input type="text" name="add_date" value="<?php echo date("Y-m-d H:i:s") ?>"></td>
		</tr>
		<tr>
		<td>Заголовок:</td>
		<td><input type="text" name="add_title"></td>
		</tr>
		<tr>
		<td>Текст:</td>
		<td><textarea name="add_content" input type="text"></textarea></td>
		</tr>
		<tr>
		<td><input type="reset" name="reset" value="Очистить"></td>
		<td><input type="submit" name="submit" value="Добавить"></td>
		</tr>
	</table>
</form>

<h2> Список постов </h2>
	<ol>
		<?php foreach ($posts as $post):?>
		<li>
		<a href="/Hovinen/index.php/delete?id=<?php echo $post['id'];?>">Удалить</a>
		
		<a href="/Hovinen/index.php/showpost?id=<?php echo $post['id'];?>">
		<?php echo $post['title'];?>
		</a>
		</li>
		<?php endforeach; ?>
	</ol>
<?php $content=ob_get_clean();?>
<?php include "View/Templates/temp.php";