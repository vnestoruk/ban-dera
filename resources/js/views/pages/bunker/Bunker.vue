<template>
    <div v-if="user" class="content-wrapper justify-content-start text-center">
        <h1>{{ $t('bunker.title') }}</h1>
        <h3>{{ $t('bunker.welcome', { nickname: user.nickname}) }}!</h3>
        <button class="btn btn-primary btn-sm" @click="logout"><i class="bi bi-box-arrow-right me-2"></i>
            {{ $t('authentication.logout') }}
        </button>
        <div class="container flex-grow-1 mt-3">
            <div class="row">
                <div class="col-md-3">
                    <div class="card w-100">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h3 class="flex-grow-1 text-center">{{ $t('bunker.online') }}: {{ $store.getters['app/activeUsers'].length }}</h3>
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled bunker-users-list m-0">
                                <li v-for="user in $store.getters['app/activeUsers']" :key="user.id">
                                    {{ user.nickname | filterNickname }} <i v-if="user.roles.includes('admin') || user.roles.includes('moderator')" class="bi bi-patch-check-fill"></i>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="card w-100">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h3 class="flex-grow-1 text-center">{{ $t('bunker.chat.title') }}</h3>
                        </div>
                        <div class="card-body">
                            <div class="bunker-chat-container">
                                {{ $t('bunker.chat.comingSoon') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {mapActions, mapGetters} from "vuex";
import TargetResource from "../../../modules/ajax/api/TargetResource";
import AuthenticationResource from "../../../modules/ajax/api/AuthenticationResource";

export default {
    name: "Bunker",
    data() {
        return {

        }
    },
    computed: {
        ...mapGetters('user', ['user'])
    },
    methods: {
        ...mapActions('user', {
            _logout: 'logout'
        }),
        logout() {
            new AuthenticationResource().logOut()
                .then(response => {
                    this._logout();
                    this.$router.push({ name: 'login' });
                });
        }
    },
    mounted() {

    }
}
</script>

<style scoped>

</style>
