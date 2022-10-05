<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print Slip</title>
    {{-- bootstrap cdn --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    {{-- font awesome cdn --}}
</head>
<body>
    <div class="container">
        
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Roll Number Slip</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" id="name" class="form-control" value="{{ $student->name }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="father_name">CNIC</label>
                                    <input type="text" name="father_name" id="father_name" class="form-control" value="{{ $student->cnic }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="mother_name">Email</label>
                                    <input type="text" name="mother_name" id="mother_name" class="form-control" value="{{ $student->email }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="roll_number">Password for test</label>
                                    <input type="text" name="roll_number" id="roll_number" class="form-control" value="{{ $student->password_value }}" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row hideonprint">
            <div class="col-md-12"><p class="text-danger bg-warning">Kindly store this information for later purposes</p></div>
            <div class="col-md-12">
                {{-- print button --}}
                <button class="btn btn-primary" onclick="window.print()">Print</button>
            </div>
        </div>
    </div>
</body>
</html>

<style>
    .hideonprint{
        display: block;
    }
    @media print{
        .hideonprint{
            display: none;
        }
    }
</style>