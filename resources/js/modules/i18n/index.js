import Vue from "vue";
import VueI18n from "vue-i18n";
import store from '../store'
import uk from "./uk"
import en from "./en"
import fr from "./fr"
import es from "./es"
import pl from "./pl"

const DEFAULT_LOCALE = 'uk';

Vue.use(VueI18n);

const messages = {uk, en, fr, es, pl}

export function getLocale() {
    let sl = store.getters['app/locale'];
    const language = sl ? sl : (navigator.language || navigator.browserLanguage).toLowerCase();
    const locales = Object.keys(messages);
    for (const locale of locales) {
        if (language.indexOf(locale) !== -1) {
            store.commit('app/SET_LOCALE', locale);
            return locale;
        }
    }
    store.commit('app/SET_LOCALE', DEFAULT_LOCALE);
    return DEFAULT_LOCALE;
}


const i18n = new VueI18n({
    locale: getLocale(),
    messages,
});

export default i18n;
