
//Create update button
let datatable ;


$(document).ready(function() {
  const url = $('#datatable').data("get-action");
   datatable = $('#datatable').DataTable( {
        "ajax": url,

        columns: [
          {"data": 'image', name: 'image',
          "render": function(data, type, row, meta){
            return '<img src="' + data + '" alt="'+ data + '"width="70" height="16" class="img-thumbnail" />';
          }},
          {data: 'id', name: 'id'},
          {"width": "20%",data: 'title', name: 'title'},
          {"width": "40%", data: 'description', name: 'description'},
          {data: 'dt', name: 'date'},
        //   {
        //     data: null,
        //     name: "action",
        //     defaultContent: '<a href="" class="btn btn-warning">Edit</a> &nbsp;&nbsp; <a href="" class="btn btn-danger">Delete</a>'
        // },
        {"data": null, name: 'action',
        "render": function(data, type, row, meta){
          return `
            <a href="${row.action_edit}" class="btn btn-outline-primary btn-sm"><i class="bi bi-pencil"></i></a>
              <button form="remove_form" data-delete-action="${row.action_delete}" type="submit" id="btn_deleter" class="btn btn-outline-danger btn-sm "><i class="bi bi-trash"></i></button> 
          `
        }},
         ]

    } );
} );
$(document).on("click", "#btn_deleter", function(e){
  e.preventDefault();
  
  //console.log(datatable);return;
  let delete_url = $(this).data("delete-action");
  $.ajax({
    url : delete_url,
    type: "DELETE",
    success: () => {
        datatable.ajax.reload();
    }
});


})

