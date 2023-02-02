<?php

namespace App\Http\Controllers\HW_6;

use App\Models\HW_News;
use Illuminate\Http\Request;
use App\Enumus\NewsStatusEnum;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\QueryBuilders\HW\HWNewsQueryBuilder;
use App\QueryBuilders\HW\HWCategoryQueryBuilder;


class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(HWNewsQueryBuilder $newsQueryBuilder):View
    {
        return \view('news.HW_6.Setnews.index', [
            'newslist' => $newsQueryBuilder->getNewsWithPagination(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(HWCategoryQueryBuilder $hWCategoryQueryBuilder):View
    {
        return  \view('news.HW_6.Setnews.create', [
            'categories' => $hWCategoryQueryBuilder->getAll(),
            'statuses' =>  NewsStatusEnum::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request):RedirectResponse
    {
        $request->validate([
            'title' => 'required'
        ]);

        $news = new HW_News($request->except('_token', 'category_id'));

        if ($news->save()) {
            return \redirect()->route('hw_6.news.index')->with('success', 'Новость успешно добавлена');
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
    public function edit(HW_News $news, HWCategoryQueryBuilder $hWCategoryQueryBuilder):view
    {
        return  \view('news.HW_6.Setnews.edit', [
            'news' => $news,
            'categories' => $hWCategoryQueryBuilder->getAll(),
            'statuses' =>  NewsStatusEnum::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HW_News $news): RedirectResponse
    {
        $news = $news->fill($request->except('_token', 'category_ids'));
        if ($news->save()) {
            $news->categories()->sync( (array) $request->input('category_ids'));
            return \redirect()->route('hw_6.news.index')->with('success', 'Новость успешно обновлена');
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
