 <div id="kt_app_sidebar" class="app-sidebar flex-column mt-lg-4 ps-2 pe-2 ps-lg-7 pe-lg-4" data-kt-drawer="true" data-kt-drawer-name="app-sidebar" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="250px" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
     <div class="app-sidebar-logo flex-shrink-0 d-none d-md-flex flex-center align-items-center" id="kt_app_sidebar_logo">
         <!--begin::Logo-->
         <a href="<?= base_url('index') ?>">
             <img alt="Logo" src="assets/media/logos/demo55.svg" class="h-25px d-none d-sm-inline app-sidebar-logo-default theme-light-show" />
             <img alt="Logo" src="assets/media/logos/demo55-dark.svg" class="h-25px theme-dark-show" />
         </a>
         <!--end::Logo-->
         <!--begin::Aside toggle-->
         <div class="d-flex align-items-center d-lg-none ms-n3 me-1" title="Show aside menu">
             <div class="btn btn-icon btn-active-color-primary w-30px h-30px" id="kt_aside_mobile_toggle">
                 <i class="ki-outline ki-abstract-14 fs-1"></i>
             </div>
         </div>
         <!--end::Aside toggle-->
     </div>
     <!--begin::sidebar menu-->
     <div class="app-sidebar-menu flex-column-fluid">
         <!--begin::Menu wrapper-->
         <div id="kt_app_sidebar_menu_wrapper" class="hover-scroll-overlay-y my-5" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer" data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px">
             <!--begin::Menu-->
             <div class="menu menu-column menu-rounded menu-sub-indention fw-bold px-6" id="#kt_app_sidebar_menu" data-kt-menu="true" data-kt-menu-expand="false">
                 <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                     <span class="menu-link">
                         <span class="menu-icon">
                             <i class="ki-outline ki-category fs-2"></i>
                         </span>
                         <span class="menu-title">Dashboards</span>
                         <span class="menu-arrow"></span>
                     </span>
                     <div class="menu-sub menu-sub-accordion">
                         <div class="menu-item">
                             <a class="menu-link" href="<?= base_url('index') ?>" data-url="index">
                                 <span class="menu-bullet">
                                     <span class="bullet bullet-dot"></span>
                                 </span>
                                 <span class="menu-title">Default</span>
                             </a>
                         </div>
                     </div>
                 </div>
                 <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                     <span class="menu-link">
                         <span class="menu-icon">
                             <i class="ki-outline ki-rescue fs-2"></i>
                         </span>
                         <span class="menu-title">Administrator</span>
                         <span class="menu-arrow"></span>
                     </span>
                     <div class="menu-sub menu-sub-accordion">
                         <div class="menu-item">
                             <a class="menu-link" href="<?= base_url('user') ?>" data-url="user">
                                 <span class="menu-bullet">
                                     <span class="bullet bullet-dot"></span>
                                 </span>
                                 <span class="menu-title">User List</span>
                             </a>
                         </div>
                         <div class="menu-item">
                             <a class="menu-link" href="<?= base_url('role') ?>" data-url="role">
                                 <span class="menu-bullet">
                                     <span class="bullet bullet-dot"></span>
                                 </span>
                                 <span class="menu-title">Role</span>
                             </a>
                         </div>
                         <div class="menu-item">
                             <a class="menu-link" href="<?= base_url('access') ?>" data-url="access">
                                 <span class="menu-bullet">
                                     <span class="bullet bullet-dot"></span>
                                 </span>
                                 <span class="menu-title">Access</span>
                             </a>
                         </div>
                         <div class="menu-item">
                             <a class="menu-link" href="<?= base_url('modules') ?>" data-url="modules">
                                 <span class="menu-bullet">
                                     <span class="bullet bullet-dot"></span>
                                 </span>
                                 <span class="menu-title">Modules</span>
                             </a>
                         </div>
                         <div class="menu-item">
                             <a class="menu-link" href="<?= base_url('company') ?>" data-url="company">
                                 <span class="menu-bullet">
                                     <span class="bullet bullet-dot"></span>
                                 </span>
                                 <span class="menu-title">Company</span>
                             </a>
                         </div>
                         <div class="menu-item">
                             <a class="menu-link" href="<?= base_url('currency') ?>" data-url="currency">
                                 <span class="menu-bullet">
                                     <span class="bullet bullet-dot"></span>
                                 </span>
                                 <span class="menu-title">Currency</span>
                             </a>
                         </div>
                     </div>
                 </div>
                 <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                     <span class="menu-link">
                         <span class="menu-icon">
                             <i class="ki-outline ki-abstract-14 fs-2"></i>
                         </span>
                         <span class="menu-title">Product</span>
                         <span class="menu-arrow"></span>
                     </span>
                     <div class="menu-sub menu-sub-accordion">
                         <div class="menu-item">
                             <a class="menu-link" href="<?= base_url('product') ?>" data-url="product">
                                 <span class="menu-bullet">
                                     <span class="bullet bullet-dot"></span>
                                 </span>
                                 <span class="menu-title">Product List</span>
                             </a>
                         </div>
                         <div class="menu-item">
                             <a class="menu-link" href="<?= base_url('category') ?>" data-url="category">
                                 <span class="menu-bullet">
                                     <span class="bullet bullet-dot"></span>
                                 </span>
                                 <span class="menu-title">Category</span>
                             </a>
                         </div>
                     </div>
                 </div>
             </div>
             <!--end::Menu-->
         </div>
         <!--end::Menu wrapper-->
     </div>
     <!--end::sidebar menu-->
     <!--begin::Footer-->
     <div class="app-sidebar-footer d-flex align-items-center px-8 pb-10" id="kt_app_sidebar_footer">
         <!--begin::User-->
         <?php $this->load->view('layouts/userprofile'); ?>
         <!--end::User-->
     </div>
     <!--end::Footer-->
 </div>