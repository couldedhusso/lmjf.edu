@extends('templates.TemplateIndex')

@section('section-content')



<form class="ui form" style="margin-left:auto;margin-right:auto" action="{{url('/gradeStudent')}}" method="POST" enctype="multipart/form-data">
<section id="my-properties">
  <div class="my-properties">

  @if($step == 1)
    <div class="col-md-12">
      <div class="ui ordered steps">
        <div class="active step">
          <div class="content">
            <div class="title">Evaluation</div>
            <div class="description">Saisir les informations de l'évaluation</div>

          </div>
        </div>
        <div class="active step">
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
      
      {{ csrf_field() }}
      <input type="hidden" name="step" value="2">

         <div class="fields">

           <div class="five wide field">
             <label>Periode </label>
             <input name="note[periode]" value="{{$semestre->semestreID}}" type="hidden">
             <input name="note[testDescription]" value="-" type="hidden">
             <input name="semestre" readonly value="{{$semestre->semestreDescription}}" type="text">
           </div>

           <div class="five wide field">
             <label>Valeur maximale de l'évaluation </label>
             <input name="note[valmaxi]" type="text" required>
           </div>

         </div>

        <div class="fields">
               <div class="ten wide field">
                 <label>classe</label>
                 <select name="note[classroom]" required>
                   @foreach($currentYearClassroom as $classroom)
                       <option value="{{$classroom->classRoomID}}">
                         {{$classroom->ClassRoomName}}
                       </option>
                   @endforeach
                  </select>
               </div>
          </div>

          <div class="field">
              <input class="ui primary button left floated" type="submit" name="name" value="Matière">
          </div>
         </div>
    @elseif($step == 2)
        @include('Administration.saisie_note_step_2')
    @endif


    </div><!-- /.my-properties -->
  </section><!-- /#my-properties -->
</form>
@endsection
