<?php
class Hero{

  private $id;
  private $name;
  private $role;
  private $releaseDate;
  private $portraitURL;

  public function getId()
  {
    return $this->id;
  }

  public function getName()
  {
    return $this->name;
  }

  public function setName($name)
  {
    $this->name = $name;
  }

  public function getRole()
  {
    return $this->role;
  }

  public function setRole($role)
  {
    $this->role = $role;
  }

  public function getReleaseDate()
  {
    return $this->releaseDate;
  }

  public function setReleaseDate($releaseDate)
  {
    $this->releaseDate = $releaseDate;
  }

  public function getPortraitURL()
  {
    return $this->portraitURL;
  }

  public function setPortraitURL($portraitURL)
  {
    $this->portraitURL = $portraitURL;
  }

  public function __toString() {
    return 'hero: name='.$this->getName().', role='.$this->getRole().', releaseDate='.$this->getReleaseDate().', portraitURL='.$this->getPortraitURL();
  }

  public function equals(Hero $hero){
    return ($this->getName() == $hero->getName());
  }

  public function hydrate(array $donnees) {
    foreach ($donnees as $key => $value) {
      $method = 'set'.ucfirst($key);
      if (method_exists($this,$method)) {
        $this->$method($value);
      }
    }
  }

}
 ?>
