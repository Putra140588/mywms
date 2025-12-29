<?php
$is_self_role = ($login_role_id == $role->id);
$disable_attr = $is_self_role ? 'disabled' : '';
?>
<div class="modal-header">
    <h2 class="fw-bold">Update Role Permissions "<?= htmlspecialchars($role->name) ?>"</h2>
    <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-modal-action="close">
        <i class="ki-outline ki-cross fs-1"></i>
    </div>
</div>

<div class="modal-body scroll-y mx-5 my-7">
    <form method="post" action="<?= site_url('roles/update_access') ?>" id="kt_modal_update_role_form">
        <input type="hidden" name="role_id" value="<?= $role->id ?>" />
        <div class="table-responsive">
            <?php if ($is_self_role): ?>
                <div class="alert alert-warning d-flex align-items-center mb-5">
                    <i class="ki-outline ki-shield fs-2hx me-4"></i>
                    <div>
                        <strong>Security Notice</strong><br>
                        You cannot modify permissions for your own role.
                    </div>
                </div>
            <?php endif; ?>
            <table class="table align-middle table-row-dashed fs-6 gy-5">
                <tbody class="text-gray-600 fw-semibold">
                    <?php foreach ($modules as $module): ?>
                        <?php $has_child = count($module['child']) > 0;  ?>

                        <!-- PARENT MODULE -->
                        <tr class="bg-light parent-module" data-parent="<?= $module['id'] ?>">
                            <td class="fw-bold text-gray-800">
                                <i class="<?= $module['icon'] ?>"></i> <?= $module['name'] ?>
                            </td>
                            <td>
                                <div class="d-flex flex-wrap">
                                    <?php if ($has_child): ?>
                                        <!-- Hanya Read -->
                                        <label class="form-check form-check-sm form-check-custom form-check-solid me-5 mb-2">
                                            <input class="form-check-input parent-read-checkbox"
                                                type="checkbox"
                                                name="permissions[<?= $module['id'] ?>][]"
                                                value="read"
                                                <?= isset($role_permissions[$module['id']]['can_read']) && $role_permissions[$module['id']]['can_read'] == 1 ? 'checked' : '' ?>
                                                <?= $disable_attr ?>>
                                            <span class="form-check-label">Read</span>
                                        </label>

                                        <!-- Select All child -->
                                        <label class="form-check form-check-sm form-check-custom form-check-solid ms-3 mb-2">
                                            <input class="form-check-input select-all"
                                                type="checkbox"
                                                data-parent="<?= $module['id'] ?>"
                                                <?= count($module['child']) == 0 ? 'disabled' : '' ?>
                                                <?= $disable_attr ?>>
                                            <span class="form-check-label">Select all</span>
                                        </label>
                                    <?php else: ?>
                                        <!-- Parent tanpa child, tampilkan semua CRUD -->
                                        <!-- CHECK ALL PARENT -->
                                        <label class="form-check form-check-sm form-check-custom form-check-solid me-5 mb-2">
                                            <input class="form-check-input parent-select-all"
                                                type="checkbox"
                                                data-parent="<?= $module['id'] ?>"
                                                <?= $disable_attr ?>>
                                            <span class="form-check-label">All</span>
                                        </label>
                                        <?php foreach ($permissions as $perm): ?>
                                            <label class="form-check form-check-sm form-check-custom form-check-solid me-5 mb-2">
                                                <input class="form-check-input parent-permission-checkbox"
                                                    type="checkbox"
                                                    name="permissions[<?= $module['id'] ?>][]"
                                                    value="<?= $perm->code ?>"
                                                    data-parent="<?= $module['id'] ?>"
                                                    <?= isset($role_permissions[$module['id']]['can_' . $perm->code]) && $role_permissions[$module['id']]['can_' . $perm->code] == 1 ? 'checked' : '' ?>
                                                    <?= $disable_attr ?>>
                                                <span class="form-check-label"><?= ucfirst($perm->code) ?></span>
                                            </label>
                                        <?php endforeach; ?>

                                    <?php endif; ?>
                                </div>
                            </td>
                        </tr>


                        <!-- CHILD MODULE -->
                        <?php foreach ($module['child'] as $child): ?>
                            <tr class="child-module" data-parent="<?= $module['id'] ?>" data-module="<?= $child['id'] ?>">
                                <td class="ps-10 text-gray-800">
                                    <?= $child['name'] ?>
                                </td>
                                <td>
                                    <div class="d-flex flex-wrap align-items-center">

                                        <!-- CHECK ALL CHILD -->
                                        <label class="form-check form-check-sm form-check-custom form-check-solid me-5 mb-2">
                                            <input class="form-check-input child-select-all"
                                                type="checkbox"
                                                data-module="<?= $child['id'] ?>"
                                                data-parent="<?= $module['id'] ?>"
                                                <?= $disable_attr ?>>
                                            <span class="form-check-label">All</span>
                                        </label>

                                        <?php foreach ($permissions as $perm): ?>
                                            <label class="form-check form-check-sm form-check-custom form-check-solid me-5 mb-2">
                                                <input class="form-check-input permission-checkbox"
                                                    type="checkbox"
                                                    name="permissions[<?= $child['id'] ?>][]"
                                                    value="<?= $perm->code ?>"
                                                    data-module="<?= $child['id'] ?>"
                                                    data-parent="<?= $module['id'] ?>"
                                                    <?= isset($role_permissions[$child['id']]['can_' . $perm->code]) && $role_permissions[$child['id']]['can_' . $perm->code] == 1 ? 'checked' : '' ?>
                                                    <?= $disable_attr ?>>
                                                <span class="form-check-label"><?= ucfirst($perm->code) ?></span>
                                            </label>
                                        <?php endforeach; ?>

                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <div class="text-center pt-15">
            <button type="reset" class="btn btn-light me-3" data-kt-modal-action="cancel">Discard</button>
            <button type="submit" class="btn btn-primary" data-kt-modal-action="submit" <?= $is_self_role ? 'disabled' : '' ?>>
                <span class="indicator-label">Submit</span>
                <span class="indicator-progress">Please wait...
                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
            </button>
        </div>

    </form>
</div>

<script>
    // Select All child → parent Read otomatis checked
    $(document).on('change', '.select-all', function() {
        const parentId = $(this).data('parent');
        const checked = $(this).is(':checked');

        // 1. Check / uncheck semua child "All"
        $('.child-select-all[data-parent="' + parentId + '"]')
            .prop('checked', checked);

        // 2. Check / uncheck semua permission child
        $('.permission-checkbox[data-parent="' + parentId + '"]')
            .prop('checked', checked);

        // 3. Parent READ auto
        $('.parent-read-checkbox')
            .closest('tr[data-parent="' + parentId + '"]')
            .find('.parent-read-checkbox')
            .prop('checked', checked);
    });

    // Jika ada child permission dicheck/unchecked → parent Read otomatis
    $(document).on('change', '.permission-checkbox', function() {
        const parentId = $(this).data('parent');

        const anyChecked = $('.permission-checkbox[data-parent="' + parentId + '"]:checked').length > 0;

        $('.parent-read-checkbox[value="read"]').filter(function() {
            return $(this).closest('tr').data('parent') == parentId;
        }).prop('checked', anyChecked);

        // Update Select All
        const total = $('.permission-checkbox[data-parent="' + parentId + '"]').length;
        const checked = $('.permission-checkbox[data-parent="' + parentId + '"]:checked').length;
        $('.select-all[data-parent="' + parentId + '"]').prop('checked', total === checked);
    });
</script>

<script>
    /**
     * CHECK ALL PER CHILD (module_id)
     */
    $(document).on('change', '.child-select-all', function() {
        const moduleId = $(this).data('module');
        const parentId = $(this).data('parent');
        const checked = $(this).is(':checked');

        // Check semua permission child ini saja
        $('.permission-checkbox[data-module="' + moduleId + '"]')
            .prop('checked', checked);

        // Parent Read auto checked jika ada child checked
        if (checked) {
            $('.parent-read-checkbox')
                .closest('tr[data-parent="' + parentId + '"]')
                .find('.parent-read-checkbox')
                .prop('checked', true);
        }

        updateParentSelectAll(parentId);
    });

    /**
     * CHILD PERMISSION CHANGE
     */
    $(document).on('change', '.permission-checkbox', function() {
        const moduleId = $(this).data('module');
        const parentId = $(this).data('parent');

        // Update child select all
        const totalChildPerm = $('.permission-checkbox[data-module="' + moduleId + '"]').length;
        const checkedChild = $('.permission-checkbox[data-module="' + moduleId + '"]:checked').length;

        $('.child-select-all[data-module="' + moduleId + '"]')
            .prop('checked', totalChildPerm === checkedChild);

        // Parent read auto
        const anyChildChecked = $('.permission-checkbox[data-parent="' + parentId + '"]:checked').length > 0;
        $('.parent-read-checkbox')
            .closest('tr[data-parent="' + parentId + '"]')
            .find('.parent-read-checkbox')
            .prop('checked', anyChildChecked);

        updateParentSelectAll(parentId);
    });

    /**
     * UPDATE SELECT ALL PARENT
     */
    function updateParentSelectAll(parentId) {
        const total = $('.permission-checkbox[data-parent="' + parentId + '"]').length;
        const checked = $('.permission-checkbox[data-parent="' + parentId + '"]:checked').length;

        $('.select-all[data-parent="' + parentId + '"]')
            .prop('checked', total > 0 && total === checked);
    }
</script>
<script>
    /**
     * CHECK ALL PARENT (TANPA CHILD)
     */
    $(document).on('change', '.parent-select-all', function() {
        const parentId = $(this).data('parent');
        const checked = $(this).is(':checked');

        $('.parent-permission-checkbox[data-parent="' + parentId + '"]')
            .prop('checked', checked);
    });

    /**
     * PARENT PERMISSION CHANGE → UPDATE CHECK ALL
     */
    $(document).on('change', '.parent-permission-checkbox', function() {
        const parentId = $(this).data('parent');

        const total = $('.parent-permission-checkbox[data-parent="' + parentId + '"]').length;
        const checked = $('.parent-permission-checkbox[data-parent="' + parentId + '"]:checked').length;

        $('.parent-select-all[data-parent="' + parentId + '"]')
            .prop('checked', total > 0 && total === checked);
    });
</script>
<script>
    $(document).ready(function() {
        $('.parent-select-all').each(function() {
            const parentId = $(this).data('parent');
            const total = $('.parent-permission-checkbox[data-parent="' + parentId + '"]').length;
            const checked = $('.parent-permission-checkbox[data-parent="' + parentId + '"]:checked').length;

            $(this).prop('checked', total > 0 && total === checked);
        });

        $('.child-select-all').each(function() {
            const moduleId = $(this).data('module');
            const total = $('.permission-checkbox[data-module="' + moduleId + '"]').length;
            const checked = $('.permission-checkbox[data-module="' + moduleId + '"]:checked').length;

            $(this).prop('checked', total > 0 && total === checked);
        });
    });
</script>