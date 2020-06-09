@extends('helium::layouts.master')

@section('content')

<header class="title-wrapper">
  <h1 class="title">Liste des redirectioeeens</h1>
  <div>
    <button class="btn btn--danger" data-confirm="Voulez vous vraiment tout supprimer ?"
      data-submit="deleteRedirections">Supprimer toutes les redirections</button>
    <a href="{{ route('admin.redirection.import') }}" class="btn btn--secondary">Importer un csv</a>
    <a href="{{ route('admin.redirection.create') }}" class="btn btn--primary">Ajouter une redirection</a>
  </div>

</header>


<article class="box">
  <div class="box__content">
    <table class="dataTable stripe hover">
      <thead>
        <tr>
          <th>Url à rediriger</th>
          <th>Nouvelle url</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>
  </div>
</article>

<form id="deleteRedirections" action="{{ route('admin.redirection.destroyAll') }}" method="post">
  {{ method_field('delete') }}
  {{ csrf_field() }}
</form>

@endsection

@section('js')
<script type="text/javascript">
  $('.dataTable').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: "{{ route('admin.redirection.datatable') }}",
        columns: [
            {data: 'from', name : 'from'},
            {data: 'to', name : 'to'},
            {data: 'actions', name: 'actions', orderable: false, searchable: false, className: 'table-actions'},
        ],
        rowCallback: function( row, data, index ) {
            row.dataset.link = "{{ route("admin.redirection.edit", ["id" => "%id%"]) }}".replace("%id%",data.id);
            let dropmicEl = row.querySelector('[data-dropmic]')
            if(dropmicEl){
                new Dropmic(dropmicEl);
            }
        },
        drawCallback: function(settings, json) {
            feather.replace()
        },
        order: [[0, "desc"]],
    });
</script>
@endsection
