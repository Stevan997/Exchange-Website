@extends('welcome')

@section('content')
    <div class="w-75">
        <a href="/exchange" class="float-left mb-3 mr-3 col-md-1 btn btn-secondary"> <i
                class="fas fa-arrow-left"></i> Go Back</a>
        <table class="table table-bordered">
            <tbody>
            <tr>
                <td>Status</td>
                <td>{{$data['status']}}</td>
            </tr>
            <tr>
                <td>Bought</td>
                <td>{{$data['amount']}} {{$data['currency']}}</td>
            </tr>
            <tr>
                <td>Paid</td>
                <td>{{$data['paid']}}</td>
            </tr><tr>
                <td>Discount</td>
                <td>{{$data['discount']}}%</td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
