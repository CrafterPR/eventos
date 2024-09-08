<?php

use App\Models\Event;
use App\Models\User;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;
use Spatie\Permission\Models\Role;

// Home
Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('Home', route('dashboard'));
});

// Home > Dashboard
Breadcrumbs::for('dashboard', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Dashboard', route('dashboard'));
});

Breadcrumbs::for('programme', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Programme', route('dashboard'));
});
// Home > Dashboard > User Management
Breadcrumbs::for('users.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('User Management', route('users.user.index'));
});

Breadcrumbs::for('users.delegates.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Delegates Management', route('users.delegates.index'));
});

// Home > Dashboard > User Management > Users
Breadcrumbs::for('users.user.index', function (BreadcrumbTrail $trail) {
    $trail->parent('users.index');
    $trail->push('Users', route('users.user.index'));
});

Breadcrumbs::for('delegates.index', function (BreadcrumbTrail $trail) {
    $trail->parent('users.delegates.index');
    $trail->push('Delegates', route('users.delegates.index'));
});

Breadcrumbs::for('users.delegates.show', function (BreadcrumbTrail $trail) {
    $trail->parent('users.delegates.index');
    $trail->push('Delegate', route('users.delegates.index'));
});

//Home > Dashboard > Ticket Management > Tickets > purchased tickets
Breadcrumbs::for('tickets.view-purchased', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Purchased Tickets', route('tickets.view-purchased'));
});

Breadcrumbs::for('tickets.manage-tickets.index', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Manage Tickets', route('tickets.manage-tickets.index'));
});

Breadcrumbs::for('events.manage-events.index', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Manage Events', route('events.manage-events.index'));
});

Breadcrumbs::for('events.manage-events.show', function (BreadcrumbTrail $trail, Event $event) {
    $trail->parent('events.manage-events.index');
    $trail->push(ucwords($event->title), route('events.manage-events.show', $event));
});
Breadcrumbs::for('events.manage-events.checkin', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Manage Events', route('events.manage-events.index'));
    $trail->push('Checkin Delegates', '');
});

Breadcrumbs::for('booths.view-booth-bookings', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('View Bookings', route('booths.view-booth-bookings'));
});

Breadcrumbs::for('tickets.manage-coupons.index', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Manage Coupons', route('tickets.manage-coupons.index'));
});

// Home > Dashboard > User Management > Users > [User]
Breadcrumbs::for('users.user.show', function (BreadcrumbTrail $trail, User $user) {
    $trail->parent('users.user.index');
    $trail->push(ucwords($user->name), route('users.user.show', $user));
});

// Home > Dashboard > User Management > Roles
Breadcrumbs::for('users.role.index', function (BreadcrumbTrail $trail) {
    $trail->parent('users.index');
    $trail->push('Roles', route('users.role.index'));
});

// Home > Dashboard > User Management > Roles > [Role]
Breadcrumbs::for('users.role.show', function (BreadcrumbTrail $trail, Role $role) {
    $trail->parent('users.role.index');
    $trail->push(ucwords($role->name), route('users.role.show', $role));
});

// Home > Dashboard > User Management > Permission
Breadcrumbs::for('users.permission.index', function (BreadcrumbTrail $trail) {
    $trail->parent('users.index');
    $trail->push('Permissions', route('users.permission.index'));
});

// Home > Dashboard > Payments > Show
Breadcrumbs::for('pages.payments.index', function (BreadcrumbTrail $trail) {
    $trail->parent('payments.index');
    $trail->push('Payments', route('pages.payments.index'));
});

Breadcrumbs::for('summits.events', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Summits', route('summits.events.index'));
});

Breadcrumbs::for('summits.events.index', function (BreadcrumbTrail $trail) {
    $trail->parent('summits.events');
    $trail->push('Events', route('summits.events.index'));
});

Breadcrumbs::for('summits.events.create', function (BreadcrumbTrail $trail) {
    $trail->parent('summits.events');
    $trail->push('Create summit', route('summits.events.create'));
});

Breadcrumbs::for('reports.export', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Export reports', route('reports.index'));
});
