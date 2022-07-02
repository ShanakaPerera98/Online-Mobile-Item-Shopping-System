<?php require_once('connection.php');?>
<?php require_once('login_ph.php');?>
<!doctype html>
<html lang="en">
  <head>
    <title>Princess Mobile - Admin Panel</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="orderlist.css">

    <script src="https://kit.fontawesome.com/332a215f17.js" crossorigin="anonymous"></script>
    

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;1,300&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>

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
                <h1>Order List</h1>
              </div>
            </div>
            <br>
            <br>
        <!-- MAIN TITLE ENDS HERE --------------------------------------------------------------------------------->
  


        <!-- Order Details Table --------------------------------------------------------->
        <!---table Section---->
       <section>
        <div class="container" id="order">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <div class="active-member">
                  <div class="table-responsive">
                    <table class="table table-xs mb-0">
                      <thead>
                        <tr>
                          <th>Order ID</th>
                          <th>Customer</th>
                          <th>Date</th>
                          <th>Color</th>
                          <th>Total Price</th>
                          <th>Method</th>
                          <th>Status</th>
                          <th>Action</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                      <?php 

                            $query = "SELECT orders.*, customer.*, item.* FROM ((orders INNER JOIN customer ON orders.c_id = customer.c_id)
                            INNER JOIN item ON orders.i_id = item.i_id) ORDER BY orders.o_id DESC";
                            $result = mysqli_query($connection, $query);
  
                            while($row = mysqli_fetch_array($result)){
                              $filenames = explode(",", $row['image']);
                              ?>
                        <tr>
                          <td>
                          <div class="modal fade" id="myModal<?php echo $row['o_id'];?>">
                                <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    
                                  <div class="modal-header">
                                    <h5 style="font-weight: bold;"><?php echo $row['i_name'];?></h5>
                                   
                                  </div>
                                  <div class="modal-body">
                                   <table>
                                    <tr>
                                        <td colspan="2"><img src="upload/server/uploads/<?php echo $filenames[0];?>" width="100">
                                      
                                        </td>
                                    </tr>
                                        <tr>
                                          <td class="table-topic">Item-Code</td>
                                          <td class="table-font"><?php echo $row['i_code'];?></td>
                                      </tr>
                                       <tr>
                                           <td class="table-topic">Order No.</td>
                                           <td class="table-font"><?php echo $row['o_id'];?></td>
                                       </tr>
                                       <tr>
                                           <td class="table-topic">Qty</td>
                                           <td class="table-font"><?php echo $row['qty'];?></td>
                                       </tr>
                                       <tr>
                                           <td class="table-topic">Total</td>
                                           <td class="table-font">Rs. <?php echo $row['total'];?></td>
                                       </tr>
                                       
                                       <tr>
                                        <td class="table-topic">Date</td>
                                        <td class="table-font"><?php echo $row['date'];?></td>
                                       </tr>
                
                                       <tr>
                                           <td class="table-topic">Time</td>
                                           <td class="table-font"><?php echo $row['time'];?></td>
                                       </tr>


                                 
                                      </div>
                                   </table>
                                  </div>
                                
                                </div>
                                </div>
                            </div>
                            <a href="#" data-toggle="modal" data-target="#myModal<?php echo $row['o_id'];?>" class="btn-view"><?php echo $row['o_id'];?></a>
                         
                         
                            </div>
                           </td>
                          <td>
                          <div class="modal fade" id="myModal<?php echo $row['c_id'];?>">
                                <div class="modal-dialog modal-l">
                                <div class="modal-content">
                                    
                                  <div class="modal-header">
                                    <h5 style="font-weight: bold;"><?php echo $row['c_fname']." ".$row['c_lname'];?></h5>
                                   
                                  </div>
                                  <div class="modal-body">
                                   <table>
                                    
                                        <tr>
                                          <td class="table-topic">Email</td>
                                          <td class="table-font"><?php echo $row['c_email'];?></td>
                                      </tr>
                                       <tr>
                                           <td class="table-topic">Address</td>
                                           <td class="table-font"><?php echo $row['c_add_street'].", ".$row['c_add_town'].", ".$row['c_add_postal']; ?></td>
                                       </tr>
                                       <tr>
                                           <td class="table-topic">Delivery Address</td>
                                           <td class="table-font"><?php echo $row['ship_street'].", ".$row['ship_city'].", ".$row['ship_postal']; ?></td>
                                       </tr>
                                       <tr>
                                           <td class="table-topic">Phone Number</td>
                                           <td class="table-font"><?php echo $row['c_telephone'];?></td>
                                       </tr>
                                   </table>
                                  </div>
                                
                                </div>
                                </div>
                            </div>
                          <a class="btn-view" href="#"  data-toggle="modal" data-target="#myModal<?php echo $row['c_id'];?>"><?php echo $row['c_fname']." ".$row['c_lname'];?></a>
                        </td>

                          <td><span><?php echo $row['date'];?></span></td>
                          <td><span><?php echo $row['color'];?></span></td>
                          <td><span>Rs: <?php echo $row['total'];?></span></td>
                          <td><span><?php echo $row['method'];?></span></td>


                          
                     
                          <td><i class=""><?php echo $row['status'];?></td>

                          
                          <td>
                            <form action="" method="post">
                              <input type="hidden" name="oid" value="<?php echo $row['o_id']; ?>">
                              <button class="btn-confirm" name="order_confirm" style="font-size: 10px;">CONFIRM</button>
                              <button class="btn-success" name="order_success" style="font-size: 10px;">SUCCESS</button>
                              </form>
                          </td>
                        </tr>
                        <?php }?>
                        <!----------------->
  
                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
      </section>




  

        <!-- Side Bar --------------------------------------------------------------------------------------------->
        </div>
      </main>
        <div id="sidebar">
          <div class="sidebar__title">
            <div class="sidebar__img">
              <img src="image/logo1.png" alt="logo" />
            </div>
            <hr style="height: 2px; background-color:#008A86; margin-bottom: 30px;">
            <i
              onclick="closeSidebar()"
              class="fa fa-times"
              id="sidebarIcon"
              aria-hidden="true"
            ></i>
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
            <div class="sidebar__link active_menu_link">
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
              <div class="sidebar__link">
                <i class="fas fa-user"></i>
                <a href="customer.php">Register Customers</a>
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


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
<?php mysqli_close($connection);?>