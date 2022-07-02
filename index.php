<?php require_once('connection.php');?>
<?php require_once('reviews.php');?>
<!doctype html>
<html lang="en">
  <head>
    <title>Princess Mobile</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="main.css">
    <script src="https://kit.fontawesome.com/332a215f17.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    
    <!-- Navigation Bar======================================================================= -->
    <nav class="navbar navbar-expand-lg" id="my-navbar">
	    <div class="container">
	      <a class="navbar-brand font-weight-bold brand-color" href="index.php"><img src="image/logo1.png" width="180px" alt=""></a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" 
		 data-target="#my-nav" aria-controls="my-nav" aria-expanded="false" 
		 aria-label="Toggle navigation">
	        <span > Menu</span>
	      </button>

	      <div class="collapse navbar-collapse" id="my-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item">
            <a href="index.php" class="nav-link active">Home</a></li>

	        <!-- Dropdown List -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Shop</a>
                    <div class="dropdown-menu">
                    <?php
                require_once('connection.php');

            	$query = "SELECT * FROM category";
                $result = mysqli_query($connection,$query); 
                while($row = mysqli_fetch_array($result)){?>
                <a class="dropdown-item" href="accessories.php?mcategory=<?php echo $row['cat_id']; ?>"><?php echo $row['cat_name']; ?></a>
                <?php } ?>
                         
                         
                    </div>
             </li>
            
	          <li class="nav-item"><a href="repair.php" class="nav-link">Repairing</a></li>
			  <li class="nav-item"><a href="#about" class="nav-link">About</a></li>
              <li class="nav-item"><a href="#footer" class="nav-link">Contact</a></li>
              <li class="nav-item"><a href="wishlist.php" class="nav-link">Wishlist</a></li>
			    <li class=" d-none d-xl-block">					
			    
                    <li class="nav-item"><a href="cart.php" class="nav-link">
                    <i class="fas fa-shopping-cart"></i></a></li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown"> <i class="fa fa-user" aria-hidden="true"></i> </a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="account.php">Account</a>
                                    <a class="dropdown-item" href="myorder.php">My Orders</a>
                                    <hr style="height:1px; background-color:#008A86">
                                    <a class="dropdown-item" href="login.php">Login</a>
                                    <a class="dropdown-item" href="logout.php">Logout</a>
                                </div>
                        </li>
                </li>
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- End of Navigation Bar======================================================================= -->

    <!-- Slide Images===================================================================== -->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block w-100" src="image/back1.png" alt="First slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="image/back2.png" alt="Second slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="image/back3.png" alt="Third slide">
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
      <!-- End of Slide Images===================================================================== -->
        <br>
        <br>
      <!-- Hot Deal Section===================================================================== -->
        <div class="container">
            <!-- <h3 class="h3">Hot Deal</h3>
            <br>
            <br>
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="product-grid4">
                        <div class="product-image4">
                            <a href="#">
                                <img class="pic-1" src="image/m1.jpg">
                                <img class="pic-2" src="image/m2.jpg">
                            </a>
                            <ul class="social">
                                <li><a href="item.php" data-tip="Quick View"><i class="fa fa-eye"></i></a></li>
                                <li><a href="#" data-tip="Add to Wishlist"><i class="fa fa-shopping-bag"></i></a></li>
                                <li><a href="#" data-tip="Add to Cart"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                            <span class="product-new-label">New</span>
                            <span class="product-discount-label">-10%</span>
                        </div>
                        <div class="product-content">
                            <h3 class="title"><a href="#">Apple Iphone 12</a></h3>
                            <div class="price">
                                Rs.125,000.00
                                <span>Rs.150,000.00</span>
                            </div>
                            <a class="add-to-cart" href="">ADD TO CART</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="product-grid4">
                        <div class="product-image4">
                            <a href="#">
                                <img class="pic-1" src="image/xiaomi/m1.jpg">
                                <img class="pic-2" src="image/xiaomi/m1-back.jpg">
                            </a>
                            <ul class="social">
                                <li><a href="#" data-tip="Quick View"><i class="fa fa-eye"></i></a></li>
                                <li><a href="#" data-tip="Add to Wishlist"><i class="fa fa-shopping-bag"></i></a></li>
                                <li><a href="#" data-tip="Add to Cart"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                            
                        </div>
                        <div class="product-content">
                            <h3 class="title"><a href="#">Xiaomi Redmi 9 4GB RAM 64GB</a></h3>
                            <div class="price">
                            Rs.30,999.00
                        
                            </div>
                            <a class="add-to-cart" href="">ADD TO CART</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="product-grid4">
                        <div class="product-image4">
                            <a href="#">
                                <img class="pic-1" src="image/xiaomi/m2.jpg">
                                <img class="pic-2" src="image/xiaomi/m2-back.jpg">
                            </a>
                            <ul class="social">
                                <li><a href="#" data-tip="Quick View"><i class="fa fa-eye"></i></a></li>
                                <li><a href="#" data-tip="Add to Wishlist"><i class="fa fa-shopping-bag"></i></a></li>
                                <li><a href="#" data-tip="Add to Cart"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                            <span class="product-new-label">New</span>
                            <span class="product-discount-label">-10%</span>
                        </div>
                        <div class="product-content">
                            <h3 class="title"><a href="#">Xiaomi Redmi Note 10 Pro 8GB RAM 128GB</a></h3>
                            <div class="price">
                            Rs.57,999.00
                                <span>Rs.60,000.00</span>
                            </div>
                            <a class="add-to-cart" href="">ADD TO CART</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="product-grid4">
                        <div class="product-image4">
                            <a href="#">
                                <img class="pic-1" src="image/xiaomi/m3.jpg">
                                <img class="pic-2" src="image/xiaomi/m3-back.jpg">
                            </a>
                            <ul class="social">
                                <li><a href="#" data-tip="Quick View"><i class="fa fa-eye"></i></a></li>
                                <li><a href="#" data-tip="Add to Wishlist"><i class="fa fa-shopping-bag"></i></a></li>
                                <li><a href="#" data-tip="Add to Cart"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                            <span class="product-new-label">New</span>
                            <span class="product-discount-label">-10%</span>
                        </div>
                        <div class="product-content">
                            <h3 class="title"><a href="#">Xiaomi Redmi 9A 2GB RAM 32GB</a></h3>
                            <div class="price">
                            Rs.20,000.00
                                <span>Rs.22,000.00</span>
                            </div>
                            <a class="add-to-cart" href="">ADD TO CART</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr> -->
    <!-- End of Hot Deal Section===================================================================== -->
    <br>
    <!-- New Arrivels Section===================================================================== -->
    <div class="container">
        <h3 class="h3">New Arrivals</h3>
        <br>
        <br>
        <div class="row">


        <?php  
        $query = "SELECT * FROM item ORDER BY i_id DESC LIMIT 12";
        $result = mysqli_query($connection,$query);
        while($row = mysqli_fetch_array($result)){


         $filenames = explode(",", $row['image']);
        ?>
            <div class="col-md-3 col-sm-6">
                <div class="product-grid4">
                    <div class="product-image4">
                        <a href="item.php?i_id=<?php echo $row['i_id']; ?>">
                            <img class="pic-1" src="Admin/upload/server/uploads/<?php echo $filenames[0];?>">
                            <img class="pic-2" src="Admin/upload/server/uploads/<?php echo $filenames[0];?>">
                        </a>
                        <!-- <ul class="social">
                            <li><a href="item.php?i_id=                          " data-tip="More Details"><i class="fa fa-eye"></i></a></li>
                            <li><a href="#" data-tip="Add to Wishlist"><i class="fa fa-heart"></i></a></li>
                            <li><a href="#" data-tip="Add to Cart"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul> -->
                        <!-- <span class="product-new-label">New</span> -->
                        
                    </div>
                    <div class="product-content">
                        <h3 class="title"><?php echo $row['i_name']?></h3>
                        <div class="price">
                            <p>LKR: <?php echo $row['i_price']?></p>
                        </div>
                        <a class="add-to-cart" href="item.php?i_id=<?php echo $row['i_id']; ?>">VIEW</a>
                    </div>
                </div>
            </div>
            <?php } ?>


        </div>
    </div>
    <hr>
<!-- End of New Arrivels Section===================================================================== -->

<!-- Feedback View===================================================================== -->
<div class="container">
    <h3 class="h3 text-center">What our customers are saying about us</h3>
<div class="wrapper">
    <div class="carousel slide" id="mySlider" data-ride="carousel" data-interval="4000" data-pause="hover">
    
        <ol class="carousel-indicators">
            <li data-target="#mySlider" data-slide-to="0" class="active"></li>
            <li data-target="#mySlider" data-slide-to="1"></li>
            <li data-target="#mySlider" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner text-white">
        <?php 
                      $no = 0;
                    //   $fname =  $_SESSION['fname'];
                    //  $lname =  $_SESSION['lname'];
                    	$query = "SELECT * FROM feedback inner join customer on feedback.c_id = customer.c_id";
                      $result = mysqli_query($connection,$query);
                      while($row = mysqli_fetch_array($result)){
                      $no++;
                    ?>
            <div class="carousel-item <?php if($no==1){ echo 'active'; }?>">
                <div class="content">
                    <div class="employee">
                        <div class="h4 text-uppercase"><?php echo $row['c_fname']." ".$row['c_lname']; ?></div>
                        <div class="h6 text-mute"><?php echo $row['f_type']; ?></div>
                    </div>
                    <div class="testimonial bg-white text-dark"> <span class="fas fa-quote-left"></span>
                        <div class="text-justify"><?php echo $row['f_des']; ?></div> 
                        <span class="fas fa-quote-right"></span>
                    </div>
                </div>
            </div>
            <?php }?>
            
        </div>
    </div>
</div>
</div>
<div class="text-center">
<a href="feedback.php">
<button class="feedbackbtn">What do you think</button>
</a>
</div>
</div>
<!-- End of Feedback View===================================================================== -->

<!-- About section===================================================================== -->
<div class="container">
<div class="col text-center">
    <div class="desc" id="about">
      
        <h3 class="h3">About Us</h3>
     <p>
     Princess Mobile was started in 2015, Our customers are youthful, 
     fashionable and passionate about technology, and as a result we sell 
     only the latest and greatest mobile phones across all major brands.  
     We cover mobile phone accessories of all kinds.
     </p>
    </div>
   </div>
</div>
<!-- End of About section===================================================================== -->

<!-- Footer ===================================================================== -->
<div class="mt-5 pt-5 pb-5 footer" id="footer">
    <div class="container">
      <div class="row">
        <div class="col-lg-5 col-xs-12 about-company">
          <img src="image/logo2.png" alt="">
          <hr style="height:1px; width: 300px; margin-left: 0; background-color:#008A86">
          <!--<p class="pr"> </p>-->
        </div>
        <div class="col-lg-3 col-xs-12 links">
          <h4 class="mt-lg-0 mt-sm-3">Quick Links</h4>
            <ul class="m-0 p-0">
            <?php
                require_once('connection.php');

            	$query = "SELECT * FROM category";
                $result = mysqli_query($connection,$query); 
                while($row = mysqli_fetch_array($result)){?>
                    <li><a href="accessories.php?mcategory=<?php echo $row['cat_id']; ?>"><?php echo $row['cat_name']; ?></a></li><br>
                    <?php } ?>
            </ul>
        </div>
        <div class="col-lg-4 col-xs-12 location">
          <h4 class="mt-lg-0 mt-sm-4">Location</h4>
          <p>143/7/A Dalupitiya road, Mahara Kadawatha</p>
          <p class="mb-0"><i class="fa fa-phone mr-3"></i>+94 777063323 | +94 755856878</p>
          <p class="mb-0"><i class="fa fa-envelope-o mr-3"></i>princessmobile21@gmail.com</p>
        </div>
      </div>
      <div class="row mt-5">
        <div class="col copyright">
          <p class=""><small class="text-white-50">© 2021. All Rights Reserved. Princess Mobile</small></p>
        </div>
      </div>
    </div>
</div>
    <!-- End of Footer ===================================================================== -->


      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
<?php mysqli_close($connection);?>