@extends('layouts.header')
@extends('layouts.nav')

@section('content')
    <div style="padding: 2%;">
        <div class="container-fluid">
            <div class="card text-center">

                {{-- 產品名稱 --}}
                <div class="card-header" style="font-size: 150%;">
                    {{ $commodity->guideline }}
                </div>

                {{-- 產品圖片 --}}
                <div style="padding: 2%">
                    <img src="/img/{{ $commodity->image_name }}" class="card-img hover_action" style="width: 50%;">
                </div>

                {{-- 
                    aria-expanded: 設定是否能開啟多個
                    data-parent: 不管幾個都設定一樣
                --}}
                {{-- 折疊 --}}
                <div class="card-body">
                    <div class="accordion" id="accordionExample">

                        {{-- 產品敘述 --}}
                        <div class="card">
                            <div class="card-header" id="heading1">
                                <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
                                    產品敘述
                                </button>
                                </h2>
                            </div>
                      
                        <div id="collapse1" class="collapse show" aria-labelledby="heading1" data-parent="#accordionExample">
                            <div class="card-body">
                                <?php echo str_replace(chr(10), "<br />",  $commodity->subguideline ) ?>
                            </div>
                        </div>

                        {{-- 產品內容 --}}
                        <div class="card">
                            <div class="card-header" id="heading2">
                                <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse2" aria-expanded="true" aria-controls="collapse2">
                                    產品內容
                                </button>
                                </h2>
                            </div>
                      
                        <div id="collapse2" class="collapse show" aria-labelledby="heading2" data-parent="#accordionExample">
                            <div class="card-body">
                                <?php echo str_replace(chr(10), "<br />",  $commodity->content ) ?>
                            </div>
                        </div>

                    </div>
                </div>
                
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <label class="btn btn-secondary">
                        <input type="radio" name="options" id="option1" value="option1"> 全部展開
                    </label>
                    <label class="btn btn-secondary">
                        <input type="radio" name="options" id="option2" value="option2"> 全部收回
                    </label>
                </div>

                {{-- 全部展開 全部收回 --}}
                <script>
                    $('input:radio[name="options"]').change( function(){
                        // 如果 全部展開 被按
                        if ($(this).is(':checked') && $(this).val() == 'option1') {
                            // accordionExample 要 data-parent的名稱
                            $('#accordionExample .collapse').removeAttr("data-parent");
                            $('#accordionExample .collapse').collapse('show');
                        }
                        else if ($(this).is(':checked') && $(this).val() == 'option2'){
                            $('#accordionExample .collapse').removeAttr("data-parent");
                            $('#accordionExample .collapse').collapse('hide');
                        }

                        // 將狀態改回 沒被按
                        $(this).val() = "close";
                    });
                </script>

                <div class="card-footer text-muted">
                    {{-- 幾分鐘前發布 --}}
                    {{-- https://www.wangjingxian.cn/laravel/84.html --}}
                    {{ \Carbon\Carbon::parse($commodity->created_at)->diffForHumans() }} 發布
                </div>
            </div>
        </div>
    </div>
@endsection