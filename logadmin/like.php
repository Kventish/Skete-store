<?php
//Подключение к базе данных при открытии страницы
$connection = mysqli_connect("localhost", "root", "root", "skeytmagazin");
if( $connection == false)
{
    echo'Не удалось подключиться к бд!<br>';
    echo mysqli_connect_error();
}
$like = $_GET['id'];
$request = mysqli_query($connection, "Update sketeboard Set is_liked = !is_liked where id = $like");
header("location: single.php?id=$like")
?>
