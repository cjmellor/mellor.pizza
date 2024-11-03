import './bootstrap';

const endpointBase = import.meta.env.VITE_APP_URL;
const csrfToken = document.querySelector("meta[name='csrf-token']").content;

export { csrfToken, endpointBase };
