import './bootstrap';

import * as bootstrap from 'bootstrap';

window.bootstrap = bootstrap;

// Active popovers from bootstrap 5
if (parseInt(window.bootstrap.Tooltip.VERSION.charAt(0)) === 5) {
    [...document.querySelectorAll('[data-bs-toggle="tooltip"]')].forEach(el => new bootstrap.Tooltip(el));
    [...document.querySelectorAll('[data-bs-toggle="popover"]')].forEach(el => new bootstrap.Popover(el));

    var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
    var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
        return new bootstrap.Popover(popoverTriggerEl)
    })
}
