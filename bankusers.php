<?php
function getAllUser()
{
    include 'connection.php';
    $sql = "select * from $userdatatable";
    $result = mysqli_query($con, $sql);
    mysqli_close($con);
    if ($result)
        return $result;
}

function fillTableRow($num, $accnum, $name)
{
    echo "
        <tr class='table-row'>
            <td>$num.</td>
            <td>$accnum</td>
            <td>$name</td>
            <td>
                <form action='user.php' method='get'>
                <input type='hidden' name='accnum' value='$accnum'>
                <button type='submit'>Select</button>
                </form>
            </td>
        </tr>
    ";
}

function fillSelectOption($accnum)
{
    echo "<option value='$accnum'>$accnum</option>";
}
?>
<!--  -->