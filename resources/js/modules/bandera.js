class Bandera {
    target = null;
    requests = {
        total: 0,
        success: 0,
        failed: 0,
        strike: 0
    };
    lastCode = null;

    constructor(target) {
        this.target = target;
        return this;
    }

    async run() {
        return fetch(this.target.url + this.getRandomParam(), {
            method: 'GET',
            mode: 'no-cors',
            cache: 'no-cache',
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
                this.lastCode = response.status;
            }
        );
    }

    getRandomParam() {
        return this.requests.total % 3 === 0 ? '' : ('?r=' + Math.random() * 1000);
    }

    getRate() {
        if (this.requests.total === 0) return 0;
        if (this.requests.strike > 50) return 100;
        return (100 * this.requests.failed / this.requests.total);
    }
}

export { Bandera as default }
