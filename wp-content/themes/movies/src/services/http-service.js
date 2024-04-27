/* 
 Adapter for HTTP requests using Axios
*/

import axios from 'axios';
import { get as getCookie } from './browser-storage';

// make sure we have only one instance
const getInstance = () => {
    if (!getInstance.instance) {
        getInstance.instance = axios.create();
        // Request interceptor to attach cookie value
        getInstance.instance.interceptors.request.use(config => {
        const token = getCookie('token_key');
        if (token) {
            config.headers.Authorization = `Bearer ${token}`;
        }
        return config;
    }, error => {
        return Promise.reject(error);
    });
    }

    return getInstance.instance;
}

export const get = async (url, params = {}) => {
    try {
        const response = await getInstance().get(url, { params });
        return response.data;
    } catch (error) {
        throw new Error(`GET request to ${url} failed: ${error.message}`);
    }
}

export const post = async (url, data) => {
    try {
        const response = await getInstance().post(url, data);
        return response.data;
    } catch (error) {
        throw new Error(`POST request to ${url} failed: ${error.message}`);
    }
}

export const put = async (url, data) => {
    try {
        const response = await getInstance().put(url, data);
        return response.data;
    } catch (error) {
        throw new Error(`PUT request to ${url} failed: ${error.message}`);
    }
}

export const del = async (url) => {
    try {
        const response = await getInstance().delete(url);
        return response.data;
    } catch (error) {
        throw new Error(`DELETE request to ${url} failed: ${error.message}`);
    }
}

// Example usage:
// HttpService.get('https://api.example.com/data', { page: 1 })
//    .then(response => console.log(response))
//    .catch(error => console.error(error));
