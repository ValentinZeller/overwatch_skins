let heroes = [
  'ana',
  'ashe',
  'baptiste',
  'bastion',
  'brigitte',
  'cassidy',
  'd.va',
  'doomfist',
  'echo',
  'genji',
  'hanzo',
  'junkrat',
  'lúcio',
  'mei',
  'mercy',
  'moira',
  'orisa',
  'pharah',
  'reaper',
  'reinhardt',
  'roadhog',
  'sigma',
  'soldier 76',
  'sombra',
  'symmetra',
  'torbjorn',
  'tracer',
  'widowmaker',
  'winston',
  'wrecking ball',
  'zarya',
  'zenyatta',
  'total'
]

let heroesID = [
  'ana',
  'ashe',
  'baptiste',
  'bastion',
  'brigitte',
  'cassidy',
  'd.va',
  'doomfist',
  'echo',
  'genji',
  'hanzo',
  'junkrat',
  'lúcio',
  'mei',
  'mercy',
  'moira',
  'orisa',
  'pharah',
  'reaper',
  'reinhardt',
  'roadhog',
  'sigma',
  'soldier 76',
  'sombra',
  'symmetra',
  'torbjorn',
  'tracer',
  'widowmaker',
  'winston',
  'wrecking ball',
  'zarya',
  'zenyatta',
  'total'
]

let categories = [
  'summer games',
  'halloween terror',
  'winter wonderland',
  'lunar new year',
  'archives',
  'anniversary',
  'permanent',
  'challenge',
  'blizzard',
  'overwatch league',
  'total'
]

let categoriesID = [
  'summer games',
  'halloween terror',
  'winter wonderland',
  'lunar new year',
  'archives',
  'anniversary',
  'permanent',
  'challenge',
  'blizzard',
  'overwatch league',
  'total'
]

let skins =
  [
    [ //ana
      [
        {
          "name": "cabana",
          "rarity": 1
        }
      ],
      [
        {
          "name": "ghoul",
          "rarity": 0
        },
        {
          "name": "corsair",
          "rarity": 1
        },
        {
          "name": "pharaoh",
          "rarity": 1
        }
      ],
      [
        {
          "name": "snowowl",
          "rarity": 1,
          "display": "snow owl"
        },
        {
          "name": "gingerbread",
          "rarity": 0
        }
      ],
      [
        {
          "name": "tal",
          "rarity": 0
        }
      ],
      [
        {
          "name": "sniper",
          "rarity": 1
        }
      ],
      [
        {
          "name": "cybermedic",
          "rarity": 0
        },
        {
          "name": "nightowl",
          "rarity": 1,
          "display": "night owl"
        }
      ],
      [],
      [
        {
          "name": "bastet",
          "rarity": 0
        }
      ],
      [],
      [
        {
          "name": "haroeris",
          "rarity": 1
        }
      ]
    ],
    [ //ashe
      [
        {
          "name": "poolside",
          "rarity": 1
        }
      ],
      [
        {
          "name": "warlock",
          "rarity": 1
        }
      ],
      [
        {
          "name": "winter",
          "rarity": 0
        }
      ],
      [
        {
          "name": "tigerhuntress",
          "rarity": 1,
          "display": "tiger huntress"
        },
        {
          "name": "prosperity",
          "rarity": 0
        }
      ],
      [
        {
          "name": "socialite",
          "rarity": 1
        }
      ],
      [
        {
          "name": "littlered",
          "rarity": 1,
          "display": "little red"
        }
      ],
      [],
      [
        {
          "name": "mardigras",
          "rarity": 0,
          "display": "mardi gras"
        },
        {
          "name": "deadlock",
          "rarity": 1
        }
      ],
      [],
      []
    ],
    [ //baptiste
      [
        {
          "name": "tropical",
          "rarity": 1
        }
      ],
      [
        {
          "name": "vampire",
          "rarity": 0
        }
      ],
      [
        {
          "name": "snowboarder",
          "rarity": 1
        }
      ],
      [
        {
          "name": "terracotamedic",
          "rarity": 0,
          "display": "terracota medic"
        }
      ],
      [
        {
          "name": "talon",
          "rarity": 1
        }
      ],
      [
        {
          "name": "funky",
          "rarity": 1
        },
        {
          "name": "arcticops",
          "rarity": 1,
          "display": "artic ops"
        }
      ],
      [],
      [
        {
          "name": "medic",
          "rarity": 0,
          "display": "combat medic"
        }
      ],
      [],
      []
    ],
    [ //bastion
      [
        {
          "name": "sandcastle",
          "rarity": 0,
          "display": "sand castle"
        }
      ],
      [
        {
          "name": "tombstone",
          "rarity": 0
        },
        {
          "name": "coffin",
          "rarity": 1
        }
      ],
      [
        {
          "name": "avalanche",
          "rarity": 1
        },
        {
          "name": "giftwrap",
          "rarity": 0,
          "display": "gift wrap"
        }
      ],
      [
        {
          "name": "rooster",
          "rarity": 0
        },
        {
          "name": "dragonfire",
          "rarity": 1
        }
      ],
      [
        {
          "name": "nullsector",
          "rarity": 0,
          "display": "null sector"
        },
        {
          "name": "gwishin",
          "rarity": 1
        }
      ],
      [
        {
          "name": "dunebuggy",
          "rarity": 1,
          "display": "dune buggy"
        },
        {
          "name": "stealth",
          "rarity": 1
        }
      ],
      [],
      [
        {
          "name": "brick",
          "rarity": 1
        }
      ],
      [
        {
          "name": "origins",
          "rarity": 1,
          "display": "overgrown"
        },
        {
          "name": "blizzcon",
          "rarity": 0,
          "display": "blizzcon 2016"
        }
      ],
      [
        {
          "name": "pirate",
          "rarity": 1,
          "display": "pirate ship"
        }
      ]
    ],
    [ //brigitte
      [
        {
          "name": "trekonor",
          "rarity": 0,
          "display": "tre konor"
        },
        {
          "name": "feskarn",
          "rarity": 1
        }
      ],
      [
        {
          "name": "stone",
          "rarity": 0
        },
        {
          "name": "vampirehunter",
          "rarity": 1,
          "display": "vampire hunter"
        }
      ],
      [
        {
          "name": "peppermintbark",
          "rarity": 0,
          "display": "peppermint bark"
        }
      ],
      [
        {
          "name": "general",
          "rarity": 0
        },
        {
          "name": "opera",
          "rarity": 1
        }
      ],
      [],
      [
        {
          "name": "shieldmaiden",
          "rarity": 1
        },
        {
          "name": "riotpolice",
          "rarity": 1,
          "display": "riot police"
        }
      ],
      [],
      [],
      [
        {
          "name": "medic",
          "rarity": 1
        }
      ],
      [
        {
          "name": "goat",
          "rarity": 1
        }
      ]
    ],
    [ //cassidy
      [
        {
          "name": "american",
          "rarity": 0
        },
        {
          "name": "lifeguard",
          "rarity": 1
        }
      ],
      [
        {
          "name": "vanhelsing",
          "rarity": 1,
          "display": "van helsing"
        },
        {
          "name": "undead",
          "rarity": 0
        }
      ],
      [
        {
          "name": "scrooge",
          "rarity": 0
        },
        {
          "name": "mountainman",
          "rarity": 1,
          "display": "mountain man"
        }
      ],
      [
        {
          "name": "magistrate",
          "rarity": 1
        },
        {
          "name": "xiake",
          "rarity": 0
        }
      ],
      [
        {
          "name": "blackwatch",
          "rarity": 1
        },
        {
          "name": "deadlock",
          "rarity": 1
        }
      ],
      [
        {
          "name": "sherlock",
          "rarity": 1
        },
        {
          "name": "maskedman",
          "rarity": 0,
          "display": "masked man"
        }
      ],
      [
        {
          "name": "royal",
          "rarity": 0
        }
      ],
      [
        {
          "name": "sandstorm",
          "rarity": 0
        }
      ],
      [],
      []
    ],
    [ //d.va
      [
        {
          "name": "taekgeukgi",
          "rarity": 0
        },
        {
          "name": "waveracer",
          "rarity": 1
        }
      ],
      [
        {
          "name": "shinryeong",
          "rarity": 1,
          "display": "shin-ryeong"
        }
      ],
      [
        {
          "name": "sleighing",
          "rarity": 1
        }
      ],
      [
        {
          "name": "palanquin",
          "rarity": 1
        }
      ],
      [],
      [
        {
          "name": "cruiser",
          "rarity": 1
        },
        {
          "name": "midnight",
          "rarity": 0
        },
        {
          "name": "academy",
          "rarity": 1
        },
        {
          "name": "whitecat",
          "rarity": 1,
          "display": "white cat"
        },
        {
          "name": "varsity",
          "rarity": 1
        }
      ],
      [
        {
          "name": "police",
          "rarity": 1
        },
        {
          "name": "blackcat",
          "rarity": 1,
          "display": "black cat"
        }
      ],
      [
        {
          "name": "nanocola",
          "rarity": 0,
          "display": "nano"
        }
      ],
      [],
      [
        {
          "name": "allstar",
          "rarity": 1,
          "display": "2020 pacific all-stars"
        }
      ]
    ],
    [ //doomfist
      [
        {
          "name": "karate",
          "rarity": 1
        }
      ],
      [
        {
          "name": "swampmonster",
          "rarity": 1,
          "display": "swamp monster"
        }
      ],
      [
        {
          "name": "jotunn",
          "rarity": 1
        }
      ],
      [
        {
          "name": "monk",
          "rarity": 0
        }
      ],
      [
        {
          "name": "talon",
          "rarity": 1
        }
      ],
      [
        {
          "name": "formal",
          "rarity": 1
        },
        {
          "name": "carbonfiber",
          "rarity": 0,
          "display": "carbon fiber"
        },
        {
          "name": "gladiator",
          "rarity": 1
        }
      ],
      [
        {
          "name": "blackhand",
          "rarity": 1
        }
      ],
      [],
      [
        {
          "name": "general",
          "rarity": 0
        }
      ],
      [
        {
          "name": "thunder",
          "rarity": 1
        }
      ]
    ],
    [ //echo
      [
        {
          "name": "surfsup",
          "rarity": 1,
          "display": "surf's up"
        }
      ],
      [
        {
          "name": "ragdoll",
          "rarity": 0
        },
        {
          "name": "vampirebat",
          "rarity": 1,
          "display": "vampire bat"
        }
      ],
      [],
      [
        {
          "name": "kkachi",
          "rarity": 1
        }
      ],
      [],
      [
        {
          "name": "birdofparadise",
          "rarity": 0,
          "display": "bird of paradise"
        }
      ],
      [],
      [],
      [],
      [
        {
          "name": "goodevil",
          "rarity": 1,
          "display": "good and evil"
        }
      ]
    ],
    [ //genji
      [
        {
          "name": "nihon",
          "rarity": 0
        },
        {
          "name": "kendoka",
          "rarity": 1
        }
      ],
      [
        {
          "name": "karasutengu",
          "rarity": 1,
          "display": "karasu-tengu"
        },
        {
          "name": "skeleton",
          "rarity": 0
        }
      ],
      [
        {
          "name": "icewraith",
          "rarity": 1,
          "display": "ice wraith"
        }
      ],
      [
        {
          "name": "baihu",
          "rarity": 1
        }
      ],
      [
        {
          "name": "blackwatch",
          "rarity": 1
        },
        {
          "name": "bushi",
          "rarity": 1
        }
      ],
      [
        {
          "name": "sentai",
          "rarity": 1
        },
        {
          "name": "demon",
          "rarity": 1
        },
        {
          "name": "genjiman",
          "rarity": 1
        }
      ],
      [
        {
          "name": "oni",
          "rarity": 1
        }
      ],
      [],
      [
        {
          "name": "illidan",
          "rarity": 1
        }
      ],
      [
        {
          "name": "allstar",
          "rarity": 1,
          "display": "2018 pacific all-stars"
        },
        {
          "name": "happi",
          "rarity": 1
        }
      ]
    ],
    [ //hanzo
      [
        {
          "name": "wave",
          "rarity": 1
        },
        {
          "name": "nihon",
          "rarity": 0
        }
      ],
      [
        {
          "name": "demon",
          "rarity": 0
        },
        {
          "name": "daitengu",
          "rarity": 1,
          "display": "dai-tengu"
        }
      ],
      [
        {
          "name": "casual",
          "rarity": 1
        }
      ],
      [
        {
          "name": "huangzhong",
          "rarity": 1,
          "display": "huang zhong"
        }
      ],
      [
        {
          "name": "scion",
          "rarity": 1
        }
      ],
      [
        {
          "name": "cyberninja",
          "rarity": 1
        },
        {
          "name": "darkwolf",
          "rarity": 1,
          "display": "dark wolf"
        }
      ],
      [
        {
          "name": "kabuki",
          "rarity": 1
        }
      ],
      [
        {
          "name": "kanezaka",
          "rarity": 0,
          "display": "kyōgisha"
        }
      ],
      [],
      []
    ],
    [ //junkrat
      [
        {
          "name": "cricket",
          "rarity": 1
        }
      ],
      [
        {
          "name": "drjunkeinstein",
          "rarity": 1,
          "display": "dr. junkeinstein"
        },
        {
          "name": "inferno",
          "rarity": 0
        }
      ],
      [
        {
          "name": "beachrat",
          "rarity": 1
        },
        {
          "name": "krampus",
          "rarity": 1
        },
        {
          "name": "elf",
          "rarity": 0
        }
      ],
      [
        {
          "name": "firework",
          "rarity": 0
        }
      ],
      [
        {
          "name": "circus",
          "rarity": 0
        },
        {
          "name": "kingjamison",
          "rarity": 1,
          "display": "king jamison"
        }
      ],
      [
        {
          "name": "bilgerat",
          "rarity": 1
        },
        {
          "name": "junkfood",
          "rarity": 1
        }
      ],
      [
        {
          "name": "caution",
          "rarity": 0
        }
      ],
      [],
      [],
      []
    ],
    [ //lúcio
      [
        {
          "name": "striker",
          "rarity": 1
        },
        {
          "name": "selecao",
          "rarity": 1,
          "display": "seleção"
        }
      ],
      [
        {
          "name": "gorgon",
          "rarity": 0
        },
        {
          "name": "satyr",
          "rarity": 1
        }
      ],
      [
        {
          "name": "andes",
          "rarity": 0
        },
        {
          "name": "snowfox",
          "rarity": 1,
          "display": "snow fox"
        }
      ],
      [
        {
          "name": "samulnori",
          "rarity": 1,
          "display": "samul nori"
        }
      ],
      [
        {
          "name": "equalizer",
          "rarity": 1
        },
        {
          "name": "corredor",
          "rarity": 0
        }
      ],
      [
        {
          "name": "jazzy",
          "rarity": 1
        },
        {
          "name": "bitrate",
          "rarity": 0
        },
        {
          "name": "poisondart",
          "rarity": 1,
          "display": "poison dart"
        }
      ],
      [
        {
          "name": "capoeira",
          "rarity": 1
        }
      ],
      [],
      [],
      [
        {
          "name": "allstar",
          "rarity": 1,
          "display": "2019 pacific all-stars"
        }
      ]
    ],
    [ //mei
      [
        {
          "name": "zongguo",
          "rarity": 0
        },
        {
          "name": "sprinkles",
          "rarity": 1
        }
      ],
      [
        {
          "name": "jiangshi",
          "rarity": 1
        },
        {
          "name": "pumpkin",
          "rarity": 0
        }
      ],
      [
        {
          "name": "meirry",
          "rarity": 1,
          "display": "mei-rry"
        },
        {
          "name": "penguin",
          "rarity": 1
        }
      ],
      [
        {
          "name": "luna",
          "rarity": 1
        },
        {
          "name": "change",
          "rarity": 1,
          "display": "chang'e"
        }
      ],
      [
        {
          "name": "pajamei",
          "rarity": 1
        },
        {
          "name": "bear",
          "rarity": 0
        }
      ],
      [
        {
          "name": "beekeeper",
          "rarity": 1
        },
        {
          "name": "honeydew",
          "rarity": 1
        }
      ],
      [
        {
          "name": "ecopoint",
          "rarity": 1,
          "display": "ecopoint: antarctica"
        }
      ],
      [],
      [],
      [
        {
          "name": "mm",
          "rarity": 1,
          "display": "mm-mei"
        }
      ]
    ],
    [ //mercy
      [
        {
          "name": "eidgenossin",
          "rarity": 0
        },
        {
          "name": "wingedvictory",
          "rarity": 1,
          "display": "winged victory"
        }
      ],
      [
        {
          "name": "witch",
          "rarity": 1
        }
      ],
      [
        {
          "name": "sugarplumfairy",
          "rarity": 1,
          "display": "sugar plum fairy"
        },
        {
          "name": "snowangel",
          "rarity": 0,
          "display": "snow angel"
        }
      ],
      [
        {
          "name": "fortune",
          "rarity": 0
        },
        {
          "name": "zhuque",
          "rarity": 1
        },
        {
          "name": "seolbim",
          "rarity": 1
        }
      ],
      [
        {
          "name": "combatmedic",
          "rarity": 1,
          "display": "combat medic"
        },
        {
          "name": "camouflage",
          "rarity": 0
        }
      ],
      [
        {
          "name": "dragoon",
          "rarity": 1
        },
        {
          "name": "mage",
          "rarity": 1
        }
      ],
      [],
      [
        {
          "name": "dr",
          "rarity": 1,
          "display": "dr. ziegler"
        }
      ],
      [
        {
          "name": "bcrf",
          "rarity": 1,
          "display": "pink"
        }
      ],
      [
        {
          "name": "allstar",
          "rarity": 1,
          "display": "2019 atlantic all-stars"
        },
        {
          "name": "royal_knight",
          "rarity": 1,
          "display": "royal knight"
        }
      ]
    ],
    [ //moira
      [
        {
          "name": "eireannach",
          "rarity": 0
        }
      ],
      [
        {
          "name": "banshee",
          "rarity": 1
        }
      ],
      [
        {
          "name": "holly",
          "rarity": 0
        },
        {
          "name": "iceempress",
          "rarity": 1,
          "display": "ice empress"
        }
      ],
      [
        {
          "name": "maskdancer",
          "rarity": 1,
          "display": "mask dancer"
        }
      ],
      [
        {
          "name": "blackwatch",
          "rarity": 1
        },
        {
          "name": "scientist",
          "rarity": 1
        }
      ],
      [
        {
          "name": "venus",
          "rarity": 1
        }
      ],
      [],
      [],
      [],
      []
    ],
    [ //orisa
      [
        {
          "name": "icecream",
          "rarity": 0,
          "display": "ice cream"
        },
        {
          "name": "referee",
          "rarity": 1
        }
      ],
      [
        {
          "name": "demon",
          "rarity": 1
        }
      ],
      [
        {
          "name": "reindeer",
          "rarity": 1
        }
      ],
      [
        {
          "name": "sanye",
          "rarity": 0
        },
        {
          "name": "bulldemon",
          "rarity": 1,
          "display": "bull demon"
        }
      ],
      [
        {
          "name": "nullsector",
          "rarity": 1,
          "display": "null sector"
        }
      ],
      [
        {
          "name": "forestspirit",
          "rarity": 1,
          "display": "forest spirit"
        }
      ],
      [
        {
          "name": "immortal",
          "rarity": 1
        }
      ],
      [],
      [],
      []
    ],
    [ //pharah
      [
        {
          "name": "lifeguard",
          "rarity": 1
        },
        {
          "name": "sunset",
          "rarity": 0
        }
      ],
      [
        {
          "name": "possessed",
          "rarity": 0
        },
        {
          "name": "enchantedarmor",
          "rarity": 1,
          "display": "enchanted armor"
        }
      ],
      [
        {
          "name": "frostbite",
          "rarity": 0
        }
      ],
      [
        {
          "name": "qinglong",
          "rarity": 1
        }
      ],
      [
        {
          "name": "aviator",
          "rarity": 1
        }
      ],
      [
        {
          "name": "bedouin",
          "rarity": 1
        },
        {
          "name": "carbonfiber",
          "rarity": 0,
          "display": "carbon fiber"
        },
        {
          "name": "orbital",
          "rarity": 1
        },
        {
          "name": "mechatron",
          "rarity": 1
        }
      ],
      [
        {
          "name": "asp",
          "rarity": 1
        }
      ],
      [],
      [
        {
          "name": "origins",
          "rarity": 1,
          "display": "security chief"
        }
      ],
      []
    ],
    [ //reaper
      [
        {
          "name": "biker",
          "rarity": 1
        },
        {
          "name": "american",
          "rarity": 0
        }
      ],
      [
        {
          "name": "pumpkin",
          "rarity": 1
        },
        {
          "name": "dracula",
          "rarity": 1
        }
      ],
      [
        {
          "name": "shiver",
          "rarity": 0
        },
        {
          "name": "ratking",
          "rarity": 1,
          "display": "rat king"
        }
      ],
      [
        {
          "name": "lubu",
          "rarity": 1,
          "display": "lü bu"
        },
        {
          "name": "imperialguard",
          "rarity": 0,
          "display": "imperial guard"
        }
      ],
      [
        {
          "name": "soldier24",
          "rarity": 1,
          "display": "soldier: 24"
        }
      ],
      [
        {
          "name": "masquerade",
          "rarity": 1
        },
        {
          "name": "evermore",
          "rarity": 1
        }
      ],
      [
        {
          "name": "hellfire",
          "rarity": 0
        }
      ],
      [
        {
          "name": "dusk",
          "rarity": 1
        }
      ],
      [
        {
          "name": "origins",
          "rarity": 1,
          "display": "blackwatch reyes"
        }
      ],
      [
        {
          "name": "luchador",
          "rarity": 1
        }
      ]
    ],
    [ //reinhardt
      [
        {
          "name": "gridironhardt",
          "rarity": 1
        },
        {
          "name": "bundesadler",
          "rarity": 0
        }
      ],
      [
        {
          "name": "coldhardt",
          "rarity": 0
        },
        {
          "name": "draugr",
          "rarity": 1
        }
      ],
      [
        {
          "name": "festive",
          "rarity": 0
        },
        {
          "name": "conductor",
          "rarity": 1
        }
      ],
      [
        {
          "name": "wujing",
          "rarity": 1
        },
        {
          "name": "guanyu",
          "rarity": 1
        }
      ],
      [
        {
          "name": "lieutenantwilhelm",
          "rarity": 0,
          "display": "lieutenant wilhelm"
        }
      ],
      [
        {
          "name": "steelhardt",
          "rarity": 1
        }
      ],
      [
        {
          "name": "balderich",
          "rarity": 1
        },
        {
          "name": "greifhardt",
          "rarity": 1
        },
        {
          "name": "crusader",
          "rarity": 1
        }
      ],
      [],
      [
        {
          "name": "raynhardt",
          "rarity": 1
        }
      ],
      [
        {
          "name": "allstar",
          "rarity": 1,
          "display": "2020 atlantic all-stars"
        }
      ]
    ],
    [ //roadhog
      [
        {
          "name": "lacrosse",
          "rarity": 1
        }
      ],
      [
        {
          "name": "junkeinsteinmonster",
          "rarity": 1,
          "display": "junkeinstein's monster"
        },
        {
          "name": "clown",
          "rarity": 0
        }
      ],
      [
        {
          "name": "rudolph",
          "rarity": 0
        },
        {
          "name": "icefisherman",
          "rarity": 1,
          "display": "ice fisherman"
        },
        {
          "name": "frosty",
          "rarity": 0
        }
      ],
      [
        {
          "name": "bajie",
          "rarity": 1
        }
      ],
      [
        {
          "name": "militia",
          "rarity": 1
        }
      ],
      [
        {
          "name": "toxic",
          "rarity": 1
        },
        {
          "name": "noxious",
          "rarity": 1
        }
      ],
      [
        {
          "name": "butcher",
          "rarity": 1
        }
      ],
      [
        {
          "name": "pachimari",
          "rarity": 0
        }
      ],
      [],
      [
        {
          "name": "midas",
          "rarity": 1
        }
      ]
    ],
    [ //sigma
      [
        {
          "name": "scuba",
          "rarity": 1
        }
      ],
      [
        {
          "name": "flyingdutchman",
          "rarity": 1,
          "display": "flying dutchman"
        }
      ],
      [
        {
          "name": "rime",
          "rarity": 1
        }
      ],
      [],
      [],
      [
        {
          "name": "carbonfiber",
          "rarity": 0,
          "display": "carbon fiber"
        }
      ],
      [],
      [
        {
          "name": "maestro",
          "rarity": 1
        }
      ],
      [],
      []
    ],
    [ //soldier 76
      [
        {
          "name": "grillmaster",
          "rarity": 1,
          "display": "grillmaster: 76"
        }
      ],
      [
        {
          "name": "immortal",
          "rarity": 0
        },
        {
          "name": "slasher",
          "rarity": 1,
          "display": "slasher: 76"
        }
      ],
      [
        {
          "name": "alpine",
          "rarity": 1,
          "display": "alpine: 76"
        },
        {
          "name": "uglysweater",
          "rarity": 0,
          "display": "ugly sweater: 76"
        }
      ],
      [
        {
          "name": "auspicious",
          "rarity": 0
        }
      ],
      [
        {
          "name": "formal",
          "rarity": 1,
          "display": "formal: 76"
        },
        {
          "name": "1776",
          "rarity": 1,
          "display": "solider: 1776"
        }
      ],
      [
        {
          "name": "cyborg",
          "rarity": 1,
          "display": "cyborg: 76"
        },
        {
          "name": "venom",
          "rarity": 0
        },
        {
          "name": "proteus",
          "rarity": 1,
          "display": "proteus: 76"
        }
      ],
      [],
      [],
      [
        {
          "name": "origins",
          "rarity": 1,
          "display": "strike commander morrison"
        }
      ],
      []
    ],
    [ //sombra
      [
        {
          "name": "tulum",
          "rarity": 1
        },
        {
          "name": "mexicana",
          "rarity": 0
        }
      ],
      [
        {
          "name": "bride",
          "rarity": 1
        },
        {
          "name": "fantasma",
          "rarity": 0
        }
      ],
      [
        {
          "name": "peppermint",
          "rarity": 0
        },
        {
          "name": "rime",
          "rarity": 1
        }
      ],
      [
        {
          "name": "facechanger",
          "rarity": 1,
          "display": "face changer"
        }
      ],
      [
        {
          "name": "talon",
          "rarity": 1
        }
      ],
      [
        {
          "name": "oro",
          "rarity": 0
        },
        {
          "name": "blackcat",
          "rarity": 1,
          "display": "black cat"
        },
        {
          "name": "neoncat",
          "rarity": 1,
          "display": "neon cat"
        }
      ],
      [],
      [],
      [
        {
          "name": "demonhunter",
          "rarity": 1,
          "display": "demon hunter"
        },
        {
          "name": "jester",
          "rarity": 0
        }
      ],
      [
        {
          "name": "zhulong",
          "rarity": 1
        }
      ]
    ],
    [ //symmetra
      [
        {
          "name": "mermaid",
          "rarity": 1
        }
      ],
      [
        {
          "name": "vampire",
          "rarity": 0
        },
        {
          "name": "dragon",
          "rarity": 1
        }
      ],
      [
        {
          "name": "figureskater",
          "rarity": 1,
          "display": "figure skater"
        },
        {
          "name": "mistletoe",
          "rarity": 0
        }
      ],
      [
        {
          "name": "qipao",
          "rarity": 0
        }
      ],
      [
        {
          "name": "holi",
          "rarity": 0
        }
      ],
      [
        {
          "name": "oasis",
          "rarity": 1
        },
        {
          "name": "magician",
          "rarity": 1
        },
        {
          "name": "hydra",
          "rarity": 1
        }
      ],
      [
        {
          "name": "peacock",
          "rarity": 0
        }
      ],
      [
        {
          "name": "marammat",
          "rarity": 0
        }
      ],
      [
        {
          "name": "tyrande",
          "rarity": 1
        }
      ],
      []
    ],
    [ //torbjorn
      [
        {
          "name": "trekronor",
          "rarity": 0,
          "display": "tre konor"
        },
        {
          "name": "surfnsplash",
          "rarity": 1,
          "display": "surf 'n' spash"
        }
      ],
      [
        {
          "name": "viking",
          "rarity": 1
        }
      ],
      [
        {
          "name": "santaclad",
          "rarity": 1
        },
        {
          "name": "lumberjack",
          "rarity": 1
        }
      ],
      [
        {
          "name": "zhangfei",
          "rarity": 1,
          "display": "zhang fei"
        }
      ],
      [
        {
          "name": "ironclad",
          "rarity": 1
        },
        {
          "name": "chiefengineerlindholm",
          "rarity": 1,
          "display": "chief engineer lindholm"
        },
        {
          "name": "rustclad",
          "rarity": 0
        }
      ],
      [
        {
          "name": "cybjorn",
          "rarity": 1,
          "display": "cybjörn"
        }
      ],
      [
        {
          "name": "magni",
          "rarity": 1
        }
      ],
      [],
      [],
      []
    ],
    [ //tracer
      [
        {
          "name": "trackandfield",
          "rarity": 1,
          "display": "track and field"
        },
        {
          "name": "sprinter",
          "rarity": 1
        },
        {
          "name": "unionjack",
          "rarity": 0,
          "display": "union jack"
        }
      ],
      [
        {
          "name": "willowisp",
          "rarity": 1,
          "display": "will-o'-wisp"
        }
      ],
      [
        {
          "name": "jingle",
          "rarity": 1
        },
        {
          "name": "wooltide",
          "rarity": 0
        }
      ],
      [
        {
          "name": "rose",
          "rarity": 0
        },
        {
          "name": "honggildong",
          "rarity": 1,
          "display": "hong gildong"
        },
        {
          "name": "nezha",
          "rarity": 1
        }
      ],
      [
        {
          "name": "cadetoxton",
          "rarity": 1,
          "display": "cadet oxton"
        },
        {
          "name": "cavalry",
          "rarity": 1
        }
      ],
      [
        {
          "name": "graffiti",
          "rarity": 1
        },
        {
          "name": "lightning",
          "rarity": 0
        },
        {
          "name": "tagged",
          "rarity": 1
        }
      ],
      [],
      [
        {
          "name": "comic",
          "rarity": 0,
          "display": "comic book"
        }
      ],
      [
        {
          "name": "origins",
          "rarity": 1,
          "display": "slipstream"
        }
      ],
      [
        {
          "name": "allstar",
          "rarity": 1,
          "display": "2018 atlantic all-stars"
        }
      ]
    ],
    [ //widowmaker
      [
        {
          "name": "tricolore",
          "rarity": 0
        },
        {
          "name": "coteazur",
          "rarity": 1,
          "display": "côte d'azur"
        }
      ],
      [
        {
          "name": "spider",
          "rarity": 0
        },
        {
          "name": "scorpion",
          "rarity": 1
        }
      ],
      [
        {
          "name": "biathlon",
          "rarity": 1
        }
      ],
      [
        {
          "name": "blacklily",
          "rarity": 1,
          "display": "black lily"
        },
        {
          "name": "paleserpent",
          "rarity": 1,
          "display": "pale serpent"
        }
      ],
      [
        {
          "name": "talon",
          "rarity": 1
        },
        {
          "name": "mousquetaire",
          "rarity": 1
        }
      ],
      [
        {
          "name": "electric",
          "rarity": 0
        },
        {
          "name": "fleurlys",
          "rarity": 0,
          "display": "fleur de lis"
        }
      ],
      [
        {
          "name": "nova",
          "rarity": 1
        }
      ],
      [],
      [
        {
          "name": "preorder",
          "rarity": 1,
          "display": "noire"
        },
        {
          "name": "kerrigan",
          "rarity": 1
        }
      ],
      [
        {
          "name": "angemort",
          "rarity": 1,
          "display": "ange de la mort"
        }
      ]
    ],
    [ //winston
      [
        {
          "name": "catcher",
          "rarity": 1
        },
        {
          "name": "oceanking",
          "rarity": 0,
          "display": "ocean king"
        }
      ],
      [
        {
          "name": "werewolf",
          "rarity": 1
        }
      ],
      [
        {
          "name": "yeti",
          "rarity": 1
        }
      ],
      [
        {
          "name": "wukong",
          "rarity": 1
        },
        {
          "name": "ancientbronze",
          "rarity": 0,
          "display": "ancient bronze"
        }
      ],
      [
        {
          "name": "specimen28",
          "rarity": 1,
          "display": "specimen 28"
        }
      ],
      [
        {
          "name": "gargoyle",
          "rarity": 1
        }
      ],
      [],
      [],
      [
        {
          "name": "blizzcon",
          "rarity": 0,
          "display": "blizzcon 2017"
        }
      ],
      [
        {
          "name": "ace",
          "rarity": 1,
          "display": "flying ace"
        }
      ]
    ],
    [ //wrecking ball
      [
        {
          "name": "lucioball",
          "rarity": 1,
          "display": "lúcioball"
        }
      ],
      [
        {
          "name": "jackolantern",
          "rarity": 1,
          "display": "jack-o'-lantern"
        }
      ],
      [
        {
          "name": "snowman",
          "rarity": 1
        }
      ],
      [
        {
          "name": "papercutting",
          "rarity": 0,
          "display": "paper cutting"
        },
        {
          "name": "porcelain",
          "rarity": 0
        }
      ],
      [
        {
          "name": "highroller",
          "rarity": 0,
          "display": "high roller"
        }
      ],
      [
        {
          "name": "submarine",
          "rarity": 1
        },
        {
          "name": "8ball",
          "rarity": 0,
          "display": "8 ball"
        }
      ],
      [],
      [],
      [],
      []
    ],
    [ //zarya
      [
        {
          "name": "weightlifter",
          "rarity": 1
        },
        {
          "name": "champion",
          "rarity": 1
        }
      ],
      [
        {
          "name": "totally80",
          "rarity": 1,
          "display": "totally 80's"
        },
        {
          "name": "einherjar",
          "rarity": 0
        }
      ],
      [
        {
          "name": "frosted",
          "rarity": 0
        },
        {
          "name": "snowboarder",
          "rarity": 1
        }
      ],
      [
        {
          "name": "xuanwu",
          "rarity": 1
        }
      ],
      [
        {
          "name": "racer",
          "rarity": 0
        },
        {
          "name": "workout",
          "rarity": 1
        },
        {
          "name": "polyanitsa",
          "rarity": 1
        }
      ],
      [
        {
          "name": "cyberian",
          "rarity": 1
        }
      ],
      [
        {
          "name": "barbarian",
          "rarity": 1
        }
      ],
      [],
      [],
      [
        {
          "name": "alien",
          "rarity": 1
        }
      ]
    ],
    [ //zenyatta
      [
        {
          "name": "fastball",
          "rarity": 1
        }
      ],
      [
        {
          "name": "skullyatta",
          "rarity": 0
        },
        {
          "name": "cultist",
          "rarity": 1
        }
      ],
      [
        {
          "name": "nutcracker",
          "rarity": 1
        },
        {
          "name": "toybot",
          "rarity": 1
        }
      ],
      [
        {
          "name": "sanzang",
          "rarity": 1
        },
        {
          "name": "zhugeliang",
          "rarity": 1,
          "display": "zhuge liang"
        }
      ],
      [
        {
          "name": "subaquatic",
          "rarity": 0
        }
      ],
      [
        {
          "name": "huitzilopochtli",
          "rarity": 1
        },
        {
          "name": "zealot",
          "rarity": 1
        }
      ],
      [
        {
          "name": "carbonfiber",
          "rarity": 0
        }
      ],
      [],
      [],
      [
        {
          "name": "sennakji",
          "rarity": 1,
          "display": "zen-nakji"
        }
      ]
    ]
  ]

