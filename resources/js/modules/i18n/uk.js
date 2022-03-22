export default {
    locale: 'Українська',
    app: {
        title: 'Ban-DERA',
        subtitle: '<strong>BAN</strong> <strong>D</strong>igital <strong>E</strong>nvironment for <strong>R</strong>ussian <strong>A</strong>ssets'
    },
    targets: 'Кількість сайтів у базі',
    showTargets: 'Показати список цілей',
    donation: {
        army: {
            button: 'Допомога для ЗСУ',
            title: 'Допомога воїнам України'
        },
        support: {
            button: 'Допомогти проєкту',
            title: '...але спочатку допоможи армії',
            content: '<p>Якщо у Вас виникло бажання допомогти цьому маленькому проєкту, Ви можете зробити це також. Дякую.</p>'
        }
    },
    info: {
        title: 'Інформація',
        content: '<p>DoS-атака (Denial-of-service) - одним із найпоширеніших методів нападу, насичення атакованого сервера великою кількістю зовнішніх запитів.</p>' +
            '<p>З Вашого комп\'ютера буде надсилатись нескінченна кількість запитів на російські сайти, що може відправити їх в слід за рускім воєнним кораблем. Тобто, НАХУЙ. Просто залишіть скрипт працюючим. Якщо якийсь сайт буде визначено як "відвалений" - його буде замінено на інший, тобто Ваша атака буде постійною.</p>' +
            '<p><strong>УВАГА!</strong> Так як цей скрипт ініціює велику кількість запитів за короткий проміжок часу, його запуск може сповільнити роботу Вашого комп\'ютера та використати велику кількість трафіку. Не рекомендується використовувати його з мобільних мереж, де, зазвичай, трафік обмежений.</p>' +
            '<p class="fst-italic">Це сайт з відкритим кодом (<a href="https://github.com/vnestoruk/ban-dera" target="_blank">Переглянути на Github</a>). Долучайтесь до розробки, або діліться своїми ідеями щодо покращення та слідкуйте за оновленнями.</p>',
    },
    vpnServices: {
        title: 'VPN-сервіси',
        table: {
            title: 'VPN сервіс',
            hasRussiaServers: 'Сервери у рашці',
            isFree: 'Є безкоштовно',
            demo: 'Є демо/тестовий період',
            description: 'Додатково'
        },
        services: [
            ['Hotspot Shield', 'https://www.hotspotshield.com/', true, true, true, ''],
            ['ClearVPN', 'https://clearvpn.com/', true, true, true, 'Безкоштовно з України'],
            ['UrbanVPN', 'https://www.urban-vpn.com/', true, true, true, ''],
            ['Freedome Secure', 'https://onlineshop.f-secure.com/789/purl-free-freedome-for-ukraine', false, false, true, 'Безкоштовно 6 місяців для України'],
            ['VPN Unlimited', 'https://www.vpnunlimited.com/stop-russian-aggression', false, false, false, 'Річна підписка для України'],
            ['ProtonVPN', 'https://protonvpn.com/ua/', true, true, true, ''],
            ['DewVPN', 'https://www.dewvpn.com/', true, true, true, 'Безкоштовний та безлімітний для некомерційного використання'],
        ]
    },
    share: {
        timer: 'На Землі путін прожив вже {darknessPeriod} днів.',
        stop: 'Зупинити таймер',
        title: 'Поділися посиланням'
    },
    table: {
        url: 'URL',
        requests: 'Запити',
        actions: 'Дії'
    },
    copy: 'Копіювати',
    replace: 'Замінити',
    open: 'Відкрити',
    blackList: 'Виключити',
    night: 'Нічний режим',
    search: 'Пошук...',
    filter: 'Всього відфільтровано',
    settings: 'Налаштування',
    attackSpeed: {
        label: 'Швидкість',
        options: [
            'Меч (1 запитів/с)',
            'Коктейль Молотова (5 запитів/с)',
            'Пістолет (10 запитів/с)',
            'Автомат (20 запитів/с)',
            'Танк (50 запитів/с)',
            'Байрактар (100 запитів/с)',
        ]
    },
    maxTargets: {
        label: 'Максимум цілей',
        options: [
            '1 сайт',
            '5 сайтів',
            '10 сайтів',
            '20 сайтів',
            '30 сайтів',
            '50 сайтів',
            '75 сайтів',
            '100 сайтів'
        ]
    }
}
