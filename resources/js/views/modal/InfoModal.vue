<template>
    <div class="d-inline">
        <!-- Button trigger modal -->
        <a href="javascript:void(0);" class="btn btn-sm btn-secondary" data-bs-toggle="modal" data-bs-target="#infoModal">
            <i class="bi bi-info-circle me-2"></i> {{ $t('info.title') }}
        </a>

        <!-- Modal -->
        <div class="modal fade" id="infoModal" tabindex="-1" aria-labelledby="infoModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content text-start">
                    <div class="modal-header">
                        <h5 class="modal-title" id="infoModalLabel">{{ $t('info.title') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" v-html="$t('info.content')"></div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import QrcodeVue from "qrcode.vue";
import CopyToClipboard from "../elements/CopyToClipboard";

export default {
    name: "InfoModal",
    components: {CopyToClipboard, QrcodeVue }
}
</script>

<style scoped>

</style>
