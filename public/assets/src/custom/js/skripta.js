//import {Grid} from './grid.js';

$(document).ready(function () {


});


window.hapeModalin = function (id) {
    var modal = new bootstrap.Modal(document.getElementById(id));
    modal.show();
}


$(function () {
    $(".datafillimi").datepicker({
        defaultDate: "-1",
        dateFormat: 'dd.mm.yy',
        changeMonth: true,
        numberOfMonths: 3,
        onClose: function (selectedDate) {
            $("#data2").datepicker("option", "minDate", selectedDate);
        }
    });
    $(".datafundi").datepicker({
        defaultDate: "+1",
        dateFormat: 'dd.mm.yy',
        changeMonth: true,
        numberOfMonths: 3,
        onClose: function (selectedDate) {
            $("#data1").datepicker("option", "maxDate", selectedDate);
        }
    });
    flatpickr('.date-picker', {
        enableTime: false,
        dateFormat: "Y-m-d"
    });
    flatpickr('.date-time-picker', {
        enableTime: true,
        dateFormat: "Y-m-d H:i",
        time_24hr: true
    });
    flatpickr('.time-picker', {
        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i",
        time_24hr: true
    });

});
window.grid = [];
