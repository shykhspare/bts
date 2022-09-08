@extends('front/layout/layout')
@section('content')
@section('title',$section->title)

<style>
    #questionTab:before {
        content: '';
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        background: url("{{ $website->getMedia('settings')[0]->getUrl('header')}}");
        background-position: center;
        background-repeat: no-repeat;

        background-attachment: fixed;
        /* z-index: 1; */
        opacity: 0.1;
    }

    .collapsebtn {
        position: relative;
        z-index: 3 !important;
    }

    .comment {
        overflow: hidden;
        padding: 0 0 1em;
        border-bottom: 1px solid #ddd;
        margin: 0 0 1em;
        *zoom: 1;
    }

    .comment-img {
        float: left;
        margin-right: 33px;
        border-radius: 5px;
        overflow: hidden;
    }

    .comment-img img {
        display: block;
    }

    .comment-body {
        overflow: hidden;
    }

    .comment .text {
        padding: 10px;
        border: 1px solid #e5e5e5;
        border-radius: 5px;
        background: #fff;
    }

    .comment .text p:last-child {
        margin: 0;
    }

    .comment .attribution {
        margin: 0.5em 0 0;
        font-size: 14px;
        color: #666;
    }

    /* Decoration */

    .comments,
    .comment {
        position: relative;
    }

    .comments:before,
    .comment:before,
    .comment .text:before {
        content: "";
        position: absolute;
        top: 0;
        left: 65px;
    }

    .comments:before {
        width: 3px;
        top: -20px;
        bottom: -20px;
        background: rgba(0, 0, 0, 0.1);
    }

    .comment:before {
        width: 9px;
        height: 9px;
        border: 3px solid #fff;
        border-radius: 100px;
        margin: 16px 0 0 -6px;
        box-shadow: 0 1px 1px rgba(0, 0, 0, 0.2), inset 0 1px 1px rgba(0, 0, 0, 0.1);
        background: #ccc;
    }

    .comment:hover:before {
        background: orange;
    }

    .comment .text:before {
        top: 18px;
        left: 78px;
        width: 9px;
        height: 9px;
        border-width: 0 0 1px 1px;
        border-style: solid;
        border-color: #e5e5e5;
        background: #fff;
        -webkit-transform: rotate(45deg);
        -moz-transform: rotate(45deg);
        -ms-transform: rotate(45deg);
        -o-transform: rotate(45deg);
    }
</style>
<div class="page-header border-bottom">
    <div class="container">
        <div class="d-md-flex justify-content-between align-items-center py-4">
            <h1 class="page-title font-size-3 font-weight-medium m-0 text-lh-lg">{{$section->title}}</h1>
            <nav class="woocommerce-breadcrumb font-size-2">
                <a href="{{url('/')}}" class="h-primary">Home</a>
                <span class="breadcrumb-separator mx-1"><i class="fas fa-angle-right"></i></span>
                <a href="{{url('book',$section->book['slug'])}}" class="h-primary">{{$section->book['title']}}</a>
                <span class="breadcrumb-separator mx-1"><i class="fas fa-angle-right"></i></span>{{$section->title}}
            </nav>
        </div>
    </div>
</div>
<div class="courses-details padding-area">
    <div class="container">
        <div class="row">

            <div class="col-lg-8  p-2" style="border:1px solid #cccccc;  border-radius: 15px;">
                <div class="card">
                    <div class="card-header text-center">
                        <b>Contents</b>
                    </div>


                    <div class="card-body p-2" id="questionTab">
                        @foreach($questions as $key => $question)

                        {!!$question->description!!}
                        @if(!empty($question->getFirstMediaUrl('question')))
                        <div class="col-lg-12">
                            <img src="{{ $question->getFirstMediaUrl('question')}}" class="img-fluid d-block mx-auto mb-3" width="300" height="300">
                        </div>
                        @endif

                        @if($question->type=="MCQS")
                        @if($book->status!=3 || $book->payment()==1)
                        <button type="button" class="btn btn-primary btn-sm collapsebtn" data-toggle="collapse" data-target="#answer{{$question->id}}">Show answer</button>
                        <button type="button" class="btn btn-primary btn-sm collapsebtn" data-toggle="collapse" data-target="#comment{{$question->id}}">Comments</button>
                        <div id="answer{{$question->id}}" class="collapse p-2 collapsebtn">
                            {{$question->answer}}
                            {!!$question->explanation!!}
                            @if(!empty($question->getFirstMediaUrl('answer_attachment')))

                            <div class="col-lg-12">
                                <img src="{{ $question->getFirstMediaUrl('answer_attachment')}}" class="img-fluid" width="300" height="300">
                            </div>
                            @endif
                        </div>

                        @if(count($question->comments)>0)
                        <div class="col-lg-12 text-left">
                            <h5>Comments :</h5>
                        </div>
                        @endif

                        <div class="col-lg-12 collapse p-2 " id="comment{{$question->id}}">
                            <table class="table" id="comment_{{$question->id}}">
                                @foreach($question->comments as $comment)


                                <tr>
                                    <td>
                                        <article class="comment">
                                            <a class="comment-img" href="#non">
                                                <img src="{{asset('images/user.png')}}" alt="" width="50" height="50">
                                            </a>
                                            <div class="comment-body">
                                                <div class="text">
                                                    <p>{!!$comment->comment!!}</p>
                                                </div>
                                                <p class="attribution">by <a href="#">{{$comment->name}}</a> at {{$comment->created_at}}</p>
                                            </div>
                                        </article>
                                    </td>

                                </tr>
                                @endforeach
                            </table>

                            @if (Auth::check())
                            <form method="post" class="form form_{{$question->id}}" data-id="{{$question->id}}">
                                <br>
                                <input type="hidden" value="{{$question->id}}" name="question_id">


                                <input type="hidden" name="name" value="{{ Auth::User()->name}}">


                                <div class="card">
                                    <textarea placeholder="Hey... say something!" rows="4" cols="50" name="comment" id="comments" class="form-control textarea" style="background:white;"></textarea>
                                </div>
                                <br>
                                <input type="submit" class="btn btn-sm btn-primary" value="Submit">
                            </form>

                            @else
                            <a href="{{url('login')}}">please login to comment</a>
                            @endif
                        </div>

                        @endif
                        @endif
                        <br>
                        @endforeach

                        <div class="row p-2 collapsebtn">
                            <div class="d-flex justify-content-center">
                                {!! $questions->appends(['unit' => $unit])->links("pagination::bootstrap-4") !!}
                            </div>
                        </div>
                    </div>

                </div>
            </div>



            <!-- right section  -->
            <div class="col-lg-4 p-2" style="border:1px solid #cccccc;  border-radius: 15px;">
                <div class="card">
                    <div class="card-header text-center">
                        <b>Contents Details</b>
                    </div>
                </div>
                <div id="accordion">
                    @foreach($section->units as $key=> $u)
                    <?php
                    $active = "";
                    if ($u->id == $unit) {
                        $active = "bg-primary";
                    } ?>
                    <div class="card">
                        <div class="card-header {{$active}}">
                            <a class="text-uppercase text-dark h-dark font-weight-medium mr-auto " href="{{url('section-details',$section->slug)}}?unit={{$u->id}}">
                                {{$key+1}}. {{$u->title}}
                            </a>
                        </div>
                        @if (Auth::user())
                        <button onclick="createQuiz({{$u->id}})" class="btn btn-success btn-sum p-0 text-left">Create Quiz</button>
                        @endif
                    </div>
                    @endforeach
                    @if (Auth::user())
                    <button onclick="createQuiz('s')" class="btn btn-warning btn-block mt-5 p-0 text-left">Create Quiz in Whole Unit</button>
                    @endif
                </div>
            </div>
        </div>

    </div>
</div>
{{-- bootstrap modal --}}
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Quiz</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{url('create-quiz')}}" id="quizForm">
                    @csrf
                    <input type="hidden" name="section_id" value="{{$section->id}}">
                    <input type="hidden" name="unit_id" id="unit_id" value="{{$unit}}">
                    <input type="hidden" name="section_quiz" id="section_quiz" value="">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Quiz Questions</label>
                        <select class="form-control" required id="quiz_type" name="quiz_numbers">
                        </select>
                    </div>
                    {{-- submit button --}}
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    function createQuiz(unit_id) {
        if (unit_id == 's') {
            $("#section_quiz").val(1);
            $("#quiz_type").html(
                '<option value="">Select no. of MCQs</option><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="75">75</option><option value="100">100</option>'
            );
            $("#exampleModal").modal("show");
            return;
        } else {
            $("#section_quiz").val("");
            $("#quiz_type").html("");
            // expand modal
        }
        $("#unit_id").val(unit_id);
        $.ajax({
            url: "{{url('get-mcqs')}}",
            type: "GET",
            data: {
                "unit_id": unit_id
            },
            success: function(data) {
                // if data is empty then return
                if (data.length == 0) {
                    alert('No questions found');
                    return;
                }
                data.mcqs = parseInt(data.mcqs);
                if (data.mcqs == 10) {
                    $("#quiz_type").html('<option value="10">10</option>');
                } else if (data.mcqs == 25) {
                    $("#quiz_type").html(
                        '<option value="">Select no. of MCQs</option><option value="10">10</option><option value="25">25</option>'
                    );
                } else if (data.mcqs == 50) {
                    $("#quiz_type").html(
                        '<option value="">Select no. of MCQs</option><option value="10">10</option><option value="25">25</option><option value="50">50</option>'
                    );
                } else if (data.mcqs == 75) {
                    $("#quiz_type").html(
                        '<option value="">Select no. of MCQs</option><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="75">75</option>'
                    );
                } else if (data.mcqs == 100) {
                    $("#quiz_type").html(
                        '<option value="">Select no. of MCQs</option><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="75">75</option><option value="100">100</option>'
                    );
                } else {
                    $("#quiz_type").html("");
                }
            }
        });
        $('#exampleModal').modal('show');
    }
    $(document).ready(function() {
        var appUrl = $("meta[name=base_url]").attr("content");
        $(".collapsebtn").click(function() {
            $(".collapse").removeClass("show");
        });

        $(".form").submit(function(event) {
            var question_id = $(this).attr('data-id');


            var formData = new FormData(this);
            var this_ = this;
            var comment = $("textarea[name='comment']", this).val();

            event.preventDefault();

            $.ajax({
                url: appUrl + '/commentpost',
                type: 'POST',
                data: formData,
                async: false,
                cache: false,
                contentType: false,
                processData: false,
                success: function(data) {
                    console.log(data);
                    if (data.response === "success") {

                        $("textarea[name='comment']", this_).val('');
                        var variable = '' +
                            '    <article class="comment">' +
                            '                                            <a class="comment-img" href="#non">' +
                            '                                                <img src="' + appUrl + '/images/user.png" alt="" width="50" height="50">' +
                            '                                            </a>' +
                            '                                            <div class="comment-body">' +
                            '                                                <div class="text">' +
                            '                                                    <p>' + comment + '</p>' +
                            '                                                </div>' +
                            '                                                <p class="attribution">by <a href="#">You</a> at {{date("Y-m-d h:i:sa")}}</p>' +
                            '                                            </div>' +
                            '                                        </article>' +
                            '';
                        document.getElementById('comment_' + question_id).insertRow(-1).innerHTML = '<td>' + variable + ' </td>';
                    }

                }
            });
        });


    });
</script>
@stop