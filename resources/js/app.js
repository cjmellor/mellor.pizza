import Alpine from 'alpinejs';
import collapse from '@alpinejs/collapse';

import './bootstrap';

window.Alpine = Alpine;
Alpine.plugin(collapse);
Alpine.start();

const endpointBase = import.meta.env.VITE_APP_URL;
const csrfToken = document.querySelector("meta[name='csrf-token']").content;

export { csrfToken, endpointBase };
