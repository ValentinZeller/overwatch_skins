<?php
  class CategoryManager {
    /**
     * @var PDO
     */
    private $_db;

    public function __Construct($db) {
      $this->setDb($db);
    }

    public function setDb(PDO $db) {
      $this->_db=$db;
    }

    public function getListeCategory($version = 'ow1') {
      $req = 'SELECT * FROM category ORDER BY name';
      $stmt = $this->_db->prepare($req);
      $stmt->execute();
      return $stmt;
    }

    public function getCategoryOW($version) {
      $req = "SELECT * FROM category WHERE display_".$version."_order IS NOT NULL ORDER BY display_".$version."_order";
      $stmt = $this->_db->prepare($req);
      $stmt->execute();
      return $stmt;
    }

    public function filterCategoryByName($name, $array) {
        $result = [];
        foreach ($array as $item) {
            if ($item['name'] === $name) {
                $result[] = $item;
            }
        }
        return $result;
    }

    public function getCategoryById($num) {
      $req = "SELECT * FROM category WHERE id = '".$num."'";
      $stmt = $this->_db->prepare($req);
      $stmt->execute();
      $stmt->setFetchMode(PDO::FETCH_ASSOC);

      foreach ($stmt as $value) {
        $mCategory[] = $value;
      }

      $category = new Category;
      $category->hydrate($mCategory[0]);
      return $category;
    }

  }
 ?>
