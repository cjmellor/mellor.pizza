import Alpine from 'alpinejs';
import collapse from '@alpinejs/collapse';

require('./bootstrap');

window.Alpine = Alpine;
Alpine.plugin(collapse);
Alpine.start();

const endpointBase = process.env.MIX_APP_URL;
const endpoints = {
    delete: `${endpointBase}/trix/remove-attachment`,
    post: `${endpointBase}/trix/add-attachment`,
    trix: '/storage/trix-attachments/',
};
const csrfToken = document.querySelector("meta[name='csrf-token']").content;

export { csrfToken, endpointBase, endpoints };
