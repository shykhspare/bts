<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\QuizQuestion;
use App\Models\Section;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{

    public function resultDetails($id)
    {
        $id = base64_decode($id);
        $quiz = Quiz::find($id);
        return view('front.pages.resultDetails', compact('quiz'));
    }

    // quiz_result
    public function quiz_result(Request $request)
    {
        $quiz = Quiz::find($request->quiz_id);
        $quiz_questions = QuizQuestion::where('quiz_id', $request->quiz_id)->get();
        $correct_answers = 0;
        foreach ($quiz_questions as $question) {
            $qstn = Question::find($question->question_id);
            if ($qstn->answer == $question->result) {
                $correct_answers++;
            }
        }
        $quiz->marks = $correct_answers;
        $quiz->save();

        return view('front.pages.quiz_result', compact('quiz'));
    }


    public function switchQuestion(Request $request)
    {
        $question_id = $request->question_id;
        $quiz_id = $request->quiz_id;
        $question = QuizQuestion::where('quiz_id', $request->quiz_id)
            ->where('question_id', $request->question_id)
            ->first();
        $activeSwitcher = QuizQuestion::where('quiz_id', $request->quiz_id)
            ->where('question_id', $request->activeSwitcher)
            ->first()->result;
        $next_question = Question::where('id', $request->question_id)->first();
        if (!$next_question) {
            return response()->json(['status' => 'error', 'message' => 'No more questions']);
        }
        $data = [
            'question' => Question::find($question_id)->description,
            'quiz_id' => $quiz_id,
            'question_id' => $question_id,
            'quiz_question_id' => $question->id,
            'answer' => QuizQuestion::where('quiz_id', $quiz_id)->where('question_id', $question_id)->first()->result,
            'nth_question' => QuizQuestion::where('quiz_id', $quiz_id)->where('id', '<', $question->id)->count() + 1,
            'activeSwitcher' => $activeSwitcher,
        ];
        return response()->json($data);
    }
    public function createQuiz(Request $request)
    {
        $section_quiz = $request->section_quiz;
        $num_of_questions = $request->input('quiz_numbers');
        $unit_id = $request->input('unit_id');
        $section_id = $request->input('section_id');
        // random questions where unit_id = $unit_id
        if ($request->section_quiz) {
            $units = Unit::where('section_id', $section_id)->get();
            $questions = collect();

            for ($i = 1; $i <= $num_of_questions; $i++) {
                // select random unit from $units
                $random_unit = $units->random();
                $random_question = Question::where('unit_id', $random_unit->id)->inRandomOrder()->first();
                $questions[] = $random_question;
            }
            $unit_id = 0;
        } else {
            $questions = Question::where('unit_id', $unit_id)->inRandomOrder()->take($num_of_questions)->get();
        }
        $questions_count = $questions->count();
        date_default_timezone_set('Asia/Karachi');
        $quiz = Quiz::create([
            'title' => $request->has('section_quiz') ? Section::find($section_id)->title : Unit::find($unit_id)->title,
            'user_id' => Auth::user()->id,
            'marks' => 0,
            'startingtime' => date('Y-m-d H:i:s'),
            'endingtime' => date('Y-m-d H:i:s', strtotime('+' . $questions_count . ' minutes')),
            'type' => 2,
            'quiz_in_unit' => $unit_id,
            'quiz_in_section' => $section_quiz ? $section_id : 0,
            'district' => "Peshawar",
            'result' => 0,
        ]);

        foreach ($questions as $question) {
            QuizQuestion::create([
                'quiz_id' => $quiz->id,
                'question_id' => $question->id,
                'result' => null,
                'user_id' => Auth::User()->id
            ]);
        }
        $question = QuizQuestion::where('quiz_id', $quiz->id)->get();
        $data = $question->transform(function ($item, $key) {
            $item->quiz_title = Quiz::where('id', $item->quiz_id)->first()->title;
            $item->question_count = QuizQuestion::where('quiz_id', $item->quiz_id)->count();
            $item->question = Question::find($item->question_id)->description;
            $item->startingtime = Quiz::where('id', $item->quiz_id)->first()->startingtime;
            return $item;
        });
        return view('front.pages.quiz', compact('data'));
    }

    // get_quiz
    public function get_quiz(Request $request)
    {
        $quiz_id = $request->input('quiz_id');
        $question_id = $request->input('question_id');
        $answer = $request->input('answer');
        $type = $request->input('type');

        if ($answer) {
            QuizQuestion::where('quiz_id', $quiz_id)->where('question_id', $question_id)->update(['result' => $answer]);
        }
        if ($type == 'next') {
            $question = QuizQuestion::where('quiz_id', $quiz_id)->where('question_id', $question_id)->first();
            if ($question) {
                $question_id = $question->question_id;
            } else {
                $question_id = 0;
            }
            $question = QuizQuestion::where('quiz_id', $quiz_id)->where('id', '>', $question->id)->first();
            if ($question) {
                $question_id = $question->question_id;
            } else {
                $question_id = 0;
            }
            // dd($question->id);
        } else if ($type == 'prev') {
            $question = QuizQuestion::where('quiz_id', $quiz_id)->where('question_id', $question_id)->first();
            if ($question) {
                $question_id = $question->question_id;
            } else {
                $question_id = 0;
            }
            $question = QuizQuestion::where('quiz_id', $quiz_id)->where('id', '<', $question->id)->orderBy('id', 'desc')->first();
            if ($question) {
                $question_id = $question->question_id;
            } else {
                $question_id = 0;
            }
        } else {
            $question = QuizQuestion::where('quiz_id', $quiz_id)->where('question_id', $question_id)->first();
            if ($question) {
                $question_id = $question->question_id;
            } else {
                $question_id = 0;
            }
        }
        $next_question = Question::find($question_id);
        // dd($next_question);
        if (!$next_question) {
            return response()->json(['status' => 'error', 'message' => 'No more questions']);
        }
        $data = [
            'question' => Question::find($question_id)->description,
            'quiz_id' => $quiz_id,
            'question_id' => $question_id,
            'quiz_question_id' => $question->id,
            'answer' => QuizQuestion::where('quiz_id', $quiz_id)->where('question_id', $question_id)->first()->result,
            'nth_question' => QuizQuestion::where('quiz_id', $quiz_id)->where('id', '<', $question->id)->count() + 1,
        ];
        return response()->json($data);
    }

    // wrong_questions, a function that will return the wrong questions of the quiz
    public function wrong_questions(Request $request)
    {
        $quiz_id = $request->input('quiz_id');
        $questions = QuizQuestion::where('quiz_id', $quiz_id)->get();
        // for each questions, match the result in the question table and fetch only when the result is not equal to the result in the quiz question table
        $data = $questions->transform(function ($item, $key) {
            $item->question = Question::find($item->question_id)->description;
            $item->result = Question::find($item->question_id)->result;
            $item->quiz_question_result = QuizQuestion::where('quiz_id', $item->quiz_id)->where('question_id', $item->question_id)->first()->result;
            if ($item->result != $item->quiz_question_result) {
                return $item;
            }
        });
        // dd($data);
        return view('front.pages.wrong_questions', compact('data'));
    }

    // get_mcqs
    public function get_mcqs(Request $request)
    {
        $unit_id = $request->input('unit_id');
        $mcqs = Unit::where('id', $unit_id)->first()->mcqs;
        return response()->json(['mcqs' => $mcqs]);
    }
}
