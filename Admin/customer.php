<?php require_once('connection.php');?>
<!doctype html>
<html lang="en">
  <head>
    <title>Princess Mobile - Admin Panel</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="customer.css">

    <script src="https://kit.fontawesome.com/332a215f17.js" crossorigin="anonymous"></script>
    

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;1,300&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>

    <!-- Dashboard======================================-->
    <!-- Nav Bar --------------------------------------------------------------------------------->
      <div class="container1">
        <nav class="navbar">
          <div class="nav_icon" onclick="toggleSidebar()">
            <i class="fa fa-bars" aria-hidden="true"></i>
          </div>
          <div class="navbar__left">
            <label for="">Admin Panel</label>
          </div>
          <div class="navbar__right">
          <a href="profile.php">
              <i class="fa fa-user" aria-hidden="true"></i>
            </a>
          </div>
        </nav>
  
        <main>
          <div class="main__container">
        <!-- End of Nav Bar --------------------------------------------------------------------------------->
  
            <div class="main__title">
              <div class="main__greeting">
                <h1>Customer Details</h1>
              </div>
            </div>
        <!-- MAIN TITLE ENDS HERE --------------------------------------------------------------------------------->

      
        <!-- Customer Details Table --------------------------------------------------------------------------------->
        <!-- <div class="input-group">
            <div class="form-outline">
              <input type="search" id="form1" class="form-control" placeholder="Enter Customer ID" />
            </div>
            <button type="button" class="btn btn-primary">
              <i class="fas fa-search"></i>
            </button>
          </div> -->
<br>
<br>

        <div class="table-responsive">

            <!--Table-->
            <table class="table">
          
              <!--Table head-->
              <thead>
                <tr>
                  <th>Customer ID</th>
                  <th class="th-sm">Customer name</th>
                  <th class="th-sm">Email</th>
                  <th class="th-sm">Telephone</th>
                  <th class="th-sm">Action</th>
                </tr>
              </thead>
              <!--Table head-->
          
              <?php 
                    	$query = "SELECT * FROM customer";
                      $result = mysqli_query($connection,$query);
                      
                      while($row = mysqli_fetch_array($result)){
                        ?>

              <!--Table body-->
              <tbody>
                <tr>
                  <th scope="row"><?php echo $row['c_id']; ?></th>
                  <td><?php echo $row['c_fname']." ".$row['c_lname']; ?></td>
                  <td><?php echo $row['c_email']; ?></td>
                  <td><?php echo $row['c_telephone']; ?></td>
              
                  <!-- Modal ---------------------------------------------------------------------------------------------->
            <div class="modal fade" id="basicModal<?php echo $row['c_id']; ?>">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #008A86; color: #ffffff">Customer Details
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>

                    <div class="modal-body">
                    <h6><span>Customer ID :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><?php echo $row['c_id']; ?></h6>
                    <br>
                    <h6><span>Customer Name :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><?php echo $row['c_fname']." ".$row['c_lname']; ?></h6>
                    <br>
                    <h6><span>Customer Email :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><?php echo $row['c_email']; ?></h6>
                    <br>
                    <h6><span>Customer Telephone :&nbsp;&nbsp;&nbsp;</span><?php echo $row['c_telephone']; ?></h6>
                    <br>
                    <hr style="height:2px; background-color:#008A86">
                    <br>
                    <h6><span>Customer Address :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><?php echo $row['c_add_street']; ?></h6>
                    <h6>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['c_add_town']; ?></h6>
                      <br>
                    <h6><span>Postal Code :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><?php echo $row['c_add_postal']; ?></h6>
                    <br>
                    </div>
                </div>
                </div>
            </div>
        <!-- End of Modal ---------------------------------------------------------------------------------------------->
                 

                  <td><a class='btn btn-info btn-xs' href="#" data-toggle="modal" data-target="#basicModal<?php echo $row['c_id']; ?>"><i class="far fa-eye"></i></a></td>
                
                
                
                </tr>
              </tbody>
              <!--Table body-->
              <?php }?>
            </table>
            <!--Table-->
          
          </div>
        <!-- End of Customer Details Table --------------------------------------------------------------------------------->


        <!-- Modal ---------------------------------------------------------------------------------------------->
            <!-- <div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>

                    <div class="modal-body">
                    <h6>000012</h6>
                    <h6>First name</h6>
                    <h6>Last name</h6>
                    <h6>Gender</h6>
                    <h6>Email</h6>
                    <h6>Telephone</h6>
                    <hr>
                    <h6>Address Street</h6>
                    <h6>Address City</h6>
                    <h6>Postal Code</h6>
                    </div>
                    
                </div>
                </div>
            </div> -->
        <!-- End of Modal -------------------------------------------------------------------------------------------- -->










          <!-- Side Bar --------------------------------------------------------------------------------------------->
        </div>
    </main>
      <div id="sidebar">
        <div class="sidebar__title">
          <div class="sidebar__img">
            <img src="image/logo1.png" alt="logo" />
          </div>
          <hr style="height: 2px; background-color:#008A86; margin-bottom: 30px;">
          <i onclick="closeSidebar()" class="fa fa-times" id="sidebarIcon" aria-hidden="true"></i>
        </div>

        <div class="sidebar__menu">
          <div class="sidebar__link">
            <i class="fa fa-home"></i>
            <a href="dashboard.php">Dashboard</a>
          </div>
          <div class="sidebar__link">
            <i class="fas fa-chart-line" aria-hidden="true"></i>
            <a href="sales.php">Sales</a>
          </div>
          <div class="sidebar__link">
            <i class="fas fa-list-ul"></i>
            <a href="orderlist.php">Order List</a>
          </div>
          <div class="sidebar__link">
            <i class="fas fa-headphones"></i>
            <a href="item.php"> Items</a>
          </div>
          <div class="sidebar__link">
            <i class="fas fa-wrench"></i>
            <a href="repair.php">Reapir Items</a>
          </div>
          <div class="sidebar__link">
            <i class="fas fa-folder-plus"></i>
            <a href="add_category.php">Add Category</a>
          </div>
          

            <hr style="height: 2px; background-color:#008A86; margin-bottom: 15px;">

            <div class="sidebar__link">
              <i class="fas fa-bell"></i>
              <a href="notification.php">Notification</a>
            </div>
            <div class="sidebar__link active_menu_link">
              <i class="fas fa-user"></i>
              <a href="#">Register Customers</a>
            </div>
            <div class="sidebar__link">
              <i class="fas fa-star"></i>
              <a href="feedback.php">Feedbacks</a>
            </div>

          <hr style="height: 2px; background-color:#008A86; margin-bottom: 10px;">
          <div class="sidebar__logout">
            <i class="fas fa-sign-out-alt"></i>
            <a href="logout.php">Log out</a>
          </div>
        </div>
      </div>
    </div>
    <!-- End of Side Bar --------------------------------------------------------------------------------------------->
  <!-- Dashboard======================================-->



  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
<?php mysqli_close($connection);?>