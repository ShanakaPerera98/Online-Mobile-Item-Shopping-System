<?php require_once('../connection.php');?>
<?php


if(isset($_POST['submit'])){


    if(!empty($_POST['files']) || !empty($_POST['name']) || !empty($_POST['price']) ||
    !empty($_POST['color']) || !empty($_POST['mcategory']) || !empty($_POST['i_code']) || !empty($_POST['description'])){

        // $files = $_POST['files'];

        $name = $_POST['name'];
        $des = $_POST['description'];
        $price = $_POST['price'];
        
        $color = implode(',', $_POST['color']);
        $i_code = $_POST['i_code'];
        $cat = $_POST['mcategory'];
        
       

        $images = implode(", ", $_POST['uploaded_image_name']);

        $query = "insert into item(cat_id, i_code, i_name, i_des, i_price, color, image) values('$cat', '$i_code', '$name', '$des', '$price', '$color', '$images')";

        $run = mysqli_query($connection, $query) or die(mysqli_error());

        if($run){ 
            // echo "Submitted Successfully";
            echo '<script>alert("Submitted Successfully")</script>';
            echo"<script>window.open('../upload_item.php','_self')</script>";
            // $_SESSION['status'] = "Uploaded Successfully !";
            // $_SESSION['status_text'] = "";
            // $_SESSION['status_code'] = "success";
            // // header('Location: ../upload_item.php');

         }else{
            // echo "Error";
            echo '<script>alert("Error")</script>';
            // $_SESSION['status'] = "Error !";
            // $_SESSION['status_text'] = "Something Went Wrong";
            // $_SESSION['status_code'] = "error";
        }
    }else{
        // echo "All Fields Required";
        echo '<script>alert("All Fields Required")</script>';
        // $_SESSION['status'] = "Some Fields Are Empty !";
        // $_SESSION['status_text'] = "Please Check and Try Again";
        // $_SESSION['status_code'] = "warning";
    }
}



if(isset($_POST['update'])){


    $pid = $_POST['pid'];
    $code = $_POST['i_code'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $des = $_POST['description'];
    


        $query = "UPDATE item SET i_name='$name', i_code='$code', i_price='$price', i_des ='$des' WHERE i_id = '$pid'";
        $run = mysqli_query($connection, $query);

        if($run){
            // echo "Successfully Updated";
            echo '<script>alert("Successfully Updated")</script>';
            echo"<script>window.open('../../item.php','_self')</script>";
        }
        else{
            // echo "Error";
            echo '<script>alert("Error")</script>';
            echo"<script>window.open('../../item.php','_self')</script>";
        }
    
}

?>
<?php mysqli_close($connection);?>