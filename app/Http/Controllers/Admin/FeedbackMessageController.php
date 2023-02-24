<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFeedbackMessageRequest;
use App\Http\Requests\UpdateFeedbackMessageRequest;
use App\Models\FeedbackMessage;

class FeedbackMessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFeedbackMessageRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(FeedbackMessage $feedbackMessage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FeedbackMessage $feedbackMessage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFeedbackMessageRequest $request, FeedbackMessage $feedbackMessage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FeedbackMessage $feedbackMessage)
    {
        //
    }
}
