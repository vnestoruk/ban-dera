<template>
    <div class="w-100">
        <div class="card ">
            <div class="card-header text-center">
                <h3>{{ $t('authentication.signup') }}</h3>
            </div>
            <div class="card-body">
                <form @submit.prevent="signUp">
                    <div class="form-floating mb-3" :class="{ 'invalid': errors && errors.nickname }">
                        <input
                            id="signupNickname"
                            v-model="credentials.nickname"
                            type="text"
                            class="form-control"
                            :placeholder="$t('authentication.nickname')"
                            autocomplete="new-password">
                        <label for="signupNickname" class="form-label">{{ $t('authentication.nickname') }}<sup>*</sup></label>
                        <small v-if="errors && errors.nickname">{{ errors.nickname[0] }}</small>
                    </div>
                    <div class="form-floating mb-3" :class="{ 'invalid': errors && errors.email }">
                        <input
                            id="signupEmail"
                            v-model="credentials.email"
                            type="email"
                            class="form-control"
                            :placeholder="$t('authentication.email')"
                            autocomplete="new-password">
                        <label for="signupEmail" class="form-label">{{ $t('authentication.email') }}</label>
                        <small v-if="errors && errors.email">{{ errors.email[0] }}</small>
                    </div>
                    <div class="form-floating mb-3" :class="{ 'invalid': errors && errors.password }">
                        <input
                            id="signupPassword"
                            v-model="credentials.password"
                            type="password"
                            class="form-control"
                            :placeholder="$t('authentication.password')"
                            autocomplete="new-password">
                        <label for="signupPassword" class="form-label">{{ $t('authentication.password') }}<sup>*</sup></label>
                        <small v-if="errors && errors.password">{{ errors.password[0] }}</small>
                    </div>
                    <div class="form-floating mb-3" :class="{ 'invalid': errors && errors.password_confirmation }">
                        <input
                            id="signupPasswordConfirmation"
                            v-model="credentials.password_confirmation"
                            type="password"
                            class="form-control"
                            :placeholder="$t('authentication.password_confirmation')"
                            autocomplete="new-password">
                        <label for="signupPasswordConfirmation" class="form-label">{{ $t('authentication.password_confirmation') }}<sup>*</sup></label>
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

import AuthenticationResource from "../../modules/ajax/api/AuthenticationResource";
import {mapActions} from "vuex";
export default {
    name: "SingUp",
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
        ...mapActions('user', ['authenticate']),
        signUp() {
            new AuthenticationResource().signUp(this.credentials).then(
                (response) => {
                    this.errors = null;
                    this.authenticate(response.data);
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
