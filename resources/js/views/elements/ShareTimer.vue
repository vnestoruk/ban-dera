<template>
    <div class="text-center my-2">
        <p class="m-1">{{ $t('share.timer', { darknessPeriod }) }}</p>
        <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#stopPutinModal">{{ $t('share.stop') }}</a>
        <div class="modal fade" id="stopPutinModal" tabindex="-1" aria-labelledby="stopPutinModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content text-start">
                    <div class="modal-header">
                        <h5 class="modal-title" id="stopPutinModalLabel">{{ $t('share.title') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <CopyToClipboard class="m-5">
                            <p class="h2">https://ban-dera.com</p>
                        </CopyToClipboard>
                        <div class="d-flex align-center justify-content-center gap-2">
                            <ShareNetwork
                                network="facebook"
                                url="https://ban-dera.com"
                                :title="$t('share.content.title')"
                                :description="$t('share.content.description')"
                            >
                                <button class="btn btn-primary" v-tooltip:bottom="'Facebook'">
                                    <i class="bi bi-facebook"></i>
                                </button>
                            </ShareNetwork>
                            <ShareNetwork
                                network="twitter"
                                url="https://ban-dera.com"
                                :title="$t('share.content.title')"
                            >
                                <button class="btn btn-primary" v-tooltip:bottom="'Twitter'">
                                    <i class="bi bi-twitter"></i>
                                </button>
                            </ShareNetwork>
                            <ShareNetwork
                                network="telegram"
                                url="https://ban-dera.com"
                                :title="$t('share.content.title')"
                                :description="$t('share.content.description')"
                            >
                                <button class="btn btn-primary" v-tooltip:bottom="'Telegram'">
                                    <i class="bi bi-telegram"></i>
                                </button>
                            </ShareNetwork>
                            <ShareNetwork
                                network="messenger"
                                url="https://ban-dera.com"
                                :title="$t('share.content.title')"
                            >
                                <button class="btn btn-primary" v-tooltip:bottom="'Messenger'">
                                    <i class="bi bi-messenger"></i>
                                </button>
                            </ShareNetwork>
                            <ShareNetwork
                                network="whatsapp"
                                url="https://ban-dera.com"
                                :title="$t('share.content.title')"
                                :description="$t('share.content.description')"
                            >
                                <button class="btn btn-primary" v-tooltip:bottom="'WhatsApp'">
                                    <i class="bi bi-whatsapp"></i>
                                </button>
                            </ShareNetwork>
                            <ShareNetwork
                                network="reddit"
                                url="https://ban-dera.com"
                                :title="$t('share.content.title')"
                            >
                                <button class="btn btn-primary" v-tooltip:bottom="'Reddit'">
                                    <i class="bi bi-reddit"></i>
                                </button>
                            </ShareNetwork>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
import CopyToClipboard from "./CopyToClipboard";
export default {
    name: "ShareTimer",
    components: {CopyToClipboard},
    computed: {
        darknessPeriod() {
            let badDay = new Date('1952-10-07T00:00:00');
            return ((new Date() - badDay) / (1000*60*60*24)).toFixed(0);
        }
    }
}
</script>

<style scoped>

</style>
