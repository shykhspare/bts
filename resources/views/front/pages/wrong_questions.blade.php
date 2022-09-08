@extends('front/layout/layout')
@section('content')
@section('title','Section')
<div class="page-header mb-8">
    <div class="bg-img-hero bg-gradient-primary" style="background-image: url(../../assets/img/1920x840/img1.jpg);">
        <div class="container position-relative mb-2">
            <div class="d-flex justify-content-center">
                <h6 class="font-weight-medium text-white font-size-12">Wrong Questions</h6>
            </div>
        </div>
    </div>
</div>
<div class="site-content" id="content">
    <div class="container">
        <div class="row">
            @foreach ($data as $item)
            @php
                if($item == null) continue;
            @endphp
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h5 class="card-title">{!! $item->question !!}</h5>
                                    <p class="card-text">Correct Option
                                        <i class="fas fa-arrow-right"></i>
                                        <span class="text-success">{{ $item->quiz_question_result }}</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
