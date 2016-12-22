@extends('admin.layouts.master')

@section('content')
<article class="box">
    <header class="box__header">Liste des clients</header>
    <div class="box__content">
        <table class="table table-bordered table-hover dataTable js-datatable">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nom</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</article>
@endsection


@section('css')
<link rel="stylesheet" href="{{ asset('/node_modules/dropmic/dist/dropmic.css') }}">
@endsection

@section('js')
<script src="{{ asset('/node_modules/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('/node_modules/datatables.net/js/jquery.dataTables.js') }}"></script>
<script src="{{ asset('/node_modules/dropmic/dist/dropmic.js') }}"></script>
<script src="{{ asset('/assets/admin/js/modules/datatable.js') }}"></script>
<script>
$(function () {
    $('.js-datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('admin.customer.datatable') }}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'lastname', name: 'lastname'},
            {data: 'actions', name: 'actions', orderable: false, searchable: false, className: 'table-actions'}
        ],
        rowCallback: function( row, data, index ) {
            new Dropmic(row.querySelector('[data-dropmic]'));
        },
        pageLength: 100,
    });
});
</script>
@endsection
