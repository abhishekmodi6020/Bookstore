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
  // $custiderror="";
  // $qntyerror="";
  // $unitpriceerror="";
  // $orderdateerror="";
  // $processedbyerror="";
  // $passworderror="";
  $orderiderror="";
  $error = 1;



  // $unitprice= $_POST['unitprice'];
  // $custid=$_POST['custid'];
  // $orderdate=$_POST['orderdate'];
  // $qnty=$_POST['qnty'];
  // $processedby=$_POST['processedby'];
  // $totalprice=$_POST['totalprice'];
  // $itemid=$_POST['itemid'];
  $orderid =$_POST['orderid'];

  if(isset($_POST['submit'])){
    // custid Validation
      if(empty($orderid)){
        $error = 0;
        $orderiderror="Please fill this field";
      }

      if($error==1){
        $query2= "SELECT order_id, O_Cust_ID,O_Qty,O_ProcessedBy,O_Unit_price,Order_date,O_Total_price,O_Item_ID from orders where order_id = $orderid";
        echo $query2;
        $result = mysqli_query($connection, $query2);
        // print_r($result);
        $row = mysqli_fetch_row($result);
        if($result){
            echo "Data fetched";
        }else{
            echo $query2;
            die("fetch failed".mysqli_error($connection));
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

      <h2 class="text-center text-success">Order Details</h2>
      <br/>

      <div class="col-sm-12">
          <form method="post" action="orderdetails.php">

            <p>Required information is marked with an asterisk (*)</p>
            <div class="form-group">
              <p>
                <label for="orderid">* Enter Order ID:</label>
                <input type="number" class="form-control" name="orderid" size="15" value="<?php echo $row['0']; ?>">

              </p>
            </div>
            <div class="form-group">
              <p>
                <label for="custid">Customer ID:</label>
                <input type="number" class="form-control" name="custid" size="15" disabled value="<?php echo $row['1']; ?>">

              </p>
            </div>

            <div class="form-group">
            <p>
              <label  for="itemid">Item ID:</label>
              <input type="number" class="form-control" name="itemid" id="itemid" size="15" disabled  value="<?php echo $row[7]; ?>">

            </p>
            </div>

            <div class="form-group">
              <p>
                <label  for="qnty">Quantity:</label>
                <input type="number" class="form-control" name="qnty" id="qnty" size="15" disabled  value="<?php echo $row[2]; ?>">

              </p>
              </div>

              <div class="form-group">
              <p>
                <label  for="unitprice">Unit Price:</label>
                <input type="number" class="form-control" name="unitprice" id="unitprice" size="15" disabled  value="<?php echo $row[4]; ?>">

              </p>
              </div>
              <div class="form-group">
              <p>
                <label  for="totalprice">Total Price:</label>
                <input type="number" class="form-control" name="totalprice" id="totalprice" size="15" disabled  value="<?php echo $row[6]; ?>">

              </p>
              </div>

              <div class="form-group">
              <p>
                <label  for="orderdate">Order Date:</label>
                <input type="date" class="form-control" name="orderdate" id="orderdate" size="15" disabled  value="<?php echo $row[5]; ?>">

              </p>
              </div>

              <div class="form-group">
              <p>
                <label  for="processedby">Processed by:</label>
                <input type="number" class="form-control" name="processedby" id="processedby" size="15" disabled  value="<?php echo $row[3]; ?>">
              </p>
              </div>

              <input type="submit" name="submit" class="btn btn-default btn-lg">
                 <a href=""><button type="button" class="btn btn-default btn-lg">Cancel</button></a>



          </form>



      </div>


    </div>

</body>
