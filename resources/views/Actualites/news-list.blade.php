@extends('templates.templateUI')
@section('breadcrumb')
  <li><a href="#">Actualités du site</a></li>
  <li class="active">articles publiés</li>
@endsection

{{-- @section('section-content')

<h2 class="no-border-bottom">Articles publiés(nbre)</h2>
<div class="add-padding-15">
  <div class="panel-body">
  <div class="mail-box-header" style="padding-bottom:30px;">
          <div class="btn-group pull-right">
                <a class="btn btn-white-grey btn-sm" href="{{url('/ajouter-un-article')}}"> <i class="fa fa-plus" aria-hidden="true"></i></a>
          </div>
  </div>
  <div class="mail-box">
    <table class="table table-hover table-mail">
    <tbody>
    <tr >
        <td class="mail-contact">news texte ...</td>
        <td class="text-right mail-date"><a href="#" class="edit"><i class="fa fa-external-link" title="ouvrir le lien"></i>Lire</a></td>
        <td class="text-right mail-date"><a href="#"><i class="delete fa fa-trash-o" title="supprimer"></i></a></td>
        <td class="text-right mail-date">date pub : 18:10</td>
    </tr>
  </tbody>
    </table>
    <div class="mail-box-header" style="padding-bottom:20px;">
            <div class="btn-group pull-right">
                <a class="btn btn-white-grey btn-sm" href="{{url('/ajouter-un-article')}}"> <i class="fa fa-plus" aria-hidden="true"></i></a>
            </div>
    </div>
  </div>
  </div>
</div>
  {{-- <!-- Pagination -->

  <div class="center">
      <ul class="pagination">
          <li class="active"><a href="#">1</a></li>
          <li><a href="#">2</a></li>
          <li><a href="#">3</a></li>
          <li><a href="#">4</a></li>
          <li><a href="#">5</a></li>
      </ul><!-- /.pagination-->
  </div><!-- /.center-->
@endsection --}}


@section('heading-form')
  <strong>Actualité</strong>
@endsection
@section('heading-item')
  <strong>Posts</strong>
@endsection

@section('section-form')
  <form class="ui form">

  <div class="field">
    <div class="fields">
      <div class="ten wide field">
        <label>Titre</label>
        <input name="Titre" placeholder="" type="text">
      </div>
      <div class="six wide field">
        <div name="Categorie" class="six wide field">
          <label>Categorie</label>
          <select class="ui search dropdown">
            <option value=""></option>
            <option value="AF">Mathematiques</option>
            <option value="AX">Sceinces physiques</option>
            <option value="AL">Chimie</option>
            <option value="DZ">Histoire-Geo</option>
            <option value="AS">Anglais</option>

            <option value="AG">...</option>
           </select>
        </div>
      </div>
    </div>
  </div>

  <div class="field">
      <label>Texte</label>
      <textarea></textarea>
  </div>

  <div class="field">
    <label>Choisir des images</label>
    <div class="input-control full-size file" data-role="input">
        <input type="file">
        <button class="button"><span class="mif-folder"></span></button>
    </div>
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
