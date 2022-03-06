export default {
    app: {
        title: 'Ban-DERA',
        subtitle: '<strong>BAN</strong> <strong>D</strong>igital <strong>E</strong>nvironment for <strong>R</strong>ussian <strong>A</strong>ssets'
    },
    targets: 'Target websites number',
    showTargets: 'Show list',
    content: '<p>DoS-attack (Denial-of-service) - one of the most common methods of attack, saturating the attacked server with a large number of external requests.</p>' +
        '<p>An infinite number of requests will be sent from your computer to Russian websites, which can send them after the russian warship. Just leave the script running. If one site is defined as "dropped" - it will be replaced by another, ie your attack will be constant.</p>' +
        '<p><strong>WARNING!</strong> As far as this script initiates a large number of requests in a short period of time, running it can slow down your computer and use a lot of traffic. Also, it is not recommended to use it from mobile networks, where traffic is usually limited.</p>' +
        '<p class="fst-italic">This is open source website (<a href="https://github.com/vnestoruk/ban-dera" target="_blank">Show on Github</a>). Join in development or join the <a target="_blank" href="https://t.me/ban_dera_com">Telegram group</a>, share ideas and stay tuned on updates.</p>',
    donation: {
        army: {
            button: 'Help Ukrainian Army',
            title: 'Help Ukrainian Army',
            content:
                '<p>Bank: National Bank of Ukraine</p>' +
                '<p>MFO 300001</p>' +
                '<p>Account No. UA843000010000000047330992708</p>' +
                '<p>EDRPOU Code 00032106</p>' +
                '<p>Payee: National Bank of Ukraine</p>',
        },
        support: {
            button: 'Support project',
            title: '...but you have to support ukrainian forces first',
            content: '<p>Unfortunately, this site crashes somitimes. The reason for this is usually a "wave" of new users, which cheap hosting can not stand. In addition, there are plans to do server-side verification of targeted sites and their real IP addresses in order to circumvent their protection (such as CloudFlare). To do this, we need a more powerful server.</p>' +
                '<p>If you would like help this small project, you can do it here. Thanks.</p>'
        }
    },
    table: {
        url: 'URL',
        requests: 'Requests',
        actions: 'Actions'
    },
    copy: 'Copy',
    replace: 'Replace',
    blackList: 'Remove',
    night: 'Night mode',
    search: 'Search...',
    filter: 'Filtered',
    settings: 'Settings',
    attackSpeed: {
        label: 'Attack speed',
        options: [
            'Sword (1 requests/sec)',
            'Molotov cocktail (5 requests/sec)',
            'Gun (10 requests/sec)',
            'Assault riffle (20 requests/sec)',
            'Tank (50 requests/sec)',
            'Bayraktar (100 requests/sec)',
        ]
    },
    maxTargets: {
        label: 'Max. targets',
        options: [
            '1 website',
            '5 websites',
            '10 websites',
            '20 websites',
            '50 websites',
            '100 websites'
        ]
    }
}
