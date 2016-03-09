<?php
  require ('../configuration.php');

  class Database
  {
    private $type;
    private $user;
    private $password;
    private $name;
    private $host;
    private $connection;

    public function Database ()
    {
      $type = $type_db;
      $user = $user_db;
      $password = $password_db;
      $name = $name_db;
      $host = $host_db;
    }

    public function connect ()
    {
      $this->connection = new PDO ($this->type.':host='.$this->host.';dbname='.$this->name, $this->user, $this->password);
      $this->connection->setAttribute (PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      return $this->connection;
    }
  }
?>
