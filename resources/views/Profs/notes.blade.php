@extends('templates.TemplateDashboard')

@section('section-content')
  {{-- <!-- sidebar -->
  <div class="col-md-3 col-sm-2">
    <section id="sidebar">
       <header><h3>Espace professeur</h3></header>
       @include('layouts.sidebar')
    </section><!-- /#sidebar -->
 </div><!-- /.col-md-3 --> --}}

 <div class="col-md-3 col-sm-3">
     <div class="full-height-scroll">
         <ul class="list-group elements-list">
               @foreach($classrooms as $classroom)
                  <li class="list-group-item">
                       <a style="width:100%" data-toggle="tab" href="#{{$classroom->classRoomID}}">
                           <small class="pull-right text-muted"> {{$classroom->classRoomID}}</small>
                           <strong>{{$classroom->ClassRoomName}}</strong>
                       </a>
                   </li>
               @endforeach
         </ul>

     </div>
 </div>

 <div class="col-md-7 col-sm-7">
     <div class="full-height-scroll white-bg border-left">

         <div class="element-detail-box">
             @foreach($classrooms as $classroom)
                           <div class="tab-content">
                                 <div id="{{$classroom->classRoomID}}" class="tab-pane">
                                   <form class="form-inline" action="{{url('/gradeEvaluation')}}" method="post">

                                     <input type="hidden" name="classRoomID" value="{{$classroom->classRoomID}}">
                                     {{ csrf_field() }}
                                     <div class="pull-right">
                                           <input class="ui primaary button right floated" type="submit" name="name" value="Poster le formulaire">
                                     </div>
                                     <div class="form-group">
                                        <label for="pwd">Periode : {{$semestre->semestreDescription}}</label>

                                        <input type="hidden" name="semestre" value="{{$semestre->semestreID}}">
                                        <input type="hidden" class="form-control" id="pwd">

                                     </div>

                                     <div class="form-group">
                                        <label for="pwd" class="pull-left">Enseingnant : {{$teacher->userFirstName.' '.$teacher->userLastName}}</label>

                                        <input type="hidden" class="form-control" id="pwd">
                                        <input type="hidden" name="testID" value="{{$courseTest->CoursetestID}}">

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
                                           @foreach($studentByclassroom as $classe)
                                           {{-- @foreach($classe->Student as $stud) --}}
                                             @if($classroom->classRoomID == $classe->classRoomID)

                                               <tr class="read">
                                                   <td width="20%" class="">{{$classe->studentMatricule}}</td>
                                                   <td width="70%" class="">{{$classe->studentName." ".$classe->studentLastName}}</td>
                                                   <td width="10%" class="">
                                                     <input type="text" name="{{$classe->studentMatricule}}">
                                                   </td>
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
