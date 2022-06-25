
<?php
	require_once "connection.php";
	require "controller.php";

?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Trang chủ</title>
	<link rel="stylesheet" type="text/css" href="css/stylehome.css">
	<link rel="stylesheet" type="text/css" href="css/styledodung.css">
	<link rel="stylesheet" type="text/css" href="css/styleshowroom.css">
	<link rel="stylesheet" type="text/css" href="css/detail.css">

	<!-- add library to add icon -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
	<link rel="shortcut icon" href="images/icon.jpg">
	<script src="js/action.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body class="preloading" onload="addCart('<?php echo $_GET['id'] ?>')">
	<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous">
	</script>

	<script>
		// bắt sự kiện scroll xuống chuột để hiện ra để scroll về trước
		$(document).ready(function() {
			$(window).scroll(function() {
				if ($(this).scrollTop()) {
					$('#back_top').fadeIn();
				} else {
					$('#back_top').fadeOut();
				}
			});
			$('#back_top').click(function() {
				$('html,body').animate({
					scrollTop: 0
				}, 700);
			});

		});
		// file gif loading trước khi vào trang
		$(window).on('load', function() {
			$('body').removeClass('preloading');
			$('.load').delay(700).fadeOut('fast');
		});
	</script>
	<!-- ảnh gif  -->
	<div class="load">
		<img src="images/sample.gif">
		<p>Vui lòng đợi..</p>

	</div>
	<table style="height: 100%; width: 100%;">
		<!-- button scroll top -->
		<div id="back_top">
			<i class="fas fa-chevron-up"></i>

		</div>
		<div class="cart-shortcut" onclick="window.open('purchase.php','_self')">
			<i class="fa fa-cart-arrow-down"></i>
			<div class="after">
				<?php
					$user=$_SESSION['user'];
					$sql="SELECT * FROM PRODUCT WHERE user='$user'";
					
					$result=mysqli_query($con,$sql);
					if(mysqli_num_rows($result)>0){
						echo mysqli_num_rows($result);
					}
				?>
			</div>
		</div>
		<tr>

			<td>
				<table>

					<tr style="height: 10%;">
						<!-- các thông tin liên hệ trên cùng -->
						<div class="anhtren">
							<span><img src="https://icons.iconarchive.com/icons/double-j-design/apple-festival/16/app-phone-icon.png">
								<a href="tel:+0367088853">Hotline: 0367088853</a> </span><span>
								<img src="https://icons.iconarchive.com/icons/toma4025/rumax/16/mails-icon.png"><a href="mailto:lanhdaugau1605@gmail.com"> Email:
									lanhdaugau1605@gmail.com</a></span> <span>
								<img src="https://icons.iconarchive.com/icons/icons8/windows-8/16/Network-Ip-Address-icon.png">
								<a href="https://www.google.com/maps/place/Tr%C6%B0%E1%BB%9Dng+%C4%90%E1%BA%A1i+h%E1%BB%8Dc+C%C3%B4ng+ngh%E1%BB%87+Th%C3%B4ng+tin+v%C3%A0+Truy%E1%BB%81n+th%C3%B4ng+Vi%E1%BB%87t+-+H%C3%A0n/@15.9750157,108.2510434,17z/data=!3m1!4b1!4m5!3m4!1s0x3142108997dc971f:0x1295cb3d313469c9!8m2!3d15.9750106!4d108.2532374?hl=vi-VN">Địa
									điểm các cửa hàng</a> </span> <span>
								<img src="https://icons.iconarchive.com/icons/google/noto-emoji-objects/16/62894-package-icon.png">Theo
								dõi đơn hàng</span>
						</div>

					</tr>

					<tr>

						<td>


							<br>
							<!-- khung chứa thanh search -->

							<div class="menu">
								<div class="menu-item">

									<!-- tạo ra danh sách hiển thị khi hover vào  -->
									<div class="drop-down-select">
										Chọn danh mục
									</div>
									<div class="drop-down-list">
										<div class="drop-down-item" onclick="window.open('purchase.php','_self')">Sản phẩm</div>
										<div class="drop-down-item">Giỏ hàng</div>
										<div class="drop-down-item" onclick="window.open('account.php','_self')">Tài khoản</div>
									</div>



								</div>
								<!-- tìm kiếm -->
								<div class="menu-item">

									<form action="home.php" name="formSearch" method="post">
										<input type="text" name="formName" placeholder="Tìm kiếm sản phẩm....">

									</form>



								</div>
								<!-- nút tìm kiếm -->
								<div class="menu-item">

									<button type="submit" onclick="validateForm()">Tìm kiếm</button>

								</div>
							</div>


							<br>
							<div>
								<!-- Thanh menu bar -->
								<div class="topnav">

									<a class="active">Trang chủ</a>
									<a href="sanpham.html">Sản phẩm</a>
									<a href="#contact">Khuyến mãi</a>
									<a href="#about">Chăm sóc khách hàng</a>


								</div>

								<!-- <div id="account" style="text-align: right;position: relative;">
									<img style="height: 20px;margin-right: 20px;padding: 0;" src="https://cf.shopee.vn/file/ba61750a46794d8847c3f463c5e71cc4" alt="">
									<br>
								
									<div id="logout" onclick="window.open('home.html','_self')" style="width: 100px;height: 20px;border: 1px solid grey;background-color: white;position: absolute;left:89%;top: +5px;text-align: center;border-radius: 5px;display: none;">
										Đăng xuất
									</div>
									<script>
										$(document).ready(function(){
											$('#account').click(function(){
												$("#logout").fadeToggle('fast');
											})
										});
									</script>
								</div> -->
								<br>

								<!-- slide -->
								<div id="slideshow">
									<div class="slide-wrapper">
										<div class="slide"><img src="http://goldsun.vn/pic/Images/banner-we_637266855051656957.jpg" style="width: 100%;"></div>
										<div class="slide"><img src="http://goldsun.vn/pic/ProductCate/dung-cu-n_637161494633950698.jpg" style="width:
													100%;"></div>
										<div class="slide"><img src="http://goldsun.vn/pic/Service/xuatkha_637130727607711977.jpg" style="width: 100%;"></div>
									</div>
								</div>
								<br>
								<marquee class="chaychu" behavior="alternate">WEBSITE BÁN ĐỒ GIA DỤNG</marquee>
								<!-- tên loại hàng -->
								<div class="dodung">
									<div class="noichiennen">
										<div class="noichien">
											<a href="#aa">

												Nồi chiên

											</a>
										</div>
									</div>
								</div>
							</div>

							<div class="sanpham">
								<!-- sản phẩm -->
								<div id="sp1" class="bg-sanpham" style="background-image:
										url('https://bizweb.dktcdn.net/thumb/grande/100/009/443/products/a-78n.jpg?v=1567473488000');">
									<div class="content-in-sanpham">
										<p>
											Nồi chiên chân không Magic Korea
										</p>

										<p>
											699.000
										</p>
										<p class="value-product">
											ĐẶC ĐIỂM NỔI BẬT - Chế độ chiên nướng - Công nghệ Rapid Air - <br>
											Xoáy nhiệt tách dầu giảm 90% dầu thừa - Bảng điều khiển cảm ứng
											thông minh - Dung tích lớn 7L -
										</p>

									</div>
									<div class="overlay-sanpham">


										<div class="hover-search" onclick="openProduct('sp1')">
											<div class="tooltip">
												Xem thêm
												<div class="arrow down"></div>
											</div>
											<div class="search">
												<i class="fa fa-search" title="xem thêm"></i>
											</div>
										</div>

										<div class="cart">
										<form action="home.php?id=sp1" method="POST">
										<button name="addInCart"  class="cart_button_style btn-cart left-to add_to_cart" title="Cho vào giỏ hàng" onclick="addCart('sp1')">
												<span><span class="fa fa-shopping-basket"></span></span>
												Giỏ hàng
											</button>
										</form>
											
										</div>

									</div>

								</div>
								<div id="sp2" class="bg-sanpham" style="background-image:
										url('https://bizweb.dktcdn.net/thumb/grande/100/009/443/products/a-78nd.jpg?v=1567473471000');">
									<div class="content-in-sanpham">
										<p>
											Nồi chiên không dầu Iruka I-67
										</p>

										<p>
											499.000
										</p>
										<p class="value-product">
											ĐẶC ĐIỂM NỔI BẬT - Chế độ chiên nướng - Công nghệ Rapid Air - <br>
											Xoáy nhiệt tách dầu giảm 90% dầu thừa - Bảng điều khiển cảm ứng
											thông minh - Dung tích lớn 7L -
										</p>
									</div>
									<div class="overlay-sanpham">

										<div class="hover-search" onclick="openProduct('sp2')">
											<div class="tooltip">
												Xem thêm
												<div class="arrow down"></div>
											</div>
											<div class="search">
												<i class="fa fa-search" title="xem thêm"></i>
											</div>
										</div>

										<div class="cart">
											<form action="home.php?id=sp2" method="POST">
											<button name="addInCart" class="cart_button_style btn-cart left-to add_to_cart" title="Cho vào giỏ hàng" onclick="addCart('sp2')">
												<span><span class="fa fa-shopping-basket"></span></span>
												Giỏ hàng
											</button>
											</form>
										</div>
									</div>

								</div>
								<div id="sp3" class="bg-sanpham" style="background-image:
										url('https://bizweb.dktcdn.net/thumb/grande/100/009/443/products/a70nt.jpg?v=1574299791000');">
									<div class="content-in-sanpham">

										<p>
											Nồi chiên không dầu Magic Eco

										<p>
											599.000
										</p>
										<p class="value-product">
											ĐẶC ĐIỂM NỔI BẬT - Chế độ chiên nướng - Công nghệ Rapid Air - <br>
											Xoáy nhiệt tách dầu giảm 90% dầu thừa - Bảng điều khiển cảm ứng
											thông minh - Dung tích lớn 7L -
										</p>
									</div>

									<div class="overlay-sanpham">

										<div class="hover-search" onclick="openProduct('sp3')">
											<div class="tooltip">
												Xem thêm
												<div class="arrow down"></div>
											</div>
											<div class="search">
												<i class="fa fa-search" title="xem thêm"></i>
											</div>
										</div>

										<div class="cart">
										<form action="home.php?id=sp3" method="POST">
											<button name="addInCart" class="cart_button_style btn-cart left-to add_to_cart" title="Cho vào giỏ hàng" onclick="addCart('sp3')">
												<span><span class="fa fa-shopping-basket"></span></span>
												Giỏ hàng
											</button>
										</form>
										</div>
									</div>
								</div>

								<div id="sp4" class="bg-sanpham" style="background-image:
										url('https://bizweb.dktcdn.net/thumb/grande/100/009/443/products/a70nd-93eb2315-ee25-4ef1-8132-9f0c0ff16ba6.jpg?v=1567473572000');">
									<div class="content-in-sanpham">
										<p>
											Nồi chiên chân không Magic Korea
										</p>

										<p>
											399.000
										</p>
										<p class="value-product">
											ĐẶC ĐIỂM NỔI BẬT - Chế độ chiên nướng - Công nghệ Rapid Air - <br>
											Xoáy nhiệt tách dầu giảm 90% dầu thừa - Bảng điều khiển cảm ứng
											thông minh - Dung tích lớn 7L -
										</p>
									</div>
									<div class="overlay-sanpham">

										<div class="hover-search" onclick="openProduct('sp4')">
											<div class="tooltip">
												Xem thêm
												<div class="arrow down"></div>
											</div>
											<div class="search">
												<i class="fa fa-search" title="xem thêm"></i>
											</div>
										</div>

										<div class="cart">
										<form action="home.php?id=sp4" method="POST">
											<button name="addInCart" class="cart_button_style btn-cart left-to add_to_cart" title="Cho vào giỏ hàng" onclick="addCart('sp4')">
												<span><span class="fa fa-shopping-basket"></span></span>
												Giỏ hàng
											</button>
										</form>
										</div>
									</div>
								</div>

								<div id="sp5" class="bg-sanpham" style="background-image:
										url('https://bizweb.dktcdn.net/thumb/grande/100/009/443/products/i58d.jpg?v=1574299744890');">
									<div class="content-in-sanpham">
										<p>
											Nồi chiên không dầu Magic A-70
										</p>

										<p>
											899.000
										</p>
										<p class="value-product">
											ĐẶC ĐIỂM NỔI BẬT - Chế độ chiên nướng - Công nghệ Rapid Air - <br>
											Xoáy nhiệt tách dầu giảm 90% dầu thừa - Bảng điều khiển cảm ứng
											thông minh - Dung tích lớn 7L -
										</p>
									</div>
									<div class="overlay-sanpham">

										<div class="hover-search" onclick="openProduct('sp5')">
											<div class="tooltip">
												Xem thêm
												<div class="arrow down"></div>
											</div>
											<div class="search">
												<i class="fa fa-search" title="xem thêm"></i>
											</div>
										</div>

										<div class="cart">
										<form action="home.php?id=sp5" method="POST">
											<button name="addInCart" class="cart_button_style btn-cart left-to add_to_cart" title="Cho vào giỏ hàng" onclick="addCart('sp5')">
												<span><span class="fa fa-shopping-basket"></span></span>
												Giỏ hàng
											</button>
										</form>
										</div>
									</div>

								</div>
							</div>
							<br>
							<br>
							<div class="anh1" style="margin-left: +10px;">
								<div>
									<center>

										<img style="width: 1240px;" src="https://bizweb.dktcdn.net/100/009/443/themes/749376/assets/banner_full_width.png?1637374517710">
									</center>

								</div>

							</div>
							<br>
							<div class="dodung">
								<div class="noichiennen">
									<div class="noichien">
										<a href="sanpham2.html">
											Nồi cơm điện
										</a>
									</div>
								</div>
								<div class="sanpham">

									<div id="sp6" class="bg-sanpham" style="background-image:
											url('https://bizweb.dktcdn.net/thumb/grande/100/009/443/products/1-a271121a-f74c-40df-9f4b-6c4c324829fd.jpg?v=1544546311000');">
										<div class="content-in-sanpham">

											<p>
												Nồi cơm điện lòng Niêu Magic A-88
											</p>

											<p>
												999.000
											</p>
											<p class="value-product">
												ĐẶC ĐIỂM NỔI BẬT - Chế độ chiên nướng - Công nghệ Rapid Air - <br>
												Xoáy nhiệt tách dầu giảm 90% dầu thừa - Bảng điều khiển cảm ứng
												thông minh - Dung tích lớn 7L -
											</p>
										</div>
										<div class="overlay-sanpham">

											<div class="hover-search" onclick="openProduct('sp6')">
												<div class="tooltip">
													Xem thêm
													<div class="arrow down"></div>
												</div>
												<div class="search">
													<i class="fa fa-search" title="xem thêm"></i>
												</div>
											</div>

											<div class="cart">
											<form action="home.php?id=sp6" method="POST">
												<button name="addInCart" class="cart_button_style btn-cart left-to add_to_cart" title="Cho vào giỏ hàng" onclick="addCart('sp6')">
													<span><span class="fa fa-shopping-basket"></span></span>
													Giỏ hàng
												</button>
											</form>
											</div>
										</div>
									</div>
									<div id="sp7" class="bg-sanpham" style="background-image:
											url('https://bizweb.dktcdn.net/thumb/grande/100/009/443/products/1-0cbaae89-95e1-4877-9bfa-5a4d476c1943.png?v=1602829725000');">
										<div class="content-in-sanpham">

											<p>
												Nồi cơm tách đường Magic Korea
											</p>

											<p>
												990.000
											</p>
											<p class="value-product">
												ĐẶC ĐIỂM NỔI BẬT - Chế độ chiên nướng - Công nghệ Rapid Air - <br>
												Xoáy nhiệt tách dầu giảm 90% dầu thừa - Bảng điều khiển cảm ứng
												thông minh - Dung tích lớn 7L -
											</p>
										</div>
										<div class="overlay-sanpham">

											<div class="hover-search" onclick="openProduct('sp7')">
												<div class="tooltip">
													Xem thêm
													<div class="arrow down"></div>
												</div>
												<div class="search">
													<i class="fa fa-search" title="xem thêm"></i>
												</div>
											</div>

											<div class="cart">
											<form action="home.php?id=sp7" method="POST">
												<button name="addInCart" class="cart_button_style btn-cart left-to add_to_cart" title="Cho vào giỏ hàng" onclick="addCart('sp7')">
													<span><span class="fa fa-shopping-basket"></span></span>
													Giỏ hàng
												</button>
											</form>
											</div>
										</div>
									</div>
									<div id="sp8" class="bg-sanpham" style="background-image:
											url('https://bizweb.dktcdn.net/thumb/grande/100/009/443/products/a-510.png?v=1575250924000');">
										<div class="content-in-sanpham">

											<p>
												Nồi cơm tách đường Magic A-511
											</p>

											<p>
												500.000
											</p>
											<p class="value-product">
												ĐẶC ĐIỂM NỔI BẬT - Chế độ chiên nướng - Công nghệ Rapid Air - <br>
												Xoáy nhiệt tách dầu giảm 90% dầu thừa - Bảng điều khiển cảm ứng
												thông minh - Dung tích lớn 7L -
											</p>
										</div>
										<div class="overlay-sanpham">

											<div class="hover-search" onclick="openProduct('sp8')">
												<div class="tooltip">
													Xem thêm
													<div class="arrow down"></div>
												</div>
												<div class="search">
													<i class="fa fa-search" title="xem thêm"></i>
												</div>
											</div>

											<div class="cart">
											<form action="home.php?id=sp8" method="POST">
												<button name="addInCart" class="cart_button_style btn-cart left-to add_to_cart" title="Cho vào giỏ hàng" onclick="addCart('sp8')">
													<span><span class="fa fa-shopping-basket"></span></span>
													Giỏ hàng
												</button>
											</form>
											</div>
										</div>
									</div>
									<div id="sp9" class="bg-sanpham" style="background-image:
											url('https://bizweb.dktcdn.net/thumb/grande/100/009/443/products/a511-1.jpg?v=1578014650000');">
										<div class="content-in-sanpham">

											<p>
												Nồi cơm điện lòng Niêu Magic A-87
											</p>

											<p>
												490.000
											</p>
											<p class="value-product">
												ĐẶC ĐIỂM NỔI BẬT - Chế độ chiên nướng - Công nghệ Rapid Air - <br>
												Xoáy nhiệt tách dầu giảm 90% dầu thừa - Bảng điều khiển cảm ứng
												thông minh - Dung tích lớn 7L -
											</p>
										</div>
										<div class="overlay-sanpham">

											<div class="hover-search" onclick="openProduct('sp9')">
												<div class="tooltip">
													Xem thêm
													<div class="arrow down"></div>
												</div>
												<div class="search">
													<i class="fa fa-search" title="xem thêm"></i>
												</div>
											</div>

											<div class="cart">
											<form action="home.php?id=sp9" method="POST">
												<button name="addInCart" class="cart_button_style btn-cart left-to add_to_cart" title="Cho vào giỏ hàng" onclick="addCart('sp9')">
													<span><span class="fa fa-shopping-basket"></span></span>
													Giỏ hàng
												</button>
											</form>
											</div>
										</div>
									</div>
									<div id="sp10" class="bg-sanpham" style="background-image:
											url('https://bizweb.dktcdn.net/thumb/grande/100/009/443/products/noi-com-dien-long-nieu-magic-a-87-1.jpg?v=1582086125000');">
										<div class="content-in-sanpham">

											<p>
												Nồi cơm điện lòng Niêu Magic A-87
											</p>

											<p>
												700.000
											</p>
											<p class="value-product">
												ĐẶC ĐIỂM NỔI BẬT - Chế độ chiên nướng - Công nghệ Rapid Air - <br>
												Xoáy nhiệt tách dầu giảm 90% dầu thừa - Bảng điều khiển cảm ứng
												thông minh - Dung tích lớn 7L -
											</p>
										</div>
										<div class="overlay-sanpham">

											<div class="hover-search" onclick="openProduct('sp10')">
												<div class="tooltip">
													Xem thêm
													<div class="arrow down"></div>
												</div>
												<div class="search">
													<i class="fa fa-search" title="xem thêm"></i>
												</div>
											</div>

											<div class="cart">
											<form action="home.php?id=sp10" method="POST">
												<button name="addInCart" class="cart_button_style btn-cart left-to add_to_cart" title="Cho vào giỏ hàng" onclick="addCart('sp10')">
													<span><span class="fa fa-shopping-basket"></span></span>
													Giỏ hàng
												</button></form>
											</div>
										</div>
									</div>
								</div>

							</div>
							<br>
							<br>
							<div class="anhkep">
								<center>
									<a href=""><img src="https://bizweb.dktcdn.net/100/009/443/themes/749376/assets/banner_5two_1.png?1637374517710"></a>
									<a href=""><img src="https://bizweb.dktcdn.net/100/009/443/themes/749376/assets/banner_5two_2.png?1637374517710"></a>
								</center>

							</div>
							<br>
							<div class="dodung">
								<div class="noichiennen">
									<div class="noichien">
										<a href="#aa">
											Bếp điện
										</a>
									</div>
								</div>

							</div>
							<div class="sanpham1">
								<div id="sp11" class="bg-sanpham" style="background-image:
										url('https://bizweb.dktcdn.net/thumb/grande/100/009/443/products/bep-dien-tu-magic-eco-ac-220-111.png?v=1590632878000');">
									<div class="content-in-sanpham">
										<p>
											Bếp đôi Hồng ngoại và Điện từ AC
										</p>

										<p>
											1400.100
										</p>
										<p class="value-product">
											ĐẶC ĐIỂM NỔI BẬT - Chế độ chiên nướng - Công nghệ Rapid Air - <br>
											Xoáy nhiệt tách dầu giảm 90% dầu thừa - Bảng điều khiển cảm ứng
											thông minh - Dung tích lớn 7L -
										</p>
									</div>
									<div class="overlay-sanpham">

										<div class="hover-search" onclick="openProduct('sp11')">
											<div class="tooltip">
												Xem thêm
												<div class="arrow down"></div>
											</div>
											<div class="search">
												<i class="fa fa-search" title="xem thêm"></i>
											</div>
										</div>

										<div class="cart">
										<form action="home.php?id=sp11" method="POST">
											<button name="addInCart" class="cart_button_style btn-cart left-to add_to_cart" title="Cho vào giỏ hàng" onclick="addCart('sp11')">
												<span><span class="fa fa-shopping-basket"></span></span>
												Giỏ hàng
											</button>
										</form>
										</div>
									</div>
								</div>
								<div id="sp12" class="bg-sanpham" style="background-image:
										url('https://bizweb.dktcdn.net/thumb/grande/100/009/443/products/1-54f520d0-8a42-4b4f-81e2-568ff6135750.jpg?v=1605750697660');">
									<div class="content-in-sanpham">
										<p>
											Bếp đôi điện từ Magic Eco AC71
										</p>

										<p>
											1500.100
										</p>
										<p class="value-product">
											ĐẶC ĐIỂM NỔI BẬT - Chế độ chiên nướng - Công nghệ Rapid Air - <br>
											Xoáy nhiệt tách dầu giảm 90% dầu thừa - Bảng điều khiển cảm ứng
											thông minh - Dung tích lớn 7L -
										</p>
									</div>
									<div class="overlay-sanpham">

										<div class="hover-search" onclick="openProduct('sp12')">
											<div class="tooltip">
												Xem thêm
												<div class="arrow down"></div>
											</div>
											<div class="search">
												<i class="fa fa-search" title="xem thêm"></i>
											</div>
										</div>

										<div class="cart">
										<form action="home.php?id=sp12" method="POST">
											<button name="addInCart" class="cart_button_style btn-cart left-to add_to_cart" title="Cho vào giỏ hàng" onclick="addCart('sp12')">
												<span><span class="fa fa-shopping-basket"></span></span>
												Giỏ hàng
											</button>
										</form>
										</div>
									</div>
								</div>
								<div id="sp13" class="bg-sanpham" style="background-image:
										url('https://bizweb.dktcdn.net/thumb/grande/100/009/443/products/1-de5bcce2-efbe-4066-9131-9504af52826b.jpg?v=1561345784683');">
									<div class="content-in-sanpham">
										<p>
											Bếp đôi hồng ngoại điện từ Iruka I
										</p>

										<p>
											1900.100
										</p>
										<p class="value-product">
											ĐẶC ĐIỂM NỔI BẬT - Chế độ chiên nướng - Công nghệ Rapid Air - <br>
											Xoáy nhiệt tách dầu giảm 90% dầu thừa - Bảng điều khiển cảm ứng
											thông minh - Dung tích lớn 7L -
										</p>
									</div>
									<div class="overlay-sanpham">

										<div class="hover-search" onclick="openProduct('sp13')">
											<div class="tooltip">
												Xem thêm
												<div class="arrow down"></div>
											</div>
											<div class="search">
												<i class="fa fa-search" title="xem thêm"></i>
											</div>
										</div>

										<div class="cart">
										<form action="home.php?id=sp13" method="POST">
											<button name="addInCart" class="cart_button_style btn-cart left-to add_to_cart" title="Cho vào giỏ hàng" onclick="addCart('sp13')">
												<span><span class="fa fa-shopping-basket"></span></span>
												Giỏ hàng
											</button>
										</form>
										</div>
									</div>
								</div>
								<div id="sp14" class="bg-sanpham" style="background-image:
										url('https://bizweb.dktcdn.net/thumb/grande/100/009/443/products/i22-1000x1000px-01.jpg?v=1605947618000g');">
									<div class="content-in-sanpham">
										<p>
											Bếp đôi điện từ- hồng ngoại Magic
										</p>

										<p>
											2400.100
										</p>
										<p class="value-product">
											ĐẶC ĐIỂM NỔI BẬT - Chế độ chiên nướng - Công nghệ Rapid Air - <br>
											Xoáy nhiệt tách dầu giảm 90% dầu thừa - Bảng điều khiển cảm ứng
											thông minh - Dung tích lớn 7L -
										</p>
									</div>
									<div class="overlay-sanpham">

										<div class="hover-search" onclick="openProduct('sp14')">
											<div class="tooltip">
												Xem thêm
												<div class="arrow down"></div>
											</div>
											<div class="search">
												<i class="fa fa-search" title="xem thêm"></i>
											</div>
										</div>

										<div class="cart">
										<form action="home.php?id=sp14" method="POST">
											<button name="addInCart" class="cart_button_style btn-cart left-to add_to_cart" title="Cho vào giỏ hàng" onclick="addCart('sp14')">
												<span><span class="fa fa-shopping-basket"></span></span>
												Giỏ hàng
											</button>
										</form>
										</div>
									</div>
								</div>

							</div>
							<br>
							<br>
							<div class="slideshow-container">
								<div class="mySlides fade">
									<div class="numbertext">1 / 3</div>
									<img src="http://goldsun.vn/pic/Images/san-pham-_637131419009966466.jpg" style="width:100%">

								</div>

								<div class="mySlides fade">
									<div class="numbertext">2 / 3</div>
									<img src="http://goldsun.vn/pic/Images/Slide_637130725443804757.jpg" style="width:100%">

								</div>

								<div class="mySlides fade">
									<div class="numbertext">3 / 3</div>
									<img src="http://goldsun.vn/pic/ProductCate/thiet-bi-_637160882463804420.jpg" style="width:100%">

								</div>

							</div>
							<br>

							<div style="text-align:center">
								<span class="dot"></span>
								<span class="dot"></span>
								<span class="dot"></span>
							</div>
							<script>
								let slideIndex = 0;
								showSlides();

								function showSlides() {
									let i;
									let slides = document.getElementsByClassName("mySlides");
									let dots = document.getElementsByClassName("dot");
									for (i = 0; i < slides.length; i++) {
										slides[i].style.display = "none";
									}
									slideIndex++;
									if (slideIndex > slides.length) {
										slideIndex = 1
									}
									for (i = 0; i < dots.length; i++) {
										dots[i].className = dots[i].className.replace(" active", "");
									}
									slides[slideIndex - 1].style.display = "block";
									dots[slideIndex - 1].className += " active";
									setTimeout(showSlides, 2000); // Change image every 2 seconds
								}
							</script>
							<div class="dodung">
								<div class="noichiennen">
									<div class="noichien">
										<a href="#aa">

											Thương hiệu

										</a>
									</div>
								</div>
								<div class="thuonghieu">

									<span><img src="https://bizweb.dktcdn.net/100/009/443/themes/749376/assets/image_brand_4.png?1637374517710">
									</span>
									<span><img src="https://bizweb.dktcdn.net/100/009/443/themes/749376/assets/image_brand_5.png?1637374517710">
									</span>
									<span><img src="https://bizweb.dktcdn.net/100/009/443/themes/749376/assets/image_brand_6.png?1637374517710">
									</span>
									<span><img src="https://bizweb.dktcdn.net/100/009/443/themes/749376/assets/image_brand_7.png?1637374517710">
									</span>
									<span><img src="https://bizweb.dktcdn.net/100/009/443/themes/749376/assets/image_brand_8.png?1637374517710">
									</span>
									<span><img src="https://bizweb.dktcdn.net/100/009/443/themes/749376/assets/image_brand_9.png?1637374517710">
									</span>
								</div>
							</div>
							<br>

							<br>
							<div class="container-swap">
								<div class="swap-content">
									<div class="item-swap-content"><span class="fa fa-paper-plane"></span></div>
									<div class="item-swap-content">
										<p>Vận chuyển</p>
										Vận chuyển toàn quốc
									</div>
								</div>
								<div class="swap-content">
									<div class="item-swap-content"><span class="fa fa-map-marker"></span></div>
									<div class="item-swap-content">
										<p>Hoàn tiền</p>
										Khi sản phẩm lỗi
									</div>
								</div>
								<div class="swap-content">
									<div class="item-swap-content"><span class="fa fa-tag"></span></div>
									<div class="item-swap-content">
										<p>Support 24/7</p>
										Liên hệ với chúng tôi

									</div>
								</div>
								<div class="swap-content">
									<div class="item-swap-content"><span class="fa fa-life-ring"></span></div>
									<div class="item-swap-content">
										<p>Thanh toán</p>
										Thanh toán nhanh gọn
									</div>
								</div>
							</div>
							<br>
							<br>

							<div class="showroomnen">

										<div class="showroom-address">
											<div class="item-address">
												<div class="vientrenshowroom"><h2>Địa chỉ miền Nam</h2></div>
												<div class="showroom-content">
													1. Showroom Trung Sơn: Số 233A – 235 – 237 Đường 9A, KDC Trung Sơn,
													Ấp 4, Bình Hưng, Bình <br>Chánh, Tp. HCM<br><br>

													2. Big C Trường Chinh: Tầng 2, Big C Trường Chinh, Số 1 Trường
													Chinh,
													Tây Thạnh, Tân Phú,<br> Tp. HCM<br><br>

													3. Điện Máy Chợ Lớn quận 4: Chung cư H2, 196 Hoàng Diệu, Phường 8,
													Quận 4, Tp. HCM<br>

												</div>
											</div>
											<br>
											<div class="item-address">
												<div class="vientrenshowroom"><h2>Địa chỉ miền Bắc</h2></div>
												<div class="showroom-content">
													1. Showoom Hà Nội (Tầng 1): Số 109 Trung Hòa, Cầu Giấy, Hà Nội
													<br><br>
													2. Big C Thăng Long (Tầng 2): Số 222 Trần Duy Hưng - Cầu Giấy - Hà
													Nội
													<br><br>
													3. Siêu Thị Pico Nguyễn Trãi (Tầng 2): Số 76 Nguyễn Trãi, Thanh
													Xuân,
													Hà Nội
												</div>
											</div>
										</div>
										<div class="information-footer">
											<div class="content-item">
												<div class="title">Thông tin</div>
												<div class="content">
													<p>Trang chủ</p>
													<p>Sản phẩm</p>
													<p>Showroom</p>
												</div>
											</div>
											<div class="content-item">
												<div class="title">Chính sách</div>
												<div class="content">
													<p>Chính sách bảo hành</p>
													<p>Điều khoản sử dụng </p>
													<p>Chính sách bảo mật</p>
													<p>Phươn thức giao hàng</p>
													<p>Chính sách trả hàng</p>
												</div>
											</div>
											<div class="content-item">
												<div class="title">Liên hệ</div>
												<div class="content">
													<p>Ngũ Hành Sơn, Đà Nẵng, Việt Nam</p>
													<p>0367123123</p>
													<p>Bảo hành 028 7106 5858 - 028 5431 8607</p>

												</div>
											</div>
											<div class="content-item">
												<div class="title">Fanage</div>
												<div class="fanpage">
													<div class="logo">
														<img src="images/icon.jpg" alt="">
													</div>
													<div class="access-fanpage">
														<p>CÔNG TY BÁN ĐỒ GIA DỤNG</p>
														<button><i class="fa fa-facebook-f"></i><span>Facebook</span></button>
														<span>100k lượt thích</span>
													</div>
												</div>

											</div>
										</div>


										<hr style="width: 100%;text-align: center;">
										<div style="text-align:center;position: absolute;top: +750px;">
											TRANG CHỦ &#10072; SẢN PHẨM &#10072; BLOG &#10072; KHUYẾN MẠI
											&#10072;
											SHOWROOM
											<br>
											Với tiêu chí "Hài Lòng Khách Đến - Vừa Lòng Khách Đi" chúng tôi luôn
											mong muốn mang lại dịch vụ tiện ích nhất cho khách hàng với chi phí
											rẻ
											nhất, tốt nhất. Cảm ơn quý khách hàng đã đồng hành cùng chúng tôi
											trong thời gian qua.
										</div>
									</div>


							</div>



							</div>


							</div>
							</div>

		</tr>
	</table>
	<div class="overlay">
		<div class="overlay-coating">
			<div class="content-each-product">

				<button onclick="closeProduct()">
					<i class="gg-close"></i>
				</button>
				<div class="detail">
					<div class="product-detail">

					</div>
					<div class="information">
						<div class="information-product">

						</div>
						<br>
						<hr style="width: 80%;margin: auto;">
						<br>
						<div class="price-product"></div>
						<br>
						<hr style="width: 80%;margin: auto;">
						<br>
						<span class="fa fa-star checked"></span>
						<span class="fa fa-star checked"></span>
						<span class="fa fa-star checked"></span>
						<span class="fa fa-star checked"></span>
						<span class="fa fa-star checked"></span>
						<br>
						<br>
						<div class="value">

						</div>
						<br>
						<br>
						<div class="stocking">
							Còn hàng
							<div class="tooltip" onclick="more()">
								Thêm vào giỏ vàng
							</div>
						</div>
						<div class="favorite-product">
							<br>
							<br>
							<span style="margin-top: -200px;">
								Thêm vào sản phẩm yêu thích
							</span>
							<span class="fa fa-heart" onclick="changeColor()">

							</span>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

	<div class="overlay-cart">
		<div class="overlay-coating">
			<div class="content-each-product">

				<button onclick="closeProduct()">
					<i class="gg-close"></i>
				</button>
				<div class="product-selected">
					<div class="information-selected">
						<i class="fa fa-check"></i>
						<span></span>
					</div>


				</div>
				<div class="content-product-cart">
					<p style="font-size: 35px;">
						Giỏ hàng của bạn
					</p>
					<br>
					<div class="thead-popup">
						<div style="width: 50%;">Sản phẩm</div>
						<div style="width: 15%;">Giá</div>
						<div style="width: 20%;">Số lượng</div>
						<div style="width: 15%;">Tổng tiền</div>
					</div>
					<div class="content-product">
						<div class="item-popup">
							<div class="product-image">

							</div>
							<div class="inf">

							</div>
							<div class="price">

							</div>
							<div class="quantity">
								<input type="number" min="0" value="1" id="quantity-to-count" step="any">
							</div>
							<div class="total-money">

							</div>
						</div>
					</div>
					<div class="payment-total">
						<span>
							Tổng thành tiền:
						</span>
						<span class="need-pay">

						</span>
						<br>
						<div class="button-pay" onclick="window.open('purchase.php','_self')">
							<a class="button btn-proceed-checkout" title="Đi đến giỏ hàng"><span>Tiến
									hành thanh toán</span></a>
						</div>

					</div>
				</div>


			</div>
		</div>
	</div>

</body>

</html>