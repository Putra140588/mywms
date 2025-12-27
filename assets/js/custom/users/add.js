"use strict";

var KTUsersAddUser = function () {
    let modalEl;
    let formEl;
    let modal;

    return {
        init: function () {
            modalEl = document.getElementById("kt_modal_add_user");
            if (!modalEl) return;

            formEl = modalEl.querySelector("#kt_modal_add_user_form");
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
                    email: {
                        validators: {
                            notEmpty: {
                                message: "Valid email address is required"
                            },
                            emailAddress: {
                                message: "The value is not a valid email address"
                            }
                        }
                    },
                    phone:{
                        validators: {
                            notEmpty: {
                                message: "Phone number is required"
                            },
                            regexp: {
                                regexp: /^[0-9]+$/,
                                message: "Phone number can only contain numbers"
                            }
                        }
                    },
                    username:{
                        validators: {
                            notEmpty: {
                                message: "Username is required"
                            },
                            stringLength: {
                                min: 5,
                                message: "Username must be at least 5 characters long"
                            },
                            regexp: {
                                regexp: /^[a-z0-9]+$/,
                                message: "Username must be lowercase letters and numbers only"
                            }
                        }
                    },
                    //check if form is for edit or add user
                    password: (formEl && formEl.getAttribute('action') && formEl.getAttribute('action').includes('user/edit')) ? {
                        validators: {
                            stringLength: {
                                min: 6,
                                message: "Password must be at least 6 characters long"
                            }
                        }
                    } : {
                        validators: {
                            notEmpty: {
                                message: "The password is required"
                            },
                            stringLength: {
                                min: 6,
                                message: "Password must be at least 6 characters long"
                            }
                        }
                    },
                    outlet:{
                        validators: {
                            notEmpty: {
                                message: "Outlet selection is required"
                            }
                        }
                    },
                    user_role:{
                        validators: {
                            notEmpty: {
                                message: "Role selection is required"
                            }
                        }   
                    },
                    file: {
                        validators: {
                            file: {
                                extension: 'jpg,jpeg,png,pdf',
                                type: 'image/jpeg,image/png,application/pdf',
                                maxSize: 1048576, // 1MB
                                message: 'Please choose a valid file (jpg, jpeg, png, pdf, max 1MB)'
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
            const submitBtn = modalEl.querySelector('[data-kt-users-modal-action="submit"]');
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
                const btn = modalEl.querySelector(`[data-kt-users-modal-action="${action}"]`);
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
