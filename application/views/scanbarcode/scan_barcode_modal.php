<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <title>Scan Barcode</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Metronic -->
    <link href="<?= base_url('assets/plugins/global/plugins.bundle.css') ?>" rel="stylesheet">
    <script src="<?= base_url('assets/plugins/global/plugins.bundle.js') ?>"></script>

    <!-- html5-qrcode -->
    <script src="<?= base_url('assets/js/custom/html5-qrcode/html5-qrcode.min.js') ?>"></script>

    <style>
        #reader {
            width: 100%;
        }
    </style>
</head>

<body>

    <!-- contoh input -->
    <input type="text" id="barcode_input" class="form-control mb-3" placeholder="Hasil scan">

    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalScan">
        Scan Barcode
    </button>

    <!-- Modal -->
    <div class="modal fade" id="modalScan" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Scan Barcode / QR</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <div id="reader"></div>
                </div>

            </div>
        </div>
    </div>
    <script>
        let html5Qr;
        let isScannerRunning = false;

        // audio
        const beepSuccess = new Audio("<?= base_url('assets/media/sound/beep-scan-success.mp3') ?>");
        const beepError = new Audio("<?= base_url('assets/media/sound/beep-scan-error.mp3') ?>");

        beepSuccess.preload = "auto";
        beepError.preload = "auto";

        // validasi barcode
        function isValidBarcode(code) {
            //return /^(EXPO|INV|QC)/.test(code); // sesuaikan
            return true;
        }

        $('#modalScan').on('shown.bs.modal', function() {

            // unlock audio iOS
            beepSuccess.play().then(() => beepSuccess.pause()).catch(() => {});
            beepError.play().then(() => beepError.pause()).catch(() => {});

            html5Qr = new Html5Qrcode("reader");

            html5Qr.start({
                    facingMode: "environment"
                }, {
                    fps: 10,
                    qrbox: {
                        width: 300,
                        height: 150
                    },
                    formatsToSupport: [
                        Html5QrcodeSupportedFormats.CODE_128,
                        Html5QrcodeSupportedFormats.EAN_13,
                        Html5QrcodeSupportedFormats.EAN_8,
                        Html5QrcodeSupportedFormats.UPC_A,
                        Html5QrcodeSupportedFormats.UPC_E,
                        Html5QrcodeSupportedFormats.CODE_39,
                        Html5QrcodeSupportedFormats.ITF,
                        Html5QrcodeSupportedFormats.QR_CODE
                    ]
                },
                (decodedText) => {

                    if (isValidBarcode(decodedText)) {

                        // ✅ BEEP SUCCESS
                        beepSuccess.currentTime = 0;
                        beepSuccess.play();

                        $('#barcode_input').val(decodedText);

                        $.post("<?= base_url('scanbarcode/result') ?>", {
                            barcode: decodedText
                        });

                        if (isScannerRunning) {
                            isScannerRunning = false;
                            html5Qr.stop().then(() => {
                                $('#modalScan').modal('hide');
                            });
                        }

                    } else {

                        // ❌ BEEP ERROR
                        beepError.currentTime = 0;
                        beepError.play();

                        // optional alert
                        toastr.error('Barcode tidak valid');

                        // scan tetap jalan (tidak stop)
                    }
                }
            ).then(() => {
                isScannerRunning = true;
            });
        });

        $('#modalScan').on('hidden.bs.modal', function() {
            if (html5Qr && isScannerRunning) {
                isScannerRunning = false;
                html5Qr.stop().catch(() => {});
            }
        });
    </script>

</body>

</html>