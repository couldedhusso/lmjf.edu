@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">

        <div class="col-md-3 col-sm-3">
        {{-- <div class="col-md-3"> --}}
           <div class="panel panel-default">
               <div class="panel-heading">Paramètres de recherche</div>
               <div class="panel-body" style="font-size:12px">
                 @if($table == 'Student')
                    @include('Administration.sidebarSearch.by_students')
                 @else
                     @include('Administration.sidebarSearch.by_teachers')
                 @endif
               </div>
           </div>
        </div>

        <div class="col-md-8 col-sm-8">
        {{-- <div class="col-md-3"> --}}

        <h2 class="ui big header">
          {{-- <img class="ui image" src="http://semantic-ui.com/images/icons/Find.png">
          <div class="content"> --}}
            Learn More
          {{-- </div> --}}
        </h2>

        <table class="ui orange table">

         @if($results_search->count() == 0)
           {{-- <tr class="unread">
             <th>Id</th>
             <th>Nom & prenoms</th>
             <th>Discipline</th>
           </tr> --}}

         @else
          <thead>
             <tr>
               <th>Id</th>
               <th>Nom & prenoms</th>
               <th>Discipline</th>
               <th></th>
             </tr>
          </thead>
          <tbody>
            @foreach($results_search as $teacher)
              <tr class="unread">
                  <td class="">{{$teacher->id}}</td>
                  <td class="">{{$teacher->userFirstName .' '.$teacher->userLastName}}</td>
                  <td >{{$teacher->courseName}}</td>
                  <td class="actions">
                    <div class="btn-group pull-right">
                         <a class="btn btn-white-grey btn-sm"  style="margin-right:5px" title="Modifier" onclick="event.preventDefault();
                                  document.getElementById('modifier-teacher').submit();"><i  class="fa fa-pencil" aria-hidden="true"></i></a>

                          <form id="modifier-teacher" action="{{ url('/update_teacher_info') }}" method="POST" style="display: none;">
                                      {{ csrf_field() }}
                                     <input type="hidden" name="teacher_id" value="{{$teacher->id}}">
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

          {{-- <h2 class="ui header" style="font-size:inherit">Champ trouvé(n)</h2> --}}
           {{-- <div class="panel panel-default">
               {{-- <div class="panel-heading">Champ trouvé(n)</div>
               <div class="panel-body" style="font-size:12px">

               </div>
           </div> --}}
        </div>

    </div>

</div>

@endsection
