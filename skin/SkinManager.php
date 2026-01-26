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
      $req = 'SELECT skin.id, hero.name AS hero_name, skin.name AS skin_name, skin.rarity, skin.image_url, category.name AS category_name, skin.year, skin.id_season, condition_special.name AS condition_name, skin.recolor_of
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
      $req = 'SELECT skin.id, hero.name AS hero_name, skin.name AS skin_name, skin.rarity, skin.image_url, skin.year, skin.id_season, category.name AS category_name, condition_special.name AS condition_name, skin.recolor_of
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
    
    public function getBaseSkin() {
        $req = 'SELECT skin.id, hero.name AS hero_name, skin.name AS skin_name, skin.rarity, skin.image_url, skin.rarity AS category_name, skin.recolor_of
                FROM skin
                LEFT JOIN hero ON skin.id_hero = hero.id
                LEFT JOIN category ON skin.id_category = category.id
                WHERE skin.id_category = 16
                ORDER BY hero.name, rarity, skin.name';
        $stmt = $this->_db->prepare($req);
        $stmt->execute();
        return $stmt;
    }

    public function getSkinCount($groupByCategory = false, $version = 'ow1') {
        $req = 'SELECT hero.name AS hero_name, category.name AS category_name, COUNT(skin.id) AS skin_count
                FROM skin
                LEFT JOIN hero ON skin.id_hero = hero.id
                LEFT JOIN category ON skin.id_category = category.id';
        if ($version === 'ow1') {
            $req .= ' WHERE id_season IS NULL AND hero.release_date < "2022-10-04"';
        } else {
            $req .= ' WHERE id_season IS NOT NULL';
        }
        if ($groupByCategory) {
            $req .= ' GROUP BY category.name';
        } else {
            $req .= ' GROUP BY hero.name, category.name';
        }
        $req .= ' ORDER BY hero.name, category.name';
        $stmt = $this->_db->prepare($req);
        $stmt->execute();
        return $stmt;
    }

    public function filterSkinByHero($heroName, $array) {
        $result = [];
        if ($array === null) {
            return $result;
        }
        foreach ($array as $item) {
            if ($item['hero_name'] === $heroName) {
                $result[] = $item;
            }
        }
        return $result;
    }

    public function filterSkinByCategory($categoryName, $array) {
        $result = [];
        if ($array === null) {
            return $result;
        }
        foreach ($array as $item) {
            if ($item['category_name'] === $categoryName) {
                $result[] = $item;
            }
        }
        return $result;
    }

    public function filterSkinByYear($year, $array) {
        $result = [];
        if ($array === null) {
            return $result;
        }
        foreach ($array as $item) {
            if ($item['year'] === $year) {
                $result[] = $item;
            }
        }
        return $result;
    }

    public function filterSkinByRarity($rarity, $array) {
        $result = [];
        if ($array === null) {
            return $result;
        }
        foreach ($array as $item) {
            if ($item['rarity'] === $rarity) {
                $result[] = $item;
            }
        }
        return $result;
    }

    public function filterSkinByCondition($conditionName, $array) {
        $result = [];
        if ($array === null) {
            return $result;
        }
        foreach ($array as $item) {
            if ($item['condition_name'] === $conditionName) {
                $result[] = $item;
            }
        }
        return $result;
    }

    public function filterSkinBySeason($season, $array) {
        $result = [];
        if ($array === null) {
            return $result;
        }
        foreach ($array as $item) {
            if ($item['id_season'] === $season) {
                $result[] = $item;
            }
        }
        return $result;
    }

    public function filterSkinRecolor($array, $recolor) {
        // $recolor = true to get only recolors, false to exclude recolors
        $result = [];
        if ($array === null) {
            return $result;
        }
        foreach ($array as $item) {
            if ( ($recolor && $item['recolor_of'] != null) || (!$recolor && $item['recolor_of'] == null) ) {
                $result[] = $item;
            }
        }
        return $result;
    }

    public function filterSkinByHeroAndCategory($heroName, $categoryName, $array) {
        $result = [];
        if ($array === null) {
            return $result;
        }
        foreach ($array as $item) {
            if ($item['hero_name'] === $heroName && $item['category_name'] === $categoryName) {
                $result[] = $item;
            }
        }
        return $result;
    }

    public function getSkinById($id) {
        $req = 'SELECT hero.name AS hero_name, skin.name AS skin_name, skin.rarity, skin.image_url, category.name AS category_name, skin.recolor_of as recolor_of, skin2.name AS recolor_name
              FROM skin
              LEFT JOIN hero ON skin.id_hero = hero.id
              LEFT JOIN category ON skin.id_category = category.id
              LEFT JOIN skin AS skin2 ON skin.recolor_of = skin2.id
              WHERE skin.id = ' . intval($id) . '
              ORDER BY hero.name, skin.name';
        $stmt = $this->_db->prepare($req);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt;
    }

  }
 ?>
