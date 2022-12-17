<?php
  //Start
  include('config/db_connect.php');

  // check for DELETE id parameter
  if(isset($_POST['delete'])){

		$id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);

		$sql = "DELETE FROM products WHERE id = $id_to_delete";

		if(mysqli_query($conn, $sql)){
			header('Location: index.php');
		} else {
			echo 'query error: '. mysqli_error($conn);
		}

	}

	// check GET request id param
	if(isset($_GET['id'])){

		// escape sql chars
		$id = mysqli_real_escape_string($conn, $_GET['id']);

		// make sql
		$sql = "SELECT * FROM products WHERE id = $id";

		// get the query result
		$result = mysqli_query($conn, $sql);

		// fetch result in array format
		$product = mysqli_fetch_assoc($result);

		//$prevtitle=$product['pd_name'];

		mysqli_free_result($result);
		mysqli_close($conn);
  }

	// update start


$price = $pd_name = $details = $image = '';
$errors = array('price' => '', 'pd_name' => '', 'details' => '','image'=>'' );


	if(isset($_POST['update'])){

		$id_to_update = mysqli_real_escape_string($conn, $_POST['id_to_update']);

		echo "<h3>Checking isSet</h3>";


		$price = $_POST['price'];
			$pd_name = $_POST['pd_name'];

			
  			$details = $_POST['details'];

 			 	

					$price = mysqli_real_escape_string($conn, $_POST['price']);
					$pd_name = mysqli_real_escape_string($conn, $_POST['pd_name']);
					$details = mysqli_real_escape_string($conn, $_POST['details']);
					

	
	
			// create sql
			//$sql = "UPDATE products(title,email,ingredients) VALUES('$title','$email','$ingredients')";
			$sql2 = "UPDATE products SET pd_name = '$pd_name', price = '$price', details='$details' 
			WHERE id = '$id_to_update'" ;
	
			// save to db and check
			if(mysqli_query($conn, $sql2)){
				// success
				header('Location: index.php');
			} else {
				echo 'query error: '. mysqli_error($conn);
			}
	
	
	
	} // end POST check




?>


<!DOCTYPE html>
<html lang="en">

<head>
	 <!-- bootstrap cdn -->
	 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
</head>

<?php include('templates/header.php'); ?>

<div class="container center">
  <?php if($product): ?>
		<img src="<?php echo $product['img'];?>" class="img-fluid mt-5" alt="" width="450px" height="400px">
    <h2 class="fw-bold"><?php echo $product['pd_name'];  ?></h2>
    <h5 class="text-danger fw-bold">price: $<?php echo $product['price']; ?></h5>
    <p><?php echo $product['details']; ?></p>
	

    <!-- DELETE FORM -->
			<form action="details.php" method="POST">
				<input type="hidden" name="id_to_delete" value="<?php echo $product['id']; ?>">
				<input type="submit" name="delete" value="Delete" class="btn brand z-depth-0">

			</form>
</div>


<!-- Update Form Start -->
<section class="container grey-text">
			<h4 class="center">Update Pizza</h4>
			<form class="white" action="details.php" method="POST">
			<input type="hidden" name="id_to_update" value="<?php echo $product['id']; ?>">

			<label>Your product name </label>
			<input type="text" name="pd_name" value="<?php echo htmlspecialchars ($product['pd_name']) ?>">
			<div class="red-text"><?php echo $errors['pd_name']; ?></div>
			<label>Product Price</label>
			<input type="text" name="price" value="<?php echo htmlspecialchars($product['price']) ?>">
			<div class="red-text"><?php echo $errors['price']; ?></div>
			<label>Product details</label>
			<input type="text" name="details" value="<?php echo htmlspecialchars($product['details']) ?>">
			<div class="red-text"><?php echo $errors['details']; ?></div>



			<div class="center">
				<input type="submit" name="update" value="Update" class="btn brand z-depth-0">
			</div>
		</form>

		</section>

<div>
<?php else: ?>
    <h5>No such pizza exists.</h5>
  <?php endif ?>
</div>



<?php include('templates/footer.php'); ?>


</html>