<?php
class Condition{

  private $id;
  private $name;

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

  public function __toString() {
    return 'condition: name='.$this->getName();
  }

  public function equals(Condition $condition){
    return ($this->getName() == $condition->getName());
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
