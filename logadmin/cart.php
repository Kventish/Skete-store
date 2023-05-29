<?php

$connection = mysqli_connect("localhost", "root", "", "skeytmagazin");
if( $connection == false)
{
    echo'Не удалось подключиться к бд!<br>';
    echo mysqli_connect_error();
}

$action = $_GET['action'];
$id = $_GET['id'];

switch ($action) {
    case 'plus':
        $skate_id = mysqli_query($connection,"SELECT COUNT(0) as count FROM cart WHERE skate_id = $id");
        $result = mysqli_fetch_assoc($skate_id);
        $count = $result['count'];
        if($count > 0){
            mysqli_query($connection,"UPDATE cart SET amount_skate = amount_skate + 1");
        }
        else{
            mysqli_query($connection,"INSERT INTO cart (`skate_id`, `amount_skate`) VALUES($id, 1)");
        }
        break;

    case 'minus':
        $skate_id = mysqli_query($connection,"SELECT amount_skate FROM cart WHERE skate_id = $id");
        $result = mysqli_fetch_assoc($skate_id);

        if (!$result) {
            return;
        }

        $count = $result['amount_skate'];
        if($count > 1){
            mysqli_query($connection,"UPDATE cart SET amount_skate = amount_skate - 1");
        }
        else{
            mysqli_query($connection,"DELETE FROM cart WHERE skate_id = $id");
        }
        break;
}

if (isset($_SERVER['HTTP_REFERER'])) {
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}
?>