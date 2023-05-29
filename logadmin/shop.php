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
						<a href="index.php"><img src="images/logo.png" alt=""/></a>
					 </div>
					 <div class="menu">
						  <a class="toggleMenu" href="#"><img src="images/nav.png" alt="" /></a>
						    <ul class="nav" id="nav">
						    	<li class="current"><a href="shop.php">Магазин</a></li>
								<li><a href="contact.php">Контакты</a></li>
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
						  <li class="list_desc"><h4>Покупатель</h4><span class="actual"></span></li>
						  <div class="login_buttons">
							 <div class="check_button"><a href="checkout.php">Проверить корзину</a></div>
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
			<div class="col-md-4">
					<ul class="checkout_box" style="list-style: none; ">
						<h4>Сортировка товара</h4>
						<li><a href="shop.php?type=1" style="color: #000;">Обычный</a></li>
						<li><a href="shop.php?type=2" style="color: #000;">Скоростной</a></li>
						<li><a href="shop.php?type=3" style="color: #000;">Трюковой</a></li>
					</ul>
				</div>
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
						<h4>Рассылка</h4>
						<div class="footer_search">
							<?php
								if(isset($_POST['Change']))
								{
									$new_url = 'http://localhost/Skete-store/logadmin/contact.php';
									header('Location: '.$new_url);
								}
							?>
						   <form method="get" action="contact.php">
							<input type="text" placeholder="E-mail" name="Footer_feedback_1">
							<input type="submit" value="Вперед" class="feedback" name="Footer_feedback_2">
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
</form>
</html>
