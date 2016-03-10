<?php
  require ('../configuration.php');

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
      $this->type = $GLOBALS ['type_db'];
      $this->user = $GLOBALS ['user_db'];
      $this->password = $GLOBALS ['password_db'];
      $this->name = $GLOBALS ['name_db'];
      $this->host = $GLOBALS ['host_db'];
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
