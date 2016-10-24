@extends('templates.TemplateIndex')

@section('section-content')
  {{-- <div class="col-md-3 col-sm-2">
      <section id="sidebar">
          <header><h3>Espace administrateur</h3></header>
          @include('layouts.sidebar-admin')
      </section><!-- /#sidebar -->
  </div><!-- /.col-md-3 --> --}}
  <!-- My Properties -->
<form class="ui form" style="margin-left:auto;margin-right:auto" action="{{url('/addTeacher')}}" method="POST" enctype="multipart/form-data">
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
           <label>Nom & Prenoms </label>
           <div class="two fields">
             <div class="field">
               <input name="teacherFirstName" placeholder="Nom" type="text">
             </div>
             <div class="field">
               <input name="teacherLastName" placeholder="Prenoms" type="text">
             </div>
           </div>
         </div>
         <div class="field">
           <label>Contacts</label>
           <div class="fields">
             <div class="ten wide field">
               <input name="teacherEmail" placeholder="Email" type="text">
             </div>
             <div class="six wide field">
               <input name="teacherContact" placeholder="Telephone" type="text">
             </div>
           </div>
         </div>

         {{-- <div class="field">
           <label>Paramètres de connexion</label>
           <div class="fields">
             <div class="nine wide field">
               <input name="email" placeholder="< Email ou telephone > comme nom d'utilisateur" type="text">
             </div>
             <div class="seven wide field">
               <input name="password" placeholder=" < lmjf > est mot de passe par defaut" type="password">
             </div>
           </div>
         </div> --}}

         <div class="field">
           <div class="fields">
             <div class="eight wide field">
               <label>Discipline enseignée</label>
               <select name="CourseID">
                 @foreach($courses as $course)
                     <option value="{{$course->courseID}}">
                       {{$course->courseName}}
                     </option>
                 @endforeach
                </select>
             </div>

             <div  class="eight wide field">
               <label>Classes</label>
               <select name="ClassRoomID[]" multiple>
                 @foreach($classrooms as $classroom)
                     <option value="{{$classroom->classRoomID}}">
                       {{$classroom->ClassRoomName}}
                     </option>
                 @endforeach
                </select>
             </div>
           </div>
         </div>

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
