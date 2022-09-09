<?php

//modulo de conexxion
include("../../connection.php");


//continuamos la sesion
session_start();


//destruimos la sesion
session_destroy();


//redirigimos al usuario al index.html
header("Location:../login.php");

 ?>