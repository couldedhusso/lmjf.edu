@extends('templates.templateUI')
@section('breadcrumb')
  <li class="active">Classes</li>
@endsection

@section('heading-form')
  <strong>Ajouter une nouvelle classe</strong>
@endsection
@section('heading-item')
  <strong>Classes</strong>
@endsection

@section('section-form')
  <form class="ui form">

  <div class="field">
    <div class="fields">
      <div class="ten wide field">
        <label>Nom de la classe</label>
        <input name="ClassRoomName" placeholder="" type="text">
      </div>
      <div class="six wide field">

          <label>Batiment</label>
          <input name="classRomLocationName" placeholder="Batiment A1" type="text">

      </div>
    </div>
  </div>

  <div class="field">
        <label>Localisation</label>
        <input name="BuildingLevel" placeholder="2e etage, batiment A1" type="text">
  </div>

  <div class="field">
        <label>Description</label>
        <textarea></textarea>
  </div>



  <button class="ui primary button">
    Envoyer
  </button>
  <button class="ui button">
    Annuler
  </button>
</form>
@endsection

@section('list-item')
   {>$scope.data<}
@endsection
