 <div id="kt_app_sidebar" class="app-sidebar flex-column mt-lg-4 ps-2 pe-2 ps-lg-7 pe-lg-4" data-kt-drawer="true" data-kt-drawer-name="app-sidebar" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="250px" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
     <div class="app-sidebar-logo flex-shrink-0 d-none d-md-flex flex-center align-items-center" id="kt_app_sidebar_logo">
         <!--begin::Logo-->
         <a href="<?= base_url('dashboard') ?>">
             <img alt="Logo" src="<?= base_url() ?>assets/media/logos/mywms-1.png" class="h-100px d-none d-sm-inline app-sidebar-logo-default theme-light-show" />
             <img alt="Logo" src="<?= base_url() ?>assets/media/logos/mywms-1.png" class="h-100px theme-dark-show" />
         </a>
         <div class="d-flex align-items-center d-lg-none ms-n3 me-1" title="Show aside menu">
             <div class="btn btn-icon btn-active-color-primary w-30px h-30px" id="kt_aside_mobile_toggle">
                 <i class="ki-outline ki-abstract-14 fs-1"></i>
             </div>
         </div>
     </div>
     <div class="app-sidebar-menu flex-column-fluid">
         <div id="kt_app_sidebar_menu_wrapper" class="hover-scroll-overlay-y my-5" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer" data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px">
             <div class="menu menu-column menu-rounded menu-sub-indention fw-bold px-6" id="#kt_app_sidebar_menu" data-kt-menu="true" data-kt-menu-expand="false">
                 <?php foreach ($modules as $menu): ?>
                     <?php if (!empty($menu['child'])): ?>
                         <!-- MENU PARENT -->
                         <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                             <span class="menu-link">
                                 <span class="menu-icon">
                                     <i class="<?= $menu['icon']; ?>"></i>
                                 </span>
                                 <span class="menu-title"><?= $menu['name']; ?></span>
                                 <span class="menu-arrow"></span>
                             </span>

                             <div class="menu-sub menu-sub-accordion">
                                 <?php foreach ($menu['child'] as $child): ?>
                                     <div class="menu-item">
                                         <a class="menu-link"
                                             href="<?= base_url($child['url']); ?>"
                                             data-url="<?= $child['data_url']; ?>">
                                             <span class="menu-bullet">
                                                 <span class="bullet bullet-dot"></span>
                                             </span>
                                             <span class="menu-title"><?= $child['name']; ?></span>
                                         </a>
                                     </div>
                                 <?php endforeach; ?>
                             </div>
                         </div>

                     <?php else: ?>
                         <!-- MENU TANPA CHILD -->
                         <div class="menu-item">
                             <a class="menu-link"
                                 href="<?= base_url($menu['url']); ?>">
                                 <span class="menu-icon">
                                     <i class="<?= $menu['icon']; ?>"></i>
                                 </span>
                                 <span class="menu-title"><?= $menu['name']; ?></span>
                             </a>
                         </div>
                     <?php endif; ?>
                 <?php endforeach; ?>
             </div>
         </div>
     </div>
     <div class="app-sidebar-footer d-flex align-items-center px-8 pb-10" id="kt_app_sidebar_footer">
         <?php $this->load->view('layouts/userprofile'); ?>
     </div>
 </div>