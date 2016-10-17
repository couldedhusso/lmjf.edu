@extends('templates.TemplateIndex')

@section('section-content')
  <div class="col-md-3 col-sm-2">
      <section id="sidebar">
          <header><h3>Espace administrateur</h3></header>
          @include('layouts.sidebar-admin')
      </section><!-- /#sidebar -->
  </div><!-- /.col-md-3 -->


<div class="col-md-9 col-sm-10">
  <section id="my-properties">
    <div class="ui form">
        <h3 class="ui dividing header">Liste des élèves inscripts pour l'année académique {{'-'.$aYear->academicYear}}</h3>
        {{-- <div class="three fields">
          <div class="field">
            <label>Periode</label>
            <input readonly name="periode" placeholder="1er trismetre" type="text">
          </div>
          <div class="field">
            <label>Classes</label>
            <select name="classroom">
               @foreach($classrooms as $classroom)
                  <option value="{{$classroom->classRoomID}}">
                    {{$classroom->ClassRoomName}}
                  </option>
              @endforeach
            </select>
          </div>
          <div class="field">
            <label>Date</label>
            <input readonly placeholder="{{'date'}}" type="text">
          </div>
        </div> --}}
    </div>

    <br><br>

    {{-- TODO :
    lorsqu il applique le filtre sur la classe, ns avons une form avec le nom de la discipline
    l heure de debut et de fin du cours (champs de saisie ) el
    la liste des eleves appartenant a cette classe --}}

                         {{-- <h1>Избранные объявления списком</h1> --}}
                            <div class="my-properties">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>Matricule</th>
                                            <th>Nom & Prenom</th>
                                            <th>Date de naissance</th>
                                            <th>classe</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>

                                            <td></td>
                                            <td></td>
                                            <td>
                                            </td>
                                            <td class="text-center"></td>
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
