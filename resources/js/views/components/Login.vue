<template>
    <div class="w-100">
        <div class="card">
            <div class="card-header text-center">
                <h3>{{ $t('authentication.login') }}</h3>
            </div>
            <div class="card-body">
                <form @submit.prevent="login()">
                    <div class="form-floating mb-3" :class="{ 'invalid': errors && errors.nickname }">
                        <input
                            id="loginNickname"
                            v-model="credentials.nickname"
                            type="text"
                            class="form-control"
                            :placeholder="$t('authentication.nickname')"
                            autocomplete="new-password">
                        <label for="loginNickname" class="form-label">{{ $t('authentication.nickname') }}<sup>*</sup></label>
                        <small v-if="errors && errors.nickname">{{ errors.nickname[0] }}</small>
                    </div>
                    <div class="form-floating mb-3" :class="{ 'invalid': errors && errors.password }">
                        <input
                            id="loginPassword"
                            v-model="credentials.password"
                            type="password"
                            class="form-control"
                            :placeholder="$t('authentication.password')"
                            autocomplete="new-password">
                        <label for="loginPassword" class="form-label">{{ $t('authentication.password') }}<sup>*</sup></label>
                        <small v-if="errors && errors.password">{{ errors.password[0] }}</small>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary m-auto">
                            <i class="bi bi-lock me-3"></i>{{ $t('authentication.login') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <p class="mt-3 text-center">
            {{ $t('authentication.ctaSignup') }} <router-link :to="{ name: 'signup' }">{{ $t('authentication.signup') }}</router-link>
        </p>
    </div>
</template>

<script>

import Logo from "../elements/Logo";
import AuthenticationResource from "../../modules/ajax/api/AuthenticationResource";
import {mapMutations} from "vuex";
export default {
    name: "Login",
    components: {Logo},
    data() {
        return {
            credentials: {
                nickname: '',
                password: ''
            },
            errors: null
        }
    },
    methods: {
        ...mapMutations('user', {
            setUser: 'SET_USER'
        }),
        login() {
            new AuthenticationResource().logIn(this.credentials).then(
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
