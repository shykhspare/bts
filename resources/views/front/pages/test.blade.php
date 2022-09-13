@extends('front/layout/layout')
@section('content')
@section('title','Tests')
<main id="content">
    <div class="py-3 py-lg-7">
        <h6 class="font-weight-medium font-size-7 text-center my-1">Tests</h6>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>Upcomming Tests</h4>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Test Name</th>
                            <th>Test Date</th>
                            {{-- <th>Test Time</th> --}}
                            <th>Announced</th>
                            <th>Last</th>
                            {{-- <th>Test Fee</th> --}}
                            <th>Apply</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($upcoming as $test)
                        <tr>
                            <td>{{$test->title}}</td>
                            <td>{{$test->date}}</td>
                            <td>{{
                                    date('d M Y',strtotime($test->announce_date))
                                }}</td>
                            {{-- <td>{{$test->price}}</td> --}}
                            <td>{{date('y M Y', strtotime($test->last_date))}}</td>
                            <td>
                                <button class="btn btn-primary btn-sm" onclick="testApplyModal({{ $test->id }})">Apply</button>
                                <button class="btn btn-primary btn-sm" onclick="printSlipModal({{ $test->id }})">Print Slip</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-md-12">
                <h4>Previous Tests</h4>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Test Name</th>
                            <th>Test Date</th>
                            {{-- <th>Test Time</th> --}}
                            <th>Announced</th>
                            <th>Last</th>
                            {{-- <th>Test Fee</th> --}}
                            <th>Result</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($done as $test)
                        <tr>
                            <td>{{$test->title}}</td>
                            <td>{{$test->date}}</td>
                            <td>{{ date('d M Y', strtotime($test->announce_date)) }}</td>
                            <td>{{date('y M Y', strtotime($test->last_date))}}</td>
                            {{-- <td>{{$test->test_status}}</td> --}}
                            <td>
                                <button class="btn btn-primary btn-sm">Result</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

{{-- testApplyModal --}}
<div class="modal fade" id="testApplyModal" tabindex="-1" role="dialog" aria-labelledby="testApplyModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="testApplyModalLabel">Apply for Test</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('testapplies.store') }}" method="POST">
                {{-- <form action="" method="POST"> --}}
                    @csrf
                    <input type="hidden" name="test_id" id="test_id">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Enter your name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" name="phone" id="phone" class="form-control" placeholder="Enter your phone" required>
                    </div>
                    <div class="form-group">
                        <label for="cnic">CNIC</label>
                        <input type="text" name="cnic" id="cnic" class="form-control" placeholder="Enter your cnic" required>
                    </div>
                    {{-- provice is dropdown --}}
                    <div class="form-group">
                        <label for="province">Province</label>
                        <select name="province" id="province" class="form-control" required>
                            <option value="1">Select Province</option>
                            {{-- @foreach($provinces as $province)
                            <option value="{{$province->id}}">{{$province->name}}</option>
                            @endforeach --}}
                        </select>
                    </div>
                    {{-- district is dropdown based on provice onchange --}}
                    <div class="form-group">
                        <label for="district">District</label>
                        <select name="district" id="district" class="form-control" required>
                            <option value="1">Select District</option>
                        </select>
                    </div>
                    {{-- tehsil is dropdown based on district onchange --}}
                    <div class="form-group">
                        <label for="tehsil">Tehsil</label>
                        <select name="tehsil" id="tehsil" class="form-control" required>
                            <option value="1">Select Tehsil</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <textarea name="address" id="address" class="form-control" placeholder="Enter your address" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea name="message" id="message" class="form-control" placeholder="Enter your message" required></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Apply</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- printSlipModal --}}
<div class="modal fade" id="printSlipModal" tabindex="-1" role="dialog" aria-labelledby="printSlipModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="printSlipModalLabel">Print Slip</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="slipForm">
                    @csrf
                    <input type="hidden" name="test_id" id="test_id">
                    <div class="form-group">
                        <label for="cnic">CNIC</label>
                        <input type="text" name="cnic" id="cnic" class="form-control" placeholder="Enter your cnic" required>
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-primary btn-block printSubmit">Print Slip</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    // testApplyModal
    function testApplyModal(id) {
        $('#test_id').val(id);
        $('#testApplyModal').modal('show');
    }

    // printSlipModal
    function printSlipModal(id) {
        $('#test_id').val(id);
        $('#printSlipModal').modal('show');
    }

    // slipForm onsubmit return false and make ajax request
    // printSubmit click
    $('.printSubmit').click(function() {
        var form = $('#slipForm');
        var formData = form.serialize();
        $.ajax({
            url: "{{ route('testapplies.print') }}",
            type: "POST",
            data: formData,
            success: function(data) {
                console.log(data);
            },
            error: function(data) {
                console.log(data);
            }
        });
    });
</script>
@endsection