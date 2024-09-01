// Initialize KTMenu
KTMenu.init();

// Add click event listener to delete buttons
document.querySelectorAll('[data-kt-action="delete_row"]').forEach(function (element) {
    element.addEventListener('click', function () {
        Swal.fire({
            text: 'Are you sure you want to remove?',
            icon: 'warning',
            buttonsStyling: false,
            showCancelButton: true,
            confirmButtonText: 'Yes',
            cancelButtonText: 'No',
            customClass: {
                confirmButton: 'btn btn-danger',
                cancelButton: 'btn btn-secondary',
            }
        }).then((result) => {
            if (result.isConfirmed) {
                Livewire.dispatch('delete_delegate', this.getAttribute('data-kt-delegate-id'));
            }
        });
    });
});

// Add click event listener to update buttons
document.querySelectorAll('[data-kt-action="update_row"]').forEach(function (element) {
    element.addEventListener('click', function () {
        Livewire.dispatch('update_delegate', this.getAttribute('data-kt-delegate-id'));
    });
});
document.querySelectorAll('[data-kt-action="print_pass"]').forEach(function (element) {
    element.addEventListener('click', function () {
        Livewire.dispatch('get_delegate', {"delegate" : this.getAttribute('data-kt-delegate-id')});
    });
});

document.querySelectorAll('[data-kt-action="redeem_coupon"]').forEach(function (element) {
    element.addEventListener('click', function () {
        Livewire.dispatch('redeem_coupon', this.getAttribute('data-kt-delegate-id'));
    });
});

// Listen for 'success' event emitted by Livewire
Livewire.on('success', (message) => {
    // Reload the delegates-table datatable
    LaravelDataTables['delegates-table'].ajax.reload();
});
