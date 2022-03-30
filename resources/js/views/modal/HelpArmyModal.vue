<template>
    <div class="d-inline">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="modal" data-bs-target="#helpArmyModal">
            <i class="bi bi-shield-check me-2"></i>{{ $t('donation.army.button') }}
        </button>

        <!-- Modal -->
        <div class="modal fade" id="helpArmyModal" tabindex="-1" aria-labelledby="helpArmyModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
<!--                        <h5 class="modal-title" id="helpArmyModalLabel">{{ $t('donation.army.title') }}</h5>-->
                        <div class="nav nav-pills mx-3" id="v-pills-tab" role="tablist">
                            <button class="nav-link active" id="v-pills-uah-tab" data-bs-toggle="pill" data-bs-target="#v-pills-uah" type="button" role="tab" aria-controls="v-pills-uah" aria-selected="true">UAH</button>
                            <button class="nav-link" id="v-pills-usd-tab" data-bs-toggle="pill" data-bs-target="#v-pills-usd" type="button" role="tab" aria-controls="v-pills-usd" aria-selected="false">USD</button>
                            <button class="nav-link" id="v-pills-eur-tab" data-bs-toggle="pill" data-bs-target="#v-pills-eur" type="button" role="tab" aria-controls="v-pills-eur" aria-selected="false">EUR</button>
                            <button class="nav-link" id="v-pills-gbp-tab" data-bs-toggle="pill" data-bs-target="#v-pills-gbp" type="button" role="tab" aria-controls="v-pills-gbp" aria-selected="false">GBP</button>
                            <button class="nav-link" id="v-pills-pln-tab" data-bs-toggle="pill" data-bs-target="#v-pills-pln" type="button" role="tab" aria-controls="v-pills-pln" aria-selected="false">PLN</button>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row p-3">
                            <div class="col-lg-8">
                                <div class="d-flex flex-column align-items-start">

                                    <div class="tab-content flex-grow-1 text-start" id="v-pills-tabContent">
                                        <div class="tab-pane fade show active" id="v-pills-uah" role="tabpanel" aria-labelledby="v-pills-uah-tab">
                                            <CopyToClipboard>
                                                <p>
                                                    <strong>Bank:</strong> National Bank of Ukraine;<br>
                                                    <strong>MFO</strong> 300001;<br>
                                                    <strong>Account No.</strong> UA843000010000000047330992708;<br>
                                                    <strong>EDRPOU Code</strong> 00032106;<br>
                                                    <strong>Payee:</strong> National Bank of Ukraine;<br>
                                                </p>
                                            </CopyToClipboard>
                                        </div>
                                        <div class="tab-pane fade" id="v-pills-usd" role="tabpanel" aria-labelledby="v-pills-usd-tab">
                                            <CopyToClipboard>
                                                <p>
                                                    <strong>BENEFICIARY:</strong> National Bank of Ukraine;<br>
                                                    <strong>BENEFICIARY BIC:</strong> NBUA UA UX;<br>
                                                    <strong>BENEFICIARY ADDRESS:</strong> 9 Instytutska St, Kyiv, 01601, Ukraine;<br>
                                                    <strong>ACCOUNT NUMBER:</strong> 400807238;<br>
                                                    <strong>BENEFICIARY BANK NAME:</strong> JP MORGAN CHASE BANK, New York;<br>
                                                    <strong>BENEFICIARY BANK BIC:</strong> CHASUS33;<br>
                                                    ABA 0210 0002 1
                                                    <strong>BENEFICIARY BANK ADDRESS:</strong> 383 Madison Avenue, New York, NY 10017, USA;<br>
                                                    <strong>PURPOSE OF PAYMENT:</strong> for crediting account 47330992708;<br>
                                                </p>
                                            </CopyToClipboard>
                                        </div>
                                        <div class="tab-pane fade" id="v-pills-eur" role="tabpanel" aria-labelledby="v-pills-eur-tab">
                                            <CopyToClipboard>
                                                <p>
                                                    <strong>BENEFICIARY:</strong> National Bank of Ukraine;<br>
                                                    <strong>BENEFICIARY BIC:</strong> NBUAUAUXXXX;<br>
                                                    <strong>IBAN</strong> DE05504000005040040066;<br>
                                                    <strong>PURPOSE OF PAYMENT:</strong> for crediting account 47330992708;<br>
                                                    <strong>BENEFICIARY BANK NAME:</strong> DEUTSCHE  BUNDESBANK, Frankfurt;<br>
                                                    <strong>BENEFICIARY BANK BIC:</strong> MARKDEFF;<br>
                                                    <strong>BENEFICIARY BANK ADDRESS:</strong> Wilhelm-Epstein-Strasse 14, 60431 Frankfurt Am Main, Germany;<br>
                                                </p>
                                            </CopyToClipboard>
                                        </div>
                                        <div class="tab-pane fade" id="v-pills-gbp" role="tabpanel" aria-labelledby="v-pills-gbp-tab">
                                            <CopyToClipboard>
                                                <p>
                                                    <strong>BENEFICIARY/RECIPIENT NAME:</strong> National Bank of Ukraine;<br>
                                                    <strong>ACCOUNT NUMBER:</strong> GB52CHAS60924280033041;<br>
                                                    <strong>BENEFICIARY ADDRESS:</strong> 9 Instytutska St, Kyiv, 01601, Ukraine;<br>
                                                    <strong>BENEFICIARY BANK NAME:</strong> JP MORGAN CHASE BANK NA, London;<br>
                                                    <strong>BENEFICIARY BANK BIC:</strong> CHASGB2L;<br>
                                                    <strong>SORT CODE:</strong> 60-92-42;<br>
                                                    <strong>BENEFICIARY BANK ADDRESS:</strong> 125 London Wall, London EC2Y 5AJ, UK;<br>
                                                    <strong>REFERENCE FOR CREDITING ACCOUNT:</strong> 47330992708;<br>
                                                </p>
                                            </CopyToClipboard>
                                        </div>
                                        <div class="tab-pane fade" id="v-pills-pln" role="tabpanel" aria-labelledby="v-pills-pln-tab">
                                            <CopyToClipboard>
                                                <p>
                                                    <strong>BENEFICIARY:</strong> National Bank of Ukraine;<br>
                                                    <strong>BENEFICIARY BIC:</strong> NBUA UA UX;<br>
                                                    <strong>BENEFICIARY ADDRESS:</strong> 9 Instytutska St, Kyiv, 01601, Ukraine;<br>
                                                    <strong>ACCOUNT NUMBER:</strong> PL91113000070080239435200002;<br>
                                                    <strong>BENEFICIARY BANK NAME:</strong> Bank Gospodarstwa Krajowego;<br>
                                                    <strong>BENEFICIARY BANK BIC:</strong> GOSKPLPW;<br>
                                                    <strong>BENEFICIARY BANK ADDRESS:</strong> Al. Jerozolimskie 7, 00-955 Warszawa, Polska (temporary address: Chmielna 73, 00-801 Warszawa, Polska);<br>
                                                    <strong>PURPOSE OF PAYMENT:</strong> for crediting account 47330992708;<br>
                                                </p>
                                            </CopyToClipboard>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <a href="https://savelife.in.ua/en/donate/" target="_blank">
                                    <QrcodeVue class="qr-code" value="https://savelife.in.ua/en/donate/" :size="200" level="H"/>
                                </a>
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
import CopyToClipboard from "../elements/CopyToClipboard";

export default {
    name: "HelpArmyModal",
    components: {CopyToClipboard, QrcodeVue }
}
</script>

<style scoped>

</style>
