<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Title;

class TitleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all = Title::all();
        // dd($all);
        return view('backend.module', ['header' => '網站標題管理', 'module' => 'Title', 'rows' => $all]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $view = [
            'action' => '/admin/title',
            'modal_header' => '新增網站標題',
            'modal_body' => [
                [
                    'label' => '標題區圖片：',
                    'tag' => 'input',
                    'type' => 'file',
                    'name' => 'image'
                ],
                [
                    'label' => '標題區替代文字：',
                    'tag' => 'input',
                    'type' => 'text',
                    'name' => 'text'
                ]
            ]
        ];
        return view('modals.base_modal', $view);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $filename = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/image', $filename);
            $text = $request->input('text');

            $title = new Title;
            $title->image = $filename;
            $title->text = $text;
            $title->save();
        }

        return redirect('/admin/title');
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
    public function edit($id)
    {
        //
        $title = Title::find($id);
        // dd($title);
        $view = [
            'action' => '/admin/title/' . $id,
            'method' => 'patch',
            'modal_header' => '編輯網站標題資料',
            'modal_body' => [
                [
                    'label' => '目前標題區圖片：',
                    'tag' => 'img',
                    'src' => $title->image,
                    'style' => 'width:300px;height:30px;'
                ],
                [
                    'label' => '更換標題區圖片：',
                    'tag' => 'input',
                    'type' => 'file',
                    'name' => 'image'
                ],
                [
                    'label' => '標題區替代文字：',
                    'tag' => 'input',
                    'type' => 'text',
                    'name' => 'text',
                    'value' => $title->text
                ]
            ]
        ];
        return view('modals.base_modal', $view);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $title = Title::find($id);
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $filename = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/image', $filename);
            $title->image = $filename;
        }

        // 判斷text是否有做更改，有的話再進行資料表的覆蓋
        if ($title->text != $request->input('text')) {
            $text = $request->input('text');
            $title->text = $text;
        }

        $title->save();

        return redirect('/admin/title');
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
