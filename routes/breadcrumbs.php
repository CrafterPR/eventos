<?php

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

// Home > Dashboard > User Management > Users
Breadcrumbs::for('users.user.index', function (BreadcrumbTrail $trail) {
    $trail->parent('users.index');
    $trail->push('Users', route('users.user.index'));
});
// Home > Dashboard > Programme > Speakers
Breadcrumbs::for('voting', function (BreadcrumbTrail $trail) {
    $trail->push('Voting Module', '#');
});

Breadcrumbs::for('voting.manage-periods', function (BreadcrumbTrail $trail) {
    $trail->parent('voting');
    $trail->push('Voting periods', route('vote.view-periods'));
});

Breadcrumbs::for('voting.manage-positions', function (BreadcrumbTrail $trail) {
    $trail->parent('voting');
    $trail->push('Voting positions', route('vote.view-positions'));
});

Breadcrumbs::for('voting.manage-contestants', function (BreadcrumbTrail $trail) {
    $trail->parent('voting');
    $trail->push('Voting contestants', route('vote.view-contestants'));
});
Breadcrumbs::for('voting.voters', function (BreadcrumbTrail $trail) {
    $trail->parent('voting');
    $trail->push('Voters', route('vote.view-voters'));
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

Breadcrumbs::for('reports.export', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Export reports', route('reports.index'));
});
