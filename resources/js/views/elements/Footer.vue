<template>
    <div class="footer container-fluid">
        <div>
            <p class="m-0">{{ new Date().getFullYear() }} | Зроблено в Україні.</p>
        </div>
        <div class="social-share-buttons">
            <ShareNetwork
                network="facebook"
                url="https://ban-dera.com"
                :title="$t('share.content.title')"
                :description="$t('share.content.description')"
            >
                <i class="bi bi-facebook" v-tooltip:top="'Facebook'"></i>
            </ShareNetwork>
            <ShareNetwork
                network="twitter"
                url="https://ban-dera.com"
                :title="$t('share.content.title')"
            >
                <i class="bi bi-twitter" v-tooltip:top="'Twitter'"></i>
            </ShareNetwork>
            <ShareNetwork
                network="telegram"
                url="https://ban-dera.com"
                :title="$t('share.content.title')"
                :description="$t('share.content.description')"
            >
                <i class="bi bi-telegram" v-tooltip:top="'Telegram'"></i>
            </ShareNetwork>
            <ShareNetwork
                network="messenger"
                url="https://ban-dera.com"
                :title="$t('share.content.title')"
            >
                <i class="bi bi-messenger" v-tooltip:top="'Messenger'"></i>
            </ShareNetwork>
            <ShareNetwork
                network="whatsapp"
                url="https://ban-dera.com"
                :title="$t('share.content.title')"
                :description="$t('share.content.description')"
            >
                <i class="bi bi-whatsapp" v-tooltip:top="'WhatsApp'"></i>
            </ShareNetwork>
            <ShareNetwork
                network="reddit"
                url="https://ban-dera.com"
                :title="$t('share.content.title')"
            >
                <i class="bi bi-reddit" v-tooltip:top="'Reddit'"></i>
            </ShareNetwork>
        </div>
    </div>
</template>

<script>
import InfoModal from "../components/modal/InfoModal";
import VPNServicesModal from "../components/modal/VPNServicesModal";
import ShareTimer from "./ShareTimer";
export default {
    name: "Footer",
    components: {ShareTimer, VPNServicesModal, InfoModal}
}
</script>

<style scoped>

</style>
