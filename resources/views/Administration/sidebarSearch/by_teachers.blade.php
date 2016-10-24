{{-- <div class="ui fluid multiple search selection dropdown">
  <input type="hidden" name="search[identifiant]">
  <i class="dropdown icon"></i>
  <div class="default text">Identifiant du prof.</div>
  <div class="menu">
    <div class="item" data-value="justen" data-text="Justen">
      <img class="ui mini avatar image" src="http://semantic-ui.com//images/avatar/small/justen.jpg">
      Justen Kitsune
    </div>
  </div>
</div> --}}


<h4 class="ui dividing header" >pour enseingnants</h4>
{{-- <form id="search-form-name" class="ui form" role="form" method="POST" action="{{ url('/get-search-result') }}">
       {{ csrf_field() }}
       <input type="hidden" name="search-key" value="Teacher">
       <input type="hidden" name="search[search-by]" value="nom_prenom">

      <div class="field">
        <br>
        <label>Recherche par nom & prenoms</label>
        <select class="ui search dropdown" name="search[teacher]">
          <option value="">Selectionner le professeur</option>
            @foreach($teacherList as $teacher)
                <option value="{{$teacher->userFirstName.' '.$teacher->userLastName }}">
                  {{$teacher->userFirstName.' '.$teacher->userLastName }}
                </option>
            @endforeach
        </select>
      </div>
      <button class="ui twitter button orange" style="width:100%; font-size:inherit" onclick="event.preventDefault();
               document.getElementById('search-form-name').submit();">
       <i class="Find icon"></i>
       Rechercher
     </button>
</form> --}}

<form id="search-form-course" class="ui form" role="form" method="POST" action="{{ url('/get-search-result') }}">
       {{ csrf_field() }}
       <input type="hidden" name="search-key" value="Teacher">
       <input type="hidden" name="search[search-by]" value="course">

       <div class="field">
         <br>
        <label>Recherche par matières enseignées</label>
         <select class="ui search dropdown" name="search[classroom]">
           <option value="">Selectionner la matière</option>
             @foreach($getCourses as $courses)
                 <option value="{{$courses->courseID}}">
                   {{$courses->courseName}}
                 </option>
             @endforeach
         </select>
       </div>
      <button class="ui twitter button orange" style="width:100%; font-size:inherit" onclick="event.preventDefault();
               document.getElementById('search-form-course').submit();">
       <i class="Find icon"></i>
       Rechercher
     </button>
</form>
