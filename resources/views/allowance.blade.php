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
        <h1 class="text-center">Employees Allowance</h1><br>

        @if (session('success'))
            <script>
                Swal.fire({
                    title: "Allowance added!",
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
                    <th>Current portfolio</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($Employees as $employee)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $employee->name }}</td>
                        <td class="@if ($employee->amount_portfolio < 0) text-danger @else text-success @endif">
                            <b>{{ abs($employee->amount_portfolio) }}</b>
                        </td>

                        <td><button class="btn" data-toggle="modal"
                                data-target="{{ '#exampleModal' . $employee->id }}"><i class="fas fa-add"></i></button>

                        </td>

                        <!-- Modal for Adding Employee -->
                        <div class="modal fade" id="{{ 'exampleModal' . $employee->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">

                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">{{ $employee->name }}'s Allowance
                                        </h5>

                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('Post_allowance', ['id' => $employee->id]) }}"
                                            method="POST">
                                            @csrf

                                            <div class="mb-3">
                                                <h3
                                                    class="text-center @if ($employee->amount_portfolio < 0) text-danger @else text-success @endif">
                                                    {{ abs($employee->amount_portfolio) }}
                                                </h3>
                                            </div>
                                            <div class="mb-3">
                                                <label for="employeeName" class="form-label">Allowance Amount</label>
                                                <input type="text" class="form-control" id="amount"
                                                    placeholder="Write the Allowance amount" name="amount">
                                            </div>


                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </tr>
                @endforeach

                <!-- Add more rows as needed -->

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
