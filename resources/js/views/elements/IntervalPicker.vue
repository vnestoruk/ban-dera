<template>
    <div class="dropdown">
        <a class="dropdown-toggle" href="#" id="dropdownIntervalPickerLink" data-bs-toggle="dropdown" aria-expanded="false">
            {{ $tc('units.request', (1000 / interval)) }}
        </a>
        <ul class="dropdown-menu text-end" aria-labelledby="dropdownIntervalPickerLink">
            <li v-for="i in $data._interval" :key="i"><a href="javascript:void(0);" @click="interval = (1000 / i)">{{ $tc('units.request', i) }}</a></li>
        </ul>
    </div>

</template>

<script>
import Bandera from "../../modules/bandera";

export default {
    name: "IntervalPicker",
    data() {
        return {
            _interval: Bandera._attackSpeed
        }
    },
    computed: {
        interval: {
            set(value) {
                this.$store.commit('app/SET_INTERVAL', value);
            },
            get() {
                return this.$store.getters['app/interval'];
            }
        },
    }
}
</script>

<style scoped>

</style>
