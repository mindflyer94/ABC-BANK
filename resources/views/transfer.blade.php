@extends('layouts.layout')
@section('container')



<div class="col-8 offset-2">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Transfer Money</h3>
        </div>
        <div class="card-body">
            <form name="deposite" action="{{ route('transfer.create') }}" method="POST" enctype="multipart/form-data" id="transfer" class="form">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Email Address</label>
                    <input type="email" name="email" class="form-control" placeholder="Enter email" required>
                    <p class="invalid-feedback danger mb-0" id="js_email_error"></p>
                </div>

                <div class="mb-3">
                    <label class="form-label">Amount</label>
                    <input type="number" name="amount" class="form-control" placeholder="Enter amount to transfer" required>
                    <p class="invalid-feedback danger mb-0" id="js_amount_error"></p>
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-primary ms-auto">Transfer</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        $("#transfer").on("submit", function(event) {
            event.preventDefault(); 
            var formData = $(this).serialize();
            $.ajax({
                type: "POST",
                url: "{{ route('transfer.create') }}",
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
                error: function(response) {
                    $.each(response.responseJSON.errors, function (key, value) {
                            $('#js_' + key + '_error').removeClass('invalid-feedback');
                            $('#js_' + key + '_error').addClass('danger');
                            $('#js_' + key + '_error').text(value);
                        });
                }
            });
        });
    });
</script>
@endsection