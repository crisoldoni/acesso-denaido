import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
window.axios.defaults.headers.common['X-Frame-Options'] = 'DENY';
window.axios.defaults.headers.common['X-XSS-Protection'] = '1; mode=block';
window.axios.defaults.headers.common['X-Content-Type-Options'] = 'nosniff';
window.axios.defaults.headers.common['Referrer-Policy'] = 'no-referrer';
window.axios.defaults.headers.common['Permissions-Policy'] = 'geolocation=(self), microphone=()';
window.axios.defaults.headers.common['Access-Control-Allow-Origin'] = '*';
window.axios.defaults.headers.common['Access-Control-Allow-Credentials'] = 'true';

