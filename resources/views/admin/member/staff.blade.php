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
                  <table id="classListTable" class="table table-bordered table-hover dataTable dtr-inline" role="grid" aria-describedby="example2_info">
                    <thead>
                      <tr role="row">
                      <th class="sorting" tabindex="0" aria-controls="classListTable" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">nic</th>
                      <th class="sorting" tabindex="0" aria-controls="classListTable" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">name_full</th>
                      <th class="sorting_asc" tabindex="0" aria-controls="classListTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">gender</th>
                      <th class="sorting" tabindex="0" aria-controls="classListTable" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">phone</th>
                      <th class="sorting" tabindex="0" aria-controls="classListTable" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">status</th>
                      <th class="sorting" tabindex="0" aria-controls="classListTable" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">membership_status</th>
                      <th class="sorting" tabindex="0" aria-controls="classListTable" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">action</th>
                    </thead>
                    <tbody>
                      
                    </tbody>
                    <tfoot>
                      <tr>
                        <th rowspan="1" colspan="1">nic</th>
                        <th rowspan="1" colspan="1">name_full</th>
                        <th rowspan="1" colspan="1">gender</th>
                        <th rowspan="1" colspan="1">phone</th>
                        <th rowspan="1" colspan="1">status</th>
                        <th rowspan="1" colspan="1">membership_status</th>
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
    $('#classListTable').DataTable({
      "paging": true,
      "lengthChange": false,
      //"searching": false,
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
        url: "{{ url('admin/member/staff/list') }}",
      },
      columns: [
          {data: 'nic', name: 'nic'},
          {data: 'name_full', name: 'name_full'},
          {data: 'gender', name: 'gender'},
          {data: 'phone', name: 'phone'},
          {data: 'status', name: 'status'},
          {data: 'membership_status', name: 'membership_status'},
          {data: 'action', name: 'action'}
      ]
    });
  });
</script>
@endsection
