<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Timber House Enterprise</title>
</head>

<body><br>

    <div class="container text-center">
        <h1 class="text-center text-primary">Attendence Module</h1><br>
        <!-- For medium and larger screens, the buttons will be displayed inline -->
        <div class="d-none d-md-block">
            <a href="{{route('addEmployee')}}" class="btn btn-primary btn-block w-50">Add Beneficiary</a><br><br>
            <a href="{{route('attendence')}}" class="btn btn-primary btn-block w-50">Attendance</a><br><br>
            <a href="{{route('masterTable')}}" class="btn btn-primary btn-block w-50">Master Table</a><br><br>
            <a href="{{route('allowance')}}" class="btn btn-primary btn-block w-50">Allowance</a><br><br>
            <a href="" class="btn btn-primary btn-block w-50">Report</a>
        </div>
    </div>
    
    
    
    


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    -->
</body>

</html>
