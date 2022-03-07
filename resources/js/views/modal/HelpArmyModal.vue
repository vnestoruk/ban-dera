<template>
    <div class="d-inline">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#helpArmyModal">
            <i class="bi bi-shield-check me-2"></i>{{ $t('donation.army.button') }}
        </button>

        <!-- Modal -->
        <div class="modal fade" id="helpArmyModal" tabindex="-1" aria-labelledby="helpArmyModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="helpArmyModalLabel">{{ $t('donation.army.title') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="d-flex flex-column flex-lg-row align-items-center justify-content-between p-3">
                            <div class="text-start" v-html="$t('donation.army.content')">

                            </div>
                            <div class="">
                                <a href="https://savelife.in.ua/en/donate/" target="_blank">
                                    <QrcodeVue value="https://savelife.in.ua/en/donate/" :size="300" level="H"/>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import QrcodeVue from "qrcode.vue";

export default {
    name: "HelpArmyModal",
    components: { QrcodeVue }
}
</script>

<style scoped>

</style>
