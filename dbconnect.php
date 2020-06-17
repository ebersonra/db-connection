<?php
    include_once('dbconnect.impl.php');

    $dbconnect = new DbConnectImpl();

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        
        $dbconnect->setQuerySql($_POST['query']);
        $dbconnect->setServername($_POST['servername']);
        $dbconnect->setUsername($_POST['username']);
        $dbconnect->setPassword($_POST['password']);
        $dbconnect->setDbname($_POST['dbname']);
        $dbconnect->setPort($_POST['port']);
        $dbconnect->setEngine($_POST['engine']);
        $dbconnect->setIsUseSSL($_POST['sslOption']);

        $dbconnect->showResultQuerySql();
    }
?>
