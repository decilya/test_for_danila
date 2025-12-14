<?php

namespace common\services;

use http\Client;


/**
 * Сервис получения новостей
 */
class NewsService
{
    public function getTodayNews(): array
    {
        $client = new Client();
        $response = $client->get('https://newsapi.org/v2/top-headlines', [
            'country' => 'ru',
            'apiKey' => 'e79847f8f3514d36a3a0c4042491f97f', // по-хорошему нужно вынести в .env, но это только простое тестовое
            'pageSize' => 3,
        ])->send();

        if ($response->isOk) {
            $data = $response->data;
            return array_map(function ($article) {
                return $article['title'];
            }, $data['articles']);
        }

        return ['Новости временно недоступны.'];
    }
}
