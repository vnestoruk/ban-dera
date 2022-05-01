<template>
    <div class="container">

        <slot></slot>

    </div>
</template>

<script>
import Header from "../elements/Header";
import Footer from "../elements/Footer";

export default {
    name: "AppLayout",
    components: {Header, Footer}
}
</script>

<style scoped>

</style>
