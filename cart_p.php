<?php

if(isset($_POST['submit_to_cart'])){

    if(!isset($_SESSION['cid'])){
        // echo "Please Login to Add items into the cart";
        $_SESSION['status'] = "You're not logged in";
        $_SESSION['status_text'] = "Please Login to Add items into the cart";
        $_SESSION['status_code'] = "info";
    }else{

        $cid =  $_SESSION['cid'];
        $pid = $_POST['pid'];
        $qty = $_POST['qty'];
        // $total = $_POST['total'];

        $query2 = "SELECT * FROM cart WHERE i_id ='$pid' AND c_id = '$cid' ";
	    $result2 = mysqli_query($connection,$query2);

        if(mysqli_num_rows($result2) > 0){
            // echo "Already Added this Item.";
            $_SESSION['status'] = "Item Already Added to The Cart";
            $_SESSION['status_text'] = "";
            $_SESSION['status_code'] = "warning";
        }else{

            $query = "insert into cart(i_id, c_id, qty, color) values('$pid', '$cid', '$qty', 'Black')";

            $run = mysqli_query($connection, $query);
    
            if($run){ 
                //  echo "Successfully Added to the cart";
                $_SESSION['status'] = "Item Successfully Added to the Cart";
                $_SESSION['status_text'] = "";
                $_SESSION['status_code'] = "success";
             }else{
                echo "Error";
                $_SESSION['status'] = "Error";
                $_SESSION['status_text'] = "Please Try Again";
                $_SESSION['status_code'] = "error";
            }

        }

    }
}

?>