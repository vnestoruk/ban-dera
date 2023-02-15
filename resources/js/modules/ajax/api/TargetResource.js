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

    getAttackList(params = {}) {
        return request({
            method: 'GET',
            url: this.uri + '/attack',
            params
        })
    }

    getTargetById(id) {
        return request({
            method: 'GET',
            url: this.uri + '/' + id
        })
    }

    store(target) {
        return request({
            method: 'POST',
            url: this.uri,
            data: target
        })
    }
}

export default TargetResource;
