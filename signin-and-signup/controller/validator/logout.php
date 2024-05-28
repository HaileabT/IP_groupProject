<?php
// include "../../../index.php";
// include "././index.php";
session_save_path('C:\xampp_sessions');
session_start();
session_destroy();
header("location: ../../../index.php");
