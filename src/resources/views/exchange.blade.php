@extends('welcome')

@section('content')
    <div class="w-25">
        <h3 class="text-center">Currencies</h3>
        <table class="table table-bordered" id="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Value</th>
                    <th>Surcharge</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($currencies as $currency)
                    <tr>
                        <td class="name">{{$currency->name}}</td>
                        <td class="value">{{round($currency->values[0]->value, 6)}}</td>
                        <td class="surcharge">{{$currency->surcharge_percentage}}%</td>
                        <td><button class="btn btn-secondary exchange" data-toggle="modal" data-target="#modal">Exchange</button></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel" style="font-weight: bold"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="price mb-2">Price - </p>
                    <form class="form" method="GET" action="/exchange/complete">
                        <div class="form-group">
                            <label for="amount">Amount</label>
                            <input type="text" class="form-control" required id="amount" name="amount">
                        </div>
                        <input type="hidden" id="currency" name="currency">
                        <div class="modal-footer justify-content-between">
                            <p class="float-left result" style="font-weight: bold"></p>
                            <button type="submit" class="btn btn-primary">Exchange</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $('.exchange').on( 'click', function () {
            let name = $(this).closest("tr").find(".name").text();
            let value = $(this).closest("tr").find(".value").text();
            $('.modal-title').text('Currency - ' + name);
            $(' #currency').val(name);
            $('.price').text('Value: ' + value);
        });

        let amount = $('#amount');
        amount.on( 'change', function () {
            ajaxResult();
        });

        function ajaxResult() {
            let currency = $('#currency').val();
            let value = amount.val();
            $.ajax({
                url: "/exchange/order",
                data: 'currency=' + currency + '&amount=' + value + '&ajax=1',
                type: 'GET',
                success: function(res) {
                    $('.result').text('Price: $' + parseFloat(res['paid']))
                }
            });
        }
    </script>
@endsection
