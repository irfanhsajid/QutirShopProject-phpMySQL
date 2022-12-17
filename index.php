<?php

  $server = "localhost";
  $username = "root";
  $password = "";

  // Create a database connection
  $conn = mysqli_connect($server, $username, $password,'qutirmahal');

  // Check for connection success
  if(!$conn){
      die("connection to this database failed due to" . mysqli_connect_error());
  }
  // echo "Success connecting to the db";
  include('config/db_connect.php');

  // write query for all products
	$sql = 'SELECT pd_name, price, id, img,details FROM products';

	// get the result set (set of rows)
	$result = mysqli_query($conn, $sql);

	// fetch the resulting rows as an array
	$products = mysqli_fetch_all($result, MYSQLI_ASSOC);

	// free the $result from memory (good practise)
	mysqli_free_result($result);

	// close connection
	mysqli_close($conn);

	//print_r($products);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <?php include('templates/header.php'); ?>

	<h4 class="center grey-text">Available Products!</h4>

	<div class="container">
		<div class="row">

			<?php foreach($products as $product){ ?>

				<div class="col s6 md3">
					<div class="card z-depth-0">
          <img src=" <?php echo htmlspecialchars($product['img']); ?>"class="pizza">
						<div class="card-content center">
							<h6><?php echo htmlspecialchars($product['pd_name']); ?></h6>
							<div><?php echo htmlspecialchars($product['price']); ?></div>
							<div><?php echo htmlspecialchars($product['details']); ?></div>
						</div>
						<div class="card-action right-align">
            <a class="brand-text" href="details.php?id=<?php echo $product['id'] ?>">more info</a>
						</div>
					</div>
				</div>

			<?php } ?>

		</div>
	</div>

	<?php include('templates/footer.php'); ?>

</head>
<body>
  
</body>
</html>