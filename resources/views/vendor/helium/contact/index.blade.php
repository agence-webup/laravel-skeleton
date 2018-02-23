@extends('helium::layouts.master')

@section('content')
@include('helium::elements.flash')
<article class="box">
    <header class="box__header">Messages reçus</header>
    <div class="box__content">
        <table data-js="datatable">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Nom</th>
                    <th class="table-150p txtcenter">Actions</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</article>
@endsection

@section('js')
<script src="{{ asset('/assets/admin/js/modules/confirm-delete.js') }}"></script>
<script type="text/javascript">
$('[data-js=datatable]').DataTable({
    processing: true,
    serverSide: true,
    lengthChange: false, // select nombre item per page
    ajax: '{{ route('admin.contact.datatable') }}',
    columns: [
        {data: 'created_at', name: 'created_at'},
        {data: 'name', name: 'name'},
        {data: 'actions', name: 'actions', orderable: false, searchable: false, className: 'table-actions'},
    ],
    order: [[0, "desc"]],
    rowCallback: function( row, data, index ) {
        new Dropmic(row.querySelector('[data-dropmic]'));
    },
    pageLength: 20,
});
</script>
@endsection
