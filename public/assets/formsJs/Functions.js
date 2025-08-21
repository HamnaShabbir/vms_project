$(document).ready(CallDatatable);

function CallDatatable() {
    var url = $('#result').data('url');
    var edit_url = $('#result').data('edit_url');
    var delete_url = $('#result').data('delete_url');

    $("#result").DataTable({
        responsive: true,
        lengthChange: false,
        autoWidth: false,
        destroy: true, // Add the destroy option
        ajax: {
            url: url,
        },
        columns: [
            { data: 'id', name: 'id' },
            { data: 'title', name: 'title' },
            { data: 'entity_id', name: 'entity_id' },
            { data: 'lob_id', name: 'lob_id' },
            { data: 'head', name: 'head' },
            { data: 'status', name: 'status' },
            { data: 'created_at', name: 'created_at' },
            { data: 'updated_at', name: 'updated_at' },
            {
                data: 'id', name: 'id', render: function (data, full, row, met) {

                    return '<button data-edit_url="' + edit_url + '"  data-id="' + row.id + '" class="edit_row  btn btn-warning btn-sm"><i class=" fa fa-edit"></i></button>\
                    <button data-delete_url="' + delete_url + '" class="delete_record btn btn-danger btn-sm"  data-id="' + row.id + '"><i class="fa fa-trash"></i></button>';
                }
            }
        ],
        buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"],
        initComplete: function () {
            this.api().buttons().container().appendTo('#result_wrapper .col-md-6:eq(0)');
        }
    });
}

$("#_create_btn").click(function () {
    $("#create_recordModal").modal('show');
});

$("#create_form").submit(function (e) {
    e.preventDefault();
    var that = $(this);
    const title = $('input[name="title"]').val();

    if (!title) {
      toastr.error("Please fill in all fields");
      return;
    }

    $.ajax({
        type: $(this).attr('method'),
        url: $(this).attr('action'),
        data: $(this).serialize(),
        beforeSend: function() {
            var thisd =$("#_save");
            thisd.text('Processing...');
            thisd.addClass('btn-success');
            thisd.removeClass('btn-warning');
            thisd.attr("disabled", "disabled");
        },
        complete: function (data) {
            var thisd =$("#_save");
            thisd.text('Save');
            thisd.removeClass('btn-success');
            thisd.addClass('btn-warning');
            thisd.removeAttr("disabled", "disabled");
        },
        success: function (data) {
            that[0].reset();
            CreatedLog(data);
            $('#create_recordModal').modal('hide');
        },
        error: function (data) {
            toastr.error("Not Added Successfully!");
        },
    });
});


$('body').delegate(".edit_row", 'click', function () {
    var id = $(this).data('id');
    var edit_url = $(this).data('edit_url');
    $.post(edit_url, {
        id: id,
        fetch: 'getEditRecordData'
    }, function (res) {
        $('#id').val(res.id);
        $('#edit_title').val(res.title);
        $('#edit_entity_id').val(res.entity_id);
        $('#edit_lob_id').val(res.lob_id);
        $('#edit_head').val(res.head);
        $('#edit_status').val(res.status);
    })
    $("#edit_recordModal").modal('show');
});


$('body').delegate("#edit_form", 'submit', function (e) {
    e.preventDefault();
    var that = $("#edit_form");
    $.ajax({
        type: $(this).attr('method'),
        url: $(this).attr('action'),
        data: $(this).serialize(),
        beforeSend: function() {
            var thisd =$("#_update");
            thisd.text('Processing...');
            thisd.addClass('btn-success');
            thisd.removeClass('btn-warning');
            thisd.attr("disabled", "disabled");
        },
        complete:function (data) {
            var thisd =$("#_update");
            thisd.text('Update');
            thisd.removeClass('btn-success');
            thisd.addClass('btn-warning');
            thisd.removeAttr("disabled", "disabled");
        },
        success: function (data) {
            that[0].reset();
            UpdatedLog(data);
            toastr.success("Edit Successfully!");
            $('#edit_recordModal').modal('hide');
        },
        error: function (data) {
            toastr.error("Not Edit Successfully!");
        },
    });
});

$('body').on('click', '.delete_record', function (e) {
    var delete_url = $(this).data('delete_url');
    var id = $(this).data('id');
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: 'POST',
                url: delete_url,
                data: { fetch: 'DeleteRecord' ,id:id},
                success: function (data) {
                    DeletedLog(data);
                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )
                },
                error: function (data) {
                    toastr.error("Not Edit Successfully!");
                },
            });
        }
    })
});

$('body').delegate('._trashed_btn', 'click', function (e) {
    var fetch = $(this).data('fetch');
    var trashed_data_url = $('#result').data('trashed_data_url');
    var restore_url = $('#trashed_data_result').data('restore_url');
    
    $.post(trashed_data_url, {
        fetch: fetch
    }, function (res) {
        $("#trashed_data_result").DataTable({
            responsive: true,
            lengthChange: false,
            autoWidth: false,
            destroy: true,
            rowId: 'id',
            data:res,
            columns: [
                { data: 'id', name: 'id' },
                { data: 'title', name: 'title' },
                { data: 'created_at', name: 'created_at' },
                { data: 'updated_at', name: 'updated_at' },
                {
                    data: 'id', name: 'id', render: function (data, full, row, met) {
                    return '<button data-restore_url="' + restore_url + '"  data-id="' + row.id + '" class="restore_row  btn btn-warning btn-sm"><i class="fas fa-trash-restore"></i></button>';
                    }
                }
            ],
            buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"],
            initComplete: function () {
                this.api().buttons().container().appendTo('#trashed_data_result_wrapper .col-md-6:eq(0)');
            }
        });
        $("#trashed_dataModal").modal('show');
    });
});

$('body').delegate('.restore_row', 'click', function (e) {
    var restore_url = $(this).data('restore_url');
    var id = $(this).data('id');
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Restore it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: 'POST',
                url: restore_url,
                data: { fetch: 'restoreRecord', id: id },
                success: function (data) {
                    Swal.fire(
                        'Restore!',
                        'Your file has been Restore.',
                        'success'
                    )
                    // CallDatatable();
                },
                error: function (data) {
                    toastr.error("Not Edit Successfully!");
                },
            });
        }
    }) 
})






// Function to encrypt a string using Caesar Cipher
function caesarCipherEncrypt(str, shift) {
    if (shift < 0 || shift > 25) {
      throw new Error("Shift value should be between 0 and 25.");
    }
  
    let encryptedStr = "";
    for (let i = 0; i < str.length; i++) {
      let charCode = str.charCodeAt(i);
      let encryptedCharCode;
  
      if (charCode >= 65 && charCode <= 90) {
        // Uppercase letters (A-Z)
        encryptedCharCode = ((charCode - 65 + shift) % 26) + 65;
      } else if (charCode >= 97 && charCode <= 122) {
        // Lowercase letters (a-z)
        encryptedCharCode = ((charCode - 97 + shift) % 26) + 97;
      } else {
        // Non-alphabetic characters remain unchanged
        encryptedCharCode = charCode;
      }
  
      encryptedStr += String.fromCharCode(encryptedCharCode);
    }
  
    return encryptedStr;
}
  
  
function CreatedLog(data){
    var logs = $('#result').data('logs');
    var title = $('#result').data('title');
    var encryptedTitle = caesarCipherEncrypt(title, 3);
    $.post(logs,{data:data,'fetch':'CreatedLog',"title":encryptedTitle},function (res) {
        console.log('');
    })
}

function UpdatedLog(data){
    var logs = $('#result').data('logs');
    var title = $('#result').data('title');
    var encryptedTitle = caesarCipherEncrypt(title, 3);
    $.post(logs,{data:data,'fetch':'UpdatedLog',"title":encryptedTitle },function (res) {
        console.log('');
    })
}
function DeletedLog(data) {
    var logs = $('#result').data('logs');
    var title = $('#result').data('title');
    var encryptedTitle = caesarCipherEncrypt(title, 3);
    $.post(logs, { data: data, 'fetch': 'DeletedLog',"title":encryptedTitle }, function(res) {
      console.log(''); 
    });
}

var channel = pusher.subscribe('delete-record');

channel.bind('App\\Events\\DeleteRecordEvent', function(data) {
    CallDatatable();
    toastr.error(data.auth_id + " Has Deleted This Id " + data.id);

});
var channelOne = pusher.subscribe('create-record');
channelOne.bind('App\\Events\\CreateRecordEvent', function(data) {
     CallDatatable();
    toastr.success(data.auth_id + " Has Created This Id " + data.data.id);

});
var channelOne = pusher.subscribe('edit-record');
channelOne.bind('App\\Events\\EditRecordEvent', function(data) {
     CallDatatable();
    toastr.warning(data.auth_id + " Has Edited This Id " + data.data.id);

});

var channelOne = pusher.subscribe('restore-record');
channelOne.bind('App\\Events\\RestoreRecordEvent', function (data) {
    CallDatatable();
    $("#_trashed_btn").trigger("click");
    toastr.success(data.auth_id + " Has Restored This Id " + data.id);

});