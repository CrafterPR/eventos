// Initialize KTMenu
KTMenu.init();

// Add click event listener to delete buttons
document.querySelectorAll('[data-kt-action="delete_row"]').forEach(function (element) {
    element.addEventListener('click', function () {
        Swal.fire({
            text: 'Are you sure you want to delete the ticket?',
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
                Livewire.dispatch('delete_ticket', { 'ticket': this.getAttribute('data-kt-ticket-id')});
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
                Livewire.dispatch('approve_ticket', { 'ticket': this.getAttribute('data-kt-ticket-id')});
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
                Livewire.dispatch('remind_payment',{ 'ticket': this.getAttribute('data-kt-ticket-id')});
            }
        });
    });
});

document.querySelectorAll('[data-kt-action="update_manually"]').forEach(function (element) {
    element.addEventListener('click', function () {
        Livewire.dispatch('update_manually', this.getAttribute('data-kt-ticket-id'));
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
                Livewire.dispatch('inactivate_row',{ 'ticket': this.getAttribute('data-kt-ticket-id')});
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
                Livewire.dispatch('activate_row', { 'ticket': this.getAttribute('data-kt-ticket-id')});
            }
        });
    });
});


document.querySelectorAll('[data-kt-action="update_ticket"]').forEach(function (element) {
    element.addEventListener('click', function () {
         Livewire.dispatch('emit_update_ticket', { 'ticket': this.getAttribute('data-kt-ticket-id')});
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
                Livewire.dispatch('un_approve_ticket', this.getAttribute('data-kt-ticket-id'));
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


