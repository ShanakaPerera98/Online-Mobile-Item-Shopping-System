<?php require_once('connection.php');
session_start();
?>
<?php require_once('cart_p.php');?>
<?php require_once('wishlist_p.php');?>

<!doctype html>
<html lang="en">
  <head>
    <title>Princess Mobile</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="item.css">
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
            <a href="index.php" class="nav-link">Home</a></li>

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
            <li class="nav-item"><a href="index.php#about" class="nav-link">About</a></li>
            <li class="nav-item"><a href="index.php#footer" class="nav-link">Contact</a></li>
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
    <hr style="height:1px; background-color:#008A86">
    <!-- End of Navigation Bar======================================================================= -->
    <?php 
                    
                    $i_id = $_GET['i_id'];
                    $query = "SELECT * FROM item where i_id = '$i_id'";
                    $result = mysqli_query($connection,$query);
                    $row = mysqli_fetch_assoc($result);

                    ?>        
    <div class="container mt-5">
        <div class="row">
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" style="width: 400px;">
              <div class="carousel-inner">
              
                    <?php
                    $filenames = explode(",", $row['image']);
                    foreach($filenames as $i =>$key){ 
                      
                      ?>
                <div class="carousel-item <?php if($i==0){ echo 'active'; } ?>"> <img class="d-block w-100" src="Admin/upload/server/uploads/<?php echo trim($filenames[$i]);?>" alt="First slide"> </div>
                <?php } ?>
              </div>
              
              <?php if($i>0){?>
              <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev"> 
                <span class="carousel-control-prev-icon" aria-hidden="true">
                </span> 
                <span class="sr-only">Previous</span> </a> 
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next"> 
                  <span class="carousel-control-next-icon" aria-hidden="true"></span> 
                  <span class="sr-only">Next</span> </a>
                  <?php } ?>
                </div>
                  
          </div>
          <div class="col-md-6">
            <div class="row">
              <h2><?php echo $row['i_name']; ?></h2>
            </div>
            <div class="row" style="margin-top: 20px;">
              <h5 style="color: #008A86;">LKR. <?php echo $row['i_price']; ?></h5>
              &nbsp; &nbsp;
              <!-- <h5><del>Rs.150,000.00</del></h5> -->
              <!-- &nbsp; &nbsp;
              <h4 class="text-success">-                     %</h4> -->
            </div>

            <div class="row" style="margin-top: 30px;">
              <p><?php echo $row['i_des']; ?></p>
            </div>

            <div class="row mt-4">
              <h4>Color: &nbsp; &nbsp;</h4>

              <?php 
              $colors = explode(",", $row['color']);
              foreach($colors as $i =>$key){ ?>
              <button type="button" class="btn-c1" style="background-color: <?php echo trim($colors[$i]);?>; border-color:<?php echo trim($colors[$i]);?>;" ></button>
              <?php } ?>

              </p>
              
            </div>
            <form action="" method="post">
            <div class="row mt-4">
                <div class = "purchase-info">
                    <input type = "number" min = "0" value = "1" name="qty">

                    <input type="hidden" name="pid" value="<?php echo $row['i_id']; ?>">

                    <button type = "submit" class = "btncart" name="submit_to_cart">
                      Add to Cart <i class = "fas fa-shopping-cart"></i>
                    </button>
                    <button type = "submit" class = "btn" name="submit_to_wishlist"><i class="fa fa-heart"></i></button>
                  </div>
            </div>

            </form>
            
            
          </div>
        </div>
      </div>
    

    
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  
  
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

            <!-- <script src="sweetalert.js"></script> -->
    <?php
            if(isset($_SESSION['status']) && $_SESSION['status'] !='')
            {
            ?>
            <script>
                    swal({
                title: "<?php echo $_SESSION['status']; ?>",
                text: "<?php echo $_SESSION['status_text']; ?>",
                icon: "<?php echo $_SESSION['status_code']; ?>",
                button: "OK",
                });
                </script>
            <?php
            unset($_SESSION['status']);
            }
            ?>
  
  
  </body>
</html>