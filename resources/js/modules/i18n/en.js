export default {
    app: {
        title: 'Ban-DERA',
        subtitle: '<strong>BAN</strong> <strong>D</strong>igital <strong>E</strong>nvironment for <strong>R</strong>ussian <strong>A</strong>ssets'
    },
    targets: 'Target websites number',
    showTargets: 'Show list',
    helpArmy: 'Help Ukrainian Army',
    content: '<p>DoS-attack (Denial-of-service) - one of the most common methods of attack, saturating the attacked server with a large number of external requests.</p>' +
        '<p>An infinite number of requests will be sent from your computer to Russian websites, which can send them after the russian warship. Just leave the script running. If one site is defined as "dropped" - it will be replaced by another, ie your attack will be constant.</p>' +
        '<p><strong>WARNING!</strong> As far as this script initiates a large number of requests in a short period of time, running it can slow down your computer and use a lot of traffic. Also, it is not recommended to use it from mobile networks, where traffic is usually limited.</p>' +
        '<p class="fst-italic">This is open source website (<a href="https://github.com/vnestoruk/ban-dera" target="_blank">Show on Github</a>). Join in development or join the <a target="_blank" href="https://t.me/ban_dera_com">Telegram group</a>, share ideas and stay tuned on updates.</p>',
    armyBankAccount:
        '<p>Bank: National Bank of Ukraine</p>' +
        '<p>MFO 300001</p>' +
        '<p>Account No. UA843000010000000047330992708</p>' +
        '<p>EDRPOU Code 00032106</p>' +
        '<p>Payee: National Bank of Ukraine</p>',
    table: {
        url: 'URL',
        requests: 'Requests',
        success: 'Success',
        failed: 'Failed',
        rate: 'Rate'
    },
    search: 'Search...',
    filter: 'Filtered'
}
