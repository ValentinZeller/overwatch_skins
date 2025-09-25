<?php

// Define database connection parameters

function ConnectBDD() {
  $dsn="mysql:host=".SERVERNAME.";dbname=".DBNAME.";charset=UTF8";
  
  try {
    //Lorsqu'une instruction risque de causer une erreur, il faut l'encapsuler dans un bloc try/catch
     $conn = new PDO($dsn, USERNAME, PASSWORD);
     // set the PDO error mode to exception
     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $conn->setAttribute(PDO::ATTR_TIMEOUT, 1);
  }
  catch(PDOException $e) {
    //Si il y a une erreur, on le gère dans le catch
    //$e est un objet/instance de la classe PDOException, donc on a accès aux méthodes de PDOException
    //getMessage est une méthode de la class PDOException
     echo "Connexion échouée : " . $e->getMessage();
  }
  return $conn;
}
?>
