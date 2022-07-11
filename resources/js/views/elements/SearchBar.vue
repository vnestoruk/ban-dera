<template>
    <div class="btn-group" role="group">
        <div class="input-group input-group-sm">
            <span class="input-group-text" id="addon-wrapping">
                <i class="bi bi-search"></i>
            </span>
            <input v-model="content" type="text" class="form-control" :placeholder="$t('search')">
            <button v-if="content.length > 0" type="button" class="position-absolute end-0 btn bg-transparent" style="z-index: 100;" @click="clear">
                <i class="bi bi-x"></i>
            </button>
        </div>
    </div>
</template>

<script>
export default {
    name: "SearchBar",
    props: {
        value: String,
        delay: {
            type: Number,
            default: 800
        }
    },
    data() {
        return {
            timeout: null,
            content: this.value
        }
    },
    watch: {
        content: function (val) {
            if (this.timeout) {
                clearTimeout(this.timeout);
                this.timeout = null;
            }

            this.timeout = setTimeout(() => {
                this.$emit('input', val);
            }, this.delay);
        }
    },
    methods: {
        clear() {
            this.content = '';
        }
    }
}
</script>

<style scoped>

</style>
