<?php 
	const SERVER = "localhost";
	const DB = "db_activosfijos";
	const USER = "root";
	const PASS = "";
	const SGBD = "mysql:host=".SERVER.";dbname=".DB;

	//conexion con la base de datos del SMSolucion
	const SQLSRV = "192.168.1.4";
	const DBSRV = "SMSolucion";
	const USERSRV = "pdo";
	const PASSSRV = "C1Trop1cal.2019*";
	const SGBDSRV = "sqlsrv:Server=".SQLSRV.";Database=".DBSRV;

	//Estos es para encryptar
	const SECRET_KEY = '$BP@2019';
	const SECRET_IV = "101712";
	const METHOD = "AES-256-CBC";