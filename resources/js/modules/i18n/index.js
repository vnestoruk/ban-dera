import Vue from "vue";
import VueI18n from "vue-i18n";
import uk from "./uk"
import en from "./en"
import ru from "./ru"

const DEFAULT_LOCALE = 'uk';

Vue.use(VueI18n);

const messages = {uk, en, ru}

export function getLocale() {
    const language = (navigator.language || navigator.browserLanguage).toLowerCase();
    const locales = Object.keys(messages);
    for (const locale of locales) {
        if (language.indexOf(locale) !== -1) {
            return locale;
        }
    }
    return DEFAULT_LOCALE;
}


const i18n = new VueI18n({
    locale: getLocale(),
    messages,
});

export default i18n;
