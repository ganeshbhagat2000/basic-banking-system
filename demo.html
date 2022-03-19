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
    <h2>Transfer Money</h2>
    <hr>
    <form method="post" class="form1">
        <?php
            include('config.php');
            $sid = $_GET['id'];
            $query = "select * from userdetails where id =$sid";
            $query_run = mysqli_query($conn,$query);
            $rows=mysqli_fetch_assoc($query_run);
        ?>
        From:<input type="text" value="<?php echo $rows['name']?>"><br><br>
        Email:<input type="text" value="<?php echo $rows['email']?>"><br><br>
        Balance:<input type="text" value="<?php echo $rows['balance']?>"><br><br>
        To:<select name="to" class="select" required>
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
            </select><br><br>
        Amount:<input type="text" id="amount" name="amount" required><br><br>
        <input type="submit" name="submit">
    </form>
</div>
<?php
    include('foot.php');
?>

