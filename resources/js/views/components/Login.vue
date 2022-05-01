<template>
    <div class="w-100">
        <div class="card">
            <div class="card-header text-center">
                <h3>Вхід</h3>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label class="form-label">Пароль</label>
                    <input type="password" class="form-control">
                </div>
                <div class="d-flex justify-content-center">
                    <button class="btn btn-primary  m-auto">
                        <i class="bi bi-lock me-3"></i>Увійти
                    </button>
                </div>
            </div>
        </div>
        <p class="mt-3 text-center">
            Ще без облікового запису? <router-link :to="{ name: 'signup' }">Реєстрація</router-link>
        </p>
    </div>
</template>

<script>

import AppLayout from "../layouts/AppLayout";
import Logo from "../elements/Logo";
export default {
    name: "Login",
    components: {Logo, AppLayout},
}
</script>

<style scoped>

</style>
