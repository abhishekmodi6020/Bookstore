<?php
  $dbhost ="localhost";
  $dbuser= "root";
  $dbpass= "root";
  $dbname= "bookstore_p";
  $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
  if(mysqli_connect_error()){
      die("Database connection failed".mysqli_connect_error());
  }
?>
<?php
  $custiderror="";
  $error = 1;

  $custid =$_POST['custid'];
  if(isset($_POST['submit'])){
    // custid Validation
      if(empty($custid)){
        $error = 0;
        $custiderror="Please fill this field";
      }

      if($error==1){
        $query2= "DELETE FROM customers_p where cust_id = $custid";
        echo $query2;
        $result = mysqli_query($connection, $query2);
        if($result){
            echo "Data Deleted";
        }else{
            echo $query2;
            die("Delete failed".mysqli_error($connection));
        }
      }
    }

?>


<html lang="en">
<head>
  <!-- Meta-Tags -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="keywords" content="Premier Realty a Responsive Web Template, Bootstrap Web Templates, Flat Web Templates, Android Compatible Web Template, Smartphone Compatible Web Template, Free Webdesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design">
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!-- //Meta-Tags -->
	<!-- Custom-Theme-Files -->
	<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" media="all">
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
	<!-- //Custom-Theme-Files -->
</head>


<body>

  <div class="container">
    <div class="row">
      <div class="col-sm-4"> </div>
      <div class="col-md-4">
      </br>
      <h2 class="text-center text-success">Delete Customer</h2>
      <br/>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-1">

    </div>
    <div class="col-sm-4">
      <!-- <div class="col-sm-12"> -->
        <form method="post" action="deletecustomer.php">
          <div class="form-group">
            <p>
              <label for="custid">* Enter Customer ID:</label>
              <input type="number" class="form-control" name="custid" size="15">
            </p>
          </div>
      <!-- </div> -->
    </div>
    <div class="col-sm-4">

    </div>
    <div class="col-sm-3">
      <input type="submit" name="submit" class="btn btn-default btn-lg" value="Delete">
      <a href="index.php"><button type="button" class="btn btn-default btn-lg">Cancel</button></a>
          </form>
          </div>
      </div>
