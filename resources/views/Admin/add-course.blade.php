@extends('templates.templateUI')
@section('breadcrumb')
  <li class="active">Discipline</li>
@endsection

@section('heading-form')
  <strong>Ajouter une nouvelle discipline</strong>
@endsection
@section('heading-item')
  <strong>Disciplines</strong>
@endsection

@section('section-form')
  <form class="ui form">

  <div class="field">
    <div class="fields">
      <div class="ten wide field">
        <label>Nom de la discipline</label>
        <input name="CourseName" placeholder="" type="text">
      </div>
      <div class="six wide field">
          <label>Coefficient</label>
          <input name="CourseCoeff" placeholder="" type="text">
      </div>
    </div>
  </div>

  <div class="field">
    <label>Type discipline</label>
    <select name="CourseID"  class="ui search dropdown">
      <option value="">Discipline enseignée</option>
      <option value="Sciences">Sciences</option>
      <option value="Lettres">Lettres</option>
      <option value="Autres">Autres</option>
     </select>
  </div>


  <div class="field">
    <label>Description</label>
    <textarea name="description-course"></textarea>
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
