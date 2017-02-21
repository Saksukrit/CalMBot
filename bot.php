<?php
include ('line-bot.php');
$channelSecret = '7250dbd91d435551040866aed3c4b3ef';
$access_token = 'uEaFS7lHeCcF0FEBVNQtuBTVpwVzjMCSebgBPdA/XUqgxzpYg8MHySfkmKpKys/TTEvQO99XihXnZaPKVO/4VsQXLqs8LQZdmskXuwncFHyI8/GZjv91J9Q/YN/pmATJTvlp6YOxOBypA2QFg1r6OwdB04t89/1O/w1cDnyilFU=';
$bot = new BOT_API($channelSecret, $access_token);

if (!empty($bot->isEvents))
{
    // $bot->replyMessageNew($bot->replyToken, json_encode($bot->message));
$bot->replyMessageNew($bot->replyToken, json_encode('$bot->message'));
    if ($bot->isSuccess())
    {
        echo 'Succeeded!';
        exit();
    }
    // Failed
    echo $bot->response->getHTTPStatus . ' ' . $bot->response->getRawBody();
    exit();
}

echo "OK";
?>
