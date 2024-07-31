
<script src="{{asset('admin/vendors/js/vendor.bundle.base.js')}}"></script>


<script src="{{asset('admin/vendors/chart.js/Chart.min.js')}}"></script>

<script src="{{asset('admin/js/off-canvas.js')}}"></script>
<script src="{{asset('admin/js/hoverable-collapse.js')}}"></script>
<script src="{{asset('admin/js/template.js')}}"></script>
<script src="{{asset('admin/js/settings.js')}}"></script>
<script src="{{asset('admin/js/todolist.js')}}"></script>

<script src="{{asset('admin/js/dashboard.js')}}"></script>
<!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">

    <!-- DataTables JS -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
            $('#dataTable2').DataTable();
            $('#dataTable3').DataTable();
        });
    </script>




<script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>
<script>
 function initializeEditor(selector) {

    ClassicEditor
        .create(document.querySelector(selector), {
            toolbar: {
                items: ['bulletedList']
            },
            allowedContent: 'ul li',
            extraAllowedContent: '',
            removeButtons: 'NumberedList,Outdent,Indent,Blockquote',
            placeholder: 'Use bullet points to list items'
        })
        .catch(error => {
            console.error(error);
        });
}

initializeEditor('#editor');
initializeEditor('#editor1');
initializeEditor('#editor2');
initializeEditor('#editor3');
initializeEditor('#editor4');


</script>


