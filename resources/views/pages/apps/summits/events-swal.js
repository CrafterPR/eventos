// Initialize KTMenu
KTMenu.init();

// Listen for 'success' event emitted by Livewire
Livewire.on('success', (message) => {
    LaravelDataTables['booths-table'].ajax.reload();
});

document.querySelectorAll('[data-kt-action="reserve_booth"]').forEach(function (element) {
    element.addEventListener('click', function () {
        Livewire.emit('emit_reserve_booth', this.getAttribute('data-kt-booth-id'));
    });
});

document.querySelectorAll('[data-kt-action="revoke_booking"]').forEach(function (element) {
    element.addEventListener('click', function () {
        Swal.fire({
            text: 'Are you sure you want to cancel this booth reservation?',
            icon: 'warning',
            buttonsStyling: false,
            showCancelButton: true,
            confirmButtonText: 'Yes, Revoke it!',
            cancelButtonText: 'No',
            customClass: {
                confirmButton: 'btn btn-warning',
                cancelButton: 'btn btn-secondary',
            }
        }).then((result) => {
            if (result.isConfirmed) {
                Livewire.emit('revoke_booth_booking', this.getAttribute('data-kt-booth-id'));
            }
        });
    });
});
