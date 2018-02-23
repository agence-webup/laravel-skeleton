@extends('helium::layouts.master')

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


@section('js')
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
