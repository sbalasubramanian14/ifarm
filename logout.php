
<html>
<script>window.history.forward();function noBack() { window.history.forward();}</script>
<?php
session_start();
session_destroy();

header("location:index.php");
?>
</html>