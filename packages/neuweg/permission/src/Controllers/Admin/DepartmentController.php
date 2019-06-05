<?php

namespace Neuweg\Permission\Controllers\Admin;

use Neuweg\Core\Controllers\Admin\BackendController;
use Neuweg\Permission\Permissions\DepartmentPermission as Permission;
use Neuweg\Permission\Repositories\DepartmentRepository as Repository;

class DepartmentController extends BackendController {

    public function __construct(Repository $repository, Permission $permission) {
        parent::__construct($repository, $permission);
    }

}
