@extends('layouts.templateList')
@section('style')
  {{-- <link rel="stylesheet" href="/css/EJ-kanban.css"> --}}
@endsection

@section('script')
  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
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
  @if (session('success'))
    <div class="alert alert-success">
      <p><h4>{{session('success')}}</h4></p>
    </div>
  @endif
  @if (session('warning'))
    <div class="alert alert-warning">
      <p><h4>{{session('warning')}}</h4></p>
    </div>
  @endif
  <form action="{{ url('gradeUpdate') }}" method="POST">
    {{ csrf_field() }}
  <div class="jumbotron far">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/home">Home</a></li>
        <li class="breadcrumb-item">Semester {{$semester}}</li>
      </ol>
    </nav>
    <div class="form-group row far">
      {{-- @if (count($tasks) > 0) --}}
        {{-- @for ($i=1; $i < 5; $i++) --}}
          <div class="panel panel-info">
              <div class="panel-heading">
                  Semester {{$semester}}
              </div>
              <div class="panel-body">
                  <table class="table table-striped task-table">
                      <thead>
                          <th>Subject Code</th>
                          <th>Subject Name</th>
                          <th>Weigth</th>
                          <th>Grade</th>
                          <th>Action</th>
                      </thead>
                      <tbody>


                           @foreach ($gradeLists as $gradeList)
                               {{-- @if ($gradeList->semester == $i) --}}
                              <tr>
                                  {{-- <td class="table-text">
                                        {{ $gradeList->semester }}
                                  </td> --}}
                                  <td class="table-text">
                                        {{ $gradeList->subject_code }}

                                  </td>
                                  <td class="table-text">
                                        {{ $gradeList->subject_name}}
                                  </td>
                                  <td class="table-text">
                                        {{ $gradeList->weight}}
                                  </td>
                                  <td >
                                      @if ($gradeList->grade !== null)
                                      {{$gradeList->grade}}
                                      @else
                                      No Grade
                                      @endif
                                  </td>
                                  <td>
                                    <button type="button" class="btn btn-info" data-toggle="modal" data-id="{{$gradeList->id}}" data-name="{{$gradeList->subject_name}}" data-code="{{$gradeList->subject_code}}" data-grade="{{$gradeList->grade}}" data-target="#exampleModal">
                                      Update
                                    </button>
                                  </td>
                          @endforeach

                      </tbody>
                  </table>

                      <!-- Modal for edit -->
                      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form action="{{ url('gradeUpdate') }}" method="POST">
                                {{ csrf_field() }}
                                <div class="form-group">
                                  <label for="recipient-name" class="col-form-label">Subject Name:</label>
                                  <input type="hidden" name="id" id="grade-id" >
                                  <input type="text" class="form-control" name="name" id="subject-name" readonly>
                                </div>
                                <div class="form-group">
                                  <label for="message-text" class="col-form-label">Grade:</label>
                                  <input type="text"name="grade" id="grade" required>
                                  <h6 >Please input a grade between A, B+, B, C+, C, D+, D, and F (Capital letter)</h6 >
                                </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary">Update</button>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                      {{-- script ajax for show data to modal  --}}
                      <script type="text/javascript">
                      $('#exampleModal').on('show.bs.modal', function (event) {
                        var button = $(event.relatedTarget) // Button that triggered the modal
                        var id = button.data('id')
                        var name = button.data('name')
                        var code = button.data('code')
                        var grade = button.data('grade')
                        // Extract info from data-* attributes
                        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
                        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
                        var modal = $(this)
                        modal.find('.modal-title').text('Edit Your Grade : ' + name)
                        modal.find('#grade-id').val(id)
                        modal.find('#subject-name').val(name)
                        modal.find('#subject-codename').val(code)
                        modal.find('#grade').val(grade)
                      })
                      </script>

                  SEMESTER CREDITS :   {{$sumCredit}}                   <br>
                  SEMESTER GRADE POINT AVERAGE CREDITS :{{$sumPoint}}  <br>
                  SEMESTER GRADE POINT AVERAGE (GPS) :      {{number_format($GPS, 2, '.', '')}}    <br>

                  <br><br>
                  CUMULATIVE CREDITS :   {{$sumCreditCal}}         <br>
                  CUMULATIVE GRADE POINT AVERAGE CREDITS : {{$sumPointCal}}<br>
                  CUMULATIVE GRADE POINT AVERAGE (GPA):    {{number_format($GPA, 2, '.', '')}} <br>
              </div>
          </div>
{{-- @endfor --}}

{{-- <button type="submit"  class="btn btn-success">Update Grade</button> --}}
</form>
@endsection
