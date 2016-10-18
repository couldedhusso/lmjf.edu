@extends('layouts.app')

@section('content')
<div class="container">

 @if(Auth::user()->hasRole('Teacher'))
  <div class="row">
        {{-- <div class="col-md-4 pull-right">
               <div class="panel panel-default">
                   <div class="panel-heading">Classes</div>

                   <div class="panel-body">
                       @include('layouts.sidebar')
                   </div>
               </div>
        </div> --}}

         <div class="col-md-4">
          <div class="panel panel-default">
              <div class="panel-heading">Classes</div>

              <div class="panel-body text-center">
                <span style="font-size:45px">{{$classrooms->count()}}</span>
              </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="panel panel-default">
              <div class="panel-heading">Nombre d'eleves</div>
              <div class="panel-body text-center">
                <span style="font-size:45px">{{ $studentByteacher->count() }}</span>
              </div>
          </div>
          </div>
        {{-- </div> --}}

        <div class="col-md-8">

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


          <div>
              <span class="pull-left" style="font-size:20px;">Mes evaluations</span>
              <div class="btn-group pull-right">
                   <button class="btn btn-white-grey btn-sm" data-toggle="modal" data-target="#addeval" style="margin-right:5px" title="Nouvelle évaluation"><i class="fa fa-flask" aria-hidden="true"></i></button>
                   <button class="btn btn-white-grey btn-sm" title="Saisir les notes"><i class="fa fa-plus"></i></button>
               </div>

          </div>
          <br>

          <table class="ui orange table">

           @if($evaluations->count() == 0)
             <tr class="unread">
               <th>Id</th>
               <th>Nom du test</th>
               <th>Valeur maximale</th>
               <th>Date</th>
             </tr>

           @else
            <thead>
               <tr>
                 <th>Id</th>
                 <th>Nom du test</th>
                 <th>Valeur maximale</th>
                 <th>Date</th>
               </tr>
            </thead>
            <tbody>
              @foreach($evaluations as $coursetest)
                <tr class="unread">
                    <td class="">{{$coursetest->CoursetestID}}</td>
                    <td class="">{{$coursetest->testDescription}}</td>
                    <td class="text-center">{{$coursetest->maxGradevalue}}</td>
                    <td class="">{{$coursetest->created_at}}</td>
                  </tr>
              @endforeach
            </tbody>
           @endif
         </table>

        </div>
</div>

       @else

<div class="row">
               <div class="col-md-4 pull-right">
                      <div class="panel panel-default">
                          <div class="panel-heading">Actions</div>

                          <div class="panel-body" style="background-color:none">
                              {{-- @include('layouts.sidebar') --}}
                                   <a href="{{url('ajouter-un-professeur')}}" class="btn btn-white-grey" title="Ajouter un enseingnant" style="margin-bottom:10px;"><i class="fa fa-plus"></i>&nbsp;Ajouter un enseingnant</a><br>
                                   <a href="{{url('ajouter-un-eleve')}}" class="btn btn-white-grey" title="Ajouter un élève"><i class="fa fa-graduation-cap"></i> &nbsp;Ajouter un élève</a>
                         </div>
                      </div>
               </div>

                <div class="col-md-4">
                 <div class="panel panel-default">
                     <div class="panel-heading">Elèves inscrits pour l'anneé académiq.  {{$aYear->academicYear}} </div>

                     <div class="panel-body text-center">
                       <span style="font-size:45px">{{$currentAcademiqueYearStudent->count()}}</span>
                     </div>
                 </div>
               </div>

               <div class="col-md-4">
                 <div class="panel panel-default">
                     <div class="panel-heading">Autres</div>
                     <div class="panel-body text-center">
                       <span style="font-size:45px">...</span>
                     </div>
                 </div>
                 </div>
               {{-- </div> --}}

               <div class="col-md-8">


                 <div>
                     <span class="pull-left" style="font-size:20px;">Liste des professeurs</span>
                     {{-- <div class="btn-group pull-right">
                          <button class="btn btn-white-grey btn-sm" data-toggle="modal" data-target="#addeval" style="margin-right:5px" title="Nouvelle évaluation"><i class="fa fa-flask" aria-hidden="true"></i></button>
                          <button class="btn btn-white-grey btn-sm" title="Saisir les notes"><i class="fa fa-plus"></i></button>
                      </div> --}}

                 </div>
                 <br>

                 <table class="ui orange table">

                  @if($evaluations->count() == 0)
                    <tr class="unread">
                      <th>Id</th>
                      <th>Nom & prenoms</th>
                      <th>Discipline</th>
                    </tr>

                  @else
                   <thead>
                      <tr>
                        <th>Id</th>
                        <th>Nom & prenoms</th>
                        <th>Discipline</th>
                      </tr>
                   </thead>
                   <tbody>
                     @foreach($allTeacher as $teacher)
                       <tr class="unread">
                           <td class="">{{$teacher->id}}</td>
                           <td class="">{{$teacher->userFirstName .' '.$teacher->userLastName}}</td>
                           <td >{{$teacher->courseName}}</td>
                         </tr>
                     @endforeach
                   </tbody>
                  @endif
                </table>

               </div>
       </div>

       @endif

@endsection
