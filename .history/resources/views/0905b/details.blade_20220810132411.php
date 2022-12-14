<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Free Cars-Online Website Template | Specials :: w3layouts</title>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href='//fonts.googleapis.com/css?family=Playball' rel='stylesheet' type='text/css'>   
</head>
<body>
<div class="header-bg">
	<div class="wrap"> 
		<div class="h-bg">
			<div class="total">
				<div class="header">
					<div class="box_header_user_menu">
						<ul class="user_menu">
                            {{-- <li class="act first"><a href="#"><div class="button-t"><span>Shipping &amp; Returns</span></div></a></li> --}}
                            {{-- <li class=""><a href="#"><div class="button-t"><span>Advanced Search</span></div></a></li> --}}
                            <li class=""><a href="{{url('register')}}"><div class="button-t"><span>Create an Account</span></div></a></li>
                            <li class="last"><a href="{{url('login')}}"><div class="button-t"><span>Log in</span></div></a></li></ul>
					</div>
					<div class="header-right">
						<ul class="follow_icon">
							<li><a href="#"><img src="images/icon.png" alt=""/></a></li>
							<li><a href="#"><img src="images/icon1.png" alt=""/></a></li>
							<li><a href="#"><img src="images/icon2.png" alt=""/></a></li>
							<li><a href="#"><img src="images/icon3.png" alt=""/></a></li>
						</ul>
					</div><div class="clear"></div> 
					<div class="header-bot">
						<div class="logo">
							<a href="index.html"><img src="images/logo.png" alt=""/></a>
						</div>
						<div class="search">
						    <input type="text" class="textbox" value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}">
						    <button class="gray-button"><span>Search</span></button>
				       </div>
					<div class="clear"></div> 
				</div>		
		</div>	
		<div class="menu"> 	
			<div class="top-nav"> 
					<ul>
						<li><a href="{{url('/')}}">Home</a></li>
						<li><a href="{{url('about')}}">About</a></li>
						<li class="active"><a href="{{url('cars')}}">Motorcycle</a></li>
						{{-- <li><a href="new.html">New</a></li> --}}
						<li><a href="{{url('contact')}}">Contact</a></li>
					</ul>
					<div class="clear"></div> 
				</div>
		</div>
		<div class="banner-top">
			<div class="header-bottom">
				 <div class="header_bottom_right_images">
				     	
		  			<div class="content-wrapper">		  
						<div class="content-top">
							  	<div class="about_wrapper"><h1>Specials</h1>
								</div>
							 <div class="text"> 	
								<div class="grid_1_of_3 images_1_of_3">
									<div class="grid_1">
										<a href="{{url('details')}}" title="{{$data->producerDetails}}">
                                        <figure>
                                            <img src="images/products/{{$data->productImage1}}" style="height: 300px, width: 300px;"/> 
                                        </figure>
                                        </a>
											<div class="grid_desc">
												<p class="title">{{$data->productName}}</p>
												
													 <div class="price" style="height: 19px;">
														<p></p>
													 	 <span class="reducedfrom">600$</span>
								        				<span class="actual">Price: {{$data->productPrice}}</span>
													</div>
													<div class="cart-button">
														<div class="cart">
															<h3><a href="{{url('cars')}}">Back</a></h3>
														</div>
														<button class="button"><span>Cart</span></button>
													<div class="clear"></div>
												</div>
											</div>
								</div><div class="clear"></div>
							</div>
									
	</div><div class="clear"></div>
		<div class="footer-bottom">
			<div class="copy">
				<p>&copy 2022 Motorcycle Teams Online . All rights Reserved | Design by <a href="http://w3layouts.com">Motorcycle Teams</a></p>
			</div>
		</div>
</div>
</div>
</div>
</div>
</div>
</div>
</body>
</html>

    	
    	
            