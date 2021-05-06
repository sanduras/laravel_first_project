 @extends('dashboardAdmin.master')

@section('content')
<div class="container-fluid">
          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Data Table show </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" data-get-action="{{ route('allposts') }}" id="datatable" width="100%" cellspacing="0">
                  <thead>
                     <tr>
                        <th>Image</th>
                        <th >Id</th>
                        <th>Titlu</th>
                        <th >Description</th>
                        <th>Created_at</th>
                        <th >Action</th>
                      </tr>
                   </thead>
                </table>
              </div>
            </div>
        </div>
      </div>
    
        
</div>
@endsection