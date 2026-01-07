<div class="modal-header" id="kt_modal_add_user_header">
    <h2 class="fw-bold">Add Module</h2>
    <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-modal-action="close">
        <i class="ki-outline ki-cross fs-1"></i>
    </div>
</div>

<div class="modal-body px-5 my-7">
    <form id="kt_modal_add_module_form" class="form" action="<?= base_url('modules/edit') ?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="module_id" value="<?= isset($module) ? htmlspecialchars($module->id) : '' ?>">
        <div class="d-flex flex-column scroll-y px-5 px-lg-10" id="kt_modal_add_module_scroll" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_module_header" data-kt-scroll-wrappers="#kt_modal_add_module_scroll" data-kt-scroll-offset="300px">
            <div class="fv-row mb-7">
                <label class="required fw-semibold fs-6 mb-2">Module Name</label>
                <input type="text" name="name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Module name" value="<?= isset($module) ? htmlspecialchars($module->name) : '' ?>" />
            </div>
            <div class="fv-row mb-7">
                <label class="required fw-semibold fs-6 mb-2">Url</label>
                <input type="text" name="url" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Module url" value="<?= isset($module) ? htmlspecialchars($module->url) : '' ?>" />
            </div>
            <div class="d-flex flex-column mb-7 fv-row">
                <label class="required fw-semibold fs-6 mb-2">Parent Module</label>
                <select name="parentid" aria-label="Select a Parent Module" data-control="select2" data-placeholder="Select a Parent Module..." data-dropdown-parent="#kt_modal_add_modules" class="form-select form-select-solid fw-bold">
                    <option value="">Select a Parent Module...</option>
                    <option value="0" <?= (isset($module) && $module->parentid == 0) ? 'selected' : '' ?>>No Parent</option>
                    <?php foreach ($modules as $mod) : ?>
                        <option value="<?= htmlspecialchars($mod->id) ?>" <?= (isset($module) && $module->parentid == $mod->id) ? 'selected' : '' ?>><?= htmlspecialchars($mod->name) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="d-flex flex-column mb-7 fv-row">
                <label class="required fw-semibold fs-6 mb-2">Number Sort</label>
                <select name="sort" aria-label="Select a Number Sort" data-control="select2" data-placeholder="Select a Number Sort..." data-dropdown-parent="#kt_modal_add_modules" class="form-select form-select-solid fw-bold">
                    <option value="">Select a Number Sort...</option>
                    <?php for ($i = 1; $i <= 50; $i++) : ?>
                        <option value="<?= $i ?>" <?= (isset($module) && $module->sort == $i) ? 'selected' : '' ?>><?= $i ?></option>
                    <?php endfor; ?>
                </select>
            </div>
            <div class="fv-row mb-7">
                <label class="fw-semibold fs-6 mb-2">Icon</label>
                <input type="text" name="icon" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Module icon" value="<?= isset($module) ? htmlspecialchars($module->icon) : '' ?>" />
            </div>
            <div class="fv-row mb-7">
                <label class="required fw-semibold fs-6 mb-2">Data Url</label>
                <input type="text" name="data_url" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Module data url" value="<?= isset($module) ? htmlspecialchars($module->data_url) : '' ?>" />
            </div>
            <div class="fv-row mb-7">
                <div class="d-flex flex-stack">
                    <div class="me-5">
                        <label class="fs-6 fw-semibold">Set module as active ?</label>
                    </div>
                    <label class="form-check form-switch form-check-custom form-check-solid">
                        <input class="form-check-input" name="active" type="checkbox" value="1" <?= (isset($module) && $module->active) ? 'checked="checked"' : '' ?> />
                        <span class="form-check-label fw-semibold text-muted">Yes</span>
                    </label>
                </div>
            </div>

        </div>
        <div class="text-center pt-10">
            <button type="reset" class="btn btn-light me-3" data-kt-modal-action="cancel">Discard</button>
            <button type="submit" class="btn btn-primary" data-kt-modal-action="submit">
                <span class="indicator-label">Submit</span>
                <span class="indicator-progress">Please wait...
                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
            </button>
        </div>
    </form>
</div>