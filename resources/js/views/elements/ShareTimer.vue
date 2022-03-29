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
                        <CopyToClipboard>
                            <p class="h2">https://ban-dera.com</p>
                        </CopyToClipboard>
                        <ShareNetwork
                            network="telegram"
                            url="https://news.vuejs.org/issues/180"
                            title="Say hi to Vite! A brand new, extremely fast development setup for Vue."
                            description="This week, I’d like to introduce you to 'Vite', which means 'Fast'. It’s a brand new development setup created by Evan You."
                            quote="The hot reload is so fast it\'s near instant. - Evan You"
                            hashtags="ban_dera"
                        >
                            Share on Facebook
                        </ShareNetwork>
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
            let badDay = new Date('07-10-1952');
            return ((new Date() - badDay) / (1000*60*60*24)).toFixed(0);
        }
    }
}
</script>

<style scoped>

</style>
