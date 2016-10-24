@extends('layouts.app')

@section('content')
<div class="container">

 @if(Auth::user()->hasRole('Admin'))

<div class="content-wrapper">

<div class="row">
  {{-- <div class="col-md-8">
      <h1 class="ui header">Anneé académique {{$aYear->academicYear}}</h1>
  </div> --}}
</div>
<div class="row ui">
               <div class="col-md-4 pull-right">
                      <div class="panel panel-default">
                          <div class="panel-heading header">Actions</div>

                          <div class="panel-body" style="background-color:none">
                               {{-- @include('layouts.sidebar') --}}
                                   <a href="{{url('ajouter-un-professeur')}}" class="btn btn-white-grey" title="Ajouter un enseingnant" style="margin-bottom:10px;"><i class="fa fa-plus"></i>&nbsp;Ajouter un enseingnant</a><br>
                                   <a href="{{url('ajouter-un-eleve')}}" class="btn btn-white-grey" title="Ajouter un élève"><i class="fa fa-graduation-cap"></i> &nbsp;Ajouter un élève</a>
                         </div>
                      </div>
               </div>

                <div class="col-md-4">
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

               <div class="col-md-8" style="margin-bottom:20px;">

                 <div class="mdl-tabs mdl-js-tabs">
                     <div class="mdl-tabs__tab-bar">
                         <a href="#enseignants-panel" class="mdl-tabs__tab  header is-active">Enseignants</a>
                         <a href="#eleves-panel" class="mdl-tabs__tab  header">Elèves</a>
                         <a href="#evaluations-panel" class="mdl-tabs__tab  header">Evaluations</a>
                         {{-- <a href="#classes-panel" class="mdl-tabs__tab  header">Classes</a> --}}
                        {{-- <a href="#cls-panel" class="mdl-tabs__tab  header">cls</a> --}}
                     </div>
                     <div class="row">
                       <br><br>

                         <div class="mdl-tabs__panel is-active" id="enseignants-panel">
                            @include('Administration.enseignants_panel')
                         </div>

                         <div class="mdl-tabs__panel" id="eleves-panel">
                             @include('Administration.eleves_panel')
                         </div>

                         <div class="mdl-tabs__panel" id="evaluations-panel">
                           @include('Administration.evaluations_panel')
                         </div>

                         <div class="mdl-tabs__panel" id="eleves-panel">
                             @include('Administration.eleves_panel')
                         </div>

{{--
                         <div class="mdl-tabs__panel" id="classes-panel">
                            @include('Administration.classes_panel')
                         </div> --}}

                    </div>

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

       {{-- <div class="btn-group pull-right floating-action-button" style="boder:1px solid">
            <button  onclick="event.preventDefault();
                     document.getElementById('search-stud').submit()" class="btn btn-white-grey btn-sm"  style="margin-right:5px" title="Recherche dans la base des élèves"><i class="fa fa-search" aria-hidden="true"></i></button>


            <button onclick="event.preventDefault();
                     document.getElementById('search-teacher').submit()" class="btn btn-white-grey btn-sm" title="Recherche dans la base des professeurs"><i class="fa fa-search"></i></button>
       </div> --}}

     </div>
</div>


@endsection
