<template>
    <div v-if="$store.getters['user/isAdmin'] || $store.getters['user/isModerator']">
        <button v-if="targetId" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#modalTarget">
            <i class="bi bi-pencil-square me-2"></i> {{ $t('edit') }}
        </button>
        <button v-else class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modalTarget" @click="checkSuggestion">
            <i class="bi bi-plus-square me-2"></i> {{ $t('suggest') }}
        </button>
        <div class="modal fade" id="modalTarget" tabindex="-1" aria-labelledby="labelTarget" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="labelTarget">{{ targetId ? target.url : $t('targetModal.title') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <div class="input-group mb-3">
                                <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ target.secure ? 'https://' : 'http://' }}</button>
                                <ul class="dropdown-menu">
                                    <li><a role="button" class="dropdown-item" @click="target.secure = false">http://</a></li>
                                    <li><a role="button" class="dropdown-item" @click="target.secure = true">https://</a></li>
                                </ul>
                                <input
                                    id="newTargetUrl"
                                    v-model="target.url"
                                    type="text"
                                    class="form-control">
                            </div>
                            <small v-if="errors && errors.url">{{ errors.url[0] }}</small>
                        </div>


                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <div class="dropdown">
                                        <button class="btn btn-primary dropdown-toggle w-100" type="button" id="newTargetCategories" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                                            {{ $t('targetModal.categoriesPlaceholder', {n: target.categories.length}) }}
                                        </button>
                                        <ul class="dropdown-menu w-100" aria-labelledby="newTargetCategories">
                                            <li v-for="category in categories" :key="category">
                                                <a class="dropdown-item" role="button" :class="{'selected': target.categories.includes(category)}" @click="selectCategory(category)">{{ $t(`target.categories.${category}`) }}</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <small v-if="errors && errors.categories">{{ errors.categories[0] }}</small>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" @click="save()">
                            <i class="bi bi-save me-2"></i> {{ $t('save') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import CategoryResource from "../../../modules/ajax/api/CaregoryResource";
import TargetResource from "../../../modules/ajax/api/TargetResource";
import Vue from "vue";
import i18n from "../../../modules/i18n";

export default {
    name: "TargetModal",
    props: {
        targetId: null,
        suggest: ''
    },
    data() {
        return {
            categories: [],
            errors: [],
            target: {
                secure: false,
                url: '',
                categories: []
            }
        }
    },
    beforeMount() {
        if (this.$props.targetId) {
            new TargetResource().getTargetById(this.$props.targetId).then((response) => {
                this.target = response.data;
            });
        }
        this.getCategories();
    },
    methods: {
        checkSuggestion() {
            if (this.$props.suggest.length) {
                this.target.url = this.$props.suggest;
            }
        },
        getCategories() {
            this.loading = true;
            new CategoryResource().index().then((response) => {
                console.log(response)
                this.categories = response;
            }).then(() => {
                this.loading = false;
            });
        },
        selectCategory(categoryId) {
            this.target.categories.includes(categoryId)
                ? this.target.categories.splice(this.target.categories.indexOf(categoryId), 1)
                : this.target.categories.push(categoryId);

        },
        save() {
            let resource;
            if (this.$props.targetId) {
                resource = new TargetResource().update(this.target);
            } else {
                resource = new TargetResource().store(this.target);
            }

            resource.then((response) => {
                Vue.notify({
                    title: i18n.t('notification.title.success'),
                    text: $t('target.notification.saved')
                });
            }).catch((e) => {
                if (e.response.status === 422) {
                    Vue.notify({
                        title: i18n.t('notification.title.error'),
                        text: $t('target.notification.duplicated')
                    });
                }
            });

        },
    }
}
</script>

<style scoped>

</style>
