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
  $dataTime = date("Y-m-d H:i:s");
  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  if(isset($_POST['submit'])){
 


    // Item_count validation
   if (empty($Item_count)) {
      $error = 0;
      $Item_counterror = "Enter Item count";
      }
	  

      if($error==1){
        $query1="UPDATE items set item_count = $Item_count where Item_Type = '$ItemType' ";
         echo $query1;
        $result = mysqli_query($connection, $query1);
        if($result){
            echo " Data saved successfully";
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
      <h2 class="text-center text-success">Update Item</h2>
      <br/>
      <div class="col-sm-12">
          <form method="post" action="itemupdate.php">

            <div class="form-group" >
            <label  for="Item type">* Item Type:</label>
            <input type="radio" name=ItemType id="Item Type"<?php if (isset($ItemType) && $ItemType=="Ebook") echo "checked";?> value="Ebook"> Ebook
            <input type="radio" name=ItemType id="Item Type"<?php if (isset($ItemType) && $ItemType=="Movie") $IDirName= "Yves";?> value="Movie"> Movie
            <input type="radio" name=ItemType id="Item Type"<?php if (isset($ItemType) && $ItemType=="Periodical") echo "checked";?> value="Periodical"> Periodical
            <span class="error"> <?php echo $ItemTypeerror;?></span>
            <br><br>
            </div>
            <div class="form-group">
              <p>
                <label  for="Item_count">Item count:</label>
                <input type="number" class="form-control" name="Item_count" size="15">
                <span>
                  <?php echo $Item_counterror;
                  ?>
                </span>
              </p>
            </div>

              <button type="submit" name="submit" class="btn btn-default btn-lg">Update</button>
              <a href="index.php"><button type="button" class="btn btn-default btn-lg">Cancel</button></a>
          </form>
      </div>
    </div>

</body>
