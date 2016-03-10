<?php
  class Project
  {
    private $identifier;
    private $name;
    private $investigationLine;
    private $calification;
    private $addedDate;
    private $quota;
    private $adviserIdentifier;

    public function Project ($identifier, $name, $investigationLine, $calification, $addedDate, $quota, $adviserIdentifier)
    {
      $this->identifier = $identifier;
      $this->name = $name;
      $this->investigationLine = $investigationLine;
      $this->calification = $calification;
      $this->addedDate = $addedDate;
      $this->quota = $quota;
      $this->adviserIdentifier = $adviserIdentifier;
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

    public function setAdviserIdentifier ($adviserIdentifier)
    {
      $this->adviserIdentifier = $adviserIdentifier;
    }

    public function getIdentifier ()
    {
      return $this->identifier;
    }

    public function getName ()
    {
      return $this->name;
    }

    public function getInvestigationLine ()
    {
      return $this->investigationLine;
    }

    public function getCalification ()
    {
      return $this->calification;
    }

    public function getAddedDate ()
    {
      return $this->addedDate;
    }

    public function getQuota ()
    {
      return $this->quota;
    }

    public function getAdviserIdentifier ()
    {
      return $this->adviserIdentifier;
    }
  }
?>
