<div class="col-md-12">
  <div class="ui ordered steps">
    <div class="completed step">
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
  <br><br>
  {{ csrf_field() }}
    <input type="hidden" name="step" value="3">
    <input name="note[periode]" value="{{$semestre}}" type="hidden">
    <input name="note[testDescription]" value="-" type="hidden">
    <input name="note[classroom]" value="{{$classroom}}" type="hidden">
    <input name="note[valmaxi]" value="{{$valmaxi}}" type="hidden">

     <div class="fields">
            <div class="five wide field">
              <label>Professeurs</label>
              <select name="note[prof]" required>
                @foreach($listTeacher as $teacher)
                    <option value="{{$teacher->id}}">
                      {{$teacher->userFirstName.' '.$teacher->userLastName}}
                    </option>
                @endforeach
               </select>
            </div>
    </div>

    <div class="fields">
           <div class="five wide field">
             <label>disciplines</label>
             <select name="note[course]" required>
               @foreach($listcourse as $course)
                 @if($sndCycle)
                   <option value="{{$course->courseID}}">
                     {{$course->courseName}}
                   </option>
                 @else
                   <option value="{{$course->CourseChildID}}">
                     {{$course->labelCourse}}
                   </option>
                 @endif
               @endforeach
              </select>
           </div>
      </div>

      <div class="field">
          <input class="ui primary button left floated" type="submit" name="name" value="Notes">
      </div>
     </div>
