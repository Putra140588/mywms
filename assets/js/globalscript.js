$(document).ready(function() {
    dt;
   confirmDelete();
    $('.filter-daterangepicker').daterangepicker({
        showDropdowns: true,
        autoUpdateInput: false,
        minYear: 2020,
        maxYear: moment().year(),
        minDate: moment('2020-01-01'),
        maxDate: moment().endOf('year'),
        startDate: moment('2020-01-01'),
        endDate: moment('2020-01-01'),
        linkedCalendars: false
    });
    $('.filter-daterangepicker').on('apply.daterangepicker', function(ev, picker) {
        $(this).val(
            picker.startDate.format('DD-MM-YYYY') +
            ' - ' +
            picker.endDate.format('DD-MM-YYYY')
        );
    });
});

    var dt = new DataTable('.dt-table', {
        stateSave: true,
        stateDuration: -1,
        fixedColumns: {
            start: 1,
            end: 1
        },
        autoWidth: true,
        paging: true,
        scrollCollapse: true,
        scrollX: true,
        scrollY: 300,
        lengthMenu: [10, 25, 50, 100, 300, 500, 1000, 3000, 5000],
        pageLength: 10,
        responsive: true,
        layout: {
            topStart: ['pageLength', 'buttons'],
            topEnd: 'search',
            bottomStart: 'info',
            bottomEnd: 'paging'
        },
        drawCallback: function () {
            confirmDelete();
            //loud action button rows if click page
            if (typeof KTMenu !== 'undefined') {
                KTMenu.createInstances();
            }
        },
        buttons: [
            'copy',
            'csv',
            'excel',
            'pdf',
            'print',
            {
                text: 'Reset Table',
                className: 'btn btn-danger btn-sm',
                action: function() {
                    dt.state.clear();
                    location.reload();
                }
            }
        ]
    });

 function ajaxModal(url, modalId, loadform = true) {
        const $modal = $('#' + modalId);
        if ($modal.length === 0) return;
        $.ajax({
            url: url,
            type: 'POST',
            data: $('#form-ajax').length ? $('#form-ajax').serialize() : {},
            cache: false,
            success: function(html) {
                // ⛔ JANGAN timpa modal
                $modal.find('.modal-content').html(html);

                // Re-init Metronic components
                if (typeof KTScroll !== 'undefined') {
                    KTScroll.createInstances();
                }

                if (typeof KTImageInput !== 'undefined') {
                    KTImageInput.createInstances();
                }

                if (typeof KTMenu !== 'undefined') {
                    KTMenu.createInstances();
                }

                if (typeof KTUsersAddUser !== 'undefined') {
                    KTUsersAddUser.init();
                }

                // Init Select2 di modal
                $modal.find('[data-control="select2"]').each(function () {
                    $(this).select2({
                        dropdownParent: $('#kt_modal_add_user')
                    });
                });

                // Show modal secara manual
                const modalInstance = bootstrap.Modal.getOrCreateInstance(
                    document.getElementById(modalId)
                );
                modalInstance.show();
            },
            error: function(xhr) {
                console.error(xhr.responseText);
            }
        });
    }
function confirmDelete() {
        var e,o = document.getElementById("kt_table_users");
        var deleteButtons = o.querySelectorAll('[data-kt-users-table-filter="delete_row"]');
        deleteButtons.forEach(function(button) {
            button.addEventListener("click", function() {
                var userRow = button.closest("tr");
                var userName = userRow.querySelectorAll("td")[1].innerText;
                var deleteUrl = button.getAttribute("data-url");
              
                Swal.fire({
                    text: "Are you sure you want to delete " + userName + "?",
                    icon: "warning",
                    showCancelButton: !0,
                    buttonsStyling: !1,
                    confirmButtonText: "Yes, delete!",
                    cancelButtonText: "No, cancel",
                    customClass: {
                        confirmButton: "btn btn-danger",
                        cancelButton: "btn btn-active-light"
                    }
                }).then(function(result) {
                    if (result.isConfirmed) {
                        // Lakukan permintaan AJAX untuk menghapus pengguna
                        $.ajax({
                            url: deleteUrl,
                            type: 'POST',
                            data: {},
                            success: function(response) {
                               var data = JSON.parse(response);
                               if (data.status == 'success') {
                                    Swal.fire({
                                        text: "You have deleted " + userName + "!.",
                                        icon: "success",
                                        buttonsStyling: !1,
                                        confirmButtonText: "Ok, got it!",
                                        customClass: {
                                            confirmButton: "btn btn-primary"
                                        }
                                    }).then(function() {
                                        // Remove the row from the table
                                        userRow.remove();
                                    });
                                } else {
                                    Swal.fire({
                                        text: data.message,
                                        icon: "error",
                                        buttonsStyling: !1,
                                        confirmButtonText: "Ok, got it!",
                                        customClass: {
                                            confirmButton: "btn btn-primary"
                                        }
                                    });
                                }
                            },
                            error: function(xhr) {
                                console.error(xhr.responseText);
                            }
                        });
                       
                    } else if (result.dismiss === Swal.DismissReason.cancel) {
                        Swal.fire({
                            text: userName + " was not deleted.",
                            icon: "error",
                            buttonsStyling: !1,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        });
                    }
                });
            });
        });
    }


