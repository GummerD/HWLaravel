<?php

namespace App\Http\Controllers\HW_6;

use App\Models\HW_News;
use App\Models\HW_Category;
use Illuminate\Http\Request;
use App\Enumus\NewsStatusEnum;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\QueryBuilders\HW\HWNewsQueryBuilder;
use App\Http\Requests\HW_7\Category\EditRequest;
use App\QueryBuilders\HW\HWCategoryQueryBuilder;
use App\Http\Requests\HW_7\Category\CreateRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(HWCategoryQueryBuilder $hWCategoryQueryBuilder):View
    {
        return \view('news.HW_6.Setcategories.index', [
            'categoryList' => $hWCategoryQueryBuilder->getAll(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create():View
    {
        return \view('news.HW_6.Setcategories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {

        $categories = new HW_Category($request->validated());

        if ($categories->save()) {
            return \redirect()->route('hw_6.categories.index')->with('success', __('messages.admin.news.success'));
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
    public function edit(HW_Category $category): View
    {
        //dd($hW_Category);
        return \view( 'news.HW_6.Setcategories.edit', [
            'category' => $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditRequest $request, HW_Category $category): RedirectResponse
    {
        $category = $category->fill($request->validated());
        if ($category->save()) {
            return \redirect()->route('hw_6.categories.index')->with('success', __('messages.admin.news.success'));
        }

        return \back()->with('error', __('messages.admin.news.fail'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(HW_Category $category)
    {
        try{
            $category->delete();

            return \response()->json('ok');
        }catch(\Exception $exeption){
            \Log::error($exeption->getMessage(), [$exeption]);

            return \response()->json('error', 400);
        }
    }
}
