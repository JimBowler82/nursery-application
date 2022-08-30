<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AssessmentQuestionsResource;
use App\Models\Assessment;
use App\Models\Subscale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AssessmentController extends Controller
{
    public function getQuestionData(Request $request, Assessment $assessment)
    {
        if(!$assessment->questionData) {
            $data = Subscale::with('items.questions')->get();
            return response()->json([
                'success' => true,
                'payload' => AssessmentQuestionsResource::collection($data)
            ]);
        }

        return response()->json([
            'success' => true,
            'payload' => $assessment->questionData
        ]);

    }

    public function storeAssessmentQuestionData(Request $request, Assessment $assessment)
    {
        if(!$assessment) {
            return response()->json([
                'success' => false,
                'message' => "No assessment model for id"
            ]) ;
        }

        $assessment->questionData = $request->all();
        $assessment->completed = $assessment->completedValue;
        $assessment->save();


        return response()->json([
            'success' => true,
            'payload' => []
        ]);



    }
}
