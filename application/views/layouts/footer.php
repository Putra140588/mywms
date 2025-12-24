<!--begin::Scrolltop-->
<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
    <i class="ki-outline ki-arrow-up"></i>
</div>
<!--end::Scrolltop-->


<!--begin::Javascript-->
<?php $this->load->view('layouts/scripts'); ?>
<script>
    var dt = new DataTable('.datatable', {
        fixedColumns: {
            start: 1,
            end: 1
        },
        autoWidth: true,
        paging: true,
        scrollCollapse: true,
        scrollX: true,
        scrollY: 300,
        layout: {
            topStart: {
                buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
            }
        },
    });
    $(document).ready(function() {
        dt
    });
</script>
<!--end::Javascript-->