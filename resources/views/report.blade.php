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

        {{-- <select id="employeeSelect" class="form-control text-center" name="name">
            <option>Select the Employee</option>
            @foreach ($Employees as $Employee)
                <option value="{{ $Employee->id }}">{{ $Employee->name }}</option>
            @endforeach
        </select>

        <div id="responseDiv">
            
            
        </div> --}}

        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>SR</th>
                    <th>Employee</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>



                @foreach ($Employees as $employee)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $employee->name }}</td>

                        <td>
                            <a href="{{route('report.specific',['id'=>$employee->id])}}" class="btn btn-sm btn-primary">OPEN</a>
                        </td>
                        

                        
                    </tr>
                @endforeach


            </tbody>
        </table>

    </div>



  

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>
