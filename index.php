<?php include 'includes/db.php'; ?>

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

        <style type="text/css">

        	html, body {
			    height: 100%;
			}

			body {
			    margin: 0;
			    padding: 0;
			    width: 100%;
			    display: table;
			    /*background: #F0C27B;
  				background: -webkit-linear-gradient(to left, #F0C27B , #4B1248); 
  				background: linear-gradient(to left, #F0C27B , #4B1248); */


background: #00C9FF; /* fallback for old browsers */
background: -webkit-linear-gradient(to left, #00C9FF , #92FE9D); /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to left, #00C9FF , #92FE9D); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        
        
			}

			#container {
			    text-align: center;
			    /*display: table-cell;*/
			    vertical-align: middle;
			    margin-top: 15%;
			}

			.content {
				font-family: 'Lato';
				font-weight: 100;
			    text-align: center;
			    display: inline-block;
			    color: #fff;
			}

			.title {
			    font-size: 126px;
			}

			#indexSlogan {
				text-transform: capitalize;
			}

        </style>

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
      <a class="navbar-brand" href="index.php">IHBH</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class=""><a href="meals.php">View Meals</a></li>
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

<div id="container">
    <div class="content">
        <div class="title">IHBH</div>
        <h3 id="indexSlogan">Helping you track your food and stay on target</h3>
    </div>
</div>

<?php include 'includes/footer.php'; ?>