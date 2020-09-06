# My First Blogger

###### tags: `Laravel`

---

## [Source Code](https://github.com/novayo/GoldWise/tree/master/Qualification_Testing)
[![hackmd-github-sync-badge](https://hackmd.io/CSLtVxwGTfW1egrds1ZOTw/badge)](https://hackmd.io/CSLtVxwGTfW1egrds1ZOTw)

---

## [Bootstrap概念](https://getbootstrap.com/docs/4.5/getting-started/introduction/)
### 看法
* 一種css套件
* [Grid system](https://getbootstrap.com/docs/4.5/layout/grid/)
    * 不同視窗大小去設定元件要佔用多少格
        * [大小區分](https://getbootstrap.com/docs/4.5/layout/grid/#grid-options)
    * 裡頭將畫面分成12的直條，如果取用 4 4 4，則畫面會切成1/3 1/3 1/3

### 引用套件
* 前四個為使用bootstrap 4套件
* 最後一個為使用ajax套件
```php=
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.2.1.js"> </script>
```

### 此專案使用到的
#### [button](https://getbootstrap.com/docs/4.5/components/buttons/)
* 套入class就能夠使用不同樣貌的button
* [radio button](https://getbootstrap.com/docs/4.5/components/buttons/#checkbox-and-radio-buttons)
    * 連在一起的按鈕且一次只能按一個
* [button上放入資料](https://stackoverflow.com/a/5309947)：data-id="資料"
    * 在js中，`var cur_id = $(this).data('id');`，用這行來取得資料並轉成數字
#### [card](https://getbootstrap.com/docs/4.5/components/card/)
* 第一種：上圖下文字
* 第二種：圖中有文字
#### [carousel](https://getbootstrap.com/docs/4.5/components/carousel/)
* 輪播圖片
* 參數設置
* [範例影片](https://www.youtube.com/watch?v=UtG7esRBjSc)
* [改變輪播時間](https://stackoverflow.com/questions/25147394/how-to-change-the-interval-time-on-bootstrap-carousel)
* [indicators變圓](https://stackoverflow.com/a/47235368/9343263)
* [bootstrap 4.0.0 fade輪播](https://stackoverflow.com/a/48666153/9343263)
    * data-interval="1000"：設定輪播速度
    * carousel-fade: 讓圖片是淡出淡入輪播，但在bootstrap 4.0.0中取消了
        * 自己寫的js file
        ```php=
        /* fade輪播，但4.0.0取消了，故自己寫 */
        .carousel-fade .carousel-item {
         opacity: 0;
         transition-duration: .6s;
         transition-property: opacity;
        }

        .carousel-fade  .carousel-item.active,
        .carousel-fade  .carousel-item-next.carousel-item-left,
        .carousel-fade  .carousel-item-prev.carousel-item-right {
         opacity: 1;
        }

        .carousel-fade .active.carousel-item-left,
        .carousel-fade  .active.carousel-item-right {
         opacity: 0;
        }

        .carousel-fade  .carousel-item-next,
        .carousel-fade .carousel-item-prev,
        .carousel-fade .carousel-item.active,
        .carousel-fade .active.carousel-item-left,
        .carousel-fade  .active.carousel-item-prev {
         transform: translateX(0);
         transform: translate3d(0, 0, 0);
        }
        ```
    * carousel-indicators：圖片下方的圖案，其中的對應是由data-target對應到id，預設是橫條
        * 改成圓形
        ```php=
        /* 改變indicators成圓形 */
        .carousel-indicators li {
          width: 10px;
          height: 10px;
          border-radius: 100%;
        }
        ```
* 範例
    ```php=
    <div id="carouselExampleIndicators" class="carousel slide carousel-fade banner" data-ride="carousel" data-interval="1000">
        <ol class="carousel-indicators banner">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>

        {{-- 輪播主框架
            * active：表示從這裡開始
        --}}
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="/img/banner_1.jpg" class="d-block w-100" alt="1">
            </div>
            <div class="carousel-item">
                <img src="/img/banner_2.jpg" class="d-block w-100" alt="2">
            </div>
            <div class="carousel-item">
                <img src="/img/banner_3.jpg" class="d-block w-100" alt="3">
            </div>
        </div>

        {{-- 左右輪播鍵 --}}
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    ```
#### [collapse](https://getbootstrap.com/docs/4.5/components/collapse/)
* 折疊式元件
* 展開幾個
    * 設定 data-parent 代表 一次只能展開一個
    * 不設定代表不限制
* show hide
    * 在展開內容的class中，加入show表示要打開，hide表示要合起
* 全部展開，全部合起：
    * 必須搭配jquery，主要作用：class中加入show or hide
    * radio button
        * 區分按到誰：按鈕的name要一樣，value要不同，用value去區分
```php=
<!-- 展開 -->
<div class="card-body">
    <div class="accordion" id="accordionExample">

        {{--  --}}
        <div class="card">
            <div class="card-header" id="heading1">
                <h2 class="mb-0">
                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
                    按鈕標題
                </button>
                </h2>
            </div>

        <div id="collapse1" class="collapse show" aria-labelledby="heading1" data-parent='accordionExample'>
            <div class="card-body">
                展開內容
            </div>
        </div>
    </div>
</div>

<!-- 全部展開，全部收回 radio button -->
<div class="btn-group btn-group-toggle" data-toggle="buttons">
    <label class="btn btn-secondary">
        <input type="radio" name="options" id="option1" value="option1"> 全部展開
    </label>
    <label class="btn btn-secondary">
        <input type="radio" name="options" id="option2" value="option2"> 全部收回
    </label>
</div>

<!-- jquery -->
<script>
    // 如果radio button被按
    $('input:radio[name="options"]').change( function(){
        // 如果 被點到的 && 值是option1 => 全部展開
        if ($(this).is(':checked') && $(this).val() == 'option1') {
            // 在 #id下的 有 collapse這個class的元素，class都加入show
            $('#accordionExample .collapse').collapse('show');
        }
        else if ($(this).is(':checked') && $(this).val() == 'option2'){
            // 在 #id下的 有 collapse這個class的元素，class都加入hide
            $('#accordionExample .collapse').collapse('hide');
        }

        // 將狀態改回 沒被按
        $(this).val() = "close";
    });
</script>
```
#### [Dropdowns](https://getbootstrap.com/docs/4.5/components/dropdowns/)
* 下拉菜單
```php=
<div class="nav-item dropdown mx-4">
    <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        按鈕名稱
    </button>
    <div class="dropdown-menu">
        <a class="dropdown-item" href="/upload">元素一</a>
        <a class="dropdown-item" href="/upload">元素二</a>
        <a class="dropdown-item" href="/upload">元素三</a>
    </div>
</div>
```
#### [input group](https://getbootstrap.com/docs/4.5/components/input-group/)
* 輸入的套件，有上傳文字（各種輸入樣式），上傳圖片
* 一定要放在form內
* required：一定要輸入才能送出
* 上傳圖片：上傳後，檔名會抓到整個上傳路徑，用jqery去擷取
```php=
<!-- enctype="multipart/form-data" 要加入才能上傳圖片 -->
<form action="/" method="POST" enctype="multipart/form-data">
<!-- 防止csrf攻擊，不然會出現519 error -->
    @csrf
    <!-- 上傳圖片 -->
<!-- accept=".png, .jpg, .jpeg"：只接受檔案副檔名 -->
    <div class="input-group mb-3">
        <div class="custom-file">
            <input name="upload_image" required accept=".png, .jpg, .jpeg" type="file" class="custom-file-input" id="image" aria-describedby="inputGroupFileAddon01">
            <label class="custom-file-label" for="image" style="word-break: keep-all;">選擇圖片 (只接受.png .jpg .jpeg)</label>
        </div>
    </div>
    <!-- 上傳圖片 - 檔名擷取 -->
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

</form>
```
#### [modal](https://getbootstrap.com/docs/4.5/components/modal/)
* 跳出子視窗以顯示通知
* 登入時自動顯示
```php=
<script>
    $(document).ready(function(){
        $('#Modalid').modal('show');
    });
</script>
```
#### [nav nav_bar](https://getbootstrap.com/docs/4.5/components/navbar/)
* [模板](https://codepen.io/rejaulkarim/pen/yzJZJR)
    

* [按鈕跳轉 navigation_bar](http://goldwisegroup.com/)
    * 在區塊中定義好各自的id，在button內加入 href="#id"
* [元素位置偏移](https://getbootstrap.com/docs/4.5/utilities/spacing/)
    * ml-auto : 靠右，mr-auto：靠左
    * [如果ml-auto失效](https://stackoverflow.com/a/49029061)
        * add container or container-fluid at parent
        * add w-100
* [跑馬燈 marquee](https://www.w3schools.in/html-tutorial/marquee-tag/)
* html中區別已登入與訪客
    * @auth ... @endauth
    * @guest ... @endguest

* [載入更多 ajax](https://www.webslesson.info/2019/02/ajax-jquery-load-more-data-in-laravel.html)
    * ajax概念：能在背景與server溝通，建立在jquery上
    * 作法：在載入畫面或是按下按鈕時，用ajax取得該有的資訊，並直接在server echo回來（echo的字直接是<div></div>那些），之後再把這些文字放到對應的區塊
    ```javascript=
    // ajax取得資料
    // _token 是 防csrf攻擊 的憑證
    function load_more_data(cur_id, attribute, _token){
        $.ajax({
            method: "POST",   // post
            url: "load_more", // 用post丟給 welcome.load_more 這個route
            data: {cur_id:cur_id, attribute:attribute, _token: _token}, // 丟入的data，server用$request->cur_id取用
            success: 
                // data 為 server 回傳回來的data（echo的文字）
                // 如果server回傳成功（回傳 後4個資料的html以及這個button）
                function(data){
                    $('#load_more_' + attribute).remove();  // 因此，在原先的html上 先刪掉button
                    $("#" + attribute).append(data);      // 在要的id的區塊後面加上data
                },
            error:
                function(jqXHR, exception){
                    alert('錯誤，請重新整理');
                }
        });
    }
    ```

## 其他資料
### [Mysql](https://dev.mysql.com/downloads/mysql/)
==一定要先創造資料庫==
* 下載完之後，設置環境變數：export PATH=${PATH}:/usr/local/mysql/bin/
* 連結資料庫
    * 登入：mysql -u root -p
    * 創建資料庫：create database 名;
    * 在.env檔案中，更改DB_DATABASE=名

### [phpmyadmin](https://www.phpmyadmin.net/downloads/)
* 下載後丟在 ==/public== 下
* 網址輸入 http://127.0.0.1:8000/phpmyadmin/index.html 即可查看資料庫

### laravel 內建登入系統
* 步驟
    * 下載ui：composer require laravel/ui
    * 創建登入組建：php artisan ui vue --auth
    * npm install
    * npm run dev

* 產生檔案
    * resources/views/auth
    * resources/views/home.blade.php
    * routes/web.php => 加入了 Auth::routes() => 背景執行auth的操作
    * app/Http/Controllers/HomeController.php => 有auth middleware，加入這個表示必須要登入才能使用，否則會跳回$redirectTo
* 如果要改變自動跳回的路由，要去改變app/Http/Controllers/Auth 下所有的 $redirectTo 變數

### 第三方登入 設定
* 要先安裝 [laravel 內建登入系統](https://hackmd.io/CSLtVxwGTfW1egrds1ZOTw?view#%E7%AC%AC%E4%B8%89%E6%96%B9%E7%99%BB%E5%85%A51)
* [socialite](https://laravel.com/docs/7.x/socialite)
    * 安裝：`composer require laravel/socialite`
* Controller設定：在`Auth\LoginController`中加入
```php=
// 第三方登入
/**
 * Redirect the user to the GitHub authentication page.
 */
public function redirectToProvider($provider)
{
    return Socialite::driver($provider)->redirect();
}

/**
 * Obtain the user information from GitHub.
 * $provider是'github' or 'google' or 'facebook'，由config/services.php中設定
 */
 
public function handleProviderCallback($provider)
{
    $provider_id = $provider.'_id';
    $user = Socialite::driver($provider)->user();

    // 先拿看看有沒有對應的id
    $newUser = User::where($provider_id, $user->getId())->first();

    // 如果沒有，確認是否有一樣的email
    if (!$newUser){
        $newUser = User::where('email',$user->getEmail())->first();

        // 如果有，更新id進去並登入
        if ($newUser){
            $newUser->$provider_id = $user->getId();
            $newUser->save();
        }

        // 如果沒有，加入資料庫
        else{
            $newUser = User::create([
                'name' => $user->getName(),
                'email' => $user->getEmail(),
                $provider_id => $user->getId(),
            ]);
        }
    }

    // user login
    Auth::login($newUser, true);

    return redirect($this->redirectTo);
}
```

* config/services.php
    * client_id：由對應網站中產生
    * client_secret：由對應網站中產生
    * redirect：callback連結
```php=
// 第三方登入
'github' => [
    'client_id' => env('GITHUB_CLIENT_ID'),
    'client_secret' => env('GITHUB_CLIENT_SECRET'),
    'redirect' => env('GITHUB_CLIENT_REDIRECT'),
],

'google' => [
    'client_id' => env('GOOGLE_CLIENT_ID'),
    'client_secret' => env('GOOGLE_CLIENT_SECRET'),
    'redirect' => env('GOOGLE_CLIENT_REDIRECT'),
],

'facebook' => [
    'client_id' => env('FACEBOOK_CLIENT_ID'),
    'client_secret' => env('FACEBOOK_CLIENT_SECRET'),
    'redirect' => env('FACEBOOK_CLIENT_REDIRECT'),
],
```
* .env設定
    * 設定 GITHUB_CLIENT_ID, GITHUB_CLIENT_SECRET, GITHUB_CLIENT_REDIRECT
    * [若更改之後沒反應](https://stackoverflow.com/a/44944388)
        > php artisan cache:clear
        > php artisan config:clear
        > php artisan view:clear

* Router設定
    * 在routes/web.php中導入，之後讓button連結到login/{provider}即可
    ```php=
    Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider');
    Route::get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback');
    ```
#### [ngrok](https://ngrok.com/)
* 使電腦當作server產生網址
* 步驟
    * 他是一個執行檔，在路徑下打入 `./ngrok http 8000` （8000為port，這樣產生出來的網址會嫁接到 http://127.0.0.1:8000）
* ==建議使用 https==

#### github
* [創建OAuth](https://github.com/settings/developers)
* 填入資料
    * Application name：app名稱
    * Homepage URL：你的網頁主連結（可以是localhost）
    * Authorization callback URL：callback連結
* 更改.env
    * Client ID：Client ID
    * Client Secret： Client Secret

#### google
* [創建OAuth](https://console.cloud.google.com/apis/)
    * 先創建專案（上方有個 **選取專案**）
    * 按下 **OAuth 同意畫面**
        * 填入資料：
            * 應用程式名稱
            * 已授權網域：你的網頁主連結，可以是localhost
    * 按下憑證
        * 填入資料：
            * 名稱：憑證名稱
            * URI：你的網頁主連結
            * 已授權的重新導向URI：callback連結
* 更改.env
    * Client ID：用戶端編號
    * Client Secret：用戶端密碼

#### facebook
* [創建App](https://developers.facebook.com/apps/)
    * 往下滑，**產品** 內有 **facebook登入**
    * 設定 網站網址：可以隨便打，但不能是localhost（https://test.com/）
    * 把這段放進去 html 的header內
    ```php=
    <script>
      window.fbAsyncInit = function() {
        FB.init({
          appId      : '{your-app-id}',
          cookie     : true,
          xfbml      : true,
          version    : '{api-version}'
        });

        FB.AppEvents.logPageView();   

      };

      (function(d, s, id){
         var js, fjs = d.getElementsByTagName(s)[0];
         if (d.getElementById(id)) {return;}
         js = d.createElement(s); js.id = id;
         js.src = "https://connect.facebook.net/en_US/sdk.js";
         fjs.parentNode.insertBefore(js, fjs);
       }(document, 'script', 'facebook-jssdk'));
    </script>
    ```
    * 去左邊，**facebook登入**，有個設定
        * 填入資料：
            * 有效的 OAuth 重新導向 URI：callback連結
* 更改.env
    * 在左邊的 ==設定->基本資料==內
        * Client ID：應用程式編號
        * Client Secret：應用程式密鑰
* ==記得要上線你的app==


## More In Future
* 還沒用 mix 的編譯（產生js檔案，jquery）
* Login System 自己寫
* 購物車