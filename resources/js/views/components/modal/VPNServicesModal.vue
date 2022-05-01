<template>
    <div class="d-inline">
        <!-- Button trigger modal -->
        <a href="javascript:void(0);" class="btn btn-sm btn-grey" data-bs-toggle="modal" data-bs-target="#vpnServicesModal">
            <i class="bi bi-info-circle me-2"></i> {{ $t('vpnServices.title') }}
        </a>

        <!-- Modal -->
        <div class="modal fade" id="vpnServicesModal" tabindex="-1" aria-labelledby="vpnServicesModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content text-start">
                    <div class="modal-header">
                        <h5 class="modal-title" id="vpnServicesModalLabel">{{ $t('vpnServices.title') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row table-container">
                            <table class="text-center">
                                <thead>
                                <tr>
                                    <td>{{ $t('vpnServices.table.title') }}</td>
                                    <td>{{ $t('vpnServices.table.hasRussiaServers') }}</td>
                                    <td>{{ $t('vpnServices.table.isFree') }}</td>
                                    <td>{{ $t('vpnServices.table.demo') }}</td>
                                    <td>{{ $t('vpnServices.table.description') }}</td>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="(service, index) in $t('vpnServices.services')" :key="index">
                                    <td><a :href="service[1]" target="_blank">{{ service[0] }}</a></td>
                                    <td><i v-if="service[2] !== null" class="bi" :class="service[2] ? 'bi-plus-circle text-success' : 'bi-x-circle text-danger'"></i></td>
                                    <td><i v-if="service[3] !== null" class="bi" :class="service[3] ? 'bi-plus-circle text-success' : 'bi-x-circle text-danger'"></i></td>
                                    <td><i v-if="service[4] !== null" class="bi" :class="service[4] ? 'bi-plus-circle text-success' : 'bi-x-circle text-danger'"></i></td>
                                    <td>{{ service[5] }}</td>
                                </tr>
                                </tbody>
                            </table>
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
    name: "VPNServicesModal",
    components: {CopyToClipboard, QrcodeVue }
}
</script>

<style scoped>

</style>
