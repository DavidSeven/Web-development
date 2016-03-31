<?php
  class User
  {
    private $identifier;
    private $nickname;
    private $password;
    private $type;

    public function User ($identifier, $nickname, $password, $type)
    {
      $this->identifier = $identifier;
      $this->nickname = $nickname;
      $this->password = $password;
      $this->type = $type;
    }

    public function getIdentifier ()
    {
      return $this->identifier;
    }

    public function getNickname ()
    {
      return $this->nickname;
    }

    public function getPassword ()
    {
      return $this->password;
    }

    public function getType ()
    {
      return $this->type;
    }
  }
?>
