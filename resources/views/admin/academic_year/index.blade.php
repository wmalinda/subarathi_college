@extends('layouts.admin_app')
@section('content')
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">{{$sub_page}}</h3>
          </div>
          <div class="card-body">
            <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
              <div class="row">
                <div class="col-sm-12 col-md-6">
                </div>
                <div class="col-sm-12 col-md-6">
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <table id="academicYearListTable" class="table table-bordered table-hover dataTable dtr-inline" role="grid" aria-describedby="example2_info">
                    <thead>
                      <tr role="row">
                      <th class="sorting_asc" tabindex="0" aria-controls="academicYearListTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">academic_year</th>
                      <th class="sorting" tabindex="0" aria-controls="academicYearListTable" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">description</th>
                      <th class="sorting" tabindex="0" aria-controls="academicYearListTable" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">status</th>
                      <th class="sorting" tabindex="0" aria-controls="academicYearListTable" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">action</th>
                    </thead>
                    <tbody>
                      
                    </tbody>
                    <tfoot>
                      <tr>
                        <th rowspan="1" colspan="1">academic_year</th>
                        <th rowspan="1" colspan="1">description</th>
                        <th rowspan="1" colspan="1">status</th>
                        <th rowspan="1" colspan="1">action</th>
                      </tr>
                    </tfoot>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</div>
@endsection

@section('js')
<script>
  $(function () {
    console.log('dsdsd');
    $('#academicYearListTable').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,

      serverSide: true,
      processing: true,

      ajax: {
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        //"type": "POST",
        url: "{{ url('admin/academic-year/list') }}",
      },
      columns: [
        
          {data: 'academic_year', name: 'academic_year'},
          {data: 'description', name: 'description'},
          {data: 'status', name: 'status'},
          {data: 'action', name: 'action'}
      ]
    });
  });



  /*$(function () {

    console.log('123');
    $('#academicYearListTable').DataTable({
        serverSide: true,
        processing: true,
        ajax: {
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            //"type": "POST",
            url: "videos/data",
        },
        columns: [
            {data: 'thumbnail', name: 'thumbnail',
                render: function( data, type, full, meta ) {
                    return '<img src='+data+' height="100">';
                }
            },
            {data: 'title', name: 'title'},
            {data: 'published', name: 'published'},
            {data: 'status', name: 'status'},
            {data: 'action', name: 'action'}
        ]
    });

  });*/
    



</script>
@endsection
