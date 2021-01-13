@extends('layouts.admin_app')
@section('content')
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-8">
        <div class="card card-primary">
          <form role="form" id="subjectCreate" method="post" action="{{url('/admin/class').'/'.$class->id.'/update'}}">
            {!! csrf_field() !!}
            <div class="card-header">
                <h3 class="card-title">{{$sub_page}}</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label>Grade</label>
                    <select class="form-control select2" style="width: 100%;" id="grade" name="grade">
                        <option value="">Select grade</option>
                        <?php
                            if(isset($grades)){
                                foreach($grades as $grd){
                        ?>
                                    <option value="<?php echo $grd['id'] ?>" <?php if($class->grade_id == $grd['id']){ echo 'selected'; } ?>><?php echo $grd['grade'] ?></option>
                        <?php
                                }
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="inputName">Academic Year</label>
                    <input type="text" id="class" name="class" class="form-control" value="{{$class->class}}">
                </div>
                <div class="form-group">
                    <label for="inputDescription">Description</label>
                    <textarea id="subjectDescription" name="description" class="form-control" rows="4">{{$class->description}}</textarea>
                </div>
                <div class="form-group">
                    <label>Status</label>
                    <div>
                        <input type="checkbox" id="status" name="status" data-toggle="toggle" data-on="Actice" data-off="Dactive" data-onstyle="success" data-offstyle="danger">
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-info">Submit</button>
                <button type="submit" class="btn btn-default float-right">Cancel</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
</div>
@endsection

@section('js')
<script>
  var checked = <?php if($class->status == 1){ ?>true<?php }else{ ?>false<?php } ?>;
  $("#status").prop("checked", checked);
</script>
@endsection
