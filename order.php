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
  $qntyerror="";
  $unitpriceerror="";
  $orderdateerror="";
  $processedbyerror="";
  $passworderror="";
  $itemiderror="";
  $error = 1;



  $unitprice= $_POST['unitprice'];
  $custid=$_POST['custid'];
  $orderdate= date("Y-m-d H:i:s");//$_POST['orderdate'];
  $qnty=$_POST['qnty'];
  $processedby=$_POST['processedby'];
  $totalprice=$_POST['totalprice'];
  $itemid=$_POST['itemid'];
	//$dataTime = date("Y-m-d H:i:s");
  if(isset($_POST['submit'])){
    // custid Validation
      if(empty($custid)){
        $error = 0;
        $custiderror="Please fill this field";
      }

      // processedby Validation
        if(empty($processedby)){
          $error = 0;
          $processedbyerror="Please fill this field";
        }

      // qnty validation
      if(empty($qnty)){
        $error = 0;
        $qntyerror="Please fill this field";
      }

      // unitprice validation
      if (empty($_POST['unitprice'])) {
  			$error = 0;
  			$unitpriceerror = "Enter unitprice Number";
		  }


      // date error
      if(empty($orderdate)){
        $error=0;
        $orderdateerror= "Please select date";
      }

      if($error==1){
        $totalprice = $unitprice*$qnty;
        $query2= "Insert into orders(O_Cust_ID,O_Qty,O_ProcessedBy,O_Unit_price,Order_date,O_Total_price,O_Item_ID) Values ('$custid', '$qnty','$processedby','$unitprice','$orderdate','$totalprice','$itemid')";
        echo $query2;
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

      <h2 class="text-center text-success">Add Order</h2>
      <br/>

      <div class="col-sm-12">
          <form method="post" action="order.php">

            <p>Required information is marked with an asterisk (*)</p>
            <div class="form-group">
              <p>
                <label for="custid">* Customer ID:</label>
                <input type="number" class="form-control" name="custid" size="15">
                <span>
                  <?php echo $custiderror;
                  ?></span>
              </p>
            </div>

            <div class="form-group">
            <p>
              <label  for="itemid">Item ID:</label>
              <input type="number" class="form-control" name="itemid" id="itemid" size="15">
              <span>
                <?php echo $itemiderror;
                ?>
              </span>
            </p>
            </div>

            <div class="form-group">
              <p>
                <label  for="qnty">* Quantity:</label>
                <input type="number" class="form-control" name="qnty" id="qnty" size="15">
                <span>
                  <?php echo $qntyerror;
                  ?>
                </span>
              </p>
              </div>

              <div class="form-group">
              <p>
                <label  for="unitprice">Unit Price:</label>
                <input type="number" class="form-control" name="unitprice" id="unitprice" size="15">
                <span>
                  <?php echo $unitpriceerror;
                  ?>
                </span>
              </p>
              </div>
              

              <div class="form-group">
              <p>
                <label  for="processedby">Processed by: (Enter Staff ID)</label>
                <input type="number" class="form-control" name="processedby" id="processedby" size="15">
                <span>
                  <?php echo $processedbyerror;
                  ?>
                </span>
              </p>
              </div>

              <input type="submit" name="submit" class="btn btn-default btn-lg">
                 <a href=""><button type="button" class="btn btn-default btn-lg">Cancel</button></a>



          </form>



      </div>


    </div>

</body>
