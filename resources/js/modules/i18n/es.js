export default {
    locale: 'Español',
    app: {
        title: 'Ban-DERA',
        subtitle: '<strong>BAN</strong> <strong>D</strong>igital <strong>E</strong>nvironment for <strong>R</strong>ussian <strong>A</strong>ssets',
        versionTitle: 'Chornobaivka'
    },
    statusPanel: {
        title: 'Panel de estado',
        data: {
            ip: 'IP',
            country: 'País',
            totalTargets: 'Objetivos totales',
            activeTargets: 'Disponible',
            maxTargets: 'Máx. numero de objetivos',
            attackSpeed: 'Velocidad de ataque'
        }
    },
    donation: {
        army: {
            button: 'Ayuda al ejército Ucraniano',
            title: 'Ayuda al ejército Ucraniano'
        },
        support: {
            button: 'Apoya el proyecto',
            title: '... pero tienes que apoyar a las fuerzas ucranianas primero',
            content: '<p>Desafortunadamente, este sitio web se cae de vez en cuando. La razón de esto suele ser una "ola" de nuevos usuarios, la cual nuestro servicio de hosting barato no puede soportar. Es más, hay planes para hacer verificaciones en el lado del servidor de las webs objetivo y sus verdaderas direcciones IP para evitar su protección (como CloudFlare). Para hacer esto necesitamos un servidor más potente.</p>' +
                '<p>Si quisieras apoyar este pequeño proyecto, lo puedes hacer aquí. Gracias.</p>'
        }
    },
    info: {
        title: 'Info',
        content: '<p>DoS-attack (Denial-of-service) - uno de los métodos más comunes de ataque, satura el servidor objetivo con un gran número de peticiones externas. (intentos de cargar la página web)</p>' +
            '<p>Un número infinito de peticiones se enviarán desde tu ordenador a las webs rusas, para que se vayan al mismo sitio donde se fué el buque de guerra ruso. Simplemente deja el script corriendo. Si uno de los sitios web se define como "dropped" (caído) -  será remplazado por otro sitio web, esto quiere decir que el ataque desde tu ordenador será ininterrumpido.</p>' +
            '<p><strong>AVISO!</strong> Debido a que este script ejecuta un gran número de peticiones en un corto periodo de tiempo, ejecutarlo puede hacer que tu ordenador se ralentize y usar mucho tráfico. No se recomienda usarlo desde redes móviles, donde el tráfico normalmente está limitado.</p>'
    },
    statusInfo: {
        title: 'About the effectiveness of the attack',
        content: '<p>The availability of the site is its ability to respond to requests. To ensure fast work with web pages, often the same site is located on many servers in different places and countries. Sometimes the website stops working in one country but is fully working in others.</p>' +
            '<p>Ban-DERA has compiled one of the largest databases of target sites among similar services. But we went further and added the ability to check the availability of each target from 21 data centers in 18 countries.</p>' +
            '<p><strong>For example:</strong> If you use a VPN with a server in Germany, you will only be offered targets that are still available from Germany.</p>'
    },
    vpnServices: {
        title: 'Servicios VPN',
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
        timer: 'Han pasado {darknessPeriod} días desde que putin vive en la Tierra.',
        stop: 'Detener el temporizador',
        title: 'Compartir enlace',
        content: {
            title: 'Únase al ejército de TI en el frente digital',
            description: 'Cada uno de ustedes tiene la oportunidad de unirse a las tropas de TI de Ucrania y apoyar la operación ofensiva en los recursos web rusos junto con #ban-dera. ¡Sigue el link!'
        }
    },
    table: {
        url: 'URL (Dirección web)',
        requests: 'Peticiones',
        actions: 'Acciones'
    },
    start: 'Comienzo',
    stop: 'Detener',
    copy: 'Copiar',
    replace: 'Remplazar',
    open: 'Dirección web',
    blackList: 'Eliminar',
    night: 'Modo nocturno',
    loading: 'Cargando',
    search: 'Busca...',
    filter: 'Filtrado',
    settings: 'Ajustes',
    units: {
        target: '{n} página web | {n} páginas web',
        request: '{n} peticion/s | {n} peticiones/s'
    },
    notification: {
        title: {
            success: 'Éxito',
            warning: 'Advertencia',
            error: 'Error'
        },
        text: {
            error: {
                'unknown': 'Have no idea what\'s going on. Try to refresh the page.',
                '429': 'Too many requests! Cool down, and try again in a minute.',
                '500': 'Internal server error.'
            }
        }
    }
}
