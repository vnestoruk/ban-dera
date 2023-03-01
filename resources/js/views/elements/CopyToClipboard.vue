<template>
    <div class="copy-to-clipboard">
        <slot></slot>
        <button class="btn btn-primary btn-sm copy-btn" @click="copy">
            <i class="bi bi-files me-2"></i>{{ $t('copy') + (title ? ` «${title}»` : '') }}
        </button>
    </div>
</template>

<script>
export default {
    name: "CopyToClipboard",
    props: {
        title: null
    },
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
