@extends('layouts.app')

@section('content')
<div class="container">

 @if(Auth::user()->hasRole('Admin'))

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

                  @if($allTeacher->count() == 0)
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

               <div class="col-md-4 pull-right">
                 <div>
                     <span class="pull-left" style="font-size:20px;">Evaluations</span>
                     <div class="btn-group pull-right">
                          {{-- <button class="btn btn-white-grey btn-sm" data-toggle="modal" data-target="#addeval" style="margin-right:5px" title="Nouvelle évaluation"><i class="fa fa-flask" aria-hidden="true"></i></button> --}}
                          <a href="{{url('/entrer-des-notes')}}" class="btn btn-white-grey btn-sm" title="Saisir les notes"><i class="fa fa-plus"></i></a>
                    </div>
                 </div>
                 <br>

                 <table class="ui orange table">
                   <tr class="unread">
                     {{-- <th>Id</th>
                     <th>Nom & prenoms</th>
                     <th>Discipline</th> --}}
                   </tr>

                  {{-- @if($allTeacher->count() == 0)
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
                  @endif --}}
                </table>

                 </div>
       </div>

       @endif


       <form id="search-stud" action="{{ url('/get-search-form') }}" method="POST" style="display: none;">
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
       </div>
     </div>


@endsection
