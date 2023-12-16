<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee's Master Table</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">

    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
</head>

<style>
    div.dataTables_wrapper {
        width: 300px;
        margin: 0 auto;
    }
</style>

<body><br>

    <div class="container">
        <h2 class="text-center text-primary">{{ $employeeData->name }}'s Report</h2><br>
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

            <tbody>
                @while ($temp_date->lessThanOrEqualTo($end_date) && $temp_date->lessThanOrEqualTo(Carbon::now()))
                    <tr>
                        @if (count($attendance) > 0)
                            @if ($temp_date->equalTo(Carbon::parse($attendance[0]['date'])))
                                <td>{{ $attendance[0]['date'] }}</td>
                                <td>{{ $attendance[0]['type'] == 'PRESENT' ? '✅' : '❌' }}</td>
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
                    </tr>
                    @php
                        $temp_date = $temp_date->addDay();
                    @endphp

                @endwhile
            </tbody>
            <td>-</td>
            <td>-</td>
            <td><b>{{ $total_overtime }}</b> </td>
            <td>-</td>


        </table>
    </div>


    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'excel', 'pdf', 'print'
                ]
            });
        });
    </script>

    
</body>

</html>
