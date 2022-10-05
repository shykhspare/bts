<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Category;
use App\Models\Book;
use App\Models\Question;
use App\Models\Section;
use App\Models\Unit;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Book\IndexBook;
use Illuminate\Support\Facades\Auth;
use App\Models\OrderItem;
use App\Models\Comment;
use App\Models\Slide;
use App\Models\Test;

class PagesController extends Controller
{


    public function commentpost(Request $request)
    {
        $commentArray = [];
        if (Auth::check()) {
            $data = ['user_id' => Auth::User()->id, 'name' => Auth::User()->name];
            array_push($commentArray, $data);
        }
        $commentArray['question_id'] = $request->question_id;
        $commentArray['comment'] = $request->comment;
        $comment = Comment::create($commentArray);
        if ($comment) {
            $response = array("response" => 'success');
        } else {
            $response = array("response" => 'fail');
        }
        return Response()->json($response);
    }
    public function index()
    {
        $categories = Category::where('enabled', 1)->limit(5)->get();
        $bestsellings = Book::where('enabled', 1)->orderBy('orderNo')->limit(5)->get();
        $books = Book::where('enabled', 1)->orderBy('orderNo')->limit(12)->get();
        $authors = Author::where('enabled', 1)->with('books')->inRandomOrder()->limit(20)->get();

        $leftslides = Slide::where('type', 0)->get();
        $rightslides = Slide::where('type', 1)->get();
        return view('front/pages/index', compact('categories', 'books', 'bestsellings', 'authors', 'leftslides', 'rightslides'));
    }

    public function book($slug)
    {
        $book = Book::where('enabled', 1)->where('slug', $slug)->firstOrFail();
        return view('front/pages/book', compact('book'));
    }


    public function books(Request $request)
    {

        $books = Book::where('enabled', 1)->paginate(50);

        return view('front/pages/books', compact('books'));
    }

    public function aboutus()
    {

        return view('front/pages/aboutus');
    }


    public function contactus()
    {

        return view('front/pages/contactus');
    }

    public function test()
    {
        // all tests are here
        $done = Test::where('date', '<', date('Y-m-d'))->get();
        // all tests where date <= today
        $upcoming = Test::where('date', '>=', date('Y-m-d'))->get();

        // dd($done, $upcoming);
        return view('front/pages/test', compact('done', 'upcoming'));
    }


    public function section($book_slug, $section_slug, Request $request)
    {


        $book = Book::where('enabled', 1)->where('slug', $book_slug)->firstOrFail();
        if ($request->book == "all") {
            $sections = Section::where('enabled', 1)->where('book_id', $book->id)->where('hassection', 0)->get();
        } else {
            $section = Section::where('enabled', 1)->where('book_id', $book->id)->where('slug', $section_slug)->firstorfail();
            $sections = Section::where('enabled', 1)->where('section_id', $section->id)->get();
        }



        return view('front/pages/section', compact('book', 'sections'));
    }

    public function sectiondetails($slug, Request $request)
    {
        $section = Section::where('enabled', 1)->where('slug', $slug)->firstOrFail();


        $unit = 0;
        if ($request->has('unit')) {
            $unit = $request->unit;
        } else {
            $array = $section->units;
            if (count($array) > 0) {
                $unit = (int) $array[0]->id;
            }
        }

        $check_unit = Unit::where('section_id', $section->id)->where('id', $unit)->firstOrFail();
        if (!$check_unit) {
            abort(403, 'Unauthorized action.');
        }

        $book = $section->book;
        $payment = $book->payment();

        if ($book->status == 1 && $payment == 0) {
            abort(403, 'Please Purchase Book First.');
        } elseif ($book->status == 1 && $payment == 2) {
            abort(403, 'Payment Under Verification Process');
        }



        if ($book->status == 2 && $payment == 0) {
            $questions = Question::where('unit_id', $unit)->where('paid', 0)->paginate(6);
        } else {
            $questions = Question::where('unit_id', $unit)->paginate(6);
        }


        return view('front/pages/section-details', compact('section', 'unit', 'questions', 'book'));
    }


    public function cart()
    {
        if (Auth::check()) {
            $where = ['user_id' => Auth::User()->id];
        } else {
            $where = ['session_id' => session()->getId()];
        }

        $items = OrderItem::where($where)->where('status', 0)->with('book')->get();
        return view('front/pages/cart', compact('items'));
    }
}
