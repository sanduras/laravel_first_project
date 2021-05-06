@extends('dashboardAdmin.master')

@section('content')
<div class="container-fluid">
          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              {{__('dashboardAdmin.show')}} </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" data-get-action="{{ route('allposts',app()->getLocale()) }}" id="datatable" width="100%" cellspacing="0">
                  <thead>
                     <tr>
                        <th>{{__('dashboardAdmin.image')}} </th>
                        <th>{{__('dashboardAdmin.id')}} </th>
                        <th>{{__('dashboardAdmin.title')}} </th>
                        <th>{{__('dashboardAdmin.description')}} </th>
                        <th>{{__('dashboardAdmin.created')}} </th>
                        <th >{{__('dashboardAdmin.action')}} </th>
                      </tr>
                   </thead>
                </table>
              </div>
            </div>
        </div>
      </div>
        <form action="" id="remove_form" class="rmv" method="POST">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
        </form>
</div>
@endsection