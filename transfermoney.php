<?php
include 'connection.php';

$accfrom = $_POST['accnumfrom'];
$accto = $_POST['accnumto'];
$amount =  $_POST['amt'];

$sql0 = "select balance from $userdatatable where accnum = '$accfrom'";
$sql1 = "select balance from $userdatatable where accnum = '$accto'";

$balanceFrom = mysqli_fetch_assoc(mysqli_query($con, $sql0));
$balanceTo = mysqli_fetch_assoc(mysqli_query($con, $sql1));

$balanceFrom['balance'] -= $amount;
$balanceTo['balance'] += $amount;

$sql = "insert into $transactiontable (accnumfrom, accnumto, amount) values ('$accfrom', '$accto', '$amount')";
$result = mysqli_query($con, $sql);

$balanceFrom = $balanceFrom['balance'];
$balanceTo = $balanceTo['balance'];

$sql2 = "update $userdatatable set balance = '$balanceFrom' where accnum = '$accfrom'";
$sql3 = "update $userdatatable set balance = '$balanceTo' where accnum = '$accto'";
$result2 = mysqli_query($con, $sql2);
$result3 = mysqli_query($con, $sql3);

mysqli_close($con);
if ($result && $result2 && $result3) {
    header("refresh: 1; url= success.php?accnum=$accfrom");
    exit();
} else {
    header("refresh: 1; url= error.php?accnum=$accfrom");
    exit();
}

?>
<!--  -->