<?php
    session_start();

    require '../dbh.php';

    $sql = "SELECT * FROM edittable WHERE id=1";
    $result = mysqli_query($conn, $sql);
    $column = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $events = $column['eventsText'];
?>

<!DOCTYPE html>
<html>

    <head>
        <title>Die Funker</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css?family=Bowlby+One&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="../css/main.css">
        <link rel="stylesheet" type="text/css" href="css/events.css">

        <!--
        <link rel="stylesheet" type="text/css" href="css/events-alternate.css">
        -->

        <link rel="icon" href="../images/icon.ico">
        <script src="skript/events.js"></script>
        <script src="../skript/main.js"></script>
    </head>

    <body>
        <div class="wrapper">
            <div class="menu-wrapper" id="menu-expand">
                <a href="../index.php" class="navbar_logo">
                    <img id="logo" src="../images/logo.png">
                    <span class="logo_text">Die Funker</span>
                </a>
                <?php
                    if (!isset($_SESSION['userId'])) {
                        echo '<a href="../login/login"><button type="button" class="submitBtn" id="loginBtn">Login</button></a>';
                    }
                    else if (isset($_SESSION['userId'])) {
                        echo '<form action="../login/includes/logout.inc.php" method="post" class="logoutForm">
                            <button type="submit" name="logout-submit" class="submitBtn" id="logoutBtn">Logout</button>
                        </form>';
                    }
                ?>
                <input type="checkbox" id="menuToggle">
                <label for="menuToggle" onclick="expand()"><span></span></label>
                <nav class="menu">
                    <ol>
                        <?php
                        if (isset($_SESSION['userId'])) {
                            echo '<li class="menu-item"><a href="../aktuelles/aktuelles.admin">Aktuelles</a></li>
                            <li class="menu-item"><a href="">Events</a></li>
                            <li class="menu-item"><a href="../member/member.admin">Members</a></li>
                            <li class="menu-item"><a href="../termine/termine.admin">Termine</a></li>
                            <li class="menu-item"><a href="../raids/raids.admin">Raids</a></li>
                            <li class="menu-item dropdown">
                                <a href="../guides/guides">Guides</a>
                                <ol class="sub-menu">
                                    <li class="menu-item"><a href="../guides/raid-guides/raid-guides">Raid Guides</a></li>
                                    <li class="menu-item"><a href="../guides/fraktal-guides/fraktal-guides">Fraktal Guides</a></li>
                                    <li class="menu-item"><a href="../guides/anfaenger-guides/anfaenger-guides">Anfänger Guides</a></li>
                                </ol>
                            </li>';
                        }
                        else if (!isset($_SESSION['userId'])) {
                            echo '<li class="menu-item"><a href="../aktuelles/aktuelles">Aktuelles</a></li>
                            <li class="menu-item"><a href="">Events</a></li>
                            <li class="menu-item"><a href="../member/member">Members</a></li>
                            <li class="menu-item"><a href="../termine/termine">Termine</a></li>
                            <li class="menu-item"><a href="../raids/raids">Raids</a></li>
                            <li class="menu-item dropdown">
                                <a href="../guides/guides">Guides</a>
                                <ol class="sub-menu">
                                    <li class="menu-item"><a href="../guides/raid-guides/raid-guides">Raid Guides</a></li>
                                    <li class="menu-item"><a href="../guides/fraktal-guides/fraktal-guides">Fraktal Guides</a></li>
                                    <li class="menu-item"><a href="../guides/anfaenger-guides/anfaenger-guides">Anfänger Guides</a></li>
                                </ol>
                            </li>';
                        }
                        ?>
                </nav>
            </div>

            <div class="event">
                <?php echo $events ?>
            </div>
        </div>

        <footer class="footer">
            <div class="footer-content">
                <span class="social-media"><a href="https://www.youtube.com/channel/UClCWSHXPboC9ySNyzgwlZUw" target="_blank" title="Die Funker Youtube Kanal"><img src="../images/youtube.png"></a></span>
                <span class="footer-center">Made by <span class="bold">Alex III.</span> for <span class="bold">Die Funker</span></span>
                <br>
                <span class="footer-right"><a href="../impressum/impressum">Impressum</a></span>
            </div>
        </footer>
    </body>

</html>
