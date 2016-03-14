<?php
  class Adviser
  {
    private $identifier;
    private $name;
    private $lastName;

    public function Adviser ($identifier, $name, $lastName)
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
      return $this->identifier;
    }

    public function getName ()
    {
      return $this->name;
    }

    public function getLastName ()
    {
      return $this->lastName;
    }
  }
?>
