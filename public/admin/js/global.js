var filterType;

$(function () {
  $('.select2').select2()
})

$(document).ready(function () {
  bsCustomFileInput.init();
});

$(function() {
  $('#toggle-event').change(function() {
    if($(this).prop('checked') == true){
      $('#shaduleData').css('display', 'block');
      $(this).val(1);
      document.getElementById("streamSheduleSubmit").innerHTML="Lets Shadule";
    }else{
      $('#shaduleData').css('display', 'none');
      $(this).val(0);
      document.getElementById("streamSheduleSubmit").innerHTML="Lets Go";
    }
  })
})

// $('#shaduleDate').datetimepicker({
//     format: 'L'
// });

$("#shaduleDate").datetimepicker({
  format: 'YYYY-MM-DD',
  //format: 'DD-MM-YYYY',
  defaultDate: new Date(),
});

$('#shaduleTime').datetimepicker({
  format: 'LT'
})

function mediaLike(id, type){
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $.ajax({
    url: app_admin_url+'/media/like',
    type: "POST",
    data: {
      'media_id' : id,
      'type' : type
    },
    success: function(data){
      loadVoteButtons(id, type, data);
    }
  });
}

function mediaRemoveLike(id, type){
  console.log(id);
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $.ajax({
    url: app_admin_url+'/media/remove-like',
    type: "POST",
    data: {
      'media_id' : id,
      'type' : type
    },
    success: function(data){
      loadVoteButtons(id, type, data);
    }
  });
}

function mediaDisLike(id, type){
  console.log(id);
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $.ajax({
    url: app_admin_url+'/media/dislike',
    type: "POST",
    data: {
      'media_id' : id,
      'type' : type
    },
    success: function(data){
      loadVoteButtons(id, type, data);
    }
  });
}

function mediaRemoveDisLike(id, type){
  console.log(id);
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $.ajax({
    url: app_admin_url+'/media/remove-dislike',
    type: "POST",
    data: {
      'media_id' : id,
      'type' : type
    },
    success: function(data){
      loadVoteButtons(id, type, data);
    }
  });
}

function loadVoteButtons(id, type, data){
  var func_one;
  var func_two;
  var colour_one;
  var colour_two;

  if(type == 1){
    func_one = 'mediaRemoveLike';
    func_two = 'mediaDisLike';
    colour_one = '#ff0000';
    colour_two = '#6c757d';
    vtype1 = 2;
    vtype2 = 3;
  }else if(type == 2){
    func_one = 'mediaLike';
    func_two = 'mediaDisLike';  
    colour_one = '#6c757d'; 
    colour_two = '#6c757d';
    vtype1 = 1;
    vtype2 = 3;
  }else if(type == 3){
    func_one = 'mediaLike';
    func_two = 'mediaRemoveDisLike';
    colour_one = '#6c757d';
    colour_two = '#ff0000';
    vtype1 = 1;
    vtype2 = 4;
  }else if(type == 4){
    func_one = 'mediaLike';
    func_two = 'mediaDisLike';   
    colour_one = '#6c757d';
    colour_two = '#6c757d';
    vtype1 = 1;
    vtype2 = 3;
  }

  var voteButtons = '<button id="mlike" class="text-gray" style="border: 0; color: #0f66b3; !important" onclick="'+func_one+'('+id+', '+vtype1+');"><i class="fa fa-thumbs-up fa-1x" style="color: '+colour_one+';"></i><span id="likeCount" style="font-size: 1rem;"> '+data['like']+'</span></button>'+
                '<button id="mdislike" class="text-gray" style="border: 0;" onclick="'+func_two+'('+id+', '+vtype2+');"><i class="fa fa-thumbs-down fa-1x" style="-webkit-transform: scaleX(-1); transform: scaleX(-1); color:'+colour_two+'"></i><span id="dislikeCount" style="font-size: 1rem;"> '+data['dislike']+'</span></button>';

  $("#voteButtons").html("");
  $("#voteButtons").html(voteButtons);
}

function mediaShare(id){
  $('#shareModel').modal('show'); 
  console.log(id);
}

function mediaAddToList(id){
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $.ajax({
    url: app_admin_url+'/media/add-to-list',
    type: "POST",
    data: {
      'media_id' : id
    },
    success: function(data){
      $('#addToMediaList .fa-outdent').css('color', '#ff0000');
    }
  });
}

function uploadMediaType(){
  var val = $("#umedia_type").val();
  if(val != ''){
    $('#fileRow').css('display', 'block');
    $('#uploadStatus').html('');
  }else{
    $('#fileRow').css('display', 'none');
  }
}

function uploadMediaFileValidate(){
  var size = $("#file")[0].files[0].size;
  size = size / 1024;
  size = size / 1024;
  if(size > 10240){
    $('#uploadStatus').html('<p style="color:#EA4335;">File too large, please select a file less than 10 GB.</p>');
  } else{
    uploadMediaFile();
  }
}

function uploadMediaFile(){
  var file_data = $("#file").prop("files")[0];
  var media_type = $('#umedia_type').val();
  var formData = new FormData();
  formData.append("file", file_data);
  formData.append("media_type", media_type);
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $.ajax({
    xhr: function() {
        var xhr = new window.XMLHttpRequest();
        console.log(xhr);
        xhr.upload.addEventListener("progress", function(evt) {
          console.log(evt);
            if (evt.lengthComputable) {
              
                var percentComplete = ((evt.loaded / evt.total) * 100);
                percentComplete = Math.round(percentComplete);
                $(".progress-bar").width(percentComplete+'%');
                $(".progress-bar").html(percentComplete+'%');
            }
        }, false);
        return xhr;
    },
    type: 'POST',
    url: app_admin_url+'/media/file/upload',
    data: formData,
    contentType: false,
    //cache: false,
    processData:false,
    beforeSend: function(){
        $(".progress-bar").width('0%');
        $('#umedia_type').attr("disabled", true);
        $('#file').attr("disabled", true);
        $('#fileUploadProgressRow').css('display', 'flex');
    },
    error:function(xhr){
      console.log(xhr);
        $('#uploadStatus').html('<p style="color:#EA4335;">'+xhr.responseJSON.errors.file[0]+'</p>');
        $(".progress-bar").width('0%');
    },
    success: function(data){
      if(data['code'] && data['url']){
        $("#upload_url").val(data['url']);
        $("#upload_code").val(data['code']);
        $("#upmedia_type").val(media_type);
        $('#mediaUploadSubmit').removeAttr("disabled");
        $('#uploadStatus').html('<p style="color:#28A74B;">File has uploaded successfully!</p>');
      }else{

        //$(".progress-bar").width('0%');
        //$(".progress-bar").html('0%');
        $('#fileUploadProgressRow').css('display', 'none');
        $('#uploadStatus').html('<p style="color:#EA4335;">Please select a valid file to upload.</p>');
      }
    }
  });
}

function clearUploadMediaFile(){
  $('#fileRow').css('display', 'none');
  $('#uploadStatus').html('');
  $('#umedia_type').attr("disabled", false);
  $('#file').attr("disabled", false);
  $('#fileUploadProgressRow').css('display', 'none');
  $("#umedia_type").prop("selectedIndex", 0).change();
  //$('#mediaUploadSubmit').attr("disabled", true);
  //api call for remove file
}

function publishingMediaType(){
  var val = $("#upublish_type").val();
  if(val == 1){
    $('#scRow').css('display', 'block');
    $('#uprice').attr("disabled", false);
    $('#afRow').css('display', 'none');
  }else if(val == 2){
    $('#scRow').css('display', 'none');
    $('#uprice').attr("disabled", true);
    $('#afRow').css('display', 'block');
  }else{
    $('#scRow').css('display', 'none');
    $('#uprice').attr("disabled", true);
    $('#afRow').css('display', 'none');
  }

  // var scAppend = '<label>Date *</label>'+
  //                 '<div class="input-group date" id="shaduleDate" data-target-input="nearest">'+
  //                   '<input type="text" class="form-control datetimepicker-input" data-target="#shaduleDate" name="shedule_date"/>'+
  //                   '<div class="input-group-append" data-target="#shaduleDate" data-toggle="datetimepicker">'+
  //                       '<div class="input-group-text"><i class="fa fa-calendar"></i></div>'+
  //                   '</div>'+
  //               '</div>';
  // if(val == 1){
  //   $('#scRow').css('display', 'block');
  // }
}

function livePublishingMediaType(){
  var val = $("#live_publish_type").val();
  console.log(val);
  if(val == 1){
    $('#lscRow').css('display', 'block');
    $('#live_price').attr("disabled", false);
  }else{
    $('#lscRow').css('display', 'none');
    $('#live_price').attr("disabled", true);
  }
}

$(document).ready(function () {
  $('.mclosebutton').click(function () {
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
          if(filterType == 'upload'){
            $('#upload').modal('hide');
          }else if(filterType == 'live'){
            $('#live').modal('hide');
          }
        }
      })
  });

  //Create Video Upload
  $('#mediaUpload').submit(function (event) {
    event.preventDefault();
    var formData = new FormData(this);
    var url = $('#mediaUpload').attr('action'); 
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
        //$('#mediaUploadSubmit').attr("disabled", true);
      },
      error:function(err){
        var errList = '';
        var errors = err.responseJSON.errors;
        $.each(errors, function(key, value) {
          errList += value[0]+'<br>';
        });
        swal.fire(
          'Upload Video!',
          errList,
          'error'
        )
      },
      success: function(data){
        if(data != false){
          swall('Sucess', 'Video sucessfully uploaded', 'success', 2500, false);
          $("#mediaUpload").trigger("reset");
          //$('#mediaUploadSubmit').attr("disabled", false);
          setTimeout(function () {
            window.location.replace(app_admin_url+'/channel/uploads');
          },2600);
        }else{
         swall('error', 'Video uploading error', 'danger', 2500, false);
        }
      },
      complete: function(){
        removeLoader();
      },
    });
  })

  //Create Live Stream
  $('#streamShedule').submit(function (event) {
    event.preventDefault();
    var formData = new FormData(this);
    console.log(formData);
    var url = $('#streamShedule').attr('action'); 
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
        //$('#streamSheduleSubmit').attr("disabled", true);
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
        if(data != false){
          swall('Sucess', 'Schedule sucessfully submited', 'success', 2500, false);
          $("#streamShedule").trigger("reset");
          //$('#streamSheduleSubmit').attr("disabled", false);
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

  $('input:radio[name=avalable_for]').change(function() {
    if(this.value == 1){
      var selectedGrades = [];
      $.each($('#'+filterType+'_grade'), function(){            
        selectedGrades.push($(this).val());
      });

      if(selectedGrades != ''){
        var selectedMedium = [];
        $.each($('#'+filterType+'_medium'), function(){            
          selectedMedium.push($(this).val());
        });

        if(selectedMedium != ''){
          var selectedGrades = $('#'+filterType+'_grade').val();
          var grades = [];
          $.each(selectedGrades, function( index, value ) {
            var val = value.split(",");
            grades[index] = val[0];
          });

          gradesString = grades.toString();

          var selectedMedium = $('#'+filterType+'_medium').val();
          var mediums = [];
          $.each(selectedMedium, function( index, value ) {
            var val = value.split(",");
            mediums[index] = val[0];
          });

          mediumString = mediums.toString();
          
          classes(gradesString, mediumString);
        }else{
          $('input:radio[name=avalable_for]').prop('checked', false);
          swall('error', 'Please select Medium', 'danger', 2500, false);
        }
      }else{
        $('input:radio[name=avalable_for]').prop('checked', false);
        swall('error', 'Please select Grade', 'danger', 2500, false);
      }    
    }else if (this.value == 2) {
      $('#upCls').html('');
    }else if (this.value == 3) {
      $('#upCls').html('');
    }
  });
})

function loadVideoUploadModel(){
  filterType = 'upload';
  $("#mediaUpload").trigger("reset");
  $("#uploadLoadFilters").html("");
  $('#fileRow').css('display', 'none');
  $('#file').attr("disabled", false);
  $('#umedia_type').attr("disabled", false);
  $('#scRow').css('display', 'none');
  $('#afRow').css('display', 'none');
  $("#classes").prop("selectedIndex", 0).change();
  $("#upCls").html("");
  $('#upload').modal({backdrop: 'static', keyboard: false});
  $('#upload').modal('show');
  grade();
  
}

function loadGoLiveModel(){
  filterType = 'live';
  $("#streamShedule").trigger("reset");
  $("#liveLoadFilters").html("");
  $('#shaduleData').css('display', 'none');
  $("#toggle-event").prop("checked", false);
  //$("#toggle-event").parent().addClass('toggle-off');
  //toggle-off
  $('#live').modal({backdrop: 'static', keyboard: false});
  $('#live').modal('show');
  grade();
}

function checkGrade(){
  var selectedGrades = $('#'+filterType+'_grade').val();
  console.log(selectedGrades);
  $("#"+filterType+"row_medium").remove();
  $("#"+filterType+"row_subject").remove();
  $("#"+filterType+"row_chapter").remove();
  $("#"+filterType+"row_unit").remove();
  $("#row_class").remove();
  if(selectedGrades != ''){
    $('#'+filterType+'_loadNext_grade').attr("disabled", false);
  }else{
    $('#'+filterType+'_loadNext_grade').attr("disabled", true);
  }
}

function checkMedium(){
  var selectedMediums = $('#'+filterType+'_medium').val();
  $("#"+filterType+"row_subject").remove();
  $("#"+filterType+"row_chapter").remove();
  $("#"+filterType+"row_unit").remove();
  $("#row_class").remove();
  if(selectedMediums != ''){
    $('#'+filterType+'_loadNext_medium').attr("disabled", false);
  }else{
    $('#'+filterType+'_loadNext_medium').attr("disabled", true);
  }
}

function checkSubject(){
  var selectedSubjects = $('#'+filterType+'_subject').val();
  $("#"+filterType+"row_chapter").remove();
  $("#"+filterType+"row_unit").remove();
  if(selectedSubjects != ''){
    $('#'+filterType+'_loadNext_subject').attr("disabled", false);
  }else{
    $('#'+filterType+'_loadNext_subject').attr("disabled", true);
  }
}

function checkChapter(){
  var selectedSubjects = $('#'+filterType+'_chapter').val();
  $("#"+filterType+"row_unit").remove();
  if(selectedSubjects != ''){
    $('#'+filterType+'_loadNext_chapter').attr("disabled", false);
  }else{
    $('#'+filterType+'_loadNext_chapter').attr("disabled", true);
  }
}

function checkUnit(){
  var selectedUnits = $('#'+filterType+'_unit').val();
  if(selectedUnits != ''){
    $('#'+filterType+'_loadNext_unit').attr("disabled", false);
  }else{
    $('#'+filterType+'_loadNext_unit').attr("disabled", true);
  }
}

function appendFilterData(data, label, loadButton, nextLoad = null){
  var content = '<div id="'+filterType+'row_'+label+'" class="row">'+
  '<div class="col-md-10">'+
  '<div class="form-group">'+
  '<label>'+label+' *</label>'+
  '<select class="form-control select2" multiple="multiple" data-placeholder="Select the '+label+'" id="'+filterType+'_'+label+'" name="'+filterType+'_'+label+'[]" style="width: 100%;" onchange="'+loadButton+'();">';
  for(i = 0; i < data.length; i++){
    content += '<option value="'+data[i]['id']+','+data[i]['value']+'">'+data[i]['value']+'</option>';
  }

  content += '</select>'+
  '</div>'+
  '</div>'+
  '<div class="col-md-2" style="margin-top: 30px;">';
  if(nextLoad != null){
    content += '<button type="button" disabled id="'+filterType+'_loadNext_'+label+'" class="btn btn-app" style="padding: 10px; height: 40px; width: 60px;" onclick="'+nextLoad+'();">';
  }else{
    content += '<button type="button" disabled id="'+filterType+'_loadNext_"'+label+' class="btn btn-app" style="padding: 10px; height: 40px; width: 60px;">';
  }
  
  content += '<i class="fas fa-check"></i>'+
  '</button>'+
  '</div>'+
  '</div>';

  $("#"+filterType+"LoadFilters").append(content);
  $('.select2').select2();
}
    
function grade(){
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
        addLoader();
      },
      success: function(data){
        if(data != ''){
          console.log(data);
          appendFilterData(data, 'grade', 'checkGrade', 'medium');
        }else{
          swall('error', 'Invalied request', 'danger', 2500, false);
        }
      },
      complete: function() {
        removeLoader();
      }
  });
}

function medium(){
  //var selectedGrades = $('#'+filterType+'_grade').val().join(",");
  var selectedGrades = $('#'+filterType+'_grade').val();
  var grades = [];
  $.each(selectedGrades, function( index, value ) {
    var val = value.split(",");
    grades[index] = val[0];
  });

  gradesString = grades.toString();
  $('#'+filterType+'_loadNext_grade').attr("disabled", true);
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
          appendFilterData(data, 'medium', 'checkMedium', 'subject');
        }else{
          swall('error', 'Invalied request', 'danger', 2500, false);
        }
      },
      complete: function() {
        removeLoader();
      }
  });
}

function subject(){
  $('#'+filterType+'_loadNext_medium').attr("disabled", true);
  //var selectedGrades = $('#'+filterType+'_grade').val().join(",");
  //var selectedMedium = $('#'+filterType+'_medium').val().join(",");

  var selectedGrades = $('#'+filterType+'_grade').val();
  var grades = [];
  $.each(selectedGrades, function( index, value ) {
    var val = value.split(",");
    grades[index] = val[0];
  });

  gradesString = grades.toString();

  var selectedMedium = $('#'+filterType+'_medium').val();
  var mediums = [];
  $.each(selectedMedium, function( index, value ) {
    var val = value.split(",");
    mediums[index] = val[0];
  });

  mediumString = mediums.toString();

  if(filterType == 'live'){
    classes(gradesString, mediumString);
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
        if(data != ''){
          appendFilterData(data, 'subject', 'checkSubject', 'chapter');
        }else{
          swall('error', 'Invalied request', 'danger', 2500, false);
        }
      },
      complete: function() {
        removeLoader();
      }
  });
}

function classes(selectedGrades, selectedMedium){
  $('#'+filterType+'_loadNext_grade').attr("disabled", true);
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
            content += '<option value="'+data[i]['id']+','+data[i]['value']+'">'+data[i]['value']+'</option>';
          }

          content += '</select>'+
          '</div>'+
          '</div>'+
          '</div>';
          
          if(filterType == 'live'){
            $("#"+filterType+"LoadFilters").append(content);
          }else if(filterType == 'upload'){
            $("#upCls").append(content);
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

function chapter(){
  $('#'+filterType+'_loadNext_subject').attr("disabled", true);
  //var selectedGrades = $('#'+filterType+'_grade').val().join(",");
  //var selectedMedium = $('#'+filterType+'_medium').val().join(",");
  //var selectedSubjects = $('#'+filterType+'_subject').val().join(",");

  var selectedGrades = $('#'+filterType+'_grade').val();
  var grades = [];
  $.each(selectedGrades, function( index, value ) {
    var val = value.split(",");
    grades[index] = val[0];
  });

  gradesString = grades.toString();

  var selectedMedium = $('#'+filterType+'_medium').val();
  var mediums = [];
  $.each(selectedMedium, function( index, value ) {
    var val = value.split(",");
    mediums[index] = val[0];
  });

  mediumString = mediums.toString();

  var selectedSubjects = $('#'+filterType+'_subject').val();
  var subjects = [];
  $.each(selectedSubjects, function( index, value ) {
    var val = value.split(",");
    subjects[index] = val[0];
  });

  subjectString = subjects.toString();


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
          appendFilterData(data, 'chapter', 'checkChapter', 'unit');
        }else{
          swall('error', 'Invalied request', 'danger', 2500, false);
        }
      },
      complete: function() {
        removeLoader();
      }
  });
}

function unit(){
  $('#'+filterType+'_loadNext_chapter').attr("disabled", true);
  //var selectedchapters = $('#'+filterType+'_chapter').val().join(",");

  var selectedchapters = $('#'+filterType+'_chapter').val();
  var chapters = [];
  $.each(selectedchapters, function( index, value ) {
    var val = value.split(",");
    chapters[index] = val[0];
  });

  chapterString = chapters.toString();

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
          appendFilterData(data, 'unit', 'checkUnit');
        }else{
          swall('error', 'Invalied request', 'danger', 2500, false);
        }
      },
      complete: function() {
        removeLoader();
      }
  });
}

function swall(title, text, type, timer, showConfirmButton){
  swal.fire({
    title: title,
    text: text,
    icon: type,
    timer: timer,
    showConfirmButton: showConfirmButton,
  });
}

function addLoader(){
  $('body').append('<div style="" id="loadingDiv"><div class="loader">Loading...</div></div>');
}

function removeLoader(){
  $( "#loadingDiv" ).fadeOut();
  $( "#loadingDiv" ).remove(); 
}



//$('#upload').on('hidden.bs.modal', function () {
  //event.preventDefault();
  // Swal.fire({
  //   title: 'Are you sure?',
  //   text: "You won't be close this!",
  //   icon: 'warning',
  //   showCancelButton: true,
  //   confirmButtonColor: '#3085d6',
  //   cancelButtonColor: '#d33',
  //   confirmButtonText: 'Yes, delete it!'
  // }).then((result) => {
  //   if (result.isConfirmed) {

  //     console.log('211212')




  //     // Swal.fire(
  //     //   'Deleted!',
  //     //   'Your file has been deleted.',
  //     //   'success'
  //     // )
  //   }
  // })
  //console.log('cxcxcxxc');
//})


/*function swallWithConfirm(title, text, icon, confirmButtonText){
  swal.fire({
    title: title,
    text: text,
    icon: icon,
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: confirmButtonText
  }).then((result) => {
    console.log(result);
    if (result.isConfirmed) {

      swal.fire(
        'Deleted!',
        'Your file has been deleted.',
        'success'
      )
    }
  })

  // Swal.fire({
  //   title: title,
  //   text: text,
  //   icon: icon,
  //   showCancelButton: true,
  //   confirmButtonColor: '#3085d6',
  //   cancelButtonColor: '#d33',
  //   confirmButtonText: confirmButtonText
  // }).then((result) => {
  //   if (result.isConfirmed) {
  //     Swal.fire(
  //       'Deleted!',
  //       'Your file has been deleted.',
  //       'success'
  //     )
  //   }
  // })
}*/

//function swalWithConfirmTwo(title, text, icon, confirmButtonText = null, cancelButtonText = null, confirmTitle = null, confirmText = null, confirmType = null, cancleTitle = null, cancleText = null, cancleType = null){
function swalWithConfirmTwo(){
/*  console.log('dsddsds2343432fghfghfg');


  const swalWithBootstrapButtons = swal.mixin({
  customClass: {
    confirmButton: 'btn btn-success',
    cancelButton: 'btn btn-danger'
  },
  buttonsStyling: false
})

swalWithBootstrapButtons.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  cancelButtonText: 'No, cancel!',
  confirmButtonText: 'Yes, delete it!',
  reverseButtons: true
}).then((result) => {
  if (result.isConfirmed) {
    swalWithBootstrapButtons.fire(
      'Deleted!',
      'Your file has been deleted.',
      'success'
    )
  } else if (
    // Read more about handling dismissals below 
    result.dismiss === Swal.DismissReason.cancel
  ) {
    swalWithBootstrapButtons.fire(
      'Cancelled',
      'Your imaginary file is safe :)',
      'error'
    )
  }
})*/
  
  
  
  
  /*const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
      confirmButton: 'btn btn-success',
      cancelButton: 'btn btn-danger'
    },
    buttonsStyling: false
  })
  
  swalWithBootstrapButtons.fire({
    title: title,
    text: text,
    icon: icon,
    showCancelButton: true,
    confirmButtonText: confirmButtonText,
    cancelButtonText: cancelButtonText,
    reverseButtons: true
  }).then((result) => {
    if (result.isConfirmed) {
      swalWithBootstrapButtons.fire(
        confirmTitle,
        confirmText,
        confirmType
      )
    } else if (
      //Read more about handling dismissals below
      result.dismiss === Swal.DismissReason.cancel
    ) {
      swalWithBootstrapButtons.fire(
        cancleTitle,
        cancleText,
        cancleType
      )
    }
  })*/
}