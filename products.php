<?php
@include 'navbar.php';

$conn = new mysqli('localhost','root','','qutirmahal');

// Check for connection success
if(!$conn){
    die("connection to this database failed due to" . mysqli_connect_error());
}



  // write query for selecting all products
  $sql = 'SELECT id, pd_name, price,details, img FROM products';

	// get the result set (set of rows)
	$result = mysqli_query($conn, $sql);

    // fetch the resulting rows as an array
	$products = mysqli_fetch_all($result, MYSQLI_ASSOC);

// for posting product details into order table
    
    if(isset($_POST['add_to_cart'])){
        
        // escape sql chars
        $product_name = mysqli_real_escape_string($conn, $_POST['product_name']);
        $product_price = mysqli_real_escape_string($conn, $_POST['product_price']);
        $product_quantity = 1;
        //echo $product_name, $product_price;
       $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name'");
    
         if(mysqli_num_rows($select_cart) > 0){
            $message[] = "product already added to cart";
       }else{
            $insert_product = mysqli_query($conn, "INSERT INTO `cart`( name, price, quantity) 
            VALUES('$product_name', '$product_price', '$product_quantity')");
               $message[] = " Product added to cart successfully";
         }
     
     }

    // close connection
	mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap cdn -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
  <!-- font awesome cdn link  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<!-- custom css file link  -->
<link rel="stylesheet" href="style.css">
    <title>Products</title>
</head>

<style>
    /* .products{
        margin-top:150px;
    } */
.card-title {
    font-weight: bolder;
}

.price {
    color: #FF136F;
}

.buy-now-btn {
    background-image: linear-gradient(to bottom, #FF589B 0%, #FF136F 100%);
    color: #fff;
    border: none;
    border-radius: 8px;
    padding: 9px 25px;
    cursor: pointer;
    margin-top: 5px;
}
.buy-now-btn:hover{
    background:black;
    color:#FF589B; 
    transition:.5s;
}
</style>

<body>
    <?php
if(isset($message)){
   foreach($message as $message){
      echo '<div class="message"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
   };
};

?>
    <section class="container products mb-5 text-center " id="" >
 <div class="text-center my-5">
    <h1>
        Welcome to <span class="text-danger">QutirMahal_!</span>
        
    </h1>
    <br>
    <b>...Meet your needs here...</b>
    <p>------------</p>
 </div>


    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">

        <?php foreach($products as $product){ ?>

        <form action="" method="post">
         <div class="col">
             <div class="card border-0 shadow-lg rounded-3 h-100">
                 <img src="<?php echo htmlspecialchars($product['img']); ?>" class="card-img-top" alt="...">
                 <div class="card-body">
                     <h5 class="card-title"><?php echo htmlspecialchars($product['pd_name']); ?></h5>
                     <h5 class="price"> $ <?php echo htmlspecialchars($product['price']); ?></h5>
                     <p class="card-text"><?php echo substr( $product['details'], 0,150); ?></p>
                 </div>
                 <div class="m-3">

                    <!-- sebding product info to the orders table -->
                 <input type="hidden" name="product_name" value="<?php echo $product['pd_name']; ?>">
         <input type="hidden" name="product_price" value="<?php echo $product['price']; ?>">
         <input  type="submit" id="#menu_btn" class="buy-now-btn" value="add to cart" name="add_to_cart" >
                 </div>
             </div>
         </div>
   </form>

	    <?php } ?>


        </div>
        
    </section>
<!-- custom js file link  -->
<script src="script.js"></script>
</body>

</html>