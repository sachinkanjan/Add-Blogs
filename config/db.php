<?php 
$conn = mysqli_connect('localhost','root','1234','phpblog');

if(mysqli_connect_errno()){
echo 'connection failed'.mysqli_connect_errno();
}

