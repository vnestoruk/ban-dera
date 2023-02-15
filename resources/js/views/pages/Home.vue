<template>
    <div class="content-wrapper">
        <div class="row m-2 w-100">
            <div class="col-lg-4 d-flex align-items-center flex-column justify-content-center">
                <Logo class="w-50 mb-2" />
                <h6>v.{{ appVersion }} «{{ $t('app.versionTitle') }}»</h6>
            </div>
            <div class="col-lg-8 mt-3 mt-lg-0 info-panel">
                <div class="info-container">
                    <div class="info-element text-lg-start">
                        <p class="m-0">{{ $t('statusPanel.data.ip') }}</p>
                        <h2>{{ location.ip || '?' }}</h2>
                    </div>
                    <div class="info-element text-lg-start">
                        <p class="m-0">{{ $t('statusPanel.data.country') }}</p>
                        <h2><img v-if="location.countryCode" :src="'../../img/flags/'+location.countryCode.toLowerCase()+'.svg'" :alt="location.countryCode" class="flag me-3" width="22px" height="16px">{{ location.countryName || '?' }}</h2>
                    </div>
                    <div class="info-element text-lg-start">
                        <p class="m-0">{{ $t('statusPanel.data.city') }}</p>
                        <h2>{{ location.cityName || '?' }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Logo from "../elements/Logo";
import ConfigMixin from "../../modules/mixins/ConfigMixin";
import {mapGetters} from "vuex";

export default {
    name: "Home",
    mixins: [ConfigMixin],
    components: {Logo},
    computed: {
        ...mapGetters('app', ['location']),
    }
}
</script>

<style scoped>

</style>
