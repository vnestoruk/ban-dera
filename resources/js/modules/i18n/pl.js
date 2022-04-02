export default {
    locale: 'Polski',
    app: {
        title: 'Ban-DERA',
        subtitle: '<strong>BAN</strong> <strong>D</strong>igital <strong>E</strong>nvironment for <strong>R</strong>ussian <strong>A</strong>ssets',
        version: {
            code: '2.0',
            title: 'Чорнобаївка'
        }
    },
    statusPanel: {
        title: 'Panel informacji',
        data: {
            ip: 'IP-adres',
            country: 'Kraj',
            totalTargets: 'Łącznie celów',
            activeTargets: 'Dostępnych',
            maxTargets: 'Jednoczesne cele',
            attackSpeed: 'Szybkość ataku'
        }
    },
    donation: {
        army: {
            button: 'Pomoc dla Ukraińskiego Wojska',
            title: 'Pomoc dla Ukraińskiego Wojska'
        },
        support: {
            button: 'Pomoc projektu',
            title: 'Pomoc dla dewelopera',
            content: '<p>Pracujemy na zasadach wolonterów. Jeżeli macie ochotę wesprzeć ten projekt finansowo, możecie zrobić to TUTAJ. Wasza pomoc pójdzie na utrzymanie serwerów i kawę. Dziękuję  </p>'
        }
    },
    info: {
        title: 'Інформація',
        content: '<p>DoS-atak ((Denial-of-service)) - Atak na zabezpieczenia, mający na celu przeładowanie systemu żądaniami tak, by uprawnione żądania nie mogły być obsługiwane.</p>' +
            '<p>Z waszego komputera będą wysyłane ogromne ilości żądań na Ruskie strony co ograniczy możliwość korzystania z nich. Wystarczy zostawić stronę otwarta. W momencie jak jedna z ruskich stron padnie, automatycznie się zmienia na kolejną i kontynuuje atak.</p>' +
            '<p><strong>UWAGA!</strong> Ze względu na tworzenie dużej ilości żądań w krótkim czasie, możliwe jest spowolnienie pracy komputera ta wykorzystania dużej ilości danych. Lepiej nie używać w sieciach z limitem danych.</p>'
    },
    statusInfo: {
        title: 'Про ефективність атаки',
        content: '<p>Доступність сайту - це його можливість відповідати на запити. Для забезпечення швидкої роботи з веб-сторінками часто один і той же сайт знаходиться на багатьох серверах у різних точках світу. Інколи сайт припиняє свою роботу в певній країні, проте повністю функціонує в інших.</p>' +
            '<p>Ban-DERA ma jedna z największych bazę stron spośród podobnych serwisów. I do tego wszystkieg zrobiliśmy mozliwosc sprawdzic dostepnosc każdej z celów z 21 różnych Centrum danych 18-tu krajów!</p>' +
            '<p><strong>Przykladowo:</strong> Jezeli uzywamy VPN z serwerem w Niemczech, będą proponowane tylko te strony które sa dostepne z Niemiec.</p>'
    },
    vpnServices: {
        title: 'VPN serwis',
        table: {
            title: 'VPN сервіс',
            hasRussiaServers: 'Serwery w Rosji',
            isFree: 'Jest plan darmowy',
            demo: 'Demo/Trial',
            description: 'Dodatkowe info'
        },
        services: [
            ['Hotspot Shield', 'https://www.hotspotshield.com/', true, true, true, ''],
            ['ClearVPN', 'https://clearvpn.com/', true, true, true, 'Darmowe z Ukrainy'],
            ['UrbanVPN', 'https://www.urban-vpn.com/', true, true, true, ''],
            ['Freedome Secure', 'https://onlineshop.f-secure.com/789/purl-free-freedome-for-ukraine', false, false, true, 'Darmowe 6 miesięcy dla Ukrainy'],
            ['VPN Unlimited', 'https://www.vpnunlimited.com/stop-russian-aggression', false, false, false, 'Roczna subskrypcja dla Ukrainy'],
            ['ProtonVPN', 'https://protonvpn.com/ua/', true, true, true, ''],
        ]
    },
    share: {
        timer: 'SKURWYSYN PUTIN żyje już {darknessPeriod} dni.',
        stop: 'ZAJEBAĆ KURWĘ',
        title: 'Udostępnij'
    },
    table: {
        url: 'URL',
        requests: 'Ilość',
        actions: 'Opcje'
    },
    start: 'Rozpocznij',
    stop: 'Zatrzymaj',
    copy: 'Kopiować',
    replace: 'Następny',
    open: 'Otworzyć',
    blackList: 'Usunąc',
    night: 'Tryb nocny',
    loading: 'Ładowanie',
    search: 'Wyszukiwarka',
    filter: 'Всього відфільтровано',
    settings: 'Ustawienia',
    units: {
        target: '{n} strona  | {n} stron',
        request: '{n} żadań/s | {n} żadań/s'
    },
    notification: {
        title: {
            success: 'Udane',
            warning: 'Uwaga',
            error: 'Błąd'
        },
        text: {
            error: {
                'unknown': 'Chuj wie o co chodzi. Spróbuj odświeżyć',
                '429': 'Za duzo żądań! Poczekaj i spróbuj za chwile!',
                '500': 'Jakiś problem serweru, nie przejmuj się.'
            }
        }
    }
}
