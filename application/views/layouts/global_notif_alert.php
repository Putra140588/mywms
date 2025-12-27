<?php if ($this->session->flashdata('success')): ?>
    <div class="alert alert-success d-flex align-items-center p-5 mb-5 position-relative global-notif-alert">
        <i class="ki-outline ki-check-circle fs-2hx text-success me-4"></i>
        <div class="d-flex flex-column">
            <h4 class="mb-1">Success</h4>
            <span><?php echo $this->session->flashdata('success'); ?></span>
        </div>
        <button type="button" class="btn-close position-absolute top-0 end-0 m-3" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>
<?php if ($this->session->flashdata('warning')): ?>
    <div class="alert alert-warning d-flex align-items-center p-5 mb-5 position-relative global-notif-alert">
        <i class="ki-outline ki-information-5 fs-2hx text-warning me-4"></i>
        <div class="d-flex flex-column">
            <h4 class="mb-1">Warning</h4>
            <span><?php echo $this->session->flashdata('warning'); ?></span>
        </div>
        <button type="button" class="btn-close position-absolute top-0 end-0 m-3" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>
<?php if ($this->session->flashdata('danger')): ?>
    <div class="alert alert-danger d-flex align-items-center p-5 mb-5 position-relative global-notif-alert">
        <i class="ki-outline ki-cross-circle fs-2hx text-danger me-4"></i>
        <div class="d-flex flex-column">
            <h4 class="mb-1">Error</h4>
            <span><?php echo $this->session->flashdata('danger'); ?></span>
        </div>
        <button type="button" class="btn-close position-absolute top-0 end-0 m-3" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>
<?php if ($this->session->flashdata('info')): ?>
    <div class="alert alert-info d-flex align-items-center p-5 mb-5 position-relative global-notif-alert">
        <i class="ki-outline ki-question fs-2hx text-info me-4"></i>
        <div class="d-flex flex-column">
            <h4 class="mb-1">Info</h4>
            <span><?php echo $this->session->flashdata('info'); ?></span>
        </div>
        <button type="button" class="btn-close position-absolute top-0 end-0 m-3" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>