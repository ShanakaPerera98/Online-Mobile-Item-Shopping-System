<?php require_once('connection.php');?>
<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">

    <title>Princess Mobile - Admin Panel</title>
    <meta name="description" content="Ajax Multiple Image Uploader">
    <meta name="author" content="tharindulucky">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <link rel="stylesheet" href="dist/css/styles.css">
    <link rel="stylesheet" href="dist/css/item.css">

    <!-- Latest compiled JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- These are the necessary files for the image uploader -->
    <script src="dist/assets/jquery-file-upload/js/vendor/jquery.ui.widget.js"></script>
    <script src="dist/assets/jquery-file-upload/js/jquery.iframe-transport.js"></script>
    <script src="dist/assets/jquery-file-upload/js/jquery.fileupload.js"></script>
</head>

<body>

<div class="container">

    <h2>Edit item details</h2>

    <hr>

    <div class="row">
        <div class="col-md-8">
            <div class="container1">
                <div>






                <?php 
            $pid = $_GET['i_id'];
            $query = "SELECT * FROM item where item.i_id = '$pid'";
            $result = mysqli_query($connection, $query);
            
            $row = mysqli_fetch_assoc($result);

        ?>
                    <form method="post" action="server/form_process.php">

                    <div class="form-group">
                        <label class="subtopic">Item ID</label>
                        <input type="text" class="form-control" id="item_id" value="<?php echo $row['i_code']; ?>" name="i_code">
                      </div>
                    <div class="form-group">
                        <label class="subtopic">Item Name</label>
                        <input type="text" class="form-control" id="item_name" placeholder="Item Name" value="<?php echo $row['i_name']; ?>" name="name">
                      </div>
                    <div class="form-group">
                        <label class="subtopic">Price</label>
                        <input type="text" class="form-control" id="price" placeholder="Rs." value="<?php echo $row['i_price']; ?>" name="price">
                      </div>
                    <!-- <div class="form-row">
                      <div class="form-group col-md-6">
                        <label class="subtopic">Discount (%)</label>
                        <input type="text" class="form-control" id="discount" placeholder="Discount" name="discount">
                      </div>
                      
                    </div> -->
                    

                    <div class="form-group">
                        <label class="subtopic">Description</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"><?php echo $row['i_des']; ?></textarea>
                      </div>

                      <input type="hidden" name="pid" value="<?php echo $row['i_id']; ?>">
                    <button type="submit" class="btn btn-primary1" name="update">Submit</button>

                    <br>
                    <br>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    /*jslint unparam: true */
    /*global window, $ */

    var max_uploads = 5

    $(function () {
        'use strict';

        // Change this to the location of your server-side upload handler:
        var url = 'server/upload.php';
        $('#fileupload').fileupload({
            url: url,
            dataType: 'html',
            done: function (e, data) {

                if(data['result'] == 'FAILED'){
                    alert('Invalid File');
                }else{
                    $('#uploaded_file_name').val(data['result']);
                    $('#uploaded_images').append('<div class="uploaded_image"> <input type="text" value="'+data['result']+'" name="uploaded_image_name[]" id="uploaded_image_name" hidden> <img src="server/uploads/'+data['result']+'" /> <a href="#" class="img_rmv btn btn-danger"><i class="fa fa-times-circle" style="font-size:48px;color:red"></i></a> </div>');

                    if($('.uploaded_image').length >= max_uploads){
                        $('#select_file').hide();
                    }else{
                        $('#select_file').show();
                    }
                }

                $('#progress .progress-bar').css(
                    'width',
                    0 + '%'
                );

                $.each(data.result.files, function (index, file) {
                    $('<p/>').text(file.name).appendTo('#files');
                });

            },
            progressall: function (e, data) {
                var progress = parseInt(data.loaded / data.total * 100, 10);
                $('#progress .progress-bar').css(
                    'width',
                    progress + '%'
                );
            }
        }).prop('disabled', !$.support.fileInput)
            .parent().addClass($.support.fileInput ? undefined : 'disabled');
    });

    $( "#uploaded_images" ).on( "click", ".img_rmv", function() {
        $(this).parent().remove();
        if($('.uploaded_image').length >= max_uploads){
            $('#select_file').hide();
        }else{
            $('#select_file').show();
        }
    });
</script>


</body>
</html>