
<body>
<?php include('includes/navbar.php')?>

<?php
$con=mysqli_connect("localhost","root","root","tyla");
if(isset($_GET["update"])){
  $Name=$_GET["Name"];
  $Address=$_GET["Address"];
  $Mobile=$_GET["Mobile"];
  $Email=$_GET["Email"];
  $Occupation=$_GET["Occupation"];
  $Salary=$_GET["Salary"];
  $Photo=$_GET["Photo"];
  $Document1=$_GET["Document1"];
  $Document2=$_GET["Document2"];
  $Userid=$_GET["update"];
  $Password=$_GET["Password"];
  $update=$con->query("UPDATE `register` SET `Name`='$Name',`Address`='$Address',`Mobile`='$Mobile',`Email`='$Email',`Occupation`='$Occupation',`Salary`='$Salary',`Photo`='$Photo',`Document1`='$Document1',`Document2`='$Document2',`Password`='$Password' WHERE `Userid`='$Userid'");
}
if(isset($_GET["delete"]))
{

$d=$_GET["delete"];
$delete=$con->query("DELETE FROM register WHERE Userid='$d'");
}

  $register=$con->query("SELECT * FROM register ");
    
if($register->num_rows>0){
?>
<style>
  
  .col{
    padding-bottom:10%;
  }
  body{
    background:none;
  }
  
</style>
  

<div class="container">
<div class="row p-5">
<?php
while($r=mysqli_fetch_array($register))
{
?>

<div class="col">
    
    <form action="" method="get" >
    <div class="card" style="width: 20rem;">
    <div class="card-body">
      <h1 class="card-title"><?php echo $r["Userid"];?></h1>
      <h5 class="card-subtitle">Name<input class="form-control " type="text" name="Name" value="<?php echo $r['Name'];?>"></h5>
      <p class="card-text">Address<input class="form-control " type="text" name="Address" value="<?php echo $r['Address'];?>"></p>
      <p class="card-text">Mobile<input class="form-control " type="text" name="Mobile" value="<?php echo $r['Mobile'];?>"></p>
      <p class="card-text">Email<input class="form-control " type="text" name="Email" value="<?php echo $r['Email'];?>"></p>
      <p class="card-text">Occupation<input class="form-control " type="text" name="Occupation" value="<?php echo $r['Occupation'];?>"></p>
      <p class="card-text">Salary<input class="form-control " type="text" name="Salary" value="<?php echo $r['Salary'];?>"></p>
      <p class="card-text">Photo<input class="form-control " type="text" name="Photo" value="<?php echo $r['Photo'];?>"></p>
      <p class="card-text">Aadhar Card<a href="<?php echo $r['Document1'];?>" download > view document</a></p>
      <p class="card-text">PAN Card<a href="<?php echo $r['Document2'];?>" download > view document</a></p>
      <p class="card-text">Password<input class="form-control " type="text" name="Password" value="<?php echo $r['Password'];?>"></p>
      <button type="submit" class="btn w-100 mt-2   btn-warning" name="update" value="<?php echo $r['Userid'];?>">UPDATE</button> </form>
      <form action="" method="get"><button name="delete" class=" btn w-100 mt-2  btn-danger" type="submit" value=<?php echo $r["Userid"];?>>DELETE</button></form>
    </div>
  </div>
  
  </div>

<?php
}
}
else
{
  echo "Table is empty";
}
?>
</div>
</div>
<?php include('includes/footer.php')?>
</body>