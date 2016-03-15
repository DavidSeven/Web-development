<?php
  class Project
  {
    private $identifier;
    private $name;
    private $calification;
    private $addedDate;
    private $quota;
    private $adviserIdentifier;
    private $investigationLineIdentifier;

    public function Project ($identifier, $name, $calification, $addedDate, $quota, $adviserIdentifier, $investigationLineIdentifier)
    {
      $this->identifier = $identifier;
      $this->name = $name;
      $this->calification = $calification;
      $this->addedDate = $addedDate;
      $this->quota = $quota;
      $this->adviserIdentifier = $adviserIdentifier;
      $this->investigationLineIdentifier = $investigationLineIdentifier;
    }

    public function setIdentifier ($identifier)
    {
      $this->identifier = $identifier;
    }

    public function setName ($name)
    {
      $this->name = $name;
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

    public function setInvestigationLineIdentifier ($investigationLineIdentifier)
    {
      $this->investigationLineIdentifier = $investigationLineIdentifier;
    }

    public function getIdentifier ()
    {
      return $this->identifier;
    }

    public function getName ()
    {
      return $this->name;
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

    public function getInvestigationLineIdentifier ()
    {
      return $this->investigationLineIdentifier;
    }
  }
?>
