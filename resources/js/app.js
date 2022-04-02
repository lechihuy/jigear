import Alpine from 'alpinejs';

window.Alpine = Alpine;

window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

import './store/menu';
import './store/sort-by.js';
import './store/filter.js';
import './store/toast';
import './store/confirm-modal';