<template>
    <div class="locale-picker dropdown">
        <a class="dropdown-toggle action-button" href="javascript:void(0);" id="dropdownLocalePickerLink" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-translate me-2"></i><span class="d-none d-md-inline">{{ $t('locale') }}</span>
        </a>

        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownLocalePickerLink">
            <li><a href="javascript:void(0);" @click="setLocale('uk')"> <img :src="'../../img/flags/ua.svg'" alt="" class="flag">Українська</a></li>
            <li><a href="javascript:void(0);" @click="setLocale('en')"> <img :src="'../../img/flags/gb.svg'" alt="" class="flag">English</a></li>
            <li><a href="javascript:void(0);" @click="setLocale('fr')"> <img :src="'../../img/flags/fr.svg'" alt="" class="flag">Français</a></li>
            <li><a href="javascript:void(0);" @click="setLocale('es')"> <img :src="'../../img/flags/es.svg'" alt="" class="flag">Español</a></li>
            <li><a href="javascript:void(0);" @click="setLocale('pl')"> <img :src="'../../img/flags/pl.svg'" alt="" class="flag">Polski</a></li>
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
