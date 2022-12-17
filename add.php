<?php
  include('config/db_connect.php');
$price = $pd_name = $details = $image = '';
$errors = array('price' => '', 'pd_name' => '', 'details' => '','image'=>'' );

if(isset($_POST['submit'])){
  
 

  $price = $_POST['price'];



  $pd_name = $_POST['pd_name'];



  $details = $_POST['details'];

  $image= $_POST['image'];


  $price = mysqli_real_escape_string($conn, $_POST['price']);
  $pd_name = mysqli_real_escape_string($conn, $_POST['pd_name']);
  $details = mysqli_real_escape_string($conn, $_POST['details']);
  $image = mysqli_real_escape_string($conn, $_POST['image']);

  // create sql
  $sql = "INSERT INTO products(pd_name,price,details,img) VALUES('$pd_name','$price','$details','$image')";

  // save to db and check
  if(mysqli_query($conn, $sql)){
    // success
    header('Location: index.php');
  } else {
    echo 'query error: '. mysqli_error($conn);
  }
}
//end post method
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <?php include('templates/header.php'); ?>

    <section class="container grey-text">
        <h4 class="center">Add an Item</h4>
        <form class="white" action="add.php" method="POST">
            <label>Your product name </label>
            <input type="text" name="pd_name" value="<?php echo htmlspecialchars($pd_name) ?>">
            <div class="red-text"><?php echo $errors['pd_name']; ?></div>
            <label>Product Price</label>
            <input type="text" name="price" value="<?php echo htmlspecialchars($price) ?>">
            <div class="red-text"><?php echo $errors['price']; ?></div>
            <label>Product details</label>
            <input type="text" name="details" value="<?php echo htmlspecialchars($details) ?>">
            <div class="red-text"><?php echo $errors['details']; ?></div>

            <label>Product Image URL</label>
            <input placeholder="https://i.ibb.co/6RvynTx/Ethnic-Pot.jpg" type="text" name="image"
                value="<?php echo htmlspecialchars($image) ?>">
            <div class="red-text"><?php echo $errors['image']; ?></div>

            <div class="center">
                <input type="submit" name="submit" value="Submit" class="btn brand z-depth-0">
            </div>
        </form>
    </section>

    <?php include('templates/footer.php'); ?>


</html>