<?php require_once('connection.php');
session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Princess Mobile</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="account.css">
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
                            <a class="nav-link active dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown"> <i class="fa fa-user" aria-hidden="true"></i> </a>
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


    <section class="mt-5">
        <div class="container">


        <h3 class="h3">My order Details</h3>
        <br>


            <form action="" method="post">
            <div class="cart">
            <div class="table-responsive">
                <table class="table">
                    <thead style="background: #505050;">
                        <tr>
                            <th scope="col"class="text-white">Product</th>
                            <th scope="col"class="text-white">Price</th>
                            <th scope="col"class="text-white">Quantity</th>
                            <th scope="col"class="text-white">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $subtotal = 0;
                    $total = 0;

                      if(isset($_SESSION['cid'])){

                      $cid = $_SESSION['cid'];

                      $query = "SELECT * FROM orders WHERE c_id = '$cid' AND status != 'success' ";
                      $result = mysqli_query($connection,$query);

                      if(mysqli_num_rows($result) > 0){

                      while($row = mysqli_fetch_array($result)){

                        $products = explode("," , $row['i_id']);
                        $qtys = explode("," , $row['qty']);

                        for($i = 0;$i<count($products);$i++){
                        
                            $query2 = "SELECT * FROM item WHERE i_id = '$products[$i]' ";
                            $result2 = mysqli_query($connection,$query2);

                            $row2 = mysqli_fetch_assoc($result2);

                            $filenames = explode(",", $row2['image']);
                    ?>
                        <tr>
                            <td>
                                <div class="main">
                                    <div class="d-flex">
                                        <img src="Admin/upload/server/uploads/<?php echo $filenames[0];?>" width="60px">
                                    </div>
                                    <div class="des">
                                        <p><?php echo $row2['i_name']; ?></p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <h6><?php echo $row2['i_price']; ?></h6>
                            </td>
                            <td>
                            <h6><?php echo $qtys[$i]; ?></h6>
                            </td>
                            <td>
                                <h6>Rs:<?php echo ($row2['i_price'] * $qtys[$i]); ?></h6>
                                <?php $subtotal = $subtotal + ($row2['i_price'] * $qtys[$i]); ?>
                                <?php $total = $total + ($row2['i_price'] * $qtys[$i]); ?>
                            </td>
                        </tr>
                        <?php }}}else{ ?>
                        <tr>
                            <td colspan="4" class="text-center"><h3>No Orders</h3></td>
                        </tr>
                  <?php  }
                } else{ ?>
                         <tr>
                            <td colspan="4" class="text-center"><h3>Please Login to View Your Orders.</h3></td>
                        </tr>
                     
                  <?php  } ?>
                        <!----->
                    </tbody>
                </table>
            </div>
            </div>
        </div>
    </section>
    <div class="col-lg-4 offset-lg-4">
        <div class="checkout">
      
        <?php 
        $query = "SELECT * FROM orders WHERE c_id = '$cid' ORDER BY o_id DESC";
        $result = mysqli_query($connection,$query);
        if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_array($result);
        ?>

        <p style="color:#008A86; font-size:24px"> <b> <u> Status</u></b> </p>
        <?php if($row['status'] == "pending") {?>
        <p style="color:#505050; font-size:20px"> <b> Order is pending</b> </p>
        <?php }else if($row['status'] == "confirmed"){?>
        <p style="color:#505050; font-size:20px"> <b> Order confirmed & on process</b> </p>
        
            <ul>
                <li class="subtotal">SubTotal
                    <span>Rs:<?php echo $subtotal; ?></span>
                </li>
                <li class="cart-total">Total
                <span>Rs:<?php echo $total; ?></span></li>
            </ul>
            <?php }}?>
        </div>
        </form>
    </div>



     <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
<?php mysqli_close($connection);?>