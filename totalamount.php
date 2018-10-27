<?php
  $dbhost ="localhost";
  $dbuser= "root";
  $dbpass= "root";
  $dbname= "BOOKSTORE_P";
  //create connection
  $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
  //check connection
  if(mysqli_connect_error()){
      die("Database connection failed".mysqli_connect_error());
  }
  echo "Connected successfully";
?>

<?php
  $Item_Nameerror="";
  $Descriptionerror="";
  $Item_counterror="";
  $Item_imageerror="";
  $IcreatedByerror="";
  $ItemTypeerror="";
  $IPdferror="";
  $IDirNameerror="";
  $IPubFreqerror="";
  $error = 1;

  $Item_Name=$_POST['Item_Name'];
  $Description =$_POST['Description'];
  $Item_count=$_POST['Item_count'];
  $Item_image= $_POST['Item_image'];
  //$IcreatedBy=$_POST['createdBy'];
  $ItemType=$_POST['ItemType'];
  $IDirName=$_POST['IDirName'];
  $orderdate= $_POST['orderdate'];
  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  if(isset($_POST['submit'])){

      if($error==1){
        $query1="SELECT o_total_price from orders inner join items on items.item_id = ORDERS.o_item_id where items.Item_Type = '$ItemType' and orders.order_date = '$orderdate'";
        //$query1="UPDATE items set item_count = $Item_count where Item_Type = '$ItemType' ";
         echo $query1;
        $result = mysqli_query($connection, $query1);
        if($result){

            echo " successfully";
            mysqli_close($connection);
        }else{
            // echo $query1;
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
      <h2 class="text-center text-success">Total Amount</h2>
      <br/>
      <div class="col-sm-12">
          <form method="post" action="totalamount.php">

            <div class="form-group" >
            <label  for="Item_type">* Item Type:</label>
            <input type="radio" name=ItemType id="Item Type"<?php if (isset($ItemType) && $ItemType=="Ebook") echo "checked";?> value="Ebook"> Ebook
            <input type="radio" name=ItemType id="Item Type"<?php if (isset($ItemType) && $ItemType=="Movie") $IDirName= "Yves";?> value="Movie"> Movie
            <input type="radio" name=ItemType id="Item Type"<?php if (isset($ItemType) && $ItemType=="Periodical") echo "checked";?> value="Periodical"> Periodical
            <span class="error"> <?php echo $ItemTypeerror;?></span>
            <br><br>
            </div>

            <div class="form-group">
            <p>
              <label  for="orderdate">Order Date:</label>
              <input type="date" class="form-control" name="orderdate" id="orderdate" size="15">
              <span>
                <?php echo $orderdateerror;
                ?>
              </span>
            </p>
            </div>

              <button type="submit" name="submit" class="btn btn-default btn-lg"> Load </button>
              <a href="index.php"><button type="button" class="btn btn-default btn-lg">Cancel</button></a>
          </form>
      </div>
    </div>
</div>
<div class="row">
  <div class="col-sm-1"></div>
  <div class="col-sm-10">
    <?php $total = 0;
      while($row=mysqli_fetch_assoc($result))
          $total = $total + $row['o_total_price'] ?>
    <p>Total Purchased Amount = <?php echo "$total"?></p>
  </div>
</div>
</body>
