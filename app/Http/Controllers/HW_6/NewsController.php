<?php

namespace App\Http\Controllers\HW_6;

use App\Models\HW_News;
use Illuminate\Http\Request;
use App\Enumus\NewsStatusEnum;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Http\Requests\HW_7\News\CreateRequest;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\HW_7\News\EditRequest;
use App\QueryBuilders\HW\HWNewsQueryBuilder;
use App\QueryBuilders\HW\HWCategoryQueryBuilder;
use GrahamCampbell\ResultType\Success;

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
    public function store(CreateRequest $request):RedirectResponse
    {
       
        $news = new HW_News($request->validated());

        if ($news->save()) {
            $news->categories()->attach($request->getCategoryIds());
            return \redirect()->route('hw_6.news.index')->with('success', __('messages.admin.news.success'));
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
    public function update(EditRequest $request, HW_News $news): RedirectResponse
    {
        $news = $news->fill($request->validated());
        if ($news->save()) {
            $news->categories()->sync($request->getCategoryIds());
            return \redirect()->route('hw_6.news.index')->with('success', __('messages.admin.news.success'));
        }

        return \back()->with('error', __('messages.admin.news.fail'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(HW_News $news)
    {
        try{
            $news->delete();

            return \response()->json('ok');
        }catch(\Exception $exeption){
            \Log::error($exeption->getMessage(), [$exeption]);

            return \response()->json('error', 400);
        }
    }
}
