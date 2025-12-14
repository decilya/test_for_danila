<?php

namespace console\controllers;

use common\models\BirthdayRecipient;
use common\services\NewsService;
use yii\console\Controller;

class BirthdayController extends Controller
{
    /**
     * @return string
     */
    public function actionSendGreeting(): string
    {
        $hour = (int)date('H');
        if ($hour < 12 || $hour >= 13) {
            return 'Отправка только в обед (12:00–13:00).';
        }

        $recipient = new BirthdayRecipient();
        if (!$recipient->validate()) {
            return 'Ошибка валидации данных именинника.';
        }

        $newsService = new NewsService();
        $news = $newsService->getTodayNews();

        // Формируем текст поздравления
        $message = "Дорогая {$recipient->name}!\n\n";
        $message .= "От всей души поздравляем Вас с Днём рождения! 🥳\n";
        $message .= "Вам исполняется " . (date('Y') - 1978) . " лет!\n\n";
        $message .= "Мы помним, что Вы родились {$recipient->birthDate} в {$recipient->cityOfBirth}\n";
        $message .= "и сейчас живёте по адресу: {$recipient->address}.\n\n";
        $message .= "Желаем крепкого здоровья и исполнения желаний!\n\n";
        $message .= "Актуальные новости дня:\n";
        foreach ($news as $i => $headline) {
            $message .= ($i + 1) . ". {$headline}\n";
        }
        $message .= "\nС уважением,\nВаша команда.";

        // Отправляем SMS
        try {
            Yii::$app->sms->sendSms(
                $recipient->phone,
                $message,
                true
            );
            return 'Поздравление отправлено успешно!';
        } catch (\Exception $e) {
            return 'Ошибка отправки: ' . $e->getMessage();
        }
    }
}
