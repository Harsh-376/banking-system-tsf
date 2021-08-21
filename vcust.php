<?php
require_once 'bankusers.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Bank| View Customer</title>
    <link rel="stylesheet" href="allpage.css">
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="vcuststyle.css">
</head>

<body>

    <!-- NavBar -->
    <div class="navigation">
        <ul>
            <li class="site-name"><a href="../home/">All Bank</a></li>
            <li class="list">
                <a href="../home/">
                    <ion-icon name="home-outline"></ion-icon>
                    <span class="title">Home</span>
                </a>
            </li>
        </ul>
    </div>

    <!-- Main Body -->
    <div class="main-body-container">
        <h1>Select an Account</h1>
        <div class="table-container">
            <table>
                <tr class="table-row">
                    <td>Sl no.</td>
                    <td>Holder's Name</td>
                    <td>Account No.</td>
                    <td></td>
                </tr>
                <?php
                $userData = getAllUser();
                $num = 0;
                while ($row = mysqli_fetch_assoc($userData)) {
                    $num++;
                    fillTableRow($num, $row['accnum'], $row['name']);
                }
                ?>
            </table>
        </div>
    </div>

    <script src="vcustscript.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>