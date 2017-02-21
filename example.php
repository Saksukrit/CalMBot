<?php

include ('line-bot-api/line-bot.php');

/* ====================================================================================
 * Variable
 * ==================================================================================== */

$channelSecret = '7250dbd91d435551040866aed3c4b3ef';
$access_token  = 'uEaFS7lHeCcF0FEBVNQtuBTVpwVzjMCSebgBPdA/XUqgxzpYg8MHySfkmKpKys/TTEvQO99XihXnZaPKVO/4VsQXLqs8LQZdmskXuwncFHyI8/GZjv91J9Q/YN/pmATJTvlp6YOxOBypA2QFg1r6OwdB04t89/1O/w1cDnyilFU=';

$adminId       = 'U39f72c...........0d6ddf';

/* ====================================================================================
 * TEST
 * ==================================================================================== */

if (empty($_REQUEST['action'])) {

    $bot = new BOT_API($channelSecret, $access_token);

    if (!empty($bot->isEvents)) {

        if (!empty($bot->isText)) {

            if ($bot->text == 'get_user_id:') {
                $bot->replyMessageNew($bot->replyToken, $bot->source->userId);
            }

            if ($bot->text == 'get_message:') {
                $bot->replyMessageNew($bot->replyToken, json_encode($bot->message));
            }

            if ($bot->text == 'get_status:') {
                $bot->replyMessageNew($bot->replyToken, '200: OK.');
            }

            $bot->replyMessageNew($bot->replyToken, json_encode($bot->message));

        }

        if (!empty($bot->isImage)) {
            $bot->replyMessageNew($bot->replyToken, json_encode($bot->message));
        }

        if (!empty($bot->isSticker)) {
            $bot->replyMessageNew($bot->replyToken, json_encode($bot->message));
        }

        $bot->replyMessageNew($bot->replyToken, json_encode($bot->message));

        if ($bot->isSuccess()) {

            echo 'Succeeded!';
            exit();

        }

        // Failed
        echo $bot->response->getHTTPStatus . ' ' . $bot->response->getRawBody();
        exit();

    }

}

/* ====================================================================================
 * Verify
 * ==================================================================================== */

else if (!empty($_REQUEST['action'])) {

    $bot = new BOT_API($channelSecret, $access_token);

    if ($_REQUEST['action'] == 'verify') {

        $bot->pushMessageToAdmin("\"SUCCESS\":\n" . json_encode(BOT_API::verify()));
        return;

    }

    if ($_REQUEST['action'] == 'status') {

        $bot->pushMessageToAdmin('200: OK.');
        return;

    }

    if ($bot->isSuccess()) {

        echo 'Succeeded!';
        exit();

    }

    // Failed
    echo $bot->response->getHTTPStatus . ' ' . $bot->response->getRawBody();
    exit();

}

# ====================================================================================

echo 'HELLO: LINE Bot.';
exit();
