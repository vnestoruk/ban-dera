export default {
    locale: 'Français',
    app: {
        title: 'Ban-DERA',
        subtitle: '<strong>BAN</strong> <strong>D</strong>igital <strong>E</strong>nvironment for <strong>R</strong>ussian <strong>A</strong>ssets (BANNIR les Moyens Numériques des Actifs Russes)',
        versionTitle: 'Chornobaivka'
    },
    statusPanel: {
        title: 'Résumé',
        data: {
            ip: 'Adresse IP',
            country: 'Pays',
            totalTargets: 'Cibles totales',
            activeTargets: 'Cibles disponibles',
            maxTargets: 'Attaques maximum par cible',
            attackSpeed: 'Vitesse d\'attaque'
        }
    },
    donation: {
        army: {
            button: 'Aidez l\`Armée Ukrainienne!',
            title: 'Aidez l\`Armée Ukrainienne!'
        },
        support: {
            button: 'Supportez le projet',
            title: 'Un p\'ti café svp? :)',
            content: '<p>Malheureusement, le site peut casser de temps en temps dû a l\'arrivée de nouveaux utilisateurs, que l\'hébergeur a du mal à tenir. En plus de ça, je prévois de faire des vérifications côté serveur des adresses IP des cibles afin de pouvoir contourner leurs protections (Exemple, CloudFlare). Il me faudrait donc des serveurs un peu plus puissants.</p>' +
                '<p> Si tu veux m\'aider pour ce projet, tu peux le faire ici. Merci encore!</p>'
        }
    },
    info: {
        title: 'Info',
        content: '<p>Attaque par déni de service (DoS) - Une méthode d\'attaque des plus communes. Le principe est simple, inonder un serveur de requêtes en boucle pour qu\'il ne puisse plus en traiter.</p>' +
            '<p>Par le biais du site, votre PC enverra des requêtes en boucle vers des sites Russes. Vous n\'avez qu\'à laisser la page ouverte, on s\'occupe de tout ! Si un des sites est marqué comme "dropped" (abandonné) - il sera remplacé par un autre. Votre attaque sera constante et automatique !</p>' +
            '<p><strong>ATTENTION !</strong> De par la nature de l\'attaque, votre propre réseau risque de subir des ralentissements à cause du nombre de requêtes envoyées. Il en va de même pour votre PC, qui risque d\'être ralenti. Il n\'est pas non plus recommandé de faire ça avec les données mobile, puisque la bande passante est limitée.</p>'
    },
    statusInfo: {
        title: 'Efficacité de l\'attaque',
        content: '<p>La disponibilité d\'un site correspond à sa capacité à répondre aux requêtes. Pour permettre une navigation agréable, un même site peut être hébergé sur plusieurs serveurs dans différents endroits et pays. Parfois il sera cassé dans un pays, mais pas dans les autres.</p>' +
            '<p>Ban-DERA a compilé une des plus grandes bases de données de sites cible sur plusieurs services similaires. En plus de ça, nous sommes capables de vérifier la disponibilité d\'un même site sur 21 Data Centers dans 18 pays.</p>' +
            '<p><strong>Par exemple :</strong> si tu utilises un VPN (ET TU DEVRAIS EN UTILISER UN! Attaquer c\'est bien, attaquer anonymement c\'est mieux!) en Allemagne, on te donnera des cibles encore disponibles en Allemagne.</p>'
    },
    vpnServices: {
        title: 'Services VPN',
        table: {
            title: 'Services VPN',
            hasRussiaServers: 'À des serveurs en Russie',
            isFree: 'Gratuit !',
            demo: 'A une période d\'essai',
            description: 'Fonctionnalités'
        },
        services: [
            ['Hotspot Shield', 'https://www.hotspotshield.com/', true, true, true, ''],
            ['ClearVPN', 'https://clearvpn.com/', true, true, true, 'Gratuit pour les Ukrainiens !'],
            ['UrbanVPN', 'https://www.urban-vpn.com/', true, true, true, ''],
            ['Freedome Secure', 'https://onlineshop.f-secure.com/789/purl-free-freedome-for-ukraine', false, false, true, '6 mois gratuits pour les Ukrainiens !'],
            ['VPN Unlimited', 'https://www.vpnunlimited.com/stop-russian-aggression', false, false, false, 'Un an gratuit pour les Ukrainiens !'],
            ['ProtonVPN', 'https://protonvpn.com/ua/', true, true, true, ''],
        ]
    },
    share: {
        timer: 'Poutine est en vie depuis {darknessPeriod} jours, c\'est {darknessPeriod} jours de trop.',
        stop: 'Timer Stop',
        title: 'Partager'
    },
    table: {
        url: 'URL',
        requests: 'Requêtes',
        actions: 'Actions'
    },
    start: 'Start',
    stop: 'Stop',
    copy: 'Copier',
    replace: 'Remplacer',
    open: 'Ouvrir',
    blackList: 'Retirer',
    night: 'Mode Nuit',
    loading: 'Chargement...',
    search: 'Recherche...',
    filter: 'Filtré',
    settings: 'Réglages',
    units: {
        target: '{n} site | {n} sites',
        request: '{n} requête/s | {n} requêtes/s'
    },
    notification: {
        title: {
            success: 'Succès !',
            warning: 'Attention !',
            error: 'Erreur !'
        },
        text: {
            error: {
                'unknown': 'Je n\'ai AUCUNE IDÉE de ce qu\'il s\'est passé, essaie de recharger la page !',
                '429': 'Trop de requêtes ! Va te faire un café et reviens d\'ici quelques minutes :)',
                '500': 'Erreur interne du serveur, ce n\'est pas de ta faute, tkt.'
            }
        }
    }
}
