<?php

namespace Database\Seeders;

use App\Models\Node;
use Illuminate\Database\Seeder;

class NodeSeeder extends Seeder
{


    private array $_NODES = [
        "at1.node.check-host.net" => [
            "asn" => "AS212000",
            "ip" => "185.244.28.234",
            "location" => [
                "at",
                "Austria",
                "Salzburg"
            ]
        ],
        "au1.node.check-host.net" => [
            "asn" => "AS9822, AS7720, AS4802",
            "ip" => "203.33.252.253",
            "location" => [
                "au",
                "Australia",
                "Perth"
            ]
        ],
        "ca1.node.check-host.net" => [
            "asn" => "AS53363",
            "ip" => "91.194.11.21",
            "location" => [
                "ca",
                "Canada",
                "Toronto"
            ]
        ],
        "ch1.node.check-host.net" => [
            "asn" => "AS50837",
            "ip" => "179.43.148.195",
            "location" => [
                "ch",
                "Switzerland",
                "Zurich"
            ]
        ],
        "de4.node.check-host.net" => [
            "asn" => "AS34549",
            "ip" => "185.37.147.117",
            "location" => [
                "de",
                "Germany",
                "Frankfurt"
            ]
        ],
        "fr2.node.check-host.net" => [
            "asn" => "AS12876",
            "ip" => "212.129.21.56",
            "location" => [
                "fr",
                "France",
                "Paris"
            ]
        ],
        "hk1.node.check-host.net" => [
            "asn" => "AS135330",
            "ip" => "194.156.98.193",
            "location" => [
                "hk",
                "Hong Kong",
                "Hong Kong"
            ]
        ],
        "ir1.node.check-host.net" => [
            "asn" => "AS47285",
            "ip" => "185.105.238.209",
            "location" => [
                "ir",
                "Iran",
                "Tehran"
            ]
        ],
        "it2.node.check-host.net" => [
            "asn" => "AS60798",
            "ip" => "185.25.204.60",
            "location" => [
                "it",
                "Italy",
                "Milan"
            ]
        ],
        "kz1.node.check-host.net" => [
            "asn" => "AS203087",
            "ip" => "185.120.77.165",
            "location" => [
                "kz",
                "Kazakhstan",
                "Karaganda"
            ]
        ],
        "lt1.node.check-host.net" => [
            "asn" => "AS198651",
            "ip" => "88.119.179.10",
            "location" => [
                "lt",
                "Lithuania",
                "Vilnius"
            ]
        ],
        "md1.node.check-host.net" => [
            "asn" => "AS43289",
            "ip" => "178.17.171.235",
            "location" => [
                "md",
                "Moldova",
                "Chisinau"
            ]
        ],
        "nl1.node.check-host.net" => [
            "asn" => "AS14576",
            "ip" => "185.209.161.169",
            "location" => [
                "nl",
                "Netherlands",
                "Amsterdam"
            ]
        ],
        "pt1.node.check-host.net" => [
            "asn" => "AS44222",
            "ip" => "185.83.213.25",
            "location" => [
                "pt",
                "Portugal",
                "Viana"
            ]
        ],
        "ru1.node.check-host.net" => [
            "asn" => "AS14576",
            "ip" => "185.130.104.238",
            "location" => [
                "ru",
                "Russia",
                "Moscow"
            ]
        ],
        "ru2.node.check-host.net" => [
            "asn" => "AS210644",
            "ip" => "194.26.229.20",
            "location" => [
                "ru",
                "Russia",
                "Moscow"
            ]
        ],
        "tr1.node.check-host.net" => [
            "asn" => "AS201978, AS208425",
            "ip" => "185.169.54.231",
            "location" => [
                "tr",
                "Turkey",
                "Istanbul"
            ]
        ],
        "ua1.node.check-host.net" => [
            "asn" => "AS201094",
            "ip" => "185.86.77.126",
            "location" => [
                "ua",
                "Ukraine",
                "Khmelnytskyi"
            ]
        ],
        "ua2.node.check-host.net" => [
            "asn" => "AS211507",
            "ip" => "91.243.34.23",
            "location" => [
                "ua",
                "Ukraine",
                "Kyiv"
            ]
        ],
        "us1.node.check-host.net" => [
            "asn" => "AS18978",
            "ip" => "5.253.30.82",
            "location" => [
                "us",
                "USA",
                "Los Angeles"
            ]
        ],
        "us2.node.check-host.net" => [
            "asn" => "AS52000",
            "ip" => "138.124.180.144",
            "location" => [
                "us",
                "USA",
                "New Jersey"
            ]
        ]
    ];


    public function run()
    {


        foreach ($this->_NODES as $host => $node) {
            Node::create([
                'host' => $host,
                'asn' => $node['asn'],
                'ip_address' => $node['ip'],
                'location_iso' => $node['location'][0],
                'location_country' => $node['location'][1],
                'location_city' => $node['location'][2]
            ]);
        }
        $this->command->info(count($this->_NODES) . ' nodes added.');
    }
}
