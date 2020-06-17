<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-BR,en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="images-db/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">
        
        <link rel="apple-touch-icon" sizes="57x57" href="images-db/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="images-db/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="images-db/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="images-db/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="images-db/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="images-db/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="images-db/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="images-db/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="images-db/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="images-db/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="images-db/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="images-db/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="images-db/favicon-16x16.png">
        <link rel="manifest" href="images-db/manifest.json">
        
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
        
        <title>Connection Database</title>
    </head>

    <body>
        <div class="container">
            <form action="dbconnect.php" method="POST" id="form-connection">
                
                <div class="row">
                    <h3 class="textPosition">Info. Connection Options</h3>
                </div>

                <div class="row">
                    <h3>Connection Values</h3>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-6">
                        <label class="control-label">Is SSL Connection.:</label>
                        <select class="form-control" id="sslOption" name="sslOption">
                            <option value="0">1- No</option>
                            <option value="1">2- Yes</option>
                        </select>
                    </div>
                    <div class="col-sm-6">
                        <label class="control-label">Engine.:</label>
                    
                        <select class="form-control" id="engine" name="engine">
                            <option value="mysql">MySql</option>
                            <option value="oracle">Oracle</option>
                            <option value="pgsql">PgSql</option>
                        </select>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-12">
                        <label class="control-label">Servername.:</label><span class="required">*</span>
                    
                        <input type="text" class="form-control" id="servername" name="servername" placeholder="Enter servername, ex: localhost, mydns.com.br...">
                        <span class="msg-erro msg-servername"></span>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-6">
                        <label class="control-label">Username.:</label><span class="required">*</span>
                    
                        <input type="text" class="form-control" id="username" name="username" placeholder="Enter username for database connection">
                        <span class="msg-erro msg-username"></span>
                    </div>

                    <div class="col-sm-6">
                        <label class="control-label">Password.:</label><span class="required">*</span>
                    
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter password for database connection">
                        <span class="msg-erro msg-password"></span>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-6">
                        <label class="control-label">Database Name.:</label><span class="required">*</span>
                    
                        <input type="text" class="form-control" id="dbname" name="dbname" placeholder="Enter database name for connection">
                        <span class="msg-erro msg-dbname"></span>
                    </div>

                    <div class="col-sm-6">
                        <label class="control-label">Database Port.:</label><span class="required">*</span>
                    
                        <input type="text" class="form-control" id="port" name="port" placeholder="Enter database port for connection">
                        <span class="msg-erro msg-port"></span>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-12">
                        <label class="control-label" for="query">Query SQL.:</label><span class="required">*</span>
                        
                        <textarea placeholder="Enter your query SQL, ex: select * from table" class="form-control" type="text" id="query" name="query" rows="5"></textarea>
                        <span class="msg-erro msg-query"></span>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-6">
                        <button class="btn btn-primary" type="submit">Connect Database</button>
                    </div>
                </div>
            </form>
        </div>
       
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/custom.js"></script>
    </body>

</html>
