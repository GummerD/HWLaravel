<?php

namespace App\Http\Controllers\HW_6;

use App\Models\HW_Sources;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\QueryBuilders\HW\HWSourcesQueryBuilder;
use Illuminate\Support\Facades\Redirect;
use PhpParser\Node\Stmt\Return_;

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
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'source_name' => 'required',
            'source_url' => 'required',
        ]);

        $sources = new HW_Sources($request->except('_token'));
        if($sources->save()){
            return \redirect()->route('hw_6.sources.index')->with('success', 'Запись успешно обновлена');
        }

        return \back()->with('error', 'Не удалось добавить запись');
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
    public function update(Request $request, HW_Sources $source): RedirectResponse
    {
        $source = $source->fill($request->except('_token'));
        if($source->save()){
            return \redirect()->route('hw_6.sources.index')->with('success', 'Запись успешно обновлена');
        }

        return \back()->with('error', 'Не удалось добавить запись');
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
