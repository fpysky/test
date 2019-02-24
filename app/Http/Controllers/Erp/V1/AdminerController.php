<?php

namespace App\Http\controllers\Erp\V1;

use App\Http\Controllers\Controller;
use App\Service\Erp\V1\PermissionService;
use App\Http\Requests\Erp\V1\AdminerIndexRequest;
use App\Http\Requests\Erp\V1\AdminerRequest;

class AdminerController extends Controller
{

    protected $permissionService;

    public function __construct(PermissionService $permissionService)
    {
        $this->permissionService = $permissionService;
    }

    public function index(AdminerIndexRequest $request)
    {
        $args = $request->all();
        $args['page'] = $args['page'] ?? 1;
        $args['pSize'] = $args['pSize'] ?? 15;
        return $this->permissionService->adminers($args);
    }

    public function store(AdminerRequest $request)
    {
        return $this->permissionService->adminerStore($request->all());
    }

    public function update(AdminerRequest $request)
    {
        return $this->permissionService->adminerStore($request->all());
    }

    public function destroy($id)
    {
        return $this->permissionService->adminerDelete($id);
    }
}