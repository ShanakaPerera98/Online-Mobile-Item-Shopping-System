<?php require_once('connection.php');

if(isset($_POST['delete'])){

$iid = $_POST['iid']; // get id through query string

$query = "DELETE FROM item WHERE i_id = '$iid'";
$run = mysqli_query($connection, $query);

    if($run){ 
        // echo "Deleted Successfully";
        echo '<script>alert("Deleted Successfully")</script>';

        

    }else{
        // echo "Error";
        echo '<script>alert("Error")</script>';
    }
}
?>