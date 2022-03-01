<template>
    <div class="d-inline">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#helpArmyModal">
            {{ $t('helpArmy') }}
        </button>

        <!-- Modal -->
        <div class="modal fade" id="helpArmyModal" tabindex="-1" aria-labelledby="helpArmyModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="helpArmyModalLabel">{{ $t('helpArmy') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" v-html="$t('armyBankAccount')"></div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "HelpArmyModal"
}
</script>

<style scoped>

</style>
