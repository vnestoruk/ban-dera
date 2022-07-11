<template>
    <nav aria-label="Pagination">
        <ul class="pagination pagination-sm">
            <li v-for="link in links"
                class="page-item"
                :class="{ active: link.active, disabled : link.url === null}">
                <button type="button" class="page-link" @click="changePage(link)">
                    {{ link.label }}
                </button>
            </li>
        </ul>
    </nav>
</template>

<script>
export default {
    name: "Paginator",
    props: {
        value: null,
        links: {
            type: Array
        }
    },
    methods: {
        changePage(link) {
            if (link.url !== null) {
                let url = new URL(link.url);
                let page = parseInt(url.searchParams.get('page'));
                if (!isNaN(page)) {
                    this.$emit('input', page);
                }
            }
        }
    }
}
</script>

<style scoped>

</style>
