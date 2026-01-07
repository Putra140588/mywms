"use strict";

var KTModules = function () {
    let modalEl;
    let formEl;
    let modal;

    return {
        init: function () {
            modalEl = document.getElementById("kt_modal_add_modules");
            if (!modalEl) return;
            formEl = modalEl.querySelector("#kt_modal_add_module_form");
            if (!formEl) return;

            modal = bootstrap.Modal.getOrCreateInstance(modalEl);

            // =============================
            // Form validation
            // =============================
            const validator = FormValidation.formValidation(formEl, {
                fields: {
                    name: {
                        validators: {
                            notEmpty: {
                                message: "Full name is required"
                            }
                        }
                    },
                    url: {
                        validators: {
                            notEmpty: {
                                message: "URL is required"
                            }
                        }
                    },
                    parentid: {
                        validators: {
                            notEmpty: {
                                message: "Parent module is required"
                            }
                        }
                    },
                    sort: {
                        validators: {
                            notEmpty: {
                                message: "Sort order is required"
                            },
                            integer: {
                                message: "The value must be an integer"
                            }
                        }
                    },
                    data_url: {
                        validators: {
                            notEmpty: { 
                                message: "Data URL is required"
                            }
                        }
                    }
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: ".fv-row",
                        eleInvalidClass: "",
                        eleValidClass: ""
                    })
                }
            });

            // =============================
            // Submit
            // =============================
            const submitBtn = modalEl.querySelector('[data-kt-modal-action="submit"]');
            if (submitBtn) {
                submitBtn.addEventListener("click", function (e) {
                    e.preventDefault();

                    validator.validate().then(function (status) {
                        if (status === 'Valid') {
                            submitBtn.setAttribute("data-kt-indicator", "on");
                            submitBtn.disabled = true;
                            setTimeout(function () {
                                // Prepare form data
                                const formData = new FormData(formEl);
                                // Ensure enctype is set for file upload
                                formEl.setAttribute('enctype', 'multipart/form-data');
                                const actionUrl = formEl.getAttribute('action') || window.location.href;
                                const method = formEl.getAttribute('method') || 'POST';
                                fetch(actionUrl, {
                                    method: method,
                                    body: formData,
                                    // Do not set Content-Type header, browser will set it automatically for FormData
                                    headers: {
                                        'X-Requested-With': 'XMLHttpRequest'
                                    }
                                })
                                .then(response => response.json())
                                .then(data => {
                                    submitBtn.removeAttribute("data-kt-indicator");
                                    submitBtn.disabled = false;
                                    if (data.status === 'success') {
                                        Swal.fire({
                                            text: data.message || "Form has been successfully submitted!",
                                            icon: "success",
                                            buttonsStyling: false,
                                            confirmButtonText: "Ok, got it!",
                                            customClass: {
                                                confirmButton: "btn btn-primary"
                                            }
                                        }).then(function () {
                                            modal.hide();
                                            formEl.reset();
                                        });
                                    } else {
                                        Swal.fire({
                                            text: data.message || "Submission failed. Please try again.",
                                            icon: "error",
                                            buttonsStyling: false,
                                            confirmButtonText: "Ok, got it!",
                                            customClass: {
                                                confirmButton: "btn btn-primary"
                                            }
                                        });
                                    }
                                })
                                .catch(() => {
                                    submitBtn.removeAttribute("data-kt-indicator");
                                    submitBtn.disabled = false;
                                    Swal.fire({
                                        text: "An error occurred. Please try again.",
                                        icon: "error",
                                        buttonsStyling: false,
                                        confirmButtonText: "Ok, got it!",
                                        customClass: {
                                            confirmButton: "btn btn-primary"
                                        }
                                    });
                                });
                            }, 200);
                        } else {
                            Swal.fire({
                                text: "Sorry, looks like there are some errors detected, please try again.",
                                icon: "error",
                                buttonsStyling: false,
                                confirmButtonText: "Ok, got it!",
                                customClass: {
                                    confirmButton: "btn btn-primary"
                                }
                            });
                        }
                    });
                });
            }

            // =============================
            // Cancel & Close
            // =============================
            ['cancel', 'close'].forEach(action => {
                const btn = modalEl.querySelector(`[data-kt-modal-action="${action}"]`);
                if (!btn) return;

                btn.addEventListener("click", function (e) {
                    e.preventDefault();

                    Swal.fire({
                        text: "Are you sure you would like to cancel?",
                        icon: "warning",
                        showCancelButton: true,
                        buttonsStyling: false,
                        confirmButtonText: "Yes, cancel it!",
                        cancelButtonText: "No, return",
                        customClass: {
                            confirmButton: "btn btn-primary",
                            cancelButton: "btn btn-active-light"
                        }
                    }).then(function (result) {
                        if (result.isConfirmed) {
                            formEl.reset();
                            modal.hide();
                        }
                    });
                });
            });
        }
    };
}();
