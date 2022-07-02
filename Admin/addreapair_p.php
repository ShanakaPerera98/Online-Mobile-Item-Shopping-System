<?php require_once('connection.php');?>
<?php 

    if(isset($_POST['submit'])){

        if(!empty($_POST['cname']) || !empty($_POST['email']) || !empty($_POST['tele']) || !empty($_POST['iname']) || !empty($_POST['des'])){

            // $rid=$_POST['rid'];
            $cname=$_POST['cname'];
            $email=$_POST['email'];
            $tele=$_POST['tele'];
            $iname=$_POST['iname'];
            $status=$_POST['status'];
            $des=$_POST['des'];
            $price=$_POST['price'];
            $dt1=date("Y-m-d");
            $dt2=date("H:i:s");


            $query = "insert into repair(re_cname, re_email, re_tele, re_iname, re_status, re_des, re_price, date, time) values('$cname', '$email', '$tele', '$iname', '$status', '$des', '$price', '$dt1', '$dt2')";

            $run = mysqli_query($connection, $query)or die(mysqli_error());

            if($run){
                // echo '<script>alert("submited success")</script>';
                $_SESSION['status'] = "Submited Success";
                $_SESSION['status_text'] = "";
                $_SESSION['status_code'] = "success";
            }else{
                // echo '<script>alert("not submited")</script>';
                $_SESSION['status'] = "Error !";
                $_SESSION['status_text'] = "Something Went Wrong";
                $_SESSION['status_code'] = "error";
            }
        }else{
            // echo '<script>alert("Field Empty")</script>';
            $_SESSION['status'] = "Some Fields Are Empty !";
            $_SESSION['status_text'] = "Please Check and Try Again";
            $_SESSION['status_code'] = "warning";
        }

    }

    ?>
<?php mysqli_close($connection);?>