<?php
require ('config/db.php');
include ('inc/header.php');

if(isset($_POST['submit'])){
	$update_id=mysqli_real_escape_string($conn,$_POST['update_id']);
	$title=mysqli_real_escape_string($conn,$_POST['title']);
	$author=mysqli_real_escape_string($conn,$_POST['author']);
	$body=mysqli_real_escape_string($conn,$_POST['body']);


$query ="UPDATE posts SET 
	title='$title',
	author='$author',
	body='$body'
	WHERE id={$update_id}


";

if(mysqli_query($conn,$query)){
	header('Location: '.'index.php'.'');
}else{
	echo 'ERROR:'.mysqli_error($conn);
}
}
$id=mysqli_real_escape_string($conn,$_GET['id']);

$query='SELECT * FROM posts WHERE id = '.$id;

//get result
$result = mysqli_query($conn,$query);

//fetch data
$post = mysqli_fetch_assoc($result);
//var_dump($posts);
//free result

mysqli_free_result($result);

//close conn

mysqli_close($conn);


 ?>
<div class="container">
<h1>Add Posts</h1>
	<form method="POST" action="<?php $_SERVER['PHP_SELF'];?>">
		<div class="form-group">
			<label>Title</label>
				<input type="text" name="title"  class="form-control" value="<?php echo $post['title']?>">
			
		</div>
		<div class="form-group">
			<label>Author</label>
				<input type="text" name="author" class="form-control" value="<?php echo $post['author']?>">
		</div>
		<div class="form-group">
			<label>Body</label>
				<textarea name="body" class="form-control"><?php echo $post['body']?></textarea>
		</div>
		<input type="submit" name="submit" value="submit" class="btn-btn primary">
		<input type="hidden" name="update_id" value="<?php echo $post['id']?>">	
	</form>


</div>

<?php include ('inc/footer.php');?>


