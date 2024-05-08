import apiFetch from "@wordpress/api-fetch";

const base = 'wp';
const version = 'v2';

const Api = {
    get: (endPoint) => {
        return apiFetch({
            path: `${base}/${version}/${endPoint}`,
            method: 'GET'
        });
    },

    post: (endPoint, data) => {
        return apiFetch({
            path: `${base}/${version}/${endPoint}`,
            method: 'POST',
            data: data
        });
    },

    put: (endPoint, data) => {
        return apiFetch({
            path: `${base}/${version}/${endPoint}`,
            method: 'PUT',
            data: data
        });
    },

    delete: (endPoint, data) => {
        return apiFetch({
            path: `${base}/${version}/${endPoint}`,
            method: 'DELETE',
            data: data
        });
    },
}

export default Api;