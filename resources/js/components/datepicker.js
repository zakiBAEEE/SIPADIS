import flatpickr from "flatpickr";
import "flatpickr/dist/flatpickr.min.css";

document.addEventListener("DOMContentLoaded", function () {
    flatpickr("#tanggal_surat", {
        dateFormat: "Y-m-d", // format tanggal
    });
});
document.addEventListener("DOMContentLoaded", function () {
    flatpickr("#tanggal_terima", {
        dateFormat: "Y-m-d", // format tanggal
    });
});

document.addEventListener("DOMContentLoaded", function () {
    flatpickr("#tanggal_disposisi", {
        dateFormat: "Y-m-d", // format tanggal
    });
});

document.addEventListener("DOMContentLoaded", function () {
    flatpickr("#rekap_dari_tanggal", {
        dateFormat: "Y-m-d", // format tanggal
    });
});

document.addEventListener("DOMContentLoaded", function () {
    flatpickr("#rekap_sampe_tanggal", {
        dateFormat: "Y-m-d", // format tanggal
    });
});

document.addEventListener('DOMContentLoaded', function () {
    flatpickr("#startDate", {
        mode: "range",  // Memungkinkan pemilihan rentang tanggal
        dateFormat: "Y-m-d",  // Format tanggal yang ditampilkan
    });
});
