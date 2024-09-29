@extends('header')
@section('course-additional-info')
    <!-- Content Wrapper -->
<style>
    .card-link {
    color: black;
}
</style>
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">


        <!-- Begin Page Content -->
        <div class="container-fluid">
        <div class="container mt-3">
          @if(!empty($courses))
          @foreach($courses as $c)
      <h3>{{$c->course_name}}</h3>

  </div>
        <div class="container mt-3 content-color">
            <div class="col-md-12 py-3">
                <div class="table">
             <table>
                <tr>
                 <th class="bg-danger">Institute</th>
                 @if(!empty($institute))
                 @foreach($institute as $i)
                 <td>{{$i->name}}</td>
                       </tr>
              @endforeach
              @endif
            
          
                       <tr>
                        <th class="bg-danger">Course Code</th>

                        <td class="text-danger">{{$c->course_code}}</td>
                              </tr>
             
          
                              <tr>
                                <th class="bg-danger">Cricos Code</th>
                                <td>{{$c->cricos_code}}</td>
                                      </tr>
                                      <tr>
                                        <th class="bg-danger">Duration (week)</th>
                                        <td>{{$c->duration_week}}</td>
                                              </tr>
          
          
                                              <tr>
                                                <th class="bg-danger">Duration (F/T Years)</th>
                                                <td> {{$c->duration_year}} </td>
                                                      </tr>

                                                      <tr>
                                                        <th class="bg-danger">Teaching Periods</th>
                                                        <td>  {{$c->teaching_period}}  </td>
                                                              </tr>

                                                              <tr>
                                                                <th class="bg-danger">Fees</th>
                                                                <td> {{$c->fees}}</td>
                                                                      </tr>
                                      
                                      
          
          
              </table>
        </div>
    </div>

<div id="accordion">
    <div class="card k0coll my-2">
      <div class="card-header">
        <a class="card-link" data-toggle="collapse" href="#collapseOne">
        Campus
        </a>
      </div>
      <div id="collapseOne" class="collapse" data-parent="#accordion">
        <div class="card-body">
          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
        </div>
      </div>
    </div>
    <div class="card k0coll my-2">
      <div class="card-header">
        <a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
        Overview
      </a>
      </div>
      <div id="collapseTwo" class="collapse" data-parent="#accordion">
        <div class="card-body">
          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
        </div>
      </div>
    </div>
    <div class="card k0coll my-2">
      <div class="card-header">
        <a class="collapsed card-link" data-toggle="collapse" href="#collapseThree">
        Entry requirement- Languages
        </a>
      </div>
      <div id="collapseThree" class="collapse" data-parent="#accordion">
        <div class="card-body">
          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
        </div>
      </div>
    </div>
    <div class="card k0coll my-2">
        <div class="card-header">
          <a class="collapsed card-link" data-toggle="collapse" href="#collapseFour">
        Entry requirement- Academic
          </a>
        </div>
        <div id="collapseFour" class="collapse" data-parent="#accordion">
          <div class="card-body">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
          </div>
        </div>
      </div>
      <div class="card k0coll my-2">
        <div class="card-header">
          <a class="collapsed card-link" data-toggle="collapse" href="#collapseFive">
        Course Structure
          </a>
        </div>
        <div id="collapseFive" class="collapse" data-parent="#accordion">
          <div class="card-body">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
          </div>
        </div>
      </div>
      <div class="card k0coll my-2">
        <div class="card-header">
          <a class="collapsed card-link" data-toggle="collapse" href="#collapsesix">
        Intakes
          </a>
        </div>
        <div id="collapsesix" class="collapse" data-parent="#accordion">
          <div class="card-body">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
          </div>
        </div>
      </div>
      <div class="card k0coll my-2">
        <div class="card-header">
          <a class="collapsed card-link" data-toggle="collapse" href="#collapseseven">
        Professional Recognition
          </a>
        </div>
        <div id="collapseseven" class="collapse" data-parent="#accordion">
          <div class="card-body">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
          </div>
        </div>
      </div>
      <div class="card k0coll my-2">
        <div class="card-header">
          <a class="collapsed card-link" data-toggle="collapse" href="#collapseeight">
        Further studies
          </a>
        </div>
        <div id="collapseeight" class="collapse" data-parent="#accordion">
          <div class="card-body">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
          </div>
        </div>
      </div>
      <div class="card k0coll my-2">
        <div class="card-header">
          <a class="collapsed card-link" data-toggle="collapse" href="#collapsenight">
        Career opportunities
          </a>
        </div>
        <div id="collapsenight" class="collapse" data-parent="#accordion">
          <div class="card-body">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
          </div>
        </div>
      </div><br>
  </div>
  </div>
  @endforeach
  @endif
</div>
</div>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
@endsection()