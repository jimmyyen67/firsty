<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    //
    public function index()
    {
        //
        return view('backend.module', ['header' => '校園映像圖片管理', 'module' => 'Image']);
    }

    public function create()
    {
        $view = [
            'action'=>'/admin/image',
            'modal_header' => '新增校園映像圖片',
            'modal_body' => [
                [
                    'label' => '校園映像圖片：',
                    'tag' => 'input',
                    'type' => 'file',
                    'name' => 'image'
                ]
            ]
        ];
        return view('modals.base_modal', $view);
    }
}
