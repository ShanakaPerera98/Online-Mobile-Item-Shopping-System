<?php require_once('connection.php');?>
<?php require_once('item_delete.php');?>
<!doctype html>
<html lang="en">
  <head>
    <title>Princess Mobile - Admin Panel</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="item.css">

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
                <h1>Item List</h1>
              </div>
            </div>
        <!-- MAIN TITLE ENDS HERE --------------------------------------------------------------------------------->
        
        <!-- Item Table --------------------------------------------------------------------------------->
        <a href="upload/upload_item.php" class="btn btn-primary btn-xs text-right"><b>+</b> Add new item</a>

        <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">Item ID</th>
                <th scope="col">Image</th>
                <th scope="col">Item Name</th>
                <th scope="col">Colors</th>
                <!-- <th scope="col">Discount (%)</th> -->
                <th class="text-right" scope="col">Price (Rs.)</th>
                <th class="text-center" scope="col">Action</th>
              </tr>
            </thead>

            <?php 
                    	$query = "SELECT * FROM item";
                      $result = mysqli_query($connection,$query);
                      
                      while($row = mysqli_fetch_array($result)){
                        $filenames = explode(",", $row['image']);
                        ?>

            <tbody>
              <tr>
                <th scope="row"><?php echo $row['i_id']; ?></th>
                <td><img class="itemimage" src="upload/server/uploads/<?php echo $filenames[0];?>"></td>
                <td><?php echo $row['i_name']; ?></td>
                <td><?php echo $row['color']; ?></td>
                
                <td class="text-right"><span>Rs. </span><?php echo $row['i_price']; ?></td>
                
                <td class="text-center">


 <!-- Modal ---------------------------------------------------------------------------------------------->
 <div class="modal fade" id="basicModal<?php echo $row['i_id']; ?>">
                <div class="modal-dialog">
                <div class="modal-content text-center">
                    <div class="modal-header" style="background-color: #008A86; color: #ffffff">Item Details
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>

                    <div class="modal-body">
                    <table>
                                    
                                        <tr>
                                          <td class="table-topic">Image</td>
                                          <td class="table-font"><img src="upload/server/uploads/<?php echo $filenames[0];?>" width="250px"></td>
                                      </tr>
                                      <tr>
                                           <td class="table-topic">Item ID</td>
                                           <td class="table-font"><?php echo $row['i_id']; ?></td>
                                       </tr>
                                       <tr>
                                           <td class="table-topic">Item Name</td>
                                           <td class="table-font"><?php echo $row['i_name']; ?></td>
                                       </tr>
                                       <tr>
                                           <td class="table-topic">Item Colors</td>
                                           <td class="table-font"><?php echo $row['color']; ?></td>
                                       </tr>
                                       <tr>
                                           <td class="table-topic">Price</td>
                                           <td class="table-font"><span>Rs. </span><?php echo $row['i_price']; ?></td>
                                       </tr>
                                       <tr>
                                           <td class="table-topic">Description</td>
                                           <td class="table-font"><?php echo $row['i_des']; ?></td>
                                       </tr>
                                   </table>
                    </div>
                </div>
                </div>
            </div>
        <!-- End of Modal ---------------------------------------------------------------------------------------------->
                 

                <form action="" method="post">
                    <a class='btn-edit' href="upload/edit_item.php?i_id=<?php echo $row['i_id']; ?>">EDIT</a>
                    <a class="btn-view" href="#" data-toggle="modal" data-target="#basicModal<?php echo $row['i_id']; ?>">VIEW</a>
                    <input type="hidden" name="iid" value="<?php echo $row['i_id']; ?>">
                    <button class="btn-delete" name="delete" onclick="return confirm('Are you sure to Remove your Item?')">DELE</button>
                    </form>
                  </td>
              </tr>
            </tbody>
            <?php }?>
          </table>
        <!-- End of Item Table --------------------------------------------------------------------------------->








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
            <div class="sidebar__link">
              <i class="fas fa-list-ul"></i>
              <a href="orderlist.php">Order List</a>
            </div>
            <div class="sidebar__link  active_menu_link">
              <i class="fas fa-headphones"></i>
              <a href="#"> Items</a>
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