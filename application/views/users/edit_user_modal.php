<div class="modal-header" id="kt_modal_add_user_header">
    <h2 class="fw-bold">Edit User</h2>
    <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close">
        <i class="ki-outline ki-cross fs-1"></i>
    </div>
</div>

<div class="modal-body px-5 my-7">
    <form id="kt_modal_add_user_form" class="form" action="<?= base_url('user/edit') ?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="user_id" value="<?= htmlspecialchars($user->id) ?>" />
        <input type="hidden" name="existing_username" value="<?= htmlspecialchars($user->username) ?>" />
        <div class="d-flex flex-column scroll-y px-5 px-lg-10" id="kt_modal_add_user_scroll" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header" data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">
            <div class="fv-row mb-7">
                <label class="d-block fw-semibold fs-6 mb-5">Avatar</label>
                <style>
                    .image-input-placeholder {
                        background-image: url('assets/media/svg/files/blank-image.svg');
                    }

                    [data-bs-theme="dark"] .image-input-placeholder {
                        background-image: url('assets/media/svg/files/blank-image-dark.svg');
                    }
                </style>
                <?php $avatar = (!empty($user->picture)) ? 'background-image: url(assets/media/avatars/' . $user->picture . ')' : 'background-image: url(assets/media/svg/files/blank-image.svg'; ?>
                <div class="image-input image-input-outline image-input-placeholder" data-kt-image-input="true">
                    <div class="image-input-wrapper w-125px h-125px" style="<?= $avatar ?>"></div>
                    <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                        <i class="ki-outline ki-pencil fs-7"></i>
                        <input type="file" name="file" accept=".png, .jpg, .jpeg" />
                        <input type="hidden" name="avatar_remove" />
                    </label>
                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                        <i class="ki-outline ki-cross fs-2"></i>
                    </span>
                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                        <i class="ki-outline ki-cross fs-2"></i>
                    </span>
                </div>
                <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
            </div>
            <div class="fv-row mb-7">
                <label class="required fw-semibold fs-6 mb-2">Full Name</label>
                <input type="text" name="name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Full name" value="<?= htmlspecialchars($user->name) ?>" />
            </div>
            <div class="fv-row mb-7">
                <label class="required fw-semibold fs-6 mb-2">Email</label>
                <input type="email" name="email" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="example@domain.com" value="<?= htmlspecialchars($user->email) ?>" />
            </div>
            <div class="fv-row mb-7">
                <label class="required fw-semibold fs-6 mb-2">Phone</label>
                <input type="text" name="phone" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Phone number" value="<?= htmlspecialchars($user->phone) ?>" />
            </div>
            <div class="fv-row mb-7">
                <label class="required fw-semibold fs-6 mb-2">Username</label>
                <input type="text" name="username" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Username" value="<?= htmlspecialchars($user->username) ?>" />
            </div>
            <div class="fv-row mb-7">
                <label class="fw-semibold fs-6 mb-2">Password</label>
                <input type="text" name="password" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Ignore if not changing" />
            </div>
            <div class="d-flex flex-column mb-7 fv-row">
                <label class="required fw-semibold fs-6 mb-2">Outlet</label>
                <select name="outlet" aria-label="Select an Outlet" data-control="select2" data-placeholder="Select an Outlet..." data-dropdown-parent="#kt_modal_add_user" class="form-select form-select-solid fw-bold">
                    <option value="">Select an Outlet...</option>
                    <?php foreach ($outlet as $out) : ?>
                        <option value="<?= htmlspecialchars($out->code) ?>" <?= $out->code == $user->outlet ? 'selected="selected"' : '' ?>><?= htmlspecialchars($out->name) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="fv-row mb-7">
                <!--begin::Wrapper-->
                <div class="d-flex flex-stack">
                    <div class="me-5">
                        <label class="fs-6 fw-semibold">Set user as active ?</label>
                    </div>
                    <label class="form-check form-switch form-check-custom form-check-solid">
                        <input class="form-check-input" name="active" type="checkbox" <?= $user->active ? 'checked="checked"' : '' ?> />
                        <span class="form-check-label fw-semibold text-muted">Yes</span>
                    </label>
                </div>
            </div>
            <div class="mb-5">
                <label class="required fw-semibold fs-6 mb-5">Role</label>
                <?php foreach ($roles as $role) :
                    if (!is_superadmin() && $role->id == 1) continue;
                ?>
                    <div class="d-flex fv-row mb-3">
                        <div class="form-check form-check-custom form-check-solid">
                            <input class="form-check-input me-3" name="user_role" type="radio" value="<?= $role->id ?>" <?= $role->id == $user->role_id ? 'checked="checked"' : '' ?> />
                            <label class="form-check-label" for="kt_modal_update_role_option_0">
                                <div class="fw-bold text-gray-800"><?= htmlspecialchars($role->name) ?></div>
                            </label>
                        </div>
                    </div>
                    <div class='separator separator-dashed my-5'></div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="text-center pt-10">
            <button type="reset" class="btn btn-light me-3" data-kt-users-modal-action="cancel">Discard</button>
            <button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
                <span class="indicator-label">Submit</span>
                <span class="indicator-progress">Please wait...
                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
            </button>
        </div>
    </form>
</div>