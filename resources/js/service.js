import router from "./router.js";

const url = '/api'

// перенапровляем на страницу авторизации если в ответе получаем 401 статус
axios.interceptors.response.use(function (response) {
    return response;
}, function (error) {
    if (error.response.status === 401) {
        router.push({name: 'sign-in'})
    }
    return Promise.reject(error);
});

export async function signIn(data) {
    const response = await axios.post(`${url}/sign-in`, data)
    return response.data.data
}

export async function signUp(data) {
    const response = await axios.post(`${url}/sign-up`, data)
    return response.data.data
}

export async function getNotes() {
    const response = await axios.get(`${url}/notes`)
    return response.data.data
}

export async function getByIdNote(id) {
    const response = await axios.get(`${url}/notes/${id}`)
    return response.data.data
}

export async function storeNote(data) {
    const response = await axios.post(`${url}/notes`, data)
    return response.data.data
}

export async function updateNote(id, data) {
    const response = await axios.put(`${url}/notes/${id}`, data)
    return response.data.data
}

export async function deleteNote(id) {
    const response = await axios.delete(`${url}/notes/${id}`)
    return response.data.data
}

