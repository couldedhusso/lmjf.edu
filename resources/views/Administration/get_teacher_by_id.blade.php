@extends('templates.TemplateIndex')

@section('section-content')

<form class="ui form" style="margin-left:auto;margin-right:auto" action="{{url('/addTeacher')}}" method="POST" enctype="multipart/form-data">
<section id="my-properties">
  <div class="my-properties">

    <input type="hidden" name="users[id]" value="{{$user->id}}">

      <div class="col-md-7 col-sm-10">
        {{ csrf_field() }}

         <div class="field">
           <label>Nom & Prenoms </label>
           <div class="two fields">
                <div class="field">
                  <input name="users[teacherFirstName]" value="{{$user->userFirstName}}" type="text">
                </div>
                <div class="field">
                  <input name="users[teacherLastName]" value="{{$user->userLastName}}" type="text">
                </div>
           </div>
         </div>
         <div class="field">
           <label>Contacts</label>
           <div class="fields">
             <div class="ten wide field">
                     <input name="users[teacherEmail]" value="{{$user->email}}" type="text">
                   </div>
                   <div class="six wide field">
                     <input name="users[teacherContact]" value="{{$user->userContact}}" type="text">
                   </div>
           </div>
         </div>

          <br>
         <div class="field">
            <label class="ui warning small">Selectionner l'ancienne valeur du champ(à gauche) si vous voulez comme valeurs entrantes(à droite)</label>
         </div>
         <br>


         <div class="field">
           <div class="fields">
             <div class="eight wide field">
               <label>Discipline enseignée</label>
               <select name="course_id">
                 @foreach($teacher_courses as $tcourse)
                     <option value="{{$tcourse->courseID}}">
                       {{$tcourse->courseName}}
                     </option>
                 @endforeach
                </select>
             </div>

             <div class="eight wide field">
               <label>Valeurs entrantes</label>
               <select name="course_new[course_id]" required>
                 @foreach($courses as $course)
                     <option value="{{$course->courseID}}">
                       {{$course->courseName}}
                     </option>
                 @endforeach
                </select>
             </div>
           </div>
         </div>

         <div class="field">
           <div class="fields">
             <div class="eight wide field">
               <label>Classes</label>
               <select name="classroom">
                 @foreach($teacher_classroom as $tclassrooms)
                     <option value="{{$tclassrooms->classRoomID}}">
                       {{$tclassrooms->ClassRoomName}}
                     </option>
                 @endforeach
                </select>
             </div>

             <div class="eight wide field">
               <label>Valeurs entrantes</label>
               <select name="classroom_new[classroom_id]">
                 @foreach($classrooms as $classroom)
                     <option value="{{$classroom->classRoomID}}">
                       {{$classroom->ClassRoomName}}
                     </option>
                 @endforeach
                </select>
             </div>

           </div>
         </div>

         @if($prof_pricinpal->count() > 1)
           <input type="hidden" name="pp_new[pp_count]" value="{{$prof_pricinpal->count()}}">

           <div class="field">
             <div class="fields">
               <div class="eight wide field">
                 <label>Classes</label>
                 <select name="pp">
                   @foreach($teacher_classroom as $tclassrooms)
                       <option value="{{$tclassrooms->classRoomID}}">
                         {{$tclassrooms->ClassRoomName}}
                       </option>
                   @endforeach
                  </select>
               </div>

               <div class="eight wide field">
                 <label>Valeurs entrantes</label>
                 <select name="pp_new[classroom_id]">
                   @foreach($classrooms as $classroom)
                       <option value="{{$classroom->classRoomID}}">
                         {{$classroom->ClassRoomName}}
                       </option>
                   @endforeach
                  </select>
               </div>

             </div>
           </div>

         @else

           <div class="field">
                <a  class="ui button active" href="#pp" class="btn btn-info" data-toggle="collapse">Est il professeur principal ?</a>
           </div>

           <div id="pp" class="field collapse">
             <div class="field">
                 {{-- <div class="ui checkbox">
                   <input name="prof_principal" type="checkbox" tabindex="0" class="hidden">
                   <label></label>
                 </div> --}}

                <div class="radio">
                  <label><input type="radio" value="1" name="prof_principal">Oui</label>
                </div>
                <div class="radio">
                  <label><input type="radio" value="0" name="prof_principal">Non</label>
                </div>

                </div>
                <label>Selectionner ses classes</label>
                <select name="ClassRoomID-pp[]" multiple>
                  @foreach($classrooms as $classroom)
                      <option value="{{$classroom->classRoomID}}">
                        {{$classroom->ClassRoomName}}
                      </option>
                  @endforeach
                 </select>
           </div>
         @endif
         <div class="field">
            <input class="ui primary button right floated" type="submit" name="name" value="Poster le formulaire">
         </div>
</div><!-- /.col-md-9 -->

</div><!-- /.my-properties -->
<!-- end My Properties -->
</section><!-- /#my-properties -->
</form>
<!-- end My Properties -->

@endsection
