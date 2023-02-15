<template>
    <div v-if="user" class="content-wrapper justify-content-start text-center">
        <h1>Криївка</h1>
        <h3>Бажаю здоров'я, {{ user.nickname }}!</h3>
        <button class="btn btn-primary btn-sm" @click="logout"><i class="bi bi-box-arrow-right me-2"></i>
            Вийти
        </button>
        <div class="container flex-grow-1 mt-3">
            <div class="row">
                <div class="col-md-4">
                    <div class="card w-100">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h3 class="flex-grow-1 text-center">Online: {{ $store.getters['app/activeUsers'].length }}</h3>
                        </div>
                        <div class="card-body">
                            <table class="table text-start">
                                <thead>
                                <tr>
                                    <th>Nickname</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="user in $store.getters['app/activeUsers']" :key="user.id">
                                    <td>
                                        {{ user.nickname | filterNickname }} <i class="bi bi-patch-check-fill"></i>
                                    </td>
                                    <td>
                                        <i class="bi bi-power"></i>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card w-100">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h3 class="flex-grow-1 text-center">Chat (Online: {{ $store.getters['app/activeUsers'].length }})</h3>
                        </div>
                        <div class="card-body">
                            <table class="table text-start">
                                <thead>
                                <tr>
                                    <th>Nickname</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="user in $store.getters['app/activeUsers']" :key="user.id">
                                    <td>
                                        <i class="bi bi-circle-fill text-warning"></i> {{ user.nickname | filterNickname }} <i class="bi bi-patch-check-fill"></i>
                                    </td>
                                    <td>
                                        <i class="bi bi-power"></i>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <!--                            <ul class="list-unstyled">-->
                            <!--                                <li v-for="user in $store.getters['app/activeUsers']" :key="user.id">{{ user.nickname | filterNickname }}</li>-->
                            <!--                            </ul>-->
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
