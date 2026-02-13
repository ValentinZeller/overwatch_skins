<?php
  class ConditionManager {
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

    public function getListeCondition() {
      $req = 'SELECT * FROM condition_special ORDER BY name';
      $stmt = $this->_db->prepare($req);
      $stmt->execute();
      return $stmt;
    }

    public function getConditionById($num) {
      $req = "SELECT * FROM condition_special WHERE id = '".$num."'";
      $stmt = $this->_db->prepare($req);
      $stmt->execute();
      $stmt->setFetchMode(PDO::FETCH_ASSOC);

      foreach ($stmt as $value) {
        $mCondition[] = $value;
      }

      $condition = new Condition;
      $condition->hydrate($mCondition[0]);
      return $condition;
    }

  }
 ?>
