<?php 
	session_start();
	echo '<h1>Welcome '.$_SESSION['users_first_name'].' '.$_SESSION['users_last_name'].'</h1>';
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
</head>

<body>
    <p>
        <a class="btn btn-danger outline-none px-3" href="logout.php" role="button">Log Out</a>
    </p>
</body>

</html>