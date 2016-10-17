@extends('templates.TemplateDashboard')

@section('section-content')
  <!-- sidebar -->
          <div class="col-md-3 col-sm-2">
              <section id="sidebar">
                  <header><h3>Espace professeur</h3></header>
                  @include('layouts.sidebar')
              </section><!-- /#sidebar -->
          </div><!-- /.col-md-3 -->


          <!-- My Properties -->
             <div class="col-md-9 col-sm-10">
                 <section id="my-properties">
                   <div class="ui form">
                       <h3 class="ui dividing header">Saisie des notes</h3>
                       <div class="fields">
                         <div class="six wide field">
                           <label>Periode</label>
                           <input readonly name="periode" placeholder="1er trismetre" type="text">
                         </div>
                         <div class="six wide field">
                           <label>Classes</label>
                           <select name="classroom">
                             @foreach($classrooms as $classroom)
                                 <option value="{{$classroom->classRoomID}}">
                                   {{$classroom->ClassRoomName}}
                                 </option>
                             @endforeach
                           </select>
                         </div>
                         <div class="seven wide field">
                           <label>Evaluations</label>
                           <select name="evaluation">
                               @foreach($evaluations as $evaluation)
                                   <option value="{{$evaluation->CoursetestID}}">
                                     {{$evaluation->testName}}
                                   </option>
                                 @endforeach
                           </select>
                         </div>

                         <div class="four wide field">
                           <label style="color:#fff !important; with:100%;">Evaluations</label>
                           <input class="ui primary button right floated" type="submit" name="name" value="Lister">
                         </div>
                       </div>
                   </div>
                   <br><br><br>

                   {{-- TODO :
                   lorsqu il applique le filtre sur la classe, ns avons une form avec le nom de la discipline
                   l heure de debut et de fin du cours (champs de saisie ) el
                   la liste des eleves appartenant a cette classe --}}
                   <div class="mail-box">

                         <table class="table table-hover table-mail">
                               <tbody>
                                 @if($evaluations->count() == 0)
                                   <tr class="unread">
                                       <td class="">matricule</td>
                                       <td class="">Nom & Prenom</td>
                                       <td class="">Libellé de l'évaluation</td>
                                       <td class="">Note</td>
                                   </tr>

                                 @else
                                   <form class="" action="index.html" method="post">
                                       @foreach($evaluations as $coursetest)
                                         <tr class="unread">
                                             <td class="">{{$coursetest->CoursetestID}}</td>
                                             <td class="">{{$coursetest->testName}}</td>
                                             <td class="">{{$coursetest->maxGradevalue}}</td>
                                             <td class="">{{$coursetest->created_at}}</td>
                                           </tr>
                                       @endforeach
                                   </form>
                                 @endif


                           </tbody>
                       </table>
                 </div>

          <!-- end My Properties -->
     </section><!-- /#my-properties -->
</div><!-- /.col-md-9 -->
<!-- end My Properties -->
@endsection
