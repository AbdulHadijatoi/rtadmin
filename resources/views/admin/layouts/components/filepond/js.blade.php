<script src="{{ URL::asset('admin/plugins/filepond/filepond.min.js') }}"></script>
<script src="{{ URL::asset('admin/plugins/filepond-plugin-image-preview/filepond-plugin-image-preview.min.js') }}"></script>
<script src="{{ URL::asset('admin/plugins/filepond-plugin-file-validate-size/filepond-plugin-file-validate-size.min.js') }}"></script>
<script src="{{ URL::asset('admin/plugins/filepond-plugin-image-exif-orientation/filepond-plugin-image-exif-orientation.min.js') }}"></script>
<script src="{{ URL::asset('admin/plugins/filepond-plugin-file-encode/filepond-plugin-file-encode.min.js') }}"></script>
<script>
   // FilePond
   FilePond.registerPlugin(
        // encodes the file as base64 data
        FilePondPluginFileEncode,
        // validates the size of the file
        FilePondPluginFileValidateSize,
        // corrects mobile image orientation
        FilePondPluginImageExifOrientation,
        // previews dropped images
        FilePondPluginImagePreview
    );

    var inputMultipleElements = document.querySelectorAll('input.filepond-input-multiple');
    if (inputMultipleElements) {

        // loop over input elements
        Array.from(inputMultipleElements).forEach(function(inputElement) {

            FilePond.create(inputElement);
        })
    }
</script>
