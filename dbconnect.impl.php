<?php

include_once('dbconnect.const.php');

class DbConnectImpl {

    private $servername;
    private $username;
    private $password;
    private $dbname;
    private $port;
    private $charset;
    private $querySql;
    private $engine;

    private $isUseSSL;

    public function getQuerySql(){
        return $this->querySql;
    }
    public function setQuerySql($querySql){
        $this->querySql = $querySql;
    }

    public function IsUseSSL(){
        return (bool) $this->isUseSSL;
    }
    public function setIsUseSSL($isUseSSL){
        $this->isUseSSL = $isUseSSL;
    }

    public function getServername(){
        return $this->servername;
    }
    public function setServername($servername){
        $this->servername = $servername;
    }

    public function getUsername(){
        return $this->username;
    }
    public function setUsername($username){
        $this->username = $username;
    }

    public function getPassword(){
        return $this->password;
    }
    public function setPassword($password){
        $this->password = $password;
    }

    public function getDbname(){
        return $this->dbname;
    }
    public function setDbname($dbname){
        $this->dbname = $dbname;
    }

    public function getPort(){
        return $this->port;
    }
    public function setPort($port){
        $this->port = $port;
    }

    public function getEngine(){
        return $this->engine;
    }
    public function setEngine($engine){
        $this->engine = strtoupper($engine);
    }

    public function showResultQuerySql(){

        try{
            $resultInJson = DbConnectImpl::executeQuerySql();

            /*Check for errors*/
            if($resultInJson === FALSE){

                echo 'JSON error! Error code.: ' .json_last_error(). '; Error Message.: "' .json_last_error_msg(). '".';
                die();
            }

            print("<h2 style='text-align: center;'>:.showResultQuerySql().:</h2>");
            print("<p><h3>Query Executed.:</h3> "."<h2>".$this->getQuerySql()."</h2></p>");

            echo "<pre>";
            print_r($resultInJson);
            echo "</pre>";
        }catch(PDOException $e){

            echo "<h3 style='color: red;'>Show result query SQL failed: " . $e->getMessage()."</h3>";
            die();
        }
    }

    private function dbConnection() {

        try {
            
            $dbConnection = $this->validIsUseSSL();
            // set the PDO error mode to exception
            $dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $dbConnection;
        }catch(PDOException $e){

            echo "<br><br>";
            echo "<h3 style='color: red;'>Connection failed: " . $e->getMessage()."</h3>";
            die();
        }
    }

    private function validIsUseSSL(){

        if($this->IsUseSSL() !== FALSE){

            $dbConnection = new PDO(DbConnectImpl::getDns(), $this->getUsername(), $this->getPassword(), DbConnectImpl::getOptions());
        }else{

            $dbConnection = new PDO(DbConnectImpl::getDns(), $this->getUsername(), $this->getPassword());
        }

        return $dbConnection;
    }

    private function getOptions(){

        if($this->getEngine() === DbConnectConst::ENGINE_MYSQL){

            $options = array(
                //PDO::MYSQL_ATTR_SSL_CA => '/var/www/html/test-connection/ca.pem',
                PDO::MYSQL_ATTR_SSL_CA => DbConnectConst::SSL_CA_MYSQL,
                //PDO::MYSQL_ATTR_SSL_CERT => '/var/www/html/test-connection/client-cert.pem',
                //PDO::MYSQL_ATTR_SSL_KEY => '/var/www/html/test-connection/client-key.pem',
                PDO::MYSQL_ATTR_SSL_VERIFY_SERVER_CERT => false
            );    
        }else if($this->getEngine() === DbConnectConst::ENGINE_ORACLE){

            $options = array();
        }else if($this->getEngine() === DbConnectConst::ENGINE_PGSQL){

            $options = array();
        }else{

            throw new PDOException(DbConnectConst::MESSAGE_ERROR_ENGINE . $this->getEngine());
        }
        
        return $options;
    }

    private function getDns(){

        if($this->getEngine() === DbConnectConst::ENGINE_MYSQL){

            $this->charset = DbConnectConst::CHARSET_MYSQL;
            return "mysql:host=".$this->getServername().";port=".$this->getPort().";charset=".$this->charset.";dbname=".$this->getDbname();
        }else if($this->getEngine() === DbConnectConst::ENGINE_ORACLE){

            $tns = "(DESCRIPTION = (ADDRESS = (PROTOCOL = TCP)(HOST = ".$this->getServername().")(PORT = ".$this->getPort().")) (CONNECT_DATA = (SERVICE_NAME = ORCL) (SID = ORCL)))";

            return "oci:dbname=".$tns;
        }else if($this->getEngine() === DbConnectConst::ENGINE_PGSQL){

            $this->charset = "--client_encoding=".DbConnectConst::CHARSET;
            return "pgsql:host=".$this->getServername().";port=".$this->getPort().";options=".$this->charset.";dbname=".$this->getDbname();
        }else{

            throw new PDOException(DbConnectConst::MESSAGE_ERROR_ENGINE . $this->getEngine());
        }        
    }

    private function executeQuerySql(){

        $sth = DbConnectImpl::dbConnection()->prepare($this->getQuerySql());
        $sth->execute();

        $result = DbConnectImpl::getResult();
        $quantityObject=0;

        while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
            
            $quantityObject = $quantityObject+1;
            $resultIndex = count($result);

            $result[$resultIndex] = array(
                $row
            );
        }

        echo "<b>Quantitys Object.: ".$quantityObject."</b>";
            
        $sth->closeCursor();

        return json_encode($result, JSON_PRETTY_PRINT | JSON_FORCE_OBJECT);
    }

    private function getResult(){
        return array();
    }
}
?>
