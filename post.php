<?php
require ('config/db.php');


if(isset($_POST['delete'])){
	$delete_id=mysqli_real_escape_string($conn,$_POST['delete_id']);
	

$query ="DELETE FROM posts WHERE id={$delete_id}";

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

<?php include ('inc/header.php');?>
<div class="container">
<a class="btn btn-primary" href="index.php">Back</a>
<h1><?php echo $post['title']; ?></h1>


		<!-- <h3></h3> -->
		<small>Created on <?php echo $post['created_at']; ?> by <?php echo $post['author'];?> </small>
		<p><?php echo $post['body'];?></p>
		<hr>
		<form class="pull-right" method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
		<input type="hidden" name="delete_id" value="<?php echo $post['id'];?>">
		<input type="submit" name="delete" class="btn btn-danger" value="Delete">
			
		</form>
		<a href="editpost.php?id=<?php echo $post['id']; ?>">Edit</a>
		<!-- <a class="btn btn-success" href="post.php?id=<?php echo $post['id']; ?>">  Read More</a> -->
			
		
</div>




<?php include ('inc/footer.php');?>