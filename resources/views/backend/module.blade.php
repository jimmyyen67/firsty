@extends("layouts.layout")

@section("main")
@include("layouts.backend_sidebar")
<div class="main col-9 p-0 d-flex flex-wrap align-items-start">
    <div class="col-8 border py-3 text-center">後台管理區</div>
    <button class="col-4 btn btn-danger border py-3 text-center">管理登出</button>
    <div class="mainAdmin border w-100">
        <h4 class="text-center border-bottom p-3">
            {{ $header }}
            <button class="btn btn-primary btn-sm float-left" id="addRow">新增</button>
        </h4>
        <table class="table border-none text-center">
            <tr>
                <td>網站標題</td>
                <td>替代文字</td>
                <td>顯示</td>
                <td>刪除</td>
                <td>操作</td>
            </tr>
            @isset($rows)
            @foreach($rows as $row)
            <tr>
                <td><img src="{{ asset('storage/image/'.$row->image) }}" class="imageTitle"></td>
                <td>{{ $row->text }}</td>
                <td><button class="btn btn-success btn-sm" data-id="{{ $row->id }}"> @if($row->sh==1) 顯示 @else 隱藏 @endif </button></td>
                <td><button class="btn btn-danger btn-sm" data-id="{{ $row->id }}">刪除</button></td>
                <td><button class="btn btn-info btn-sm edit" data-id="{{ $row->id }}">編輯</button></td>
            </tr>
            @endforeach
            @endisset
        </table>
    </div>
</div>
@endsection

@section("script")
<script>
    //新增按鈕行為
    $("#addRow").on("click", function() {
        $.get("/modals/add{{ $module }}", function(modal) {
            $("#modal").html(modal)
            $("#baseModal").modal("show")

            $("#baseModal").on("hidden.bs.modal", function() {
                $("#baseModal").modal("dispose")
                $("#modal").html("")
            })
        })
    })

    //編輯按鈕行為
    $(".edit").on("click", function() {
        let id = $(this).data("id")
        // console.log(id)
        $.get(`/modals/title/${id}`, function(modal) {
            $("#modal").html(modal)
            $("#baseModal").modal("show")

            $("#baseModal").on("hidden.bs.modal", function() {
                $("#baseModal").modal("dispose")
                $("#modal").html("")
            })
        })
    })
</script>
@endsection