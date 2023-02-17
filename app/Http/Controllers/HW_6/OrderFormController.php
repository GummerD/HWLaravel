<?php

namespace App\Http\Controllers\HW_6;

use App\Models\OrderFormHW;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\HW_7\OrderForm\EditRequest;
use App\QueryBuilders\HW\HWOrderFormQueryBuilder;
use App\Http\Requests\HW_7\OrderForm\CreateRequest;

class OrderFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(HWOrderFormQueryBuilder $orderForm):View
    {
        return \view('news.HW_6.Setorderform.index', [
            'orderForms' => $orderForm->getAll(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        return \view('news.HW_6.Setorderform.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request):RedirectResponse
    {
        $orderForms = new OrderFormHW($request->validated());

        if ($orderForms->save()) {
            return \redirect()->route('hw_6.orderForm.index')->with('success', 'Запись успешно обновлена');
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
    public function edit(OrderFormHW $orderForm): View
    {
        return \view( 'news.HW_6.Setorderform.edit', [
            'orderForm' => $orderForm,
        ]);
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditRequest $request, OrderFormHW $orderForms): RedirectResponse
    {
        $orderForms = $orderForms->fill($request->validated());
        if($orderForms->save()){
            return \redirect()->route('hw_6.orderForm.index')->with('success', __('messages.admin.news.success'));
        }

        return \back()->with('error', __('messages.admin.news.fail'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrderFormHW $orderForm)
    {
        try{
            $orderForm->delete();

            return \response()->json('ok');
        }catch(\Exception $exeption){
            \Log::error($exeption->getMessage(), [$exeption]);

            return \response()->json('error', 400);
        }
    }
}
