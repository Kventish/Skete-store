<?php
//Подключение к базе данных при открытии страницы
$connection = mysqli_connect("localhost", "root", "root", "skeytmagazin");
if( $connection == false)
{
    echo'Не удалось подключиться к бд!<br>';
    echo mysqli_connect_error();
}
//Вытаскиваем все строки в базе данных из таблицы `sketeboard`
if(empty($_GET['type'])){
    $result = (mysqli_query($connection,"SELECT * FROM `sketeboard`"));
}
else{
    $type = $_GET['type'];
    $result = (mysqli_query($connection,"SELECT * FROM `sketeboard` where type_id = $type"));
}

session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Магазин</title>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<script src="js/jquery.min.js"></script>
<script type="text/javascript">
    //Подключение библиотеки jquery
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
                if (! $clicked.parents().hasClass("dropdown"))
                    $(".dropdown dd ul").hide();
            });


            $("#flagSwitcher").click(function() {
                $(".dropdown img.flag").toggleClass("flagvisibility");
            });
        });
     </script>
</head>
<form action="" method="post">
	<div class="header">
		<div class="container">
			<div class="row">
			  <div class="col-md-12">
				 <div class="header-left">
					 <div class="logo">
						<a href="index.html"><img src="images/logo.png" alt=""/></a>
					 </div>
					 <div class="menu">
						  <a class="toggleMenu" href="#"><img src="images/nav.png" alt="" /></a>
						    <ul class="nav" id="nav">
						    	<li class="current"><a href="shop.php">Магазин</a></li>
								<li><a href="contact.html">Контакты</a></li>
								<div class="clear"></div>
							</ul>
							<script type="text/javascript" src="js/responsive-nav.js"></script>
				    </div>
	    		    <div class="clear"></div>
	    	    </div>
	            <div class="header_right">
				  <div class="search-box">
							<div id="sb-search" class="sb-search">
								<form>
									<input class="sb-search-input" placeholder="Поиск" type="search" name="search" id="search">
									<input class="sb-search-submit" type="submit" value="">
									<span class="sb-icon-search"> </span>
								</form>
							</div>
                         </div>
						<script src="js/classie.js"></script>
						<script src="js/uisearch.js"></script>
						<script>
							new UISearch( document.getElementById( 'sb-search' ) );
						</script>
				    <ul class="icon1 sub-icon1 profile_img">
					 <li><a class="active-icon c1" href="#"> </a>
						<ul class="sub-icon1 list">
						  <div class="product_control_buttons">
						  	<a href="#"><img src="images/edit.png" alt=""/></a>
						  		<a href="#"><img src="images/close_edit.png" alt=""/></a>
						  </div>
						   <div class="clear"></div>
						  <li class="list_img"><img src="images/1.jpg" alt=""/></li>
						  <li class="list_desc"><h4><a href="#">Покупатель</a></h4><span class="actual"> 0шт
                          0.00Тг</span></li>
						  <div class="login_buttons">
							 <div class="check_button"><a href="checkout.html">Проверить вход</a></div>
							 <div class="login_button"><a href="login.html">Логин</a></div>
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
			<div class="row shop_box-top">
				<div class="col-md-3 shop_box">
                    <?php
                    //Выводим результат вытягивания из БД в страницу
                    while($post=mysqli_fetch_assoc($result)){
                    ?>
                        <div style="position: relative;"><a href="single.php?id=<?php echo  $post['id']?>">


					<img src="<?php echo $post['img']?>" class="img-responsive" alt=""  width="367px" height="367px"/>
					<span class="new-box">
						<span class="new-label">Новое</span>
					</span>

					<div class="shop_desc">
						<h3><a href="single.php?id=<?php echo  $post['id']?>"><?php echo $post['name']?></a></h3>
						<p><?php echo $post['description']?></p>
						<span class="reducedfrom">100.000Тг</span>
						<span class="actual"><?php echo $post['price']?>Тг</span><br>
						<ul class="buttons">
							<li class="cart"><a href="#">Добавить в корзину</a></li>
							<li class="shop_btn"><a href="single.php?id=<?php echo  $post['id']?>">Подробнее</a>
                                <?php
                                //Ставим условие, что при нажатии на ссылку, будет переходить на правильный продукт при проверки id
                                if (isset($_SESSION['toCompare']) && count($_SESSION['toCompare']))
                                {
                                    $_SESSION['toCompare'][] = $id;
                                    echo"$id";
                                }
                                ?></li>
							<div class="clear"> </div>
					    </ul>
				    </div>
                    </a> </div> <?php
                    }
                    ?>
                        </div>
					    </ul>
				    </div>
					    </ul>
				    </div>

				</a></div>
			</div>


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
						<h4>О нас</h4>
						<li><a href="#">Карьера и стажировки</a></li>
						<li><a href="#">Спонсорство</a></li>
						<li><a href="#">Запрос каталога/Загрузки</a></li>
					</ul>
				</div>
				<div class="col-md-3">
					<ul class="footer_box">
						<h4>служба поддержки клиентов</h4>
						<li><a href="#">связаться с нами</a></li>
						<li><a href="#">Доставка и отслеживание заказа</a></li>
						<li><a href="#">Легкая отдача</a></li>


					</ul>
				</div>
				<div class="col-md-3">
					<ul class="footer_box">
						<h4>Рассылка</h4>
						<div class="footer_search">
						   <form>
							<input type="text" value="email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'email';}">
							<input type="submit" value="Вперед">
						   </form>
						</div>
						<ul class="social">
						  <li class="instagram"><a href="#"><span> </span></a></li>
						  <li class="youtube"><a href="https://www.youtube.com/"><span> </span></a></li>
						</ul>
					   </ul>
				</div>
			</div>
			<div class="row footer_bottom">
				<div class="copy">
				   <p>© 2019

			   </div>
		</div>
	</div>
</form>
</html>
