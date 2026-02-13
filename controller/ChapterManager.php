<?php
  class ChapterManager {
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

    public function getListeChapter() {
      $req = 'SELECT * FROM chapter ORDER BY id';
      $stmt = $this->_db->prepare($req);
      $stmt->execute();
      return $stmt;
    }

    public function getChaperById($num) {
      $req = "SELECT * FROM chapter WHERE id = '".$num."'";
      $stmt = $this->_db->prepare($req);
      $stmt->execute();
      $stmt->setFetchMode(PDO::FETCH_ASSOC);

      foreach ($stmt as $value) {
        $mChapter[] = $value;
      }

      $chapter = new Chapter;
      $chapter->hydrate($mChapter[0]);
      return $chapter;
    }

  }
 ?>
