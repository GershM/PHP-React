import axios from "axios";

const api = {
    getTest: () => {
        return axios.get(`/Test`);
    },
}

export default api;
window.contextApi = api;