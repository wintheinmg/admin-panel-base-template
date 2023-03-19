<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\UpdateUserRequest;
use App\Repositories\Interfaces\RoleRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;

class UserController extends Controller
{

    private $userRepository;
    private $roleRepository;

    public function __construct(UserRepositoryInterface $userRepository, RoleRepositoryInterface $roleRepository)
    {
        $this->userRepository = $userRepository;
        $this->roleRepository = $roleRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->userRepository->allUsersWithPaginate(10);

        $roles = $this->roleRepository->allRoles();
        return view('admin.users.index', compact('users', 'roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = $this->roleRepository->allRoles();
        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        $status = $this->userRepository->storeUser($request);

        ($status) ? $message = trans('cruds.user.title_singular') . ' ' . trans('global.create_success') : $message = trans('cruds.user.title_singular') . trans('global.create_fail');

        toast($message,$status ? 'success' : 'error');

        return redirect()->route('admin.user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = $this->userRepository->getUserDetails($id);

        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = $this->userRepository->getUserDetails($id);

        $roles = $this->roleRepository->allRoles();

        return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $status = $this->userRepository->UpdateUser($request, $id);

        ($status) ? $message = trans('cruds.user.title_singular') . ' ' . trans('global.update_success') : $message = trans('cruds.user.title_singular') . trans('global.update_fail');

        toast($message,$status ? 'success' : 'error');

        return redirect()->route('admin.user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $status = $this->userRepository->destroyUser($id);

        ($status) ? $message = trans('cruds.user.title_singular') . ' ' . trans('global.delete_success') : $message = trans('cruds.user.title_singular') . ' ' . trans('global.delete_fail');

        toast($message,$status ? 'success' : 'error');

        return redirect()->route('admin.user.index');
    }

    /**
     * Filter users by request
     * @param \Illuminate\Http\Request  $request
     * @return Collection
     */

     public function filter(Request $request){
        $users = $this->userRepository->filterUser($request);

        $roles = $this->roleRepository->allRoles();

        $role_filter_id = $request->filter_by_role;
        return view('admin.users.index', compact('users', 'roles', 'role_filter_id'));
     }

      /**
    * @return \Illuminate\Support\Collection
    */
    public function exportExcel()
    {
        return $this->userRepository->exportExcel();
    }
}
