<?php
//Подключение к бд
$connection = mysqli_connect("localhost", "root", "", "skeytmagazin");
if( $connection == false)
{
    echo'Не удалось подключиться к бд!<br>';
    echo mysqli_connect_error();
}
//Передаём значение get в данный тег
$action = $_GET['action'];
//Передаём id скейта в данный тег
$id = $_GET['id'];
//Задаём цикл
switch ($action) {
    //Прописываем первый метод(добавление)
    case 'plus':
        //Вытаскиваем из бд скейты и проставляем что значение не должно = 0
        $skate_id = mysqli_query($connection,"SELECT COUNT(0) as count FROM cart WHERE skate_id = $id");
        //Засовываем эту переменную в массив
        $result = mysqli_fetch_assoc($skate_id);
        //Передаём массив в переменную
        $count = $result['count'];
        //Прописываем, если уже был такой заказ в козине, то прибаляем к нему +1
        if($count > 0){
            mysqli_query($connection,"UPDATE cart SET amount_skate = amount_skate + 1 WHERE skate_id = $id");
        }
        //Если скейта небыло в заказе, добавляем заказ
        else{
            mysqli_query($connection,"INSERT INTO cart (`skate_id`, `amount_skate`) VALUES($id, 1)");
        }
        //Повторяем
        break;
    //Прописываем второй метод(убавление)
    case 'minus':
        //Вытаскиваем из бд колличество добавленных скейтов
        $skate_id = mysqli_query($connection,"SELECT amount_skate FROM cart WHERE skate_id = $id");
        //Засовываем в переменную значение массива
        $result = mysqli_fetch_assoc($skate_id);
        //Если ничего не вышло то возвращаем переменную модулю
        if (!$result) {
            return;
        }
        //Передаём колличество скейтов в тег
        $count = $result['amount_skate'];
        //Если колличество скейтов>1, то убаляем по одному(Но не удаляет)
        if($count > 1){
            mysqli_query($connection,"UPDATE cart SET amount_skate = amount_skate - 1 WHERE skate_id = $id");
        }
        //Если значение = 1, то следующее нажатие его удаляет
        else{
            mysqli_query($connection,"DELETE FROM cart WHERE skate_id = $id");
            header('Location: shop.php');
        }
    //Повторяем
        break;
}
//Перенаправляем пользователя на ту же страницу где он и находился
if (isset($_SERVER['HTTP_REFERER'])) {
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}
?>