import request from "../request";

class LocationResource {

    constructor() {
        this.uri = '/api/location'
    }

    getLocation() {
        return request({
            method: 'GET',
            url: this.uri
        })
    }
}

export default LocationResource;
