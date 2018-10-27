<?php
// Printing a welcome message if the user submitted their name // through the HTML form
echo 'My form testing';
if ($_POST['user_name']) {
print("Welcome, ") ;
print($_POST['user_name']);
}
else {
// Printing the form to enter the user name since no name has
// been entered yet
  print <<<_HTML_
  <FORM method="post" action="$_SERVER['PHP_SELF']">
  Enter your name: <input type="text" name="user_name">
  <BR/>
  <INPUT type="submit" value="SUBMIT NAME">
  </FORM>
  _HTML_;
}
?>
