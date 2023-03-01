<template>
    <div class="content-wrapper about">
        <h1 class="mb-5">{{ $t('about.title') }}</h1>
        <div class="d-flex flex-column align-items-center mb-3">
            <Logo class="w-50 mb-2"/>
            <h6>v.{{ appVersion }} «{{ $t('app.versionTitle') }}»</h6>
        </div>



        <div class="container">
            <div class="row my-2 text-center">
                <div class="d-flex flex-column justify-content-center mb-5">
                    <h4>{{ $t('about.sections.openSource.title') }}</h4>
                    <div>
                        <a href="https://github.com/vnestoruk/ban-dera" target="_blank" class="btn btn-primary w-auto">
                            <i class="bi bi-github me-2"></i> GitHub
                        </a>
                    </div>
                </div>
                <div class="d-flex flex-column justify-content-center mb-5">
                    <h4>{{ $t('donation.support.title') }}</h4>
                    <p v-html="$t('donation.support.content')"></p>
                    <div class="row">
                        <div class="mb-3 mb-lg-0 col-lg-4">
                            <h4>Bitcoin</h4>
                            <CopyToClipboard title="Bitcoin" class="mt-3">
                                <h6 class="d-inline">3DFKUHsG87xs7swq2g9uP2gJDC6K4K7Ldw</h6>
                            </CopyToClipboard>
                            <QrcodeVue class="qr-code" value="bitcoin:3DFKUHsG87xs7swq2g9uP2gJDC6K4K7Ldw" :size="150" level="H"/>
                        </div>
                        <div class="mb-3 mb-lg-0 col-lg-4">
                            <h4>Ethereum</h4>
                            <CopyToClipboard title="Ethereum" class="mt-3">
                                <h6 class="d-inline">0xE2F680781b43E4bEA8345517bcCC5bEAfb68a4D2</h6>
                            </CopyToClipboard>
                            <QrcodeVue class="qr-code" value="0xE2F680781b43E4bEA8345517bcCC5bEAfb68a4D2" :size="150" level="H"/>
                        </div>
                        <div class="mb-3 mb-lg-0 col-lg-4">
                            <h4>USDT (TRC20)</h4>
                            <CopyToClipboard title="USDT (TRC20)" class="mt-3">
                                <h6 class="d-inline">TBRj4eg7SkuCj9V97J4mGNF23CS8VAhTtV</h6>
                            </CopyToClipboard>
                            <QrcodeVue class="qr-code" value="TBRj4eg7SkuCj9V97J4mGNF23CS8VAhTtV" :size="150" level="H"/>
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-column justify-content-center mb-5">
                    <h4>{{ $t('about.sections.share.title') }}</h4>
                    <div class="d-flex justify-content-center gap-2">
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

                </div>
                <div class="d-flex flex-column justify-content-center mb-5">
                    <h4>{{ $t('about.sections.thirdParties.title') }}</h4>
                    <div class="d-flex justify-content-around text-center mt-3">
                        <a href="https://laravel.com" target="_blank">
                            <img height="100" src="img/logos/laravel.svg" alt="Laravel">
                            <h6 class="mt-3">Laravel</h6>
                        </a>
                        <a href="https://vuejs.org/" target="_blank">
                            <img height="100" src="img/logos/vuejs.svg" alt="Vue.js">
                            <h6 class="mt-3">Vue.js</h6>
                        </a>
                        <a href="https://getbootstrap.com/" target="_blank">
                            <img height="100" src="img/logos/bootstrap.svg" alt="Bootstrap">
                            <h6 class="mt-3">Bootstrap</h6>
                        </a>
                    </div>
                </div>

            </div>
        </div>



    </div>
</template>

<script>
import ConfigMixin from "../../modules/mixins/ConfigMixin";
import Logo from "../elements/Logo";
import SupportProjectModal from "../components/modal/SupportProjectModal";
import QrcodeVue from "qrcode.vue";
import CopyToClipboard from "../elements/CopyToClipboard";

export default {
    name: "About",
    components: {SupportProjectModal, Logo, QrcodeVue, CopyToClipboard},
    mixins: [ConfigMixin]
}
</script>

<style scoped>

</style>
