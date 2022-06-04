<template>
    <div class="content-wrapper container">
        <div class="row m-2 w-100">
            <div class="col-lg-4 d-flex align-items-center flex-column justify-content-center">
                <Logo class="w-50 mb-2" />
                <h6>v.{{ appVersion }} «{{ $t('app.versionTitle') }}»</h6>
                <div class="d-flex flex-wrap justify-content-center gap-3 m-2">
                    <button class="btn btn-primary btn-lg my-2" :disabled="this.isRunning" @click="start()">
                        <i class="bi bi-play me-2"></i>{{ $t('start') }}
                    </button>
                    <button class="btn btn-danger btn-lg my-2" :disabled="!this.isRunning" @click="stop()">
                        <i class="bi bi-stop me-2"></i>{{ $t('stop') }}
                    </button>
                </div>

<!--                <div class="d-flex flex-wrap justify-content-center gap-3 m-2">-->
<!--                    <HelpArmyModal />-->
<!--                    <SupportProjectModal />-->
<!--                </div>-->
            </div>
            <div class="col-lg-8 mt-3 mt-lg-0 info-panel">
                <div class="info-container">
                    <div class="info-element">
                        <p class="m-0">{{ $t('statusPanel.data.ip') }}</p>
                        <h2>{{ location.ip }}</h2>
                    </div>
                    <div class="info-element">
                        <p class="m-0">{{ $t('statusPanel.data.country') }}</p>
                        <h2><img v-if="location.countryCode" :src="'../../img/flags/'+location.countryCode.toLowerCase()+'.svg'" alt="" class="flag me-3">{{ location.countryName }}</h2>
                    </div>
                    <div class="info-element">
                        <p class="m-0">{{ $t('statusPanel.data.city') }}</p>
                        <h2>{{ location.cityName }}</h2>
                    </div>
                </div>

<!--                <div class="card status-panel">-->
<!--                    <div class="card-header">-->
<!--                        {{ $t('statusPanel.title') }}-->
<!--                        <div class="float-end">-->
<!--                            <InfoModal />-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="card-body">-->
<!--                        <div class="status-item">-->
<!--                            <span>{{ $t('statusPanel.data.ip') }}</span>-->
<!--                            <span>{{ location.ip }}</span>-->
<!--                        </div>-->
<!--                        <div class="status-item">-->
<!--                            <span>{{ $t('statusPanel.data.country') }}</span>-->
<!--                            <span><img v-if="location.countryCode" :src="'../../img/flags/'+location.countryCode.toLowerCase()+'.svg'" alt="" class="flag me-3">{{ location.countryName }}</span>-->
<!--                        </div>-->
<!--                        <div class="status-item">-->
<!--                            <span>{{ $t('statusPanel.data.totalTargets') }}</span>-->
<!--                            <span>{{ status.total }}</span>-->
<!--                        </div>-->
<!--                        <div class="status-item">-->
<!--                            <span>{{ $t('statusPanel.data.activeTargets') }}</span>-->
<!--                            <span>{{ targets.length }}</span>-->
<!--                        </div>-->
<!--                        <div class="status-item">-->
<!--                            <span>{{ $t('statusPanel.data.maxTargets') }}</span>-->
<!--                            <MaxTargetPicker />-->
<!--                        </div>-->
<!--                        <div class="status-item">-->
<!--                            <span>{{ $t('statusPanel.data.attackSpeed') }}</span>-->
<!--                            <IntervalPicker />-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
            </div>
        </div>

        <!-- Main screen -->
        <div v-if="queue.length > 0" class="row table-container mt-3 mb-5 w-100">
            <table>
                <thead>
                <tr>
                    <td></td>
                    <td>{{ $t('table.url') }}</td>
                    <td class="text-end pe-3">{{ $t('table.requests') }}</td>
                    <td class="text-end">{{ $t('table.actions') }}</td>
                </tr>
                </thead>
                <tbody id="bandera">
                <tr v-for="(b, index) in queue" :key="index">
                    <td>
                        <a href="javascript:void(0)" @click="pinTarget(b)" class="me-2" :class="{ 'text-danger' : b.pinned }" :title="$t('replace')"><i class="bi" :class="b.pinned ? 'bi-pin' : 'bi-pin-angle'"></i></a>
                    </td>
                    <td :class="{ 'text-warning' : b.requests.strike > 50, 'text-danger': b.requests.strike > 100 }">{{ b.target.url }}</td>
                    <td class="text-end pe-3">
                        <span class="d-none d-md-inline"><i class="bi bi-check-circle me-2 text-success"></i>{{ b.requests.success }} /</span>
                        <span class="d-none d-md-inline"><i class="bi bi-x-circle me-2 text-danger"></i>{{ b.requests.failed }} /</span>
                        <span class=""><i class="bi bi-exclamation-circle me-2 text-primary"></i>{{ b.requests.total }}</span></td>
                    <td class="text-end">
                        <a :href="b.target.url" target="_blank" referrerpolicy="no-referrer" class="text-primary me-2" :title="$t('open')"><i class="bi bi-box-arrow-up-right"></i></a>
                        <a href="javascript:void(0)" @click="replaceTarget(b)" class="text-warning me-2" :title="$t('replace')"><i class="bi bi-shuffle"></i></a>
                        <a href="javascript:void(0)" @click="addToBlackList(b)" class="text-danger me-2" :title="$t('blackList')"><i class="bi bi-x-octagon"></i></a>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <!-- End main screen -->
    </div>
</template>

<script>
import Bandera from "../../modules/bandera";
import HelpArmyModal from "../components/modal/HelpArmyModal";
import SupportProjectModal from "../components/modal/SupportProjectModal";
import InfoModal from "../components/modal/InfoModal";
import CopyToClipboard from "../elements/CopyToClipboard";
import VPNServicesModal from "../components/modal/VPNServicesModal";
import {mapActions, mapGetters} from "vuex";
import MaxTargetPicker from "../elements/MaxTargetPicker";
import IntervalPicker from "../elements/IntervalPicker";
import AppLayout from "../layouts/AppLayout";
import Logo from "../elements/Logo";
import ConfigMixin from "../../modules/mixins/ConfigMixin";
import LocationResource from "../../modules/ajax/api/LocationResource";

export default {
    name: "Main",
    mixins: [ConfigMixin],
    components: {
        Logo,
        AppLayout,
        IntervalPicker,
        MaxTargetPicker, VPNServicesModal, CopyToClipboard, InfoModal, SupportProjectModal, HelpArmyModal },
    data() {
        return {
            timer: null,
            queue: [],
            speed: 0,
            speedTimer: null
        }
    },
    computed: {
        ...mapGetters('app', ['autostart', 'location', 'targets', 'blackList', 'maxTargets', 'interval']),
        isRunning() {
            return this.queue.length > 0;
        }
    },
    watch: {
        interval() {
            this.restart();
        },
        maxTargets() {
            this.restart();
        }
    },
    mounted() {
        this.queue.length = 0;
        this.getTargets().then(() => {
            if (this.autostart) {
                this.start();
            }
        });
    },
    beforeDestroy() {
        this.stop();
    },
    methods: {
        ...mapActions('app', ['getTargets', 'initTheme']),
        start() {
            if (!this.isRunning) this.getRandomTargets(this.maxTargets);
            clearInterval(this.timer);
            this.timer = setInterval(() => {
                console.clear();
                this.queue.filter(i => {
                    if (!i.pinned && i.requests.strike > 150) return this.replaceTarget(i);
                    i.run();
                });

            }, this.interval);
        },
        stop() {
            clearInterval(this.timer);
            this.queue = [];
        },
        restart() {
            if (this.isRunning) {
                this.stop();
                this.start()
            }
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
        pinTarget(obj) {
            let item = this.queue.find(item => item.target.id === obj.target.id);
            item.pinned = !item.pinned;
        },
        addToBlackList(obj) {
            this.blackList.push(obj);
            this.replaceTarget(obj);
        }
    }
}
</script>

<style scoped>

</style>
