@extends('back.layouts.master')
@section('content')
<br><br>
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">

          <!-- /.card -->

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">All visits</h3>
            </div>
            <!-- /.card-header -->
            <br>
            <div class="col-sm-3">
            <a class="btn btn-primary btn-add-items" href="{{ route('visit.create') }}">Add New</a>
            </div>
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped text-center">
                <thead>
                  <tr>
                    
                    <th>Patient Name</th>
                    <th>visit Type</th>
                    <th>Date  </th>
                    <th>Time  </th>
                    <th>price  </th>

                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($visits as $visit)
                    <tr>
                        
                        <td>{{ $visit->patient->name }}</td>
                        <td>{{ $visit->visit_type }}</td>
                        <td>{{ $visit->schedule->date }}</td>
                        <td>{{ $visit->schedule->time }}</td>
                        <td>
                          {{-- @if ($visit->other_procedure == null)
                              {{"not found"}}
                          @else
                          {{ $visit->other_procedure }}
                          @endif --}}
                          {{ $visit->price }}
                        </td>



                       <td>
                        <form action="{{route('visit.destroy',$visit->id)}}" method="post" >
                            @csrf
                            @method('delete')
                            <button  class="delete_ancor btn btn-danger">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>

                            <a  href="{{route('visit.edit',$visit->id)}}" class="edit_ancor btn btn-warning">
                                <i class="fa fa-edit"></i>
                            </a>

                       </td>

                      </tr>
                    @endforeach

                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>

@endsection
@push('custom-scripts')
<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": true, "autoWidth": true,
        "lengthMenu": [[5,10, 25, 50, -1], [5,10, 25, 50, "All"]],
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
    </script>
@endpush
