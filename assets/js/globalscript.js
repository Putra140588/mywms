$(document).ready(function() {
    dt;
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

// Restrict input to numbers, dot, and comma
$(document).on('input', 'input[data-number-only]', function() {
    this.value = this.value.replace(/[^0-9.,]/g, '');
    // Auto number format: add thousand separators
    let val = this.value.replace(/,/g, '');
    if(val) {
        let parts = val.split('.');
        parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        this.value = parts.join('.');
    }
});

/**
 * Global AJAX handler to catch 401 Unauthorized responses
 */
$(document).ajaxComplete(function (event, xhr) {
    if (xhr.status === 401) {
        Swal.fire({
            title: "Session Expired",
            text: "Session expired, please login again.",
            icon: "warning",
            confirmButtonText: "Login",
            allowOutsideClick: false
        }).then(() => {
            window.location.href = base_url + "login";
        });
    }
});

    var dt = new DataTable('#dt-table', {
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
            //load action button rows if click page
            if (typeof KTMenu !== 'undefined') {
                KTMenu.createInstances();
            }
        },
        buttons: [
            (typeof can_export !== 'undefined' && can_export ? [
                {
                    extend: 'copy',
                    text: 'Copy',
                    className: 'btn btn-info btn-sm',
                    exportOptions: {
                        columns: ':not(.no-export)'
                    }
                },
                {
                    extend: 'csv',
                    text: 'CSV',
                    className: 'btn btn-success btn-sm',
                    exportOptions: {
                        columns: ':not(.no-export)'
                    }
                },
                {
                    extend: 'excel',
                    text: 'Excel',
                    className: 'btn btn-success btn-sm',
                    exportOptions: {
                        columns: ':not(.no-export)'
                    }
                },
                {
                    extend: 'pdf',
                    text: 'PDF',
                    className: 'btn btn-danger btn-sm',
                    pageSize: 'A4',
                    orientation: 'landscape',
                    exportOptions: {
                        columns: function (idx, data, node) {
                            return node && !node.classList.contains('no-export');
                        }
                    },
                    customize: function (doc) {
                        doc.pageMargins = [10, 10, 10, 10];
                        doc.defaultStyle.fontSize = 7;
                        doc.styles.tableHeader.fontSize = 8;
                        var body = doc.content[1].table.body;
                        var colCount = body[0].length;
                        doc.content[1].table.widths = Array(colCount).fill('auto');
                        doc.content[1].layout = {
                            hLineWidth: function (i, node) {
                                return 0.5;
                            },
                            vLineWidth: function (i, node) {
                                return 0.5;
                            },
                            hLineColor: function (i, node) {
                                return '#cccccc';
                            },
                            vLineColor: function (i, node) {
                                return '#cccccc';
                            },
                            paddingLeft: function () { return 4; },
                            paddingRight: function () { return 4; },
                            paddingTop: function () { return 3; },
                            paddingBottom: function () { return 3; }
                        };
                        body.forEach(function (row) {
                            row.forEach(function (cell) {
                                if (typeof cell === 'object') {
                                    cell.noWrap = false;
                                }
                            });
                        });
                    }
                }
            ] : []),
            {
                text: 'Reset Table',
                className: 'btn btn-warning btn-sm',
                action: function() {
                    dt.state.clear();
                    location.reload();
                }
            }
        ]
    });

function initAjaxModal() {
 // Re-init JS
    if (typeof KTScroll !== 'undefined') {
        KTScroll.createInstances();
    }
    //load image input
    if (typeof KTImageInput !== 'undefined') {
        KTImageInput.createInstances();
    }
    if (typeof KTMenu !== 'undefined') {
        KTMenu.createInstances();
    }
    if (typeof KTUsersAddUser !== 'undefined') {
        KTUsersAddUser.init();
    }
    if (typeof KTUsersAddRole !== 'undefined') {
        KTUsersAddRole.init();
    }
    if (typeof KTUpdateRoleAccess !== 'undefined') {
        KTUpdateRoleAccess.init();
    }
    if (typeof KTModules !== 'undefined') {
        KTModules.init();
    }
    if (typeof KTOutlet !== 'undefined') {
        KTOutlet.init();
    }
    if (typeof KTCurrency !== 'undefined') {
        KTCurrency.init();
    }
    if (typeof KTExchangerate !== 'undefined') {
        KTExchangerate.init();
    }
    if (typeof KTScanproduct !== 'undefined') {
        KTScanproduct.init();
    }   
}
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
                initAjaxModal();
                // Init Select2 di modal
                $modal.find('[data-control="select2"]').each(function () {
                    var dropdownParentSelector = $(this).data('dropdown-parent');
                    $(this).select2({
                        dropdownParent: $(dropdownParentSelector)
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
        var e,o = document.getElementById("dt-table");
        var deleteButtons = o.querySelectorAll('[data-row-delete="delete_row"]');
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





