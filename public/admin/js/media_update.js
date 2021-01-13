var updateFilterType;

$(function() {
  $('#toggle-shedule').change(function() {
    if($(this).prop('checked') == true){
      $('#updatedShaduleData').css('display', 'block');
      $(this).val(1);
      document.getElementById("streamSheduleSubmit").innerHTML="Lets Shadule";
    }else{
      $('#updatedShaduleData').css('display', 'none');
      $(this).val(0);
      document.getElementById("streamSheduleSubmit").innerHTML="Lets Go";
    }
  })
})

$(function() {
  $('#toggle-status').change(function() {

  })
})

$("#updatedShaduleDate").datetimepicker({
  //format: 'DD-MM-YYYY',
  format: 'YYYY-MM-DD',
  defaultDate: new Date(),
});

$('#updatedShaduleTime').datetimepicker({
  format: 'LT'
})

function editLiveShedule(mediaId) {
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $.ajax({
    type: 'POST',
    url: app_admin_url+'/live-streaming/shedule/edit',
    data: {
      'media' :  mediaId
    },
    beforeSend: function(){
      addLoader();
    },
    success: function(data){
      if(data){
        loadUpdateLiveShedule(data);
      }else{
        removeLoader();
        swall('error', 'Invalied request', 'danger', 2500, false);
      }
    },
    complete: function(){
      
    },
  });
}

function editUploadMedia(mediaId) {
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $.ajax({
    type: 'POST',
    url: app_admin_url+'/media/upload/edit',
    data: {
      'media' :  mediaId
    },
    beforeSend: function(){
      addLoader();
    },
    success: function(data){
      console.log(data);
      if(data){
        loadUpdateUploadMediaModel(data);
      }else{
        removeLoader();
        swall('error', 'Invalied request', 'danger', 2500, false);
      }
    },
    complete: function(){
      
    },
  });
}

function deleteMedia(mediaId) {
  Swal.fire({
    title: 'Are you sure?',
    text: "You won't be able to Delete this!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, delete it!'
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

      $.ajax({
        type: 'POST',
        url: app_admin_url+'/media/delete',
        data: {
          'media_id' :  mediaId
        },
        beforeSend: function(){
          addLoader();
        },
        success: function(data){
          console.log(data);

          if(data != false){
            swall('Sucess', 'Media sucessfully deleted', 'success', 2500, false);
            setTimeout(function () {
              location.reload();
            },2600);
          }else{
           swall('error', 'Media deleting error', 'danger', 2500, false);
          }
        },
        complete: function(){
          
        },
      });
    }
  });
}

function UpdateUploadPublishingMediaType(){
  var val = $("#uuPublishType").val();
  if(val == 1){
    $('input[name="avalable_for_update"]').prop('checked', false);
    $('#uafRow').css('display', 'none');
    $("#uupCls").html("");
    $('#uuPrice').attr("disabled", false);
    $('#upLsScRow').css('display', 'block');
  }else if(val == 2){
    $('#uafRow').css('display', 'block');
    $('#uuPrice').attr("disabled", true);
    $('#upLsScRow').css('display', 'none');
  }else{
    $('input[name="avalable_for_update"]').prop('checked', false);
    $('#uafRow').css('display', 'none');
    $("#uupCls").html("");
    $('#uuPrice').attr("disabled", true);
    $('#upLsScRow').css('display', 'none');
  }
}

function UpdateLivePublishingMediaType(){
  var val = $("#ulPublishType").val();
  console.log(val);
  if(val == 1){
    $('#uafRow').css('display', 'none');
    $('#ulPrice').attr("disabled", false);
    $('#upLsScRow').css('display', 'block');
  }else if(val == 2){
    $('#uafRow').css('display', 'block');
    $('#ulPrice').attr("disabled", true);
    $('#upLsScRow').css('display', 'none');
  }else{
    $('#uafRow').css('display', 'none');
    $('#ulPrice').attr("disabled", true);
    $('#upLsScRow').css('display', 'none');
  }
}

$(document).ready(function () {
  $('.umclosebutton').click(function () {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be close this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, close it!'
      }).then((result) => {
        if (result.isConfirmed) {
          if(updateFilterType == 'update_upload'){
            $('#updateUploadMedia').modal('hide');
          }else if(updateFilterType == 'update_live'){
            $('#updateLiveShedule').modal('hide');
          }
        }
      })
  });

  //Update Video Upload
  $('#mediaUploadUpdate').submit(function (event) {
    event.preventDefault();
    var formData = new FormData(this);
    var url = $('#mediaUploadUpdate').attr('action'); 
    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
      }
    });

    $.ajax({
      url: url,
      type: "POST",
      data: formData,
      processData: false,
      contentType: false,
      beforeSend: function () {
        addLoader();
      },
      error:function(err){
        var errList = '';
        var errors = err.responseJSON.errors;
        $.each(errors, function(key, value) {
          errList += value[0]+'<br>';
        });
        swal.fire(
          'Update Upload Video!',
          errList,
          'error'
        )
      },
      success: function(data){
        if(data != false){
          swall('Sucess', 'Video sucessfully updated', 'success', 2500, false);
          $("#mediaUploadUpdate").trigger("reset");
          setTimeout(function () {
            window.location.replace(app_admin_url+'/channel/uploads');
          },2600);
        }else{
         swall('error', 'Video updating error', 'danger', 2500, false);
        }
      },
      complete: function(){
        removeLoader();
      },
    });
  })

  //Create Live Stream
  $('#streamSheduleUpdate').submit(function (event) {
    event.preventDefault();
    var formData = new FormData(this);
    console.log(formData);
    var url = $('#streamSheduleUpdate').attr('action'); 
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    $.ajax({
      url: url,
      type: "POST",
      data: formData,
      processData: false,
      contentType: false,
      beforeSend: function () {
        addLoader();
      },
      error:function(err){
        console.log(err);
        var errList = '';
        var errors = err.responseJSON.errors;
        $.each(errors, function(key, value) {
          errList += value[0]+'<br>';
          console.log(value);
        });
        console.log(errList);
        swal.fire(
          'Upload Video!',
          errList,
          'error'
        )
      },
      success: function(data){
        console.log(data);
        if(data != false){
          swall('Sucess', 'Schedule sucessfully submited', 'success', 2500, false);
          $("#streamSheduleUpdate").trigger("reset");
          setTimeout(function () {
            window.location.replace(app_admin_url+'/channel/live-shedules');
          },2600);
        }else{
          swall('error', 'Schedule submiting error', 'danger', 2500, false);
        }
      },
      complete: function(){
        removeLoader();
      },
    });
  })

  $('input:radio[name=avalable_for_update]').change(function() {
    if(updateFilterType == 'update_upload'){
      if(this.value == 1){
        var selectedGrades = [];
        $.each($('#'+updateFilterType+'_grade'), function(){            
          selectedGrades.push($(this).val());
        });
  
        if(selectedGrades != ''){
          var selectedMedium = [];
          $.each($('#'+updateFilterType+'_medium'), function(){            
            selectedMedium.push($(this).val());
          });
  
          if(selectedMedium != ''){
            var selectedGrades = $('#'+updateFilterType+'_grade').val();
            var grades = [];
            $.each(selectedGrades, function( index, value ) {
              var val = value.split(",");
              grades[index] = val[0];
            });
  
            gradesString = grades.toString();
  
            var selectedMedium = $('#'+updateFilterType+'_medium').val();
            var mediums = [];
            $.each(selectedMedium, function( index, value ) {
              var val = value.split(",");
              mediums[index] = val[0];
            });
  
            mediumString = mediums.toString();
            
            uClasses(gradesString, mediumString);
          }else{
            $('input:radio[name=avalable_for_update]').prop('checked', false);
            swall('error', 'Please select Medium', 'danger', 2500, false);
          }
        }else{
          $('input:radio[name=avalable_for_update]').prop('checked', false);
          swall('error', 'Please select Grade', 'danger', 2500, false);
        }    
      }else if (this.value == 2) {
        $('#uupCls').html('');
      }else if (this.value == 3) {
        $('#uupCls').html('');
      }
    }
    
  });
})

function loadUpdateUploadMediaModel(data){
  updateFilterType = 'update_upload';
  var selectedData = [];

  $("#mediaUploadUpdate").trigger("reset");
  $("#update_uploadLoadFilters #grade").html("");
  $("#update_uploadLoadFilters #medium").html("");
  $("#update_uploadLoadFilters #subject").html("");
  $("#update_uploadLoadFilters #chapter").html("");
  $("#update_uploadLoadFilters #unit").html("");
  $("#update_uploadLoadFilters #class").html("");
  $('#uuPrice').attr("disabled", true);
  $('#upLsScRow').css('display', 'none');
  $('input[name="avalable_for_update"]').attr('checked', false);
  $('#uafRow').css('display', 'none');
  $("#uupCls").html("");

  selectedData['grade'] = (data.media_grade.length > 0) ? data.media_grade :'';
  selectedData['medium'] = (data.media_language.length > 0) ? data.media_language :'';
  selectedData['subject'] = (data.media_subject.length > 0) ? data.media_subject :'';
  selectedData['chapter'] = (data.media_chapter.length > 0) ? data.media_chapter :'';
  selectedData['unit'] = (data.media_unit.length > 0) ? data.media_unit :'';
  selectedData['class'] = (data.media_class.length > 0) ? data.media_class :'';

  uGrade(selectedData);
  if(data.media_grade.length > 0){
    var grd = [];
    $.each(data.media_grade, function( index, value ) {
      grd[index] = value.grade_id;
    });

    grdString = grd.toString();
    uMedium(selectedData, grdString);
    if(data.media_language.length > 0){
      var lang = [];
      $.each(data.media_language, function( index, value ) {
        lang[index] = value.language_id;
      });

      langString = lang.toString();
      uSubject(selectedData, grdString, langString);
      if(data.media_subject.length > 0){
        var subj = [];
        $.each(data.media_subject, function( index, value ) {
          subj[index] = value.subject_id;
        });
  
        subjString = subj.toString();
        uChapter(selectedData, grdString, langString, subjString);
        if(data.media_chapter.length > 0){
          var chap = [];
          $.each(data.media_chapter, function( index, value ) {
            chap[index] = value.chapter_id;
          });
    
          chapString = chap.toString();
          uUnit(selectedData, chapString);
        }
      }
    }
  }

  $("#uuTitle").val((data.title != '') ? data.title :'');
  $("#uuDescription").val((data.description != '') ? data.description :'');
  $("#upload_thum").html((data.thumbnail != '') ? '<img src="'+bucket_path+'/'+data.thumbnail+'" class="img-fluid" alt="">' :'');
  $("#uuPublishType").val((data.publish_type != '') ? data.publish_type : '');
  $("#uplId").val((data.id != '') ? data.id :'');
  if(data.publish_type != ''){
    if(data.publish_type == 1){
      var price = getMediaPriceById(data.id);
      $("#uuPrice").val((price != false) ? price : 0);
      $('#uuPrice').attr("disabled", false);
      $('#upLsScRow').css('display', 'block');
    }else if(data.publish_type == 2){
      if(data.avalable_for != ''){
        if(data.avalable_for == 1){
          $("#uavalable_for_c").attr('checked', 'checked');
          uClasses(grdString, langString, selectedData);
        }else if(data.avalable_for == 2){
          $("#uavalable_for_g").attr('checked', 'checked');
        }else if(data.avalable_for == 3){
          $("#uavalable_for_s").attr('checked', 'checked');
        }

        $('#uafRow').css('display', 'block');
      }
    }
  }

  var status = (data.status != '') ? data.status :'';
  $('#toggle-status').bootstrapToggle((status == 1) ? 'on' : 'off');

  

  $('#updateUploadMedia').modal({backdrop: 'static', keyboard: false});
  $('#updateUploadMedia').modal('show'); 
}

function loadUpdateLiveShedule(data){
  updateFilterType = 'update_live';
  var selectedData = [];

  $("#streamSheduleUpdate").trigger("reset");
  $("#update_liveLoadFilters #grade").html("");
  $("#update_liveLoadFilters #medium").html("");
  $("#update_liveLoadFilters #subject").html("");
  $("#update_liveLoadFilters #chapter").html("");
  $("#update_liveLoadFilters #unit").html("");
  $("#update_liveLoadFilters #class").html("");
  $('#ulPrice').attr("disabled", true);
  $('#upLsScRow').css('display', 'none');
  $('input[name="avalable_for_update"]').attr('checked', false);
  $('#uafRow').css('display', 'none');
  
  $("#ulTitle").val((data.title != '') ? data.title :'');
  $("#ulDescription").val((data.description != '') ? data.description :'');
  $("#live_thum").html((data.thumbnail != '') ? '<img src="'+bucket_path+'/'+data.thumbnail+'" class="img-fluid" alt="">' :'');
  $("#ulPublishType").val((data.publish_type != '') ? data.publish_type : '');
  $("#liShId").val((data.id != '') ? data.id :'');
  if(data.publish_type != ''){
    if(data.publish_type == 1){
      var price = getMediaPriceById(data.id);
      $("#ulPrice").val((price != false) ? price : 0);
      $('#ulPrice').attr("disabled", false);
      $('#upLsScRow').css('display', 'block');
    }else if(data.publish_type == 2){
      if(data.avalable_for != ''){
        if(data.avalable_for == 1){
          $("#uavalable_for_c").attr('checked', 'checked');
        }else if(data.avalable_for == 2){
          $("#uavalable_for_g").attr('checked', 'checked');
        }else if(data.avalable_for == 3){
          $("#uavalable_for_s").attr('checked', 'checked');
        }

        $('#uafRow').css('display', 'block');
      }
    }
  }

  $('#toggle-shedule').bootstrapToggle('on');
  $('#updatedShaduleData').css('display', 'block');
  $("#updated_shedule_date").val((data.stream_shadule.shadule_date != '') ? data.stream_shadule.shadule_date :'');
  $("#updated_shedule_time").val((data.stream_shadule.shadule_time != '') ? data.stream_shadule.shadule_time :'');
  $('#updateLiveShedule').modal({backdrop: 'static', keyboard: false});
  $('#updateLiveShedule').modal('show');

  selectedData['grade'] = (data.media_grade.length > 0) ? data.media_grade :'';
  selectedData['medium'] = (data.media_language.length > 0) ? data.media_language :'';
  selectedData['subject'] = (data.media_subject.length > 0) ? data.media_subject :'';
  selectedData['chapter'] = (data.media_chapter.length > 0) ? data.media_chapter :'';
  selectedData['unit'] = (data.media_unit.length > 0) ? data.media_unit :'';
  selectedData['class'] = (data.stream_class.length > 0) ? data.stream_class :'';

  uGrade(selectedData);
  if(data.media_grade.length > 0){
    var grd = [];
    $.each(data.media_grade, function( index, value ) {
      grd[index] = value.grade_id;
    });

    grdString = grd.toString();
    uMedium(selectedData, grdString);
    if(data.media_language.length > 0){
      var lang = [];
      $.each(data.media_language, function( index, value ) {
        lang[index] = value.language_id;
      });

      langString = lang.toString();
      uSubject(selectedData, grdString, langString);
      if(data.media_subject.length > 0){
        var subj = [];
        $.each(data.media_subject, function( index, value ) {
          subj[index] = value.subject_id;
        });
  
        subjString = subj.toString();
        uChapter(selectedData, grdString, langString, subjString);
        if(data.media_chapter.length > 0){
          var chap = [];
          $.each(data.media_chapter, function( index, value ) {
            chap[index] = value.chapter_id;
          });
    
          chapString = chap.toString();
          uUnit(selectedData, chapString);
        }
      }
    }
  }
}

function uCheckGrade(){
  var selectedGrades = $('#'+updateFilterType+'_grade').val();
  $("#"+updateFilterType+"row_medium").remove();
  $("#"+updateFilterType+"row_subject").remove();
  $("#"+updateFilterType+"row_chapter").remove();
  $("#"+updateFilterType+"row_unit").remove();
  $("#row_class").remove();
  $('input[name="avalable_for_update"]').prop('checked', false);
  if(selectedGrades != ''){
    $('#'+updateFilterType+'_loadNext_grade').attr("disabled", false);
  }else{
    $('#'+updateFilterType+'_loadNext_grade').attr("disabled", true);
  }
}

function uCheckMedium(){
  var selectedMediums = $('#'+updateFilterType+'_medium').val();
  $("#"+updateFilterType+"row_subject").remove();
  $("#"+updateFilterType+"row_chapter").remove();
  $("#"+updateFilterType+"row_unit").remove();
  $("#row_class").remove();
  $('input[name="avalable_for_update"]').prop('checked', false);
  if(selectedMediums != ''){
    $('#'+updateFilterType+'_loadNext_medium').attr("disabled", false);
  }else{
    $('#'+updateFilterType+'_loadNext_medium').attr("disabled", true);
  }
}

function uCheckSubject(){
  var selectedSubjects = $('#'+updateFilterType+'_subject').val();
  $("#"+updateFilterType+"row_chapter").remove();
  $("#"+updateFilterType+"row_unit").remove();
  if(selectedSubjects != ''){
    $('#'+updateFilterType+'_loadNext_subject').attr("disabled", false);
  }else{
    $('#'+updateFilterType+'_loadNext_subject').attr("disabled", true);
  }
}

function uCheckChapter(){
  var selectedSubjects = $('#'+updateFilterType+'_chapter').val();
  $("#"+updateFilterType+"row_unit").remove();
  if(selectedSubjects != ''){
    $('#'+updateFilterType+'_loadNext_chapter').attr("disabled", false);
  }else{
    $('#'+updateFilterType+'_loadNext_chapter').attr("disabled", true);
  }
}

function uCheckUnit(){
  var selectedUnits = $('#'+updateFilterType+'_unit').val();
  if(selectedUnits != ''){
    $('#'+updateFilterType+'_loadNext_unit').attr("disabled", false);
  }else{
    $('#'+updateFilterType+'_loadNext_unit').attr("disabled", true);
  }
}

function appendUpdateFilterData(data, label, loadButton, nextLoad = null, selectedData = null, selectedVarible = null){
  var dataContent = [];
  var content = '<div id="'+updateFilterType+'row_'+label+'" class="row">'+
  '<div class="col-md-10">'+
  '<div class="form-group">'+
  '<label>'+label+' *</label>'+
  '<select class="form-control select2" multiple="multiple" data-placeholder="Select the '+label+'" id="'+updateFilterType+'_'+label+'" name="'+updateFilterType+'_'+label+'[]" style="width: 100%;" onchange="'+loadButton+'();">';
  for(i = 0; i < data.length; i++){
    data[i]['selected'] = false;
    if(selectedData != null){
      if(selectedData[label].length > 0){
        for(j = 0; j < selectedData[label].length; j++){
          if(selectedData[label][j][selectedVarible] == data[i]['id']){
            data[i]['selected'] = true;
          }
        }
      }
    }

    if(data[i]['selected'] != false){
      content += '<option value="'+data[i]['id']+','+data[i]['value']+'" selected>'+data[i]['value']+'</option>';
    }else{
      content += '<option value="'+data[i]['id']+','+data[i]['value']+'">'+data[i]['value']+'</option>';
    }
  }

  content += '</select>'+
  '</div>'+
  '</div>'+
  '<div class="col-md-2" style="margin-top: 30px;">';
  if(nextLoad != null){
    content += '<button type="button" disabled id="'+updateFilterType+'_loadNext_'+label+'" class="btn btn-app" style="padding: 10px; height: 40px; width: 60px;" onclick="'+nextLoad+'('+selectedData+');">';
  }else{
    content += '<button type="button" disabled id="'+updateFilterType+'_loadNext_"'+label+' class="btn btn-app" style="padding: 10px; height: 40px; width: 60px;">';
  }
  
  content += '<i class="fas fa-check"></i>'+
  '</button>'+
  '</div>'+
  '</div>';

  $("#"+updateFilterType+"LoadFilters #"+label).append(content);
  $('.select2').select2();
}
    
function uGrade(selectedData = null){
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $.ajax({
      url: app_admin_url+'/grade',
      type: "POST",
      data: {
        id : 1
      },
      beforeSend: function() {
        //addLoader();
      },
      success: function(data){
        if(data != ''){
          console.log(data);
          appendUpdateFilterData(data, 'grade', 'uCheckGrade', 'uMedium', selectedData, 'grade_id');
        }else{
          swall('error', 'Invalied request', 'danger', 2500, false);
        }
      },
      complete: function() {
        removeLoader();
      }
  });
}

function uMedium(selectedData = null, grdString = null){
  $('#'+updateFilterType+'_loadNext_grade').attr("disabled", true);

  if(grdString != null){
    gradesString = grdString;
  }else{
    var selectedGrades = $('#'+updateFilterType+'_grade').val();
    var grades = [];
    $.each(selectedGrades, function( index, value ) {
      var val = value.split(",");
      grades[index] = val[0];
    });

    gradesString = grades.toString();
  }

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $.ajax({
      url: app_admin_url+'/medium',
      type: "POST",
      data: {
        grade_ids : gradesString
      },
      beforeSend: function() {
        addLoader();
      },
      success: function(data){
        if(data != ''){
          appendUpdateFilterData(data, 'medium', 'uCheckMedium', 'uSubject', selectedData, 'language_id');
        }else{
          swall('error', 'Invalied request', 'danger', 2500, false);
        }
      },
      complete: function() {
        removeLoader();
      }
  });
}

function uSubject(selectedData = null, grdString = null, langString = null){
  $('#'+updateFilterType+'_loadNext_medium').attr("disabled", true);

  if(grdString != null){
    gradesString = grdString;
  }else{
    var selectedGrades = $('#'+updateFilterType+'_grade').val();
    var grades = [];
    $.each(selectedGrades, function( index, value ) {
      var val = value.split(",");
      grades[index] = val[0];
    });
  
    gradesString = grades.toString();
  }

  if(langString != null){
    mediumString = langString;
  }else{
    var selectedMedium = $('#'+updateFilterType+'_medium').val();
    var mediums = [];
    $.each(selectedMedium, function( index, value ) {
      var val = value.split(",");
      mediums[index] = val[0];
    });

    mediumString = mediums.toString();
  }

  if(updateFilterType == 'update_live'){
    uClasses(gradesString, mediumString, selectedData);
  }

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $.ajax({
      url: app_admin_url+'/subject',
      type: "POST",
      data: {
        grade_ids : gradesString,
        medium_ids : mediumString
      },
      beforeSend: function() {
        addLoader();
      },
      success: function(data){
        console.log(data);
        if(data != ''){
          appendUpdateFilterData(data, 'subject', 'uCheckSubject', 'uChapter', selectedData, 'subject_id');
        }else{
          swall('error', 'Invalied request', 'danger', 2500, false);
        }
      },
      complete: function() {
        removeLoader();
      }
  });
}

function uClasses(selectedGrades = null, selectedMedium = null, selectedData = null){
  $('#'+updateFilterType+'_loadNext_grade').attr("disabled", true);

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $.ajax({
      url: app_admin_url+'/class',
      type: "POST",
      data: {
        grade_ids : selectedGrades,
        medium_ids : selectedMedium
      },
      beforeSend: function() {
        addLoader();
      },
      success: function(data){
        if(data != ''){
          var content = '<div id="row_class" class="row">'+
          '<div class="col-md-8">'+
          '<div class="form-group">'+
          '<label for="description">Classes</label>'+
          '<select class="form-control select2" multiple="multiple" data-placeholder="Select the classes" id="classes" name="classes[]" style="width: 100%;">';
          for(i = 0; i < data.length; i++){
            data[i]['selected'] = false;
            if(selectedData != null){
              if(selectedData['class'].length > 0){
                for(j = 0; j < selectedData['class'].length; j++){
                  if(selectedData['class'][j]['class_id'] == data[i]['id']){
                    data[i]['selected'] = true;
                  }
                }
              }
            }

            if(data[i]['selected'] != false){
              content += '<option value="'+data[i]['id']+','+data[i]['value']+'" selected>'+data[i]['value']+'</option>';
            }else{
              content += '<option value="'+data[i]['id']+','+data[i]['value']+'">'+data[i]['value']+'</option>';
            }
          }

          content += '</select>'+
          '</div>'+
          '</div>'+
          '</div>';
          
          if(updateFilterType == 'update_live'){
            $("#"+updateFilterType+"LoadFilters #class").append(content);
          }else if(updateFilterType == 'update_upload'){
            $("#uupCls").append(content);
          }
          
          $('.select2').select2();
        }else{
          swall('error', 'Invalied request', 'danger', 2500, false);
        }
      },
      complete: function() {
        removeLoader();
      }
  });
}

function uChapter(selectedData = null, grdString = null, langString = null, subjString = null){
  $('#'+updateFilterType+'_loadNext_subject').attr("disabled", true);

  if(grdString != null){
    gradesString = grdString;
  }else{
    var selectedGrades = $('#'+updateFilterType+'_grade').val();
    var grades = [];
    $.each(selectedGrades, function( index, value ) {
      var val = value.split(",");
      grades[index] = val[0];
    });

    gradesString = grades.toString();
  }

  if(langString != null){
    mediumString = langString;
  }else{
    var selectedMedium = $('#'+updateFilterType+'_medium').val();
    var mediums = [];
    $.each(selectedMedium, function( index, value ) {
      var val = value.split(",");
      mediums[index] = val[0];
    });

    mediumString = mediums.toString();
  }

  if(subjString != null){
    subjectString = subjString;
  }else{
    var selectedSubjects = $('#'+updateFilterType+'_subject').val();
    var subjects = [];
    $.each(selectedSubjects, function( index, value ) {
      var val = value.split(",");
      subjects[index] = val[0];
    });

    subjectString = subjects.toString();
  }

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $.ajax({
      url: app_admin_url+'/chapter',
      type: "POST",
      data: {
        grade_ids : gradesString,
        medium_ids : mediumString,
        subject_ids : subjectString
      },
      beforeSend: function() {
        addLoader();
      },
      success: function(data){
        if(data != ''){
          appendUpdateFilterData(data, 'chapter', 'uCheckChapter', 'uUnit', selectedData, 'chapter_id');
        }
        // else{
        //   swall('error', 'Invalied request', 'danger', 2500, false);
        // }
      },
      complete: function() {
        removeLoader();
      }
  });
}

function uUnit(selectedData = null, chapString = null){
  $('#'+updateFilterType+'_loadNext_chapter').attr("disabled", true);

  if(chapString != null){
    chapterString = chapString;
  }else{
    var selectedchapters = $('#'+updateFilterType+'_chapter').val();
    console.log(selectedchapters);
    var chapters = [];
    $.each(selectedchapters, function( index, value ) {
      var val = value.split(",");
      chapters[index] = val[0];
    });

    chapterString = chapters.toString();
  }

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $.ajax({
      url: app_admin_url+'/unit',
      type: "POST",
      data: {
        chapter_ids : chapterString,
      },
      beforeSend: function() {
        addLoader();
      },
      success: function(data){
        if(data != ''){
          appendUpdateFilterData(data, 'unit', 'uCheckUnit', null, selectedData, 'unit_id');
        }
        // else{
        //   swall('error', 'Invalied request', 'danger', 2500, false);
        // }
      },
      complete: function() {
        removeLoader();
      }
  });
}

function getMediaPriceById(mediaId){
  ret_data = 0.00;
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $.ajax({
      url: app_admin_url+'/get-media-price-by-id',
      type: "POST",
      async: false,
      data: {
        media_id : mediaId,
      },
      beforeSend: function() {

      },
      success: function(data){
        ret_data = data;
        if(data != ''){
          ret_data = parseFloat(data.price).toFixed(2);
        }
      },
      complete: function() {
        
      }
  });

  return ret_data;
}