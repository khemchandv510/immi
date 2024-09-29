@extends('header')
@section('add-client')

<form class="add-client-form">
<div class="container">
  <div class="form-group row">
    <label for="name" class="col-sm-4 col-form-label">Name</label>
    <div class="col-sm-8">
      <input type="tetx" class="form-control" id="" placeholder="Name">
    </div>
  </div>
  <div class="form-group row">
    <label for="nick-name" class="col-sm-4 col-form-label">Nick Name</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="" placeholder="Nick Name">
    </div>
  </div>

  <div class="form-group row">
    <label for="Assign Client to" class="col-sm-4 col-form-label">Assign Client To</label>
    <div class="col-sm-8">
      <select name="assign" id="" class="form-control" >
        <option value="">1</option>
        <option value="">2</option>
        <option value="">3</option>
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="prefered_name" class="col-sm-4 col-form-label">Prefered Name</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="" placeholder="Prefered Name">
    </div>
  </div>

  <div class="form-group row">
    <label for="" class="col-sm-4 col-form-label">DOB</label>
    <div class="col-sm-8">
      <input type="date" class="form-control" id="" placeholder="DOB">
    </div>
  </div>

  <div class="form-group row">
    <label for="Country Of Birth" class="col-sm-4 col-form-label">Country Of Birth</label>
    <div class="col-sm-8">
      <select name="country_birth" class="form-control" id="" placeholder="Choose Country">
      <option value="">1</option>
      <option value="">2</option>
      <option value="">3</option>
      </select>
    </div>
  </div>

  <div class="form-group row">
    <label for="Country Of Birth" class="col-sm-4 col-form-label">Country Of Citizenship</label>
    <div class="col-sm-8">
      <select name="country_citizenship" class="form-control" id="" placeholder="Choose Country">
      <option value="">1</option>
      <option value="">2</option>
      <option value="">3</option>
      </select>
    </div>
  </div>


  
  <div class="form-group row">
    <label for="" class="col-sm-4 col-form-label">Email</label>
    <div class="col-sm-8">
      <input type="email" class="form-control" id="" placeholder="Email">
    </div>
  </div>
  
  <div class="form-group row">
    <label for="" class="col-sm-4 col-form-label"> Secondary Email</label>
    <div class="col-sm-8">
      <input type="email" class="form-control" id="" placeholder="Secondary Email">
    </div>
  </div>


  <div class="form-group row">
    <label for="" class="col-sm-4 col-form-label">Mobile</label>
    <div class="col-sm-8">
      <input type="number" class="form-control" id="" placeholder="Mobile">
    </div>
  </div>

  <div class="form-group row">
    <label for="" class="col-sm-4 col-form-label">Landline</label>
    <div class="col-sm-8">
      <input type="number" class="form-control" id="" placeholder="ladeline">
    </div>
  </div>

  
  <div class="form-group row">
    <label for="Country Of Birth" class="col-sm-4 col-form-label">Gender</label>
    <div class="col-sm-8">
      <select name="country_citizenship" class="form-control" id="" placeholder="Choose ">
      <option value="">1</option>
      <option value="">2</option>
      <option value="">3</option>
      </select>
    </div>
  </div>

  <div class="form-group row">
    <label for="Country Of Birth" class="col-sm-4 col-form-label">Marige Status</label>
    <div class="col-sm-8">
      <select name="country_citizenship" class="form-control" id="" placeholder="Choose ">
      <option value="">1</option>
      <option value="">2</option>
      <option value="">3</option>
      </select>
    </div>
  </div>

  <div class="form-group row">
    <label for="Country Of Birth" class="col-sm-4 col-form-label">Marige Status</label>
    <div class="col-sm-8">
      <select name="country_citizenship" class="form-control" id="" placeholder="Choose ">
      <option value="">1</option>
      <option value="">2</option>
      <option value="">3</option>
      </select>
    </div>
  </div>
 
 
  <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-primary">Sign in</button>
    </div>
  </div>
</form>


@endsection