<?php require_once('connection.php');?>

<?php

      if(isset($_POST['updatestatus'])){
        $email          = $_POST['email'];
        $subject        = $_POST['status'];
        $repairid       = $_POST['rid'];
        $price          = $_POST['price'];
        $iname          = $_POST['iname'];
        $message        = $_POST['des'];

        $to                   ="{$email}";
        $mail_subject         ="Princess Mobile - Repair Item ({$subject})";
        $email_body            ="Status - {$subject} \r\n ";
        $email_body           .="Repair Item ID - {$repairid}\r\n";
        $email_body           .="Repair Item Name - {$iname }\r\n";
        $email_body           .="Repair Item Price - {$price }\r\n \r\n";
        $email_body           .="Message - {$message } \r\n \r\n \r\n \r\n";
        $email_body           .="PRINCESS MOBILE \r\n";
        $email_body           .="143/7/A Dalupitiya road, Mahara Kadawatha \r\n";
        $email_body           .="+94 777063323 | +94 755856878 \r\n";

        // $email_body           .="<script><b>Message : </b></script>" .nl2br(strip_tags($message));
        $headers = "From: princessmobile21@gmail.com\r\nReply-To: princessmobile21@gmail.com";

        $send_mail_result = mail($to, $mail_subject, $email_body, $headers);

        if($send_mail_result){
          // echo "Message sent";
          // $_SESSION['status'] = "Message sent";
          // $_SESSION['status_code'] = "success";
        }else{
          // echo "Message not sent";
          // $_SESSION['status'] = "Message not sent";
          // $_SESSION['status_code'] = "error";
        }
      }

?>


<?php 

if(isset($_POST['updatestatus'])){

$re_id = $_POST['re_id'];

$query = "UPDATE repair SET re_status ='$_POST[status]', re_des ='$_POST[des]', re_price ='$_POST[price]', re_cname ='$_POST[cname]', 
re_iname ='$_POST[iname]', re_tele ='$_POST[tele]', re_email ='$_POST[email]' where re_id = '$_POST[re_id]'";

$query_run = mysqli_query($connection, $query);

if($query_run){ 
    ?>

    <script>
    alert("Updated success");
    // window.location.href='repair.php';
    </script>

    <?php

}
else{
    ?>
    <script>
    alert("Not Updated");
    // window.location.href='repair.php?error';
    </script>

    <?php
}


}

$result=mysqli_query($connection,"SELECT * FROM repair where re_id='".$_GET['re_id']."'");
                      
$row = mysqli_fetch_array($result);

?>




<!doctype html>
<html lang="en">
  <head>
    <title>Princess Mobile - Admin Panel</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="addrepair.css">

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
                <h1>Edit Repair Item Details</h1>
              </div>
            </div>
        <!-- MAIN TITLE ENDS HERE --------------------------------------------------------------------------------->
  
            <br>

        <!-- Form --------------------------------------------------------->
        
        <form action="" method="post">
            <div class="form-group">
              <label for="exampleFormControlInput1">Repair ID</label>
              <input type="text" class="form-control form-control-sm" id="exampleFormControlInput1" name="rid" value="<?php echo $row['re_id']; ?>">
            </div>
            <br>
            <h6>Customer Details</h6>
            <hr class="hr1">
            
            <div class="form-group">
                <label for="exampleFormControlInput1">Customer Name</label>
                <input type="text" class="form-control form-control-sm" id="exampleFormControlInput1" name="cname" value="<?php echo $row['re_cname']; ?>">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Customer Email</label>
                <input type="text" class="form-control form-control-sm" id="exampleFormControlInput1" name="email" value="<?php echo $row['re_email']; ?>">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Telephone</label>
                <input type="text" class="form-control form-control-sm" id="exampleFormControlInput1" name="tele" value="<?php echo $row['re_tele']; ?>">
            </div>


            <br>
            <h6>Item Details</h6>
            <hr class="hr1">
            <div class="form-group">
                <label for="exampleFormControlInput1">Item Name</label>
                <input type="text" class="form-control form-control-sm" id="exampleFormControlInput1" name="iname" value="<?php echo $row['re_iname']; ?>">
            </div>
            
            <div class="form-group">

            <!-- <label for="exampleFormControlSelect1">Select status</label> -->
            <!-- <div class="statusradio">
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadioInline1" name="status" class="custom-control-input" value="In process">
                    <label class="custom-control-label" for="customRadioInline1">In process</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadioInline2" name="status" class="custom-control-input" value="Finish">
                    <label class="custom-control-label" for="customRadioInline2">Finish</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadioInline3" name="status" class="custom-control-input" value="Delivered">
                    <label class="custom-control-label" for="customRadioInline3">Delivered</label>
                </div>
            </div> -->
            
              <label for="exampleFormControlSelect1">Select status</label>
              <select class="form-control form-control-sm" name="status">
                <option value="In process">In process</option>
                <option value="Finish">Finish</option>
                <option value="Delivered">Delivered</option>
              </select>
            </div>
        
              

            <div class="form-group">
              <label for="exampleFormControlTextarea1">Description</label>
              <textarea class="form-control form-control-sm" id="exampleFormControlTextarea1" rows="3" name="des"><?php echo $row['re_des']; ?></textarea>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Price</label>
                <input type="text" class="form-control form-control-sm" id="exampleFormControlInput1" placeholder="Price" name="price" value="<?php echo $row['re_price']; ?>">
            </div>
            
            <input type="hidden" name="re_id" value="<?php echo $row['re_id']; ?>">
              <!-- <button name="updatestatus" type="submit" class="update-btn"><i class="fas fa-sync-alt"></i></button> -->
            <button class="rebtn" name="updatestatus" type="sumbit">Submit</button>



            <!-- <div class="mailform">
            <div class="subtopic">
                <h3>Send email to customer</h3>
            </div>
            <br>

            <form action="" method="post">
              <p>
                <label for="email">Email</label>
                <input type="email" name="email" id="email" value="                   " required>
              </p>
              <p>
                <label for="subject">Subject</label>
                <input type="text" name="subject" id="subject" required>
              </p>
              <p>
                <label for="message">Message</label>
                <textarea type="message" name="message" id="message" cols="15" rows="10" required></textarea>
              </p>
              <p>
                <button type="submit" name="submit">Send message</button>
              </p>
            </form>

            </div> -->


            </form>
          
        <!-- End of Form ------------------------------------------------------->
  
            
          
  

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
            <div class="sidebar__link">
              <i class="fas fa-headphones"></i>
              <a href="item.php"> Items</a>
            </div>
            <div class="sidebar__link  active_menu_link">
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
