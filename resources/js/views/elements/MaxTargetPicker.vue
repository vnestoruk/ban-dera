<template>
    <div class="dropdown">
        <a class="dropdown-toggle" href="#" id="dropdownMaxTargetPickerLink" data-bs-toggle="dropdown" aria-expanded="false">
            {{ $tc('units.target', maxTargets) }}
        </a>
        <ul class="dropdown-menu text-end" aria-labelledby="dropdownMaxTargetPickerLink">
            <li v-for="m in $data._maxTargets" :key="m"><a href="javascript:void(0);" @click="maxTargets = m">{{ $tc('units.target', m) }}</a></li>
        </ul>
    </div>
</template>

<script>
import Bandera from "../../modules/bandera";

export default {
    name: "MaxTargetPicker",
    data() {
        return {
            _maxTargets: Bandera._maxTargets
        }
    },
    computed: {
        maxTargets: {
            set(value) {
                this.$store.commit('app/SET_MAX_TARGETS', value);
            },
            get() {
                return this.$store.getters['app/maxTargets'];
            }
        },
    }
}
</script>

<style scoped>

</style>
