<div id="searsh">
            <input type='text' id='q_searsh'>
            <button id='b_searsh'>Искать</button>
        </div>
        <div id='result'>Результат...</div>

<?php
if(empty($_POST['q'])){echo'Пустой запрос';}
else{
    $_POST['q'] = urlencode($_POST['q']);
    $url = file_get_contents("https://api.vk.com/method/users.search?q=".$_POST['q']."&fields=photo,screen_name,domain&access_token=e02e54d5a66783a3759c1d31ccfa3b546591ecb2cb5e9e85881aed4f986e2f04f97d2f6851602044506ea");
    $data = json_decode($url,true);
    //echo '<pre>';
    for($i=1;$i<$data['response'][$i];$i++){
        echo "
        <div class='result_wr'>
        <div class='user_wr'>
            <div class='id'>".$data['response'][$i]['id']."</div>
            <div class='photo'><img src='".$data['response'][$i]['photo']."' alt='".$data['response'][$i]['id']."'></div>
            <div class='first_name'>".$data['response'][$i]['first_name']."</div>
            <div class='last_name'>".$data['response'][$i]['last_name']."</div>
            <div class='domain'>".$data['response'][$i]['domain']."</div>
            <a class='user_link' href='https://vk.com/".$data['response'][$i]['domain']."' target='_blanc'>Смотреть</a>
        </div>
        </div>";
    }
}

?>
