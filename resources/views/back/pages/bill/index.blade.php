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
              <h3 class="card-title">All bill Services</h3>
            </div>
            <!-- /.card-header -->
            <br>
            <div class="col-sm-3">
            <a class="btn btn-primary btn-add-items" href="{{ route('bill.create') }}">Add New</a>
            </div>
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped text-center">
                <thead>
                  <tr>
                    <th>Patient Name</th>
                    <th>Visit Information</th>
                    <th>total procedure</th>
                    <th>Total price</th>
                    <th>Date</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($bills as $bill)
                    <tr>
                       
                        <td>{{ $bill->patient->name }}</td>
                        <td>{{ $bill->visit->visit_type }}</td>
                        
                        <td>
                          @foreach ($bill->procedures as $procedure)
                          
                          {{ $procedure->name }}, 
                          @endforeach
                        </td>
                        <td>{{ $bill->total_price }}</td>
                        <td>{{ $bill->created_at }}</td>


                        
                        
                       <td>
                        <form action="{{route('bill.destroy',$bill->id)}}" method="post" >
                            @csrf
                            @method('delete')
                            <button  class="delete_ancor btn btn-danger">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>

                            <a  href="{{route('bill.edit',$bill->id)}}" class="edit_ancor btn btn-warning">
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
