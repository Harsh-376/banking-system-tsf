<?php
function getUser($user)
{
    include 'connection.php';
    $sql = "select * from $userdatatable where accnum = '$user'";
    $result = mysqli_query($con, $sql);
    mysqli_close($con);
    if ($result)
        return $result;
}

function getTransactHistory()
{
    include 'connection.php';
    $sql = "select * from $transactiontable";
    $result = mysqli_query($con, $sql);
    mysqli_close($con);
    if (mysqli_num_rows($result) > 0)
        return $result;
    else
        return 0;
}

function fillHistoryTo($accto, $amt, $timestamp)
{
    $amt = number_format($amt);
    echo "
        <div class='past-transaction'>
            <span class='amount-container'>
            $ $amt
            </span>
            Account (To) : $accto <br>
            <span class='tmsp'>Date/Time : $timestamp</span>
        </div>
    ";
}
function fillHistoryFrom($accfrom, $amt, $timestamp)
{
    $amt = number_format($amt);
    echo "
        <div class='past-transaction'>
            <span class='amount-container'>
            $ $amt
            </span>
            Account (From) : $accfrom <br>
            <span class='tmsp'>Date/Time : $timestamp</span>
        </div>
    ";
}
?>
<!--  -->