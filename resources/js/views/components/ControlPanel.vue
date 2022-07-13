<template>
    <div id="control-panel" :class="{ collapsed }" >
        <div class="trigger" @click="collapsed = !collapsed">
            <button class="btn btn-primary-outline" :disabled="this.isRunning" @click.stop="start()">
                <i class="bi bi-play me-2"></i>{{ $t('start') }}
            </button>
            <span class="bi bi-chevron-down trigger-element"></span>
        </div>
        <div class="control-container">
            <div class="control-row">
                <div class="control-value control-value-big">
                    <span class="value">---</span>
                    <span class="unit">запитів/с</span>
                </div>
                <div class="control-value control-value-big">
                    <span class="value">---</span>
                    <span class="unit">цілей</span>
                </div>
            </div>
            <hr>
            <div class="control-row">
                <div class="control-value control-value-big">
                    <label for="customRange2" class="form-label unit">Швидкість</label>
                    <input type="range" class="form-range" min="1" max="50" value="25" id="customRange2">
                </div>
            </div>
            <div class="control-row">
                <div class="control-value control-value-big">
                    <label for="customRange3" class="form-label unit">Сайтів</label>
                    <input type="range" class="form-range" min="1" max="50" value="25" id="customRange3">
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "ControlPanel",
    data() {
        return {
            collapsed: true
        }
    },
    watch: {
        $route: function () {
            this.collapsed = true;
        }
    },
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
    padding: 0 0 1rem;
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
