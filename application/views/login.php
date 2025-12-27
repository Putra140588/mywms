<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <title>My Wms - Login</title>
    <meta charset="utf-8" />
    <meta name="description" content="The most advanced Bootstrap 5 Admin Theme with 40 unique prebuilt layouts on Themeforest trusted by 100,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue, Asp.Net Core, Rails, Spring, Blazor, Django, Express.js, Node.js, Flask, Symfony & Laravel versions. Grab your copy now and get life-time updates for free." />
    <meta name="keywords" content="metronic, bootstrap, bootstrap 5, angular, VueJs, React, Asp.Net Core, Rails, Spring, Blazor, Django, Express.js, Node.js, Flask, Symfony & Laravel starter kits, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" href="<?= base_url() ?>assets/media/logos/favicon.ico" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <link href="<?= base_url() ?>assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
</head>

<body id="kt_body" class="app-blank bgi-size-cover bgi-attachment-fixed bgi-position-center bgi-no-repeat">
    <div class="d-flex flex-column flex-root" id="kt_app_root">
        <style>
            body {
                background-image: url('assets/media/auth/bg4.jpg');
            }

            [data-bs-theme="dark"] body {
                background-image: url('assets/media/auth/bg4-dark.jpg');
            }
        </style>
        <div class="d-flex flex-column flex-column-fluid flex-lg-row">

            <div class="d-flex flex-center w-lg-50 pt-15 pt-lg-0 px-10">

                <div class="d-flex flex-center flex-lg-start flex-column">

                    <a href="../../demo55/dist/index.html" class="mb-7">
                        <img alt="Logo" src="<?= base_url() ?>assets/media/logos/mywms-1.png" style="max-height: 200px;" />
                    </a>

                    <h2 class="text-white fw-normal m-0">Warehouse Management System</h2>

                </div>

            </div>

            <div class="d-flex flex-column-fluid flex-lg-row-auto justify-content-center justify-content-lg-end p-12 p-lg-20">
                <div class="bg-body d-flex flex-column align-items-stretch flex-center rounded-4 w-md-600px p-20">
                    <div class="d-flex flex-center flex-column flex-column-fluid px-lg-10 pb-15 pb-lg-20">
                        <form class="form w-100" novalidate="novalidate" id="kt_sign_in_form" data-kt-redirect-url="<?= base_url('dashboard') ?>" action="<?= base_url('login/check') ?>">
                            <div class="text-center mb-11">
                                <h1 class="text-dark fw-bolder mb-3">Sign In</h1>
                                <div class="text-gray-500 fw-semibold fs-6">My WMS</div>
                            </div>

                            <div class="fv-row mb-8">
                                <input type="text" placeholder="User Name" name="username" autocomplete="off" class="form-control bg-transparent" />
                            </div>
                            <div class="fv-row mb-3 position-relative">
                                <input
                                    type="password"
                                    placeholder="Password"
                                    name="password"
                                    autocomplete="off"
                                    class="form-control bg-transparent pe-12"
                                    id="password" />

                                <!-- Toggle Icon -->
                                <span
                                    class="position-absolute top-50 end-0 translate-middle-y me-4 cursor-pointer"
                                    onclick="togglePassword()">
                                    <i class="ki-outline ki-eye fs-2" id="toggleIcon"></i>
                                </span>
                            </div>

                            <div class="d-grid mb-10">
                                <button type="submit" id="kt_sign_in_submit" class="btn btn-primary">
                                    <span class="indicator-label">Sign In</span>
                                    <span class="indicator-progress">Please wait...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script src="<?= base_url() ?>assets/plugins/global/plugins.bundle.js"></script>
    <script src="<?= base_url() ?>assets/js/scripts.bundle.js"></script>
    <script src="<?= base_url() ?>assets/js/custom/authentication/sign-in/general.js"></script>
    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const icon = document.getElementById('toggleIcon');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.remove('ki-eye');
                icon.classList.add('ki-eye-slash');
            } else {
                passwordInput.type = 'password';
                icon.classList.remove('ki-eye-slash');
                icon.classList.add('ki-eye');
            }
        }
    </script>
</body>

</html>