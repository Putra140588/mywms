<script src="<?= base_url() ?>assets/js/custom/dashboard/scanproduct.js"></script>
<!-- html5-qrcode -->
<script src="<?= base_url('assets/js/custom/html5-qrcode/html5-qrcode.min.js') ?>"></script>
<script>
    let html5Qr;
    let isScannerRunning = false;

    // audio
    const beepSuccess = new Audio("<?= base_url('assets/media/sound/beep-scan-success.mp3') ?>");
    const beepError = new Audio("<?= base_url('assets/media/sound/beep-scan-error.mp3') ?>");

    beepSuccess.preload = "auto";
    beepError.preload = "auto";

    $('#kt_modal_scan_product').on('shown.bs.modal', function() {
        if (typeof KTScanproduct !== 'undefined') {
            KTScanproduct.init();
        }
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
                $.post("<?= base_url('dashboard/ScanResult') ?>", {
                    barcode: decodedText
                }, function(response) {
                    var response = JSON.parse(response);
                    if (response.status == "success") {
                        //BEEP SUCCESS
                        beepSuccess.currentTime = 0;
                        beepSuccess.play();
                        if (isScannerRunning) {
                            isScannerRunning = false;
                            html5Qr.stop().then(() => {
                                $('#reader').html('');
                                $("#reader").html(response.html);
                            });
                        }

                    } else {
                        // handle invalid response
                        // BEEP ERROR
                        beepError.currentTime = 0;
                        beepError.play();

                        // optional alert
                        toastr.error(response.message);
                        // scan tetap jalan (tidak stop)
                    }
                }).fail(function(jqXHR, textStatus, errorThrown) {
                    // handle error response
                    beepError.currentTime = 0;
                    beepError.play();

                    // optional alert
                    toastr.error('Barcode Invalid');

                });
            }
        ).then(() => {
            isScannerRunning = true;
        });
    });

    $('#kt_modal_scan_product').on('hidden.bs.modal', function() {
        if (html5Qr && isScannerRunning) {
            isScannerRunning = false;
            html5Qr.stop().catch(() => {});
        }
    });
</script>