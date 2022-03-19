<template>
    <div id="preloader" class="show">
        <h3>Завантаження...</h3>
    </div>
</template>

<script>
export default {
    name: "Preloader",
    methods: {
        close() {
            window.document.getElementById('preloader').classList.remove('show');
        }
    }
}
</script>

<style scoped>

</style>
