<template>
    <div class="d-inline">
        <a class="btn btn-sm btn-primary" data-bs-toggle="offcanvas" href="#offcanvasTargetsList" role="button" aria-controls="offcanvasTargetsList">
            {{ $t('showTargets') }}
        </a>
        <div class="offcanvas offcanvas-start w-50 text-start" tabindex="-1" id="offcanvasTargetsList" aria-labelledby="offcanvasTargetsListLabel">
            <div class="offcanvas-header align-items-start">
                <div class="d-flex flex-column text-center w-100 me-3">
                    <input class="form-control" v-model="filter" type="text" :placeholder="$t('search')">
                    <div>
                        <p>{{ $t('filter') }}: {{ filteredTargets.length }}</p>
                    </div>
                </div>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ol>
                    <li v-for="i in filteredTargets" :key="i.id">{{ i.url }}</li>
                </ol>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "TargetListOffcanvas",
    props: {
        targets: {
            type: Array,
            required: true
        }
    },
    data() {
        return {
            filter: ''
        }
    },
    computed: {
        filteredTargets() {
            return this.targets.filter(value => {
                return value.url.includes(this.filter);
            })
        }
    }
}
</script>

<style scoped>

</style>
