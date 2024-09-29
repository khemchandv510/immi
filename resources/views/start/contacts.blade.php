@extends('header')
@section('start/contacts')
    <div class="container-fluid">
      <div class="row mt-4 k4myinput k4button">
        <div class="col-md-4 mt-3">
          <button type = "button" class = "btn btn-danger btn-sm">Add Contat</button>
        <button type = "button" class = "btn btn-danger btn-sm">Import</button>
        <button type = "button" class = "btn btn-danger btn-sm">Export</button>
        <button type = "button" class = "btn btn-danger btn-sm">Print</button>
        </div>
      
        <div class="col-md-4 offset-md-4 mt-3">
          <div class="btn-group k4btn">
          <input type="Search" class="form-control" />
         <button type="button" class="btn btn-danger btn-sm mx-2"><i class="fas fa-search"></i></button>
          <button type="button" class="btn btn-danger btn-sm mx-2">Reset</button>
          </div>
         
        </div>
        
        </div>
        <div class="row mt-3 k4myinput k4button">
          <div class="col-md-2 mt-2">
            <label>Show Entries</label>
            <select class="form-control">
            <option value="1">11</option>
            <option value="1">1</option>
            <option value="1">1</option>
          </select>
          </div>
          <div class="col-md-4 offset-md-6 mt-4">
            <span>Show Client Only</span> <input type="checkbox" name="" class="align-middle mx-2">
            <span>Archived</span> <input type="checkbox" name="" class="align-middle mx-2">
          </div>
        </div>
      <div class="row mt-2 k4myinput k4button">
        <div class="col-md-2 mt-2">
         <label>Country</label>
          <select class="form-control">
            <option value="1">Rusia</option>
            <option value="1">USA</option>
            <option value="1">France </option>
          </select>
        </div>
        <div class="col-md-2 mt-2">
          <label>Source</label>
          <select class="form-control">
            <option value="1">-select-</option>
            <option value="1">-select-</option>
            <option value="1">-select-</option>
          </select>
       </div>
       <div class="col-md-3 mt-2">
          <label>Date Added</label>
             <input id="datepicker" placeholder="From"/>
       </div>
       <div class="col-md-3 mt-2">
          <label>&nbsp;</label>
             <input id="datepicker2" placeholder="To"/>
       </div>
       <div class="col-md-2 mt-2">
         <label>Staff</label>
         <select class="form-control">
            <option value="1">-select-</option>
            <option value="1">-select-</option>
            <option value="1">-select-</option>
          </select>
       </div>

      </div>
      <div class="row pt-5 mx-auto">
      <table class="table k4table border table-hover table-responsive-md table-responsive-lg table-responsive-sm table-responsive-xs">
        <thead>
          <tr>
            <th>Contact Reference #</th>
            <th>Given Name</th>
            <th>Family Name</th>
            <th>Sub Classes</th>
            <th>Date Birth</th>
            <th>Email</th>
            <th>Mobile</th>
            <th>Source</th>
            <th>Date Added</th>
            <th>Staff</th>
            <th>Action</th>
            </tr>
        </thead>
        <tbody>
          <tr>
            <td><a href="#">MD139</a></td>
            <td>Baoping</td>
            <td>Guo</td>
            <td>tdd</td>
            <td>24/10/2019</td>
            <td>sds@gamill.com</td>
            <td>9595956565</td>
            <td>goooogle.com</td>
            <td>21/05/2019</td>
            <td>Demo</td>
            <td> <i class="fas fa-square text-danger"></i></td>
          </tr>
           <tr>
            <td><a href="#">MD139</a></td>
            <td>Baoping</td>
            <td>Guo</td>
            <td>tdd</td>
            <td>24/10/2019</td>
            <td>sds@gamill.com</td>
            <td>9595956565</td>
            <td>goooogle.com</td>
            <td>21/05/2019</td>
            <td>Demo</td>
            <td> <i class="fas fa-square text-danger"></i></td>
          </tr>
           <tr>
            <td><a href="#">MD139</a></td>
            <td>Baoping</td>
            <td>Guo</td>
            <td>tdd</td>
            <td>24/10/2019</td>
            <td>sds@gamill.com</td>
            <td>9595956565</td>
            <td>goooogle.com</td>
            <td>21/05/2019</td>
            <td>Demo</td>
            <td> <i class="fas fa-square text-danger"></i></td>
          </tr>
           <tr>
            <td><a href="#">MD139</a></td>
            <td>Baoping</td>
            <td>Guo</td>
            <td>tdd</td>
            <td>24/10/2019</td>
            <td>sds@gamill.com</td>
            <td>9595956565</td>
            <td>goooogle.com</td>
            <td>21/05/2019</td>
            <td>Demo</td>
            <td> <i class="fas fa-square text-danger"></i></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <script>
            $('#datepicker').datepicker({
                uiLibrary: 'bootstrap4'
            });

            $('#datepicker2').datepicker({
                uiLibrary: 'bootstrap4'
            });
        </script>

        @endsection