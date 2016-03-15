<?php
  class InvestigationLine
  {
    private $identifier;
    private $name;

    public function InvestigationLine ($identifier, $name)
    {
      $this->identifier = $identifier;
      $this->name = $name;
    }

    public function setIdentifier ($identifier)
    {
      $this->identifier = $identifier;
    }

    public function setName ($name)
    {
      $this->name = $name;
    }

    public function getIdentifier ()
    {
      return $this->identifier;
    }

    public function getName ()
    {
      return $this->name;
    }
  }
?>
