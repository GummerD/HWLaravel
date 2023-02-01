<?php

namespace App\Http\Controllers\Admin;

use App\Enumus\NewsStatusEnum;
use App\Http\Controllers\Controller;
use App\Models\News;
use App\QueryBuilders\CategoryQueryBuilder;
use App\QueryBuilders\NewsQueryBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(NewsQueryBuilder $newsQueryBuilder): View
    {
        return \view('admin.news.index', [
            //'newslist' => $newsQueryBuilder->getNewsByStatus('active'),
            //'newslist' => $newsQueryBuilder->getAll(),
            'newslist' => $newsQueryBuilder->getNewsWithPagination(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(CategoryQueryBuilder $categoryQueryBuilder): View
    {
        return  \view('admin.news.create', [
            'categories' => $categoryQueryBuilder->getAll(),
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

        $news = new News($request->except('_token', 'category_id')); // News::create();

        if ($news->save()) {
            return \redirect()->route('admin.news.index')->with('success', 'Новость успешно добавлена');
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
    public function edit(News $news, CategoryQueryBuilder $categoryQueryBuilder): View
    {
        return  \view('admin.news.edit', [
            'news' => $news,
            'categories' => $categoryQueryBuilder->getAll(),
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
    public function update(Request $request, News $news): RedirectResponse
    {
        //dd($request->all());
        $news = $news->fill($request->except('_token', 'category_ids'));
        if ($news->save()) {
            $news->categories()->sync( (array) $request->input('category_ids'));
            return \redirect()->route('admin.news.index')->with('success', 'Новость успешно обновлена');
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
