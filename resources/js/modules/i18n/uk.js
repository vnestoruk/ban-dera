export default {
    locale: 'Українська',
    app: {
        title: 'Ban-DERA',
        versionTitle: 'Азов'
    },
    authentication: {
        signup: 'Реєстрація',
        login: 'Вхід',
        logout: 'Вийти',
        nickname: 'Нікнейм',
        email: 'Email',
        password: 'Пароль',
        password_confirmation: 'Підтвердження пароля',
        ctaSignup: 'Не маєте облікового запису?',
        ctaLogin: 'Вже зареєстровані?',
    },
    navigation: {
        index: 'Головна',
        targets: 'Цілі',
        bunker: 'Криївка',
        instructions: 'Інструкції',
        about: 'Про проєкт'
    },
    statusPanel: {
        title: 'Панель стану',
        data: {
            ip: 'IP-адреса',
            country: 'Країна',
            city: 'Місто',
            // totalTargets: 'Всього цілей',
            // activeTargets: 'Доступних',
            // maxTargets: 'Одночасні цілі',
            // attackSpeed: 'Швидкість атаки'
        }
    },
    donation: {
        army: {
            button: 'Допомога для ЗСУ',
            title: 'Допомога воїнам України'
        },
        support: {
            button: 'Підтримати цей сайт',
            title: 'Підтримати розробника',
            content: '<p>Проєкт працює на волонтерських засадах, а сервер оплачується самим розробником. Якщо у Вас виникло бажання допомогти цьому проєкту - нижче представлені доступні способи зробити це. Дякую.</p>'
        }
    },
    info: {
        title: 'Інформація',
        content: '<p>DoS-атака (Denial-of-service) - одним із найпоширеніших методів нападу, насичення атакованого сервера великою кількістю зовнішніх запитів.</p>' +
            '<p>З Вашого комп\'ютера буде надсилатись нескінченна кількість запитів на російські сайти, що може відправити їх в слід за рускім воєнним кораблем. Тобто, НАХУЙ. Просто залишіть скрипт працюючим. Якщо якийсь сайт буде визначено як "відвалений" - його буде замінено на інший, тобто Ваша атака буде постійною.</p>' +
            '<p><strong>УВАГА!</strong> Так як цей скрипт ініціює велику кількість запитів за короткий проміжок часу, його запуск може уповільнити роботу Вашого комп\'ютера та використати велику кількість трафіку. Не рекомендується використовувати його з мобільних мереж, де, зазвичай, трафік обмежений.</p>'
    },
    statusInfo: {
        title: 'Про ефективність атаки',
        content: '<p>Доступність сайту - це його можливість відповідати на запити. Для забезпечення швидкої роботи з веб-сторінками часто один і той же сайт знаходиться на багатьох серверах у різних точках світу. Інколи сайт припиняє свою роботу в певній країні, проте повністю функціонує в інших.</p>' +
            '<p>Ban-DERA зібрав одну із найбільших баз сайтів-цілей серед аналогічних сервісів. Але ми пішли далі і додали можливість перевіряти доступність кожної цілі з 21 датацентру у 18 країнах.</p>' +
            '<p><strong>Наприклад:</strong> Якщо ви використовуєте VPN із сервером у Німеччині, вам буде запропоновано тільки ті цілі, які досі залишаються доступними із Німеччини.</p>'
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
        ]
    },
    share: {
        timer: 'На Землі путін прожив вже {darknessPeriod} днів.',
        stop: 'Зупинити таймер',
        title: 'Поділися посиланням',
        content: {
            title: 'Приєднуйся до IT-армії на цифровому фронті!',
            description: 'Кожен із вас має можливість долучитись до IT-війська України і підтримати наступальну операцію на рашистські веб-ресурси разом з #ban-dera. Переходьте за посиланням!'
        }
    },
    table: {
        url: 'URL',
        requests: 'Запити',
        actions: 'Дії'
    },
    add: 'Додати',
    suggest: 'Запропонувати',
    edit: 'Редагувати',
    save: 'Зберегти',
    start: 'Старт',
    stop: 'Стоп',
    create: 'Створити',
    copy: 'Копіювати',
    replace: 'Замінити',
    open: 'Відкрити',
    close: 'Закрити',
    back: 'Назад',
    enable: 'Включити',
    disable: 'Виключити',
    blackList: 'Виключити',
    night: 'Нічний режим',
    loading: 'Завантаження',
    search: 'Пошук...',
    filter: 'Всього відфільтровано',
    settings: 'Налаштування',
    units: {
        target: 'цілей',
        speed: 'запитів/с',
        rate: 'відмов',
        traffic: 'Використано'
    },
    notification: {
        title: {
            success: 'Успішно',
            warning: 'Увага',
            error: 'Помилка',
            newUser: 'Новий користувач на сайті',
            targetAttackState: 'Стан атаки на ціль був змінений',
        },
        text: {
            error: {
                'unknown': 'Поняття не маю що сталось. Спробуйте перезавантажити сторінку.',
                '401': 'Ви не можете це зробити без авторизації',
                '422': 'Unprocessable entity.',
                '429': 'Надто багато запитів! Охолоньте, і спробуйте через хвилину.',
                '500': 'Внутрішня помилка сервера.',
                '503': 'Сайт тимчасово переналаштовується.'
            },
            newUser: 'Ласкаво просимо, {nickname}!',
            targetAttackState: {
                start: "[{url}] зараз під атакою",
                stop: "[{url}] вилучений зі списку атакованих"
            }
        }
    },
    about: {
        title: 'Про проєкт',
        sections: {
            general: {
                text: [
                    ''
                ]
            },
            partners: {
                title: 'Спонсори'
            },
            openSource: {
                title: 'Відкритий код на GitHub'
            },
            share: {
                title: 'Поділіться з друзями'
            },
            thirdParties: {
                title: 'Використані технології/бібліотеки'
            },
            usefulLinks: {
                title: 'Корисні посилання'
            }
        }
    },
    targetList: {
        title: 'Список цілей',
        table: {
            url: 'URL',
            category: 'Категорія',
            health: 'Здоров\'я',
            suggestedBy: 'Запропоновано',
            status: 'Статуси',
        },
        statuses: {
            approved: 'Підтверджено',
            underAttack: 'Під атакою'
        },
        pagination: {
            showing: 'Показано {from} - {to} з {total}'
        },
        notFound: 'Цілі не знайдені'
    },
    target: {
        categories: {
            other: 'Інше',
            automotive: 'Автомобільна',
            business: 'Бізнес',
            casino: 'Казино',
            entertainment: 'Розваги',
            financial: 'Фінанси',
            government: 'Правління/Уряд',
            media: 'Медіа',
            piracy: 'Піратство',
            services: 'Послуги',
            social_network: 'Соціальні мережі',
            tourism: 'Туризм',
        },
        actions: {
            refuse: 'Не підтверджувати',
            approve: 'Підтвердити',
            stopAttack: 'Зупинити атаку',
            startAttack: 'Почати атаку',
            delete: 'Видалити',
        },
        suggested: 'від',
        statistics: {
            notFound: 'Статистика стану цілі недоступна'
        },
        notification: {
            saved: 'Ціль була успішно збережена',
            deleted: 'Ціль була успішно видалена',
            duplicated: 'Схоже, така ціль у нашій базі вже є',
        }
    },
    bunker: {
        title: 'Криївка',
        welcome: 'Ласкаво просимо, {nickname}',
        online: 'Онлайн',
        chat: {
            title: 'Чат',
            comingSoon: 'Скоро...'
        }
    },
    targetModal: {
        title: 'Нова ціль',
        categoriesPlaceholder: 'Категорій вибрано: {n}'
    },
    footer: {
        disclaimer: 'Зроблено в Україні'
    },
}
