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
                Livewire.emit('delete_user', this.getAttribute('data-kt-user-id'));
            }
        });
    });
});


document.querySelectorAll('[data-kt-action="approve_row"]').forEach(function (element) {
    element.addEventListener('click', function () {
        Swal.fire({
            text: 'Are you sure you want to approve this ticket?',
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
                Livewire.emit('approve_ticket', this.getAttribute('data-kt-ticket-id'));
            }
        });
    });
});

document.querySelectorAll('[data-kt-action="reminder_row"]').forEach(function (element) {
    element.addEventListener('click', function () {
        Swal.fire({
            text: 'Send an email reminder for this pending payment to the delegate?',
            icon: 'success',
            buttonsStyling: false,
            showCancelButton: true,
            confirmButtonText: 'Yes',
            cancelButtonText: 'No',
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger',
            }
        }).then((result) => {
            if (result.isConfirmed) {
                Livewire.emit('remind_payment', this.getAttribute('data-kt-ticket-id'));
            }
        });
    });
});

document.querySelectorAll('[data-kt-action="update_manually"]').forEach(function (element) {
    element.addEventListener('click', function () {
        Livewire.emit('update_manually', this.getAttribute('data-kt-ticket-id'));
    });
});

document.querySelectorAll('[data-kt-action="inactivate_row"]').forEach(function (element) {
    element.addEventListener('click', function () {
        Swal.fire({
            text: 'Are you sure you want to Inactivate this ticket?',
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
                Livewire.emit('inactivate_row', this.getAttribute('data-kt-ticket-id'));
            }
        });
    });
});
document.querySelectorAll('[data-kt-action="activate_row"]').forEach(function (element) {
    element.addEventListener('click', function () {
        Swal.fire({
            text: 'Are you sure you want to activate this ticket?',
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
                Livewire.emit('activate_row', this.getAttribute('data-kt-ticket-id'));
            }
        });
    });
});


document.querySelectorAll('[data-kt-action="update_ticket"]').forEach(function (element) {
    element.addEventListener('click', function () {

                Livewire.emit('emit_update_ticket', this.getAttribute('data-kt-ticket-id'));
    });
});
document.querySelectorAll('[data-kt-action="un_approve_row"]').forEach(function (element) {
    element.addEventListener('click', function () {
        Swal.fire({
            text: 'Are you sure you want to Un-approve this ticket?',
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
                Livewire.emit('un_approve_ticket', this.getAttribute('data-kt-ticket-id'));
            }
        });
    });
});

// Add click event listener to update buttons
document.querySelectorAll('[data-kt-action="update_row"]').forEach(function (element) {
    element.addEventListener('click', function () {
        Livewire.emit('update_user', this.getAttribute('data-kt-user-id'));
    });
});

// Listen for 'success' event emitted by Livewire
Livewire.on('success', (message) => {
    // Reload the users-table datatable
    LaravelDataTables['purchased-tickets'].ajax.reload();
});
