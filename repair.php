<!doctype html>
<html lang="en">
  <head>
    <title>Princess Mobile</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="repair.css">
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

             
	          <li class="nav-item"><a href="repair.php" class="nav-link active">Repairing</a></li>
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
        <h2 class="topic">Check your repair item details here !</h2>
        <hr>
        <div class="row justify-content-center ">
            <div class="col-xl-10">
                    <div class="row justify-content-around">
                        <div class="col-md-8">
                            <div class="card border-0">
                                <div class="card-body">
                                    <div class="row mt-4">
                                        <div class="col">
                                            <p class="text-muted mb-2">Enter Repair ID</p>
                                            <hr class="mt-0">
                                        </div>
                                    </div>
                                  <div class="form-group"><input type="text" class="form-control form-control-sm" name="NAME" id="NAME" aria-describedby="helpId" placeholder="Repair ID"> </div>
                                  <button class="srchbtn">Search</button>
                                 <div class="row mt-4">
                                        <div class="col">
                                            <p class="text-muted mb-2">Customer Details</p>
                                            <hr class="mt-0">
                                        </div>
                                    </div>
                                    <div class="form-group"> <label class="small text-muted mb-1">Name</label> <input type="text" class="form-control form-control-sm" name="NAME" placeholder="Your Name"></div>
                                    <div class="form-group"> <label class="small text-muted mb-1">Email</label> <input type="text" class="form-control form-control-sm" name="NAME"  placeholder="Your Email"></div>
                                    <div class="form-group"> <label class="small text-muted mb-1">Telephone</label> <input type="text" class="form-control form-control-sm" name="NAME" placeholder="Telephone"> </div>
                                    <div class="row no-gutters">
                                        <div class="col-sm-6 pr-sm-2">
                                            <div class="form-group"> <label for="NAME" class="small text-muted mb-1">Received Date</label> <input type="text" class="form-control form-control-sm" name="NAME" id="NAME" aria-describedby="helpId" placeholder="Received Date"> </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>





            <div class="container">
                <p class="text-muted mb-2">Repair Item Details</p>
                <hr class="mt-0">
                <table class="table table-striped custab">
                <thead>
                    <tr>
                        <th>Item Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th class="text-right">Status</th>
                    </tr>
                </thead>
                        <tr>
                            <td>Apple 6s mobile</td>
                            <td>Screen and battery replace</td>
                            <td><span class="repairprice">-</span></td>
                            <td class="text-right"><span class="status">In processing</span></td>
                        </tr>
                </table>
                </div>
                <br>
                <br>
                <br>
                <br>


        </div>
    <!-- End of Order======================================================================= -->




    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>