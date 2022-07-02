<?php require_once('connection.php');
session_start();
?>
<?php require_once('wishlist_delete.php');?>
<!doctype html>
<html lang="en">
  <head>
    <title>Princess Mobile</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="wishlist.css">
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
              <li class="nav-item"><a href="wishlist.php" class="nav-link active">Wishlist</a></li>
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


    <!-- Item======================================================================= -->
    <div class="container">
        <br>
        <h3 class="h3">Wishlist</h3>
        <br>
        <br>
        <div class="row">
        <?php 
                            if(isset($_SESSION['cid'])){

                            $cid = $_SESSION['cid'];

                            $query = "SELECT * FROM wishlist inner join item on wishlist.i_id = item.i_id WHERE c_id = $cid ";
                            $result = mysqli_query($connection,$query);

                            if(mysqli_num_rows($result) > 0){

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
                            <ul class="social">
                                <li><a href="item.php?i_id=<?php echo $row['i_id']; ?>" data-tip="More Details"><i class="fa fa-eye"></i></a></li>
                                <!-- <li><a href="#" data-tip="Add to Cart"><i class="fa fa-shopping-cart"></i></a></li> -->
                            </ul>
                            <!-- <span class="product-new-label">New</span> -->
                            <!-- <span class="product-discount-label">-                  %</span> -->
                        </div>
                        <div class="product-content">
                            <h3 class="title"><a href="#"><?php echo $row['i_name']?></a></h3>
                            <div class="price">
                                LKR. <?php echo $row['i_price']?>
                            </div>
                            <!-- <a class="add-to-cart" href="">ADD TO CART</a>  -->
                            <form action="" method="post">
                            <input type="hidden" name="wid" value="<?php echo $row['w_id']; ?>">
                            <button class="remove-wishlist" name="delete" onclick="return confirm('Are you sure to Remove your Item?')">REMOVE</button>
                            </form>
   
                        </div>
                    </div>
                </div>    
                

                <?php }}else{ ?>
                      <tr>
                         <td colspan="4" class="text-center"><h3>No Items Added to Wishlist.</h3></td>
                            </tr>
                        <?php  }
                     } else{ ?>
                         <tr>
                             <td colspan="4" class="text-center"><h3>Please Login to View Your Wishlist.</h3></td>
                         </tr>
                



                <?php  } ?>

            
    
        </div>
    </div>
               
        <!-- End of Item======================================================================= -->



    <!-- Optional JavaScript -->
    <script src="mobile.js"></script>
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