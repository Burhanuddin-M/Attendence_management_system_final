<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee's Master Table</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- Use the slim version of jQuery -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
</head>

<style>
    div.dataTables_wrapper {
        width: 300px;
        margin: 0 auto;
    }
</style>

<body><br>

    <div class="container">
        <h1 class="text-center">Transactions</h1><br>

        <form action="" method="GET">
            <div class="form-group">
                <label for="start_date">Start Date:</label>
                <input type="date" id="start_date" name="start_date" class="form-control form-control-sm">
            </div>
            <div class="form-group">
                <label for="end_date">End Date:</label>
                <input type="date" id="end_date" name="end_date" class="form-control form-control-sm">
            </div>
            <button type="submit" class="btn btn-primary btn-sm mt-4">Fetch Data</button>
        </form>
        
        


        <br><table id="example" class="display nowrap" style="width: 100%">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Amount</th>
                    <th>Message</th>
                    <th>Time</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($transactions as $transaction)
                    <tr>
                        <td>{{ $transaction->Employee->name }}</td>
                        <td>
                            @if ($transaction->type == 'DEBIT')
                                <b class="text-danger">{{ $transaction->amount }}</b>
                            @else
                                <b class="text-success">{{ $transaction->amount }}</b>
                            @endif
                        </td>
                        <td>{{ $transaction->note }}</td>
                        <td>{{ $transaction->created_at->diffForHumans() }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        $(document).ready(function () {
            // Initialize DataTable
            var dataTable = $('#example').DataTable({
                scrollX: true,
                scrollY: true
            });

        });
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>
