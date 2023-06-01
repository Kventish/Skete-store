<?php
//Подключение к бд
$connection = mysqli_connect("localhost", "root", "", "skeytmagazin");
if( $connection == false)
{
    echo'Не удалось подключиться к бд!<br>';
    echo mysqli_connect_error();
}
//Проставляем значения написанные в форме отправки(В текстовых полях)
$name = $_POST['name'];
$email = $_POST['email'];
$disc = $_POST['discription'];
//Условие если нажата кнопка то...
if(isset($_POST['submit'])){
//Вывводим в массив данные id с таблицы корзины
$result = mysqli_query($connection, 'SELECT id FROM cart');
//Прописываем тег вне цикла
$ids = [];
//Передаём дальше развёрнутый вид массива
while ($row = mysqli_fetch_assoc($result)) {
	//Прописываем что айдишники пренадлежат тегу $id
	$id = $row['id'];
	//Передаём значение $id другому тегу
	$ids[] = $id;
	//Записываем значения вписанные из текстовых полей и айди товара в таблицу заказа
	$sql = mysqli_query($connection, "INSERT INTO cart_feedback (cart_id, name, email, discription_feedback) VALUES('$id','$name', '$email' , '$disc')");
}
//Прописываем тег, чтоб было видно какие айди из коризны нам надо удалять
$joined = join(',', $ids);
//Удаляем соответсвующие id из корзины
$cart_delit = mysqli_query($connection, "DELETE FROM cart WHERE id in($joined)");
}
//Перенаправляем пользователя на страницу сообщения
header('Location: message_feedback.php');
?>