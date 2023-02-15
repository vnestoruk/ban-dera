import { useSound } from '@vueuse/sound';
import sfxNewUser from '../../../sfx/new-user.mp3';
import sfxNotification from '../../../sfx/notification.mp3';
import sfxTargetUpdated from '../../../sfx/target-updated.mp3';
import sfxError from '../../../sfx/error.mp3';
import {mapGetters} from "vuex";

export default {
    setup() {
        const sfx = {
            newUser: useSound(sfxNewUser),
            notification: useSound(sfxNotification),
            targetUpdated: useSound(sfxTargetUpdated),
            error: useSound(sfxError),
        }
        return { sfx }
    },
    computed: {
        ...mapGetters('app', ['sounds'])
    },
    methods: {
        sfxPlay(sfx) {
            // if(this.sounds) sfx.play();
        }
    }
}
