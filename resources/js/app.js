import './bootstrap';

import $ from 'jquery';
window.$ = window.jQuery = $;

import ApexCharts from 'apexcharts';
import Sortable from 'sortablejs';
import { Notyf } from 'notyf';
import 'notyf/notyf.min.css';

window.ApexCharts = ApexCharts;
window.Sortable = Sortable;
window.Notyf = Notyf;
document.addEventListener('DOMContentLoaded', async () => {
    await import('./drag-and-drop-board');
    await import('./drag-and-drop-tasks');
    await import('./task-modal');
});
