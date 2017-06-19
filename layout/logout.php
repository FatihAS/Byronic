<?php
include 'footer.php';
unset($_SESSION['uid']);
echo "<script>delCookie('cart')</script>";
echo "<script>window.location = 'https://byronic.gravicodev.id/';</script>";
die();
?>