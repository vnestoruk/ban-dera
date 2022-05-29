<template>
    <div class="content-wrapper container about">
        <h1>Ban-DERA</h1>
        <h5>Ban Digital Environment for Russian Assets</h5>
        <h6>v.{{ appVersion }} «{{ $t('app.versionTitle') }}»</h6>
        <div>
            <h3></h3>
        </div>
    </div>
</template>

<script>
import ConfigMixin from "../../modules/mixins/ConfigMixin";

export default {
    name: "About",
    mixins: [ConfigMixin]
}
</script>

<style scoped>

</style>
