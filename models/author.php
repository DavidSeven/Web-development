<?php
  class Author
  {
    private $identifier;
    private $name;
    private $lastName;

    public function Author ($identifier, $name, $lastName)
    {
      $this->identifier = $identifier;
      $this->name = $name;
      $this->lastName = $lastName;
    }

    public function setIdentifier ($identifier)
    {
      $this->identifier = $identifier;
    }

    public function setName ($name)
    {
      $this->name = $name;
    }

    public function setLastName ($lastName)
    {
      $this->lastName = $lastName;
    }

    public function getIdentifier ()
    {
      return $identifier;
    }

    public function getName ()
    {
      return $name;
    }

    public function getLastName ()
    {
      return $lastName;
    }
  }
?>
