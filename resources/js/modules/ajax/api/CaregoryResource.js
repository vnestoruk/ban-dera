import request from "../request";

class CategoryResource {

    constructor() {
        this.uri = '/api/categories'
    }

    index(params = {}) {
        return request({
            method: 'GET',
            url: this.uri,
            params
        })
    }
}

export default CategoryResource;
