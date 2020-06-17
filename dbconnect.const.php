<?php
class DbConnectConst {

    const CHARSET_MYSQL = "utf8mb4";
    const CHARSET = "utf8";

    const ENGINE_MYSQL = "MYSQL";
    const ENGINE_ORACLE = "ORACLE";
    const ENGINE_PGSQL = "PGSQL";

    const MESSAGE_ERROR_ENGINE = "Invalid DB Engine: ";

    const SSL_CA_MYSQL = "/var/www/html/test-connection/mysql-certificate/BaltimoreCyberTrustRoot.crt.pem";
}
?>
