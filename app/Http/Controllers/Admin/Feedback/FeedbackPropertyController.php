<?php

namespace App\Http\Controllers\Admin\Feedback;

use App\Http\Controllers\Admin\Abstracts\AdminController;
use App\Models\FeedbackProperty;
use Illuminate\Http\Request;

class FeedbackPropertyController extends AdminController
{
    const FOREIGN_FIELD = 'feedback_id';
    const MODEL = FeedbackProperty::class;
    const TABLE = 'feedback_properties';


    public function store(Request $request){
        return parent::store($request);
    }
}
