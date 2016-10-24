@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8">
      <form class="form-inline" action="{{url('/')}}" method="post">

                                       {{-- <input type="hidden" name="classRoomID" value="{{$classroom->classRoomID}}"> --}}
                                       {{ csrf_field() }}
                                       <div class="pull-right">
                                          <input class="ui primary button right floated" type="submit" name="name" value="Poster le formulaire">
                                       </div>
                                       <br>

                                       <div class="form-group">
                                          {{-- <label for="pwd" class="pull-left">Enseingnant : {{$teacher->userFirstName.' '.$teacher->userLastName}}</label> --}}

                                          <input type="hidden" class="form-control" id="pwd">
                                          <input type="hidden" name="testID" value="{{$testid}}">

                                       </div>

                                       &nbsp;&nbsp;
                                       <table class="ui table">

                                       {{-- <table class="table table-hover table-mail"> --}}
                                         <thead>
                                            <tr>
                                              <th>Matricule</th>
                                              <th>Nom & prenoms</th>
                                              <th>Note</th>
                                            </tr>
                                         </thead>
                                         <tbody>
                                             @foreach($currentYearClassroom as $classe)
                                                 @foreach($eval as $note)
                                                   @if($classe->studentMatricule == $note->studentMatricule)
                                                     <tr class="read">
                                                         <td width="20%" class="">{{$classe->studentMatricule}}</td>
                                                         <td width="70%" class="">{{$classe->studentName." ".$classe->studentLastName}}</td>
                                                         <td width="10%" class="">
                                                           <input type="text" value="{{$note->Grade}}" name="{{$classe->studentMatricule}}">
                                                         </td>
                                                     </tr>
                                                   @endif
                                                @endforeach
                                             @endforeach
                                         </tbody>
                                     </table>
                                 </form>
                             </div>

    </div>
  </div>
</div>
@endsection
