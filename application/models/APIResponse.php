<?php

namespace application\models;

use application\config\Config;

class APIResponse {
    private $top_headlines_string ='https://newsapi.org/v2/top-headlines?country=%2$s&apiKey=%1$s';

    public function getTopHeadlines() {
        $request_string =  sprintf($this->top_headlines_string, Config::get('api_key'), Config::get('country'));
        $news_list = json_decode(file_get_contents($request_string));

        if ($news_list->status == 'ok') {
            return $news_list->articles;
        }
    }
}
