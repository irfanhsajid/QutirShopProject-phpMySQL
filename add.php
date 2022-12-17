<?php
  include('config/db_connect.php');
$price = $pd_name = $details = $image = '';
$errors = array('price' => '', 'pd_name' => '', 'details' => '','image'=>'' );

if(isset($_POST['submit'])){
  
  // check price
  // if(empty($_POST['price'])){
  //   $errors['price'] = 'An price is required';
  // } else{
  //   $price = $_POST['price'];
  //   if(!filter_var($price, FILTER_VALIDATE_price)){
  //     $errors['price'] = 'price must be a valid price address';
  //   }
  // }

  $price = $_POST['price'];


  // check pd_name
  // if(empty($_POST['pd_name'])){
  //   $errors['pd_name'] = 'A pd_name is required';
  // } else{
  //   $pd_name = $_POST['pd_name'];
  //   if(!preg_match('/^[a-zA-Z\s]+$/', $pd_name)){
  //     $errors['pd_name'] = 'pd_name must be letters and spaces only';
  //   }
  // }

  $pd_name = $_POST['pd_name'];

  // check details
  // if(empty($_POST['price'])){
  //   $errors['price'] = 'At least one ingredient is required';
  // } else{
  //   $details = $_POST['price'];
  //   if(!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $details)){
  //     $errors['price'] = 'details must be a comma separated list';
  //   }
  // }


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





  // if(array_filter($errors)){
  //   //echo 'errors in form';
  // } else {
  //   // escape sql chars
  //   $price = mysqli_real_escape_string($conn, $_POST['price']);
  //   $pd_name = mysqli_real_escape_string($conn, $_POST['pd_name']);
  //   $details = mysqli_real_escape_string($conn, $_POST['details']);
  //   $image = mysqli_real_escape_string($conn, $_POST['image']);

  //   // create sql
  //   $sql = "INSERT INTO products(pd_name,price,details,image) VALUES('$pd_name','$price','$details','$image')";

  //   // save to db and check
  //   if(mysqli_query($conn, $sql)){
  //     // success
  //     header('Location: index.php');
  //   } else {
  //     echo 'query error: '. mysqli_error($conn);
  //   }

    
  // }


} // end POST check




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