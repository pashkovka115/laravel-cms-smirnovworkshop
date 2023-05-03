<?php

namespace App\Http\Controllers\Admin\Feedback;

use App\Http\Controllers\Admin\Abstracts\AdminAdminController;
use App\Models\Feedback\FeedbackAdditionalFields;
use Illuminate\Http\Request;

class FeedbackAdditionalFieldsController extends AdminAdminController
{
    const FOREIGN_FIELD = 'feedback_id';
    const MODEL = FeedbackAdditionalFields::class;
    const TABLE = 'feedback_additional_fields';


    public function store(Request $request){
        return parent::store($request);
    }
}
