<?php

namespace App\Http\Controllers\HW_6;

use App\Models\HW_Sources;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\HW_7\Sources\EditRequest;
use App\QueryBuilders\HW\HWSourcesQueryBuilder;
use App\Http\Requests\HW_7\Sources\CreateRequest;

class SourcesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(HWSourcesQueryBuilder $sources): View
    {
        return \view('news.HW_6.Setsources.index', [
            'sources' => $sources->getAll(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create():view
    {
        return \view('news.HW_6.Setsources.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request): RedirectResponse
    {

        $sources = new HW_Sources($request->validated());
        if($sources->save()){
            return \redirect()->route('hw_6.sources.index')->with('success', __('messages.admin.news.success'));
        }

        return \back()->with('error', __('messages.admin.news.success'));
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
    public function edit(HW_Sources $source)
    {
        return \view( 'news.HW_6.Setsources.edit', [
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
    public function update(EditRequest $request, HW_Sources $source): RedirectResponse
    {
        $source = $source->fill($request->validated());
        if($source->save()){
            return \redirect()->route('hw_6.sources.index')->with('success', __('messages.admin.news.success'));
        }

        return \back()->with('error', __('messages.admin.news.fail'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(HW_Sources $source)
    {
        try{
            $source->delete();

            return \response()->json('ok');
        }catch(\Exception $exeption){
            \Log::error($exeption->getMessage(), [$exeption]);

            return \response()->json('error', 400);
        }
    }
}
