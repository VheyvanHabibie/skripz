require("./bootstrap");

import AOS from 'aos';
import 'aos/dist/aos.css';
AOS.init();

import ApexCharts from 'apexcharts';
window.ApexCharts = ApexCharts;

// Import Sweet Alert
import Swal from 'sweetalert2';
window.Swal = Swal;

window.Vue = require("vue").default;

// Register our components
Vue.component("kanban-board", require("./components/KanbanBoard.vue").default);

if (document.getElementById('app')) {
    const app = new Vue({
      el: "#app"
    });
}
