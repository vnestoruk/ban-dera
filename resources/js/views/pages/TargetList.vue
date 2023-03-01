<template>
    <div class="content-wrapper">
        <div class="container">
            <div class="card w-100">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="flex-grow-1 text-center">{{ $t('targetList.title') }}</h3>
                    <SearchBar v-model="filter.keyword" :delay="1000" />
                    <TargetModal class="ms-2" :suggest="filter.keyword"/>
                </div>
                <div class="card-body position-relative" :class="{ loading }">
                    <div class="loading-layer">
                        <h3>{{ $t('loading') }}...</h3>
                    </div>
                    <table v-if="targets.length" class="table target-list">
                        <thead>
                        <tr>
                            <th>{{ $t('targetList.table.url') }}</th>
                            <th class="d-none d-md-table-cell">{{ $t('targetList.table.category') }}</th>
                            <th class="d-none d-md-table-cell">{{ $t('targetList.table.suggestedBy') }}</th>
                            <th>{{ $t('targetList.table.status') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="target in targets" :key="target.id" @click.stop="openTargetInfo(target.id)">
                            <td>
                                <span>{{ target.url }}</span>
                            </td>
                            <td class="d-none d-md-table-cell">
                                <template v-if="target.categories.length === 0">
                                    <div class="badge badge-primary">{{ $t('target.categories.other') }}</div>
                                </template>
                                <template v-else>
                                    <div class="badge badge-primary">{{ $t(`target.categories.${ target.categories[0] }`) }}</div>
                                    <div v-if="target.categories.length > 1" class="badge badge-secondary"
                                         v-tooltip:right="target.categories.map(c => $t(`target.categories.${c}`)).join(', ')">+{{ target.categories.length - 1 }}</div>
                                </template>
                            </td>
                            <td class="d-none d-md-table-cell">
                                <RouterLink v-if="target.suggested_by" :to="{ name: 'index' }">
                                    <div class="badge badge-secondary">{{ target.suggested_by.nickname | filterNickname }}</div>
                                </RouterLink>
                            </td>
                            <td class="target-status">
                                <i class="me-2 bi bi-patch-check-fill" :class="{'inactive': !target.approved}" v-tooltip:top="$t('targetList.statuses.approved')"></i>
                                <i class="me-2 bi bi-lightning-fill" :class="{'inactive': !target.under_attack}" v-tooltip:top="$t('targetList.statuses.underAttack')"></i>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <div v-else class="d-flex justify-content-center">
                        <h4 class="my-5">{{ $t('targetList.notFound') }}</h4>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-between align-items-center">
                    <span>{{ $t(
                        'targetList.pagination.showing', {
                            from: (meta.from || 0),
                            to: (meta.to || 0),
                            total: meta.total
                        }) }}</span>
                    <Paginator v-model="filter.page" :links="meta.links" />
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import TargetResource from "../../modules/ajax/api/TargetResource";
import SearchBar from "../elements/SearchBar";
import Paginator from "../elements/Paginator";
import TargetModal from "../components/modal/TargetModal";

export default {
    name: "TargetList",
    components: {TargetModal, Paginator, SearchBar},
    data() {
        return {
            loading: true,
            targets: [],
            meta: {
                from: 0,
                to: 0,
                total: 0,
                links: []
            },
            filter: {
                keyword: '',
                page: null
            }
        }
    },
    mounted() {
        this.getTargets();
    },
    watch: {
        filter: {
            handler: function (newVal, oldVal) {
                this.getTargets(newVal);
            },
            deep: true
        }
    },
    methods: {
        getTargets() {
            this.loading = true;
            new TargetResource().getTargets(this.filter).then((response) => {
                this.targets = response.data;
                this.meta = response.meta;
                this.loading = false;
            });
        },
        openTargetInfo(id) {
            this.$router.push({ name : 'target', params: { id } });
        }
    }
}
</script>

<style lang="scss" scoped>
.loading-layer {
    display: none;
}

.loading {
    .loading-layer {
        position: absolute;
        inset: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        background: var(--color-bg);
        color: var(--color-text);
        filter: opacity(0.8);
        backdrop-filter: blur(3px) grayscale(1);
    }
}

</style>
