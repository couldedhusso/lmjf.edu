@extends('templates.TemplateDashboard')

@section('section-content')
  <!-- sidebar -->
<div class="col-md-3 col-sm-2">
              <section id="sidebar">
                  <header><h3>Espace professeur</h3></header>
                  <aside>
                      <ul class="sidebar-navigation">
                        <style>
                        ol {
                          list-style-type: none; /* СТИЛЬ НУМЕРОВАННОГО СПИСКА */
                        }
                        </style>
                        <li><a href="{{url('mes-evaluations')}}"><i aria-hidden="true"></i><span>Saisie des notes & évaluation</span></a>
                        </li>
                        <li><a href="{{url('liste-de-presence')}}"><i aria-hidden="true"></i><span>Gestion des absences</span></a>
                        </li>
                      </ul>
                  </aside>
              </section><!-- /#sidebar -->
</div><!-- /.col-md-3 -->

<div class="col-md-3 col-sm-3">
    <div class="full-height-scroll">
        <ul class="list-group elements-list">
              @foreach($classrooms as $classroom)
                 <li class="list-group-item">
                      <a data-toggle="tab" href="#{{$classroom->classRoomID}}">
                          <small class="pull-right text-muted"> {{$classroom->classRoomID}}</small>
                          <strong>{{$classroom->ClassRoomName}}</strong>
                      </a>
                  </li>
              @endforeach
        </ul>

    </div>
</div>

<div class="col-md-6 col-sm-6">
    <div class="full-height-scroll white-bg border-left">

        <div class="element-detail-box">
            @foreach($classrooms as $classroom)
                          <div class="tab-content">
                                <div id="{{$classroom->classRoomID}}" class="tab-pane">
                                  <form class="form-inline">

                                    <div class="pull-right">
                                          {{-- <button class="btn btn-white-red" title="Добавить в избранное"><i class="fa fa-heart-o"></i> </button>
                                          <button class="btn btn-white-red" title="Liste des absents"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> </button> --}}
                                          <button class="btn btn-white-grey" title="Marquer les absents"><i class="fa fa-bullhorn" aria-hidden="true"></i>&nbsp;Faire l'appel</button>
                                    </div>
                                    <div class="form-group">
                                      <label for="pwd">Periode : {{$semestre->semestreDescription}}</label>
                                      <input type="hidden" class="form-control" id="pwd">
                                    </div>
                                    <div class="small text-muted">
                                        <i class="fa fa-calendar"></i> {{date("l").', '.date("d/m/Y").', '.date("H:m")}} 
                                        <input type="hidden" class="form-control" id="pwd">
                                    </div>
                                    <br><br>

                                    <table class="table table-hover table-mail">
                                      <tbody>
                                          @foreach($studentByclassroom as $classe)
                                          {{-- @foreach($classe->Student as $stud) --}}
                                            @if($classroom->classRoomID == $classe->classRoomID)
                                              <tr class="read">
                                                  <td class="check-mail">
                                                       <input type="checkbox" class="i-checks">
                                                  </td>
                                                  <td class="">{{$classe->studentMatricule}}</td>
                                                  <td class="">{{$classe->studentName." ".$classe->studentLastName}}</td>
                                                  <td class="">{{$classe->studentBirthdate}}</td>
                                              </tr>
                                           @endif
                                          @endforeach
                                      </tbody>
                                  </table>
                                </div>
                              </form>
                          </div>

            @endforeach
        </div>

    </div>
</div>





@endsection
