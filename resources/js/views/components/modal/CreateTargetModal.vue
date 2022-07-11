<template>
    <div class="modal fade" id="modalCreateTarget" tabindex="-1" aria-labelledby="labelCreateTarget" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="labelCreateTarget">Нова ціль</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-floating mb-3">
                                <v-select
                                    id="newTargetSecure"
                                    v-model="target.secure"
                                    :options="secure"
                                    :searchable="false"
                                    :close-on-select="false"
                                    label="title"
                                    multiple />
                                <label v-if="!target.secure || !target.secure.length" for="newTargetSecure" class="form-label">Secure<sup>*</sup></label>
                                <small v-if="errors && errors.categories">{{ errors.categories[0] }}</small>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-floating mb-3">
                                <input
                                    id="newTargetUrl"
                                    v-model="target.url"
                                    type="text"
                                    class="form-control"
                                    :placeholder="$t('authentication.password')"
                                    autocomplete="new-password">
                                <label for="newTargetUrl" class="form-label">URL<sup>*</sup></label>
                                <small v-if="errors && errors.url">{{ errors.url[0] }}</small>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-floating mb-3">
                                <v-select
                                    id="newTargetCategories"
                                    v-model="target.categories"
                                    :options="categories"
                                    :searchable="false"
                                    :close-on-select="false"
                                    label="title"
                                    multiple />
                                <label v-if="!target.categories || !target.categories.length" for="newTargetCategories" class="form-label">Category<sup>*</sup></label>
                                <small v-if="errors && errors.categories">{{ errors.categories[0] }}</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">
                        <i class="bi bi-check-square me-2"></i> Save
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import CategoryResource from "../../../modules/ajax/api/CaregoryResource";

export default {
    name: "CreateTargetModal",
    data() {
        return {
            secure: [
                {
                    value: false,
                    title: 'http'
                },
                {
                    value: true,
                    title: 'https'
                }
            ],
            categories: [],
            errors: [],
            target: {

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
                this.loading = false;
            });
        },
    }
}
</script>

<style scoped>

</style>
