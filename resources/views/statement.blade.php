@extends('layouts.layout')
@section('container')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" />

<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Statement of account</h3>
        </div>
        <div class="table-responsive">
            <table id="statement" class="table card-table table-vcenter text-nowrap datatable">
                <thead>
                    <tr>
                        <th class="w-1">#
                        </th>
                        <th></th>
                        <th>DATETIME</th>
                        <th>AMOUNT</th>
                        <th>TYPE</th>
                        <th>DETAILS</th>
                        <th>BALANCE</th>
                    </tr>
                </thead>
                <tbody>
                 
                </tbody>
            </table>
        </div>
        <div class="card-footer d-flex align-items-center">
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        $('#statement').DataTable({
            processing: true,
            serverSide: true,
            ajax: "statement-data",
            columns: [ 
                {data: 'DT_RowIndex', name: 'DT_RowIndex', searchable : false, orderable: false},               
                { data: 'id', name: 'id' , visible:false},
                { data: 'date', name: 'date' },
                { data: 'amount', name: 'amount' },
                { data: 'type', name: 'type'},
                { data: 'details', name: 'details' },
                { data: 'balance', name: 'balance' }
            ],
            order: [[1, 'desc']],
        });
    });
</script>
@endsection