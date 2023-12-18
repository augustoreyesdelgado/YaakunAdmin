<?php
/*
Archivo:  logout.php
Objetivo: termina la sesión
Autor: BAOZ   
*/
session_start();
$sErr="";
$sCve="";
$sNom="";
	/*Verificar que hayan llegado los datos*/
	if (isset($_SESSION["usuario"])){
		session_destroy();
	}
	if ($sErr == "")
		header("Location: ../index.php");
	else
		header("Location: error.php?sError=".$sErr);
	exit();
?>