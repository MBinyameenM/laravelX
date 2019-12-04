$(document).ready(function(){

       $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });

      const table = $('.data-table').DataTable({
          processing: true,
          serverSide: true,
          ajax: "products",
          columns: [
              // {data: 'DT_RowIndex', name: 'DT_RowIndex'},
              {data: 'name', name: 'name'},
              {data: 'price', name: 'price'},
              {data: 'description', name: 'description'},
              {data: 'edit', name: 'edit', orderable: false, searchable: false},
              {data: 'delete', name: 'delete', orderable: false, searchable: false},
          ]
      });
    
    //Creating new Product

     $('#createNewProduct').click(function () {
        $('#saveBtn').val("Create product");
        $('#product_id').val('');
        $('#productForm').trigger("reset");
        $('#modelHeading').html("Create New Product");
        $('#ajaxModel').modal('show');
    });

    // Editing Product
      $('body').on('click', '.editProduct', function () {
        const product_id = $(this).data('id');
        $.get(`products/${product_id}/edit`, function (data) {
            $('#modelHeading').html("Edit Product");
            $('#saveBtn').val("Edit Product");
            $('#ajaxModel').modal('show');
            $('#product_id').val(data.id);
            $('#name').val(data.name);
            $('#price').val(data.price);
            $('#description').val(data.description);
        })
     });

      // Updating Product

    $('#saveBtn').click(function (e) {
        e.preventDefault();
        $(this).html('Sending..');
        console.log($('#productForm').serialize());
    
        $.ajax({
          data: $('#productForm').serialize(),
          url: "products",
          type: "POST",
          dataType: 'json',
          success: function (data) {
              
              $('#productForm').trigger("reset");
              $('#ajaxModel').modal('hide');
              table.draw();
              $('#saveBtn').html('Save Changes');

              window.setTimeout(function() {
                    $("#alert_message").text(data.success);
                    $(".alert").slideDown(500).slideUp(3000, function(){
                        $("#alert_message").text(data.success);
                          });
                      }, 500);
         
          },
          error: function (data) {
              console.log('Error:', data);
              $('#saveBtn').html('Save Changes');
          }
      });
    });

      //Deleting Product
      $('body').on('click', '.deleteProduct', function () {
     
        const product_id = $(this).data("id");
        const check =  confirm("Are You sure want to delete this Product ?");
        
        if( check )
        {
            $.ajax({
              type: "DELETE",
              url: `products/${product_id}`,
              success: function (data) {
                  table.draw();
                  window.setTimeout(function() {
                    $("#alert_message").text(data.success);
                    $(".alert").slideDown(500).slideUp(3000, function(){
                        $("#alert_message").text(data.success);
                          });
                      }, 500);
              },
              error: function (data) {
                  console.log('Error:', data);
              }
            });
        }
        
    });



});

