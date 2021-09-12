<?php
session_start();
   include('db.php');
   if(isset($_POST['donation_amount']) && isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phone'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $amount = $_POST['donation_amount'];
    $payment_status = "Pending";
    mysqli_query($con,"INSERT INTO donation(name,email,phone,amount,payment_status) VALUES('$name','$email','$phone','$amount','$payment_status')");
    $_SESSION['OID']=mysqli_insert_id($con);
}
    if(isset($_POST['payment_id']) && isset($_SESSION['OID'])){
        $payment_id=$_POST['payment_id'];
        mysqli_query($con,"update donation set payment_status='Complete',payment_id='$payment_id' where id='".$_SESSION['OID']."'");
    }

?>