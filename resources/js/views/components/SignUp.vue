<template>
    <div class="w-100">
        <div class="card ">
            <div class="card-header text-center">
                <h3>Реєстрація</h3>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" aria-describedby="emailHelp" autocomplete="new-password">
                </div>
                <div class="mb-3">
                    <label class="form-label">Пароль</label>
                    <input type="password" class="form-control" autocomplete="new-password">
                </div>
                <div class="mb-3">
                    <label class="form-label">Повторити пароль</label>
                    <input type="password" class="form-control" autocomplete="new-password">
                </div>
                <div class="d-flex justify-content-center">
                    <button class="btn btn-primary  m-auto">
                        <i class="bi bi-lock me-3"></i>Зареєструватись
                    </button>
                </div>
            </div>
        </div>
        <p class="mt-3 text-center">
            Вже бан-дерівець? <router-link :to="{ name: 'login' }">Вхід</router-link>
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
