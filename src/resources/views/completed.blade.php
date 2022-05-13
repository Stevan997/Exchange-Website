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
            @if($data['status'] == 'fail')
                <tr>
                    <td>Message</td>
                    <td>{{$data['message']}}</td>
                </tr>
            @else
                <tr>
                    <td>Bought</td>
                    <td>{{$data['amount']}} {{$data['currency']}}</td>
                </tr>
                <tr>
                    <td>Paid</td>
                    <td>{{$data['paid']}} USD</td>
                </tr><tr>
                    <td>Discount (Included)</td>
                    <td>{{round($data['discount'], 2)}} USD</td>
                </tr>
            @endif
            </tbody>
        </table>
    </div>
@endsection
