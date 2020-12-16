<div class="modal fade" id="baseModal" tabindex="-1" role="dialog" aria-labelledby="ModalCenter" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <form action="{{ $action }}" method="post" enctype="multipart/form-data" class="w-100">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalCenter">{{ $modal_header }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @csrf
                    @isset($method)
                    @method($method)
                    @endisset
                    <table class="m-auto">
                        @isset($modal_body)
                        @foreach($modal_body as $row)
                        <tr>
                            <td class="text-right">{{ $row['label'] }}</td>
                            <td>
                                @switch($row['tag'])
                                @case('input')
                                @include("layouts.input",$row)
                                @break
                                @case('textarea')

                                @break
                                @case('img')
                                @include("layouts.image",$row)
                                @break
                                @endswitch
                            </td>
                        </tr>
                        @endforeach
                        @endisset
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">儲存</button>
                    <button type="reset" class="btn btn-secondary">重置</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
                </div>
            </div>
        </form>
    </div>
</div>