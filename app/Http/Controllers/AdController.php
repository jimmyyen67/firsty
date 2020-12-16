<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdController extends Controller
{
    public function index()
    {
        //
        return view('backend.module', ['header' => '動態廣告文字管理', 'module' => 'Ad']);
    }

    public function create()
    {
        $view = [
            'action'=>'/admin/ad',
            'modal_header' => '新增動態文字廣告',
            'modal_body' => [
                [
                    'label' => '動態廣告文字內容：',
                    'tag' => 'input',
                    'type' => 'text',
                    'name' => 'text',
                    'placeholder'=>'請輸入文字內容...'
                ]
            ]
        ];
        return view('modals.base_modal', $view);
    }
}
