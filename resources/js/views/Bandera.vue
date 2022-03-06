<template>
    <div class="container">
        <div class="d-flex justify-content-center gap-5 mt-3">
            <a href="javascript:void(0);" @click="setLocale('uk')">Українська</a>
            <a href="javascript:void(0);" @click="setLocale('en')">English</a>
            <a href="javascript:void(0);" @click="setLocale('ru')">Кацапська</a>
        </div>
        <div class="d-flex form-check form-switch justify-content-center mt-3">
            <label class="form-check-label">
                <input class="form-check-input me-2" type="checkbox" v-model="nightMode" >
                {{ $t('night') }}
            </label>
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
        <h3 class="text-center">{{ $t('settings') }}</h3>
        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">{{ $t('attackSpeed.label') }}</label>
                <select v-model="attackSpeed" class="form-select form-select-sm bandera" :aria-label="$t('attackSpeed.label')">
                    <option value="1">{{ $t('attackSpeed.options[0]') }}</option>
                    <option value="5">{{ $t('attackSpeed.options[1]') }}</option>
                    <option value="10">{{ $t('attackSpeed.options[2]') }}</option>
                    <option value="20">{{ $t('attackSpeed.options[3]') }}</option>
                    <option value="50">{{ $t('attackSpeed.options[4]') }}</option>
                    <option value="100">{{ $t('attackSpeed.options[5]') }}</option>
                </select>
            </div>
            <div class="col-md-6">
                <label class="form-label">Attack speed</label>
                <select v-model="maxTargets" class="form-select form-select-sm bandera" :aria-label="$t('maxTargets.label')">
                    <option value="1">{{ $t('maxTargets.options[0]') }}</option>
                    <option value="5">{{ $t('maxTargets.options[1]') }}</option>
                    <option value="10">{{ $t('maxTargets.options[2]') }}</option>
                    <option value="20">{{ $t('maxTargets.options[3]') }}</option>
                    <option value="50">{{ $t('maxTargets.options[4]') }}</option>
                    <option value="100">{{ $t('maxTargets.options[5]') }}</option>
                </select>
            </div>
        </div>
        <hr>
        <div class="row mt-3 mb-5">
            <table>
                <thead>
                <tr>
                    <td>{{ $t('table.url') }}</td>
                    <td class="text-end">{{ $t('table.requests') }}</td>
                    <td class="text-end d-none d-lg-table-cell">{{ $t('table.actions') }}</td>
                </tr>
                </thead>
                <tbody id="bandera">
                <tr v-for="(b, index) in queue" :key="index">
                    <td :class="{ 'text-warning' : b.requests.strike > 50, 'text-danger': b.requests.strike > 100 }">{{ b.target.url }}</td>
                    <td class="text-end"><span class="bi bi-check-circle me-2 text-success"></span>{{ b.requests.success }} / <span class="bi bi-x-circle me-2 text-danger"></span>{{ b.requests.failed }} / <span class="bi bi-exclamation-circle me-2 text-primary"></span>{{ b.requests.total }}</td>
                    <td class="text-end d-none d-lg-table-cell">
                        <a href="javascript:void(0)" @click="replaceTarget(b)" class="text-primary me-2"><i class="bi bi-shuffle me-2"></i>{{ $t('replace') }}</a>
                        <a :href="b.target.url" target="_blank" class="text-warning me-2"><i class="bi bi-box-arrow-up-right me-2"></i>Відкрити</a>
                        <a href="javascript:void(0)" @click="addToBlackList(b)" class="text-danger me-2"><i class="bi bi-x-octagon me-2"></i>{{ $t('blackList') }}</a>
                    </td>
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
            timer: null,
            targets: [],
            blackList: [],
            queue: [],
            nightMode: false,
            attackSpeed: 10,
            maxTargets: 10
        }
    },
    computed: {
        interval() {
            return 1000 / this.attackSpeed;
        }
    },
    watch: {
        nightMode(newVal) {
            document.body.setAttribute('data-theme', (newVal) ? 'night' : 'light');
        },
        attackSpeed() {
            this.start();
        },
        maxTargets(newVal, oldVal) {
            this.stop();
            this.start();
        }
    },
    mounted() {
        this.nightMode = window.matchMedia("(prefers-color-scheme: dark)").matches;
        // Get all the targets
        request({
            method: 'GET',
            url: '/api/targets'
        }).then(
            (response) => {
                this.targets = response.data;
                this.start();
            }
        )
    },
    methods: {
        start() {
            if (this.queue.length === 0) this.getRandomTargets(this.maxTargets);
            clearInterval(this.timer);
            this.timer = setInterval(() => {
                console.clear();
                this.queue.filter(i => {
                    if (i.requests.strike > 150) return this.replaceTarget(i);
                    i.run();
                });

            }, this.interval);
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

            let source  = this.targets;
            let selectedTarget = source.sort(() => 0.5 - Math.random()).slice(0, 1)[0];
            if ((typeof targets.find(item => item.id === selectedTarget.id) === 'undefined') ||
                (typeof this.blackList.find(item => item.id === selectedTarget.id) === 'undefined') ||
                (typeof this.queue.find(item => item.target.id === selectedTarget.id) === 'undefined')) {
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
        addToBlackList(obj) {
            this.blackList.push(obj);
            this.replaceTarget(obj);
        },
        setLocale(locale) {
            this.$root.$i18n.locale = locale;
        }
    }
}
</script>

<style scoped>

</style>
