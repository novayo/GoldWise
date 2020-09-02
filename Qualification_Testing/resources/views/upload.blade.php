@extends('layouts.header')
@extends('layouts.nav')

@section('upload')

    <div style="padding: 2%;">
        <div class="container-fluid col-10" style="background:WhiteSmoke; padding: 3%; border-style: dashed;">
            <div class="container" style="padding: 2%;">
                <h1>發布文章</h1>

                {{-- 檔名相同會覆蓋 --}}
                {{-- 這個要寫才能傳檔案喔：） enctype="multipart/form-data" --}}
                <form action="/" method="POST" enctype="multipart/form-data">
                    @csrf

                    {{-- 選擇圖片(png, jpg, jpeg) --}}
                    <div class="input-group mb-3">
                        <div class="custom-file">
                            <input name="upload_image" required accept=".png, .jpg, .jpeg" type="file" class="custom-file-input" id="image" aria-describedby="inputGroupFileAddon01">
                            <label class="custom-file-label" for="image">選擇圖片 (只接受.png .jpg .jpeg)</label>
                        </div>
                    </div>
                    {{-- 替換圖片文字 --}}
                    <script>
                        $('#image').on('change',function(){
                            // 拿到 C:\fakepath\filename
                            var fileName = $(this).val();

                            // 清除前面的 C:\fakepath\
                            fileName = fileName.replace(/.*[\/\\]/, '');

                            // 替換文字
                            $(this).next('.custom-file-label').html(fileName);
                        })
                    </script>

                    {{-- 文字標題 --}}
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">標題</span>
                        </div>
                        
                        <input name="guideline" required type="text" class="form-control" placeholder="輸入..." aria-label="Username" aria-describedby="basic-addon1">
                    </div>

                    {{-- 副標題(可不用) --}}
                    <div class="input-group input-group-sm mb-3">
                        <textarea name="subguideline" class="form-control" placeholder="輸入副標題(可略過)..." aria-label="副標題"></textarea>
                    </div>

                    {{-- 詳細內容 --}}
                    <div class="input-group input-group-lg mb-3">
                        <textarea name="content" required rows="10" class="form-control" placeholder="輸入內容..." aria-label="內容"></textarea>
                    </div>

                    {{-- 發布類別 跟 發布按鈕 --}}
                    <div class="container">
                        <div class="row col-sm-4 ml-auto">
                            <div class="input-group input-group-sm col">
                                <select name="attribute" class="custom-select" id="select_attribute">
                                <option value="bracelet" selected>手鐲</option>
                                <option value="ring">戒指</option>
                                </select>
                            </div>
                        
                            <div class="col">
                                <button type="submit" value="submit" class="btn btn-outline-primary">送出</button>
                            </div>
                        </div>
                    </div>

                </form>
                
            </div>
        </div>
    </div>
@endsection
















