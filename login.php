<?php
@include 'navbar.php';

	session_start();
	
	$conn = new mysqli('localhost','root','','qutirmahal');
	
	$unsuccessfulmsg = '';

	if(isset($_POST['submit'])){
		$users_email 			= $_POST['users_email'];
		$users_password 		= $_POST['users_password'];
		$passwordmd5 	= md5($users_password);
		
		if(empty($users_email)){
			$emailmsg = 'Enter an email.';
		}else{
			$emailmsg = '';
		}
		
		if(empty($users_password)){
			$passmsg = 'Enter your password.';
		}else{
			$passmsg = '';
		}
		
		if(!empty($users_email) && !empty($users_password)){
			$sql = "SELECT * FROM users WHERE users_email='$users_email' AND users_password = '$passwordmd5'";
			$query = $conn->query($sql);
			
			if($query->num_rows > 0){
				$row = $query->fetch_assoc();
				$users_first_name = $row['users_first_name'];
				$users_last_name = $row['users_last_name'];
				
				$_SESSION['users_last_name'] = $users_last_name;
				$_SESSION['users_first_name'] = $users_first_name;
				header('location:dashboard.php');
			}else{
				$unsuccessfulmsg = 'Wrong e-mail or Password!';
			}
		}
	}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap-cdn -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
</head>

<body>

    <div class="container">
        <div class="container" style="margin-top:150px">
            <h3 class="text-center">Welcome to <span class="text-danger fw-bold">QutirShop! </span>Please, Login Here_
            </h3>
            <p class="text-center text-success">
                <?php if(!empty($_SESSION['signupmsg'])){ echo $_SESSION['signupmsg']; } ?></p>
        </div>
        <div class="container" style="margin-top:50px">
            <div class="row">
                <div class="col-sm-3">
                </div>
                <div class="col-sm-6 border border-success rounded-2 p-3">
                    <div class="bg-light rounded-2  p-4">
                        <p class="text-danger"><?php echo $unsuccessfulmsg ?> </p>
                        <form action="" method="POST">
                            <div class="mt-4 pb-2">
                                <label for="email">Email:</label>
                                <input required type="email" name="users_email" class="form-control"
                                    placeholder="Enter your email" value="<?php
                                     if(isset($_POST['submit']))
                                     {echo $users_email; }
                                      ?>">
                                <span class="text-danger"><?php if(isset($_POST['submit'])){ echo $emailmsg; }?></span>
                            </div>

                            <div class="mt-3 pb-2">
                                <label for="password">Password:</label>
                                <input required type="password" name="users_password" class="form-control"
                                    placeholder="Enter your password">
                                <span class="text-danger">
                                    <?php if(isset($_POST['submit']))
                                    { echo $passmsg; }?>
                                </span>
                            </div>

                            <div class="mt-3 pb-2">
                                <button name="submit" class="btn btn-success px-4">Login</button>
                            </div>
                            <div class="mt-3 pb-2">
                                Don't have an account? <a href="register.php" class="text-decoration-none fw-bold">Sign
                                    Up Here</a>
                            </div>
                    </div>
                </div>
                <div class="col-sm-3">

                </div>
            </div>
        </div>
    </div>
</body>

</html>