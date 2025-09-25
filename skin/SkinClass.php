<?php
class Skin{

  private $id;
  private $id_hero;
  private $id_category;
  private $id_season;
  private $year;
  private $image_url;
  private $rarity;
  private $name;
  private $id_category_secondary;
  private $id_condition;

  public function getId()
  {
    return $this->id;
  }

  public function getIdHero()
  {
    return $this->id_hero;
  }

  public function getIdCategory()
  {
    return $this->id_category;
  }

  public function getIdSeason()
  {
    return $this->id_season;
  }

  public function getYear()
  {
    return $this->year;
  }

  public function getImageUrl()
  {
    return $this->image_url;
  }

  public function getRarity()
  {
    return $this->rarity;
  }

  public function getName()
  {
    return $this->name;
  }

  public function getIdCategorySecondary()
  {
    return $this->id_category_secondary;
  }

  public function getIdCondition()
  {
    return $this->id_condition;
  }

  public function setId($id)
  {
    $this->id = $id;
  }

  public function setIdHero($id_hero)
  {
    $this->id_hero = $id_hero;
  }

  public function setIdCategory($id_category)
  {
    $this->id_category = $id_category;
  }

  public function setIdSeason($id_season)
  {
    $this->id_season = $id_season;
  }

  public function setYear($year)
  {
    $this->year = $year;
  }

  public function setImageUrl($image_url)
  {
    $this->image_url = $image_url;
  }

  public function setRarity($rarity)
  {
    $this->rarity = $rarity;
  }

  public function setName($name)
  {
    $this->name = $name;
  }

  public function setIdCategorySecondary($id_category_secondary)
  {
    $this->id_category_secondary = $id_category_secondary;
  }

  public function setIdCondition($id_condition)
  {
    $this->id_condition = $id_condition;
  }

  public function __toString() {
    return 'skin: name='.$this->getName();
  }

  public function equals(Skin $skin){
    return ($this->getName() == $skin->getName());
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
