<?php
						$name = $_POST['name'] ?? "";
						$email = $_POST['email'] ?? "";
						$disc = $_POST['discription'] ?? "";
						if(isset($_POST['submit'])){
							if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['discription']) ){
								print 'Заполните все поля ввода';
							}
							else{
								$connection = mysqli_connect("localhost", "root", "root", "skeytmagazin");
								if( $connection == false)
								{
									echo'Не удалось подключиться к бд!<br>';
									echo mysqli_connect_error();
								}
								$sql = mysqli_query($connection,"INSERT INTO feedback (`name`,`email`,`discription`) VALUES (
								'$name',
								'$email',
								'$disc')");
								header("location: message_feedback.php");
								exit();
							};
						}
						?>