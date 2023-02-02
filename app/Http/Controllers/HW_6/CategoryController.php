<?php

namespace App\Http\Controllers\HW_6;

use App\Models\HW_News;
use Illuminate\Http\Request;
use App\Enumus\NewsStatusEnum;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Models\HW_Category;
use Illuminate\Http\RedirectResponse;
use App\QueryBuilders\HW\HWNewsQueryBuilder;
use App\QueryBuilders\HW\HWCategoryQueryBuilder;

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
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $categories = new HW_Category($request->except('_token'));

        if ($categories->save()) {
            return \redirect()->route('hw_6.categories.index')->with('success', 'Запись успешно обновлена');
        }

        return \back()->with('error', 'Не удалось добавить новость');
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
    public function update(Request $request, HW_Category $category): RedirectResponse
    {
        $category = $category->fill($request->except('_token'));
        if ($category->save()) {
            return \redirect()->route('hw_6.categories.index')->with('success', 'Запись успешно обновлена');
        }

        return \back()->with('error', 'Не удалось изменить запись');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
