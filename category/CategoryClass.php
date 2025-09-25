<?php
class Category{

  private $id;
  private $name;
  private $icon_url;
  private $display_ow1_order;
  private $display_ow2_order;

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

  public function getIconURL()
  {
    return $this->icon_url;
  }

  public function setIconURL($icon_url)
  {
    $this->icon_url = $icon_url;
  }

  public function getDisplayOW1Order()
  {
    return $this->display_ow1_order;
  }

  public function getDisplayOW2Order()
  {
    return $this->display_ow2_order;
  }

  public function setDisplayOW1Order($display_ow1_order)
  {
    $this->display_ow1_order = $display_ow1_order;
  }

  public function setDisplayOW2Order($display_ow2_order)
  {
    $this->display_ow2_order = $display_ow2_order;
  }

  public function __toString() {
    return 'category: name='.$this->getName().', icon_url='.$this->getIconURL();
  }

  public function equals(Category $category){
    return ($this->getName() == $category->getName());
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
