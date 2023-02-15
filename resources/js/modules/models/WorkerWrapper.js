class WorkerWrapper {

    static path = "/js/workers/bandera.js";

    target = null;
    worker = null;

    constructor(target, interval) {
        this.target = target;
        this.worker = new Worker(WorkerWrapper.path);

        this.worker.onmessage = function (e) {
            console.log('MESSAGE FROM WORKER');
        };

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
    }

}

export default WorkerWrapper;
