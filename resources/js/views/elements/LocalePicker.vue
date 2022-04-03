<template>
    <div class="dropdown">
        <a class="dropdown-toggle" href="#" id="dropdownLocalePickerLink" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-globe2 me-2"></i>{{ $t('locale') }}
        </a>

        <ul class="dropdown-menu" aria-labelledby="dropdownLocalePickerLink">
            <li><a href="javascript:void(0);" @click="setLocale('uk')"> <img :src="'../../img/flags/ua.svg'" alt="" class="flag">Українська</a></li>
            <li><a href="javascript:void(0);" @click="setLocale('en')"> <img :src="'../../img/flags/gb.svg'" alt="" class="flag">English</a></li>
            <li><a href="javascript:void(0);" @click="setLocale('fr')"> <img :src="'../../img/flags/fr.svg'" alt="" class="flag">Français</a></li>
            <li><a href="javascript:void(0);" @click="setLocale('es')"> <img :src="'../../img/flags/es.svg'" alt="" class="flag">Español</a></li>
            <li><a href="javascript:void(0);" @click="setLocale('pl')"> <img :src="'../../img/flags/pl.svg'" alt="" class="flag">Polski</a></li>
        </ul>
    </div>
</template>

<script>
export default {
    name: "LocalePicker",
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
