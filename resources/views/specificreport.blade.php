<input type="hidden" id="employeeId" value="{{ $MyEmployee->id }}">

<form id="fetchDataForm">
    <div class="form-group">
        <label for="start_date">Select Month and Year:</label>
        <input type="month" id="start_date" name="date" class="form-control form-control-sm">
        <button type="button" class="btn btn-primary btn-sm mt-4" onclick="fetchData()">Fetch Data</button>
    </div>
</form>

<script>
    function fetchData() {
        var employeeId = $('#employeeId').val(); // Assuming you have an input with the employee ID
        var formData = document.getElementById("start_date").value;
        $.ajax({
            url: '/myfinalreport/' + employeeId + '/' + formData, // Concatenate employeeId to the URL
            method: 'GET',
            success: function(response) {
                $('#responseDiv').html(response);
            },
            error: function(error) {
                console.error('Ajax request failed:', error);
            }
        });
    }
</script>
