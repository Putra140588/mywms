

    let sessionWarningShown = false;
    let countdownInterval = null;

    const warningTime = 20; // detik sebelum expired (20 detik)
    const checkInterval = 60000; // 1 menit (60.000 ms)

    setInterval(function() {

        $.getJSON(base_url + "auth/check_session", function(res) {
            // Session sudah mati di server
            if (res.expired) {
                window.location.href = base_url + "login?expired=1";
                return;
            }

            // Tampilkan warning
            if (res.remaining <= warningTime && !sessionWarningShown) {

                sessionWarningShown = true;
                let remaining = res.remaining;

                Swal.fire({
                    title: 'Session Expiring Soon!',
                    html: 'Your session will expire in <b id="session-countdown"></b> seconds.',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Extend Session',
                    cancelButtonText: 'Logout',
                    allowOutsideClick: false,
                    allowEscapeKey: false,

                    didOpen: () => {
                        const b = document.getElementById('session-countdown');
                        b.textContent = remaining;

                        countdownInterval = setInterval(() => {
                            remaining--;
                            b.textContent = remaining;

                            //AUTO LOGOUT SAAT HABIS
                            if (remaining <= 0) {
                                clearInterval(countdownInterval);
                                Swal.close();
                                window.location.href = base_url + "auth/logout";
                            }
                        }, 1000);
                    },

                    willClose: () => {
                        clearInterval(countdownInterval);
                    }

                }).then((result) => {

                    if (result.isConfirmed) {
                        $.post(base_url + "auth/extend_session", function() {
                            sessionWarningShown = false;
                        });
                    } else {
                        window.location.href = base_url + "auth/logout";
                    }

                });
            }

        });

    }, checkInterval);
