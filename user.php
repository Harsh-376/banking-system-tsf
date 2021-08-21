<?php
require_once 'singleuser.php';
require_once 'bankusers.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Bank | User</title>
    <link rel="stylesheet" href="userstyle.css">
    <link rel="stylesheet" href="allpage.css">
    <link rel="stylesheet" href="navbar.css">
</head>

<body>
    <!-- NavBar -->
    <div class="navigation">
        <ul>
            <li class="site-name"><a href="index.html">All Bank</a></li>
            <li class="list">
                <a href="index.html">
                    <ion-icon name="home-outline"></ion-icon>
                    <span class="title">Home</span>
                </a>
            </li>
            <li class="list">
                <a href="vcust.php">
                    <ion-icon name="people-outline"></ion-icon>
                    <span class="title">View Customers</span>
                </a>
            </li>
        </ul>
    </div>

    <!-- Main Body -->
    <div class="main-body">
        <div class="detail-container">

            <?php
            $data = getUser($_GET['accnum']);
            $row = mysqli_fetch_assoc($data);
            ?>

            <div class="detail-text">
                Account No. <?php echo $row['accnum'] ?> <br>
                Name : <?php echo $row['name'] ?> <br>
                Balance : Rs <?php echo $row['balance'] ?> <br>
                <input type="hidden" id="UserBalance" value="<?php echo $row['balance'] ?>">
                Transction History
                <div id="open">
                    <ion-icon name="caret-down-outline" class="open"></ion-icon>
                    <ion-icon name="caret-up-outline" class="close"></ion-icon>
                </div>
            </div>

            <div class="history-container">

                <?php
                $history = getTransactHistory();
                $flag = 0;

                while ($row = mysqli_fetch_assoc($history)) {
                    if ($row['accnumfrom'] === $_GET['accnum']) {
                        fillHistoryTo($row['accnumto'], $row['amount'], $row['timestamp']);
                        if ($flag === 0) $flag = 1;
                    } else if ($row['accnumto'] === $_GET['accnum']) {
                        fillHistoryFrom($row['accnumfrom'], $row['amount'], $row['timestamp']);
                        if ($flag === 0) $flag = 1;
                    }
                }

                if ($flag === 0) { ?>
                    <div style="margin-top: 20px; text-align:center;"><i>No History</i></div>
                <?php } ?>
            </div>

        </div>

        <div class="detail-container">

            <form action="transfermoney.php" method="post" class="transaction" name="transaction-form" onsubmit="return check();">

                <div class="form-group disp-flex">
                    <label for="accnumto">Account No.</label>
                    <select name="accnumto" class="form-style" required>
                        <option value="" disabled selected hidden> -- Select an Account -- </option>
                        <?php
                        $userData = getAllUser();
                        while ($row = mysqli_fetch_assoc($userData)) {
                            if ($_GET['accnum'] !== $row['accnum'])
                                fillSelectOption($row['accnum']);
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group disp-flex">
                    <label for="amt">Amount ($) : </label>
                    <input type="number" class="form-style" name="amt" required placeholder="Limit $ 50,000" id="amt" oninput="if( this.value.length > 5 )  this.value = this.value.slice(0,5)">
                </div>

                <div class="form-group" style="text-align: right;">
                    <input type="hidden" name="accnumfrom" value="<?php echo $_GET['accnum']; ?>">
                    <button type="submit">Transfer</button>
                </div>
            </form>

        </div>
    </div>

    <script src="userscript.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>