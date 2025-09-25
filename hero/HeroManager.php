<?php
  class HeroManager {
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

    public function getListeHero($version = 'ow2') {
      $req = 'SELECT * FROM hero ORDER BY name';
      if ($version === 'ow1') {
        $req = 'SELECT * FROM hero WHERE release_date < "2022-10-04" ORDER BY name';
      }
      $stmt = $this->_db->prepare($req);
      $stmt->execute();
      return $stmt;
    }

    public function getHeroCount() {
      $req = 'SELECT COUNT(*) FROM hero';
      $stmt = $this->_db->prepare($req);
      $stmt->execute();
      return $stmt->fetchColumn();
    }

    public function getHeroCountOW1() {
      $req = 'SELECT COUNT(*) FROM hero WHERE release_date < "2022-10-04"';
      $stmt = $this->_db->prepare($req);
      $stmt->execute();
      return $stmt->fetchColumn();
    }

    public function filterHeroByName($name, $array) {
        $result = [];
        foreach ($array as $item) {
            if ($item['name'] === $name) {
                $result[] = $item;
            }
        }
        return $result;
    }

    public function getHeroById($num) {
      $req = "SELECT * FROM hero WHERE id = '".$num."'";
      $stmt = $this->_db->prepare($req);
      $stmt->execute();
      $stmt->setFetchMode(PDO::FETCH_ASSOC);

      foreach ($stmt as $value) {
        $mHero[] = $value;
      }

      $hero = new Hero;
      $hero->hydrate($mHero[0]);
      return $hero;
    }


  }
 ?>
