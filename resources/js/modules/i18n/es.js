export default {
    locale: 'Español',
    app: {
        title: 'Ban-DERA',
        subtitle: '<strong>BAN</strong> <strong>D</strong>igital <strong>E</strong>nvironment for <strong>R</strong>ussian <strong>A</strong>ssets'
    },
    targets: 'Número de webs objetivo',
    showTargets: 'Mostrar lista',
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
            '<p><strong>AVISO!</strong> Debido a que este script ejecuta un gran número de peticiones en un corto periodo de tiempo, ejecutarlo puede hacer que tu ordenador se ralentize y usar mucho tráfico. No se recomienda usarlo desde redes móviles, donde el tráfico normalmente está limitado.</p>' +
            '<p class="fst-italic">Esta web es de código abierto(<a href="https://github.com/vnestoruk/ban-dera" target="_blank">Mostrar en GitHub</a>). Únete al equipo de desarrollo o únete al <a target="_blank" href="https://t.me/ban_dera_com">grupo de Telegram</a>, comparte ideas y mantente al tanto de las actualizaciones.</p>',
    },
    vpnServices: {
        title: 'Some VPN services',
        table: {
            title: 'VPN Service',
            hasRussiaServers: 'Servers in russia',
            isFree: 'Has free plan',
            demo: 'Has demo/test period',
            description: 'Additional'
        },
        services: [
            ['Hotspot Shield', 'https://www.hotspotshield.com/', true, true, true, ''],
            ['ClearVPN', 'https://clearvpn.com/', true, true, true, 'Free for Ukraine'],
            ['urbanVPN', 'https://www.urban-vpn.com/', true, true, true, ''],
            ['Freedome Secure', 'https://onlineshop.f-secure.com/789/purl-free-freedome-for-ukraine', false, false, true, 'Free 6 months for Ukraine'],
            ['VPN Unlimited', 'https://www.vpnunlimited.com/stop-russian-aggression', false, false, false, 'Free 1 year for Ukraine'],
            ['ProtonVPN', 'https://protonvpn.com/ua/', true, true, true, ''],
        ]
    },
    share: {
        timer: 'It is {darknessPeriod} days since putin live on Earth.',
        stop: 'Stop timer',
        title: 'Share link'
    },
    table: {
        url: 'URL (Dirección web)',
        requests: 'Peticiones',
        actions: 'Acciones'
    },
    copy: 'Copiar',
    replace: 'Remplazar',
    open: 'Dirección web',
    blackList: 'Eliminar',
    night: 'Modo nocturno',
    search: 'Busca...',
    filter: 'Filtrado',
    settings: 'Ajustes',
    attackSpeed: {
        label: 'Velocidad de ataque',
        options: [
            'Espada (1 peticion/segundo)',
            'Cocktail Molotov  (5 peticiones/segundo)',
            'Pistola (10 peticiones/segundo)',
            'Metralleta (20 peticiones/segundo)',
            'Tanque (50 peticiones/segundo)',
            'Dron de combate (100 peticiones/segundo)',
        ]
    },
    maxTargets: {
        label: 'Máximo numero de objetivos',
        options: [
            '1 página web',
            '5 páginas web',
            '10 páginas web',
            '20 páginas web',
            '30 páginas web',
            '50 páginas web',
            '75 páginas web',
            '100 páginas web'
        ]
    }
}
