@extends('templates.TemplateIndex')

@section('section-content')

<form class="ui form" style="margin-left:auto;margin-right:auto" action="{{url('/teacherUpdate')}}" method="POST" enctype="multipart/form-data">
<section id="my-properties">
  <div class="my-properties">

    <input type="hidden" name="users[id]" value="{{$user->id}}">

      <div class="col-md-7 col-sm-10">
        {{ csrf_field() }}

         <div class="field">
           <label>Nom & Prenoms </label>
           <div class="two fields">
                <div class="field">
                  <input name="users[userFirstName]" value="{{$user->userFirstName}}" type="text">
                </div>
                <div class="field">
                  <input name="users[userLastName]" value="{{$user->userLastName}}" type="text">
                </div>
           </div>
         </div>
         <div class="field">
           <label>Contacts</label>
           <div class="fields">
             <div class="ten wide field">
                     <input name="users[email]" value="{{$user->email}}" type="text">
                   </div>
                   <div class="six wide field">
                     <input name="users[userContact]" value="{{$user->userContact}}" type="text">
                   </div>
           </div>
         </div>

         {{-- ===== MAJ de ses classes =======--}}

         {{-- <div class="field">
           <div class="fields">
             <div class="eight wide field">
               <label>Discipline enseignée</label>
               <select name="DeleteCourses[course_id]">
                 @foreach($teacher_courses as $tcourse)
                     <option value="{{$tcourse->courseID}}">
                       {{$tcourse->courseName}}
                     </option>
                 @endforeach
                </select>

                <table class="ui table">

                  <tbody>
                        @foreach($teacher_courses as $tcourse)
                         <tr class="unread">
                               <td class="">{{$tcourse->courseName}}</td>
                               <td >
                                 <div class="checkbox">
                                  <label><input type="checkbox" name="courseid" value="{{$tcourse->courseID}}">
                                    Selectionner pour supprimer</label>
                                </div>
                                 {{-- {{$tcourse->courseName}}
                               </td>
                         </tr>
                       @endforeach
                 </tbody>
              </table>
             </div>

             <div class="eight wide field">
               <label>Valeurs entrantes</label>
               <select name="addCourses[course_id]" required>
                 @foreach($courses as $course)
                     <option value="{{$course->courseID}}">
                       {{$course->courseName}}
                     </option>
                 @endforeach
                </select>
             </div>
           </div>
         </div> --}}

         <h4 class="ui dividing header">Classes </h4>
         <div class="field">

           <table class="ui table">

             <tbody>
                   @foreach($teacher_classroom as $tclassrooms)
                    <tr class="unread">
                          <td style="width:30%">{{$tclassrooms->ClassRoomName}}</td>
                          <td style="width:60%; padding-right:10px;">
                            <div class="checkbox pull-right">
                             <label><input type="checkbox" name="deletecassroom[]" value="{{$tclassrooms->classRoomID}}">
                               Selectionner la {{$tclassrooms->ClassRoomName }} pour la supprimer </label>
                           </div>
                          </td>
                    </tr>
                  @endforeach
            </tbody>
         </table>

         </div>

         <div class="field">
           <div class="fields">
             {{-- <div class="eight wide field">
               <label>Classes</label>
               <select name="classroom">
                 @foreach($teacher_classroom as $tclassrooms)
                     <option value="{{$tclassrooms->classRoomID}}">
                       {{$tclassrooms->ClassRoomName}}
                     </option>
                 @endforeach
                </select>
             </div> --}}

             <div class="eight wide field">
               <label> Ajouter de nouvelles classes </label>
               <select name="addclassroom[]" multiple>
                 @foreach($classrooms as $classroom)
                     <option value="{{$classroom->classRoomID}}">
                       {{$classroom->ClassRoomName}}
                     </option>
                 @endforeach
                </select>
             </div>

           </div>
         </div>

        <h4 class="ui dividing header">Professeur principal</h4>

         @if($isProfprinc)
           {{-- <input type="hidden" name="pp_new[pp_count]" value="{{$isProfprinc}}"> --}}

           <div class="field">
              <table class="ui table">
               <tbody>
                     @foreach($prof_pricinpal as $ppclassrooms)
                      <tr class="unread">
                            <td style="width:30%">{{$ppclassrooms->ClassRoomName}}</td>
                            <td style="width:60%; padding-right:10px;">
                              <div class="checkbox pull-right">
                               <label><input type="checkbox" name="deleteclassroompp[]" value="{{$ppclassrooms->classRoomID}}">
                                 Selectionner la {{$ppclassrooms->ClassRoomName }} pour la supprimer </label>
                             </div>
                            </td>
                      </tr>
                    @endforeach
              </tbody>
           </table>

           </div>

           <div class="field">
             <div class="fields">
               {{-- <div class="eight wide field">
                 <label>Classes</label>
                 <select name="pp">
                   @foreach($prof_pricinpal as $ppclassrooms)
                       <option value="{{$ppclassrooms->classRoomID}}">
                         {{$ppclassrooms->ClassRoomName}}
                       </option>
                   @endforeach
                  </select>
               </div> --}}

               <div class="eight wide field">
                 <label>Ajouter de nouvelles classes</label>
                 <select name="addclassroompp[]" multiple>
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
                <select name="classroomidpp[]" multiple>
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
