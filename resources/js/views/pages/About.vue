<template>
    <div class="content-wrapper about">
        <div class="d-flex flex-column align-items-center mb-3">
            <Logo class="w-50 mb-2"/>
            <h6>v.{{ appVersion }} «{{ $t('app.versionTitle') }}»</h6>
        </div>

        <h1>Про проєкт</h1>
<!--        <h5>Ban Digital Environment for Russian Assets</h5>-->

        <div>
            <h3></h3>
        </div>
    </div>
</template>

<script>
import ConfigMixin from "../../modules/mixins/ConfigMixin";
import Logo from "../elements/Logo";

export default {
    name: "About",
    components: {Logo},
    mixins: [ConfigMixin]
}
</script>

<style scoped>

</style>
