<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <title>Scan Barcode</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap & Metronic -->
    <link href="<?= base_url('assets/plugins/global/plugins.bundle.css') ?>" rel="stylesheet">
    <script src="<?= base_url('assets/plugins/global/plugins.bundle.js') ?>"></script>

    <!-- Instascan -->
    <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>

    <style>
        video {
            width: 100%;
            border-radius: 12px;
            border: 1px solid #ddd;
        }
    </style>
</head>

<body>

    <!-- Button Open Modal -->
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
                    <video id="preview"></video>
                    <div class="mt-3 fw-bold">
                        Hasil: <span id="scan-result">-</span>
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
                </div>

            </div>
        </div>
    </div>

    <script>
        let scanner;

        $('#modalScan').on('shown.bs.modal', function() {

            scanner = new Instascan.Scanner({
                video: document.getElementById('preview'),
                mirror: false
            });

            scanner.addListener('scan', function(content) {
                $('#scan-result').text(content);

                // kirim ke CI
                $.post("<?= base_url('scanbarcode/result') ?>", {
                    barcode: content
                }, function(res) {
                    console.log(res);
                }, 'json');

                // stop kamera & tutup modal
                scanner.stop();
                setTimeout(() => {
                    $('#modalScan').modal('hide');
                }, 800);
            });

            Instascan.Camera.getCameras().then(function(cameras) {
                if (cameras.length > 0) {
                    let backCam = cameras.find(cam => cam.name.toLowerCase().includes('back'));
                    scanner.start(backCam ? backCam : cameras[0]);
                } else {
                    alert('Kamera tidak ditemukan');
                }
            });
        });

        $('#modalScan').on('hidden.bs.modal', function() {
            if (scanner) {
                scanner.stop();
            }
        });
    </script>

</body>

</html>