<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar pt-2 pt-lg-10">
            <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex align-items-stretch">
                <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
                    <div class="page-title d-flex flex-column justify-content-center gap-1 me-3">
                        <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bold fs-3 m-0"><?= htmlspecialchars($title) ?></h1>
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0">
                            <li class="breadcrumb-item text-muted">
                                <a href="#" class="text-muted text-hover-primary">Administrator</a>
                            </li>
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-400 w-5px h-2px"></span>
                            </li>
                            <li class="breadcrumb-item text-muted"><?= htmlspecialchars($title) ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-fluid">
                <?php $this->load->view('layouts/global_notif_alert'); ?>
                <div class="card">
                    <div class="card-header border-0 pt-6">
                        <div class="card-title">
                            <!--masukan filter-->
                        </div>
                        <div class="card-toolbar">
                            <?php if ($can_create) : ?>
                                <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                                    <button type="button"
                                        class="btn btn-primary"
                                        onclick="ajaxModal('<?= base_url('modules/add_module') ?>','kt_modal_add_modules',false)">
                                        <i class="ki-outline ki-plus fs-2"></i>Add Modules
                                    </button>
                                </div>
                            <?php endif; ?>
                            <div class="modal fade" id="kt_modal_add_modules" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered mw-650px">
                                    <div class="modal-content">
                                        <!--begin::Modal header-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body py-4">
                        <table class="table align-middle table-row-dashed fs-6 gy-5" id="dt-table">
                            <thead>
                                <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                    <th class="w-10px pe-2"> No </th>
                                    <th class="min-w-200px">Name</th>
                                    <th class="min-w-100px">Url</th>
                                    <th class="min-w-100px">Icon</th>
                                    <th class="min-w-100px">Data Url</th>
                                    <th>Status</th>
                                    <?php if (!$hide_actions) : ?>
                                        <th class="text-end min-w-100px no-export">Actions</th>
                                    <?php endif; ?>
                                </tr>
                            </thead>
                            <tbody class="text-gray-600 fw-semibold">
                                <?php
                                $no = 1;
                                foreach ($menus as $parent) :
                                ?>
                                    <!-- Parent -->
                                    <tr class="fw-bold bg-light">
                                        <td><?= $no++ ?></td>
                                        <td><?= $parent['name'] ?></td>
                                        <td>-</td>
                                        <td><?= $parent['icon'] ?: '-' ?></td>
                                        <td>-</td>
                                        <td>
                                            <?php if ($parent['active']) : ?>
                                                <span class="badge badge-light-success">Active</span>
                                            <?php else : ?>
                                                <span class="badge badge-light-danger">Inactive</span>
                                            <?php endif; ?>
                                        </td>
                                        <?php if (!$hide_actions) : ?>
                                            <td class="text-end no-export">
                                                <a href="#" class="btn btn-light btn-active-light-primary btn-flex btn-center btn-sm btn-actions" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                                    <i class="ki-outline ki-down fs-5 ms-1"></i></a>
                                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4 menu-actions" data-kt-menu="true">
                                                    <?php if ($can_update) : ?>
                                                        <div class="menu-item px-3">
                                                            <a href="javascript:void(0);" onclick="ajaxModal('<?= base_url('modules/edit_module/' . $parent['id']) ?>','kt_modal_add_modules',false)" class="menu-link px-3">Edit</a>
                                                        </div>
                                                    <?php endif; ?>
                                                    <?php if ($can_delete) : ?>
                                                        <div class="menu-item px-3">
                                                            <a href="javascript:void(0);" class="menu-link px-3" data-row-delete="delete_row" data-url="<?= base_url('modules/delete/' . $parent['id']) ?>">Delete</a>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </td>
                                        <?php endif; ?>
                                    </tr>

                                    <!-- Child -->
                                    <?php if (!empty($parent['child'])) : ?>
                                        <?php foreach ($parent['child'] as $child) : ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td class="ps-8">↳ <?= $child['name'] ?></td>
                                                <td><?= $child['url'] ?></td>
                                                <td><?= $child['icon'] ?: '-' ?></td>
                                                <td><?= $child['data_url'] ?: '-' ?></td>
                                                <td>
                                                    <?php if ($child['active']) : ?>
                                                        <span class="badge badge-light-success">Active</span>
                                                    <?php else : ?>
                                                        <span class="badge badge-light-danger">Inactive</span>
                                                    <?php endif; ?>
                                                </td>
                                                <?php if (!$hide_actions) : ?>
                                                    <td class="text-end no-export">
                                                        <a href="#" class="btn btn-light btn-active-light-primary btn-flex btn-center btn-sm btn-actions" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                                            <i class="ki-outline ki-down fs-5 ms-1"></i></a>
                                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4 menu-actions" data-kt-menu="true">
                                                            <?php if ($can_update) : ?>
                                                                <div class="menu-item px-3">
                                                                    <a href="javascript:void(0);" onclick="ajaxModal('<?= base_url('modules/edit_module/' . $child['id']) ?>','kt_modal_add_modules',false)" class="menu-link px-3">Edit</a>
                                                                </div>
                                                            <?php endif; ?>
                                                            <?php if ($can_delete) : ?>
                                                                <div class="menu-item px-3">
                                                                    <a href="javascript:void(0);" class="menu-link px-3" data-row-delete="delete_row" data-url="<?= base_url('modules/delete/' . $child['id']) ?>">Delete</a>
                                                                </div>
                                                            <?php endif; ?>
                                                        </div>
                                                    </td>
                                                <?php endif; ?>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php endif; ?>

                                <?php endforeach; ?>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $this->load->view('layouts/copyright'); ?>
</div>