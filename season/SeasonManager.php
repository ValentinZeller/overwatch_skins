<?php
  class SeasonManager {
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

    public function getListeSeason() {
      $req = 'SELECT * FROM season ORDER BY id';
      $stmt = $this->_db->prepare($req);
      $stmt->execute();
      return $stmt;
    }

    public function getSeasonById($num) {
      $req = "SELECT * FROM season WHERE id = '".$num."'";
      $stmt = $this->_db->prepare($req);
      $stmt->execute();
      $stmt->setFetchMode(PDO::FETCH_ASSOC);

      foreach ($stmt as $value) {
        $mSeason[] = $value;
      }

      $season = new Season;
      $season->hydrate($mSeason[0]);
      return $season;
    }

  }
 ?>
