@extends('templates.TemplateDashboard')

@section('section-content')
<div class="col-md-9">

</div>
  <div class="ui ordered steps">
    <div class="completed step">
      <div class="content">
        <div class="title">Evaluation</div>
        <div class="description">Saisir les informations de l'évaluation</div>

      </div>
    </div>
    <div class="completed step">
      <div class="content">
        <div class="title">Matière</div>
        <div class="description">Selectionner le professeur et la discipline </div>
      </div>
    </div>
    <div class="active step">
      <div class="content">
        <div class="title">Note</div>
        <div class="description">Saisir les notes</div>
      </div>
    </div>
  </div>

 <div class="col-md-8">

    <form class="form-inline" action="{{url('/gradeEvaluation')}}" method="post">

                                     {{-- <input type="hidden" name="classRoomID" value="{{$classroom->classRoomID}}"> --}}
                                     {{ csrf_field() }}
                                     <div class="pull-right">
                                        <input class="ui primary button right floated" type="submit" name="name" value="Poster le formulaire">
                                     </div>
                                     <br>
                                     <div class="form-group">
                                        {{-- <label for="pwd">Periode : {{$semestre->semestreDescription}}</label> --}}

                                        <input type="hidden" name="semestre" value="{{$semestre}}">
                                        <input type="hidden" name="classroom" value="{{$classroom}}">
                                        <input type="hidden" class="form-control" id="pwd">

                                     </div>

                                     <div class="form-group">
                                        {{-- <label for="pwd" class="pull-left">Enseingnant : {{$teacher->userFirstName.' '.$teacher->userLastName}}</label> --}}

                                        <input type="hidden" class="form-control" id="pwd">
                                        <input type="hidden" name="testID" value="{{$testID}}">

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
                                           {{-- @foreach($classe->Student as $stud) --}}
                                               <tr class="read">
                                                   <td width="20%" class="">{{$classe->studentMatricule}}</td>
                                                   <td width="70%" class="">{{$classe->studentName." ".$classe->studentLastName}}</td>
                                                   <td width="10%" class="">
                                                     <input type="text" name="{{$classe->studentMatricule}}">
                                                   </td>
                                               </tr>
                                           @endforeach
                                       </tbody>
                                   </table>
                               </form>
                           </div>

@endsection
