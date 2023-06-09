<?php
//Подключение к базе данных при открытии страницы
$connection = mysqli_connect("localhost", "root", "", "skeytmagazin");
if( $connection == false)
{
    echo'Не удалось подключиться к бд!<br>';
    echo mysqli_connect_error();
}
//Сравниваем айдишники записанные в ссесию
$id = intval($_GET['id']);
//Вытаскиваем данные из БД и запихиваем в массив $result
$result = (mysqli_query($connection,"SELECT * FROM `sketeboard` join `type_skateboard`  on type_skateboard.id = sketeboard.type_id  WHERE sketeboard.id = $id  "));

?>
<!DOCTYPE HTML>
<html>
<head>

    <?php
    //Выводим результат вытягивания из БД в страницу
    while($post=mysqli_fetch_assoc($result)){

    ?>
<title><?php echo $post['name']?></title>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
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
                if (! $clicked.parents().hasClass("dropdown"))
                    $(".dropdown dd ul").hide();
            });


            $("#flagSwitcher").click(function() {
                $(".dropdown img.flag").toggleClass("flagvisibility");
            });
        });
     </script>

					<link rel="stylesheet" href="css/etalage.css">
					<script src="js/jquery.etalage.min.js"></script>
				<script>
						jQuery(document).ready(function($){

							$('#etalage').etalage({
								thumb_image_width: 300,
								thumb_image_height: 400,

								show_hint: true,
								click_callback: function(image_anchor, instance_id){
									alert('Callback example:\nYou clicked on an image with the anchor: "'+image_anchor+'"\n(in Etalage instance: "'+instance_id+'")');
								}
							});
							$('.dropdownlist').change(function(){
								etalage_show( $(this).find('option:selected').attr('class') );
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
						<script src="js/classie.js" defer></script>
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
						  <li class="list_desc"><h4>Покупатель</h4></li>
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
			<div class="row">
				<div class="col-md-9 single_left">
				   <div class="single_image">
					     <ul id="etalage">
							<li>
								<a href="optionallink.html">
									<img class="etalage_thumb_image" src="<?php echo $post['img']?>" />
									<img class="etalage_source_image" src="<?php echo $post['img']?>" />
								</a>
							</li>
							<li>
								<img class="etalage_thumb_image" src="images/4.jpg" />
								<img class="etalage_source_image" src="images/4.jpg" />
							</li>
							<li>
								<img class="etalage_thumb_image" src="images/5.jpg" />
								<img class="etalage_source_image" src="images/5.jpg" />
							</li>
							<li>
								<img class="etalage_thumb_image" src="images/6.jpg" />
								<img class="etalage_source_image" src="images/6.jpg" />
							</li>
							<li>
								<img class="etalage_thumb_image" src="images/7.jpg" />
								<img class="etalage_source_image" src="images/7.jpg" />
							</li>
							<li>
								<img class="etalage_thumb_image" src="images/8.jpg" />
								<img class="etalage_source_image" src="images/8.jpg" />
							</li>

						</ul>
					    </div>

				        <div class="single_right">
				        	<h3><?php echo $post['name']?> </h3>
				        	<p class="m_10"><?php echo  $post['type']?></p>

							<div class="btn_form">
							</div>
							<ul class="add-to-links">
    			              <li class="ttt">
                                  <img src="images/wish.png" alt="" class="img-heart">
                                  <a class="like" href="like.php?id=<?php echo $id?>"><?php if($post['is_liked'] == 1){
                                      echo "Добавлено";
                                  }
                                  else{
                                      echo "Добавить";
                                  };?></a>
                              </li>
    			            </ul>
							<div class="social_buttons">
								<h4><?php echo $post['amount'] ?> Предметов</h4>

					            <button type="button" class="btn1 btn1-default1 btn1-facebook" onclick="">
					              <i class="icon-facebook"></i> Поделится
					            </button>
					             <button type="button" class="btn1 btn1-default1 btn1-google" onclick="">
					              <i class="icon-google"></i> Google+
					            </button>
					            <button type="button" class="btn1 btn1-default1 btn1-pinterest" onclick="">
					              <i class="icon-pinterest"></i> Pinterest
					            </button>
					        </div>
				        </div>
				        <div class="clear"> </div>
				</div>
				<div class="col-md-3">
				  <div class="box-info-product">
					<p class="price2"><?php echo $post['price']?> Тг</p>
							<a href="cart.php?action=plus&id=<?php echo $id?>">Купить</a>
				   </div>
			   </div>
			</div>
			<div class="desc">
			   	<h4>Описание</h4>
			   	<p><?php echo $post['description']?> </p>
			</div>
            <?php
            }
            ?>

				    </div>
				</div>
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
									header('Location: contact.php');
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
</body>
</html>
