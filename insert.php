<?php require_once('connection.php');?>
<?php 

$error_msg = "";

    if(isset($_POST['submit'])){

        if(!empty($_POST['fname']) || !empty($_POST['lname']) || !empty($_POST['email']) || !empty($_POST['tele']) || 
        !empty($_POST['gender']) || !empty($_POST['street']) || !empty($_POST['city']) || !empty($_POST['pcode'])){

            $email=$_POST['email'];
            $tele=$_POST['tele'];
            $street=$_POST['street'];
            $city=$_POST['city'];
            $pcode=$_POST['pcode'];
            $fname=$_POST['fname'];
            $lname=$_POST['lname'];
            $gender=$_POST['gender'];
            $password=$_POST['password'];

            $query3 = "SELECT * FROM login WHERE c_email = '$email'";
	        $result3 = mysqli_query($connection,$query3);

        if(mysqli_num_rows($result3) > 0){
            $error_msg = "This Email is not Available";
        }else{

            $query = "insert into customer(c_email, c_telephone, c_add_street, c_add_town, c_add_postal, c_fname, c_lname, 
            c_gender) values('$email', '$tele', '$street', '$city', '$pcode', '$fname', '$lname', '$gender')";


            $query2 = "insert into login(c_email, password, category) values('$email', '$password', 'customer')";

            $run = mysqli_query($connection, $query)or die(mysqli_error());
            $run2 = mysqli_query($connection, $query2)or die(mysqli_error());

            if($run && $run2){
                // echo"Submited Success";
                $_SESSION['status'] = "Now You Can Log";
                $_SESSION['status_text'] = "Thank You";
                $_SESSION['status_code'] = "success";
            }else{
                // echo"Not Submited";
                $_SESSION['status'] = "Error !";
                $_SESSION['status_text'] = "Something Went Wrong";
                $_SESSION['status_code'] = "error";
            }
        }
        }else{
            // echo"Field empty";
            $_SESSION['status'] = "Some Fields Are Empty !";
            $_SESSION['status_text'] = "Please Check and Try Again";
            $_SESSION['status_code'] = "warning";
        }

    }


    if(isset($_POST['login'])){

        $email=$_POST['email'];
        $password=$_POST['password'];

        $query="select * from login where c_email='$email'and password = '$password' and category ='customer'";
        $result=mysqli_query($connection,$query);

        if(mysqli_num_rows($result)>0){

            $query2 = "SELECT * FROM customer WHERE c_email ='$email' ";
	    $result2 = mysqli_query($connection,$query2);

        $row2 = mysqli_fetch_assoc($result2);

        $_SESSION['c_email'] = $email;
        $_SESSION['cid'] = $row2['c_id'];
        $_SESSION['fname'] = $row2['c_fname'];
        $_SESSION['lname'] =  $row2['c_lname'];

            // echo"<script> window.open('index.php', '_self') </script>";
            $_SESSION['status'] = "Welcome";
            $_SESSION['status_text'] = "Princess Mobile";
            $_SESSION['status_code'] = "success";
            header('Location: index.php');
        }else{
            // echo"Login Error";
            $_SESSION['status'] = "Invalid Email or Password";
            $_SESSION['status_text'] = "Please Try Again";
            $_SESSION['status_code'] = "error";
        }
    }

    if(isset($_POST['update'])){

        $email =  $_SESSION['c_email'];
    
        $opass = $_POST['current'];
        $npass = $_POST['npass'];
        $cpass = $_POST['cpass'];
    
        if($npass == $cpass){
    
        $query = "UPDATE login SET  password='$npass'  WHERE c_email = '$email'";
        $run = mysqli_query($connection, $query) or die(mysqli_error());
        
        if($run){ 
            // echo "updated Successfully";
            $_SESSION['status'] = "Password Updated Successfully";
            $_SESSION['status_text'] = "";
            $_SESSION['status_code'] = "success";
        }else{
        //    echo "Error";
        $_SESSION['status'] = "Error !";
        $_SESSION['status_text'] = "Please Try Again";
        $_SESSION['status_code'] = "error";
       }
        
    }
    }

    if(isset($_POST['updateqty'])){

        $cid = $_POST['cusid'];
        $pid = $_POST['proid'];
        $qty = $_POST['qty'];
    
        $query = "UPDATE cart SET qty='$qty' WHERE c_id = '$cid' AND i_id = '$pid' ";
        $run = mysqli_query($connection, $query) or die(mysqli_error());
        
        if($run){ 
            echo"<script>window.open('cart.php','_self')</script>";
        }else{
           echo "Error";
        }
    
    }

?>