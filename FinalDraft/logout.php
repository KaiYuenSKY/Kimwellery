<!-- 
    02 June | Zhen Han | First Draft 
    03 June | Wei Ean | Integration
-->

<?php

@include 'config.php';

session_start();
session_unset();
session_destroy();

header('location:index.php');

?>