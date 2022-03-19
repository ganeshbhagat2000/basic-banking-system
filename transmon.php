<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  </head>
  <body>
  <?php
include('config.php');
if(isset($_POST['submit'])){
    $from = $_GET['id'];
    $to = $_POST['to'];
    $amount = $_POST['amount'];

    $sql = "select * from userdetails where id=$from";
    $query = mysqli_query($conn,$sql);
    $pro1 = mysqli_fetch_assoc($query);

    $sql = "select * from userdetails where id=$to";
    $query = mysqli_query($conn,$sql);
    $pro2 = mysqli_fetch_assoc($query);

    if($amount < 0){
        echo '<script>alert("Amount cannot be negative.")</script>';
    }
    else if($amount == 0){
        echo '<script>alert("Amount cannot be zero")</script>';
    }
    else if($amount > $pro1['balance']){
        echo '<script>alert("Insufficient Balance");</script>';
    }
    else{
        //deducting balance from sender account.
        $transfer = $pro1['balance'] - $amount;
        $sql= "update userdetails set balance=$transfer where id=$from";
        mysqli_query($conn,$sql);

        //Adding balance to receiver account.
        $transfer = $pro2['balance'] + $amount;
        $sql= "update userdetails set balance=$transfer where id=$to";
        mysqli_query($conn,$sql);

        //showing Transaction History

        $sender = $pro1['name'];
        $receiver = $pro2['name'];
        $sql = "insert into trans (sender,receiver,amount) values('$sender','$receiver','$amount')";
        $query = mysqli_query($conn,$sql);
        if($query){
            echo '<script>alert("Transcation Successfull!");</script>';
            echo '<script>window.location.href="transaction.php"</script>';
        }
        $transfer=0;
        $amount=0;
    }
}
?>
<?php
    include('nav.php');
?>



<div class="container">
    <h3 class="text-primary mt-3 mb-3">Transfer Money</h3>
    <hr>
    <form class="row g-3" method="post" class="form1">


    <?php
            include('config.php');
            $sid = $_GET['id'];
            $query = "select * from userdetails where id =$sid";
            $query_run = mysqli_query($conn,$query);
            $rows=mysqli_fetch_assoc($query_run);
        ?>
        
  <div class="col-6">
    <label for="inputAddress2" class="form-label">From</label>
    <input type="text" class="form-control" id="inputAddress2" value="<?php echo $rows['name']?>">
  </div>
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Email</label>
    <input type="text" value="<?php echo $rows['email']?>" class="form-control" id="inputEmail4">
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Balance</label>
    <input type="text" value="<?php echo $rows['balance']?>" class="form-control" id="inputPassword4">
  </div>
  <div class="col-md-2">
    <label for="inputZip" class="form-label">Amount</label>
    <input type="text" class="form-control"  id="amount" name="amount" required>
  </div>
  <div class="col-md-8 mt-4 mb-3">
    <label for="inputState" class="form-label">To</label>
    <select name="to" class="select" class="form-select" required>
      <option disabled selected>Select another account for transfer</option>
                <?php
                    include('config.php');
                    $sql = "select * from userdetails where id!=$sid";
                    $query_run = mysqli_query($conn,$sql);
                    while($rows=mysqli_fetch_assoc($query_run)){
                ?>
                <option class="option" value="<?php echo $rows['id'];?>"><?php echo $rows['name']?></option>
                <?php
                    }
                ?>
    </select>
  </div>


  <div class="col-12">
    <button type="submit" name="submit" class="btn btn-primary">Transfer</button>
  </div>
</form>
</div>


    <?php
      include("foot.php");
    ?>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>