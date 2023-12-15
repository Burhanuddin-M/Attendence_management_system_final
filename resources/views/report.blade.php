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

<style>
    div.dataTables_wrapper {
        width: 300px;
        margin: 0 auto;
    }
</style>

<body><br>

    <div class="container">
        {{-- <button class="btn btn-primary text-center">
            <a href="{{ route('attendence.index') }}" class="text-white text-decoration-none">←</a>
        </button> --}}

        <h1 class="text-center">Report</h1><br>

        <select id="employeeSelect" class="form-control text-center" name="name">
            @foreach ($Employees as $Employee)
                <option value="{{ $Employee->id }}">{{ $Employee->name }}</option>
            @endforeach
        </select>

        <div id="responseDiv">

            @isset($MyEmployee)
            
                <form action="" method="GET">
                    <div class="form-group">
                        <label for="start_date">Select Month and Year:</label>
                        <input type="month" id="start_date" name="start_date" class="form-control form-control-sm">
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm mt-4">Fetch Data</button>
                </form>

                <table id="example" class="display nowrap" style="width: 100%">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Type</th>
                            <th>Overtime</th>
                            <th>Salary</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($Employees as $Employee)
                            <tr>
                                <td>{{ $Employee->name }}</td>
                                <td>{{ $Employee->name }}</td>
                                <td>{{ $Employee->name }}</td>
                                <td>{{ $Employee->name }}</td>
                        @endforeach
                    </tbody>
                </table>
            @endisset
        </div>








        {{-- <br>

            
    </div>

    <script>
        $(document).ready(function() {
            // Initialize DataTable
            var dataTable = $('#example').DataTable({
                scrollX: true,
                scrollY: true
            });

        });
    </script>

    {{-- Ajax Resonse --}}
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script>
            $(document).ready(function() {
                // Attach an event listener to the select element
                $('#employeeSelect').change(function() {
                    // Get the selected value
                    var selectedEmployeeId = $(this).val();

                    // Make an Ajax request to your server
                    $.ajax({
                        url: 'report/' +
                            selectedEmployeeId, // Adjust the URL based on your route definition
                        method: 'GET',
                        success: function(response) {
                            // Update the content of the responseDiv with the received response
                            $('#responseDiv').html(response);
                        },
                        error: function(xhr, status, error) {
                            console.error('Ajax request failed:', error);
                            // Optionally, you can also handle the error in the responseDiv
                            $('#responseDiv').html('Failed to get the response. Please try again.');
                        }

                    });
                });
            });
        </script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>
