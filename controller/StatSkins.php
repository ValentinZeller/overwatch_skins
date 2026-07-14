<?php
    enum StatType: String {
        case Total = "total";
        case Seasons = "seasons";
        case Average = "average";
        case LastSeason = "last season";
        case Recolors = "recolors";

        public function id():int {
            return match($this) {
                self::Total => 1,
                self::Seasons => 2,
                self::Average => 3,
                self::LastSeason => 4,
                self::Recolors => 5
            };
        }
    }

    class StatSkins { 
        private $_skins;
        private $_hero;
        private $_firstSeason;
        private $_nbSeason;
        
        public function __construct($skins, $hero, $seasons) {
            $this->setSkins($skins);
            $this->setHero($hero);
            $this->setFirstSeason($seasons);
            $this->setNbSeason($seasons);
        }
        
        public function setSkins($skins) {
            $this->_skins = $skins;
        }

        public function setHero($hero) {
            $this->_hero = $hero;
        }

        public function setFirstSeason($seasons) {
            $this->_firstSeason = intval(array_search($this->_hero['release_date'], array_column($seasons, 'start_date')));
        }

        public function setNbSeason($seasons) {
            $this->_nbSeason = count($seasons) - $this->_firstSeason;
        }

        public function total() {
            return count($this->_skins);
        }

        public function seasons() {
            $result = 0;
            $maxSeason = $this->_firstSeason + $this->_nbSeason;
            for($i=$this->_firstSeason ; $i<=$maxSeason ; $i++) {
                $hasSkin = in_array($i, array_column($this->_skins, 'id_season'));
                if ($hasSkin) {
                    $result++;
                }
            }
            return $result;
        }

        public function average() {
            return round(count($this->_skins) / $this->_nbSeason, 2);
        }

        public function lastSeason() {
            $result = $this->_firstSeason;
            foreach($this->_skins as $skin) {
                $result = ($skin['id_season'] > $result) ? $skin['id_season'] : $result;
            }
            return $result;
        }

        public function recolors() {
            $recolors = array_filter($this->_skins, function($skin) {
                if ($skin['recolor_of'] != null) {
                    return $skin;
                }
                return;
            });
            return count($recolors);
        }

        public function results() {
            $result[StatType::Total->id()] = $this->total();
            $result[StatType::Seasons->id()] = $this->seasons();
            $result[StatType::Average->id()] = $this->average();
            $result[StatType::LastSeason->id()] = $this->lastSeason();
            $result[StatType::Recolors->id()] = $this->recolors();
            return $result;
        }
    }
?>