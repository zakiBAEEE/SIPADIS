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