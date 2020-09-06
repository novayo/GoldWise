$('#cardlink').click((e)=>{
    e.preventDefault()
    alert('clicked!!')
})


// _token 是 防csrf攻擊 的憑證
function load_more_data(cur_id, attribute, _token){
    $.ajax({
        method: "POST",
        url: "load_more", // 用post丟給 welcome.load_more 這個route
        data: {cur_id:cur_id, attribute:attribute, _token: _token},
        success: 
            // data 為 server 回傳回來的data
            // 如果server回傳成功（回傳 後4個資料的html以及這個button）
            function(data){
                $('#load_more_' + attribute).remove();  // 因此，在原先的html上 先刪掉button
                $("#" + attribute).append(data);      // 再接上回傳回來的data
            },
        error:
            function(jqXHR, exception){
                alert('錯誤，請重新整理');
            }
    });
}