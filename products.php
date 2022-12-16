<?php
include 'navbar.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap cdn -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <title>Products</title>
</head>

<style>
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
</style>

<body>
    <section class="container mb-5 text-center " id="backpack">
        <h2>Backpack</h2>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            <div class="col">
                <div class="card border-0 shadow-lg rounded-3 h-100">
                    <img src="https://i.ibb.co/6RvynTx/Ethnic-Pot.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Red Laltu Bag</h5>
                        <h5 class="price">$120</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                            additional content. This content is a little bit longer.</p>
                    </div>
                    <div class="m-3">
                        <button class="buy-now-btn">Buy Now</button>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card border-0 shadow-lg rounded-3 h-100">
                    <img src="https://i.ibb.co/MSW3r4Z/Flower-Vase.jpg " class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Blue Niltu Bag</h5>
                        <h5 class="price">$230</h5>
                        <p class="card-text">This card has supporting text below as a natural lead-in to additional
                            content.</p>
                    </div>
                    <div class="m-3">
                        <button class="buy-now-btn">Buy Now</button>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card border-0 shadow-lg rounded-3 h-100">
                    <img src="https://i.ibb.co/GxVdYfD/High-Vase.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Black Kaltu Bag</h5>
                        <h5 class="price">$420</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                            additional content. This card has even longer content than the first to show that equal
                            height action.</p>
                    </div>
                    <div class="m-3">
                        <button class="buy-now-btn">Buy Now</button>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card border-0 shadow-lg rounded-3 h-100">
                    <img src="https://i.ibb.co/wr1Djr7/Ceylon-Vase.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Black Kaltu Bag</h5>
                        <h5 class="price">$420</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                            additional content. This card has even longer content than the first to show that equal
                            height action.</p>
                    </div>
                    <div class="m-3">
                        <button class="buy-now-btn">Buy Now</button>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card border-0 shadow-lg rounded-3 h-100">
                    <img src="https://i.ibb.co/GxVdYfD/High-Vase.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Black Kaltu Bag</h5>
                        <h5 class="price">$420</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                            additional content. This card has even longer content than the first to show that equal
                            height action.</p>
                    </div>
                    <div class="m-3">
                        <button class="buy-now-btn">Buy Now</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>

</html>