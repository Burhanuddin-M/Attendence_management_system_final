<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee's Master Table</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body><br>

    <div class="container">
        <button class="btn btn-primary text-center">
            <a href="{{ route('attendence.index') }}" class="text-white text-decoration-none">←</a>
        </button>
        <h1 class="text-center">Employee Transactions</h1><br>



        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Name</th>
                    <th>Amount</th>
                    <th>Message</th>
                    <th>Date</th>
                </tr>
            </thead>

            <tbody>



                @foreach ($transactions as $transaction)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $transaction->Employee->name }}</td>
                        <td>
                            @if ($transaction->type == 'DEBIT')
                                <b class="text-danger">{{ $transaction->amount }}</b>
                            @else
                                <b class="text-success">{{ $transaction->amount }}</b>
                            @endif
                        </td>
                        <td>{{ $transaction->note }}</td>
                        <td>{{$transaction->created_at->diffForHumans()}}</td>

                    </tr>
                @endforeach


            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>
