<!DOCTYPE html>
<html>
<head>
    <title>Laravel 5.8 Datatables Tutorial - ItSolutionStuff.com</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<style>
    .alert{ display: none; }
</style>
</head>
<body>
    
<div class="container">

    <div class="row my-5">
        <div class="col-10">
            <h1 class="text-center"> Laravel DataTables CRUD - Products </h1>
        </div>
        <div class="col-2">
            <a class="btn btn-success btn-sm" href="javascript:void(0)" id="createNewProduct"> Create New Product</a>
        </div>
    </div>

    <div class="row">
        <div class="offset-3 col-md-6">
            <div class="alert alert-success">
                 <strong> Success !</strong> <span id="alert_message">  </span>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
    <table class="table table-bordered table-hover data-table">
        <thead>
            <tr>
                <!-- <th>No</th> -->
                <th>Name</th>
                <th>Price</th>
                <th>Detail</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
    </div>
    </div>
</div>

<div class="modal fade" id="ajaxModel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeading"></h4>
            </div>
            <div class="modal-body">
                <form id="productForm" name="productForm" class="form-horizontal">
                   <input type="hidden" name="product_id" id="product_id">
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" value="" maxlength="50" required="">
                        </div>
                    </div>
     
                    <div class="form-group">
                        <label for="price" class="col-sm-2 control-label">Price</label>
                        <div class="col-sm-12">
                            <input id="price" name="price" required placeholder="Enter Price" class="form-control" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="description" class="col-sm-2 control-label">Description</label>
                        <div class="col-sm-12">
                            <textarea id="description" name="description" placeholder="Enter Description" class="form-control" rows="5"></textarea>
                        </div>
                    </div>
      
                    <div class="col-sm-offset-2 col-sm-10">
                     <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Save changes
                     </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
   
</body>
   
<script type="text/javascript" src="{{ asset('public/js/ProductDataTable.js') }}"></script>

</html>