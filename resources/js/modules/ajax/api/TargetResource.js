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
            url: this.uri + '/attack-list',
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

    update(target) {
        return request({
            method: 'PUT',
            url: this.uri + '/' + target.id,
            data: target
        })
    }

    destroy(target) {
        return request({
            method: 'DELETE',
            url: this.uri + '/' + target.id,
            data: target
        })
    }
}

export default TargetResource;
