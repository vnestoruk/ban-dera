<template>
    <div id="control-panel" :class="{ collapsed }" >
        <div class="trigger" @click="collapsed = !collapsed">
            <button class="btn btn-primary-outline" @click.stop="toggleState">
                <template v-if="isRunning">
                    <i class="bi bi-stop me-2"></i>{{ $t('stop') }}
                </template>
                <template v-else>
                    <i class="bi bi-play me-2"></i>{{ $t('start') }}
                </template>
            </button>
            <span class="bi bi-chevron-down trigger-element"></span>
        </div>
        <div class="control-container">
            <div class="control-row">
                <div class="control-value control-value-big">
                    <span class="value">---</span>
                    <span class="unit">{{ $tc('units.target', 0) }}</span>
                </div>
                <div class="control-value control-value-big">
                    <span class="value">---</span>
                    <span class="unit">{{ $tc('units.speed', 0) }}</span>
                </div>
            </div>
            <div class="control-row">
                <div class="control-value control-value-big">
                    <span class="value">{{ traffic | filterDataUnits }}</span>
                    <span class="unit">Traffic used</span>
                </div>
            </div>
            <hr>
            <div class="control-row">
                <div class="control-value control-value-big">
                    <div class="form-check form-switch">
                        <input v-model="autostart" class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                        <label class="form-check-label" for="flexSwitchCheckDefault">Autostart</label>
                    </div>
                </div>
            </div>
        </div>
        <Footer class="d-flex position-static d-md-none"/>
    </div>
</template>

<script>
import ConfigMixin from "../../modules/mixins/ConfigMixin";
import RangeSlider from "../elements/RangeSlider";
import Footer from "../components/Footer";
import {mapActions, mapGetters} from "vuex";

export default {
    name: "ControlPanel",
    components: {RangeSlider, Footer},
    mixins: [ConfigMixin],
    computed: {
        ...mapGetters('app', ['isRunning']),
        autostart: {
            get() {
                return this.$store.getters['app/autostart'];
            },
            set(value) {
                this.$store.commit('app/SET_AUTOSTART', value)
            }
        }
    },
    methods: {
        ...mapActions('app', ['start', 'stop']),
        toggleState() {
            if (this.isRunning) {
                this.stop();
            } else {
                this.start();
            }
        },
        getTotalTrafficSize() {
            let performance = window.performance || window.mozPerformance || window.msPerformance || window.webkitPerformance || {};
            return
        }
    },
    data() {
        return {
            collapsed: true,
            traffic: 0
        }
    },
    watch: {
        $route: function () {
            this.collapsed = true;
        }
    },
    mounted() {
        let performance = window.performance || window.mozPerformance || window.msPerformance || window.webkitPerformance || {};

        setInterval(() => {
            this.traffic = performance.getEntries().reduce((sum, current) => {
                return sum + (current.transferSize | 0);
            }, 0);
        }, 10000);
    }
}
</script>

<style lang="scss" scoped>
#control-panel {
    position: fixed;
    display: flex;
    flex-direction: column;
    flex-wrap: nowrap;
    justify-content: center;
    align-items: center;
    gap: 1rem;
    background: var(--color-text);
    color: var(--color-bg);
    z-index: 99;
    width: fit-content;
    min-width: 20rem;
    inset: auto 0 0;
    margin: 0 auto -2rem;
    padding: 0 0 2rem;
    text-align: center;
    filter: drop-shadow(0px -1px 5px var(--color-bg-opaque));
    border-top-left-radius: .5rem;
    border-top-right-radius: .5rem;
    transition: all .4s ease-in-out, transform 1s cubic-bezier(.5, -.4, .5, 1.4);


    .trigger {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: .5rem 1rem .5rem;
        border-bottom: 1px solid var(--color-bg-opaque);
        cursor: pointer;
        width: 100%;

        .trigger-element {
            font-size: 1.2rem;
            transition: transform 1s cubic-bezier(.5, -.4, .5, 1.4);
        }
    }

    .control-container {
        display: flex;
        flex-direction: column;
        gap: 1rem;
        padding: 0.5rem 1.5rem 2.5rem;
        width: 100%;

        .control-row {
            display: flex;
            justify-content: space-evenly;
            width: 100%;
        }

        .control-value {
            display: flex;
            flex-direction: column;
            width: 100%;

            &-big {
                padding: 0 1.5rem;

                .value {
                    font-family: 'Oswald', sans-serif;
                    font-size: 2.5rem;
                    text-align: center;
                }

                .unit {
                    font-size: 0.75rem;
                    text-transform: uppercase;
                }
            }
        }

    }

    &.collapsed {
        transform: translateY(calc(100% - 5rem));

        .trigger .trigger-element {
            transform: rotate(-180deg);
        }
    }

    //@media all and (max-width: 786px) {
    //    inset: 0 -4.5rem 0 auto;
    //    transform: rotate(-90deg);
    //
    //    &.collapsed {
    //        inset: 0 -4.5rem 0 auto;
    //        transform: rotate(-90deg) translateY(7.5em);
    //    }
    //}


}
</style>
