@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-8">
      {{-- <div class="col-md-3"> --}}
         <div class="panel panel-default">
             <div class="panel-heading">Paramètres de recherche</div>
             <div class="panel-body" style="font-size:12px">
      <form class="ui form" style="margin-left:auto;margin-right:auto" action="{{url('/addTeacher')}}" method="POST" enctype="multipart/form-data">

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

               <div class="field">

                 <table class="ui orange table">
                   <thead>
                      <tr>
                        <th>Id</th>
                        <th>Disciplines</th>
                      </tr>
                   </thead>
                   <tbody>
                     @foreach($course_child as $course)
                       <tr class="unread">
                           <td class="">{{$course->CourseID}}</td>
                           <input type="hidden" name="course_child_id[{{$course->CourseChildID}}]" value="{{$course->CourseChildID}}">
                           <input type="hidden" name="course_child_courseid[{{$course->CourseID}}]" value="{{$course->CourseID}}">
                           <td class=""><input type="text" name="course_child_name[{{$course->labelCourse}}]" value="{{$course->labelCourse}}"></td>
                         </tr>
                     @endforeach
                   </tbody>
                </table>

               </div>

               <div class="field">
                 <div class="fields">
                   <div class="eight wide field">
                     <select name="CourseID">
                       {{-- @foreach($courses as $course)
                           <option value="{{$course->courseID}}">
                             {{$course->courseName}}
                           </option>
                       @endforeach --}}
                      </select>
                   </div>

                   <div  class="eight wide field">
                     <table class="ui orange table">
                       <thead>
                          <tr>
                            <th>Id</th>
                            <th>Classes</th>
                          </tr>
                       </thead>
                       <tbody>
                         @foreach($classroom as $classe)
                           <tr class="unread">
                               <td class="">{{$classe->classRoomID}}</td>
                               <td class=""><input type="text" name="classroom[{{$classe->ClassRoomName}}]" value="{{$classe->ClassRoomName}}"></td>
                          </tr>
                         @endforeach
                       </tbody>
                    </table>
                   </div>
                 </div>
               </div>

               <div class="field">
                    <a  class="ui button active" href="#pp" class="btn btn-info" data-toggle="collapse">Est il professeur principal ?</a>
               </div>

               </div>

               <div class="field">
                  <input class="ui primary button right floated" type="submit" name="name" value="Poster le formulaire">
               </div>

      </form>
    </div>
</div>
</div>
</div>
    </div>
</div>
@endsection
