
<?php include('includes/navbar.php')?>

<html>
<head>
  
  <title>TYLA Registration form</title>
  <link rel="stylesheet" href="styledup.css">
</head>
<body>
  <div class="container" >
    <form class="registration-form"  action="" method="post" enctype="multipart/form-data">
      <h2> <b>Registration Form </b></h2>
      <div class="form-group">
        <label> Name:</label>
        <input  type="text" name="Name" placeholder="Enter your Name"  required><br>
        <label> Address:</label>
        <input  type="text" name="Address"  placeholder="Enter your Address "  required><br>
        <label> Mobile:</label>
        <input  type="number" name="Mobile"  placeholder="Enter your Mobile "  required><br>
        <label> Email:</label>
        <input  type="email" name="Email"  placeholder="Enter your  Email"  required><br>
        <label> Occupation:</label>
        <input  type="text" name="Occupation"  placeholder="Enter your  Occupation"  required><br>
        <label> Salary:</label>
        <input  type="number" name="Salary"  placeholder="Enter your  Salary"  required><br>
        <label> Photo:</label>
        <input  type="file" name="Photo"  placeholder="Upload your Photo "  ><br>
        <label> Aadhar Card:</label>
        <input  type="file" name="Document1"  placeholder="Upload your Aadhar card here" ><br>
        <label> PAN Card:</label>
        <input  type="file" name="Document2"  placeholder="Upload your  PAN Card here" ><br>
        <label> Userid:</label>
        <input  type="text" name="Userid" placeholder="Enter your Userid"  required><br>
        <label> Password:</label>
        <input  type="password" name="Password" placeholder="Enter your Password"  required><br>
      <button  type="submit" name="registerform"  >submit </button> 
      </div>
      
    
    </form>
  </div>
</body>
</html>




<?php 
$con=mysqli_connect("localhost","root","root","tyla");
if(!$con)
{
  echo "connection failed";
}
if(isset($_POST["registerform"]))
{
$Name=$_POST["Name"];
$Address=$_POST["Address"];
$Mobile=$_POST["Mobile"];
$Email=$_POST["Email"];
$Occupation=$_POST["Occupation"];
$Salary=$_POST["Salary"];
$Photo=$_FILES["Photo"]["name"]; 
$Document1=$_FILES["Document1"]["name"];
$Document2=$_FILES["Document2"]["name"];
$Userid=$_POST["Userid"];
$Password=$_POST["Password"];

$Photo_tmp=$_FILES["Photo"]["tmp_name"]; 
$Document1_tmp=$_FILES["Document1"]["tmp_name"];
$Document2_tmp=$_FILES["Document2"]["tmp_name"];

$photo_dest="uploads/photo/".$Photo;
$document_dest1="uploads/document/".$Document1;
$document_dest2="uploads/document/".$Document2;

move_uploaded_file($Photo_tmp, $photo_dest);
move_uploaded_file($Document1_tmp, $document_dest1);
move_uploaded_file($Document2_tmp, $document_dest2);


$insert=$con->query("INSERT INTO tyla.register (`Name`,`Mobile`,`Address`,`Email`,`Occupation`,`Salary`,`Photo`,`Document1`,`Document2`,`Userid`,`Password`) VALUES 
                                           ('$Name','$Mobile','$Address','$Email','$Occupation','$Salary','$photo_dest','$document_dest1','$document_dest2','$Userid','$Password')");


if($insert){
  echo "<script>alert ('registration completed'); </script>";
  header("location:login.php");
}
else
{
  echo "<script>alert ('".mysqli_error($con)."'); </script>";


}
}

?>
<?php include('includes/footer.php')?>








