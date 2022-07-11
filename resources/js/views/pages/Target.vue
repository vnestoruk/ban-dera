<template>
    <div class="content-wrapper container">
        <div class="card w-100">
            <div class="card-header d-flex justify-content-start gap-3">
                <button class="btn btn-sm btn-primary" @click="$router.go(-1)">
                    <i class="bi bi-chevron-compact-left me-2"></i> Назад
                </button>
                <h5>{{ target.url }}</h5>
            </div>
            <div class="card-body">

                <table class="table">
                    <thead>
                    <tr>
                        <th>Точка доступу</th>
                        <th>ASN</th>
                        <th>Час перевірки</th>
                        <th>Час відповіді сервера</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="(status, index) in target.status" :key="index">
                        <td>
                            <div v-if="status.is_down" class="badge badge-secondary" v-tooltip:top="status.status_code + ' - ' + status.message">Offline</div>
                            <div v-else class="badge badge-primary" v-tooltip:top="status.status_code + ' - ' + status.message">Online</div>
                            <img v-if="status.node.location" :src="'../../img/flags/' + status.node.location.iso + '.svg'" alt="" class="flag mx-3">{{ status.node.location.country }}, {{ status.node.location.city }}
                        </td>
                        <td>
                            {{ status.node.asn }}
                        </td>
                        <td>
                            {{ status.last_checked | filterDateTime }}
                        </td>
                        <td>
                            {{ status.response_time }}s
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</template>

<script>
import TargetResource from "../../modules/ajax/api/TargetResource";

export default {
    name: "Target",
    props: {
        id: {
            required: true
        }
    },
    data() {
        return {
            target: {}
        }
    },
    async beforeMount() {
        await new TargetResource().getTargetById(this.id).then((response) => {
            this.target = response.data;
        });
    }
}
</script>

<style scoped>

</style>
