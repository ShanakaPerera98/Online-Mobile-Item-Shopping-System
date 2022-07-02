<?php require_once('connection.php');
session_start();
?>
<?php require_once('category.php');?>
<!doctype html>
<html lang="en">
  <head>
    <title>Princess Mobile - Admin Panel</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="add_category.css">

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
                <h1>Add Category & Color</h1>
              </div>
            </div>
        <!-- MAIN TITLE ENDS HERE --------------------------------------------------------------------------------->

      <!-- Add Category --------------------------------------------------------------------------------->
      <form action="" method="post">
        <div class="card w-75 mb-3">
            <div class="card-body">
              <h5 class="card-title">Add new category</h5>

            <div class="form-group row">
                <label for="inputcategory" class="form-label">Enter new category name</label>
                <div class="col">
                <input type="text" name="cat" style=" border: 1px solid #505050;" class="form-control">
                <button class="btn btn-primary-1" type="submit" name="submit">ADD</button>
                </div>
            </div>

                <label for="topic" class="selectcategory1">Categories</label>
                <?php 
                    	$query = "SELECT * FROM category";
                      $result = mysqli_query($connection,$query); ?>
    
                     
                      <textarea name="des" id="cat" cols="30" rows="6" style="width:100%;">
                     <?php while($row = mysqli_fetch_array($result)){ 
                      echo $row['cat_name']; ?>
                    
                      <?php }?>
                      </textarea>
              
               </div>
          </div>
          </form>
          <!-- End of Add Category --------------------------------------------------------------------------------->

          <!-- Add Color --------------------------------------------------------------------------------->
          <form action="" method="post">
          <div class="card w-75 mb-3">
            <div class="card-body">
              <h5 class="card-title">Add new color</h5>

            <div class="form-group row">
                <label for="inputcategory" class="form-label">Enter new color</label>
                <div class="col">
                <input type="text" name="col" style=" border: 1px solid #505050;" class="form-control">
                  <button class="btn btn-primary-1" type="submit" name="submit1">ADD</button>
                </div>
            </div>

            
              <label for="topic" class="selectcategory1">Colors</label>
              <?php 
                    	$query = "SELECT * FROM color";
                      $result = mysqli_query($connection,$query); ?>
    
                     
                      <textarea name="des" id="col" cols="30" rows="6" style="width:100%;">
                     <?php while($row = mysqli_fetch_array($result)){ 
                      echo $row['color_name']; ?>
                    
                      <?php }?>
                      </textarea>
            </div>
          </div>
          </form>
          <!-- End of Add Color --------------------------------------------------------------------------------->

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
          <div class="sidebar__link active_menu_link">
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
  <!-- Dashboard======================================-->



  <script src=""></script>
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