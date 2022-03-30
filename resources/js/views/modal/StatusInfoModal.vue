<template>
    <div class="d-inline">
        <!-- Button trigger modal -->
        <a href="javascript:void(0);" class="text-secondary" data-bs-toggle="modal" data-bs-target="#statusInfoModal">
            <i class="bi bi-question-circle me-2"></i>{{ $t('statusInfo.button') }}
        </a>

        <!-- Modal -->
        <div class="modal fade" id="statusInfoModal" tabindex="-1" aria-labelledby="statusInfoModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content text-start">
                    <div class="modal-header">
                        <h5 class="modal-title" id="statusInfoModalLabel">{{ $t('statusInfo.title') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" v-html="$t('statusInfo.content')"></div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "StatusInfoModal",
}
</script>

<style scoped>

</style>
