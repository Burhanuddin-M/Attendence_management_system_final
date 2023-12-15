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
        <h1 class="text-center">Master Table</h1><br>

        <h3 class="text-center">{{ \Carbon\Carbon::now()->format('jS F Y') }}</h3><br>



        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>SR</th>
                    <th>Employee</th>
                    <th>P</th>
                    <th>A</th>
                    <th>Portfolio</th>
                </tr>
            </thead>

            <tbody>

            

            @foreach ($Employees as $employee)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $employee->name }}</td>
                    <td>
                        {{ $employee->attendance->where('type', 'PRESENT')->count() }}
                    </td>
                    <td>
                        {{ $employee->attendance->where('type', 'ABSENT')->count() }}
                    </td>

                    <td class="@if ($employee->amount_portfolio < 0) text-danger @else text-success @endif">
                        <b>{{ abs($employee->amount_portfolio) }}</b>
                    </td>
                </tr>
            @endforeach

 {{-- hello  --}}

            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>
