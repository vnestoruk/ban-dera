<template>
    <div>
        <slot></slot>
        <i class="bi bi-files me-2" @click="copy" :title="$t('copy')"></i>
    </div>
</template>

<script>
export default {
    name: "CopyToClipboard",
    methods: {
        copy() {
            navigator.clipboard.writeText(this.$slots.default[0].elm.innerText).then(function() {
                alert('Copying to clipboard was successful!');
            }, function(err) {
                alert('Could not copy text');
            });
        }
    }
}
</script>

<style scoped>
i {
    cursor: pointer;
}
</style>
