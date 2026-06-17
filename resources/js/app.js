import '../css/app.css';
import axios from 'axios';

window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

import $ from 'jquery';

window.$ = window.jQuery = $;

import Swal from 'sweetalert2';

window.Swal = Swal;

import './confirm';


/* Professional responsive admin panel helpers */
document.addEventListener('DOMContentLoaded', function () {
    const sidebar = document.getElementById('adminSidebar') || document.querySelector('.sidebar');
    const menuBtn = document.getElementById('mobileMenuBtn');
    const overlay = document.getElementById('mobileSidebarOverlay');

    function openSidebar() {
        if (!sidebar) return;
        sidebar.classList.add('active', 'show');
        if (overlay) overlay.classList.add('active', 'show');
        document.body.classList.add('sidebar-open');
    }

    function closeSidebar() {
        if (!sidebar) return;
        sidebar.classList.remove('active', 'show');
        if (overlay) overlay.classList.remove('active', 'show');
        document.body.classList.remove('sidebar-open');
    }

    if (menuBtn) {
        menuBtn.addEventListener('click', function (event) {
            event.preventDefault();
            if (sidebar && (sidebar.classList.contains('active') || sidebar.classList.contains('show'))) {
                closeSidebar();
            } else {
                openSidebar();
            }
        });
    }

    if (overlay) {
        overlay.addEventListener('click', closeSidebar);
    }

    document.addEventListener('keydown', function (event) {
        if (event.key === 'Escape') closeSidebar();
    });

    if (sidebar) {
        sidebar.querySelectorAll('a').forEach(function (link) {
            link.addEventListener('click', function () {
                if (window.innerWidth <= 991) closeSidebar();
            });
        });
    }

    /* Auto convert normal tables into mobile card tables without changing Blade logic */
    document.querySelectorAll('table').forEach(function (table) {
        if (table.classList.contains('no-mobile-card')) return;

        table.classList.add('professional-responsive-table');

        const headers = Array.from(table.querySelectorAll('thead th')).map(function (th) {
            return th.innerText.trim();
        });

        if (!headers.length) return;

        table.querySelectorAll('tbody tr').forEach(function (row) {
            Array.from(row.children).forEach(function (cell, index) {
                if (!cell.hasAttribute('data-label')) {
                    cell.setAttribute('data-label', headers[index] || '');
                }
            });
        });
    });
});
