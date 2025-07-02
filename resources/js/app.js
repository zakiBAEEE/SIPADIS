import './bootstrap';
import './components/datepicker';
import './components/filepond';
import { initMaterialTailwind } from '@material-tailwind/html';
import Alpine from 'alpinejs';
import { initializeCharts } from './components/initChart';
import { initializeAlerts } from './components/alert-handler';
import { handleFormReset } from './components/resetForm';


window.Alpine = Alpine;
Alpine.start();

document.addEventListener('DOMContentLoaded', () => {
    handleFormReset('#filterSuratKlasifikasi form', '#filterSuratKlasifikasi button[type="reset"]');
    initializeAlerts();
    initializeCharts();
    initMaterialTailwind();
});
