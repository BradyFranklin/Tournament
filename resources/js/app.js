import './bootstrap';
import Alpine from 'alpinejs';
import AOS from 'aos';
import 'aos/dist/aos.css'; // Import the AOS CSS styles
import $ from 'jquery';
import 'select2/dist/js/select2.min.js';
import 'select2/dist/css/select2.min.css';

window.Alpine = Alpine;

Alpine.start();

AOS.init();

$(document).ready(function() {
    console.log("Document is ready. Initializing select2.");
    $('#games').select2({
        placeholder: "Select your games",
        allowClear: true,
    });
});
