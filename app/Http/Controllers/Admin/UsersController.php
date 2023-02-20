<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Http\Requests\Users\EditRequest;
use App\Http\Requests\Users\CreateRequest;
use App\QueryBuilders\HW\HWUsersQueryBuilder;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(HWUsersQueryBuilder $hWUsersQueryBuilder): View
    {
        //dd($hWUsersQueryBuilder->getAll());
        return \view('admin.users.index', [
            'usersList' => $hWUsersQueryBuilder->getUsersWithPagination(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        return \view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request, User $user)
    {
        $user = $user->fill($request->validated());

        if($user->save()){
            return \redirect()->route('admin.users.index')->with('success', __('messages.admin.news.success'));
        }

        return \back()->with('error', __('messages.admin.news.fail'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user): View
    {   
       return view('admin.users.edit',[
            'user' => $user
       ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditRequest $request, User $user)
    {   //dd($request);
        $user = $user->fill($request->validated());

        if($user->save()){
            return \redirect()->route('admin.users.index')->with('success', __('messages.admin.news.success'));
        }

        return \back()->with('error', __('messages.admin.news.fail'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        try {
            $user->delete();

            return \response()->json('ok');
        } catch (\Exception $exeption) {
            \Log::error($exeption->getMessage(), [$exeption]);

            return \response()->json('error', 400);
        }
    }
}
