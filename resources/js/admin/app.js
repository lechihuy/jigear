import Alpine from 'alpinejs';

window._ = require('lodash');

window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

window.Alpine = Alpine;

import './store/theme';
import './store/toast';
import './store/confirm-modal';