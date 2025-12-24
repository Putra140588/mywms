<!--begin::Global Javascript Bundle(mandatory for all pages)-->
<script src="<?= base_url() ?>assets/plugins/global/plugins.bundle.js"></script>
<script src="<?= base_url() ?>assets/js/scripts.bundle.js"></script>

<script>
    <?php if (isset($activeurl)) : ?>
        $('[data-url="<?= $activeurl ?>"]').not('.menu-item-level1').addClass("active");
        $('[data-url="<?= $activeurl ?>"]').parents('.menu-item').not('.menu-item-level2').addClass("here show");
    <?php endif; ?>
</script>
<!--end::Global Javascript Bundle-->

<script src="<?= base_url() ?>assets/plugins/custom/fullcalendar/fullcalendar.bundle.js"></script>
<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
<script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
<script src="https://cdn.amcharts.com/lib/5/radar.js"></script>
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
<script src="https://cdn.amcharts.com/lib/5/map.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/worldLow.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/continentsLow.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/usaLow.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZonesLow.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZoneAreasLow.js"></script>
<!-- <script src="assets/plugins/custom/datatables/datatables.bundle.js"></script> -->

<script src="<?= base_url() ?>assets/js/widgets.bundle.js"></script>
<script src="<?= base_url() ?>assets/js/custom/widgets.js"></script>
<script src="<?= base_url() ?>assets/js/custom/apps/chat/chat.js"></script>
<script src="<?= base_url() ?>assets/js/custom/utilities/modals/upgrade-plan.js"></script>
<script src="<?= base_url() ?>assets/js/custom/utilities/modals/users-search.js"></script>
<script src="<?= base_url() ?>assets/js/custom/utilities/modals/create-campaign.js"></script>

<script src="<?= base_url() ?>assets/datatables/js/jquery-3.7.1.js"></script>
<script src="<?= base_url() ?>assets/datatables/js/dataTables.js"></script>
<script src="<?= base_url() ?>assets/datatables/js/dataTables.buttons.js"></script>
<script src="<?= base_url() ?>assets/datatables/js/buttons.dataTables.js"></script>
<script src="<?= base_url() ?>assets/datatables/js/pdfmake.min.js"></script>
<script src="<?= base_url() ?>assets/datatables/js/jszip.min.js"></script>
<script src="<?= base_url() ?>assets/datatables/js/vfs_fonts.js"></script>
<script src="<?= base_url() ?>assets/datatables/js/buttons.html5.min.js"></script>

<!-- <script src="<? //= base_url() 
                    ?>assets/js/custom/apps/user-management/users/list/table.js"></script> -->
<!-- <script src="<? //= base_url() 
                    ?>assets/js/custom/apps/user-management/users/list/export-users.js"></script> -->
<script src="<?= base_url() ?>assets/js/custom/apps/user-management/users/list/add.js"></script>