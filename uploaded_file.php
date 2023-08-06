<?php
include('connection.php');

if(isset($_POST['submit'])){
// print_r($_POST);
// exit;
$pname=$_POST['pname'];
$des=$_POST['des'];
$price=$_POST['price'];
$qul=$_POST['qul'];
$file=$_FILES['image'];


    // image code

$fileName    = $file['name'];
$fileTmpName = $file['tmp_name'];
$fileSize    = $file['size'];
//$fileError  = $file['error'];
$fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

 $newFileName = uniqid('', true) . '.' . $fileExt;

            // Specify the directory where you want to save the uploaded image
             $destination = 'uploads/' . $newFileName;
            // move_uploaded_file($fileTmpName,"uploads/".$fileName);
            move_uploaded_file($fileTmpName, $destination);

            // Move the file to the desired location
           
$query="INSERT INTO `product_table`(`p_name`, `description`, `p_price`, `quantitie`, `image`) VALUES ('$pname','$des','$price','$qul','$newFileName')";
// print_r($query);
// exit;
$sql = mysqli_query($conn,$query);

header('Location:dispayProduct.php');

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

</head>
<body>
    <!--Table-->
<table class="table table-striped w-auto">

<!--Table head-->
<thead>
  
 
</thead>

<tbody>
<form  role="form" method="POST" action="" enctype="multipart/form-data">
  
                  <div class="box-body">
                  
                    <div class="form-group">
                      <label for="exampleInputPassword1">product_name</label>
                      <input type="text" class="form-control" id="exampleInputPassword1" name="pname">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">description</label>
                      <input type="text" class="form-control" id="exampleInputPassword1" name="des">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">p_price</label>
                      <input type="text" class="form-control" id="exampleInputPassword1" name="price">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">quantitie</label>
                      <input type="text" class="form-control" id="exampleInputPassword1" name="qul">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputFile">File input</label>
                      <input type="file" id="exampleInputFile" name="image">
                      <!-- <p class="help-block">Example block-level help text here.</p> -->
                    </div>
                    <div class="checkbox">
                      <label>
                        <input type="checkbox"> Check me out
                      </label>
                    </div>
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button name="submit" value="submit" type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
</tbody>

</table>
</body>
</html>
