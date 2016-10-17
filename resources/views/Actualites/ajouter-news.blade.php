@extends('templates.templateUI')
@section('breadcrumb')
  <li><a href="#">Actualités du site</a></li>
  <li class="active">Nouvelle entrée</li>
@endsection

@section('section-title')

@endsection

@section('section-content')

  <h2 class="no-border-bottom">Nouvel article</h2>
  <div class="panel-body">

    <form class="" action="index.html" method="post">
          <div class="grid">
                  <div class="row cells2">
                      <div class="cell">
                          <label>Titre</label>
                          <div class="input-control text full-size">
                              <input type="text">
                          </div>
                      </div>
                      <div class="cell">
                          <label>Categories</label>
                          <div class="input-control text full-size select">
                              <select>
                                  <option>1</option>
                                  <option>2</option>
                                  <option>3</option>
                              </select>
                          </div>
                      </div>
                  </div>

                  <div class="row cells2">
                      <div class="cell colspan2">
                        <label>Contenu</label>
                        <div class="input-control textarea full-size"
                          data-role="input" data-text-auto-resize="true" data-text-max-height="200">
                          <textarea></textarea>
                        </div>
                      </div>
                  </div>

                  <div class="row cells3">
                      <div class="cell colspan2">
                          <label>Choisir des images</label>
                          <div class="input-control full-size file" data-role="input">
                              <input type="file">
                              <button class="button"><span class="mif-folder"></span></button>
                          </div>
                      </div>

                      <div class="cell padding5">
                          <label></label>
                          <input class="full-size" type="submit" value="Envoyer">
                      </div>
                  </div>

              </div>
    </form>
  </div>

@endsection
