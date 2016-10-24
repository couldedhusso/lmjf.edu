
<div class="col-md-12" style="margin-bottom:10px;">
  <div>
      <span class="pull-left" style="font-size:20px;">Liste de classes</span>
      <div class="btn-group pull-right">
           <a href="{{url('ajouter-un-eleve')}}" class="btn btn-white-grey btn-sm" style="margin-right:5px" title=""><i class="fa fa-plus" aria-hidden="true"></i>
             &nbsp;Ajouter un élève
           </a>

           <button  onclick="event.preventDefault();
                    document.getElementById('search-stud').submit()" class="btn btn-white-grey btn-sm"  style="margin-right:5px" title="Recherche dans la base des élèves"><i class="fa fa-binoculars" aria-hidden="true"></i></button>
       </div>
  </div>
</div>
<div class="col-md-12">
  <table class="ui orange table">

  @if($studentByclassroom->count() == 0)
    <tr class="unread">
      <th>Classe</th>
       <th>Effectif de la classe</th>
      <th></th>
    </tr>

  @else
   <thead>
      <tr>
        <th>Classe</th>
         <th>Effectif de la classe</th>
        <th></th>
      </tr>
   </thead>
   <tbody>
     @foreach($studentByclassroom as $clstudent)
       <tr class="unread">

           <td class="">{{$clstudent->ClassRoomName}}</td>
           <td >{{$clstudent->effectif}}</td>
           <td class="actions">
             <div class="btn-group pull-right">
               {{-- onclick="event.preventDefault();
                        document.getElementById('modifier-teacher').submit();" --}}
                  <a href="{{url('liste_de_classe').'/'.$clstudent->classRoomID}}" class="btn btn-white-grey btn-sm"  style="margin-right:5px" title="Modifier"
                   ><i  class="fa fa-pencil" aria-hidden="true"></i>&nbsp;Liste de la classe</a>

                  <a href="{{url('delete_classroom').'/'.$clstudent->classRoomID}}" class="btn btn-white-red btn-sm" title="Supprimer"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                  {{-- <a href="{{url('notes-des-evalautions')}}" class="btn btn-white-grey btn-sm" title="Saisir les notes"><i class="fa fa-plus"></i></a> --}}
              </div>
           </td>
         </tr>
     @endforeach
   </tbody>
  @endif
</table>
</div>
