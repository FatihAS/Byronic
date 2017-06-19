
<!DOCTYPE html>
<html>
<head>
<?php
session_start();
    if(!empty($_POST['method'])){
        if($_POST['method'] == "send_uid"){
            if(!empty($_POST["uid"])){
                $_SESSION["uid"] = $_POST["uid"];
            }
            if(!empty($_POST["email"])){
                $_SESSION["user_email"] = $_POST["email"];
            }
            header("Location: https://byronic.gravicodev.id/");
            die();
        }
    }

    // echo '<script>window.alert("'.$_SESSION["uid"].'")</script>';
?>
    <!-- Standard Meta -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <!-- Site Properties -->
    <
    <title>BYRONIC - Build Your Own Computer</title>
    <link rel="stylesheet" type="text/css" href="public/css/semantic.min.css">
    <link rel="stylesheet" type="text/css" href="lib/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="lib/slick/slick-theme.css" />
    <link rel="stylesheet" type="text/css" href="public/css/app.css">

    <script src="public/javascript/jquery.min.js"></script>
    <script src="public/javascript/semantic.min.js"></script>
    <script type="text/javascript" src="lib/slick/slick.min.js"></script>
    <script src="public/javascript/following-menu.js"></script>
    <script src="public/javascript/banner-carousel.js"></script>

</head>

<body>


<?php 
        $pages_dir = 'layout';
        $p = 'home';
        
        //header

        if (!empty($_GET['p'])){
            $pages = scandir($pages_dir, 0);
            unset($pages[0], $pages[1]);
 
            $p = $_GET['p'];
            
            include 'layout/header.php';

            if(in_array($p.'.php', $pages)){
                include($pages_dir.'/'.$p.'.php');
            } else {
                echo 'Halaman tidak ditemukan! :(';
            }
        }
        else {
            include 'layout/header.php';
            include($pages_dir.'/home.php');
        }

        //footer;
        include 'layout/footer.php';
        ?>

</body>

</html>