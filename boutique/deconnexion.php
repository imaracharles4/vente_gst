<?php
session_start();
unset($_SESSION['idboutique']);
header('location: ../index.php');