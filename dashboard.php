<?php

//sql connection
$conn = new mysqli('localhost','root','','qutirmahal');
// Check for connection success
if(!$conn){
    die("connection to this database failed due to" . mysqli_connect_error());
}

//for updating quantity values

if(isset($_POST['update_update_btn'])){
   $update_value = $_POST['update_quantity'];
   $update_id = $_POST['update_quantity_id'];
   $update_quantity_query = mysqli_query($conn, "UPDATE `cart` SET quantity = '$update_value' WHERE id = '$update_id'");
   if($update_quantity_query){
      header('location:dashboard.php');
   };
};

if(isset($_GET['remove'])){
   $remove_id = $_GET['remove'];
   mysqli_query($conn, "DELETE FROM `cart` WHERE id = '$remove_id'");
   header('location:dashboard.php');
};

if(isset($_GET['delete_all'])){
   mysqli_query($conn, "DELETE FROM `cart`");
  
   header('location:home.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Bootstrap-cdn -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
 <!-- font awesome cdn link  -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
 <!-- custom css file link  -->
 <link rel="stylesheet" href="style.css">
</head>


<body>


<?php
@include 'navbar.php';
session_start();

	echo '<h1 style="margin-top: 100px; text-align:center">Welcome '.$_SESSION['users_first_name'].'
     '.$_SESSION['users_last_name'].'</h1>';
    
?>

     <p class="text-center my-5">
         <a class="btn btn-danger outline-none px-3" href="logout.php" role="button">Log Out</a>
    </p>


    <div class="container ">

<section class="shopping-cart">

   
  <div class="table-responsive">
  <table class="table table table-hover table-responsive">

<thead>
  
   <th>Name</th>
   <th>Price</th>
   <th>Quantity</th>
   <th>Total price</th>
   <th>Action</th>
</thead>

<tbody>

   <?php 
   
   $select_cart = mysqli_query($conn, "SELECT * FROM `cart`");
   $grand_total = 0;
   if(mysqli_num_rows($select_cart) > 0){
      while($fetch_cart = mysqli_fetch_assoc($select_cart)){
   ?>

   <tr>

      <td><?php echo $fetch_cart['name']; ?></td>
      <td>$<?php echo number_format($fetch_cart['price']); ?>/-</td>
      <td>
         <form  action=" " method="post" >
            <input  type="hidden" name="update_quantity_id"  value="<?php echo $fetch_cart['id']; ?>" >
            <input  type="number" name="update_quantity" min="1"  value="<?php echo $fetch_cart['quantity']; ?>" >
            <input  type="submit" value="update" name="update_update_btn" class="update-btn">
         </form>   
      </td>


      <td>$<?php echo $sub_total = ((int)$fetch_cart['price'] * (int)$fetch_cart['quantity']); ?>/-</td>

      <td><a href="dashboard.php?remove=<?php echo $fetch_cart['id']; ?>" onclick="return confirm('remove item from cart?')" class="delete-btn"> <i class="fas fa-trash"></i> Remove</a></td>
   </tr>
   <?php
     $grand_total += $sub_total;  
      };
   };
   ?>

   <tr class="table-bottom">
      <td class="fw-bolder">Grand total</td>
      <td></td>
      <td></td>
      <td class="fw-bolder">$<?php echo $grand_total; ?>/-</td>
      <td></td>
   </tr>

</tbody>

</table>

<table class="">

</table>




  </div>

<div class="control-panel ">

    <div>
        <a href="products.php" class="continue-btn" style="margin-top: 0;">continue shopping</a>
</div>
    <div>
        <a href="dashboard.php?delete_all" onclick="return confirm('are you sure you want to proceed?');" 
        class="proceed-btn">Proceed </a>
    </div> 

   
</div>



   

</section>

</div>
   

<!-- custom js file link  -->
<script src="script.js"></script>

</body>


</html>