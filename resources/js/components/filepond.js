import * as FilePond from 'filepond';
import 'filepond/dist/filepond.min.css';

// Optional plugin
import FilePondPluginFileValidateType from 'filepond-plugin-file-validate-type';
import FilePondPluginImagePreview from 'filepond-plugin-image-preview';
import 'filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css';

// Register plugin
FilePond.registerPlugin(FilePondPluginFileValidateType, FilePondPluginImagePreview);

// Apply ke elemen input[type="file"]
document.addEventListener("DOMContentLoaded", function () {
    const inputs = document.querySelectorAll('input[type="file"].filepond');
    [...inputs].forEach(input => {
        FilePond.create(input, {
            acceptedFileTypes: ['image/*', 'application/pdf'],
            labelIdle: 'Drop file atau <span class="filepond--label-action">Browse</span>',
        });
    });
});


