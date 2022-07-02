<?php require_once('connection.php');
session_start();
?>
<?php require_once('insert.php');?>
<?php require_once('cart_delete.php');?>
<!doctype html>
<html lang="en">
  <head>
    <title>Princess Mobile</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="cart.css">
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
			    
                    <li class="nav-item"><a href="cart.php" class="nav-link active">
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
    
    <!-- Cart======================================================================= -->
    <div class="cart_section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cart_container">
                        <div class="cart_title">Shopping Cart</div>
                        <br>
                        <div class="cart_items">
                            <ul class="cart_list">
                            <?php 
                            $subtotal = 0;
                            $total = 0;

                            if(isset($_SESSION['cid'])){

                            $cid = $_SESSION['cid'];

                            $query = "SELECT * FROM cart inner join item on cart.i_id = item.i_id WHERE c_id = $cid ";
                            $result = mysqli_query($connection,$query);

                            if(mysqli_num_rows($result) > 0){

                            while($row = mysqli_fetch_array($result)){

                                $filenames = explode(",", $row['image']);
                            ?>
                                <li class="cart_item clearfix">
                                    <div class="cart_item_image"><img src="Admin/upload/server/uploads/<?php echo $filenames[0];?>" alt=""></div>
                                    <div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
                                        <div class="cart_item_name cart_info_col">
                                            <div class="cart_item_title">Name</div>
                                            <div class="cart_item_text"><?php echo $row['i_name']?></div>
                                        </div>
                                        <div class="cart_item_color cart_info_col">
                                            <div class="cart_item_title">Color</div>
                                            <div class="cart_item_text"></span><?php echo $row['color']?></div>
                                        </div>

                                        <div class="cart_item_quantity cart_info_col">
                                            <div class="cart_item_title">Quantity</div>
                                            <div class="counter">
                                                <form action="" method="post">
                                                    <input type="hidden" name="proid" value="<?php echo $row['i_id']; ?>">
                                                    <input type="hidden" name="cusid" value="<?php echo $cid; ?>">
                                                    <input class="input-number" type="number" name="qty" value="<?php echo $row['qty']; ?>"min="0"max="10">
                                                    <button name="updateqty" class="qty-update-btn"><i class="fas fa-sync-alt"></i></button>
                                                </form>
                                            </div>
                                        </div>
                                        
                                        <div class="cart_item_price cart_info_col">
                                            <div class="cart_item_title">Price</div>
                                            <div class="cart_item_text"><?php echo ($row['i_price'] * $row['qty']); ?>
                                            
                                            <?php $subtotal = $subtotal + ($row['i_price'] * $row['qty']); ?>
                                            <?php $total = $total + ($row['i_price'] * $row['qty']); ?>
                                            </div>
                                        </div>
                                        <form action="" method="post">
                                        <input type="hidden" name="cid" value="<?php echo $row['cart_id']; ?>">
                                        <button class="btn" name="delete" data-bs-dismiss="alert" onclick="return confirm('Are you sure to Remove your Item?')"><span class="fas fa-times"></span></button>
                                        </form>
                                   
                                        <?php }}else{ ?>
                                                        <tr>
                                                            <td colspan="4"><h3 class="text-center">Your cart is empty</h3></td>
                                                        </tr>
                                                <?php  }
                                                } else{ ?>
                                                        <tr>
                                                            <td colspan="4"><h3 class="text-center">Please Login to View Your Cart.</h3></td>
                                                        </tr>
                                                    
                                                             
                                        <!-- <div class="cart_item_total cart_info_col">
                                            <div class="cart_item_title">Total</div>
                                            <div class="cart_item_text"><?php echo $subtotal; ?></div>
                                        </div> -->
                                    </div>
                                </li>
                                <?php  } ?>
                            </ul>
                            
                        </div>
                        <div class="order_total">
                            <div class="order_total_content text-md-right">
                                <div class="order_total_title">Order Total:</div>
                                <div class="order_total_amount">LKR. <?php echo $total; ?></div>
                            </div>
                        </div>
                        
                        <div class="cart_buttons text-center">
                        <!-- <a href="mobile.php"> 
                            <button type="button" class="button cart_button_shop">Continue Shopping</button> 
                            </a> -->
                        <a href="place_order.php"> 
                            <button type="button" class="button cart_button_order">Place Order</button> </div>
                            </a>
                        </div>
                </div>
            </div>
            
            
        </div>
    </div>
  
    <!-- End of Cart======================================================================= -->






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