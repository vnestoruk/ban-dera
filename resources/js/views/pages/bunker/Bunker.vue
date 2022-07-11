<template>
    <div class="content-wrapper text-center">
        <h1>Криївка</h1>
        <h3>Ласкаво просимо, {{ user.nickname }}</h3>
        <button class="btn btn-primary btn-sm" @click="logout"><i class="bi bi-box-arrow-right me-2"></i>
            Вийти
        </button>

    </div>
</template>

<script>
import {mapActions, mapGetters} from "vuex";
import TargetResource from "../../../modules/ajax/api/TargetResource";

export default {
    name: "Bunker",
    data() {
        return {
            targets: []
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
            this.$router.push({ name: 'index' });
            this._logout();
        }
    },
    mounted() {
        new TargetResource().getTargets().then((response) => {
            this.targets = response.data;
        })
    }
}
</script>

<style scoped>

</style>
