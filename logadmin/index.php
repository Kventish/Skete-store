
<!DOCTYPE HTML>
<html>
<head>
<title>Скейт шоп 3pm wear</title>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<script src="js/jquery.min.js"></script>

<link rel="stylesheet" href="css/fwslider.css" media="all">
<script src="js/jquery-ui.min.js"></script>
<script src="js/fwslider.js"></script>
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
						    	<li><a href="shop.php">Магазин</a></li>
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
						  <li class="list_desc"><h4>Покупатель</h4></li>
						  <div class="login_buttons">
							 <div class="check_button"><a href="checkout.php">Проверить корзину
							 </a></div>
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
	<div class="banner">
       <div id="fwslider">
         <div class="slider_container">
            <div class="slide">
               <img src="images/slider1.jpg" class="img-responsive" alt=""/>

                <div class="slide_content">
                    <div class="slide_content_wrap">
                        <h1 class="title">Преодолевая любые<br>Трудности</h1>
                    </div>
                </div>
            </div>
            <div class="slide">
               <img src="images/slider2.jpg" class="img-responsive" alt=""/>
                <div class="slide_content">
                    <div class="slide_content_wrap">
                        <h1 class="title">Преодолевая любые<br>Трудности</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="timers"></div>
        <div class="slidePrev"><span></span></div>
        <div class="slideNext"><span></span></div>
       </div>
      </div>
	  <div class="main">
		<div class="content-top">
			<h2>Скейты</h2>
			<p>Катася и наслождайся </p>
			<div class="close_but"><i class="close1"> </i></div>
				<ul id="flexiselDemo3">
				<li><img src="images/board1.jpg" /></li>
				<li><img src="images/board2.jpg" /></li>
				<li><img src="images/board3.jpg" /></li>
				<li><img src="images/board4.jpg" /></li>
				<li><img src="images/board5.jpg" /></li>
			</ul>
		<h3>Серия скейтбордов</h3>
			<script type="text/javascript">
		$(window).load(function() {
			$("#flexiselDemo3").flexisel({
				visibleItems: 5,
				animationSpeed: 1000,
				autoPlay: true,
				autoPlaySpeed: 3000,
				pauseOnHover: true,
				enableResponsiveBreakpoints: true,
		    	responsiveBreakpoints: {
		    		portrait: {
		    			changePoint:480,
		    			visibleItems: 1
		    		},
		    		landscape: {
		    			changePoint:640,
		    			visibleItems: 2
		    		},
		    		tablet: {
		    			changePoint:768,
		    			visibleItems: 3
		    		}
		    	}
		    });

		});
		</script>
		<script type="text/javascript" src="js/jquery.flexisel.js"></script>
		</div>

	<div class="features">
		<div class="container">
			<h3 class="m_3">Характеристики</h3>
			<div class="close_but"><i class="close1"> </i></div>
			  <div class="row">
				<div class="col-md-3 top_box">
				  <div class="view view-ninth">
                    <img src="images/pic1.jpg" class="img-responsive" alt=""/>
                    <div class="mask mask-1"> </div>
                    <div class="mask mask-2"> </div>
                      <div class="content">
                        <h2>Колеса</h2>
                        <p>Прочные, выдерживают не плохой вес</p>
                      </div>
                    </div
				</div>

                  <h4 class="m_4"><a href="shop.php">Келеса гелевые/пластик</a></h4>

                </div>
                <div class="col-md-3 top_box">
					<div class="view view-ninth">
                    <img src="images/pic2.jpg" class="img-responsive" alt=""/>
                    <div class="mask mask-1"> </div>
                    <div class="mask mask-2"> </div>
                      <div class="content">
                        <h2>Платформа</h2>
                        <p>Прочные, выдерживают не плохой вес</p>
                      </div>
                     </div>
                   <h4 class="m_4"><a href="shop.php">Платформа пластик/дерево</a></h4>
				</div>
				<div class="col-md-3 top_box">
					<div class="view view-ninth">
                    <img src="images/pic3.jpg" class="img-responsive" alt=""/>
                    <div class="mask mask-1"> </div>
                    <div class="mask mask-2"> </div>
                      <div class="content">
                        <h2>Принт</h2>
                        <p>В один цвет, либо другой различный</p>
                      </div>
                    </div>
                   <h4 class="m_4"><a href="shop.php">Принт</a></h4>
				</div>
				<div class="col-md-3 top_box1">
					<div class="view view-ninth">
                    <img src="images/pic4.jpg" class="img-responsive" alt=""/>
                    <div class="mask mask-1"> </div>
                    <div class="mask mask-2"> </div>
                      <div class="content">
                        <h2>Hover Style #9</h2>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing.</p>
                      </div>
                    </div>
                   <h4 class="m_4"><a href="shop.php">Скоростной, трюковой, Обычный</a></h4>
                   <p class="m_5">Разные виды</p>
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
