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
    // Item name Validation
  /*  echo "<br>";
    echo "Your Entered: ";
    echo $Item_Name;
    echo "<br>";
    echo $Item_count;
    echo "<br>";
    echo $Description;
    echo "<br>";
    echo $ItemType;
    echo "<br>";
    echo $Item_image;
    echo "<br>";
    echo $IDirName;
    echo "<br>";
    echo "end of input collection, Starting validation error is ";
    echo $error;
    echo "<br>"; */
      if(empty($Item_Name)){
        $error = 0;
        $Item_Nameerror="Please fill this field";
      }
      else {
        if (!preg_match("/^[a-zA-Z]*$/",$Item_Name)) {
          $error = 0;
          $Item_Nameerror="Letters and white space only";
        }
      }

    // Item_count validation
   if (empty($Item_count)) {
      $error = 0;
      $Item_counterror = "Enter Item count";
      }

    // Item Description  Validation
      if(empty($Description)){
        $error = 0;
        $Descriptionerror="Please fill this field";
      }
         //Item image validation
      $check = getimagesize($_FILES["image"]["tmp_name"]);
      if($check !== false){
          $image = $_FILES['image']['tmp_name'];
          $imgContent = addslashes(file_get_contents($image));


        /*   //Create connection and select DB
          $db = new mysqli($dbHost, $dbuser, $dbpass, $dbname);

          // Check connection
          if($db->connect_error){
              die("Connection failed: " . $db->connect_error);
          }

          //$dataTime = date("Y-m-d H:i:s");

          //Insert image content into database
         $insert = $db->query("INSERT into ITEMS(Item_image, created) VALUES ('$imgContent', '$dataTime')");
          if($insert){
              echo "File uploaded successfully.";
          }else{
              echo "File upload failed, please try again.";
          }*/
      }
      // Movie Director Name Validation
        if(empty($IDirName)){
          $error = 0;
          $IDirNameerror="Please fill this field";
        }
        //echo "Test ";
        // echo $error;


      if($error==1){
        $query1="INSERT INTO ITEMS ( Item_count, I_Description,I_Subject_ID, Item_image, created,	I_Name,Item_Type,I_pdfSize,I_DirName,I_pub_Frequency)
        VALUES ('$Item_count', '$Description','1','$Item_image', '$dataTime','$Item_Name', '$ItemType', 1, '$IDirName',0)";
         //echo $query1;
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
      <h2 class="text-center text-success">Add Item</h2>
      <br/>
      <div class="col-sm-12">
          <form method="post" action="Item.php">
            <p>Required information is marked with an asterisk (*)</p>
            <div class="form-group">
              <p>
                <label for="Item name">* Item Name:</label>
                <input type="text" class="form-control" name="Item_Name"  size="15">
                <span>
                  <?php echo $Item_Nameerror;
                  ?></span>
              </p>
            </div>
            <div class="form-group">
              <p>
                <label  for="Item_count"> * Item count:</label>
                <input type="number" class="form-control" name="Item_count" size="15">
                <span>
                  <?php echo $Item_counterror;
                  ?>
                </span>
              </p>
            </div>
            <div class="form-group">
              <p>
                <label  for="Description">*Description:</label>
                <textarea name="Description" class="form-control" rows="2" cols="20"></textarea>
              </p>
            <span>
              <?php echo $Descriptionerror;
              ?></span>
            </div>
            <div class="form-group" >
            <label  for="Item type">* Item Type:</label>
            <input type="radio" name=ItemType id="Item Type"<?php if (isset($ItemType) && $ItemType=="Ebook") echo "checked";?> value="Ebook"> Ebook
            <input type="radio" name=ItemType id="Item Type"<?php if (isset($ItemType) && $ItemType=="Movie") $IDirName= "Yves";?> value="Movie"> Movie
            <input type="radio" name=ItemType id="Item Type"<?php if (isset($ItemType) && $ItemType=="Periodical") echo "checked";?> value="Periodical"> Periodical
            <span class="error"> <?php echo $ItemTypeerror;?></span>
            <br><br>
            </div>
            <div class="form-group">
              <label  for="Item_image"> Image:</label>
              <input type="file" name="Item_image"/>
              <!--<input type="submit" name="Upload" value="UPLOAD" /> -->
            </div>
            <div class="form-group">
              <p>
                <label for="IDirName">* Movie Director Name:</label>
                <input type="text" class="form-control" name="IDirName" size="15">
                <span>
                  <?php echo $IDirNameerror;
                  ?></span>
              </p>
            </div>
              <button type="submit" name="submit" class="btn btn-default btn-lg">Submit</button>
              <button type="button" class="btn btn-default btn-lg">Cancel</button></a>
          </form>
      </div>
    </div>
</body>
