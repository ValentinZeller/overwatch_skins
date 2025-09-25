<?php
  class SkinManager {
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

    public function getListeSkin() {
      $req = 'SELECT hero.name AS hero_name, skin.name AS skin_name, skin.rarity, category.name AS category_name, season.name AS season_name, skin.year, category2.name AS category_name2, condition_special.name AS condition_name
              FROM skin
              LEFT JOIN hero ON skin.id_hero = hero.id
              LEFT JOIN season ON skin.id_season = season.id
              LEFT JOIN category ON skin.id_category = category.id
              LEFT JOIN category AS category2 ON skin.id_category_secondary = category2.id
              LEFT JOIN condition_special ON skin.id_condition = condition_special.id
              ORDER BY hero.name, skin.name';
      $stmt = $this->_db->prepare($req);
      $stmt->execute();
      return $stmt;
    }

    public function getOWSkin($version = 'ow1', $base = false) {
      $req = 'SELECT hero.name AS hero_name, skin.name AS skin_name, skin.rarity, skin.image_url, skin.year, skin.id_season, category.name AS category_name, condition_special.name AS condition_name
              FROM skin
              LEFT JOIN hero ON skin.id_hero = hero.id
              LEFT JOIN category ON skin.id_category = category.id
              LEFT JOIN condition_special ON skin.id_condition = condition_special.id';
      if ($version === 'ow1') {
          $req .= ' WHERE id_season IS NULL AND hero.release_date < "2022-10-04"';
      } else {
        $req .= ' WHERE id_season IS NOT NULL';
      }
      if (!$base) {
          $req .= ' AND skin.id_category != 16';
      }
      $req .= ' ORDER BY hero.name, id_season, year, rarity, skin.name';
      $stmt = $this->_db->prepare($req);
      $stmt->execute();
      return $stmt;
    }

    public function filterSkinByHero($heroName, $array) {
        $result = [];
        foreach ($array as $item) {
            if ($item['hero_name'] === $heroName) {
                $result[] = $item;
            }
        }
        return $result;
    }

    public function filterSkinByCategory($categoryName, $array) {
        $result = [];
        foreach ($array as $item) {
            if ($item['category_name'] === $categoryName) {
                $result[] = $item;
            }
        }
        return $result;
    }

    public function filterSkinByYear($year, $array) {
        $result = [];
        foreach ($array as $item) {
            if ($item['year'] === $year) {
                $result[] = $item;
            }
        }
        return $result;
    }

    public function filterSkinByRarity($rarity, $array) {
        $result = [];
        foreach ($array as $item) {
            if ($item['rarity'] === $rarity) {
                $result[] = $item;
            }
        }
        return $result;
    }

    public function filterSkinByCondition($conditionName, $array) {
        $result = [];
        foreach ($array as $item) {
            if ($item['condition_name'] === $conditionName) {
                $result[] = $item;
            }
        }
        return $result;
    }

    public function filterSkinBySeason($season, $array) {
        $result = [];
        foreach ($array as $item) {
            if ($item['id_season'] === $season) {
                $result[] = $item;
            }
        }
        return $result;
    }

    public function filterSkinByHeroAndCategory($heroName, $categoryName, $array) {
        $result = [];
        foreach ($array as $item) {
            if ($item['hero_name'] === $heroName && $item['category_name'] === $categoryName) {
                $result[] = $item;
            }
        }
        return $result;
    }

    public function getSkinById($num) {
      $req = "SELECT * FROM skin WHERE id = '".$num."'";
      $stmt = $this->_db->prepare($req);
      $stmt->execute();
      $stmt->setFetchMode(PDO::FETCH_ASSOC);

      foreach ($stmt as $value) {
        $mSkin[] = $value;
      }

      $skin = new Skin;
      $skin->hydrate($mSkin[0]);
      return $skin;
    }

  }
 ?>
