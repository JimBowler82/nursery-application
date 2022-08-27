<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AssessmentQuestionsResource;
use App\Models\Subscale;
use Illuminate\Http\Request;

class AssessmentController extends Controller
{
    public function getQuestionData()
    {
        $data = Subscale::with('items.questions')->get();

        return response()->json([
            'success' => true,
            'payload' => AssessmentQuestionsResource::collection($data)
        ]);
    }
}
