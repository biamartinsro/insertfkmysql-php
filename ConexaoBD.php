<?php 
  class ConexaoBD {
    public static $instancia;
    
    public static function conecta() {
      $serv = "localhost";
      $bd   = "suportedore";
      $usr  = "root";
      $pwd  = ""; 
      if (!isset(self::$instancia)) {
         self::$instancia = new PDO('mysql:host='.$serv.';dbname='.$bd,$usr,$pwd,
                                   array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
         self::$instancia->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         self::$instancia->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_EMPTY_STRING);
      }
      return self::$instancia;
    }
  }
?>

