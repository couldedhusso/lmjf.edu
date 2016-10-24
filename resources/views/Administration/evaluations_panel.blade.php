
<div class="col-md-12" style="margin-bottom:10px;">
  <div>
      <span class="pull-left" style="font-size:20px;">Evaluations par classe</span>
      <div class="btn-group pull-right">
           <a href="{{url('saisir-les-notes/1')}}" class="btn btn-white-grey btn-sm" style="margin-right:5px" title=""><i class="fa fa-plus" aria-hidden="true"></i>
             &nbsp;Saisir les notes
           </a>
       </div>
  </div>
</div>
<div class="col-md-12">

  <table class="ui orange table">

  @if($currentSemesterEval->count() == 0)
    <tr class="unread">
      <th>classe</th>
      <th>Note sur</th>
    </tr>

  @else
   <thead>
      <tr>
        <th>classe</th>
        <th>Note sur</th>
        <th></th>
      </tr>
   </thead>
   <tbody>
     @foreach($currentSemesterEval as $test)
       <tr class="unread">
           <td class="">{{$test->ClassRoomName}}</td>
           <td >{{$test->maxGradevalue}}</td>
           <td class="actions">
             <div class="btn-group pull-right">
               {{-- onclick="event.preventDefault();
                        document.getElementById('modifier-teacher').submit();" --}}
                  <a href="{{url('update_student_mark').'/'.$test->CoursetestID.'/'.$test->classRoomID}}" class="btn btn-white-grey btn-sm"  style="margin-right:5px" title="Modifier"
                   ><i  class="fa fa-pencil" aria-hidden="true"></i>&nbsp;Modifier</a>

                  <a href="{{url('delete_Coursetest').'/'.$test->CoursetestID}}" class="btn btn-white-red btn-sm" title="Supprimer"><i class="fa fa-trash-o" aria-hidden="true"></i></a>

                           <form id="supprimer-teacher" action="{{ url('/delete-evaluation') }}" method="POST" style="display: none;">
                               {{ csrf_field() }}
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
