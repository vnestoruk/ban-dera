<template>
    <div class="header container-fluid">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid align-content-center gap-2">
                <RouterLink class="navbar-brand" :to="{ name: 'index' }">
                    <svg height="1.5em" version="1.1" viewBox="0 0 100 16.667" xmlns="http://www.w3.org/2000/svg">
                        <g transform="matrix(1.0417 0 0 1.0952 -2.0833 -90.932)" aria-label="Ban-DERA" style="fill: var(--color-text)">
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
                <div class="d-flex flex-row-reverse flex-lg-row">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="bi bi-grid"></i>
                    </button>
                    <ThemeToggle class="nav-link"/>
                </div>


                <div class="collapse navbar-collapse justify-content-lg-end" id="navbarSupportedContent">
                    <ul class="navbar-nav align-content-center gap-2">
                        <li class="nav-item">
                            <RouterLink class="nav-link" :to="{ name: 'index' }">{{ $t('navigation.index') }}</RouterLink>
                        </li>
                        <li class="nav-item">
                            <RouterLink class="nav-link" :to="{ name: 'bunker' }">{{ $t('navigation.bunker') }}</RouterLink>
                        </li>
                        <li class="nav-item">
                            <RouterLink class="nav-link" :to="{ name: 'guide'}">{{ $t('navigation.instructions') }}</RouterLink>
                        </li>
                        <li class="nav-item">
                            <RouterLink class="nav-link" :to="{ name: 'about'}">{{ $t('navigation.about') }}</RouterLink>
                        </li>
                        <li class="nav-item">
                            <LocalePicker class="nav-link"/>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</template>

<script>
import ThemeToggle from "./ThemeToggle";
import LocalePicker from "./LocalePicker";
import Logo from "./Logo";

export default {
    name: "Header",
    components: {Logo, LocalePicker, ThemeToggle}
}
</script>

<style scoped>

</style>
