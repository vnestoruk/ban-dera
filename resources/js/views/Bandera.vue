<template>
    <div class="container">
        <div class="d-flex justify-content-center gap-5 mt-3">
            <a href="javascript:void(0);" @click="setLocale('uk')">Українська</a>
            <a href="javascript:void(0);" @click="setLocale('en')">English</a>
        </div>
        <div class="d-flex form-check form-switch justify-content-center mt-3">
            <input class="form-check-input me-2" type="checkbox" v-model="nightMode">
            <label class="form-check-label">{{ $t('night') }}</label>
        </div>
        <div class="row text-center mt-3">
            <h1>{{ $t('app.title') }}</h1>
            <p v-html="$t('app.subtitle')"></p>
            <p>{{ $t(('targets')) }}: {{ targets.length }}</p>
            <div class="d-flex justify-content-center gap-3">
                <TargetListOffcanvas :targets="targets"/>
                <HelpArmyModal />
                <SupportProjectModal />
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12" v-html="$t('content')"></div>
        </div>
        <hr>
        <div class="row mt-3">
            <table>
                <thead>
                <tr>
                    <td>{{ $t('table.url') }}</td>
                    <td>{{ $t('table.requests') }}</td>
                    <td>{{ $t('table.success') }}</td>
                    <td>{{ $t('table.failed') }}</td>
                    <td>{{ $t('table.rate') }}</td>
                </tr>
                </thead>
                <tbody id="bandera">
                <tr v-for="b in queue">
                    <td>{{ b.target.url }}</td>
                    <td>{{ b.requests.total }}</td>
                    <td class="text-success">{{ b.requests.success }}</td>
                    <td class="text-danger">{{ b.requests.failed }}</td>
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
import TargetListOffcanvas from "./offcanvas/TargetListOffcanvas";
import HelpArmyModal from "./modal/HelpArmyModal";
import SupportProjectModal from "./modal/SupportProjectModal";

export default {
    name: "Bandera",
    components: {SupportProjectModal, HelpArmyModal, TargetListOffcanvas},
    data() {
        return {
            targets: [],
            queue: [],
            nightMode: false
        }
    },
    watch: {
        nightMode(newMode) {
            document.body.setAttribute('data-theme', (newMode) ? 'night' : 'light');
        }
    },
    created() {
        this.initNightMode();
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
        },
        setLocale(locale) {
            this.$root.$i18n.locale = locale;
        },
        initNightMode() {
            const dark = window.matchMedia("(prefers-color-scheme: dark)").matches;

            if (dark) {
                document.body.setAttribute('data-theme', 'night');
            }
        }
    }
}
</script>

<style scoped>

</style>
