<template>
    <header>
        <RouterLink class="brand-logo" :to="{ name: 'index' }">
            <svg height="1.5em" viewBox="0 0 100 16.667" xmlns="http://www.w3.org/2000/svg" aria-label="Ban-DERA">
                <g transform="matrix(1.0417 0 0 1.0952 -2.0833 -90.932)" style="fill: var(--color-text)">
                    <path d="m90.262 87.104 1.575-3.0359 6.1631 11.893h-3.2718zm1.1261 4.0479-2.4424 4.8088h-3.2718l4.124-7.9588z"/>
                    <path d="m76.772 95.961h-3.0435v-7.6088h3.0435zm4.5653-8.3697h-7.6088l-1.5218-2.2826h9.1305q3.8044 0 3.8044 3.0435v0.76088q0 2.4424-2.45 2.9218l2.45 3.9261h-3.8044l-3.8044-6.087h3.8044q0.76088 0 0.76088-0.76088v-0.76088q0-0.76088-0.76088-0.76088z"/>
                    <path d="m72.206 87.591h-10.652l-1.5218-2.2826h12.174zm-10.652 0.76088h3.0435v5.3262h7.6088v2.2826h-10.652zm10.652 3.8044h-4.5653l-2.2826-2.2826h6.8479z"/>
                    <path d="m51.663 95.961h-3.0435v-7.6088h3.0435zm4.5653-8.3697h-7.6088l-1.5218-2.2826h9.1305q3.8044 0 3.8044 3.0435v4.5653q0 3.0435-3.8044 3.0435h-3.8044v-2.2826h3.8044q0.76088 0 0.76088-0.76088v-4.5653q0-0.76088-0.76088-0.76088z"/>
                    <path d="m47.097 92.157h-6.087v-2.2826h6.087z"/>
                    <path d="m28.075 83.026 11.413 11.413v3.8044l-11.413-11.413zm8.3697 7.3044v-5.0218h3.0435v8.0653zm-5.3262 0.6087v5.0218h-3.0435v-8.0653z"/>
                    <path d="m19.652 87.104 1.575-3.0359 6.1631 11.893h-3.2718zm1.1261 4.0479-2.4424 4.8088h-3.2718l4.124-7.9588z"/>
                    <path d="m6.5653 95.961h-3.0435v-7.6088h3.0435zm4.5653-8.3697h-7.6088l-1.5218-2.2826h9.1305q3.8044 0 3.8044 3.0435v0.76088q0 1.1794-0.57066 1.9022 0.57066 0.72284 0.57066 1.9022 0 3.0435-3.8044 3.0435h-3.8044v-2.2826h3.8044q0.76088 0 0.76088-0.76088t-0.76088-0.76088h-3.8044v-2.2826h3.8044q0.76088 0 0.76088-0.76088v-0.76088q0-0.76088-0.76088-0.76088z"/>
                </g>
            </svg>
        </RouterLink>
        <div class="ui-elements">
            <LocalePicker />
            <button
                v-if="$store.getters['user/isAuthenticated']"
                class="action-button"
                @click="$router.push({'name': 'bunker'})">
                <i class="bi bi-person me-2"></i>{{ $store.getters['user/user'].nickname | filterNickname }}
            </button>
<!--            <SoundsToggle class="action-button"/>-->
            <ThemeToggle class="action-button"/>
            <Menu/>
        </div>
    </header>
</template>

<script>
import ThemeToggle from "../elements/ThemeToggle";
import LocalePicker from "../elements/LocalePicker";
import Logo from "../elements/Logo";
import Menu from "./Menu";
import SoundsToggle from "../elements/SoundsToggle";

export default {
    name: "Header",
    components: {SoundsToggle, Menu, Logo, LocalePicker, ThemeToggle}
}
</script>

<style scoped>

</style>
