<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>House Form</title>

    <!-- css -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/font-awesome.min.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="js/lodash.js"></script>
    <script src="js/jquery-2.2.3.min.js"></script>
	<script src="js/backbone.js"></script>
	<script src="js/app.js"></script>
	<script src="js/autoNumeric.min.js"></script>
  </head>
  <body>
	<meta name="csrf-token" content="{{ csrf_token() }}" />
  	<div class="container">
		<h4>Search</h4>
		<form>
			<div class="row form-group">
				<div class="col-md-8">
					<input type="text" class="form-control" name="name" id="nameinput" placeholder="Name"></input>
				</div>
				<div class="col-md-2">
					<input type="text" class="form-control" name="minprice" id="minpriceinput" placeholder="Min Price"></input>
				</div>
				<div class="col-md-2">
					<input type="text" class="form-control" name="maxprice" id="maxpriceinput" placeholder="Max Price"></input>
				</div>
			</div>
			<div class="row form-group">
				<div class="col-md-3">
					<input type="text" class="form-control" name="bedrooms" id="roominput" placeholder="Bedrooms"></input>
				</div>
				<div class="col-md-3">
					<input type="text" class="form-control" name="bathrooms" id="bathroominput" placeholder="Bathrooms"></input>
				</div>
				<div class="col-md-3">
					<input type="text" class="form-control" name="storeys" id="storeyinput" placeholder="Storeys"></input>
				</div>
				<div class="col-md-3">
					<input type="text" class="form-control" name="garages" id="garageinput" placeholder="Garages"></input>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<button type="button" id="search-submit" class="btn btn-primary">
						<i class="fa fa-search"></i>
						<i class="fa fa-refresh fa-spin"></i>
					</button>
				</div>
			</div>
		</form>
		<table class="table table-striped table-hover">
			<h4>Results</h4>
			<thead>
				<tr></tr>
			</thead>
			<tbody>
			</tbody>
		</table>
	</div>
  </body>
</html>
