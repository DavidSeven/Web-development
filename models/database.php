<?php
  require_once ('../configuration.php');

  class Database extends PDO
  {
    private $type;
    private $user;
    private $password;
    private $name;
    private $host;
    private $connection;

    public function Database ()
    {
      /*$type = $type_db;
      $user = $user_db;
      $password = $password_db;
      $name = $name_db;
      $host = $host_db;*/
      $type = 'mysql';
      $user = 'root';
      $password = '';
      $name = 'degree_works';
      $host = 'localhost';
    }

    public function connect ()
    {
      try
      {
        $this->connection = new PDO ($this->type.':host='.$this->host.';dbname='.$this->name, $this->user, $this->password);
        $this->connection->setAttribute (PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      }
      catch (Exception $exception)
      {
        $this->connection = null;
        echo $exception->getMessage ();
      }
      return $this->connection;
    }
  }
?>
