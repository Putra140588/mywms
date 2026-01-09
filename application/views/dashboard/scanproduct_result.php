<div class="d-flex flex-column scroll-y px-5 px-lg-10" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_scan_product_header" data-kt-scroll-wrappers="#kt_modal_scan_product_scroll" data-kt-scroll-offset="300px">
    <div class="text-center mb-13">
        <div class="me-7 mb-4">
            <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
                <img src="<?= base_url() ?>assets/media/products/regulator_assembly.webp" alt="image">

            </div>
        </div>
        <h1 class="mb-3">Regulator assembly DX BB005</h1>
        <div class="text-muted fw-semibold fs-5">
            Part Number: <?= htmlspecialchars($barcode) ?><br>
            Model: Grinder BB005<br>
        </div>

    </div>
    <div class="mb-15">
        <!--begin::List-->
        <div class="mh-375px scroll-y me-n7 pe-7">
            <!--begin::User-->
            <h2 class="fw-bold mb-8">Location & Stock</h2>
            <?php foreach ($stock as $row): ?>
                <div class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
                    <div class="d-flex align-items-center">
                        <div class="ms-6">
                            <a href="#" class="d-flex align-items-center fs-5 fw-bold text-dark text-hover-primary"><?= $row['outlet_code'] . ' - ' . $row['outlet_name'] ?></a>
                            <?php foreach ($row['warehouse'] as $wh): ?>
                                <div class="fw-semibold text-muted"><?= $wh['warehouse_code'] . ' ' . $wh['warehouse_name'] ?></div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="text-end">
                            <div class="fs-5 fw-bold text-dark">Stock</div>
                            <?php foreach ($row['warehouse'] as $wh): ?>
                                <div class="fw-semibold text-muted"><?= $wh['stock'] ?> Pcs</div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>