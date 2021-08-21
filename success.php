<?php
$accnum = $_GET['accnum'];
header("refresh: 3;url= user.php?accnum=$accnum");
echo "
    <div style='text-align:center; margin-top:20px; line-height:1.5; font-size:18px'>
    Transaction Successful<br>
    <i>Redirecting in 3seconds...</i></div>
    ";
exit();
?>
<!--  -->