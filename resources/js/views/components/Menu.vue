<template>
    <div class="menu">
        <button
            class="action-button"
            v-tooltip:bottom="(navigationOpened ? 'Close' : 'Open') + ' menu'"
            :key="navigationOpened"
            @click.prevent="toggleNavigation()"
            aria-label="Open menu" >
            <i class="bi" :class="navigationOpened ? 'bi-grid-fill' : 'bi-grid'"></i>
        </button>

        <div class="navigation" :class="{ show: navigationOpened, transition: transition }">
            <div class="nav-item">
                <RouterLink class="nav-link" :to="{ name: 'index' }">{{ $t('navigation.index') }}</RouterLink>
            </div>
            <div class="nav-item">
                <RouterLink class="nav-link" :to="{ name: 'targets' }">{{ $t('navigation.targets') }}</RouterLink>
            </div>
            <div class="nav-item">
                <RouterLink class="nav-link" :to="{ name: 'bunker' }">{{ $t('navigation.bunker') }}</RouterLink>
            </div>
            <div class="nav-item">
                <RouterLink class="nav-link" :to="{ name: 'guide'}">{{ $t('navigation.instructions') }}</RouterLink>
            </div>
            <div class="nav-item">
                <RouterLink class="nav-link" :to="{ name: 'about'}">{{ $t('navigation.about') }}</RouterLink>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Menu",
    data: () => ({
        navigationOpened: false,
        transition: false
    }),
    methods: {
        toggleNavigation(force = null) {
            this.navigationOpened = force ?? !this.navigationOpened;
            this.transition = true;
            if (this.navigationOpened) {
                document.body.classList.add('freeze');
            }
            setTimeout(() => {
                if (!this.navigationOpened) {
                    setTimeout(() => {
                        document.body.classList.remove('freeze');
                    }, 500);

                }
                this.transition = false;
            }, 1000);
        }
    },
    watch: {
        $route: function () {
            this.toggleNavigation(false);
        }
    },
    mounted() {
        document.querySelectorAll('.nav-item').forEach((item, index) => {
            // item.addEventListener('click', (e) => {this.toggleNavigation()})
            item.style.transitionDelay = (index * 0.1) + 's';
        })
    }
}
</script>

<style scoped>

</style>
