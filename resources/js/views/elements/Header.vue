<template>
    <div class="header">
        <div class="d-flex justify-content-between mt-3">
            <ThemeToggle/>
            <LocalePicker/>
        </div>
    </div>
</template>

<script>
import ThemeToggle from "./ThemeToggle";
import LocalePicker from "./LocalePicker";

export default {
    name: "Header",
    components: {ThemeToggle, LocalePicker}
}
</script>

<style scoped>

</style>
