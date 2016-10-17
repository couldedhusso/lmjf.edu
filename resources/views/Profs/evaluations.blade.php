@extends('templates.TemplateDashboard')

@section('section-content')
  <!-- sidebar -->
          <div class="col-md-3 col-sm-2">
              <section id="sidebar">
                  <header><h3>Espace professeur</h3></header>
                  @include('layouts.sidebar')
              </section><!-- /#sidebar -->
          </div><!-- /.col-md-3 -->


<div class="col-lg-9  animated fadeInRight">
               {{-- <button class="ui right floated button" data-toggle="modal" data-target="#addeval">
                    Ajouter une évaluation
               </button>
               <br><br> --}}

                <!-- Modal -->
                <div id="addeval" class="modal fade" role="dialog">
                  <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Ajouter une évaluation</h4>
                      </div>
                      <form action="{{url('newEvaluation')}}" method="post">
                          {{ csrf_field() }}
                          <input  name="semestre" value="{{$semestre->semestreID}}" type="hidden">

                          <div class="modal-body">
                            <div class="ui equal width form">
                                <div class="fields">
                                  <div class="field">
                                    <label>Periode :  </label>
                                    <input value="{{$semestre->semestreDescription}}" readonly type="text">
                                  </div>
                                  <div >
                                    <label>Matières</label>
                                    <select name="CourseChildID">
                                      <option value="">
                                          Selectioner un champ
                                      </option>
                                      @foreach($profdisciplines as $profdiscipline)
                                          <option value="{{$profdiscipline->CourseChildID}}">
                                            {{$profdiscipline->labelCourse}}
                                          </option>
                                      @endforeach
                                    </select>
                                  </div>
                                </div>
                                <div class="fields">
                                    <div class="field">
                                      <label>Classes concernées</label>
                                        <select name="ClassRoomID[]" multiple>
                                          @foreach($classrooms as $classroom)
                                              <option value="{{$classroom->classRoomID}}">
                                                {{$classroom->ClassRoomName}}
                                              </option>
                                          @endforeach
                                         </select>
                                    </div>
                                  </div>
                                <div class="fields">
                                  <div class="field ">
                                    <label>Libellé de l'évaluation</label>
                                    <input  name="testDescription" type="text">
                                  </div>
                                  <div class="field six wide">
                                    <label>Valeur maximale</label>
                                    <input name="maxGradevalue" type="text">
                                  </div>
                                </div>
                              </div>
                          </div>
                          <div class="modal-footer">
                            <input type="submit" class="ui submit button btn-primary" name="name" value="Envoyer">
                            <button type="button" class="ui button" data-dismiss="modal">Annuler</button>
                          </div>
                      </form>


                    </div>

                  </div>
                </div>


                <div class="mail-box-header">

                      <div class="btn-group pull-right">
                         <button class="btn btn-white-grey btn-sm" data-toggle="modal" data-target="#addeval"><i class="fa fa-plus"></i></button>
                      </div>
                </div>
                <div class="mail-box">

                      <table class="table table-hover table-mail">
                            <tbody>
                              @if($evaluations->count() == 0)
                                <tr class="unread">
                                    <td class="">Id</td>
                                    <td class="">Libellé de l'évaluation</td>
                                    <td class="">Valeur maximale</td>
                                    <td class="">Date création</td>
                                </tr>

                              @else
                                @foreach($evaluations as $coursetest)
                                  <tr class="unread">
                                      <td class="">{{$coursetest->CoursetestID}}</td>
                                      <td class="">{{$coursetest->testDescription}}</td>
                                      <td class="">{{$coursetest->maxGradevalue}}</td>
                                      <td class="">{{$coursetest->created_at}}</td>
                                    </tr>
                                @endforeach
                              @endif


                        </tbody>
                    </table>
              </div>
</div><!-- /.col-md-9 -->
             <!-- end My Properties -->
@endsection
