<template>
    <div class="locale-picker dropdown">
        <button class="dropdown-toggle action-button" id="dropdownLocalePickerLink" data-bs-toggle="dropdown" aria-expanded="false" aria-label="Locale">
            <i class="bi bi-translate me-2"></i>
            <span class="d-none d-md-inline">{{ $t('locale') }}</span>
            <span class="d-inline d-md-none text-uppercase me-2">{{ locale }}</span>
        </button>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownLocalePickerLink">
            <li>
                <button @click="setLocale('uk')"><img :src="'../../img/flags/ua.svg'" alt="" class="flag">Українська</button>
            </li>
            <li>
                <button @click="setLocale('en')"><img :src="'../../img/flags/gb.svg'" alt="" class="flag">English</button>
            </li>
            <li>
                <button @click="setLocale('fr')"><img :src="'../../img/flags/fr.svg'" alt="" class="flag">Français</button>
            </li>
            <li>
                <button @click="setLocale('es')"><img :src="'../../img/flags/es.svg'" alt="" class="flag">Español</button>
            </li>
            <li>
                <button @click="setLocale('pl')"><img :src="'../../img/flags/pl.svg'" alt="" class="flag">Polski</button>
            </li>
        </ul>
    </div>
</template>

<script>
import {mapGetters} from "vuex";

export default {
    name: "LocalePicker",
    computed: {
        ...mapGetters('app', ['locale'])
    },
    methods: {
        setLocale(locale) {
            this.$store.commit('app/SET_LOCALE', locale);
            this.$root.$i18n.locale = locale;
        }
    }
}
</script>

<style scoped>

</style>
