<?php require_once('connection.php');
session_start();
?>
<?php require_once('place_order_p.php');?>
<!doctype html>
<html lang="en">
  <head>
    <title>Princess Mobile</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="place_order.css">
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

    <div class="container">
      <h2 class="topic">Place Order</h2>
      <hr>
      
    <!-- order======================================================================= -->
    <!--Section: Block Content-->
        <section>

          <!--Grid row-->
          <div class="row">

            <!--Grid column-->
            <div class="col-lg-8 mb-4">

              <!-- Card -->
              <div class="card wish-list pb-1">
                <div class="card-body">

                  <h5 class="mb-2">Billing Details</h5>
                  <br>


                  <form action="" method="post">
                    
                  <?php if(isset($_SESSION['c_email'])){
                            $email = $_SESSION['c_email'];
                            $query = "SELECT * FROM customer WHERE c_email = '$email'";
                            $result = mysqli_query($connection,$query);
                            $row = mysqli_fetch_array($result);
                            ?>


                  <!-- Grid row -->

                  <!-- <div class="md-form md-outline my-0">
                    <label for="companyName">Enter your NIC Number</label>
                    <input type="number" class="form-control mb-0" placeholder="National identity card"  required>
                  </div>

                  <br> -->


                  <div class="row">
                    
                  <div class="col-lg-6">
                      <div class="md-form md-outline mb-0 mb-lg-4">
                        <label for="firstName">First name</label>
                        <input type="text" id="firstName" class="form-control mb-0 mb-lg-2" placeholder="First Name" value="<?php echo $row['c_fname']; ?>" required>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="md-form md-outline">
                        <label for="lastName">Last name</label>
                        <input type="text" id="lastName" class="form-control" placeholder="Last Name" value="<?php echo $row['c_lname']; ?>" required>
                      </div>
                    </div>
                  </div>
                  
                  <!-- Grid row -->

                  <div class="md-form md-outline my-0">
                    <label for="companyName">Telephone</label>
                    <input type="number" id="companyName" class="form-control mb-0" placeholder="Telephone" value="<?php echo $row['c_telephone']; ?>" required>
                  </div>

                  <br>

                  <div class="md-form md-outline my-0">
                    <label for="companyName">Email Address</label>
                    <input type="email" id="companyName" class="form-control mb-0" placeholder="Email Address" name="email" value="<?php echo $row['c_email']; ?>" required>
                  </div>

                  <br>

                  <div class="md-form md-outline mt-0">
                    <label for="form14">Address - Street</label>
                    <input type="text" id="form14" placeholder="Street" class="form-control" value="<?php echo $row['c_add_street']; ?>" required>
                  </div>

                  <br>

                  <div class="md-form md-outline">
                    <label for="form15">City</label>
                    <input type="text" id="form15" placeholder="City"
                      class="form-control" value="<?php echo $row['c_add_town']; ?>" required>
                  </div>

                  <br>

                  <div class="md-form md-outline">
                    <label for="form16">Postal Code</label>
                    <input type="text" id="form16" class="form-control" placeholder="Postal Code" value="<?php echo $row['c_add_postal']; ?>" required>
                  </div>

                  <br>

                  <div class="md-form md-outline mt-0">
                    <input type="checkbox" data-toggle="collapse" data-target="#collapseExample">
                      <label class="form-check-label" for="flexCheckDefault">Change delivery address</label>
                  
                      <div class="collapse" id="collapseExample">
                      <br>
                      <div class="md-form md-outline mt-0">
                        <label>Address - Street</label>
                        <input type="text" id="form14" class="form-control" name="addstreet">
                      </div>
                        <br>

                        <div class="md-form md-outline mt-0">
                          <label>City</label>
                          <input type="text" id="form14" class="form-control" name="addcity">
                        </div>
                        <br>

                        <div class="md-form md-outline mt-0">
                          <label>Postal Code</label>
                          <input type="text" id="form14" class="form-control" name="addpostal">
                        </div>
                        <br>

                      </div>
                  </div>

                    <br>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="ship" value="Pick up from shop" required>
                        <label class="form-check-label" for="exampleRadios1">Pick up from shop</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="ship" value="Delivery" required>
                      <label class="form-check-label" for="exampleRadios2">Delivery</label>
                    </div>


                  <?php }?>
                  <br>

                  <!-- <h6 class="mb-2">Shippinng Method</h6>

                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                    <label class="form-check-label" for="exampleRadios1">
                       Delivery
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                    <label class="form-check-label" for="exampleRadios2">
                    Cash on delivery
                    </label>
                  </div> -->


                </div>
                
              </div>
              <!-- Card -->

            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-lg-4">

              <!-- Card -->
              <div class="card mb-4">
                <div class="card-body">

                  <div class="col-md-5"></div>
                    <div class="card border-0 ">
                      <h5 class="mb-2">Order Summary</h5>



                      <br>

                        <div class="card-body pt-0">



                        <?php 
                $count= 0;
                $total = 0;
                $cusid = $_SESSION['cid'];
                $query = "SELECT * FROM cart inner join item on cart.i_id = item.i_id WHERE cart.c_id = '$cusid' ";
                $result = mysqli_query($connection,$query);

                while($row = mysqli_fetch_array($result)){
                $count++;
                $total = $total + ($row['i_price'] * $row['qty']);
                $filenames = explode(",", $row['image']);
                ?>

                <input type="hidden" name="pid[]" value="<?php echo $row['i_id']; ?>">
                <input type="hidden" name="qty[]" value="<?php echo $row['qty']; ?>">
                            
                

                <input type="hidden" name="items" value="<?php echo $count; ?> Items"><br>
                <input type="hidden" name="currency" value="LKR">
                <input type="hidden" name="amount" value="<?php echo $total; ?>">




                            <div class="row justify-content-between">
                                <div class="col-auto col-md-7">
                                    <div class="media flex-column flex-sm-row"> <img class=" img-fluid" src="Admin/upload/server/uploads/<?php echo $filenames[0];?>" width="62" height="62">
                                        <div class="media-body my-auto">
                                            <div class="row ">
                                                <div class="col-auto">
                                                <p class="mb-0"><b><?php echo $row['i_name']?></b></p><small name="color" class="text-muted"><?php echo $row['color']?></small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class=" pl-0 flex-sm-col col-auto my-auto">
                                    <p><small class="text-muted"><?php echo $row['qty']?></small></p>
                                </div>
                                
                                <div class=" pl-0 flex-sm-col col-auto my-auto ">
                                    <p><b><?php echo ($row['i_price'] * $row['qty']); ?></b></p>
                                </div>
                            </div>
                            <hr class="my-2">
                            <?php }?>

                            <div class="row ">
                                <div class="col">
                                    <!-- <div class="row justify-content-between">
                                        <div class="col">
                                            <p class="mb-1"><b>Delivery</b></p>
                                        </div>
                                        <div class="flex-sm-col col-auto">
                                            <p class="mb-1"><b>Rs.300.00</b></p>
                                        </div>
                                    </div> -->
                                    <div class="row justify-content-between">
                                        <div class="col-4">
                                            <p><b>Total</b></p>
                                        </div>
                                        <div class="flex-sm-col col-auto">
                                            <p class="mb-1"><b>Rs. <?php echo $total;?></b></p>
                                        </div>
                                    </div>
                                    <hr class="my-0">
                                </div>
                            </div>

                            
                            <div class="orderbutton">
                              <div class="obtn"> <button type="submit" name="submit" class="placeorderbtn">PLACE ORDER</button> </div>
                          </div>
                          </form>
                        </div>
                    </div>
                </div>
              <!-- Card -->

            </div>
            <!--Grid column-->

          </div>
          <!--Grid row-->

        </section>
      </div>
<!--Section: Block Content-->
<!-- End of order======================================================================= -->



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
<?php mysqli_close($connection);?>