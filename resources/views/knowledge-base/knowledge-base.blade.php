@extends('header')
@section('add-knowledge-base')

</div>
{{-- @dd($knowledgebase_search); --}}
{{-- <link rel="stylesheet" href="{{URL::asset('public/css/samples.css')}}"> --}}
<div class="row">
	<div class="col-sm-12  knowledgebase-search" >
<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search Heading..." title="Type in a Category" class="form-contro">
</div>
</div>

<?php $knowledgebase = DB::table('knowledgebases')->orderBy('id', 'DESC')->where('status',1)->get(); ?>

{{-- <div class="row">
		<div class="col-sm-3">
			{{Form::open(array('url' => 'knowledgebase-heading-search'))}}
			@if(!empty($knowledgebase))
			<select name="knowledgenase_heading" id="" class="form-contro">
		<option selectes disabled>--Select Heading--</option>

				@foreach($knowledgebase as $k)
		<option value="{{$k->heading}}">{{$k->heading}}</option>
@endforeach
@endif
</select>
			<input type="submit">
			{{Form::close()}}
		</div>
		
</div> --}}
<br>


<div class="row" style="position:relative">

		<div class="show-all-category">
			<p > <strong> Categories </strong> </p>
				<ul>
				<?php 			$get_cat = DB::table('knowledgebase_categories')->get();
			foreach ($get_cat as $cat) {	?>
			<li>
			<a href="{{url('knowledgebase-category/'.$cat->unique_id)}}">	{{$cat->category}} </a>
			</li>
			<?php
			}	?>
				</ul>		
				</div>

	<div class="col-sm-12">
		
<ul class="nav nav-tabs" role="tablist" id="knowledgebase">
		
		<li class="nav-item">
				<a class="nav-link  active"  href="#knowledgebase_content" role="tab" data-toggle="tab"> Knowledge Base </a>
			</li>

	<li class="nav-item">
				<a class="nav-link  "  href="#aa" role="tab" data-toggle="tab">Add Knowledge Base </a>
			</li>
	<li class="nav-item">
	<a class="nav-link " href="#nn" role="tab" data-toggle="tab"> Add New Catogory </a>
	</li>
</ul> 
</div>
</div>


<div class="tab-content content-style active my-4" id="knowlwdgebaseform">
	

	<div id="knowledgebase_content" class="tab-pane active" class="knowledgebase-content">
		
		
		@if(!empty($knowledgebase))
		@foreach($knowledgebase as $k)
		
		<div class="knowledgebase-child-content">
		<div class="knowledge_heading">{{$k->heading}} </div>	
		<div class="knowledge_language">{{$k->language}} </div>	
		<div class="knowledge_description">{{$k->description}} </div>	
	</div>
		
	@endforeach
	@endif

	</div>

<div id="aa" class="tab-pane">
{{Form::open(array('url'=>'add-knowledgebase', 'files'=>'true'))}}
{{Form::text('heading',null, array('class'=>'form-control','placeholder' => 'Heading'))}}
<?php 
	$category =  DB::table('knowledgebase_categories')->get();
	
?>
<select name="language" id="" class="form-control" placeholder ="Select Category">
	<option disabled selected>--Select--</option>
	@foreach($category as $cat)
	<option value="{{$cat->category}}">{{$cat->category}}</option>
	@endforeach
</select>
<textarea name="description" id="editor"  class="form-control" placeholder="Add Something Here...."></textarea>
<label for="">Add Audio</label>
{{Form::file('audio', array('class'=> 'form-control'))}}
{{Form::submit('Save', array('class' =>'btn btn danger'))}}
{{Form::close()}}
</div>

<div id="nn" class="tab-pane " >

		{{Form::open(array('url'=>'add-category-knowledgebase', 'files'=>'true'))}}
		{{Form::text('category',null, array('class'=>'form-control', 'placeholder'=>'Add New Category'))}}
		<?php echo ($errors->first('category',"<li class='custom-error'>:message</li>")) ?>
		{{-- <select name="language" id="" class="form-control">
			<option value="English">English</option>
			<option value="Hindi">Hindi</option>
		</select> --}}
		{{Form::text('language',null, array('class'=>'form-control', 'placeholder'=>'Add Language'))}}
		
		{{Form::submit('Save',  array('class' =>'btn btn danger'))}}
{{Form::close()}}
</div>


</div>

<script src="{{URL::asset('public/js/ckeditor.js')}}"></script> 
<script src="{{URL::asset('public/js/sample.js')}}"></script>





<script>
	function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("knowledgebase_content");
  tr = table.getElementsByClassName("knowledgebase-child-content");
  
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByClassName("knowledge_heading")[0];
	
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
	</script>


@endsection