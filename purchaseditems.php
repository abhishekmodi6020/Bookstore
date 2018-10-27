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
	 echo $custid;
      if($error==1){
        $query2= "SELECT order_id, Item_ID,I_Name, I_Description, O_Qty, O_Unit_price, O_Total_price from orders as o INNER JOIN items as i on  o.o_item_id = i.item_id where o.o_cust_id = $custid";
        echo $query2;
        $result = mysqli_query($connection, $query2);
        //echo $result;
        if($result){
            echo "Data fetched";
            //echo $result;
        }else{
            //echo $query2;
            die("Fetch failed".mysqli_error($connection));
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
      <h2 class="text-center text-success">Customer Order Details</h2>
      <br/>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-1">

    </div>
    <div class="col-sm-4">
      <!-- <div class="col-sm-12"> -->
        <form method="post" action="purchaseditems.php">
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
      <input type="submit" name="submit" class="btn btn-default btn-lg">
      <a href=""><button type="button" class="btn btn-default btn-lg">Cancel</button></a>
          </form>
          </div>
      </div>


  <div class="row">
    <div class="col-sm-1"></div>
    <div class="col-sm-10">
      <div class="about-bottom">
        <div class="bs-docs-example">
          <table class="table table-hover">
            <thead>
              <tr>
                 <!-- order_id, Item_ID,I_Name, O_Qty, O_Unit_price, O_Total_price -->
                <th>Order ID</th>
                <th>Item ID</th>
                <th>Item Name</th>
                <th>Quantity</th>
                <th>Unit Price</th>
                <th>Total Price</th>
              </tr>
            </thead>
            <tbody>
              <?php while($row=mysqli_fetch_assoc($result))
              // order_id, Item_ID,I_Name, I_Description, O_Qty, O_Unit_price, O_Total_price
              echo "<tr>
                <td>{$row['order_id']}</td>
                <td>{$row['Item_ID']}</td>
                <td>{$row['I_Name']}</td>
                <td>{$row['O_Qty']}</td>
                <td>{$row['O_Unit_price']}</td>
                <td>{$row['O_Total_price']}</td>
              </tr>"
              
               ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
