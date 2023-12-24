// Heroes input array, changeable
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
  'illari',
  'junker queen',
  'junkrat',
  'kiriko',
  'lifeweaver',
  'lúcio',
  'mauga',
  'mei',
  'mercy',
  'moira',
  'orisa',
  'pharah',
  'ramattra',
  'reaper',
  'reinhardt',
  'roadhog',
  'sigma',
  'sojourn',
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

// Heroes reference array, not changeable
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
  'illari',
  'junker queen',
  'junkrat',
  'kiriko',
  'lifeweaver',
  'lúcio',
  'mauga',
  'mei',
  'mercy',
  'moira',
  'orisa',
  'pharah',
  'ramattra',
  'reaper',
  'reinhardt',
  'roadhog',
  'sigma',
  'sojourn',
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

// Categories input array, changeable
let categories = [
  'battle pass',
  'shop',
  'challenge',
  'blizzard',
  'overwatch league',
  'total'
]

// Categories reference array, not changeable
let categoriesID = [
  'battle pass',
  'shop',
  'challenge',
  'blizzard',
  'overwatch league',
  'total'
]

// Skins reference array
let skins = [
  [ //ana
    [
      {
        "name": "polar",
        "rarity": 0
      },
      {
        "name": "botanist",
        "rarity": 1
      },
      {
        "name": "nighthawker",
        "rarity": 1
      },
      {
        "name": "a-7000 wargod",
        "rarity": 2
      }
    ],
    [
      {
        "name": "midnight camo",
        "rarity": 0
      },
      {
        "name": "blackbraid",
        "rarity": 1
      }
    ],
    [
      {
        "name": "spiritwarder",
        "rarity": 0
      }
    ],
    [],
    [],
  ],
  [ //ashe
    [
      {
        "name": "snake wrangler",
        "rarity": 0
      },
      {
        "name": "intergalatic smuggler",
        "rarity": 1
      }
    ],
    [
      {
        "name": "merry outlaw",
        "rarity": 0
      },
      {
        "name": "raijin",
        "rarity": 1
      },
      {
        "name": "haunted doll",
        "rarity": 1
      },
      {
        "name": "storm rider",
        "rarity": 1
      }
    ],
    [],
    [],
    []
  ],
  [ //baptiste
    [
      {
        "name": "deluxe",
        "rarity": 0
      }
    ],
    [
      {
        "name": "blue steel",
        "rarity": 0
      },
      {
        "name": "bounty hunter",
        "rarity": 1
      }
    ],
    [
      {
        "name": "formalwear",
        "rarity": 1
      }
    ],
    [],
    []
  ],
  [ //bastion
    [
      {
        "name": "infinite annihilator",
        "rarity": 0
      }
    ],
    [
      {
        "name": "pumpkin",
        "rarity": 0
      },
      {
        "name": "gingerbread",
        "rarity": 1
      },
      {
        "name": "fire engine",
        "rarity": 1
      }
    ],
    [],
    [],
    []
  ],
  [ //brigitte
    [],
    [
      {
        "name": "pearlescent",
        "rarity": 0
      },
      {
        "name": "royal captain",
        "rarity": 1
      },
      {
        "name": "azure drake",
        "rarity": 1
      },
      {
        "name": "antifragile bb",
        "rarity": 1
      }
    ],
    [
      {
        "name": "ice queen",
        "rarity": 0
      },
      {
        "name": "sparkplug",
        "rarity": 1
      }
    ],
    [],
    []
  ],
  [ //cassidy
    [
      {
        "name": "forest ranger",
        "rarity": 0
      },
      {
        "name": "invisible man",
        "rarity": 1
      }
    ],
    [
      {
        "name": "ritzy",
        "rarity": 0
      },
      {
        "name": "space ranger",
        "rarity": 1
      },
      {
        "name": "c-455 sharpshooter",
        "rarity": 1
      }
    ],
    [
      {
        "name": "formalwear",
        "rarity": 1
      }
    ],
    [],
    []
  ],
  [ //d.va
    [
      {
        "name": "edm",
        "rarity": 1
      }
    ],
    [
      {
        "name": "infinite ace",
        "rarity": 0
      },
      {
        "name": "turtle ship",
        "rarity": 1
      },
      {
        "name": "gentle tokki fuchsia",
        "rarity": 1
      },
      {
        "name": "antifragile dazzle",
        "rarity": 1
      }
    ],
    [],
    [
      {
        "name": "gentle tokki aqua",
        "rarity": 1
      }
    ],
    []
  ],
  [ //doomfist
    [
      {
        "name": "cursed warrior",
        "rarity": 0
      },
      {
        "name": "bonebreaker",
        "rarity": 1
      }
    ],
    [
      {
        "name": "kìnìún",
        "rarity": 0
      },
      {
        "name": "saitama",
        "rarity": 1
      },
      {
        "name": "funky",
        "rarity": 1
      }
    ],
    [
      {
        "name": "tropical",
        "rarity": 0
      }
    ],
    [],
    []
  ],
  [ //echo
    [
      {
        "name": "dance machine",
        "rarity": 0
      },
      {
        "name": "slime queen",
        "rarity": 0
      },
      {
        "name": "victorian doll",
        "rarity": 1
      }
    ],
    [
      {
        "name": "ice angel",
        "rarity": 1
      },
      {
        "name": "3ch-0",
        "rarity": 1
      }
    ],
    [],
    [],
    []
  ],
  [ //genji
    [
      {
        "name": "royal guard",
        "rarity": 1
      },
      {
        "name": "cyber demon",
        "rarity": 2
      }
    ],
    [
      {
        "name": "street runner",
        "rarity": 0
      },
      {
        "name": "divine monkey",
        "rarity": 1
      },
      {
        "name": "genos",
        "rarity": 1
      },
      {
        "name": "volcanic",
        "rarity": 1
      }
    ],
    [],
    [],
    [
      {
        "name": "dallas summer",
        "rarity": 1
      },
      {
        "name": "shanghai summer",
        "rarity": 1
      }
    ]
  ],
  [ //hanzo
    [
      {
        "name": "festival",
        "rarity": 0
      },
      {
        "name": "onryõ",
        "rarity": 2
      }
    ],
    [
      {
        "name": "koi",
        "rarity": 0
      },
      {
        "name": "cyber dragon",
        "rarity": 1
      },
      {
        "name": "cupid",
        "rarity": 1
      },
      {
        "name": "drake master",
        "rarity": 1
      },
      {
        "name": "great tengu ",
        "rarity": 1
      }
    ],
    [],
    [],
    []
  ],
  [ //illari
    [
      {
        "name": "llama pajamas",
        "rarity": 1
      },
      {
        "name": "nightraven",
        "rarity": 1
      }
    ],
    [
      {
        "name": "eclipse",
        "rarity": 0
      },
      {
        "name": "nightfall",
        "rarity": 0
      }
    ],
    [
      {
        "name": "winter jammies",
        "rarity": 1
      }
    ],
    [],
    []
  ],
  [ //junker queen
    [
      {
        "name": "beast hunter",
        "rarity": 0
      },
      {
        "name": "black metal",
        "rarity": 1
      },
      {
        "name": "huntress",
        "rarity": 1
      },
      {
        "name": "zeus",
        "rarity": 2
      }
    ],
    [
      {
        "name": "rugby",
        "rarity": 0
      },
      {
        "name": "executioner",
        "rarity": 1
      },
      {
        "name": "mob boss",
        "rarity": 1
      },
      {
        "name": "gladiator queen",
        "rarity": 1
      },
      {
        "name": "heavy metal",
        "rarity": 1
      }
    ],
    [],
    [],
    []
  ],
  [ //junkrat
    [
      {
        "name": "sawtooth trapper",
        "rarity": 0
      },
      {
        "name": "hong hai er",
        "rarity": 1
      }
    ],
    [
      {
        "name": "mobster",
        "rarity": 0
      },
      {
        "name": "aviator",
        "rarity": 0
      },
      {
        "name": "junkbot",
        "rarity": 1
      }
    ],
    [
      {
        "name": "fawksey james",
        "rarity": 1
      }
    ],
    [],
    []
  ],
  [ //kiriko
    [
      {
        "name": "rogue",
        "rarity": 0
      },
      {
        "name": "hinotori",
        "rarity": 1
      },
      {
        "name": "amaterasu",
        "rarity": 2
      }
    ],
    [
      {
        "name": "visual kei",
        "rarity": 0
      },
      {
        "name": "witch",
        "rarity": 1
      },
      {
        "name": "terrible tornado",
        "rarity": 1
      },
      {
        "name": "time keeper",
        "rarity": 1
      },
      {
        "name": "k-2000 blademaster",
        "rarity": 1
      },
      {
        "name": "antifragile kira-kira",
        "rarity": 1
      },
      {
        "name": "festive",
        "rarity": 1
      }
    ],
    [],
    [],
    []
  ],
  [ //lifeweaver
    [
      {
        "name": "ghostbloom",
        "rarity": 0
      },
      {
        "name": "phi ta khon",
        "rarity": 1
      }
    ],
    [
      {
        "name": "lotus",
        "rarity": 0
      },
      {
        "name": "synthwave",
        "rarity": 0
      },
      {
        "name": "black swan",
        "rarity": 1
      },
      {
        "name": "cleric",
        "rarity": 1
      }
    ],
    [
      {
        "name": "cassia",
        "rarity": 0
      }
    ],
    [],
    []
  ],
  [ //lúcio
    [
      {
        "name": "victorian ghost",
        "rarity": 0
      },
      {
        "name": "hermes",
        "rarity": 1
      },
      {
        "name": "space prince",
        "rarity": 1
      },
      {
        "name": "grafiteiro",
        "rarity": 1
      }
    ],
    [
      {
        "name": "disco",
        "rarity": 0
      },
      {
        "name": "bard",
        "rarity": 1
      }
    ],
    [],
    [],
    []
  ],
  [ //mauga
    [
      {
        "name": "bonesplinter",
        "rarity": 1
      }
    ],
    [
      {
        "name": "magma",
        "rarity": 1
      }
    ],
    [],
    [],
    []
  ],
  [ //mei
    [
      {
        "name": "alchemist",
        "rarity": 1
      }
    ],
    [
      {
        "name": "retro star",
        "rarity": 0
      },
      {
        "name": "hu tou mao",
        "rarity": 0
      },
      {
        "name": "cartographer",
        "rarity": 0
      },
      {
        "name": "empress",
        "rarity": 1
      },
      {
        "name": "flower child",
        "rarity": 1
      }
    ],
    [],
    [],
    []
  ],
  [ //mercy
    [
      {
        "name": "infinite seer",
        "rarity": 0
      },
      {
        "name": "miko",
        "rarity": 1
      }
    ],
    [
      {
        "name": "owl guardian",
        "rarity": 0
      },
      {
        "name": "honey bee",
        "rarity": 0
      },
      {
        "name": "zombie doctor",
        "rarity": 0
      },
      {
        "name": "lifeguard",
        "rarity": 1
      },
      {
        "name": "jingle bell",
        "rarity": 1
      }
    ],
    [],
    [],
    [
      {
        "name": "royal gladiator",
        "rarity": 1
      }
    ]
  ],
  [ //moira
    [
      {
        "name": "demon queen",
        "rarity": 1
      }
    ],
    [
      {
        "name": "rosewood",
        "rarity": 0
      },
      {
        "name": "magma",
        "rarity": 0
      },
      {
        "name": "mime",
        "rarity": 1
      },
      {
        "name": "plague doctor",
        "rarity": 1
      },
      {
        "name": "lilith",
        "rarity": 1
      }
    ],
    [],
    [],
    [
      {
        "name": "wicked",
        "rarity": 1
      },
      {
        "name": "wicked reign",
        "rarity": 1
      }
    ]
  ],
  [ //orisa
    [
      {
        "name": "gr-iffon",
        "rarity": 1
      },
      {
        "name": "grand beast",
        "rarity": 2
      }
    ],
    [
      {
        "name": "carved",
        "rarity": 0
      },
      {
        "name": "star sheep",
        "rarity": 1
      },
      {
        "name": "rubber ducky",
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
        "name": "sky centurion",
        "rarity": 1
      },
      {
        "name": "hades",
        "rarity": 1
      },
      {
        "name": "p-900 warhead",
        "rarity": 1
      }
    ],
    [
      {
        "name": "punk",
        "rarity": 0
      },
      {
        "name": "devil",
        "rarity": 0
      },
      {
        "name": "inarius",
        "rarity": 1
      },
      {
        "name": "nutcracker",
        "rarity": 1
      }
    ],
    [],
    [],
    []
  ],
  [ //ramattra
    [
      {
        "name": "primordial",
        "rarity": 0
      },
      {
        "name": "poseidon",
        "rarity": 1
      },
      {
        "name": "diesel baron",
        "rarity": 1
      }
    ],
    [
      {
        "name": "kabuki",
        "rarity": 0
      },
      {
        "name": "jade totem",
        "rarity": 0
      },
      {
        "name": "biohazard",
        "rarity": 1
      },
      {
        "name": "necromancer",
        "rarity": 1
      },
      {
        "name": "summoner",
        "rarity": 1
      }
    ],
    [],
    [],
    []
  ],
  [ //reaper
    [
      {
        "name": "chasa",
        "rarity": 1
      },
      {
        "name": "hazmat",
        "rarity": 1
      }
    ],
    [
      {
        "name": "calavera",
        "rarity": 0
      },
      {
        "name": "nebula",
        "rarity": 0
      },
      {
        "name": "eagle warrior",
        "rarity": 1
      }
    ],
    [],
    [
      {
        "name": "cursed captain",
        "rarity": 1
      }
    ],
    [
      {
        "name": "chained king",
        "rarity": 1
      },
      {
        "name": "lion luchador",
        "rarity": 1
      },
      {
        "name": "tiger luchador",
        "rarity": 1
      }
    ]
  ],
  [ //reinhardt
    [
      {
        "name": "demon lord",
        "rarity": 1
      }
    ],
    [
      {
        "name": "prideful",
        "rarity": 0
      },
      {
        "name": "minotaur",
        "rarity": 1
      },
      {
        "name": "cardboard",
        "rarity": 1
      },
      {
        "name": "imperius",
        "rarity": 1
      },
      {
        "name": "heaven's devil",
        "rarity": 1
      }
    ],
    [
      {
        "name": "wrapping paper",
        "rarity": 1
      }
    ],
    [],
    []
  ],
  [ //roadhog
    [
      {
        "name": "cairn",
        "rarity": 0
      }
    ],
    [
      {
        "name": "cyberhog",
        "rarity": 1
      },
      {
        "name": "cyclops",
        "rarity": 1
      },
      {
        "name": "roadbot",
        "rarity": 1
      },
      {
        "name": "polar hog",
        "rarity": 1
      }
    ],
    [],
    [],
    []
  ],
  [ //sigma
    [
      {
        "name": "galactic",
        "rarity": 0
      },
      {
        "name": "beekeeper",
        "rarity": 1
      },
      {
        "name": "galactic emperor",
        "rarity": 2
      }
    ],
    [
      {
        "name": "bronze drake",
        "rarity": 1
      },
      {
        "name": "plunderer",
        "rarity": 1
      }
    ],
    [],
    [],
    []
  ],
  [ //sojourn
    [
      {
        "name": "commando",
        "rarity": 1
      }
    ],
    [
      {
        "name": "firefighter",
        "rarity": 0
      },
      {
        "name": "infinite admiral",
        "rarity": 0
      },
      {
        "name": "barista",
        "rarity": 0
      },
      {
        "name": "cyber detective",
        "rarity": 1
      },
      {
        "name": "polar",
        "rarity": 1
      },
      {
        "name": "vigilante",
        "rarity": 1
      },
      {
        "name": "water warrior",
        "rarity": 1
      },
      {
        "name": "formalwear",
        "rarity": 1
      }
    ],
    [],
    [],
    []
  ],
  [ //soldier 76
    [
      {
        "name": "crimson clown",
        "rarity": 0
      },
      {
        "name": "bug hero",
        "rarity": 1
      },
      {
        "name": "infinite guard",
        "display": "infinite guard: 76",
        "rarity": 1
      }
    ],
    [
      {
        "name": "golfer",
        "display": "golfer: 76",
        "rarity": 0
      },
      {
        "name": "space raider",
        "rarity": 1
      }
    ],
    [
      {
        "name": "mumen rider",
        "rarity": 1
      }
    ],
    [],
    [
      {
        "name": "biker",
        "display": "biker: 76",
        "rarity": 1
      }
    ]
  ],
  [ //sombra
    [
      {
        "name": "folklórica",
        "rarity": 1
      }
    ],
    [
      {
        "name": "quicksilver",
        "rarity": 0
      },
      {
        "name": "aztec",
        "rarity": 1
      },
      {
        "name": "marioneta",
        "rarity": 1
      },
      {
        "name": "gilded hunter",
        "rarity": 1
      },
      {
        "name": "antifragile slay star",
        "rarity": 1
      }
    ],
    [],
    [],
    []
  ],
  [ //symmetra
    [
      {
        "name": "cobra queen",
        "rarity": 0
      },
      {
        "name": "s-900 sentry",
        "rarity": 1
      }
    ],
    [
      {
        "name": "conjurer",
        "rarity": 0
      },
      {
        "name": "art deco",
        "rarity": 1
      },
      {
        "name": "sin dorei",
        "display": "sin'dorei",
        "rarity": 1
      }
    ],
    [
      {
        "name": "gardener",
        "rarity": 0
      }
    ],
    [],
    []
  ],
  [ //torbjorn
    [
      {
        "name": "steampunk",
        "rarity": 0
      },
      {
        "name": "dark iron",
        "rarity": 0
      }
    ],
    [
      {
        "name": "captain",
        "rarity": 1
      },
      {
        "name": "starship engineer",
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
        "name": "street urchin",
        "rarity": 1
      },
      {
        "name": "adventurer",
        "rarity": 2
      }
    ],
    [
      {
        "name": "constable",
        "rarity": 0
      },
      {
        "name": "synthwave",
        "rarity": 0
      },
      {
        "name": "polar",
        "rarity": 1
      },
      {
        "name": "antifragile traysi",
        "rarity": 1
      },
      {
        "name": "formalwear",
        "rarity": 1
      }
    ],
    [],
    [],
    []
  ],
  [ //widowmaker
    [
      {
        "name": "medusa",
        "rarity": 1
      },
      {
        "name": "ghostly bride",
        "rarity": 1
      }
    ],
    [
      {
        "name": "harlequin",
        "rarity": 0
      },
      {
        "name": "cyberdevil",
        "rarity": 1
      },
      {
        "name": "dryad",
        "rarity": 1
      },
      {
        "name": "wild tracker",
        "rarity": 1
      }
    ],
    [],
    [],
    []
  ],
  [ //winston
    [
      {
        "name": "tactical",
        "rarity": 0
      },
      {
        "name": "extraterrestrial",
        "rarity": 1
      },
      {
        "name": "lab technician",
        "rarity": 1
      }
    ],
    [
      {
        "name": "monkey business",
        "rarity": 0
      },
      {
        "name": "ugly sweater",
        "rarity": 0
      }
    ],
    [],
    [],
    []
  ],
  [ //wrecking ball
    [
      {
        "name": "honeycomb",
        "rarity": 0
      },
      {
        "name": "critter egg",
        "rarity": 0
      },
      {
        "name": "azmodan",
        "rarity": 1
      }
    ],
    [
      {
        "name": "sugar bomb",
        "rarity": 0
      },
      {
        "name": "crustacean",
        "rarity": 1
      }
    ],
    [
      {
        "name": "asteroid",
        "rarity": 0
      }
    ],
    [],
    []
  ],
  [ //zarya
    [
      {
        "name": "tactical",
        "rarity": 0
      },
      {
        "name": "apocalypse",
        "rarity": 1
      }
    ],
    [
      {
        "name": "frozen",
        "rarity": 0
      }
    ],
    [],
    [],
    [
      {
        "name": "rock climber",
        "rarity": 1
      },
      {
        "name": "charged climber",
        "rarity": 1
      },
      {
        "name": "reigning climber",
        "rarity": 1
      }
    ]
  ],
  [ //zenyatta
    [
      {
        "name": "beast whisperer",
        "rarity": 0
      },
      {
        "name": "royal astronomer",
        "rarity": 1
      }
    ],
    [
      {
        "name": "pinocchio",
        "rarity": 0
      },
      {
        "name": "bathmaster",
        "rarity": 0
      },
      {
        "name": "cybermonk",
        "rarity": 1
      },
      {
        "name": "takoyaki",
        "rarity": 1
      }
    ],
    [],
    [],
    [
      {
        "name": "clockwork",
        "rarity": 1
      }
    ]
  ]
]

