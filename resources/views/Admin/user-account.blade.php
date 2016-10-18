@extends('templates.TemplateIndex')

@section('section-content')
  {{-- <div class="col-md-3 col-sm-2">
      <section id="sidebar">
          <header><h3>Espace administrateur</h3></header>
          @include('layouts.sidebar-admin')
      </section><!-- /#sidebar -->
  </div><!-- /.col-md-3 --> --}}
  <!-- My Properties -->
<div class="col-md-9 col-sm-10">
  <div class="ui form">
      <h3 class="ui dividing header">Liste des professeurs pour l'année académique {{'-'.$aYear->academicYear}}</h3>
  </div>
  <br><br>

<section id="my-properties">

{{-- <h1>Избранные объявления списком</h1> --}}
       <div class="my-properties">
                                       <div class="table-responsive">
                                           <table class="table">
                                               <thead>
                                               <tr>
                                                   <th>Id</th>
                                                   <th>Nom & Prenom</th>
                                                   <th>Matière enseignée</th>
                                               </tr>
                                               </thead>
                                               <tbody>
                                               <tr>

                                                   <td></td>
                                                   <td></td>
                                                   <td></td>
                                               </tr>

                                               </tbody>
                                           </table>
                                       </div><!-- /.table-responsive -->
                                       <!-- Pagination -->
                                       <div class="center">
                                           <ul class="pagination">
                                               <li class="active"><a href="#">1</a></li>
                                               <li><a href="#">2</a></li>
                                               <li><a href="#">3</a></li>
                                               <li><a href="#">4</a></li>
                                               <li><a href="#">5</a></li>
                                           </ul><!-- /.pagination-->
                                       </div><!-- /.center-->
                                   </div><!-- /.my-properties -->
                           <!-- end My Properties -->
         </section><!-- /#my-properties -->
     </div><!-- /.col-md-9 -->
     <!-- end My Properties -->

@endsection
