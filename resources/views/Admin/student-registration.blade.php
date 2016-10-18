@extends('templates.TemplateIndex')

@section('section-content')
  {{-- <div class="col-md-3 col-sm-2">
      <section id="sidebar">
          <header><h3>Espace administrateur</h3></header>
          @include('layouts.sidebar-admin')
      </section><!-- /#sidebar -->
  </div><!-- /.col-md-3 --> --}}
  <!-- My Properties -->
<form class="ui form" action="/studReg" method="POST" enctype="multipart/form-data">
  {{ csrf_field() }}
<section id="my-properties">
  <div class="my-properties">
    {{-- <div class="col-md-2 col-sm-10 pull-right">
        <label class="text-center">Photo de profile</label>
        <img class="ui small image" src="{{asset('img/Add_user_avatar.png')}}" id="divUpload" style="cursor:pointer; border:1px dashed">
     <input type="file" name="avatar" id="hidde-new-file" style="display: none">
    </div> --}}
  <div class="col-md-7 col-sm-10">

         <input type="hidden" name="studentDatas[anneeScolaire]" value="{{$aYear->academicYear}}">
         <div class="field">
           <label>Données de l'élève </label>
           <div class="fields">
             <div class="six wide field">
               <input name="studentDatas[matricule]" placeholder="Matricule" type="text">
             </div>
             <div class="ten wide field">
               <input name="studentDatas[nom]" placeholder="Nom" type="text">
             </div>
           </div>

           <div class="fields">
             <div class="ten wide field">
               <input name="studentDatas[prenoms]" placeholder="Prenoms" type="text">
             </div>
             <div class="six wide field">
               <input name="studentDatas[birthdate]" placeholder="Date de naissance" type="text">
             </div>
           </div>
         </div>

         <div class="fields">
           <div class="fourteen wide field">
             <input name="studentDatas[birthplace]" placeholder="Lieu de naissance" type="text">
           </div>
           <div class="two wide field">
             <input name="studentDatas[sexe]" placeholder="Feminin" value="F" type="text">
           </div>
         </div>

         <div class="two fields">
           <div class="field">
             <input name="studentDatas[regime]" placeholder="Regime" type="text">
           </div>
           <div class="field">
             <select name="studentDatas[affecte]">
               <option value="">Affecté</option>
                   <option value="NON">
                     NON
                   </option>
                   <option value="OUI">
                     OUI
                   </option>
              </select>
           </div>
         </div>

         <div class="fields">
           <div class="eleven wide field">
             <input name="studentDatas[interne]" placeholder="Interne" type="text">
           </div>
           <div class="five wide field">
             <select name="studentDatas[doublant]">
               <option value="">Doublant</option>
                   <option value="0">
                     NON
                   </option>
                   <option value="1">
                     OUI
                   </option>
              </select>
           </div>
         </div>

         <div class="two fields">
           <select name="studentDatas[classroom]">
             @foreach($classrooms as $classroom)
                 <option value="{{$classroom->classRoomID}}">
                   {{$classroom->ClassRoomName}}
                 </option>
             @endforeach
            </select>
         </div>

          <h4 class="ui dividing header">Références du parent d'élève</h4>

          <div class="two fields">
            <div class="field">
              <input name="studentRespoDatas[nom]" placeholder="Nom" type="text">
            </div>
            <div class="field">
              <input name="studentRespoDatas[prenom]" placeholder="prenoms" type="text">
            </div>
          </div>

          <div class="two fields">
            <div class="field">
              <input name="studentRespoDatas[contact]" placeholder="Contact Telephonique" type="text">
            </div>
          </div>

         <div class="field">
            <input class="ui primary button right floated" type="submit" name="name" value="Poster le formulaire">
         </div>
         <br><br>
</div><!-- /.col-md-9 -->

</div><!-- /.my-properties -->
<!-- end My Properties -->
</section><!-- /#my-properties -->
</form>
<br><br>
<!-- end My Properties -->

@endsection
