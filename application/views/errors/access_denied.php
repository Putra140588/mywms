<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <div class="d-flex flex-column flex-column-fluid">

        <!-- TOOLBAR -->
        <div id="kt_app_toolbar" class="app-toolbar pt-2 pt-lg-10">
            <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex align-items-stretch">
                <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
                    <div class="page-title d-flex flex-column justify-content-center gap-1 me-3">
                        <h1 class="page-heading text-danger fw-bold fs-3 m-0">
                            Access Denied
                        </h1>
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0">
                            <li class="breadcrumb-item text-muted">
                                <a href="<?= base_url('dashboard'); ?>" class="text-muted text-hover-primary">Home</a>
                            </li>
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-400 w-5px h-2px"></span>
                            </li>
                            <li class="breadcrumb-item text-muted">403</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- CONTENT -->
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-fluid">

                <?php $this->load->view('layouts/global_notif_alert'); ?>

                <div class="card card-bordered">
                    <div class="card-body text-center py-15">

                        <!-- ICON -->
                        <div class="mb-5">
                            <i class="ki-outline ki-lock-2 fs-6x text-danger"></i>
                        </div>

                        <!-- TITLE -->
                        <h2 class="fw-bold text-gray-800 mb-3">
                            Access Denied
                        </h2>

                        <!-- DESC -->
                        <div class="text-muted fs-5 mb-8">
                            You do not have permission to access this page.<br>
                            Please contact the administrator if you believe this is a mistake.
                        </div>

                        <!-- ACTION -->
                        <div class="d-flex justify-content-center gap-3">
                            <a href="<?= base_url('dashboard'); ?>" class="btn btn-light-primary">
                                <i class="ki-outline ki-home fs-4 me-1"></i>
                                Back to Dashboard
                            </a>

                            <a href="<?= base_url('auth/logout'); ?>" class="btn btn-light-danger">
                                <i class="ki-outline ki-exit-right fs-4 me-1"></i>
                                Logout
                            </a>
                        </div>

                    </div>
                </div>

            </div>
        </div>

    </div>

    <?php $this->load->view('layouts/copyright'); ?>
</div>