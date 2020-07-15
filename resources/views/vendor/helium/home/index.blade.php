@php
Helium::header()->title("Dashboard");
Helium::header()->save("Enregistrer le produit","admin.home");
Helium::header()->add("Ajouter un produit","admin.home");
Helium::breadcrumb()->push("test","admin.home");
Helium::header()->contextual([
"Supprimer les produits 1" => [
"route" => "admin.home",
"data-confirm" => "Certain ?",
"dangerous" => true
],
"Modifier l'ordre des produits" => [
"route" => "admin.home",
],
"Supprimer les produits" => [
"route" => "admin.home",
"data-confirm" => "Certain ?",
"onclick" => "alert('test')",
"dangerous" => true
],
"Ceci est un test" => "admin.home",
]);
@endphp

@extends("helium::layouts.master")

@section("content")

<x-helium-box id="test">
  <x-slot name="header">
    <x-helium-box-header title="Liste des produits" :actions="[
        'Supprimer les produits 1' => [
          'route' => 'admin.home',
          'dangerous' => true
        ],
        'Ceci est un test' => 'admin.home',
      ]" />
  </x-slot>

  test test test

  <x-slot name="footer">
    Liste des produits
  </x-slot>
</x-helium-box>


@endsection
