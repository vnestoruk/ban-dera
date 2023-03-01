class WorkerWrapper {

    static path = "/js/workers/bandera.js";

    target = null;
    worker = null;
    analytics = {};

    constructor(target, interval) {
        this.target = target;
        this.worker = new Worker(WorkerWrapper.path);

        this.worker.onmessage = (e) => {
            this.analytics = e.data;
        }

        this.worker.postMessage({
            target,
            interval
        });
    }

    start() {
        this.worker.postMessage({
            action: 'start'
        });
    }

    stop() {
        this.worker.postMessage({
            action: 'stop'
        });
        this.analytics = null;
    }

}

export default WorkerWrapper;
