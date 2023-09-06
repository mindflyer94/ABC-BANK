@extends('layouts.layout')
@section('container')




<div class="col-8 offset-2">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Deposit Money</h3>
        </div>
        <div class="card-body">
            <form name="deposite" action="{{ route('deposit.create') }}" method="POST" enctype="multipart/form-data" id="deposite" class="form">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Amount</label>
                    <input type="number" name="amount" class="form-control" placeholder="Enter amount to deposit" required>
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-primary ms-auto">Deposit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $("#deposite").on("submit", function(event) {
            event.preventDefault(); 
            var formData = $(this).serialize();
            $.ajax({
                type: "POST",
                url: "{{ route('deposit.create') }}",
                data: formData,
                dataType: "json", 
                success: function(response) {
                    if (response.status == true) {
                        toastr.success(response.message);
                        setTimeout(function() {
                            location.reload();
                        }, 500);
                    } else {
                        toastr.error("An error occurred.");
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    });
</script>
@endsection