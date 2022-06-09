import $ from "expose-loader?exposes=$,jQuery!jquery";
require('./custom/jquery-ui-1.9.2.min');
require('@popperjs/core');
require('moment');
window.bootstrap = require('bootstrap/dist/js/bootstrap.bundle.js');
window.XLSX = require('xlsx');
require('./custom/js/grid.js');
//import Grid from "expose-loader?exposes=Grid!./custom/js/grid.js";
import '../../../node_modules/@fortawesome/fontawesome-free/js/all.js';
import flatpickr from "flatpickr";
import './custom/js/skripta.js';

