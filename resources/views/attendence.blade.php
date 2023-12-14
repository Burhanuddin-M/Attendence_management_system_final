<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employees Table</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body><br>

    <div class="container">
        <button class="btn btn-primary text-center">
            <a href="{{ route('attendence.index') }}" class="text-white text-decoration-none">←</a>
        </button>
        <h1 class="text-center">Today's Attendence</h1><br>
        <h3 class="text-center">{{ \Carbon\Carbon::now()->format('F Y') }}</h3><br>


        @if (session('success'))
                <script>
                    Swal.fire({
                        title: "Marked!",
                        text: "{{ session('success') }}",
                        icon: "success"
                    });
                </script>
        @endif

        <!-- Table with Edit Column -->
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>SR NO</th>
                    <th>Employee Name</th>
                    <th>{{ \Carbon\Carbon::now()->format('jS F') }}</th>
                    <th>Overtime</th>
                    <th>Submit</th>
                </tr>



            </thead>

            <tbody>

                @foreach ($Employees as $employee)
                    <form action="{{ route('attendencePost', ['id' => $employee->id]) }}" method="POST">
                        @csrf
                        <input type="hidden" name="name" value="{{ $employee->name }}">
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $employee->name }}</td>
                            <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="attendance" value="present">
                                    <label class="form-check-label text-success"
                                        for="present_{{ $loop->index }}"><b>P</b></label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="attendance" value="absent"
                                        checked>
                                    <label class="form-check-label text-danger"
                                        for="absent_{{ $loop->index }}"><b>A</b></label>
                                </div>
                            </td>
                            <td>
                                <select class="form-control-sm" id="numberSelect" name="hours">
                                    @for ($i = 0; $i <= 6; $i++)
                                        <option name="hour">{{ $i }}</option>
                                    @endfor
                                </select>
                            </td>

                            <td>
                                <button type="submit" class="btn btn-sm bg-primary text-white">Save</button>
                            </td>
                        </tr>
                    </form>
                @endforeach



            </tbody>
        </table>
    </div>



    <!-- Add more edit modals as needed -->

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- Font Awesome Icons -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>
</body>

</html>
