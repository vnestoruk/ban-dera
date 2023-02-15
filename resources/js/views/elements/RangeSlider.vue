<template>
    <input type="range" class="form-range" :min="min" :max="max" v-model="range" @mouseup="submit()">
</template>

<script>
export default {
    name: "RangeSlider",
    props: {
        value: String,
        min: {
            value: Number,
            default: 0
        },
        max: {
            value: Number,
            default: 100
        }
    },
    data() {
        return {
            range: this.value
        }
    },
    methods: {
        submit() {
            this.$emit('input', parseInt(this.range));
        }
    }
}
</script>

<style scoped>

</style>
