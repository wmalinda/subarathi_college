//var keys = [];
var commentButton = false;

$(document).ready(function () {
  loadComments();
})

function textAreaAdjust(o) {
  o.style.height = "1px";
  o.style.height = (25+o.scrollHeight)+"px";
}

$('.pubbliccommentarea').click(function(){
  var id = $(this).attr("id");
  var pid = $(this).parent().attr("id");
  console.log(id, pid);
  if(commentButton != true){
    addCommentButtons(pid, 0);
    commentButton = true;
  }
})

function addCommentButtons(parent, parentid){
  var comment_submit = '<button id="mainCommentSubmit" type="button" class="btn btn-info float-right" style="margin-left: 20px;" onclick="submitComment('+parent.trim()+', '+parentid+');">Comment</button>'+
    '<button type="button" class="btn btn-default float-right" onclick="cancleComment('+parent.trim()+', '+parentid+');">Cancle</button>';
    $("#"+parent+" #commentButtonArea").append(comment_submit);
}

function cancleComment(parent, parentid){
  var pid = $(parent).attr("id");
  $("#"+pid+" #commentButtonArea").html("");
  $("#pubbliccomment").val("")
  $('#pubbliccomment').css('height', 'auto');
  if(pid == 'pcad'){
    commentButton = false;
  }
}

function submitComment(parent, parentid){
  var pid = $(parent).attr("id");
  var val = $("#"+pid+" #pubbliccomment").val();
  var mid = $("#mid").val();
  $('#mainCommentSubmit').attr("disabled", true);
  if(val != ''){
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
  
    $.ajax({
      url: app_admin_url+'/media/add-comment',
      type: "POST",
      data: {
        'media_id' : mid,
        'comment' : val,
        'parent_id' : parentid
      },
      beforeSend: function() {
        //addLoader();
      },
      success: function(data){
        if(data ==true){
          cancleComment(parent);

          loadComments();
          //swall('Success', 'Comment sucessfully submited', 'success', 2500, false);
        }
      },
      complete: function() {
        //removeLoader();
      }
    });
  }else{
    //swall('Fail', 'Comment area is empty', 'danger', 2500, false);

    // $("#"+pid+" #pubbliccomment").css('border', '1px solid red');
    // $("#"+pid+" #pubbliccommenterr").html('Please add comment before submit');
    // $("#"+pid+" #pubbliccommenterr").css('colour', 'red');
    // setTimeout(function () {
    //   $("#"+pid+" #pubbliccomment").css('border', '1px solid');
    //   $("#"+pid+" #pubbliccommenterr").html('');
    //   $("#"+pid+" #pubbliccommenterr").css('colour', '#000');
    // },5000);
  }
}

function showSubCommentArea(area_id){
  $('#commentButtonList_'+area_id).css('display', 'block');
}

function hideSubComment(area_id){
  $('#commenttree_'+area_id).val("");
  $('#commenttree_'+area_id).css('height', 'auto');
  $('#commentButtonList_'+area_id).css('display', 'none');
}


function submitSubComment(id, parentid){
  var val = $("#commenttree_"+id).val();
  var mid = $("#mid").val();
  $('#Comment_'+id).attr("disabled", true);
  if(val != ''){
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
  
    $.ajax({
      url: app_admin_url+'/media/add-comment',
      type: "POST",
      data: {
        'media_id' : mid,
        'comment' : val,
        'parent_id' : parentid
      },
      beforeSend: function() {
        //addLoader();
      },
      success: function(data){
        if(data == true){
          cancleComment(parent);
          loadComments();
          //swall('Success', 'Comment sucessfully submited', 'success', 2500, false);
        }
      },
      complete: function() {
        //removeLoader();
      }
    });
  }else{
    //swall('Fail', 'Comment area is empty', 'danger', 2500, false);
  }
}

function loadComments(){
  $("#commentContentSection").html("");
  var mid = $("#mid").val();
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $.ajax({
    url: app_admin_url+'/media/load-comment-section',
    type: "POST",
    data: {
      'media_id' : mid
    },
    success: function(data){
      if(data){
        var data_result = JSON.parse(data);
        $("#commentCount").html(data_result.count+' Comments');
        if(data_result != '' && data_result.count > 0){
          var content = '';
          for(i = 0; i < data_result.comment.length; i++){
            fname = (data_result[i].member.first_name != '') ? data_result[i].member.first_name :'';
            lname = (data_result[i].member.last_name != '') ? data_result[i].member.last_name :'';
            fname = fname+ ' '+lname;
            var image = (data_result[i].member_details.profile_image != '') ? data_result[i].member_details.profile_image :app_url+"/img/dummy-user.jpg";

            content += '<div class="post">'+
                '<div class="user-block" style="margin-bottom: 5px;">'+
                  '<img class="img-circle img-bordered-sm" src="'+image+'" alt="user image">'+
                  '<span class="username">'+
                    // '<a href="#">'+data_result[i]['member'].mobile+'</a>'+
                    '<a href="#">'+fname+'</a>'+
                  '</span>'+
                  '<span class="description">Shared publicly - '+data_result[i]['published_date']+'</span>'+
                '</div>'+
                '<p style="margin-left: 3rem; margin-bottom: 0px;">'+data_result[i]['comment']+'</p>'+
                '<button id="reply_'+data_result[i]['id']+'" type="button" class="btn" style="margin-left: 3rem; padding: 0;" onclick="showSubCommentArea('+data_result[i]['id']+');">Reply</button>'+
                '<div id="commentButtonList_'+data_result[i]['id']+'" style="margin-left: 3rem; text-align: right; display: none;">'+
                    '<textarea id="commenttree_'+data_result[i]['id']+'" name="commenttree_'+data_result[i]['id']+'" class="form-control form-control-sm pubbliccommentarea" rows="1" placeholder=" Add a pubblic comment" onkeyup="textAreaAdjust(this)" style="overflow:hidden; width: 100%; margin-bottom: 10px;"></textarea>'+
                    '<button id="cancle_'+data_result[i]['id']+'" type="button" class="btn btn-sm btn-default" onclick="hideSubComment('+data_result[i]['id']+');">Cancle</button>'+
                    '<button id="Comment_'+data_result[i]['id']+'" type="button" class="btn btn-sm btn-info" style="margin-left: 15px;" onclick="submitSubComment('+data_result[i]['id']+', '+data_result[i]['id']+');">Comment</button>'+
                '</div>';

              if(data_result[i]['_children']){
                var childrens = data_result[i]['_children'];
                content += '<div id="subCommentContentSection" style="margin-top: 25px; margin-bottom: 25px; margin-left: 3rem;">';
                content += '<a id="scss_'+data_result[i]['id']+'" href="" onclick="showSubArea('+data_result[i]['id']+');"><i class="fa fa-caret-down" style="margin-right: 1rem;"></i>  View '+childrens.length+' reply</a>';
                content += '<a id="scsh_'+data_result[i]['id']+'" href="" onclick="hideSubArea('+data_result[i]['id']+');" style="display:none;"><i class="fa fa-caret-up" style="margin-right: 1rem;"></i>  Hide reply</a>';

                content += '<div id="scs_'+data_result[i]['id']+'" style="display: none;">';


                for(j = 0; j < childrens.length; j++){
                  cfname = (childrens[j].member.first_name != '') ? childrens[j].member.first_name :'';
                  clname = (childrens[j].member.last_name != '') ? childrens[j].member.last_name :'';
                  cfname = cfname+ ' '+clname;
                  var cimage = (childrens[j].member_details.profile_image != '') ? childrens[j].member_details.profile_image :app_url+"/img/dummy-user.jpg";
            

                  content += '<div class="post" style="border-bottom: none;">'+
                  '<div class="user-block">'+
                    '<img class="img-circle img-bordered-sm" src="'+cimage+'" alt="user image" style="height: 25px; width: 25px;">'+
                    '<span class="username">'+
                      '<a href="#">'+cfname+'</a>'+
                    '</span>'+
                    '<span class="description">Shared publicly - '+childrens[j]['published_date']+'</span>'+
                  '</div>'+
                  '<p style="margin-left: 3rem; margin-bottom: 0px;">'+childrens[j]['comment']+'</p>'+
                  '<button id="reply_'+childrens[j]['id']+'" type="button" class="btn" style="margin-left: 3rem; padding: 0;" onclick="showSubCommentArea('+childrens[j]['id']+');">Reply</button>'+
                  '<div id="commentButtonList_'+childrens[j]['id']+'" style="margin-left: 3rem; text-align: right; display: none;">'+
                    '<textarea id="commenttree_'+childrens[j]['id']+'" name="commenttree_'+childrens[j]['id']+'" class="form-control form-control-sm pubbliccommentarea" rows="1" placeholder=" Add a pubblic comment" onkeyup="textAreaAdjust(this)" style="overflow:hidden; width: 100%; margin-bottom: 10px;"></textarea>'+
                    '<button id="cancle_'+childrens[j]['id']+'" type="button" class="btn btn-sm btn-default" onclick="hideSubComment('+childrens[j]['id']+');">Cancle</button>'+
                    '<button id="Comment_'+childrens[j]['id']+'" type="button" class="btn btn-sm btn-info" style="margin-left: 15px;" onclick="submitSubComment('+childrens[j]['id']+', '+data_result[i]['id']+');">Comment</button>'+
                  '</div>'+
                  '</div>';
                }

                content += '</div>';
                content += '</div>';
              }

              content += '</div>';
          }

          $("#commentContentSection").append(content);
        }
      }
    }
  });
}

function showSubArea(id){
  event.preventDefault();
  $('#scs_'+id).css('display', 'block');
  $('#scss_'+id).css('display', 'none');
  $('#scsh_'+id).css('display', 'block');
}

function hideSubArea(id){
  event.preventDefault();
  $('#scs_'+id).css('display', 'none');
  $('#scss_'+id).css('display', 'block');
  $('#scsh_'+id).css('display', 'none');
}

function checkWalletBalance(media_id){
  var parts = window.location.href.split('/');
  var lastSegment = parts.pop() || parts.pop();
  var new_url = parts.join("/");
  var redirect_url = new_url+'/play';
  var cost = parseFloat($("#cost").val());
  var publisher_id = $("#publisher_id").val();
  if(media_id != '' && cost != '' && publisher_id != ''){
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
  
    $.ajax({
      url: app_admin_url+'/check-wallet-balance',
      type: "POST",
      data: {
        
      },
      beforeSend: function() {
        addLoader();
      },
      success: function(data){
        if(data != null && data != 0){
          var balance = parseFloat(data);
          if(cost <= balance){
            swal.fire({
              title: 'Subscription',
              text: 'Please confirm to proform this action',
              icon: 'question',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Subscribe'
            }).then((result) => {
              if(result.isConfirmed){
                $.ajaxSetup({
                  headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
                });
      
                $.ajax({
                  url: app_admin_url+'/media/subscribe',
                  type: "POST",
                  data: {
                    'media_id' : media_id,
                    'publisher_id' : publisher_id,
                    'price' : cost
                  },
                  beforeSend: function() {
                    addLoader();
                  },
                  success: function(data){
                    if(data == true){
                      swal.fire(
                        'Subscribe!',
                        'Your are sucessfully subscribed this media !',
                        'success'
                      );

                      setTimeout(function () {
                        window.location.replace(redirect_url);
                      },2600);
                    }else{
                      swal.fire(
                        'Subscribe!',
                        'Subscription fail !',
                        'error'
                      )
                    }
                  },
                  complete: function() {
                    removeLoader();
                  }
                });
              }
            })
          }else{
            swal.fire({
              icon: 'error',
              title: 'Oops...',
              html:
              'Balance amount not enough to subscrtption !' +
              'Please click this link for <a href="https://walletdemo.idesk.lk" target="_blank">Topup</a> your wallet'
            });

            location.reload();
          }
        }else{
          swal.fire({
            icon: 'error',
            title: 'Oops...',
            html:
            'Balance amount not enough to subscrtption !' +
            'Please click this link for <a href="https://walletdemo.idesk.lk" target="_blank">Topup</a> your wallet'
          });

          location.reload();
        }
      },
      complete: function() {
        removeLoader();
      }
    });
  }
}

function copy() {
  //let shareLink = document.getElementById("shareLink");
  //shareLink.select();
  var pathname = window.location.href;
  console.log(pathname);
  $('#shareLink').val(pathname);
  (document.getElementById("shareLink")).select();
  document.execCommand("copy");
}

/*function liveStreamStatusUpdate(media_id, status){
  console.log('hijklmnop');

  console.log(media_id);
  console.log(status);
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $.ajax({
    url: app_admin_url+'/live-streaming/status-update',
    type: "POST",
    data: {
      'media_id' : media_id,
      'stream_status' : status
    },
    beforeSend: function() {
      //addLoader();
    },
    success: function(data){
      console.log(data);
      if(data == true){
        
      }
    },
    complete: function() {
      //removeLoader();
    }
  });
}*/

/*function mediaSubscribe(media_id){
  var cost = parseFloat($("#cost").val());
  var balance = parseFloat($("#balance").val());
  if(media_id != '' && cost != '' && balance != ''){
    if(cost <= balance){
    //if(balance <= cost){
      swal.fire({
        title: 'Subscription',
        text: 'Please confirm to proform this action',
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Subscribe'
      }).then((result) => {
        if (result.isConfirmed) {
          $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });

          $.ajax({
            url: app_admin_url+'/media/subscribe',
            type: "POST",
            data: {
              'media_id' : media_id,
              'price' : cost
            },
            success: function(data){
              if(data == true){

                swal.fire(
                  'Subscribe!',
                  'Your are sucessfully subscribed this media !',
                  'success'
                )
              }else{
                swal.fire(
                  'Subscribe!',
                  'Subscription fail !',
                  'error'
                )
              }
            }
          });
        }
      })
    }else{
      Swal.fire({
        icon: 'error',
        title: 'Oops...',
        html:
        'Balance amount not enough to subscrtption !' +
        'Please click this link for <a href="https://walletdemo.idesk.lk" target="_blank">Topup</a> your wallet'
      })
    }
  }else{
    swall('Failure', 'Invallied request !', 'fail', 2500, false);
  }
}*/


//$('#modal').modal('toggle');

// function cancleSubComment(parent, parentid){
//   var pid = $(parent).attr("id");
//   $("#"+pid+" #commentButtonArea").html("");
//   $("#pubbliccomment").val("")
//   $('#pubbliccomment').css('height', 'auto');
//   if(pid == 'pcad'){
//     commentButton = false;
//   }
// }




// var mid = $("#mid").val();
  // $.ajaxSetup({
  //   headers: {
  //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  //   }
  // });

  // $.ajax({
  //   url: app_admin_url+'/media/load-comment-section',
  //   type: "POST",
  //   data: {
  //     'media_id' : mid
  //   },
  //   success: function(data){
  //     if(data){
  //       console.log(data);
  //       var data_result = JSON.parse(data);
  //       if(data_result != '' && data_result.length > 0){
  //         var content;
  //         for(i = 0; i < data_result.length; i++){
  //           var image = app_url+"/img/dummy-user.jpg";
  //           content += '<div class="post">'+
  //               '<div class="user-block">'+
  //                 '<img class="img-circle img-bordered-sm" src="'+image+'" alt="user image">'+
  //                 '<span class="username">'+
  //                   '<a href="#">'+data_result[i]['member'].mobile+'</a>'+
  //                 '</span>'+
  //                 '<span class="description">Shared publicly - '+data_result[i]['published_date']+'</span>'+
  //               '</div>'+
  //               '<p style="margin-left: 3rem;">'+data_result[i]['comment']+'</p>'+
  //               '<button id="reply_'+data_result[i]['id']+'" type="button" class="btn" style="margin-left: 3rem;" onclick="showSubCommentArea('+data_result[i]['id']+');">Reply</button>'+
  //               '<div id="commentButtonList_'+data_result[i]['id']+'" style="margin-left: 3rem; text-align: right; display: none;">'+
  //                   '<textarea id="commenttree_'+data_result[i]['id']+'" name="commenttree_'+data_result[i]['id']+'" class="form-control form-control-sm pubbliccommentarea" rows="1" placeholder=" Add a pubblic comment" onkeyup="textAreaAdjust(this)" style="overflow:hidden; width: 100%; margin-bottom: 10px;"></textarea>'+
  //                   '<button id="cancle_'+data_result[i]['id']+'" type="button" class="btn btn-sm btn-default" onclick="hideSubComment('+data_result[i]['id']+');">Cancle</button>'+
  //                   '<button id="Comment_'+data_result[i]['id']+'" type="button" class="btn btn-sm btn-info" style="margin-left: 15px;" onclick="submitSubComment('+data_result[i]['id']+', '+data_result[i]['id']+');">Comment</button>'+
  //               '</div>';

  //             if(data_result[i]['_children']){
  //               var childrens = data_result[i]['_children'];
  //               content += '<div id="subCommentContentSection" style="margin-top: 50px; margin-bottom: 25px; margin-left: 6rem;">';
  //               for(j = 0; j < childrens.length; j++){
  //                 content += '<div class="post" style="border-bottom: none;">'+
  //                 '<div class="user-block">'+
  //                   '<img class="img-circle img-bordered-sm" src="'+image+'" alt="user image">'+
  //                   '<span class="username">'+
  //                     '<a href="#">'+childrens[j]['member'].mobile+'</a>'+
  //                   '</span>'+
  //                   '<span class="description">Shared publicly - '+childrens[j]['published_date']+'</span>'+
  //                 '</div>'+
  //                 '<p style="margin-left: 3rem;">'+childrens[j]['comment']+'</p>'+
  //                 '<button id="reply_'+childrens[j]['id']+'" type="button" class="btn" style="margin-left: 3rem;" onclick="showSubCommentArea('+childrens[j]['id']+');">Reply</button>'+
  //                 '<div id="commentButtonList_'+childrens[j]['id']+'" style="margin-left: 3rem; text-align: right; display: none;">'+
  //                   '<textarea id="commenttree_'+childrens[j]['id']+'" name="commenttree_'+childrens[j]['id']+'" class="form-control form-control-sm pubbliccommentarea" rows="1" placeholder=" Add a pubblic comment" onkeyup="textAreaAdjust(this)" style="overflow:hidden; width: 100%; margin-bottom: 10px;"></textarea>'+
  //                   '<button id="cancle_'+childrens[j]['id']+'" type="button" class="btn btn-sm btn-default" onclick="hideSubComment('+childrens[j]['id']+');">Cancle</button>'+
  //                   '<button id="Comment_'+childrens[j]['id']+'" type="button" class="btn btn-sm btn-info" style="margin-left: 15px;" onclick="submitSubComment('+childrens[j]['id']+', '+data_result[i]['id']+');">Comment</button>'+
  //                 '</div>'+
  //                 '</div>';
  //               }

  //               content += '</div>';
  //             }

  //             content += '</div>';
  //         }

  //         $("#commentContentSection").append(content);
  //       }
  //     }
  //   }
  // });
