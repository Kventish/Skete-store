<?php
//Прописываем поля ввода и даём им значения
						$name = $_POST['name'] ?? "";
						$email = $_POST['email'] ?? "";
						$disc = $_POST['discription'] ?? "";
                        //Если кнопка нажата то выполняем действие
						if(isset($_POST['submit'])){
                            //Проверяем на зоплененность полей
							if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['discription']) ){
								print 'Заполните все поля ввода';
							}
							else{
                                //Подключаем базу данных
								$connection = mysqli_connect("localhost", "root", "", "skeytmagazin");
								if( $connection == false)
								{
									echo'Не удалось подключиться к бд!<br>';
									echo mysqli_connect_error();
								}
                                //Засовываем значания в массив и перенаправляем на заполнение базы данных
								$sql = mysqli_query($connection,"INSERT INTO feedback (`name`,`email`,`discription`) VALUES (
								'$name',
								'$email',
								'$disc')");
								header("location: message_feedback.php");
								exit();
							};
						}
						?>