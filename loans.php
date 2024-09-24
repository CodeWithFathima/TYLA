<?php include('includes/navbar.php')?>
<style>
        .container{
                padding-bottom:28%;
        }
        body{
            width:100%;
            height:100vh;
            background: url(uploads/images/admin.jpg);
            background-size:cover;
            background-position:center;
        }
</style>
<div class="container pt-5 mt-5">
   <div class="row gap-4">
        <a class="col btn btn-primary" href="personal.php">Personal Loan</a><br>
        <a class="col btn btn-primary" href="business.php">Business Loan</a><br>
        <a class="col btn btn-primary" href="education.php">Education loan</a><br>
</div>
</div>
<?php include('includes/footer.php')?>