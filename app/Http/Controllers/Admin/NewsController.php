<?php

namespace App\Http\Controllers\Admin;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Enumus\NewsStatusEnum;
use Illuminate\Http\JsonResponse;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rules\Enum;
use App\Http\Requests\News\EditRequest;
use App\QueryBuilders\NewsQueryBuilder;
use App\Http\Requests\News\CreateRequest;
use App\QueryBuilders\CategoryQueryBuilder;
use Illuminate\Http\Resources\Json\JsonResource;

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
    public function store(CreateRequest $request):RedirectResponse
    {
       
        /*
        $request->validate([ - все перенесено в контроллер, можно также вызвать из Model, но лучше прописать отдельную сущность
            'category_id' => ['required', 'array', ] ,
            'category_id.*' => ['exists:categories,id'],
            'title' => ['required', 'min:5', 'max:200'],
            'author' => ['nullable', 'string', 'min:2', 'max:30' ],
            'status' => ['required', new Enum(NewsStatusEnum::class)],
            'image' => ['sometimes'],
            'description' => ['nullable', 'sting'],
        ]);
        $news = new News($request->except('_token', 'category_ids')); - не нужно боле использовать, так как поля уже прописаны в сщности - CreateRequest
        */
        

        $news = News::create($request->validated());

        if ($news) {
            $news->categories()->attach($request->getCategoryIds());
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
    public function update(EditRequest $request, News $news): RedirectResponse
    {
        //dd($request->all());
        $news = $news->fill($request->validated());
        if ($news->save()) {
            $news->categories()->sync($request->getCategoryIds());
            return \redirect()->route('admin.news.index')->with('success', __('messages.admin.news.success'));
        }

        return \back()->with('error', __('messages.admin.news.fail'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news): JsonResponse
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
