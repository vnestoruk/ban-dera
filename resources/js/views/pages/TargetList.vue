<template>
    <div class="content-wrapper target-list">
        <div class="container">
            <div class="card w-100">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <SearchBar v-model="filter.keyword" :delay="1000" />
                    <h3>Список цілей</h3>
                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modalCreateTarget">
                        <i class="bi bi-plus-square me-2"></i> Додати
                    </button>
                    <CreateTargetModal />
                </div>
                <div class="card-body position-relative" :class="{ loading }">
                    <div class="loading-layer">
                        <h3>{{ $t('loading') }}...</h3>
                    </div>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>URL</th>
                            <th class="d-none d-md-table-cell">Category</th>
                            <th class="d-none d-md-table-cell">Health</th>
                            <th class="d-none d-md-table-cell">Suggested By</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="target in targets" :key="target.id" @click="openTargetInfo(target.id)">
                            <td>
                                <span>{{ target.url }}</span>
                            </td>
                            <td class="d-none d-md-table-cell">
                                <template v-if="target.categories.length > 0">
                                    <div v-for="category in target.categories" :key="category" class="badge badge-primary">{{ category }}</div>
                                </template>
                                <template v-else>
                                    <div  class="badge badge-gray">Other</div>
                                </template>
                            </td>
                            <td class="d-none d-md-table-cell">
                                {{ target.health | filterTargetHealth }}
                            </td>
                            <td class="d-none d-md-table-cell">

                                <RouterLink v-if="target.suggested_by" :to="{ name: 'index' }">
                                    <div class="badge badge-secondary">{{ target.suggested_by.nickname | filterNickname }}</div>
                                </RouterLink>
                            </td>
                            <td>
                                <div v-if="target.health > 0.1" class="badge badge-primary">Online</div>
                                <div v-else class="badge badge-gray">Offline</div>
                            </td>

                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer d-flex justify-content-between align-items-center">
                    <h6>Показано цілі {{ meta.from }} - {{ meta.to }} із {{ meta.total }}</h6>
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
import CreateTargetModal from "../components/modal/CreateTargetModal";

export default {
    name: "TargetList",
    components: {CreateTargetModal, Paginator, SearchBar},
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
