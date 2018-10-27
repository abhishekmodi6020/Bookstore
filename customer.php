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
  $nameerror="";
  $emailerror="";
  $phoneerror="";
  $createddateerror="";
  $usernameerror="";
  $passworderror="";
  $ccinfoerror="";
  $error = 1;



  $phone= $_POST['phone'];
  $name=$_POST['name'];
  $createddate= date("Y-m-d H:i:s"); //$_POST['createddate'];
  $email=$_POST['email'];
  $address =$_POST['address'];
  $username=$_POST['username'];
  $password=$_POST['password'];
  $ccinfo=$_POST['ccinfo'];

  if(isset($_POST['submit'])){
    // First name Validation
      if(empty($name)){
        $error = 0;
        $nameerror="Please fill this field";
      }
      // else {
      //   if (!preg_match("/^[a-zA-Z]*$/",$name)) {
      //     $error = 0;
      //     $nameerror="Letters and white space only";
      //   }
      // }

      // user name Validation
        if(empty($username)){
          $error = 0;
          $usernameerror="Please fill this field";
        }

      // Email validation
      if(empty($email)){
        $error = 0;
        $emailerror="Please fill this field";
      }
      else {
        $email = $_POST['email'];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $error = 0;
          $emailerror="Invalid Email format";
        }
      }

      // Phone validation
      if (empty($_POST['phone'])) {
  			$error = 0;
  			$phoneerror = "Enter Phone Number";
  			}
      else if (strlen($_POST["phone"]) != '10') {
          	$phoneerror = "Phone Number should be 10 digits";
            $error = 0;
      	}


      // date error
      if(empty($createddate)){
        $error=0;
        $createddateerror= "Please select date";
      }

      // ccinfo error
      if (empty($_POST['ccinfo'])) {
  			$error = 0;
  			$phoneerror = "Enter Credit/Debit Card Number";
  			}
      else if (strlen($_POST["ccinfo"]) != '16') {
          	$phoneerror = "Card Number should be 16 digits";
            $error = 0;
      	}


      if($error==1){


        $query2= "Insert into customers_p(Cust_IDPhone_no,Cust_Name,Cust_CreatedDate,Cust_Email,Cust_Address,Cust_Username,Cust_password,Cust_CreditCard_infos) Values ('$phone','$name', '$createddate','$email','$address','$username','$password','$ccinfo')";
        // echo $query2;
        $result = mysqli_query($connection, $query2);
        if($result){
            echo "Data inserted";
        }else{
            echo $query2;
            die("Insert failed".mysqli_error($connection));
        }

      }

    }

?>




<html lang="en">
<head>
  <!-- Meta-Tags -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="keywords" content="Premier Realty a Responsive Web Template, Bootstrap Web Templates, Flat Web Templates, Android Compatible Web Template, Smartphone Compatible Web Template, Free Webdesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design"> -->
		<!-- <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script> -->
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

      <h2 class="text-center text-success">Add Customer</h2>
      <br/>

      <div class="col-sm-12">
          <form method="post" action="customer.php">

            <p>Required information is marked with an asterisk (*)</p>
            <div class="form-group">
              <p>
                <label for="name">* Name:</label>
                <input type="text" class="form-control" name="name" size="15">
                <span>
                  <?php echo $nameerror;
                  ?></span>
              </p>
            </div>
            <div class="form-group">
              <p>
                <label for="name">* User Name:</label>
                <input type="text" class="form-control" name="username" size="15">
                <span>
                  <?php echo $usernameerror;
                  ?></span>
              </p>
              </div>
              <div class="form-group">
              <p>
                <label  for="email">* E-mail:</label>
                <input type="email" class="form-control" name="email" id="email" size="15">
                <span>
                  <?php echo $emailerror;
                  ?>
                </span>
              </p>
              </div>
              <div class="form-group">
              <p>
                <label  for="password">* Password</label>
                <input type="password"  class="form-control" name="password" id="password" size="15" required>
                <span>
                  <?php echo $passworderror;
                  ?>
                </span>
              </p>
              </div>
              <div class="form-group">
              <p>
                <label  for="phone">Phone:</label>
                <input type="number" class="form-control" name="phone" id="phone" size="15">
                <span>
                  <?php echo $phoneerror;
                  ?>
                </span>
              </p>
              </div>
              
              <div class="form-group">
              <p>
                <label  for="address">Address:</label>
                <textarea name="address" class="form-control" rows="2" cols="20"></textarea>
              </p>
              </div>
              <div class="form-group">
              <p>
                <label  for="ccinfo">Credit Card Info:</label>
                <input type="text" class="form-control" name="ccinfo" id="ccinfo" size="15">
                <span>
                  <?php echo $ccinfoerror;
                  ?>
                </span>
              </p>
              </div>
              <input type="submit" name="submit" class="btn btn-default btn-lg">
                 <a href="adminmanageuser.html"><button type="button" class="btn btn-default btn-lg">Cancel</button></a>

          </form>



      </div>


    </div>

</body>
