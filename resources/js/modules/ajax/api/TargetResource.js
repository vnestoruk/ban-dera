import request from "../request";

class TargetResource {

    constructor() {
        this.uri = '/api/targets'
    }

    getTargets(params = {}) {
        return request({
            method: 'GET',
            url: this.uri,
            params
        })
    }

    getTargetById(id) {
        return request({
            method: 'GET',
            url: this.uri + '/' + id
        })
    }
}

export default TargetResource;
