@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8">
      <table class="ui table">

      @if($studentByclassroom->count() == 0)
        <tr class="unread">
           <th>Nom & prenoms</th>
           <th>Date de naissance</th>
          <th></th>
        </tr>

      @else
       <thead>
          <tr>
            <th>Nom & prenoms</th>
            <th>Date de naissance</th>
            <th></th>
          </tr>
       </thead>
       <tbody>
         @foreach($studentByclassroom as $clstudent)
           <tr class="unread">
               <td class="">{{$clstudent->studentName .' '.$clstudent->studentLastName }}</td>
                <td class="">{{$clstudent->studentBirthdate}}</td>
               <td class="actions">
                 <div class="btn-group pull-right">
                   {{-- onclick="event.preventDefault();
                            document.getElementById('modifier-teacher').submit();" --}}
                      <a href="{{url('get_student').'/'.$clstudent->classRoomID.'/'.$clstudent->studentMatricule}}" class="btn btn-white-grey btn-sm"  style="margin-right:5px" title="Modifier"
                       ><i  class="fa fa-pencil" aria-hidden="true"></i>&nbsp;Modifier</a>

                      <a href="{{url('delete_student').'/'.$clstudent->studentMatricule}}" class="btn btn-white-red btn-sm" title="Supprimer"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
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
@endsection
