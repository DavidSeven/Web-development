<?php
  class Project
  {
    private $identifier;
    private $name;
    private $investigationLine;
    private $calification;
    private $addedDate;
    private $quota;

    public function Adviser ($identifier, $name, $investigationLine, $calification, $addedDate, $quota)
    {
      $this->identifier = $identifier;
      $this->name = $name;
      $this->investigationLine = $investigationLine;
      $this->calification = $calification;
      $this->addedDate = $addedDate;
      $this->quota = $quota;
    }

    public function Adviser ($name, $investigationLine, $calification, $addedDate)
    {
      $this->name = $name;
      $this->investigationLine = $investigationLine;
      $this->calification = $calification;
      $this->addedDate = $addedDate;
    }

    public function setIdentifier ($identifier)
    {
      $this->identifier = $identifier;
    }

    public function setName ($name)
    {
      $this->name = $name;
    }

    public function setInvestigationLine ($investigationLine)
    {
      $this->investigationLine = $investigationLine;
    }

    public function setCalification ($calification)
    {
      $this->calification = $calification;
    }

    public function setAddedDate ($addedDate)
    {
      $this->addedDate = $addedDate;
    }

    public function setQuota ($quota)
    {
      $this->quota = $quota;
    }

    public function getIdentifier ()
    {
      return $identifier;
    }

    public function getName ()
    {
      return $name;
    }

    public function getInvestigationLine ()
    {
      return $investigationLine;
    }

    public function getCalification ()
    {
      return $calification;
    }

    public function getAddedDate ()
    {
      return $addedDate;
    }

    public function getQuota ()
    {
      return $quota;
    }
  }
?>
