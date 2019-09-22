<?php

function CallAPIfromGetRequest($url)
{
    $json_file = file_get_contents($url);
    return json_decode($json_file, true);
}

$access_token = ""; //sana ait access token'ı string içine yapıştırabilirsin
$url = sprintf("https://api.instagram.com/v1/users/self/?access_token=%s",$access_token);
$instagram_array = CallAPIfromGetRequest($url)

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</head>

<b>
    <div class="container-fluid">
        <div class="card">

            <div class="card-header" style="text-align:center;">
                <b> Your İnstagram Account </b>
            </div>
            <br>
            <?php
            printf("<img src='%s' style='width:18rem;border:solid;margin-left:auto;margin-right:auto;'/>", $instagram_array['data']['profile_picture']);
            printf(
                "
             <div class='card-body'>
             <h3 class='display-5'>Your İnstagram Full Name:%s</h3>
             <p class='card-text' style='border:1px solid;'>
                <b>%s</b>
             </p>
              <p class='card-text' style='border:1px solid;'>
                Medias,Follows and Followers
                <ul class='list-group list-group-flush'>
                  <li class='list-group-item'>%d</li>
                  <li class='list-group-item'>%d</li>
                  <li class='list-group-item'>%d</li>
                </ul>
             </p>

             </div>",
                $instagram_array['data']['full_name'],
                $instagram_array['data']['bio'],
                $instagram_array['data']['counts']['media'],
                $instagram_array['data']['counts']['follows'],
                $instagram_array['data']['counts']['followed_by']

            );


            ?>
        </div>
    </div>
</b>

</html>
