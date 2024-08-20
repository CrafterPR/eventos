// Initialize KTMenu
KTMenu.init();

// Add click event listener to delete buttons

document.querySelectorAll('[data-kt-action="inactivate_row"]').forEach(function (element) {
    element.addEventListener('click', function () {
        Swal.fire({
            text: 'Are you sure you want to Inactivate this coupon?',
            icon: 'warning',
            buttonsStyling: false,
            showCancelButton: true,
            confirmButtonText: 'Yes',
            cancelButtonText: 'No',
            customClass: {
                confirmButton: 'btn btn-warning',
                cancelButton: 'btn btn-secondary',
            }
        }).then((result) => {
            if (result.isConfirmed) {
                Livewire.dispatch('inactivate_row', this.getAttribute('data-kt-coupon-id'));
            }
        });
    });
});
document.querySelectorAll('[data-kt-action="activate_row"]').forEach(function (element) {
    element.addEventListener('click', function () {
        Swal.fire({
            text: 'Are you sure you want to activate this coupon?',
            icon: 'success',
            buttonsStyling: false,
            showCancelButton: true,
            confirmButtonText: 'Yes',
            cancelButtonText: 'No',
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-secondary',
            }
        }).then((result) => {
            if (result.isConfirmed) {
                Livewire.dispatch('activate_row', this.getAttribute('data-kt-coupon-id'));
            }
        });
    });
});


document.querySelectorAll('[data-kt-action="update_ticket"]').forEach(function (element) {
    element.addEventListener('click', function () {

                Livewire.dispatch('emit_update_ticket', this.getAttribute('data-kt-ticket-id'));
    });
});

document.querySelectorAll('[data-kt-action="edit_coupon"]').forEach(function (element) {
    element.addEventListener('click', function () {

                Livewire.dispatch('edit_coupon', this.getAttribute('data-kt-coupon-id'));
    });
});
document.querySelectorAll('[data-kt-action="send_coupon"]').forEach(function (element) {
    element.addEventListener('click', function () {
        Swal.fire({
            text: 'Send the coupon code by email to the organization?',
            icon: 'success',
            buttonsStyling: false,
            showCancelButton: true,
            confirmButtonText: 'Yes',
            cancelButtonText: 'No',
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-secondary',
            }
        }).then((result) => {
            if (result.isConfirmed) {
                Livewire.dispatch('send_coupon', this.getAttribute('data-kt-coupon-id'));
            }
        });
    });
});

// Add click event listener to update buttons
document.querySelectorAll('[data-kt-action="update_row"]').forEach(function (element) {
    element.addEventListener('click', function () {
        Livewire.dispatch('update_user', this.getAttribute('data-kt-user-id'));
    });
});

// Listen for 'success' event emitted by Livewire
Livewire.on('success', (message) => {
    // Reload the users-table datatable
    LaravelDataTables['manage-coupons'].ajax.reload();
});
