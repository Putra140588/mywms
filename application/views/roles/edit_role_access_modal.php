<div class="modal-header">
    <h2 class="fw-bold">Update Role Access "<?= htmlspecialchars($role->name) ?>"</h2>
    <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-roles-modal-action="close">
        <i class="ki-outline ki-cross fs-1"></i>
    </div>
</div>

<div class="modal-body scroll-y mx-5 my-7">
    <form method="post" action="<?= site_url('roles/update_access') ?>">

        <div class="table-responsive">
            <table class="table align-middle table-row-dashed fs-6 gy-5">
                <tbody class="text-gray-600 fw-semibold">

                    <?php foreach ($modules as $module): ?>
                        <?php
                        $has_child = count($module['child']) > 0;
                        $parent_read_checked = false;

                        // Hitung parent Read otomatis jika ada child dan child ada yang checked
                        if ($has_child) {
                            foreach ($module['child'] as $child) {
                                if (isset($role_permissions[$child['id']]['can_read']) && $role_permissions[$child['id']]['can_read'] == 1) {
                                    $parent_read_checked = true;
                                    break;
                                }
                            }
                        }
                        ?>


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
                                                <?= $parent_read_checked ? 'checked' : '' ?>>
                                            <span class="form-check-label">Read</span>
                                        </label>

                                        <!-- Select All child -->
                                        <label class="form-check form-check-sm form-check-custom form-check-solid ms-3 mb-2">
                                            <input class="form-check-input select-all"
                                                type="checkbox"
                                                data-parent="<?= $module['id'] ?>"
                                                <?= count($module['child']) == 0 ? 'disabled' : '' ?>>
                                            <span class="form-check-label">Select all</span>
                                        </label>
                                    <?php else: ?>
                                        <!-- Parent tanpa child, tampilkan semua CRUD -->
                                        <?php foreach ($permissions as $perm): ?>
                                            <label class="form-check form-check-sm form-check-custom form-check-solid me-5 mb-2">
                                                <input class="form-check-input parent-permission-checkbox"
                                                    type="checkbox"
                                                    name="permissions[<?= $module['id'] ?>][]"
                                                    value="<?= $perm->code ?>"
                                                    <?= isset($role_permissions[$module['id']]['can_' . $perm->code]) && $role_permissions[$module['id']]['can_' . $perm->code] == 1 ? 'checked' : '' ?>>
                                                <span class="form-check-label"><?= ucfirst($perm->code) ?></span>
                                            </label>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </div>
                            </td>
                        </tr>


                        <!-- CHILD MODULE -->
                        <?php foreach ($module['child'] as $child): ?>
                            <tr class="child-module" data-parent="<?= $module['id'] ?>">
                                <td class="ps-10 text-gray-800"><?= $child['name'] ?></td>
                                <td>
                                    <div class="d-flex flex-wrap">
                                        <?php foreach ($permissions as $perm): ?>
                                            <label class="form-check form-check-sm form-check-custom form-check-solid me-5 mb-2">
                                                <input class="form-check-input permission-checkbox"
                                                    type="checkbox"
                                                    name="permissions[<?= $child['id'] ?>][]"
                                                    value="<?= $perm->code ?>"
                                                    data-parent="<?= $module['id'] ?>"
                                                    <?= isset($role_permissions[$child['id']]['can_' . $perm->code]) && $role_permissions[$child['id']]['can_' . $perm->code] == 1 ? 'checked' : '' ?>>
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
            <button type="reset" class="btn btn-light me-3">Discard</button>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>

    </form>
</div>
<script>
    // Select All child → parent Read otomatis checked
    $(document).on('change', '.select-all', function() {
        const parentId = $(this).data('parent');
        const checked = $(this).is(':checked');

        $('.permission-checkbox[data-parent="' + parentId + '"]')
            .prop('checked', checked);

        // Parent Read
        if (checked) {
            $('.parent-read-checkbox[value="read"]').filter(function() {
                return $(this).closest('tr').data('parent') == parentId;
            }).prop('checked', true);
        }
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