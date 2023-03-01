<template>
    <div class="d-inline">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="modal" data-bs-target="#supportProjectModal">
            <i class="bi bi-heart me-2"></i>{{ $t('donation.support.button') }}
        </button>

        <!-- Modal -->
        <div class="modal fade" id="supportProjectModal" tabindex="-1" aria-labelledby="supportProjectModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl">
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
                            <h3>PayPal</h3>
                            <div id="donate-button-container" class="mb-5">
                                <div id="donate-button"></div>
                            </div>
                            <div class="d-flex flex-column align-items-center">
                                <img id="monobank_logo" class="w-50 mb-3" src="img/monobank-logo.svg" alt="">
                                <CopyToClipboard>
                                    <h3 class="d-inline">5375 4115 0677 1430</h3>
                                </CopyToClipboard>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-lg-6">
                                    <h4>Bitcoin</h4>
                                    <QrcodeVue class="qr-code" value="bitcoin:bc1qyh0zurkv7v52sy798tulu98zhqmzejfzqkm2mf" :size="150" level="H"/>
                                    <CopyToClipboard class="mt-3">
                                        <h6 class="d-inline">bc1qyh0zurkv7v52sy798tulu98zhqmzejfzqkm2mf</h6>
                                    </CopyToClipboard>
                                </div>
                                <div class="col-lg-6">
                                    <h4>Ethereum</h4>
                                    <QrcodeVue class="qr-code" value="0xf0AD7E18327b644FF40fBbbA5757bdF3de6AE863" :size="150" level="H"/>
                                    <CopyToClipboard class="mt-3">
                                        <h6 class="d-inline">0xf0AD7E18327b644FF40fBbbA5757bdF3de6AE863</h6>
                                    </CopyToClipboard>
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
import CopyToClipboard from "../../elements/CopyToClipboard";

export default {
    name: "SupportProjectModal",
    components: {CopyToClipboard, QrcodeVue },
    mounted() {
        PayPal.Donation.Button({
            env:'production',
            hosted_button_id:'8KSAFMDP25PY4',
            image: {
                src:'https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif',
                alt:'Donate with PayPal button',
                title:'PayPal - The safer, easier way to pay online!',
            }
        }).render('#donate-button');
    },
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
