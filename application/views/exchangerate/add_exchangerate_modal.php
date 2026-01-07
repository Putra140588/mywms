<div class="modal-header" id="kt_modal_add_user_header">
    <h2 class="fw-bold">Add Exchange Rate</h2>
    <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-modal-action="close">
        <i class="ki-outline ki-cross fs-1"></i>
    </div>
</div>

<div class="modal-body px-5 my-7">
    <form id="kt_modal_add_exchangerate_form" class="form" action="<?= base_url('exchangerate/add') ?>" method="post" enctype="multipart/form-data">
        <div class="d-flex flex-column scroll-y px-5 px-lg-10" id="kt_modal_add_exchangerate_scroll" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_exchangerate_header" data-kt-scroll-wrappers="#kt_modal_add_exchangerate_scroll" data-kt-scroll-offset="300px">
            <div class="d-flex flex-column mb-7 fv-row">
                <label class="required fw-semibold fs-6 mb-2">Currency Foreign</label>
                <select name="curr_foreign" aria-label="Select an Curr Foreign" data-control="select2" data-placeholder="Select an Curr Foreign..." data-dropdown-parent="#kt_modal_add_exchangerate" class="form-select form-select-solid fw-bold">
                    <option value="">Select an Curr Foreign...</option>
                    <?php foreach ($currencies as $currency) : ?>
                        <option value="<?= $currency->code ?>"><?= $currency->code . ' - ' . $currency->name ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="d-flex flex-column mb-7 fv-row">
                <label class="required fw-semibold fs-6 mb-2">Currency Base</label>
                <select name="curr_foreign" aria-label="Select an Curr Base" data-control="select2" data-placeholder="Select an Curr Base..." data-dropdown-parent="#kt_modal_add_exchangerate" class="form-select form-select-solid fw-bold">
                    <option value="">Select an Curr Base...</option>
                    <?php foreach ($currencies as $currency) : ?>
                        <option value="<?= $currency->code ?>"><?= $currency->code . ' - ' . $currency->name ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="fv-row mb-7">
                <label class="required fw-semibold fs-6 mb-2">Rate Amount</label>
                <input type="text" name="rate" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Rate" data-number-only />
            </div>
            <div class="fv-row mb-7">
                <div class="d-flex flex-stack">
                    <div class="me-5">
                        <label class="fs-6 fw-semibold">Set outlet as active ?</label>
                    </div>
                    <label class="form-check form-switch form-check-custom form-check-solid">
                        <input class="form-check-input" name="active" type="checkbox" value="1" checked="checked" />
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