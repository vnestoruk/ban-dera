<template>
    <div class="footer">
        <div class="d-flex flex-wrap justify-content-center gap-3 mt-3">
            <VPNServicesModal />
            <a href="https://t.me/ban_dera_com" target="_blank" class="btn btn-sm btn-grey">
                <i class="bi bi-telegram me-2"></i> Telegram
            </a>
            <a href="https://github.com/vnestoruk/ban-dera" target="_blank" class="btn btn-sm btn-grey">
                <i class="bi bi-github me-2"></i> GitHub
            </a>
        </div>
        <ShareTimer />
    </div>
</template>

<script>
import InfoModal from "../modal/InfoModal";
import VPNServicesModal from "../modal/VPNServicesModal";
import ShareTimer from "./ShareTimer";
export default {
    name: "Footer",
    components: {ShareTimer, VPNServicesModal, InfoModal}
}
</script>

<style scoped>

</style>
