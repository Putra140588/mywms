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
                 <!--begin:Menu item-->
                 <div data-kt-menu-trigger="click" class="menu-item here show menu-accordion">
                     <!--begin:Menu link-->
                     <span class="menu-link">
                         <span class="menu-icon">
                             <i class="ki-outline ki-category fs-2"></i>
                         </span>
                         <span class="menu-title">Dashboards</span>
                         <span class="menu-arrow"></span>
                     </span>
                     <!--end:Menu link-->

                 </div>
                 <!--end:Menu item-->
                 <!--begin:Menu item-->
                 <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                     <!--begin:Menu link-->
                     <span class="menu-link">
                         <span class="menu-icon">
                             <i class="ki-outline ki-some-files fs-2"></i>
                         </span>
                         <span class="menu-title">Main Menu</span>
                         <span class="menu-arrow"></span>
                     </span>
                     <!--end:Menu link-->
                     <!--begin:Menu sub-->
                     <div class="menu-sub menu-sub-accordion">
                         <!--begin:Menu item-->
                         <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                             <!--begin:Menu link-->
                             <span class="menu-link">
                                 <span class="menu-bullet">
                                     <span class="bullet bullet-dot"></span>
                                 </span>
                                 <span class="menu-title">User Profile</span>
                                 <span class="menu-arrow"></span>
                             </span>
                             <!--end:Menu link-->
                             <!--begin:Menu sub-->
                             <div class="menu-sub menu-sub-accordion">
                                 <!--begin:Menu item-->
                                 <div class="menu-item">
                                     <!--begin:Menu link-->
                                     <a class="menu-link" href="../../demo55/dist/pages/user-profile/overview.html">
                                         <span class="menu-bullet">
                                             <span class="bullet bullet-dot"></span>
                                         </span>
                                         <span class="menu-title">Overview</span>
                                     </a>
                                     <!--end:Menu link-->
                                 </div>
                                 <!--end:Menu item-->
                                 <!--begin:Menu item-->
                                 <div class="menu-item">
                                     <!--begin:Menu link-->
                                     <a class="menu-link" href="../../demo55/dist/pages/user-profile/projects.html">
                                         <span class="menu-bullet">
                                             <span class="bullet bullet-dot"></span>
                                         </span>
                                         <span class="menu-title">Projects</span>
                                     </a>
                                     <!--end:Menu link-->
                                 </div>
                                 <!--end:Menu item-->
                                 <!--begin:Menu item-->
                                 <div class="menu-item">
                                     <!--begin:Menu link-->
                                     <a class="menu-link" href="../../demo55/dist/pages/user-profile/campaigns.html">
                                         <span class="menu-bullet">
                                             <span class="bullet bullet-dot"></span>
                                         </span>
                                         <span class="menu-title">Campaigns</span>
                                     </a>
                                     <!--end:Menu link-->
                                 </div>
                                 <!--end:Menu item-->
                                 <!--begin:Menu item-->
                                 <div class="menu-item">
                                     <!--begin:Menu link-->
                                     <a class="menu-link" href="../../demo55/dist/pages/user-profile/documents.html">
                                         <span class="menu-bullet">
                                             <span class="bullet bullet-dot"></span>
                                         </span>
                                         <span class="menu-title">Documents</span>
                                     </a>
                                     <!--end:Menu link-->
                                 </div>
                                 <!--end:Menu item-->
                                 <!--begin:Menu item-->
                                 <div class="menu-item">
                                     <!--begin:Menu link-->
                                     <a class="menu-link" href="../../demo55/dist/pages/user-profile/followers.html">
                                         <span class="menu-bullet">
                                             <span class="bullet bullet-dot"></span>
                                         </span>
                                         <span class="menu-title">Followers</span>
                                     </a>
                                     <!--end:Menu link-->
                                 </div>
                                 <!--end:Menu item-->
                                 <!--begin:Menu item-->
                                 <div class="menu-item">
                                     <!--begin:Menu link-->
                                     <a class="menu-link" href="../../demo55/dist/pages/user-profile/activity.html">
                                         <span class="menu-bullet">
                                             <span class="bullet bullet-dot"></span>
                                         </span>
                                         <span class="menu-title">Activity</span>
                                     </a>
                                     <!--end:Menu link-->
                                 </div>
                                 <!--end:Menu item-->
                             </div>
                             <!--end:Menu sub-->
                         </div>
                         <!--end:Menu item-->
                         <!--begin:Menu item-->
                         <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                             <!--begin:Menu link-->
                             <span class="menu-link">
                                 <span class="menu-bullet">
                                     <span class="bullet bullet-dot"></span>
                                 </span>
                                 <span class="menu-title">Account</span>
                                 <span class="menu-arrow"></span>
                             </span>
                             <!--end:Menu link-->
                             <!--begin:Menu sub-->
                             <div class="menu-sub menu-sub-accordion">
                                 <!--begin:Menu item-->
                                 <div class="menu-item">
                                     <!--begin:Menu link-->
                                     <a class="menu-link" href="../../demo55/dist/account/overview.html">
                                         <span class="menu-bullet">
                                             <span class="bullet bullet-dot"></span>
                                         </span>
                                         <span class="menu-title">Overview</span>
                                     </a>
                                     <!--end:Menu link-->
                                 </div>
                                 <!--end:Menu item-->
                                 <!--begin:Menu item-->
                                 <div class="menu-item">
                                     <!--begin:Menu link-->
                                     <a class="menu-link" href="../../demo55/dist/account/settings.html">
                                         <span class="menu-bullet">
                                             <span class="bullet bullet-dot"></span>
                                         </span>
                                         <span class="menu-title">Settings</span>
                                     </a>
                                     <!--end:Menu link-->
                                 </div>
                                 <!--end:Menu item-->
                                 <!--begin:Menu item-->
                                 <div class="menu-item">
                                     <!--begin:Menu link-->
                                     <a class="menu-link" href="../../demo55/dist/account/security.html">
                                         <span class="menu-bullet">
                                             <span class="bullet bullet-dot"></span>
                                         </span>
                                         <span class="menu-title">Security</span>
                                     </a>
                                     <!--end:Menu link-->
                                 </div>
                                 <!--end:Menu item-->
                                 <!--begin:Menu item-->
                                 <div class="menu-item">
                                     <!--begin:Menu link-->
                                     <a class="menu-link" href="../../demo55/dist/account/activity.html">
                                         <span class="menu-bullet">
                                             <span class="bullet bullet-dot"></span>
                                         </span>
                                         <span class="menu-title">Activity</span>
                                     </a>
                                     <!--end:Menu link-->
                                 </div>
                                 <!--end:Menu item-->
                                 <!--begin:Menu item-->
                                 <div class="menu-item">
                                     <!--begin:Menu link-->
                                     <a class="menu-link" href="../../demo55/dist/account/billing.html">
                                         <span class="menu-bullet">
                                             <span class="bullet bullet-dot"></span>
                                         </span>
                                         <span class="menu-title">Billing</span>
                                     </a>
                                     <!--end:Menu link-->
                                 </div>
                                 <!--end:Menu item-->
                                 <!--begin:Menu item-->
                                 <div class="menu-item">
                                     <!--begin:Menu link-->
                                     <a class="menu-link" href="../../demo55/dist/account/statements.html">
                                         <span class="menu-bullet">
                                             <span class="bullet bullet-dot"></span>
                                         </span>
                                         <span class="menu-title">Statements</span>
                                     </a>
                                     <!--end:Menu link-->
                                 </div>
                                 <!--end:Menu item-->
                                 <!--begin:Menu item-->
                                 <div class="menu-item">
                                     <!--begin:Menu link-->
                                     <a class="menu-link" href="../../demo55/dist/account/referrals.html">
                                         <span class="menu-bullet">
                                             <span class="bullet bullet-dot"></span>
                                         </span>
                                         <span class="menu-title">Referrals</span>
                                     </a>
                                     <!--end:Menu link-->
                                 </div>
                                 <!--end:Menu item-->
                                 <!--begin:Menu item-->
                                 <div class="menu-item">
                                     <!--begin:Menu link-->
                                     <a class="menu-link" href="../../demo55/dist/account/api-keys.html">
                                         <span class="menu-bullet">
                                             <span class="bullet bullet-dot"></span>
                                         </span>
                                         <span class="menu-title">API Keys</span>
                                     </a>
                                     <!--end:Menu link-->
                                 </div>
                                 <!--end:Menu item-->
                                 <!--begin:Menu item-->
                                 <div class="menu-item">
                                     <!--begin:Menu link-->
                                     <a class="menu-link" href="../../demo55/dist/account/logs.html">
                                         <span class="menu-bullet">
                                             <span class="bullet bullet-dot"></span>
                                         </span>
                                         <span class="menu-title">Logs</span>
                                     </a>
                                     <!--end:Menu link-->
                                 </div>
                                 <!--end:Menu item-->
                             </div>
                             <!--end:Menu sub-->
                         </div>
                         <!--end:Menu item-->
                         <!--begin:Menu item-->
                         <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                             <!--begin:Menu link-->
                             <span class="menu-link">
                                 <span class="menu-bullet">
                                     <span class="bullet bullet-dot"></span>
                                 </span>
                                 <span class="menu-title">Authentication</span>
                                 <span class="menu-arrow"></span>
                             </span>
                             <!--end:Menu link-->
                             <!--begin:Menu sub-->
                             <div class="menu-sub menu-sub-accordion">
                                 <!--begin:Menu item-->
                                 <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                                     <!--begin:Menu link-->
                                     <span class="menu-link">
                                         <span class="menu-bullet">
                                             <span class="bullet bullet-dot"></span>
                                         </span>
                                         <span class="menu-title">Corporate Layout</span>
                                         <span class="menu-arrow"></span>
                                     </span>
                                     <!--end:Menu link-->
                                     <!--begin:Menu sub-->
                                     <div class="menu-sub menu-sub-accordion menu-active-bg">
                                         <!--begin:Menu item-->
                                         <div class="menu-item">
                                             <!--begin:Menu link-->
                                             <a class="menu-link" href="../../demo55/dist/authentication/layouts/corporate/sign-in.html">
                                                 <span class="menu-bullet">
                                                     <span class="bullet bullet-dot"></span>
                                                 </span>
                                                 <span class="menu-title">Sign-in</span>
                                             </a>
                                             <!--end:Menu link-->
                                         </div>
                                         <!--end:Menu item-->
                                         <!--begin:Menu item-->
                                         <div class="menu-item">
                                             <!--begin:Menu link-->
                                             <a class="menu-link" href="../../demo55/dist/authentication/layouts/corporate/sign-up.html">
                                                 <span class="menu-bullet">
                                                     <span class="bullet bullet-dot"></span>
                                                 </span>
                                                 <span class="menu-title">Sign-up</span>
                                             </a>
                                             <!--end:Menu link-->
                                         </div>
                                         <!--end:Menu item-->
                                         <!--begin:Menu item-->
                                         <div class="menu-item">
                                             <!--begin:Menu link-->
                                             <a class="menu-link" href="../../demo55/dist/authentication/layouts/corporate/two-factor.html">
                                                 <span class="menu-bullet">
                                                     <span class="bullet bullet-dot"></span>
                                                 </span>
                                                 <span class="menu-title">Two-Factor</span>
                                             </a>
                                             <!--end:Menu link-->
                                         </div>
                                         <!--end:Menu item-->
                                         <!--begin:Menu item-->
                                         <div class="menu-item">
                                             <!--begin:Menu link-->
                                             <a class="menu-link" href="../../demo55/dist/authentication/layouts/corporate/reset-password.html">
                                                 <span class="menu-bullet">
                                                     <span class="bullet bullet-dot"></span>
                                                 </span>
                                                 <span class="menu-title">Reset Password</span>
                                             </a>
                                             <!--end:Menu link-->
                                         </div>
                                         <!--end:Menu item-->
                                         <!--begin:Menu item-->
                                         <div class="menu-item">
                                             <!--begin:Menu link-->
                                             <a class="menu-link" href="../../demo55/dist/authentication/layouts/corporate/new-password.html">
                                                 <span class="menu-bullet">
                                                     <span class="bullet bullet-dot"></span>
                                                 </span>
                                                 <span class="menu-title">New Password</span>
                                             </a>
                                             <!--end:Menu link-->
                                         </div>
                                         <!--end:Menu item-->
                                     </div>
                                     <!--end:Menu sub-->
                                 </div>
                                 <!--end:Menu item-->
                                 <!--begin:Menu item-->
                                 <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                                     <!--begin:Menu link-->
                                     <span class="menu-link">
                                         <span class="menu-bullet">
                                             <span class="bullet bullet-dot"></span>
                                         </span>
                                         <span class="menu-title">Overlay Layout</span>
                                         <span class="menu-arrow"></span>
                                     </span>
                                     <!--end:Menu link-->
                                     <!--begin:Menu sub-->
                                     <div class="menu-sub menu-sub-accordion menu-active-bg">
                                         <!--begin:Menu item-->
                                         <div class="menu-item">
                                             <!--begin:Menu link-->
                                             <a class="menu-link" href="../../demo55/dist/authentication/layouts/overlay/sign-in.html">
                                                 <span class="menu-bullet">
                                                     <span class="bullet bullet-dot"></span>
                                                 </span>
                                                 <span class="menu-title">Sign-in</span>
                                             </a>
                                             <!--end:Menu link-->
                                         </div>
                                         <!--end:Menu item-->
                                         <!--begin:Menu item-->
                                         <div class="menu-item">
                                             <!--begin:Menu link-->
                                             <a class="menu-link" href="../../demo55/dist/authentication/layouts/overlay/sign-up.html">
                                                 <span class="menu-bullet">
                                                     <span class="bullet bullet-dot"></span>
                                                 </span>
                                                 <span class="menu-title">Sign-up</span>
                                             </a>
                                             <!--end:Menu link-->
                                         </div>
                                         <!--end:Menu item-->
                                         <!--begin:Menu item-->
                                         <div class="menu-item">
                                             <!--begin:Menu link-->
                                             <a class="menu-link" href="../../demo55/dist/authentication/layouts/overlay/two-factor.html">
                                                 <span class="menu-bullet">
                                                     <span class="bullet bullet-dot"></span>
                                                 </span>
                                                 <span class="menu-title">Two-Factor</span>
                                             </a>
                                             <!--end:Menu link-->
                                         </div>
                                         <!--end:Menu item-->
                                         <!--begin:Menu item-->
                                         <div class="menu-item">
                                             <!--begin:Menu link-->
                                             <a class="menu-link" href="../../demo55/dist/authentication/layouts/overlay/reset-password.html">
                                                 <span class="menu-bullet">
                                                     <span class="bullet bullet-dot"></span>
                                                 </span>
                                                 <span class="menu-title">Reset Password</span>
                                             </a>
                                             <!--end:Menu link-->
                                         </div>
                                         <!--end:Menu item-->
                                         <!--begin:Menu item-->
                                         <div class="menu-item">
                                             <!--begin:Menu link-->
                                             <a class="menu-link" href="../../demo55/dist/authentication/layouts/overlay/new-password.html">
                                                 <span class="menu-bullet">
                                                     <span class="bullet bullet-dot"></span>
                                                 </span>
                                                 <span class="menu-title">New Password</span>
                                             </a>
                                             <!--end:Menu link-->
                                         </div>
                                         <!--end:Menu item-->
                                     </div>
                                     <!--end:Menu sub-->
                                 </div>
                                 <!--end:Menu item-->
                                 <!--begin:Menu item-->
                                 <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                                     <!--begin:Menu link-->
                                     <span class="menu-link">
                                         <span class="menu-bullet">
                                             <span class="bullet bullet-dot"></span>
                                         </span>
                                         <span class="menu-title">Creative Layout</span>
                                         <span class="menu-arrow"></span>
                                     </span>
                                     <!--end:Menu link-->
                                     <!--begin:Menu sub-->
                                     <div class="menu-sub menu-sub-accordion menu-active-bg">
                                         <!--begin:Menu item-->
                                         <div class="menu-item">
                                             <!--begin:Menu link-->
                                             <a class="menu-link" href="../../demo55/dist/authentication/layouts/creative/sign-in.html">
                                                 <span class="menu-bullet">
                                                     <span class="bullet bullet-dot"></span>
                                                 </span>
                                                 <span class="menu-title">Sign-in</span>
                                             </a>
                                             <!--end:Menu link-->
                                         </div>
                                         <!--end:Menu item-->
                                         <!--begin:Menu item-->
                                         <div class="menu-item">
                                             <!--begin:Menu link-->
                                             <a class="menu-link" href="../../demo55/dist/authentication/layouts/creative/sign-up.html">
                                                 <span class="menu-bullet">
                                                     <span class="bullet bullet-dot"></span>
                                                 </span>
                                                 <span class="menu-title">Sign-up</span>
                                             </a>
                                             <!--end:Menu link-->
                                         </div>
                                         <!--end:Menu item-->
                                         <!--begin:Menu item-->
                                         <div class="menu-item">
                                             <!--begin:Menu link-->
                                             <a class="menu-link" href="../../demo55/dist/authentication/layouts/creative/two-factor.html">
                                                 <span class="menu-bullet">
                                                     <span class="bullet bullet-dot"></span>
                                                 </span>
                                                 <span class="menu-title">Two-Factor</span>
                                             </a>
                                             <!--end:Menu link-->
                                         </div>
                                         <!--end:Menu item-->
                                         <!--begin:Menu item-->
                                         <div class="menu-item">
                                             <!--begin:Menu link-->
                                             <a class="menu-link" href="../../demo55/dist/authentication/layouts/creative/reset-password.html">
                                                 <span class="menu-bullet">
                                                     <span class="bullet bullet-dot"></span>
                                                 </span>
                                                 <span class="menu-title">Reset Password</span>
                                             </a>
                                             <!--end:Menu link-->
                                         </div>
                                         <!--end:Menu item-->
                                         <!--begin:Menu item-->
                                         <div class="menu-item">
                                             <!--begin:Menu link-->
                                             <a class="menu-link" href="../../demo55/dist/authentication/layouts/creative/new-password.html">
                                                 <span class="menu-bullet">
                                                     <span class="bullet bullet-dot"></span>
                                                 </span>
                                                 <span class="menu-title">New Password</span>
                                             </a>
                                             <!--end:Menu link-->
                                         </div>
                                         <!--end:Menu item-->
                                     </div>
                                     <!--end:Menu sub-->
                                 </div>
                                 <!--end:Menu item-->
                                 <!--begin:Menu item-->
                                 <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                                     <!--begin:Menu link-->
                                     <span class="menu-link">
                                         <span class="menu-bullet">
                                             <span class="bullet bullet-dot"></span>
                                         </span>
                                         <span class="menu-title">Fancy Layout</span>
                                         <span class="menu-arrow"></span>
                                     </span>
                                     <!--end:Menu link-->
                                     <!--begin:Menu sub-->
                                     <div class="menu-sub menu-sub-accordion menu-active-bg">
                                         <!--begin:Menu item-->
                                         <div class="menu-item">
                                             <!--begin:Menu link-->
                                             <a class="menu-link" href="../../demo55/dist/authentication/layouts/fancy/sign-in.html">
                                                 <span class="menu-bullet">
                                                     <span class="bullet bullet-dot"></span>
                                                 </span>
                                                 <span class="menu-title">Sign-in</span>
                                             </a>
                                             <!--end:Menu link-->
                                         </div>
                                         <!--end:Menu item-->
                                         <!--begin:Menu item-->
                                         <div class="menu-item">
                                             <!--begin:Menu link-->
                                             <a class="menu-link" href="../../demo55/dist/authentication/layouts/fancy/sign-up.html">
                                                 <span class="menu-bullet">
                                                     <span class="bullet bullet-dot"></span>
                                                 </span>
                                                 <span class="menu-title">Sign-up</span>
                                             </a>
                                             <!--end:Menu link-->
                                         </div>
                                         <!--end:Menu item-->
                                         <!--begin:Menu item-->
                                         <div class="menu-item">
                                             <!--begin:Menu link-->
                                             <a class="menu-link" href="../../demo55/dist/authentication/layouts/fancy/two-factor.html">
                                                 <span class="menu-bullet">
                                                     <span class="bullet bullet-dot"></span>
                                                 </span>
                                                 <span class="menu-title">Two-Factor</span>
                                             </a>
                                             <!--end:Menu link-->
                                         </div>
                                         <!--end:Menu item-->
                                         <!--begin:Menu item-->
                                         <div class="menu-item">
                                             <!--begin:Menu link-->
                                             <a class="menu-link" href="../../demo55/dist/authentication/layouts/fancy/reset-password.html">
                                                 <span class="menu-bullet">
                                                     <span class="bullet bullet-dot"></span>
                                                 </span>
                                                 <span class="menu-title">Reset Password</span>
                                             </a>
                                             <!--end:Menu link-->
                                         </div>
                                         <!--end:Menu item-->
                                         <!--begin:Menu item-->
                                         <div class="menu-item">
                                             <!--begin:Menu link-->
                                             <a class="menu-link" href="../../demo55/dist/authentication/layouts/fancy/new-password.html">
                                                 <span class="menu-bullet">
                                                     <span class="bullet bullet-dot"></span>
                                                 </span>
                                                 <span class="menu-title">New Password</span>
                                             </a>
                                             <!--end:Menu link-->
                                         </div>
                                         <!--end:Menu item-->
                                     </div>
                                     <!--end:Menu sub-->
                                 </div>
                                 <!--end:Menu item-->
                                 <!--begin:Menu item-->
                                 <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                                     <!--begin:Menu link-->
                                     <span class="menu-link">
                                         <span class="menu-bullet">
                                             <span class="bullet bullet-dot"></span>
                                         </span>
                                         <span class="menu-title">Email Templates</span>
                                         <span class="menu-arrow"></span>
                                     </span>
                                     <!--end:Menu link-->
                                     <!--begin:Menu sub-->
                                     <div class="menu-sub menu-sub-accordion menu-active-bg">
                                         <!--begin:Menu item-->
                                         <div class="menu-item">
                                             <!--begin:Menu link-->
                                             <a class="menu-link" href="../../demo55/dist/authentication/email/welcome-message.html">
                                                 <span class="menu-bullet">
                                                     <span class="bullet bullet-dot"></span>
                                                 </span>
                                                 <span class="menu-title">Welcome Message</span>
                                             </a>
                                             <!--end:Menu link-->
                                         </div>
                                         <!--end:Menu item-->
                                         <!--begin:Menu item-->
                                         <div class="menu-item">
                                             <!--begin:Menu link-->
                                             <a class="menu-link" href="../../demo55/dist/authentication/email/reset-password.html">
                                                 <span class="menu-bullet">
                                                     <span class="bullet bullet-dot"></span>
                                                 </span>
                                                 <span class="menu-title">Reset Password</span>
                                             </a>
                                             <!--end:Menu link-->
                                         </div>
                                         <!--end:Menu item-->
                                         <!--begin:Menu item-->
                                         <div class="menu-item">
                                             <!--begin:Menu link-->
                                             <a class="menu-link" href="../../demo55/dist/authentication/email/subscription-confirmed.html">
                                                 <span class="menu-bullet">
                                                     <span class="bullet bullet-dot"></span>
                                                 </span>
                                                 <span class="menu-title">Subscription Confirmed</span>
                                             </a>
                                             <!--end:Menu link-->
                                         </div>
                                         <!--end:Menu item-->
                                         <!--begin:Menu item-->
                                         <div class="menu-item">
                                             <!--begin:Menu link-->
                                             <a class="menu-link" href="../../demo55/dist/authentication/email/card-declined.html">
                                                 <span class="menu-bullet">
                                                     <span class="bullet bullet-dot"></span>
                                                 </span>
                                                 <span class="menu-title">Credit Card Declined</span>
                                             </a>
                                             <!--end:Menu link-->
                                         </div>
                                         <!--end:Menu item-->
                                         <!--begin:Menu item-->
                                         <div class="menu-item">
                                             <!--begin:Menu link-->
                                             <a class="menu-link" href="../../demo55/dist/authentication/email/promo-1.html">
                                                 <span class="menu-bullet">
                                                     <span class="bullet bullet-dot"></span>
                                                 </span>
                                                 <span class="menu-title">Promo 1</span>
                                             </a>
                                             <!--end:Menu link-->
                                         </div>
                                         <!--end:Menu item-->
                                         <!--begin:Menu item-->
                                         <div class="menu-item">
                                             <!--begin:Menu link-->
                                             <a class="menu-link" href="../../demo55/dist/authentication/email/promo-2.html">
                                                 <span class="menu-bullet">
                                                     <span class="bullet bullet-dot"></span>
                                                 </span>
                                                 <span class="menu-title">Promo 2</span>
                                             </a>
                                             <!--end:Menu link-->
                                         </div>
                                         <!--end:Menu item-->
                                         <!--begin:Menu item-->
                                         <div class="menu-item">
                                             <!--begin:Menu link-->
                                             <a class="menu-link" href="../../demo55/dist/authentication/email/promo-3.html">
                                                 <span class="menu-bullet">
                                                     <span class="bullet bullet-dot"></span>
                                                 </span>
                                                 <span class="menu-title">Promo 3</span>
                                             </a>
                                             <!--end:Menu link-->
                                         </div>
                                         <!--end:Menu item-->
                                     </div>
                                     <!--end:Menu sub-->
                                 </div>
                                 <!--end:Menu item-->
                                 <!--begin:Menu item-->
                                 <div class="menu-item">
                                     <!--begin:Menu link-->
                                     <a class="menu-link" href="../../demo55/dist/authentication/extended/multi-steps-sign-up.html">
                                         <span class="menu-bullet">
                                             <span class="bullet bullet-dot"></span>
                                         </span>
                                         <span class="menu-title">Multi-steps Sign-up</span>
                                     </a>
                                     <!--end:Menu link-->
                                 </div>
                                 <!--end:Menu item-->
                                 <!--begin:Menu item-->
                                 <div class="menu-item">
                                     <!--begin:Menu link-->
                                     <a class="menu-link" href="../../demo55/dist/authentication/general/welcome.html">
                                         <span class="menu-bullet">
                                             <span class="bullet bullet-dot"></span>
                                         </span>
                                         <span class="menu-title">Welcome Message</span>
                                     </a>
                                     <!--end:Menu link-->
                                 </div>
                                 <!--end:Menu item-->
                                 <!--begin:Menu item-->
                                 <div class="menu-item">
                                     <!--begin:Menu link-->
                                     <a class="menu-link" href="../../demo55/dist/authentication/general/verify-email.html">
                                         <span class="menu-bullet">
                                             <span class="bullet bullet-dot"></span>
                                         </span>
                                         <span class="menu-title">Verify Email</span>
                                     </a>
                                     <!--end:Menu link-->
                                 </div>
                                 <!--end:Menu item-->
                                 <!--begin:Menu item-->
                                 <div class="menu-item">
                                     <!--begin:Menu link-->
                                     <a class="menu-link" href="../../demo55/dist/authentication/general/coming-soon.html">
                                         <span class="menu-bullet">
                                             <span class="bullet bullet-dot"></span>
                                         </span>
                                         <span class="menu-title">Coming Soon</span>
                                     </a>
                                     <!--end:Menu link-->
                                 </div>
                                 <!--end:Menu item-->
                                 <!--begin:Menu item-->
                                 <div class="menu-item">
                                     <!--begin:Menu link-->
                                     <a class="menu-link" href="../../demo55/dist/authentication/general/password-confirmation.html">
                                         <span class="menu-bullet">
                                             <span class="bullet bullet-dot"></span>
                                         </span>
                                         <span class="menu-title">Password Confirmation</span>
                                     </a>
                                     <!--end:Menu link-->
                                 </div>
                                 <!--end:Menu item-->
                                 <!--begin:Menu item-->
                                 <div class="menu-item">
                                     <!--begin:Menu link-->
                                     <a class="menu-link" href="../../demo55/dist/authentication/general/account-deactivated.html">
                                         <span class="menu-bullet">
                                             <span class="bullet bullet-dot"></span>
                                         </span>
                                         <span class="menu-title">Account Deactivation</span>
                                     </a>
                                     <!--end:Menu link-->
                                 </div>
                                 <!--end:Menu item-->
                                 <!--begin:Menu item-->
                                 <div class="menu-item">
                                     <!--begin:Menu link-->
                                     <a class="menu-link" href="../../demo55/dist/authentication/general/error-404.html">
                                         <span class="menu-bullet">
                                             <span class="bullet bullet-dot"></span>
                                         </span>
                                         <span class="menu-title">Error 404</span>
                                     </a>
                                     <!--end:Menu link-->
                                 </div>
                                 <!--end:Menu item-->
                                 <!--begin:Menu item-->
                                 <div class="menu-item">
                                     <!--begin:Menu link-->
                                     <a class="menu-link" href="../../demo55/dist/authentication/general/error-500.html">
                                         <span class="menu-bullet">
                                             <span class="bullet bullet-dot"></span>
                                         </span>
                                         <span class="menu-title">Error 500</span>
                                     </a>
                                     <!--end:Menu link-->
                                 </div>
                                 <!--end:Menu item-->
                             </div>
                             <!--end:Menu sub-->
                         </div>
                         <!--end:Menu item-->
                         <!--begin:Menu item-->
                         <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                             <!--begin:Menu link-->
                             <span class="menu-link">
                                 <span class="menu-bullet">
                                     <span class="bullet bullet-dot"></span>
                                 </span>
                                 <span class="menu-title">Corporate</span>
                                 <span class="menu-arrow"></span>
                             </span>
                             <!--end:Menu link-->
                             <!--begin:Menu sub-->
                             <div class="menu-sub menu-sub-accordion">
                                 <!--begin:Menu item-->
                                 <div class="menu-item">
                                     <!--begin:Menu link-->
                                     <a class="menu-link" href="../../demo55/dist/pages/about.html">
                                         <span class="menu-bullet">
                                             <span class="bullet bullet-dot"></span>
                                         </span>
                                         <span class="menu-title">About</span>
                                     </a>
                                     <!--end:Menu link-->
                                 </div>
                                 <!--end:Menu item-->
                                 <!--begin:Menu item-->
                                 <div class="menu-item">
                                     <!--begin:Menu link-->
                                     <a class="menu-link" href="../../demo55/dist/pages/team.html">
                                         <span class="menu-bullet">
                                             <span class="bullet bullet-dot"></span>
                                         </span>
                                         <span class="menu-title">Our Team</span>
                                     </a>
                                     <!--end:Menu link-->
                                 </div>
                                 <!--end:Menu item-->
                                 <!--begin:Menu item-->
                                 <div class="menu-item">
                                     <!--begin:Menu link-->
                                     <a class="menu-link" href="../../demo55/dist/pages/contact.html">
                                         <span class="menu-bullet">
                                             <span class="bullet bullet-dot"></span>
                                         </span>
                                         <span class="menu-title">Contact Us</span>
                                     </a>
                                     <!--end:Menu link-->
                                 </div>
                                 <!--end:Menu item-->
                                 <!--begin:Menu item-->
                                 <div class="menu-item">
                                     <!--begin:Menu link-->
                                     <a class="menu-link" href="../../demo55/dist/pages/licenses.html">
                                         <span class="menu-bullet">
                                             <span class="bullet bullet-dot"></span>
                                         </span>
                                         <span class="menu-title">Licenses</span>
                                     </a>
                                     <!--end:Menu link-->
                                 </div>
                                 <!--end:Menu item-->
                                 <!--begin:Menu item-->
                                 <div class="menu-item">
                                     <!--begin:Menu link-->
                                     <a class="menu-link" href="../../demo55/dist/pages/sitemap.html">
                                         <span class="menu-bullet">
                                             <span class="bullet bullet-dot"></span>
                                         </span>
                                         <span class="menu-title">Sitemap</span>
                                     </a>
                                     <!--end:Menu link-->
                                 </div>
                                 <!--end:Menu item-->
                             </div>
                             <!--end:Menu sub-->
                         </div>
                         <!--end:Menu item-->
                         <!--begin:Menu item-->
                         <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                             <!--begin:Menu link-->
                             <span class="menu-link">
                                 <span class="menu-bullet">
                                     <span class="bullet bullet-dot"></span>
                                 </span>
                                 <span class="menu-title">Social</span>
                                 <span class="menu-arrow"></span>
                             </span>
                             <!--end:Menu link-->
                             <!--begin:Menu sub-->
                             <div class="menu-sub menu-sub-accordion">
                                 <!--begin:Menu item-->
                                 <div class="menu-item">
                                     <!--begin:Menu link-->
                                     <a class="menu-link" href="../../demo55/dist/pages/social/feeds.html">
                                         <span class="menu-bullet">
                                             <span class="bullet bullet-dot"></span>
                                         </span>
                                         <span class="menu-title">Feeds</span>
                                     </a>
                                     <!--end:Menu link-->
                                 </div>
                                 <!--end:Menu item-->
                                 <!--begin:Menu item-->
                                 <div class="menu-item">
                                     <!--begin:Menu link-->
                                     <a class="menu-link" href="../../demo55/dist/pages/social/activity.html">
                                         <span class="menu-bullet">
                                             <span class="bullet bullet-dot"></span>
                                         </span>
                                         <span class="menu-title">Activty</span>
                                     </a>
                                     <!--end:Menu link-->
                                 </div>
                                 <!--end:Menu item-->
                                 <!--begin:Menu item-->
                                 <div class="menu-item">
                                     <!--begin:Menu link-->
                                     <a class="menu-link" href="../../demo55/dist/pages/social/followers.html">
                                         <span class="menu-bullet">
                                             <span class="bullet bullet-dot"></span>
                                         </span>
                                         <span class="menu-title">Followers</span>
                                     </a>
                                     <!--end:Menu link-->
                                 </div>
                                 <!--end:Menu item-->
                                 <!--begin:Menu item-->
                                 <div class="menu-item">
                                     <!--begin:Menu link-->
                                     <a class="menu-link" href="../../demo55/dist/pages/social/settings.html">
                                         <span class="menu-bullet">
                                             <span class="bullet bullet-dot"></span>
                                         </span>
                                         <span class="menu-title">Settings</span>
                                     </a>
                                     <!--end:Menu link-->
                                 </div>
                                 <!--end:Menu item-->
                             </div>
                             <!--end:Menu sub-->
                         </div>
                         <!--end:Menu item-->
                         <!--begin:Menu item-->
                         <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                             <!--begin:Menu link-->
                             <span class="menu-link">
                                 <span class="menu-bullet">
                                     <span class="bullet bullet-dot"></span>
                                 </span>
                                 <span class="menu-title">Blog</span>
                                 <span class="menu-arrow"></span>
                             </span>
                             <!--end:Menu link-->
                             <!--begin:Menu sub-->
                             <div class="menu-sub menu-sub-accordion menu-active-bg">
                                 <!--begin:Menu item-->
                                 <div class="menu-item">
                                     <!--begin:Menu link-->
                                     <a class="menu-link" href="../../demo55/dist/pages/blog/home.html">
                                         <span class="menu-bullet">
                                             <span class="bullet bullet-dot"></span>
                                         </span>
                                         <span class="menu-title">Blog Home</span>
                                     </a>
                                     <!--end:Menu link-->
                                 </div>
                                 <!--end:Menu item-->
                                 <!--begin:Menu item-->
                                 <div class="menu-item">
                                     <!--begin:Menu link-->
                                     <a class="menu-link" href="../../demo55/dist/pages/blog/post.html">
                                         <span class="menu-bullet">
                                             <span class="bullet bullet-dot"></span>
                                         </span>
                                         <span class="menu-title">Blog Post</span>
                                     </a>
                                     <!--end:Menu link-->
                                 </div>
                                 <!--end:Menu item-->
                             </div>
                             <!--end:Menu sub-->
                         </div>
                         <!--end:Menu item-->
                         <!--begin:Menu item-->
                         <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                             <!--begin:Menu link-->
                             <span class="menu-link">
                                 <span class="menu-bullet">
                                     <span class="bullet bullet-dot"></span>
                                 </span>
                                 <span class="menu-title">FAQ</span>
                                 <span class="menu-arrow"></span>
                             </span>
                             <!--end:Menu link-->
                             <!--begin:Menu sub-->
                             <div class="menu-sub menu-sub-accordion menu-active-bg">
                                 <!--begin:Menu item-->
                                 <div class="menu-item">
                                     <!--begin:Menu link-->
                                     <a class="menu-link" href="../../demo55/dist/pages/faq/classic.html">
                                         <span class="menu-bullet">
                                             <span class="bullet bullet-dot"></span>
                                         </span>
                                         <span class="menu-title">FAQ Classic</span>
                                     </a>
                                     <!--end:Menu link-->
                                 </div>
                                 <!--end:Menu item-->
                                 <!--begin:Menu item-->
                                 <div class="menu-item">
                                     <!--begin:Menu link-->
                                     <a class="menu-link" href="../../demo55/dist/pages/faq/extended.html">
                                         <span class="menu-bullet">
                                             <span class="bullet bullet-dot"></span>
                                         </span>
                                         <span class="menu-title">FAQ Extended</span>
                                     </a>
                                     <!--end:Menu link-->
                                 </div>
                                 <!--end:Menu item-->
                             </div>
                             <!--end:Menu sub-->
                         </div>
                         <!--end:Menu item-->
                         <!--begin:Menu item-->
                         <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                             <!--begin:Menu link-->
                             <span class="menu-link">
                                 <span class="menu-bullet">
                                     <span class="bullet bullet-dot"></span>
                                 </span>
                                 <span class="menu-title">Pricing</span>
                                 <span class="menu-arrow"></span>
                             </span>
                             <!--end:Menu link-->
                             <!--begin:Menu sub-->
                             <div class="menu-sub menu-sub-accordion menu-active-bg">
                                 <!--begin:Menu item-->
                                 <div class="menu-item">
                                     <!--begin:Menu link-->
                                     <a class="menu-link" href="../../demo55/dist/pages/pricing.html">
                                         <span class="menu-bullet">
                                             <span class="bullet bullet-dot"></span>
                                         </span>
                                         <span class="menu-title">Column Pricing</span>
                                     </a>
                                     <!--end:Menu link-->
                                 </div>
                                 <!--end:Menu item-->
                                 <!--begin:Menu item-->
                                 <div class="menu-item">
                                     <!--begin:Menu link-->
                                     <a class="menu-link" href="../../demo55/dist/pages/pricing/table.html">
                                         <span class="menu-bullet">
                                             <span class="bullet bullet-dot"></span>
                                         </span>
                                         <span class="menu-title">Table Pricing</span>
                                     </a>
                                     <!--end:Menu link-->
                                 </div>
                                 <!--end:Menu item-->
                             </div>
                             <!--end:Menu sub-->
                         </div>
                         <!--end:Menu item-->
                         <!--begin:Menu item-->
                         <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                             <!--begin:Menu link-->
                             <span class="menu-link">
                                 <span class="menu-bullet">
                                     <span class="bullet bullet-dot"></span>
                                 </span>
                                 <span class="menu-title">Careers</span>
                                 <span class="menu-arrow"></span>
                             </span>
                             <!--end:Menu link-->
                             <!--begin:Menu sub-->
                             <div class="menu-sub menu-sub-accordion">
                                 <!--begin:Menu item-->
                                 <div class="menu-item">
                                     <!--begin:Menu link-->
                                     <a class="menu-link" href="../../demo55/dist/pages/careers/list.html">
                                         <span class="menu-bullet">
                                             <span class="bullet bullet-dot"></span>
                                         </span>
                                         <span class="menu-title">Careers List</span>
                                     </a>
                                     <!--end:Menu link-->
                                 </div>
                                 <!--end:Menu item-->
                                 <!--begin:Menu item-->
                                 <div class="menu-item">
                                     <!--begin:Menu link-->
                                     <a class="menu-link" href="../../demo55/dist/pages/careers/apply.html">
                                         <span class="menu-bullet">
                                             <span class="bullet bullet-dot"></span>
                                         </span>
                                         <span class="menu-title">Careers Apply</span>
                                     </a>
                                     <!--end:Menu link-->
                                 </div>
                                 <!--end:Menu item-->
                             </div>
                             <!--end:Menu sub-->
                         </div>
                         <!--end:Menu item-->
                         <!--begin:Menu item-->
                         <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                             <!--begin:Menu link-->
                             <span class="menu-link">
                                 <span class="menu-bullet">
                                     <span class="bullet bullet-dot"></span>
                                 </span>
                                 <span class="menu-title">Widgets</span>
                                 <span class="menu-arrow"></span>
                             </span>
                             <!--end:Menu link-->
                             <!--begin:Menu sub-->
                             <div class="menu-sub menu-sub-accordion">
                                 <!--begin:Menu item-->
                                 <div class="menu-item">
                                     <!--begin:Menu link-->
                                     <a class="menu-link" href="../../demo55/dist/widgets/lists.html">
                                         <span class="menu-bullet">
                                             <span class="bullet bullet-dot"></span>
                                         </span>
                                         <span class="menu-title">Lists</span>
                                     </a>
                                     <!--end:Menu link-->
                                 </div>
                                 <!--end:Menu item-->
                                 <!--begin:Menu item-->
                                 <div class="menu-item">
                                     <!--begin:Menu link-->
                                     <a class="menu-link" href="../../demo55/dist/widgets/statistics.html">
                                         <span class="menu-bullet">
                                             <span class="bullet bullet-dot"></span>
                                         </span>
                                         <span class="menu-title">Statistics</span>
                                     </a>
                                     <!--end:Menu link-->
                                 </div>
                                 <!--end:Menu item-->
                                 <!--begin:Menu item-->
                                 <div class="menu-item">
                                     <!--begin:Menu link-->
                                     <a class="menu-link" href="../../demo55/dist/widgets/charts.html">
                                         <span class="menu-bullet">
                                             <span class="bullet bullet-dot"></span>
                                         </span>
                                         <span class="menu-title">Charts</span>
                                     </a>
                                     <!--end:Menu link-->
                                 </div>
                                 <!--end:Menu item-->
                                 <!--begin:Menu item-->
                                 <div class="menu-item">
                                     <!--begin:Menu link-->
                                     <a class="menu-link" href="../../demo55/dist/widgets/mixed.html">
                                         <span class="menu-bullet">
                                             <span class="bullet bullet-dot"></span>
                                         </span>
                                         <span class="menu-title">Mixed</span>
                                     </a>
                                     <!--end:Menu link-->
                                 </div>
                                 <!--end:Menu item-->
                                 <!--begin:Menu item-->
                                 <div class="menu-item">
                                     <!--begin:Menu link-->
                                     <a class="menu-link" href="../../demo55/dist/widgets/tables.html">
                                         <span class="menu-bullet">
                                             <span class="bullet bullet-dot"></span>
                                         </span>
                                         <span class="menu-title">Tables</span>
                                     </a>
                                     <!--end:Menu link-->
                                 </div>
                                 <!--end:Menu item-->
                                 <!--begin:Menu item-->
                                 <div class="menu-item">
                                     <!--begin:Menu link-->
                                     <a class="menu-link" href="../../demo55/dist/widgets/feeds.html">
                                         <span class="menu-bullet">
                                             <span class="bullet bullet-dot"></span>
                                         </span>
                                         <span class="menu-title">Feeds</span>
                                     </a>
                                     <!--end:Menu link-->
                                 </div>
                                 <!--end:Menu item-->
                             </div>
                             <!--end:Menu sub-->
                         </div>
                         <!--end:Menu item-->
                     </div>
                     <!--end:Menu sub-->
                 </div>
                 <!--end:Menu item-->


             </div>
             <!--end::Menu-->
         </div>
         <!--end::Menu wrapper-->
     </div>
     <!--end::sidebar menu-->
     <!--begin::Footer-->
     <div class="app-sidebar-footer d-flex align-items-center px-8 pb-10" id="kt_app_sidebar_footer">
         <!--begin::User-->
         <?php $this->load->view('layout/userprofile'); ?>
         <!--end::User-->
     </div>
     <!--end::Footer-->
 </div>