<?php

namespace App\Http\Controllers\Admin;

use App\Models\Sources;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Sources\EditRequest;
use App\QueryBuilders\SourcesQueryBuilder;
use App\Http\Requests\Sources\CreateRequest;
use SebastianBergmann\CodeCoverage\Report\Xml\Source;

class SourcesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SourcesQueryBuilder $sourcesQueryBuilder): View
    {
        return \view('admin.sources.index',[
            'sourcesList' => $sourcesQueryBuilder->getSourcesWithPagination(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        return \view('admin.sources.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request): RedirectResponse
    {
        $source = new Sources($request->validated());

        if($source->save()){
            return \redirect()->route('admin.sources.index')->with('success', __('messages.admin.news.success'));
        }
        return \back('admin.sources.index')->with('error', __('messages.admin.news.fail'));
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
    public function edit(Sources $source): View
    {  
        return \view('admin.sources.edit', [
            'source' => $source,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditRequest $request, Sources $source): RedirectResponse
    {  
        $source = $source->fill($request->validated());

        if($source->save()){
            return \redirect()->route('admin.sources.index')->with('success', __('messages.admin.news.success'));
        }
        return \back('admin.sources.index')->with('error', __('messages.admin.news.fail'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sources $source): JsonResponse
    {
        try {
            $source->delete();

            return \response()->json('ok');
        } catch (\Exception $exeption) {
            \Log::error($exeption->getMessage(), [$exeption]);

            return \response()->json('error', 400);
        }
    }
}
