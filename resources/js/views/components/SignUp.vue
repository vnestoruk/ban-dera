<template>
    <div class="w-100">
        <div class="card ">
            <div class="card-header text-center">
                <h3>{{ $t('authentication.signup') }}</h3>
            </div>
            <div class="card-body">
                <form @submit.prevent="signUp">
                    <div class="mb-3" :class="{ 'invalid': errors && errors.nickname }">
                        <label class="form-label">{{ $t('authentication.nickname')}}<sup>*</sup></label>
                        <input
                            v-model="credentials.nickname"
                            type="text"
                            class="form-control"
                            autocomplete="new-password">

                        <small v-if="errors && errors.nickname">{{ errors.nickname[0] }}</small>
                    </div>
                    <div class="mb-3" :class="{ 'invalid': errors && errors.email }">
                        <label class="form-label">{{ $t('authentication.email') }}</label>
                        <input
                            v-model="credentials.email"
                            type="email"
                            class="form-control"
                            autocomplete="new-password">
                        <small v-if="errors && errors.email">{{ errors.email[0] }}</small>
                    </div>
                    <div class="mb-3" :class="{ 'invalid': errors && errors.password }">
                        <label class="form-label">{{ $t('authentication.password') }}<sup>*</sup></label>
                        <input
                            v-model="credentials.password"
                            type="password"
                            class="form-control"
                            autocomplete="new-password">
                        <small v-if="errors && errors.password">{{ errors.password[0] }}</small>
                    </div>
                    <div class="mb-3" :class="{ 'invalid': errors && errors.password_confiramtion }">
                        <label class="form-label">{{ $t('authentication.password_confirmation') }}<sup>*</sup></label>
                        <input
                            v-model="credentials.password_confirmation"
                            type="password"
                            class="form-control"
                            autocomplete="new-password">
                        <small v-if="errors && errors.password_confirmation">{{ errors.password_confirmation[0] }}</small>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary m-auto">
                            <i class="bi bi-lock me-3"></i>{{ $t('authentication.signup') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <p class="mt-3 text-center">
            {{ $t('authentication.ctaLogin') }} <router-link :to="{ name: 'login' }">{{ $t('authentication.login') }}</router-link>
        </p>
    </div>
</template>

<script>

import AppLayout from "../layouts/AppLayout";
import Logo from "../elements/Logo";
import AuthenticationResource from "../../modules/ajax/api/AuthenticationResource";
import {mapMutations} from "vuex";
export default {
    name: "SingUp",
    components: {Logo, AppLayout},
    data() {
        return {
            credentials: {
                nickname: '',
                email: '',
                password: '',
                password_confirmation: ''
            },
            errors: null
        }
    },
    methods: {
        ...mapMutations('user', {
            setUser: 'SET_USER'
        }),
        signUp() {
            new AuthenticationResource().signUp(this.credentials).then(
                (response) => {
                    this.errors = null;
                    this.setUser(response.data);
                    this.$router.push({ name: 'bunker' });
                }
            ).catch(
                (error) => {
                    this.errors = error.response.data.errors;
                }
            )
        }
    }
}
</script>

<style scoped>

</style>
