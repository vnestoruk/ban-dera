<template>
    <div>
        <button v-if="$store.getters['user/isAuthenticated']" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modalTarget">
            <i class="bi bi-plus-square me-2"></i> {{ $t('add') }}
        </button>
        <router-link v-else class="btn btn-sm btn-primary" :to="{name: 'login'}">
            <i class="bi bi-plus-square me-2"></i> {{ $t('add') }}
        </router-link>
        <div class="modal fade" id="modalTarget" tabindex="-1" aria-labelledby="labelTarget" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="labelTarget">{{ $t('createTargetModal.title') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <!--                        <label for="newTargetUrl" class="form-label">URL<sup>*</sup></label>-->
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
                                    <!--                                <label for="newTargetCategories" class="form-label">Categories<sup>*</sup></label>-->
                                    <div class="dropdown">
                                        <button class="btn btn-primary dropdown-toggle w-100" type="button" id="newTargetCategories" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                                            {{ `${target.categories.length} categories selected` }}
                                        </button>
                                        <ul class="dropdown-menu w-100" aria-labelledby="newTargetCategories">
                                            <li v-for="category in categories" :key="category.key">
                                                <a class="dropdown-item" role="button" :class="{'selected': target.categories.includes(category.id)}" @click="selectCategory(category.id)">{{ $t(`target.categories.${category.key}`) }}</a>
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
                            <i class="bi bi-save me-2"></i> Save
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

export default {
    name: "TargetModal",
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
        this.getCategories();
    },
    methods: {
        getCategories() {
            this.loading = true;
            new CategoryResource().index().then((response) => {
                this.categories = response.data;
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
            new TargetResource().store(this.target).then((response) => {
                Vue.notify({
                    title: 'Thank you!',
                    text: 'Target was saved successfully'
                });
            });
        }
    }
}
</script>

<style scoped>

</style>
