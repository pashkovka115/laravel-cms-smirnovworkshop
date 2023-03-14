<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'string|required',
            'email' => 'email|required',
            'description' => 'string|required',
        ]);

        try {
            $message = new Feedback($data);
            $res = $message->save();

            if ($res) {
                return 'Сообщение сохранено';
            }
        } catch (\Exception $e) {
            return 'Ошибка передачи данных. Попробуйте обновить страницу и отправить сообщение ещё раз. ( '
                . $e->getMessage() . ' )';
        }

        return '';
    }
}
