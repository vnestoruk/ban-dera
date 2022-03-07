<template>
    <div class="d-inline">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#supportProjectModal">
            <i class="bi bi-heart me-2"></i>{{ $t('donation.support.button') }}
        </button>

        <!-- Modal -->
        <div class="modal fade" id="supportProjectModal" tabindex="-1" aria-labelledby="supportProjectModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="supportProjectModalLabel">{{ $t('donation.support.title') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="d-flex flex-column align-items-center justify-content-between p-3">
                            <div class="text-start" v-html="$t('donation.support.content')">

                            </div>
                            <hr>
                            <div class="d-flex flex-column align-items-center">
                                <img class="w-50 mb-3" src="img/monobank-logo.svg" alt="">
                                <h3>4441 1144 5100 7866</h3>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-around p-2 w-100">
                                <div class="w-50">
                                    <h4>Bitcoin</h4>
                                    <div class="input-group mb-3">
                                        <input
                                            type="text"
                                            class="form-control"
                                            v-on:focus="$event.target.select()"
                                            ref="bitcoin"
                                            readonly
                                            value="bc1qyh0zurkv7v52sy798tulu98zhqmzejfzqkm2mf">
                                        <button class="btn btn-outline-secondary" type="button" @click="copyBitcoin">{{ $t('copy') }}</button>
                                    </div>
                                    <QrcodeVue value="bitcoin:bc1qyh0zurkv7v52sy798tulu98zhqmzejfzqkm2mf" :size="150" level="H"/>
                                </div>
                                <div class="w-50">
                                    <h4>Ethereum</h4>
                                    <div class="input-group mb-3">
                                        <input
                                            type="text"
                                            class="form-control"
                                            v-on:focus="$event.target.select()"
                                            ref="ethereum"
                                            readonly
                                            value="0xf0AD7E18327b644FF40fBbbA5757bdF3de6AE863">
                                        <button class="btn btn-outline-secondary" type="button" @click="copyEthereum">{{ $t('copy') }}</button>
                                    </div>
                                    <QrcodeVue value="0xf0AD7E18327b644FF40fBbbA5757bdF3de6AE863" :size="150" level="H"/>
                                </div>
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
    name: "SupportProjectModal",
    components: { QrcodeVue },
    methods: {
        copyBitcoin() {
            this.$refs.bitcoin.focus();
            document.execCommand('copy');
        },
        copyEthereum() {
            this.$refs.ethereum.focus();
            document.execCommand('copy');
        }
    }
}
</script>

<style scoped>

</style>
