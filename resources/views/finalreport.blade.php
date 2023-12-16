<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee's Master Table</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- Use the slim version of jQuery -->
    {{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script> --}}
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
</head>


<body><br>

    <div class="container">
        <table id="example" class="display nowrap" style="width: 100%">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Present</th>
                    <th>Overtime</th>
                    <th>Salary</th>
                </tr>
            </thead>


            @php
                use Carbon\Carbon;
                $temp_date = $start_date;
                $cross = '<div>&#10060</div>';
            @endphp

            @while ($temp_date->lessThanOrEqualTo($end_date) && $temp_date->lessThanOrEqualTo(Carbon::now()))
                <tbody>
                    @if (count($attendance) > 0)
                        @if ($temp_date->equalTo(Carbon::parse($attendance[0]['date'])))
                            <td>{{ $attendance[0]['date'] }}</td>
                            <td>{{ $attendance[0]['type'] == 'ABSENT' ? '❌' : '✅' }}</td>
                            <td>{{ $attendance[0]['extra_hours'] }}</td>
                            <td>{{ $attendance[0]['total_amount'] }}</td>
                            @php
                                array_shift($attendance);
                            @endphp
                        @else
                            <td>{{ $temp_date }}</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                        @endif
                    @else
                        <td>{{ $temp_date }}</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                    @endif

                </tbody>
                @php
                    $temp_date = $temp_date->addDay();
                @endphp

            @endwhile
            <td>-</td>
            <td>-</td>
            <td><b>{{ $total_overtime }}</b> </td>
            <td>-</td>
            {{-- @foreach ($attendance as $atd)
            @if ($temp_date->equalTo(Carbon::parse($atd->date)))
                <tbody>
                    <td>{{ $atd->date }}</td>
                    <td>{{ $atd->type }}</td>
                    <td>{{ $atd->extra_hours }}</td>
                    <td>{{ $atd->total_amount }}</td>
    
                </tbody>
            @else
            @endif
    
    
        @endforeach --}}

        </table>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>
