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
        include("config.php");
    ?>

    <?php

      include("nav.php");
    ?>


    <div class="container">
        <h3 class="mt-3 text-primary mb-4">Transaction History</h3>
        <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Sender</th>
      <th scope="col">Receiver</th>
      <th scope="col">Amount</th>
      <th scope="col">Transfer Date</th>

    </tr>
  </thead>
  <tbody>


  <?php
        include('config.php');
        $sql = "SELECT * FROM trans";
        $result = mysqli_query($conn,$sql);
        while($rows=mysqli_fetch_assoc($result)){
            ?>
            <tr>
                <td><?php echo $rows['id'] ?></td>
                <td><?php echo $rows['sender']?></td>
                <td><?php echo $rows['receiver']?></td>
                <td><?php echo $rows['amount']?></td>
                <td><?php echo $rows['transfer_date']?></td>
            </tr>
            <?php
        }
        ?>
    
  </tbody>
</table>

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