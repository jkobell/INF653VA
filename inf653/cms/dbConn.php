<?php
		class DbConnect
			{
				
				private $host;
				private $dbname;
				private $user;
				private $pass;
				private $dsn;
				public  $dbh;
				private $error;
 
				public function __construct($db_host = 'localhost', $db_name = 'inf653_cms',
											$db_user = 'inf653admin', $db_pass = 'iInf653cms')
					{
						$this->host = $db_host;
						$this->dbname = $db_name;
						$this->user = $db_user;
						$this->pass = $db_pass;
						$this->dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname . ';charset=utf8mb4';
						try
							{
								$this->dbh = new PDO($this->dsn, $this->user, $this->pass)
								OR die("There was a problem selecting the database.");
								$this -> dbh -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							}
        
						catch(PDOException $e)
							{
								$this->error = $e->getMessage();
							}
					}
			}

?>