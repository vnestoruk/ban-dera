<template>
    <div class="content-wrapper target-list">
        <div class="container">
            <div class="card w-100">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <SearchBar v-model="filter.keyword" :delay="1000" />
                    <h3 class="flex-grow-1 text-center">{{ $t('targetList.title') }}</h3>

                    <TargetModal />
                </div>
                <div class="card-body position-relative" :class="{ loading }">
                    <div class="loading-layer">
                        <h3>{{ $t('loading') }}...</h3>
                    </div>
                    <table class="table">
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
                                    <div class="badge badge-gray">Other</div>
                                </template>
                                <template v-else>
                                    <div class="badge badge-primary">{{ $t(`target.categories.${ target.categories[0].key }`) }}</div>
                                    <div v-if="target.categories.length > 1" class="badge badge-secondary"
                                         v-tooltip:right="target.categories.map(c => $t(`target.categories.${c.key}`)).join(', ')">+{{ target.categories.length - 1 }}</div>
                                </template>
                            </td>
                            <td class="d-none d-md-table-cell">
                                <RouterLink v-if="target.suggested_by" :to="{ name: 'index' }">
                                    <div class="badge badge-secondary">{{ target.suggested_by.nickname | filterNickname }}</div>
                                </RouterLink>
                            </td>
                            <td>
                                <i v-if="target.approved" class="bi bi-patch-check-fill" v-tooltip="'Approved'"></i>
                                <i v-if="target.under_attack" class="bi bi-lightning-fill text-danger" v-tooltip="'Under attack'"></i>
<!--                                <div v-if="target.health > 0.1" class="badge badge-primary">Online</div>-->
<!--                                <div v-else class="badge badge-gray">Offline</div>-->
                            </td>

                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer d-flex justify-content-between align-items-center">
                    <span>{{ $t(
                        'targetList.pagination.showing', {
                            from: meta.from,
                            to: meta.to,
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
