<h4 class="ui dividing header" >pour élèves</h4>
    {{-- <input type="hidden" name="search-key" value="Student">
    {{-- {{$aYear->academicYear}}


    <div class="field">
        <div class="fields">
            <input type="text" name="search[studentMatricule]" placeholder="Matricule">
        </div>
    </div>

    <div class="field">
      <input type="text" name="search[studentName]" placeholder="Nom">
    </div>

    <div class="field">
      <input type="text" name="search[studentLastName]" placeholder="Prenoms">
    </div>

    <div class="field">
      <input type="text" name="search[studentBirthdate]" placeholder="Date de naissance">
    </div>

    <div class="field">
      <input type="text" name="search[studentBirthPlace]" placeholder="Lieu de naissance">
    </div>

    <div class="field">
      <select class="ui search dropdown" name="search[classRoomID]">
         <option value="">Selectionner sa classe</option>
         <option value="CR">Costa Rica</option>
         <option value="CI">Côte d'Ivoire</option>
         <option value="HR">Croatia</option>
         <option value="CU">Cuba</option>
      </select>
    </div>

    <div class="field">
      <select class="ui search dropdown" name="search[studentRegime]">
         <option value="">Regime</option>
         <option value="boursier">Boursiere</option>
         <option value="non_boursier">Non boursiere</option>
      </select>
    </div>

    <div class="field">
      <select class="ui search dropdown" name="search[studentAffecte]">
        <option value="">Affectée</option>
         <option value="OUI">Oui</option>
         <option value="NON">Non</option>
      </select>
    </div>

    <div class="field">
      <select class="ui search dropdown" name="search[studentRedoublant]">
        <option value="">Redoublante</option>
         <option value="OUI">Oui</option>
         <option value="NON">Non</option>
      </select>
    </div> --}}



<form id="search-form-by-matricule" class="ui form" role="form" method="POST" action="{{ url('/get-search-result') }}">
        {{ csrf_field() }}
        <input type="hidden" name="search-key" value="Student">
        <input type="hidden" name="search[search-by]" value="matricule">
        <input type="hidden" name="search[academicYear]" value="{{$getAcademicYear->academicYear}}">
        <div class="fields" style="margin-bottom:5px">
            <input type="text" name="search[studentMatricule]" placeholder="Matricule">
        </div>

       <button class="ui twitter button orange" style="width:100%; font-size:inherit" onclick="event.preventDefault();
                document.getElementById('search-form-by-matricule').submit();">
        <i class="Find icon"></i>
        Rechercher
      </button>
</form>

<form id="search-form-classroom" class="ui form" role="form" method="POST" action="{{ url('/get-search-result') }}">
        {{ csrf_field() }}
        <input type="hidden" name="search-key" value="Student">
        <input type="hidden" name="search[search-by]" value="classroom">
        <input type="hidden" name="search[academicYear]" value="{{$getAcademicYear->academicYear}}">

        <div class="field">
          <br>
         <label>Recherche par matières enseignées</label>
          <select class="ui search dropdown" name="search[classroom]">
            <option value="">Selectionner la classe</option>
              @foreach($classroomList as $classroom)
                  <option value="{{$classroom->classRoomID}}">
                    {{$classroom->ClassRoomName}}
                  </option>
              @endforeach
          </select>
        </div>


       <button class="ui twitter button orange" style="width:100%; font-size:inherit" onclick="event.preventDefault();
                document.getElementById('search-form-classroom').submit();">
        <i class="Find icon"></i>
        Rechercher
      </button>
</form>
