import request from "../request";

class AuthenticationResource {

    constructor() {
        this.uri = '/api/authentication'
    }

    getCsrfCookies() {
        return request({
            method: 'GET',
            url: '/sanctum/csrf-cookie'
        })
    }

    logIn(data) {
        return request({
            method: 'POST',
            url: this.uri + '/login',
            data
        })
    }

    signUp(data) {
        return request({
            method: 'POST',
            url: this.uri + '/signup',
            data
        })
    }

    signIn() {
        return request({
            method: 'GET',
            url: this.uri + '/signin'
        })
    }

    logOut() {
        return request({
            method: 'POST',
            url: this.uri + '/logout'
        })
    }

}

export default AuthenticationResource;
