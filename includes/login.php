<?php include "db.php" ?>
<?php session_start(); ?>
<!DOCTYPE html>

<html class="site-control">

    <head>
        
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>IHBH</title>

        <!-- Bootstrap CSS -->
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>
    
    <body>            
    <nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="../index.php">IHBH</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class=""><a href="../meals.php">View Meals</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Categories <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Entrees</a></li>
            <li><a href="#">Fruits/Vegies</a></li>
            <li><a href="#">Grains/Starches</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">New Category...</a></li>
            <!-- <li role="separator" class="divider"></li>
            <li><a href="#">One more separated link</a></li> -->
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="includes/login.php">Login</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>


<div class="container-fluid">
	<div class="row">
		<div class="col-lg-12">
			<div style="width: 40%;	margin: 0 auto;" id="loginForm">

				<h1>Login to view your meals!</h1>

				<form action="" method="post" enctype="multipart/form-data">

					<div class="form-group">
						<label for="meal_entree">Username or Email</label>
						<input type="text" class="form-control" name="username">
					</div>

					<div class="form-group">
						<label for="meal_fruit_veg">Password</label>
						<input type="password" class="form-control" name="password">
					</div>

					<div class="form-group">
						<input class="btn btn-primary" type="submit" name="login" value="Login!">
					</div>

				</form>
				
			</div>
		</div>
	</div>
</div>

<?php 

	if(isset($_POST['login'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];

		$username = mysqli_real_escape_string($connection, $username);
		$password = mysqli_real_escape_string($connection, $password);

		$query = "SELECT * FROM users WHERE user_name = '{$username}' ";
		$select_user_query = mysqli_query($connection, $query);

		if(!$select_user_query) {
			die("Query Failed..." . mysqli_error($connection));
		}

		while($row = mysqli_fetch_assoc($select_user_query)) {

			$meal_user_id = $row['user_id'];
			$meal_username = $row['user_name'];
			$meal_user_password = $row['user_password'];
			$meal_user_firstname = $row['user_first'];
			$meal_user_lastname = $row['user_last'];
			$meal_user_email = $row['user_email'];

			echo $meal_user_id;

			if($username === $meal_username && $password === $meal_user_password) {

				$_SESSION['username'] = $meal_username;
				$_SESSION['firstname'] = $meal_user_firstname;
				$_SESSION['lastname'] = $meal_user_lastname;
				$_SESSION['user_id'] = $meal_user_id;

				header("Location: ../meals.php");
			} else {
				
				header("Location: ../index.php");
			}
		}
	}

?>

<?php include "footer.php" ?>