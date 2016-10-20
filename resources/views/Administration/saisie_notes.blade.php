@extends('templates.TemplateIndex')

@section('section-content')
  {{-- <div class="col-md-3 col-sm-2">
      <section id="sidebar">
          <header><h3>Espace administrateur</h3></header>
          @include('layouts.sidebar-admin')
      </section><!-- /#sidebar -->
  </div><!-- /.col-md-3 --> --}}
  <!-- My Properties -->
<form class="ui form" style="margin-left:auto;margin-right:auto" action="{{url('/gradeStudent')}}" method="POST" enctype="multipart/form-data">
<section id="my-properties">
  <div class="my-properties">
    {{-- <div class="col-md-2 col-sm-10 pull-right">
        <label class="text-center">Photo de profile</label>
        <img class="ui small image" src="{{asset('img/users.png')}}" id="divUpload" style="cursor:pointer; border:1px dashed">
     <input type="file" name="avatar" id="hidde-new-file" style="display: none">
    </div> --}}
      <div class="col-md-7 col-sm-10">
        {{ csrf_field() }}

         <div class="field">

           <div class="two fields">
             <div class="field">
               <label>Valeur maximale de l'évaluation </label>
               <input name="note[valmaxi]" type="text" required>
             </div>

             <div class="field">
               <label>Periode </label>
               <input name="note[periode]" value="{{$semestre->semestreID}}" type="hidden">
               <input name="note[testDescription]" value="-" type="hidden">
               <input name="semestre" readonly value="{{$semestre->semestreDescription}}" type="text">
             </div>
           </div>
         </div>

             <div class="field">
               <div class="fields">
                 <div class="eight wide field">
                   <label>Professeurs</label>
                   <select name="note[teacher_id]" required>
                     @foreach($listTeacher as $prof)
                         <option value="{{$prof->id}}">
                           {{$prof->userFirstName.' '.$prof->userLastName}}
                         </option>
                     @endforeach
                    </select>
                 </div>

                 <div  class="eight wide field">
                   <label>Disciplines</label>
                   <select name="note[CourseChild]" required>
                     @foreach($listcourse as $lcourse)
                         <option value="{{$lcourse->CourseChildID}}">
                           {{$lcourse->labelCourse}}
                         </option>
                     @endforeach
                    </select>
                 </div>
               </div>
             </div>


               <div class="fields">
                 <div class="eight wide field">
                   <label>classe</label>
                   <select name="note[classroom]" required>
                     @foreach($classrooms as $classroom)
                         <option value="{{$classroom->classRoomID}}">
                           {{$classroom->ClassRoomName}}
                         </option>
                     @endforeach
                    </select>
                 </div>
                 </div>

             <div class="field">
                <input class="ui primary button right floated" type="submit" name="name" value="Poster le formulaire">
             </div>
           </div>
         </div>



</div><!-- /.col-md-9 -->

</div><!-- /.my-properties -->
<!-- end My Properties -->
</section><!-- /#my-properties -->
</form>
<!-- end My Properties -->

@endsection
