<?php require_once('connection.php');?>
<?php


if(isset($_POST['submit'])){


        $cat = $_POST['cat'];

        $query = "insert into category(cat_name) values('$cat')";

        $run = mysqli_query($connection, $query) or die(mysqli_error());

        if($run){ 
            //  echo "Submitted Successfully";
            $_SESSION['status'] = "Category";
            $_SESSION['status_text'] = "Submitted Successfully";
            $_SESSION['status_code'] = "success";
         }else{
            // echo "Error";
            $_SESSION['status'] = "Error";
            $_SESSION['status_text'] = "Please Try Again";
            $_SESSION['status_code'] = "error";
            
        }

}

if(isset($_POST['submit1'])){


    $col = $_POST['col'];

    $query = "insert into color(color_name) values('$col')";

    $run = mysqli_query($connection, $query) or die(mysqli_error());

    if($run){ 
        // echo "Submitted Successfully";
        $_SESSION['status'] = "Color";
        $_SESSION['status_text'] = "Submitted Successfully";
        $_SESSION['status_code'] = "success";
     }else{
        // echo "Error";
        $_SESSION['status'] = "Error";
        $_SESSION['status_text'] = "Please Try Again";
        $_SESSION['status_code'] = "error";
    }

}


?>