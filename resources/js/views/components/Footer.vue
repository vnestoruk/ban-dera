<template>
    <footer class="footer">
        <div>
            <p class="disclaimer m-0">{{ new Date().getFullYear() }} | {{ $t('footer.disclaimer') }}</p>
        </div>
        <div class="social-share-buttons">
            <ShareNetwork
                class="action-button"
                network="facebook"
                url="https://ban-dera.com"
                tag="button"
                :title="$t('share.content.title')"
                :description="$t('share.content.description')"
                v-tooltip:top="'Facebook'" >
                <i class="bi bi-facebook"></i>
            </ShareNetwork>
            <ShareNetwork
                class="action-button"
                network="twitter"
                url="https://ban-dera.com"
                tag="button"
                :title="$t('share.content.title')"
                v-tooltip:top="'Twitter'" >
                <i class="bi bi-twitter"></i>
            </ShareNetwork>
            <ShareNetwork
                class="action-button"
                network="telegram"
                url="https://ban-dera.com"
                tag="button"
                :title="$t('share.content.title')"
                :description="$t('share.content.description')"
                v-tooltip:top="'Telegram'" >
                <i class="bi bi-telegram"></i>
            </ShareNetwork>
            <ShareNetwork
                class="action-button"
                network="messenger"
                url="https://ban-dera.com"
                tag="button"
                :title="$t('share.content.title')"
                v-tooltip:top="'Messenger'" >
                <i class="bi bi-messenger"></i>
            </ShareNetwork>
            <ShareNetwork
                class="action-button"
                network="whatsapp"
                url="https://ban-dera.com"
                tag="button"
                :title="$t('share.content.title')"
                :description="$t('share.content.description')"
                v-tooltip:top="'WhatsApp'" >
                <i class="bi bi-whatsapp"></i>
            </ShareNetwork>
            <ShareNetwork
                class="action-button"
                network="reddit"
                url="https://ban-dera.com"
                tag="button"
                :title="$t('share.content.title')"
                v-tooltip:top="'Reddit'" >
                <i class="bi bi-reddit"></i>
            </ShareNetwork>
        </div>
    </footer>
</template>

<script>
export default {
    name: "Footer"
}
</script>

<style scoped>

</style>
