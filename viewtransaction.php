
<?php include('includes/navbar.php')?>
<?php
$con=mysqli_connect("localhost","root","root","tyla");
if($con)
{
    
}
else{
    echo "not connected";
}
    $LoanName="Personal Loan";
    $TransactionStatus="Pending";
    $DateANDtime=date('Y-m-d H:i:s');
    $Userid=$_SESSION['Userid'];
      $s=$con->query("SELECT * FROM `transaction` where `Userid`='$Userid' ");
      
  if($s->num_rows>0){
  ?>
  
  <div class="container">
  <table class="table table-dark table-striped-columns">
    <tr>
      <td>Loan Name</td>
      <td>Transaction Status</td>
      <td>Date And Time</td>
      <td>Aadhar Card</td>
      <td>PAN Card</td>
      <td>Userid</td>
    </tr>
  <?php
  while($r=mysqli_fetch_array($s))
  {
  ?>
  <tr >
    <form action="" method="post">
    <td><?php echo $r['LoanName'];?></td>
    <td><?php echo $r['TransactionStatus'];?></td>
    <td><?php echo $r['DateANDtime'];?></td>
    <td><a href="<?php echo $r['Document1'];?>" download > view document</a></td>
    <td><a href="<?php echo $r['Document2'];?>" download > view document</a></td>
    <td><?php echo $r["Userid"];?></td>
    
  </tr>
  <?php
  }
  ?>
  </table>
  
   
  <?php
  }
  else
  {
    echo "No Results Found";
  }
  ?>
</div>
      <?php include('includes/footer.php')?>
      


