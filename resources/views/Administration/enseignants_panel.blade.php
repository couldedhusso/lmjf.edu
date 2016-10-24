<div class="col-md-12" style="margin-bottom:10px;">
  <div>
      <span class="pull-left" style="font-size:20px;">Liste des professeurs</span>
      <div class="btn-group pull-right">

           <a href="{{url('ajouter-un-professeur')}}" class="btn btn-white-grey btn-sm" style="margin-right:5px" title=""><i class="fa fa-plus" aria-hidden="true"></i>
             &nbsp;Ajouter un enseingnant
           </a>

           <button onclick="event.preventDefault();
                     document.getElementById('search-teacher').submit()" class="btn btn-white-grey btn-sm" title="Recherche dans la base des professeurs"><i class="fa fa-binoculars"></i></button>
       </div>
  </div>
</div>
<div class="col-md-12">
  <table class="ui orange table">

  @if($allTeacher->count() == 0)
    <tr class="unread">
      <th>Nom & prenoms</th>
      <th>Contact</th>
      <th>Discipline</th>
    </tr>

  @else
   <thead>
      <tr>
        <th>Nom & prenoms</th>
         <th>Contact</th>
        <th>Discipline</th>
        <th></th>
      </tr>
   </thead>
   <tbody>
     @foreach($allTeacher as $teacher)
       <tr class="unread">
           <td class="">{{$teacher->userFirstName .' '.$teacher->userLastName}}</td>
           <td >{{$teacher->userContact}}</td>
           <td >{{$teacher->courseName}}</td>
           <td class="actions">
             <div class="btn-group pull-right">
               {{-- onclick="event.preventDefault();
                        document.getElementById('modifier-teacher').submit();" --}}
                  <a href="{{url('update_teacher_info').'/'.$teacher->id}}" class="btn btn-white-grey btn-sm"  style="margin-right:5px" title="Modifier"
                   ><i  class="fa fa-pencil" aria-hidden="true"></i>&nbsp;Modifier</a>

                  <a href="{{url('delete_teacher').'/'.$teacher->id}}" class="btn btn-white-red btn-sm" title="Supprimer"><i class="fa fa-trash-o" aria-hidden="true"></i></a>

                           <form id="supprimer-teacher" action="{{ url('/delete-teacher') }}" method="POST" style="display: none;">
                               {{ csrf_field() }}
                               <input type="hidden" name="teacher_id" value="{{$teacher->id}}">
                           </form>
                  {{-- <a href="{{url('notes-des-evalautions')}}" class="btn btn-white-grey btn-sm" title="Saisir les notes"><i class="fa fa-plus"></i></a> --}}
              </div>
           </td>
         </tr>
     @endforeach
   </tbody>
  @endif
</table>

</div>
