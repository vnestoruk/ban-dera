import request from "../request";

class TargetResource {

    constructor() {
        this.uri = '/api/targets'
    }

    getTargets() {
        return request({
            method: 'GET',
            url: this.uri
        })
    }
}

export default TargetResource;
