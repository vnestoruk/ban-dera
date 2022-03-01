import Vue from "vue";
import VueI18n from "vue-i18n";
import uk from "./uk"
import en from "./en"

const DEFAULT_LOCALE = 'uk';

Vue.use(VueI18n);

const messages = {uk, en}

const i18n = new VueI18n({
    locale: DEFAULT_LOCALE,
    messages,
});

export default i18n;
