<?php
//Se reanuda la sesión existente
session_start();

//Luego se destruye esa sesion
session_destroy();

//Y se envía a la vista del index
header("Location: ../../view/index.php");