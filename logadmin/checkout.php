<?php

$connection = mysqli_connect("localhost", "root", "", "skeytmagazin");
if( $connection == false)
{
    echo'Не удалось подключиться к бд!<br>';
    echo mysqli_connect_error();
}
//Вытаскиваем данные из БД и запихиваем в массив $result
$result = (mysqli_query($connection,"SELECT * FROM `cart` join `sketeboard`  on cart.skate_id = sketeboard.id"));
?>
<!DOCTYPE HTML>
<html>

<head>
	<title>Скейт шоп 3pm wear</title>
	<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
	<link href="css/style.css" rel='stylesheet' type='text/css' />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
	<script type="application/x-javascript">
		addEventListener("load", function() {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<script src="js/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$(".dropdown img.flag").addClass("flagvisibility");

			$(".dropdown dt a").click(function() {
				$(".dropdown dd ul").toggle();
			});

			$(".dropdown dd ul li a").click(function() {
				var text = $(this).html();
				$(".dropdown dt a span").html(text);
				$(".dropdown dd ul").hide();
				$("#result").html("Selected value is: " + getSelectedValue("sample"));
			});

			function getSelectedValue(id) {
				return $("#" + id).find("dt a span.value").html();
			}

			$(document).bind('click', function(e) {
				var $clicked = $(e.target);
				if (!$clicked.parents().hasClass("dropdown"))
					$(".dropdown dd ul").hide();
			});


			$("#flagSwitcher").click(function() {
				$(".dropdown img.flag").toggleClass("flagvisibility");
			});
		});
	</script>
</head>

<body>
	<div class="header">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="header-left">
						<div class="logo">
							<a href="index.php"><img src="images/logo.png" alt="" /></a>
						</div>
						<div class="menu">
							<a class="toggleMenu" href="#"><img src="images/nav.png" alt="" /></a>
							<ul class="nav" id="nav">
								<li><a href="shop.php">Магазин</a></li>
								<li><a href="contact.php">Контакты</a></li>
								<div class="clear"></div>
							</ul>
							<script type="text/javascript" src="js/responsive-nav.js"></script>
						</div>
						<div class="clear"></div>
					</div>
					<div class="header_right">
						<ul class="icon1 sub-icon1 profile_img">
							<li><a class="active-icon c1" href="#"> </a>
								<ul class="sub-icon1 list">
									<div class="product_control_buttons">
										<a href="#"><img src="images/edit.png" alt="" /></a>
										<a href="#"><img src="images/close_edit.png" alt="" /></a>
									</div>
									<div class="clear"></div>
									<li class="list_img"><img src="images/1.jpg" alt="" /></li>
									<li class="list_desc">
										<h4><a href="#">Покупатель</a></h4>
									</li>
									<div class="login_buttons">
										<div class="check_button"><a href="checkout.php">Проверить вход</a></div>
										<div class="clear"></div>
									</div>
									<div class="clear"></div>
								</ul>
							</li>
						</ul>
						<div class="clear"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="main">
		<div class="shop_top">

			<div class="container">

			<div class="col-md-3 shop_box">
			<?php
				if($result)
					//Выводим результат вытягивания из БД в страницу
					while($post=mysqli_fetch_assoc($result)){
			?>
			<div style="position: relative;">

					<a href="single.php?id=<?php echo $post['id']?>">
					<img src="<?php echo $post['img']?>" class="img-responsive" alt="" width="367px" height="367px">
					<span class="new-box">
						<span class="new-label">Новое</span>
					</span>

					</a>
					<div class="shop_desc"><a href="single.php?id=<?php echo $post['id']?>">
						</a>
						<h3><a href="single.php?id=2"></a>
						<a href="single.php?id=<?php echo $post['id']?>"><?php echo $post['name']?></a></h3>
						<p><?php echo $post['description']?></p>
						<span class="reducedfrom">100.000Тг</span>
						<span class="actual"><?php echo $post['price']?> Тг</span><br>
						<ul class="buttons">

							<li class=""><a href="cart.php?action=minus&id=<?php echo $post['id']?>"">-</a>
							<p><?php echo $post['amount_skate']?></p>
							<a href="cart.php?action=plus&id=<?php echo $post['id']?>">+</a>
							</li>
							
							<div class="clear"> </div>
						</ul>
					</div>

				</div>
				<?php
						}
					?>
			</div>
			<form method="post" action="cart_feedback.php">
					<div class="to">
                     	<input type="text" name="name" class="text" placeholder="Имя:">
					 	<input type="text" name="email" class="text" placeholder="E-mail:" value="<?php echo 
						//Выводим значение которое мы отправили с футера
						isset($_GET['Footer_feedback_1']) ? $_GET['Footer_feedback_1'] : ''
						?>">
					</div>
					<div class="text">
	                   <textarea value="Сообщение:" name="discription" placeholder="Сообщение:"></textarea>
	                   <div class="form-submit">
			           <input name="submit" type="submit" value="Купить"><br>
			           </div>
	                </div>
	                <div class="clear"></div>
                   </form>

				<!-- <h4 class="title">КОРЗИНА ДЛЯ ПОКУПОК ПУСТА</h4>
			<p class="cart">В вашей корзине покупок нет товаров.<br>Нажмите<a href="shop.php"> здесь</a> чтобы продолжить покупки</p> -->

			</div>

		</div>

	</div>

	<div class="footer">
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					<ul class="footer_box">
						<h4>Товар</h4>
						<li><a href="shop.php?type=1">Обычный</a></li>
						<li><a href="shop.php?type=2">Скоростной</a></li>
						<li><a href="shop.php?type=3">Трюковой</a></li>
					</ul>
				</div>
				<div class="col-md-3">
					<ul class="footer_box">
						<h4>Рассылка</h4>
						<div class="footer_search">
							<?php
							if (isset($_POST['Change'])) {
								header('Location: contact.php');
							}
							?>
							<form method="get" action="contact.php">
								<div class="footer_search input">
								<input type="text" placeholder="E-mail" name="Footer_feedback_1">
								<input type="submit" value="Вперед" class="feedback" name="Footer_feedback_2">
								</div>
							</form>
						</div>
					</ul>
				</div>
			</div>
			<div class="row footer_bottom">
				<div class="copy">
					<p>© 2023

				</div>
			</div>
		</div>
</body>

</html>