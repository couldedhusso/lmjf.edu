@extends('layouts.app')

@section('content')
<div class="container">

 @if(Auth::user()->hasRole('Admin'))

<div class="content-wrapper">

<div class="row">
  <div class="col-md-8">
      <h1 class="ui header">Anneé académique {{$aYear->academicYear}}</h1>
  </div>
</div>
<div class="row ui">
               {{-- <div class="col-md-4 pull-right">
                      <div class="panel panel-default">
                          <div class="panel-heading header">Actions</div>

                          <div class="panel-body" style="background-color:none">
                              {{-- @include('layouts.sidebar')
                                   <a href="{{url('ajouter-un-professeur')}}" class="btn btn-white-grey" title="Ajouter un enseingnant" style="margin-bottom:10px;"><i class="fa fa-plus"></i>&nbsp;Ajouter un enseingnant</a><br>
                                   <a href="{{url('ajouter-un-eleve')}}" class="btn btn-white-grey" title="Ajouter un élève"><i class="fa fa-graduation-cap"></i> &nbsp;Ajouter un élève</a>
                         </div>
                      </div>
               </div> --}}

                <div class="col-md-4">
                 <div class="panel panel-default">
                     <div class="panel-heading header">Inscrits pour </div>

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

                 {{-- <div class="col-md-4">
                  <div class="panel panel-default">
                      <div class="panel-heading">Inscrits pour l'anneé académiq.  {{$aYear->academicYear}} </div>

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
                  </div> --}}
               {{-- </div> --}}

               <div class="col-md-8 ui" style="margin-bottom:20px;">

                 <div class="mdl-tabs mdl-js-tabs">
                     <div class="mdl-tabs__tab-bar">
                         <a href="#enseignants-panel" class="mdl-tabs__tab  header is-active">Enseignants</a>
                         <a href="#eleves-panel" class="mdl-tabs__tab  header">Eleves</a>
                         <a href="#evaluations-panel" class="mdl-tabs__tab  header">Evaluations</a>
                         <a href="#classes-panel" class="mdl-tabs__tab  header">Classes</a>
                     </div>
                     <div class="row">
                       <br><br>

                         <div class="mdl-tabs__panel is-active" id="enseignants-panel">
                           <div class="col-md-12" style="margin-bottom:10px;">
                             <div>
                                 <span class="pull-left" style="font-size:20px;">Liste des professeurs</span>
                                 <div class="btn-group pull-right">

                                      <button class="btn btn-white-grey btn-sm" style="margin-right:5px" title=""><i class="fa fa-plus" aria-hidden="true"></i>
                                        &nbsp;Ajouter un enseingnant
                                      </button>
                                      <button class="btn btn-white-grey btn-sm" title="Faire une recherche"><i class="fa fa-binoculars"></i>
                                      </button>
                                  </div>
                             </div>
                           </div>
                           <div class="col-md-12">
                             <table class="ui table">

                             @if($allTeacher->count() == 0)
                               <tr class="unread">
                                 <th>Nom & prenoms</th>
                                 <th>Contact</th>
                                 <th>Discipline</th>
                               </tr>

                             @else
                              <thead>
                                 <tr>
                                   <th>Nom & prenoms</th>
                                    <th>Contact</th>
                                   <th>Discipline</th>
                                   <th></th>
                                 </tr>
                              </thead>
                              <tbody>
                                @foreach($allTeacher as $teacher)
                                  <tr class="unread">
                                      <td class="">{{$teacher->id}}</td>
                                      <td class="">{{$teacher->userFirstName .' '.$teacher->userLastName}}</td>
                                        <td >{{$teacher->userContact}}</td>
                                      <td >{{$teacher->courseName}}</td>
                                      <td class="actions">
                                        <div class="btn-group pull-right">
                                          {{-- onclick="event.preventDefault();
                                                   document.getElementById('modifier-teacher').submit();" --}}
                                             <a href="{{url('update_teacher_info').'/'.$teacher->id}}" class="btn btn-white-grey btn-sm"  style="margin-right:5px" title="Modifier"
                                              ><i  class="fa fa-pencil" aria-hidden="true"></i>&nbsp;Modifier</a>

                                              <form id="modifier-teacher" action="{{ url('/update_teacher_info') }}" method="POST" style="display: none;">
                                                          {{ csrf_field() }}
                                                         <input type="hidden" name="{{$teacher->id}}" value="{{$teacher->id}}">
                                              </form>

                                             <a class="btn btn-white-red btn-sm" onclick="event.preventDefault();
                                                      document.getElementById('supprimer-teacher').submit();" title="Supprimer"><i class="fa fa-trash-o" aria-hidden="true"></i></a>

                                                      <form id="supprimer-teacher" action="{{ url('/delete-teacher') }}" method="POST" style="display: none;">
                                                          {{ csrf_field() }}
                                                          <input type="hidden" name="teacher_id" value="{{$teacher->id}}">
                                                      </form>
                                             {{-- <a href="{{url('notes-des-evalautions')}}" class="btn btn-white-grey btn-sm" title="Saisir les notes"><i class="fa fa-plus"></i></a> --}}
                                         </div>
                                      </td>
                                    </tr>
                                @endforeach
                              </tbody>
                             @endif
                           </table>
                           </div>
                         </div>
                         <div class="mdl-tabs__panel" id="eleves-panel">
                           eleves
                         </div>

                         <div class="mdl-tabs__panel" id="evaluations-panel">
                           evaluations
                         </div>
                         <div class="mdl-tabs__panel" id="classes-panel">
                           classes
                         </div>
                    </div>

               </div>

               {{-- <div class="col-md-8 ui">

                 <div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
                     <div class="mdl-tabs__tab-bar">
                         <a href="#enseignants-panel" class="mdl-tabs__tab  header is-active">Starks</a>
                         <a href="#eleves-panel" class="mdl-tabs__tab  header">Enseignants</a>
                         <a href="#evaluations-panel" class="mdl-tabs__tab  header">Eleves</a>
                         <a href="#classes-panel" class="mdl-tabs__tab  header">Evaluations</a>
                         <a href="#targaryens-panel" class="mdl-tabs__tab  header">Classes</a>
                     </div>

                     <div class="mdl-tabs__panel is-active" id="enseignants-panel">


                     </div>
                     <div class="mdl-tabs__panel" id="eleves-panel">
                       <ul>
                         <li>Tywin</li>
                         <li>Cersei</li>
                         <li>Jamie</li>
                         <li>Tyrion</li>
                       </ul>
                     </div>

                     <div class="mdl-tabs__panel" id="evaluations-panel">
                       <ul>
                         <li>Viserys</li>
                         <li>Daenerys</li>
                       </ul>
                     </div>


                    </div>

               </div> --}}

       </div>

       @endif


       {{-- <form id="search-stud" action="{{ url('/get-search-form') }}" method="POST" style="display: none;">
       {{ csrf_field() }}
       <input type="hidden" name="search-key" value="Student">
       </form>

       <form id="search-teacher" action="{{ url('/get-search-form') }}" method="POST" style="display: none;">
       {{ csrf_field() }}
       <input type="hidden" name="search-key" value="Teacher">
       </form>

       <div class="btn-group pull-right floating-action-button" style="boder:1px solid">
            <button  onclick="event.preventDefault();
                     document.getElementById('search-stud').submit()" class="btn btn-white-grey btn-sm"  style="margin-right:5px" title="Recherche dans la base des élèves"><i class="fa fa-search" aria-hidden="true"></i></button>


            <button onclick="event.preventDefault();
                     document.getElementById('search-teacher').submit()" class="btn btn-white-grey btn-sm" title="Recherche dans la base des professeurs"><i class="fa fa-search"></i></button>
       </div> --}}

     </div>
</div>


@endsection
