<template>
    <div class="content-wrapper about">
        <div class="d-flex flex-column align-items-center mb-3">
            <Logo class="w-50 mb-2"/>
            <h6>v.{{ appVersion }} «{{ $t('app.versionTitle') }}»</h6>
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

        <h1>{{ $t('about.title') }}</h1>

        <div class="container">
            <div class="row my-2 text-center">
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
