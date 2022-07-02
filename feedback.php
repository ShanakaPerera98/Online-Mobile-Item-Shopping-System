<?php require_once('connection.php');?>
<?php require_once('reviews.php');?>
<!doctype html>
<html lang="en">
  <head>
    <title>Princess Mobile</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="feedback.css">
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

    <!-- Feedback======================================================================= -->
    <div class="container">
      <br>
      <h3 class="text-left topic">What do you think about us ?</h3>
      <hr>
      <div class="text-center for">
          <br>
          <br>

          <form action="" method="post">
 

                  <div class="text-center">
                      <div class="custom-control custom-radio custom-control-inline">
                          <input type="radio" id="customRadioInline1" name="f_type" class="custom-control-input" value="excellent">
                          <label class="custom-control-label" for="customRadioInline1">Excellent</label>
                      </div>
                      <div class="custom-control custom-radio custom-control-inline">
                          <input type="radio" id="customRadioInline2" name="f_type" class="custom-control-input" value="good">
                          <label class="custom-control-label" for="customRadioInline2">Good</label>
                      </div>
                      <div class="custom-control custom-radio custom-control-inline">
                          <input type="radio" id="customRadioInline3" name="f_type" class="custom-control-input" value="fair">
                          <label class="custom-control-label" for="customRadioInline3">Fair</label>
                      </div>
                      <div class="custom-control custom-radio custom-control-inline">
                          <input type="radio" id="customRadioInline4" name="f_type" class="custom-control-input" value="bad">
                          <label class="custom-control-label" for="customRadioInline4">Bad</label>
                      </div>
                      <div class="custom-control custom-radio custom-control-inline">
                          <input type="radio" id="customRadioInline5" name="f_type" class="custom-control-input" value="very bad">
                          <label class="custom-control-label" for="customRadioInline5">Very Bad</label>
                      </div>
                  </div>

                <br>
                <br>

              <div class="form-group">
              <label for="exampleFormControlTextarea1">Your Comment</label>
              <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="f_des"></textarea>
              </div>

              <br>

              <button type="submit" class="submitbtn" name="submit">Submit</button>

              <br>

          </form>
      </div>
  </div>
  <!-- End of Feedback======================================================================= -->

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