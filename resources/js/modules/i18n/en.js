export default {
    locale: 'English',
    app: {
        title: 'Ban-DERA',
        versionTitle: 'Azov'
    },
    authentication: {
        signup: 'Sign Up',
        login: 'Log In',
        logout: 'Logout',
        nickname: 'Nickname',
        email: 'Email',
        password: 'Password',
        password_confirmation: 'Password Confirmation',
        ctaSignup: 'Haven\'t account yet?',
        ctaLogin: 'Already registered?',
    },
    navigation: {
        index: 'Home',
        targets: 'Targets',
        bunker: 'Bunker',
        instructions: 'Instructions',
        about: 'About'
    },
    statusPanel: {
        title: 'Status panel',
        data: {
            ip: 'IP-address',
            country: 'Country',
            city: 'City',
            // totalTargets: 'Targets total',
            // activeTargets: 'Available',
            // maxTargets: 'Attack max. targets',
            // attackSpeed: 'Speed'
        }
    },
    donation: {
        army: {
            button: 'Help Ukrainian Army',
            title: 'Help Ukrainian Army'
        },
        support: {
            button: 'Support project',
            title: 'Buy me a coffee',
            content: '<p>Unfortunately, this site crashes somitimes. The reason for this is usually a "wave" of new users, which cheap hosting can not stand. In addition, there are plans to do server-side verification of targeted sites and their real IP addresses in order to circumvent their protection (e.g. CloudFlare). To do this, we need a more powerful server.</p>' +
                '<p>If you would like help this small project, you can do it here. Thanks.</p>'
        }
    },
    info: {
        title: 'Info',
        content: '<p>DoS-attack (Denial-of-service) - one of the most common methods of attack, saturating the attacked server with a large number of external requests.</p>' +
            '<p>An infinite number of requests will be sent from your computer to Russian websites, which can send them after the russian warship. Just leave the script running. If one site is defined as "dropped" - it will be replaced by another, ie your attack will be constant.</p>' +
            '<p><strong>WARNING!</strong> As far as this script initiates a large number of requests in a short period of time, running it can slow down your computer and use a lot of traffic. Also, it is not recommended to use it from mobile networks, where traffic is usually limited.</p>'
    },
    statusInfo: {
        title: 'About the effectiveness of the attack',
        content: '<p>The availability of the site is its ability to respond to requests. To ensure fast work with web pages, often the same site is located on many servers in different places and countries. Sometimes the website stops working in one country but is fully working in others.</p>' +
            '<p>Ban-DERA has compiled one of the largest databases of target sites among similar services. But we went further and added the ability to check the availability of each target from 21 data centers in 18 countries.</p>' +
            '<p><strong>For example:</strong> If you use a VPN with a server in Germany, you will only be offered targets that are still available from Germany.</p>'
    },
    vpnServices: {
        title: 'VPN services',
        table: {
            title: 'VPN Service',
            hasRussiaServers: 'Servers in russia',
            isFree: 'Has free plan',
            demo: 'Has demo/test period',
            description: 'Features'
        },
        services: [
            ['Hotspot Shield', 'https://www.hotspotshield.com/', true, true, true, ''],
            ['ClearVPN', 'https://clearvpn.com/', true, true, true, 'Free for Ukraine'],
            ['UrbanVPN', 'https://www.urban-vpn.com/', true, true, true, ''],
            ['Freedome Secure', 'https://onlineshop.f-secure.com/789/purl-free-freedome-for-ukraine', false, false, true, 'Free 6 months for Ukraine'],
            ['VPN Unlimited', 'https://www.vpnunlimited.com/stop-russian-aggression', false, false, false, 'Free 1 year for Ukraine'],
            ['ProtonVPN', 'https://protonvpn.com/ua/', true, true, true, ''],
        ]
    },
    share: {
        timer: 'It has been {darknessPeriod} days since putin lives on Earth.',
        stop: 'Stop timer',
        title: 'Share link',
        content: {
            title: 'Join the IT army on the digital front!',
            description: 'Each of you has the opportunity to join the IT troops of Ukraine and support the offensive operation on rashists web resources together with #ban-dera. Follow the link!'
        }
    },
    table: {
        url: 'URL',
        requests: 'Requests',
        actions: 'Actions'
    },
    add: 'Add',
    suggest: 'Suggest',
    edit: 'Edit',
    save: 'Save',
    start: 'Start',
    stop: 'Stop',
    create: 'Create',
    copy: 'Copy',
    replace: 'Replace',
    open: 'Open',
    close: 'Close',
    back: 'Back',
    enable: 'Enable',
    disable: 'Disable',
    blackList: 'Remove',
    night: 'Night mode',
    loading: 'Loading',
    search: 'Search',
    filter: 'Filtered',
    settings: 'Settings',
    units: {
        target: 'targets',
        speed: 'requests/s',
        rate: 'failure',
        traffic: 'Traffic used'
    },
    notification: {
        title: {
            success: 'Success',
            warning: 'Warning',
            error: 'Error',
            newUser: 'New user on website',
            targetAttackState: 'Target attack state changed',
        },
        text: {
            error: {
                'unknown': 'Have no idea what\'s going on. Try to refresh the page.',
                '401': 'You can\'t do it without authorization.',
                '422': 'Unprocessable entity.',
                '429': 'Too many requests! Cool down, and try again in a minute.',
                '500': 'Internal server error.',
                '503': 'Website under maintenance.'
            },
            newUser: 'Welcome, {nickname}!',
            targetAttackState: {
                start: "[{url}] is under attack now",
                stop: "[{url}] was removed from attack-list"
            }
        }
    },
    about: {
        title: 'About the project',
        sections: {
            general: {
                text: [
                    ''
                ]
            },
            partners: {
                title: 'Sponsors'
            },
            openSource: {
                title: 'GitHub open-source'
            },
            share: {
                title: 'Share with friends'
            },
            thirdParties: {
                title: 'Frameworks/libraries used'
            },
            usefulLinks: {
                title: 'Useful Links'
            }
        }
    },
    targetList: {
        title: 'Targets list',
        table: {
            url: 'URL',
            category: 'Category',
            health: 'Health',
            suggestedBy: 'Suggested By',
            status: 'Status',
        },
        statuses: {
            approved: 'Approved',
            underAttack: 'Under attack'
        },
        pagination: {
            showing: 'Showing {from} - {to} of {total}'
        },
        notFound: 'Targets not found'
    },
    target: {
        categories: {
            other: 'Other',
            automotive: 'Automotive',
            business: 'Business',
            casino: 'Casino',
            entertainment: 'Entertainment',
            financial: 'Financial',
            government: 'Government',
            media: 'Media',
            piracy: 'Piracy',
            services: 'Services',
            social_network: 'Social Network',
            tourism: 'Tourism',
        },
        actions: {
            refuse: 'Refuse',
            approve: 'Approve',
            stopAttack: 'Stop attack',
            startAttack: 'Start attack',
            delete: 'Delete',
        },
        suggested: 'by',
        statistics: {
            notFound: 'Target\'s health statistics not available'
        },
        notification: {
            saved: 'Target was saved successfully',
            deleted: 'Target was deleted successfully',
            duplicated: 'Seems like this target is already in our database',
        }
    },
    bunker: {
        title: 'Bunker',
        welcome: 'Welcome, {nickname}',
        online: 'Online',
        chat: {
            title: 'Chat',
            comingSoon: 'Coming soon...'
        }
    },
    targetModal: {
        title: 'New target',
        categoriesPlaceholder: 'Categories selected: {n}'
    },
    footer: {
        disclaimer: 'Made in Ukraine'
    },
}
