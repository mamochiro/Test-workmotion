@extends('layouts.templateList')
@section('style')
  {{-- <link rel="stylesheet" href="/css/EJ-kanban.css"> --}}
@endsection

@section('script')
  {{--For Form delect--}}
<form id="form-delete" method="post">
    {{ csrf_field() }}
    {{ method_field('DELETE') }}
</form>
<script type="text/javascript">
    function confirmDelete(msg, url, action) {
        if (confirm(msg)) {
            if(action == 'restore'){
                window.location.href = url;
            }else{
                var element = document.getElementById('form-delete');
                element.action = url;
                element.submit();
            }
            // $('form#form-delete').attr('action', url);
            // $('form#form-delete').submit();
        } else {
            alert('Canceled');
        }
    }
</script>
@endsection

@section('content')
  <div class="jumbotron far">
    <div class="form-group">
      <form name="store" id="store" method="get" action="">
      <label for="exampleFormControlSelect1">Semester select</label>
      <select class="form-control" name="storeID" >
        <option value = '#'>------- Select Semester -------</option>
        <option value = '/gradelist/1'>1</option>
        <option value = '/gradelist/2'>2</option>
        <option value = '/gradelist/3'>3</option>
        <option value = '/gradelist/4'>4</option>
      </select>
  </div>

    <button type="submit"  class="btn btn-success">show</button>
</form>

<script type="text/javascript">
document.getElementById('store').storeID.onchange = function() {
    var newaction = this.value;
    document.getElementById('store').action = newaction;
};
</script>
@endsection
