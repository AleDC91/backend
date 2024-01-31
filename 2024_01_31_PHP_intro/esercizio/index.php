<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous" defer></script>
</head>

<body>
    <?php
    date_default_timezone_set('Europe/Rome');

    $day = date('N');

    switch ($day) {
        case 1:
            $giorno = "lunedi";
            break;
        case 2:
            $giorno = "martedi";
            break;
        case 3:
            $giorno = "mercoledi";
            break;
        case 4:
            $giorno = "giovedi";
            break;
        case 5:
            $giorno =  "venerdi";
            break;
        case 6:
            $giorno = "sabato";
            break;
        case 7:
            $giorno = "domenica";
            break;
    }

    $month = date('n');

    switch ($month) {
        case 1:
            $mese = "gennaio";
            break;
        case 2:
            $mese = "febbraio";
            break;
        case 3:
            $mese = "marzo";
            break;
        case 4:
            $mese = "aprile";
            break;
        case 5:
            $mese = "maggio";
            break;
        case 6:
            $mese = "giugno";
            break;
        case 7:
            $mese = "luglio";
            break;
        case 8:
            $mese = "agosto";
            break;
        case 9:
            $mese = "settembre";
            break;
        case 10:
            $mese = "ottobre";
            break;
        case 11:
            $mese = "novembre";
            break;
        case 12:
            $mese = "dicembre";
            break;
    }


    echo " <div class='text-center'>----------Esercizio 1 -----------<br>";

    echo '<h2 class="text-primary">' . $giorno . " " . date("d") . " " . $mese . " " . date("Y  - G:i:s ");
    "</h2>";



    echo "</div><br><br><br><br>";

    echo "<div class='text-center'>-------Esercizio 2 -----------<br>";



    $atalanta = [
        "portieri" => [
            "Marco Carnesecchi",
            "Juan Musso",
            "Francesco Rossi"
        ],
        "difensori" => [
            "Giorgio Scalvini",
            "Berat Djimsiti",
            "Isak Hien",
            "Sead Kolasinac",
            "Rafael Tolói",
            "José Luis Palomino",
        ],
        "centrocampisti" => [
            "Teun Koopmeiners",
            "Marten de Roon",
            "Éderson",
            "Michel Adopo",
            "Emil Holm",
            "Davide Zappacosta",
            "Hans Hateboer",
            "Matteo Ruggeri",
            "Mitchel Bakker",
            "Charles De Ketelaere",
            "Mario Pasalic",
            "Aleksey Miranchuk",

        ],
        "attaccanti" => [
            "Ademola Lookman",
            "Gianluca Scamacca",
            "El Bilal Touré",
            "Luis Muriel"
        ]
    ];

    $bologna = [
        "portieri" => [
            "Lukasz Skorupski",
            "Federico Ravaglia",
            "Nicola Bagnolini",
        ],
        "difensori" => [
            "Sam Beukema",
            "Riccardo Calafiori",
            "Jhon Lucumí",
            "Mihajlo Ilic",
            "Adama Soumaoro",
            "Victor Kristiansen",
            "Tommaso Corazza",
            "Charalampos Lykogiannis",
            "Stefan Posch",
            "Lorenzo De Silvestri"
        ],
        "centrocampisti" => [
            "Nikola Moro",
            "Oussama El Azzouzi",
            "Giovanni Fabbian",
            "Remo Freuler",
            "Michel Aebischer",
            "Kacper Urbanski",
            "Lewis Ferguson",
            "Jesper Karlsson"

        ],
        "attaccanti" => [
            "Jesper Karlsson",
            "Riccardo Orsolini",
            "Dan Ndoye",
            "Alexis Saelemaekers",
            "Joshua Zirkzee",
            "Santiago Castro",
            "Sydney van Hooijdonk"
        ]
    ];

    $cagliari = [
        "portieri" => [
            "Simone Scuffet",
            "Boris Radunović",
            "Simone Aresti"
        ],
        "difensori" => [
            "Alberto Dossena",
            "Pantelis Hatzidiakos",
            "Mateusz Wieteska",
            "Adam Obert",
            "Tommaso Augello",
            "Paulo Azzi",
            "Gabriele Zappa",
            "Alessandro Di Pardo"
        ],
        "centrocampisti" => [
            "Matteo Prati",
            "Antoine Makoumbou",
            "Ibrahim Sulemana",
            "Nahitan Nández",
            "Alessandro Deiola",
            "Marko Rog",
            "Nicolas Viola",
            "Jakub Jankto",
            "Gaetano Oristanio",
            "Marco Mancosu"
        ],
        "attaccanti" => [
            "Jacopo Desogus",
            "Andrea Petagna",
            "Zito Luvumbo",
            "Eldor Shomurodov",
            "Gianluca Lapadula",
            "Leonardo Pavoletti"
        ]
    ];

    $empoli = [
        "portieri" => [
            "Elia Caprile",
            "Samuele Perisan",
            "Etrit Berisha"
        ],
        "difensori" => [
            "Sebastiano Luperto",
            "Ardian Ismajli",
            "Sebastian Walukiewicz",
            "Gabriele Guarino",
            "Saba Goglichidze",
            "Lorenzo Tonelli",
            "Giuseppe Pezzella",
            "Liberato Cacace",
            "Tyronne Ebuehi",
            "Bartosz Bereszynski",
        ],
        "centrocampisti" => [
            "Alberto Grassi",
            "Jacopo Fazzini",
            "Youssef Maleh",
            "Răzvan Marin",
            "Luca Belardinelli",
            "Szymon Zurkowski",
            "Simone Bastoni",
            "Tommaso Baldanzi",
            "Viktor Kovalenko",
        ],
        "attaccanti" => [
            "Nicolò Cambiaghi",
            "Emmanuel Gyasi",
            "Matteo Cancellieri",
            "M'Baye Niang",
            "Stiven Shpendi",
            "Alberto Cerri",
            "Francesco Caputo",
            "Mattia Destro"
        ]
    ];

    $fiorentina = [
        "portieri" => [
            "Oliver Christensen",
            "Pietro Terracciano",
            "Tommaso Martinelli",
            "Tommaso Vannucchi",
        ],
        "difensori" => [
            "Nikola Milenkovic",
            "Lucas Martínez Quarta",
            "Luca Ranieri",
            "Yerry Mina",
            "Pietro Comuzzo",
            "Fabiano Parisi",
            "Cristiano Biraghi",
            "Dodô",
            "Michael Kayode",
            "Davide Faraoni"
        ],
        "centrocampisti" => [
            "Maxime López",
            "Rolando Mandragora",
            "Lorenzo Amatucci",
            "Arthur Melo",
            "Gaetano Castrovilli",
            "Alfred Duncan",
            "Giacomo Bonaventura",
            "Gino Infantino",
            "Antonin Barak"
        ],
        "attaccanti" => [
            "Christian Kouamé",
            "Riccardo Sottil",
            " Nicolás González",
            "Jonathan Ikoné",
            "Lucas Beltrán",
            "M'Bala Nzola"
        ]
    ];

    $frosinone = [
        "portieri" => [
            "Stefano Turati",
            "Michele Cerofolini",
            "Pierluigi Frattali"
        ],
        "difensori" => [
            "Caleb Okoli",
            "Ilario Monterisi",
            "Kevin Bonifazi",
            "Simone Romagnoli",
            "Sergio Kalaj",
            "Mateus Lusuardi",
            "Riccardo Marchizza",
            "Emanuele Valeri",
            "Anthony Oyono",
            "Pol Lirola"
        ],
        "centrocampisti" => [
            "Enzo Barrenechea",
            "Mehdi Bourabia",
            "Luca Mazzitelli",
            "Abdou Harroui",
            "Marco Brescianini",
            "Nadir Zortea",
            "Reinier",
            "Luca Garritano",
            "Francesco Gelli",

        ],
        "attaccanti" => [
            "Arijon Ibrahimovic",
            "Giuseppe Caso",
            "Jaime Báez",
            "Giorgi Kvernadze",
            "Soufiane Bidaoui",
            "Matías Soulé",
            "Demba Seck",
            "Farès Ghedjemis",
            "Walid Cheddira",
            "Kaio Jorge",
            "Marvin Cuni"

        ]
    ];

    $genoa = [
        "portieri" => [
            "Josep Martínez",
            "Nicola Leali",
            "Franz Stolz",
            "Daniele Sommariva",
            "Simone Calvani",

        ],
        "difensori" => [
            "Koni De Winter",
            "Johan Vásquez",
            "Alan Matturro",
            "Giorgio Cittadini",
            "Mattia Bani",
            "Alessandro Vogliacco",
            "Aarón Martín",
            "Ridgeciano Haps",
            "Djed Spence",
            "Stefano Sabelli"

        ],
        "centrocampisti" => [
            "Emil Bohinen",
            "Milan Badelj",
            "Morten Frendrup",
            "Morten Thorsby",
            "Pablo Galdames",
            "Kevin Strootman",
            "Ruslan Malinovskyi",

        ],
        "attaccanti" => [
            "Junior Messias",
            "Albert Gudmundsson",
            "Mateo Retegui",
            "Caleb Ekuban",
            "David Ankeye"
        ]
    ];


    $hellas_verona = [
        "portieri" => [
            "Lorenzo Montipò",
            "Simone Perilli",
            "Mattia Chiesa",
            "Alessandro Berardi"
        ],
        "difensori" => [
            "Diego Coppola",
            "Giangiacomo Magnani",
            "Pawel Dawidowicz",
            "Bruno Amione",
            "Juan Cabal",
            "Rúben Vinagre",

        ],
        "centrocampisti" => [
            "Reda Belahyane",
            "Charlys",
            "Joselito",
            "Suat Serdar",
            "Michael Folorunsho",
            "Dani Silva",
            "Ajdin Hrustić",
            "Jackson Tchatchoua",
            "Darko Lazović",
            "Ondrej Duda",
            "Tomas Suslov"
        ],
        "attaccanti" => [
            "Jordi Mboula",
            "Elayis Tavsan",
            "Tijjani Noslin",
            "Thomas Henry",
            "Federico Bonazzoli",
            "Juan Manuel Cruz"
        ]
    ];

    $inter = [
        "portieri" => [
            "Emil Audero",
            "Yann Sommer",
            "Raffaele Di Gennaro",
        ],
        "difensori" => [
            "Alessandro Bastoni",
            "Benjamin Pavard",
            "Yann Bisseck",
            "Stefan de Vrij",
            "Francesco Acerbi",
            "Federico Dimarco",
            "Matteo Darmian",
        ],
        "centrocampisti" => [
            "Hakan Çalhanoğlu",
            "Kristjan Asllani",
            "Nicolò Barella",
            "Davide Frattesi",
            "Henrikh Mkhitaryan",
            "Davy Klaassen",
            "Stefano Sensi",
            "Denzel Dumfries",
            "Tajon Buchanan",
            "Juan Cuadrado",
            "Carlos Augusto"
        ],
        "attaccanti" => [
            "Lautaro Martínez",
            "Marcus Thuram",
            "Marko Arnautovic",
            "Alexis Sánchez"
        ]
    ];


    $juventus = [
        "portieri" => [
            "Wojciech Szczesny",
            "Mattia Perin",
            "Carlo Pinsoglio"
        ],
        "difensori" => [
            "Bremer",
            "Federico Gatti",
            "Tiago Djaló",
            "Danilo",
            "Daniele Rugani",
            "Andrea Cambiaso",
            "Alex Sandro",
            "Mattia De Sciglio"
        ],
        "centrocampisti" => [
            "Manuel Locatelli",
            "Adrien Rabiot",
            "Weston McKennie",
            "Fabio Miretti",
            "Nicolò Fagioli",
            "Hans Nicolussi Caviglia",
            "Paul Pogba",
            "Timothy Weah",
            "Filip Kostic"
        ],
        "attaccanti" => [
            "Federico Chiesa",
            "Samuel Iling-Junior",
            "Kenan Yıldız",
            "Dusan Vlahovic",
            "Moise Kean",
            "Arkadiusz Milik"
        ]
    ];


    $lazio = [
        "portieri" => [
            "Ivan Provedel",
            "Christos Mandas",
            "Luigi Sepe"
        ],
        "difensori" => [
            "Nicolò Casale",
            "Alessio Romagnoli",
            "Patric",
            "Mario Gila",
            "Luca Pellegrini",
            "Dimitrije Kamenović",
            "Adam Marusic",
            "Elseid Hysaj"
        ],
        "centrocampisti" => [
            "Nicolò Rovella",
            "Danilo Cataldi",
            "Mattéo Guendouzi",
            "Luis Alberto",
            "Matías Vecino",
            "Manuel Lazzari",
            "Daichi Kamada",
            "André Anderson"
        ],
        "attaccanti" => [
            "Mattia Zaccagni",
            "Diego González",
            "Saná Fernandes",
            "Gustav Isaksen",
            "Felipe Anderson",
            "Pedro",
            "Cristiano Lombardi",
            "Taty Castellanos",
            "Ciro Immobile"
        ]
    ];


    $lecce = [
        "portieri" => [
            "Wladimiro Falcone",
            "Federico Brancolini",
            "Alexandru Borbei",
            "Jasper Samooja"
        ],
        "difensori" => [
            "Federico Baschirotto",
            "Marin Pongracic",
            "Ahmed Touba",
            "Kastriot Dermaku",
            "Patrick Dorgu",
            "Antonino Gallo",
            "Valentin Gendrey",
            "Lorenzo Venuti",

        ],
        "centrocampisti" => [
            "Ylber Ramadani",
            "Alexis Blin",
            "Joan González",
            "Mohamed Kaba",
            "Hamza Rafia",
            "Daniel Samek",
            "Medon Berisha",
            "Rémi Oudin"
        ],
        "attaccanti" => [
            "Lameck Banda",
            "Nicola Sansone",
            "Pontus Almqvist",
            "Santiago Pierotti",
            "Jeppe Corfitzen",
            "Nikola Krstovic",
            "Roberto Piccoli",
            "Rareș Burnete"
        ]
    ];




    $milan = [
        "portieri" => [
            "Mike Maignan",
            "Marco Sportiello",
            "Lapo Nava",
            "Antonio Mirante"
        ],
        "difensori" => [
            "Fikayo Tomori",
            "Malick Thiaw",
            "Pierre Kalulu",
            "Matteo Gabbia",
            "Marco Pellegrino",
            "Simon Kjaer",
            "Mattia Caldara",
            "Theo Hernández",
            "Davide Calabria",
            "Filippo Terracciano",
            "Alessandro Florenzi"
        ],
        "centrocampisti" => [
            "Ismaël Bennacer",
            "Yacine Adli",
            "Ruben Loftus-Cheek",
            "Tijjani Reijnders",
            "Yunus Musah",
            "Tommaso Pobega"
        ],
        "attaccanti" => [
            "Rafael Leão",
            "Chaka Traorè",
            "Christian Pulisic",
            "Samuel Chukwueze",
            "Noah Okafor",
            "Luka Jovic",
            "Olivier Giroud"
        ]
    ];

    $monza = [
        "portieri" => [
            "Michele Di Gregorio",
            "Stefano Gori",
            "Alessandro Sorrentino",
            "Eugenio Lamanna"
        ],
        "difensori" => [
            "Pablo Marí",
            "Andrea Carboni",
            "Armando Izzo",
            "Luca Caldirola",
            "Davide Bettella",
            "Danilo D'Ambrosio",
            "Samuele Birindelli",
            "Pedro Pereira",
            "Giulio Donati"
        ],
        "centrocampisti" => [
            "Matteo Pessina",
            "Roberto Gagliardini",
            "José Machín",
            "Jean-Daniel Akpa Akpro",
            "Warren Bondo",
            "Patrick Ciurria",
            "Georgios Kyriakopoulos",
            "Andrea Colpani",
            "Valentín Carboni",
            "Samuele Vignato",
            "Daniel Maldini",
            "Matija Popovic"
        ],
        "attaccanti" => [
            "Alessio Zerbin",
            "Papu Gómez",
            "Gianluca Caprari",
            "Lorenzo Colombo",
            "Dany Mota",
            "Milan Djuric"
        ]
    ];


    $napoli = [
        "portieri" => [
            "Alex Meret",
            "Pierluigi Gollini",
            "Nikita Contini",
            "Hubert Idasiak"
        ],
        "difensori" => [
            "Amir Rrahmani",
            "Natan",
            "Leo Østigård",
            "Juan Jesus",
            "Mathías Olivera",
            "Mário Rui",
            "Giovanni Di Lorenzo",
            "Pasquale Mazzocchi",
        ],
        "centrocampisti" => [
            "Stanislav Lobotka",
            "Leander Dendoncker",
            "Diego Demme",
            "Frank Anguissa",
            "Piotr Zieliński",
            "Jens Cajuste",
            "Jesper Lindstrøm",
            "Hamed Junior Traorè",
            "Gianluca Gaetano",
            "Lorenzo Russo"
        ],
        "attaccanti" => [
            "Khvicha Kvaratskhelia",
            "Matteo Politano",
            "Cyril Ngonge",
            "Giacomo Raspadori",
            "Victor Osimhen",
            "Giovanni Simeone"
        ]
    ];


    $roma = [
        "portieri" => [
            "Rui Patrício",
            "Mile Svilar",
            "Pietro Boer"
        ],
        "difensori" => [
            "Evan Ndicka",
            "Gianluca Mancini",
            "Diego Llorente",
            "Marash Kumbulla",
            "Chris Smalling",
            "Dean Huijsen",
            "Angeliño",
            "Leonardo Spinazzola",
            "Rasmus Kristensen",
            "Rick Karsdorp",
            "Zeki Çelik"
        ],
        "centrocampisti" => [
            "Bryan Cristante",
            "Leandro Paredes",
            "Edoardo Bove",
            "Houssem Aouar",
            "Renato Sanches",
            "Riccardo Pagano",
            "Nicola Zalewski",
            "Lorenzo Pellegrini"
        ],
        "attaccanti" => [
            "Stephan El Shaarawy",
            "Paulo Dybala",
            "Tammy Abraham",
            "Romelu Lukaku",
            "Sardar Azmoun",
            "Andrea Belotti"
        ]
    ];





    $salernitana = [
        "portieri" => [
            "Guillermo Ochoa",
            "Benoît Costil",
            "Vincenzo Fiorillo",
            "Pasquale Allocca"
        ],
        "difensori" => [
            "Lorenzo Pirola",
            "Matteo Lovato",
            "Norbert Gyomber",
            "Dylan Bronn",
            "Triantafyllos Pasalidis",
            "Federico Fazio",
            "Domagoj Bradaric",
            "Alessandro Zanoli",
            "Junior Sambia",
            "Niccolò Pierozzi"
        ],
        "centrocampisti" => [
            "Mateusz Legowski",
            "Lassana Coulibaly",
            "Giulio Maggiore",
            "Toma Basic",
            "Grigoris Kastanos",
            "Antonio Candreva",
            "Agustín Martegani"
        ],
        "attaccanti" => [
            "Jovane",
            "Andres Sfait",
            "Loum Tchaouna",
            "Boulaye Dia",
            "Erik Botheim",
            "Chukwubuikem Ikwuemesi",
            "Mikael",
            "Simy",
            "Trivante Stewart"
        ]
    ];


    $sassuolo = [
        "portieri" => [
            "Alessio Cragno",
            "Andrea Consigli",
            "Gianluca Pegolo"
        ],
        "difensori" => [
            "Mattia Viti",
            "Martin Erlic",
            "Ruan Tressoldi",
            "Gian Marco Ferrari",
            "Josh Doig",
            "Marcus Pedersen",
            "Jeremy Toljan",
            "Filippo Missori",
        ],
        "centrocampisti" => [
            "Luca Lipani",
            "Matheus Henrique",
            "Daniel Boloca",
            "Uros Racic",
            "Pedro Obiang",
            "Kristian Thorstvedt",
            "Nedim Bajrami",
            "Cristian Volpato"
        ],
        "attaccanti" => [
            "Armand Laurienté",
            "Emil Konradsen Ceide",
            "Domenico Berardi",
            "Samu Castillejo",
            "Andrea Pinamonti",
            "Samuele Mulattieri",
            "Grégoire Defrel"
        ]
    ];

    $torino = [
        "portieri" => [
            "Vanja Milinkovic-Savic",
            "Mihai Popa",
            "Luca Gemello",
            "Pietro Passador"
        ],
        "difensori" => [
            "Perr Schuurs",
            "Alessandro Buongiorno",
            "David Zima",
            "Ricardo Rodríguez",
            "Saba Sazonov",
            "Koffi Djidji",
            "Brandon Soppy"
        ],
        "centrocampisti" => [
            "Samuele Ricci",
            "Adrien Tamèze",
            "Ivan Ilic",
            "Karol Linetty",
            "Gvidas Gineitis",
            "Raoul Bellanova",
            "Valentino Lazaro",
            "Mërgim Vojvoda",
            "Nikola Vlašić"
        ],
        "attaccanti" => [
            "Yann Karamoh",
            "Antonio Sanabria",
            "Duván Zapata",
            "Pietro Pellegri"
        ]
    ];


    $udinese = [
        "portieri" => [
            "Marco Silvestri",
            "Maduka Okoye",
            "Daniele Padelli",
        ],
        "difensori" => [
            "Nehuén Pérez",
            "Jaka Bijol",
            "Thomas Kristensen",
            "Lautaro Giannetti",
            "Enzo Ebosse",
            "Adam Masina",
            "Christian Kabasele",
            "Antonio Tikvic",
            "James Abankwah",
            "Jordan Zemura",
            "Hassane Kamara",
            "Kingsley Ehizibue",
            "João Ferreira"
        ],
        "centrocampisti" => [
            "Walace",
            "Etienne Camara",
            "Lazar Samardžić",
            "Sandi Lovric",
            "Martín Payero",
            "Roberto Pereyra",
            "Oier Zarraga",
            "Festy Ebosele",
            "David Pejičić"
        ],
        "attaccanti" => [
            "Florian Thauvin",
            "Brenner",
            "Gerard Deulofeu",
            "Lorenzo Lucca",
            "Isaac Success",
            "Keinan Davis"
        ]
    ];



    $allTeamsData = [
        "atalanta" => $atalanta,
        "bologna" => $bologna,
        "cagliari" => $cagliari,
        "empoli" =>  $empoli,
        "fiorentina" => $fiorentina,
        "frosinone" => $frosinone,
        "genoa" =>   $genoa,
        "hellas_verona" => $hellas_verona,
        "inter" => $inter,
        "juventus" =>  $juventus,
        "lazio" => $lazio,
        "lecce" => $lecce,
        "milan" => $milan,
        "monza" => $monza,
        "napoli" => $napoli,
        "roma" =>  $roma,
        "salernitana" => $salernitana,
        "sassuolo" => $sassuolo,
        "torino" => $torino,
        "udinese" => $udinese
    ];



    echo (count($allTeamsData));

    // print("<pre>" . print_r($allTeamsData, true) . "</pre>");


    $teams = [];

    foreach ($allTeamsData as $team => $teamData) {
        $teams[]  = $team;
    }
    print("<pre>" . print_r($teams, true) . "</pre>");




    $calendario = [];
    $passed = [];

    for ($i = 0; $i < count($teams) + 1; $i++) {
        while (count($passed) < count($teams)) {
            $team1index = rand(0, count($teams));
            $team2index = rand(0, count($teams));
            $team1 = $teams[$team1index];
            $team2 = $teams[$team2index];

            if (!in_array($team1, $passed) & !in_array($team2, $passed) & $team1 !== $team2) {
                $match = [$team1, $team2];
                print_r($match); 
                echo "<br>";
                for ($j = 0; $j < count($calendario); $j++) {

                    if (!in_array($match, $calendario["giornata_" . $j + 1])) {
                        $passed[] = $team1;
                        $passed[] = $team2;
                        $calendario["giornata_" . $i + 1][] = $match;

                    } else {
                        continue;
                    }
                }
            } else {
                continue;
            }
        }
        $passed = [];
    }
    echo "<pre>";
    print_r($calendario);
    echo "</pre>";

    ?>








</body>

</html>