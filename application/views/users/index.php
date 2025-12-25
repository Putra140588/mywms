<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar pt-2 pt-lg-10">
            <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex align-items-stretch">
                <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
                    <div class="page-title d-flex flex-column justify-content-center gap-1 me-3">
                        <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bold fs-3 m-0">Users List</h1>
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0">
                            <li class="breadcrumb-item text-muted">
                                <a href="#" class="text-muted text-hover-primary">Administrator</a>
                            </li>
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-400 w-5px h-2px"></span>
                            </li>
                            <li class="breadcrumb-item text-muted">User List</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-fluid">
                <div class="card">
                    <div class="card-header border-0 pt-6">
                        <div class="card-title">
                            <!--masukan filter-->
                            <form class="d-flex align-items-center position-relative my-1" method="get" action="<?= base_url('user') ?>">
                                <div class="position-relative w-md-400px me-md-2">
                                    <input class="form-control form-control-solid filter-daterangepicker" placeholder="Pick joined date range" value="<?= htmlspecialchars($joined_date_range) ?>" name="joined_date_range" required />
                                </div>
                                <div class="d-flex align-items-center">
                                    <button type="submit" class="btn btn-primary me-5">Search</button>
                                    <button type="reset" onclick="window.location.href='<?= base_url('user') ?>';" class="btn btn-secondary">Cancel</button>
                                </div>
                            </form>
                        </div>
                        <div class="card-toolbar">
                            <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                                <button type="button"
                                    class="btn btn-primary"
                                    onclick="ajaxModal('<?= base_url('user/add_user') ?>','kt_modal_add_user',false)">
                                    <i class="ki-outline ki-plus fs-2"></i>Add User
                                </button>
                            </div>
                            <div class="modal fade" id="kt_modal_add_user" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered mw-650px">
                                    <div class="modal-content">
                                        <!--begin::Modal header-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body py-4">
                        <table class="table dt-table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
                            <thead>
                                <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                    <th class="w-10px pe-2"> No </th>
                                    <th class="min-w-100px">Name</th>
                                    <th class="min-w-125px">Username</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Company</th>
                                    <th>Status</th>
                                    <th>Joined Date</th>
                                    <th class="text-end min-w-100px">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-600 fw-semibold">
                                <?php
                                $no = 1;
                                foreach ($sql as $row) {
                                    $avatar = (!empty($row->picture)) ? base_url() . 'assets/media/avatars/' . $row->picture : base_url() . 'assets/media/avatars/blank.png';
                                    $active_badge = ($row->active == 1) ? '<span class="badge badge-light-success">Active</span>' : '<span class="badge badge-light-danger">Inactive</span>';
                                ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td class="d-flex align-items-center">
                                            <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                                <a href="javascript:void(0);">
                                                    <div class="symbol-label">
                                                        <img src="<?= $avatar ?>" alt="<?= $row->name ?>" class="w-100" />
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="d-flex flex-column">
                                                <span> <?= $row->name ?></span>
                                            </div>
                                        </td>
                                        <td><?= $row->username ?></td>
                                        <td><?= $row->phone ?></td>
                                        <td><?= $row->email ?></td>
                                        <td><?= $row->role_name ?></td>
                                        <td><?= $row->companycode ?></td>
                                        <td><?= $active_badge ?></td>
                                        <td><?= dmy($row->created_at) ?></td>
                                        <td class="text-end">
                                            <a href="#" class="btn btn-light btn-active-light-primary btn-flex btn-center btn-sm btn-actions" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                                <i class="ki-outline ki-down fs-5 ms-1"></i></a>
                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4 menu-actions" data-kt-menu="true">
                                                <div class="menu-item px-3">
                                                    <a href="javascript:void(0);" onclick="ajaxModal('<?= base_url('user/edit_user/' . $row->id) ?>','kt_modal_add_user',false)" class="menu-link px-3">Edit</a>
                                                </div>
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3" data-kt-users-table-filter="delete_row" data-url="<?= base_url('user/delete_user/' . $row->id) ?>">Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $this->load->view('layouts/copyright'); ?>
</div>