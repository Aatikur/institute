@extends('admin.template.admin_master')

@section('content')

<div class="right_col" role="main">
     <!-- top tiles -->
     <div class="row tile_count">
      <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count" style="text-align: center">
        <span class="count_top"><i class="fa fa-user"></i> Total Courses</span>
        <div class="count green">{{ $course_cnt }}</div>
      </div>
      <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count"  style="text-align: center">
        <span class="count_top"><i class="fa fa-clock-o"></i> Total Branch</span>
        <div class="count green">{{ $branch_cnt }}</div>
      </div>
      <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count"  style="text-align: center">
          <span class="count_top"><i class="fa fa-user"></i> Total Students</span>
          <div class="count green">{{$student_cnt}}</div>
      </div>
       {{-- <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count"  style="text-align: center">
        <span class="count_top"><i class="fa fa-user"></i> Total Categories</span>
        <div class="count green">10</div>
      </div>
      <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count"  style="text-align: center">
        <span class="count_top"><i class="fa fa-user"></i> Total New Orders</span>
        <div class="count green">10</div>
      </div>
      
    </div> --}}
    <!-- /top tiles -->

  <div class="row">

     <div class="col-md-12">
      <div class="x_panel">
        <div class="x_title">
            <h2>Last 10 Branches</h2>
            <div class="clearfix"></div>
        </div>
        <div>
          <div class="x_content">
            <div class="table-responsive">
            <table class="table table-striped jambo_table bulk_action">
              <thead>
                <tr>
                    <th>SL No.</th>
                    <th>Branch Name</th>
                    <th>Branch Email</th>
                    <th>Branch Code</th>
                    <th>Branch Status</th>
                </tr>
              </thead>
              <tbody class="form-text-element">
                  @if (isset($branch) && !empty($branch))
                  
                      @foreach ($branch as $item)
                        <tr>
                          <td>{{$loop->iteration}}</td>
                          <td>{{$item->center_name}}</td>
                          <td>{{$item->branch->email}}</td>
                          <td>{{$item->center_code}}</td>
                          <td>@if($item->branch->status ==1)
                              <a class="btn btn-success btn-xs">Active</a>
                            @elseif($item->branch->status ==2)
                              <a class="btn btn-danger btn-xs">Inactive</a>
                              
                            @else
                            <a class="btn btn-info btn-xs">Requested</a>
                            @endif
                       
                          </td>
                        </tr>
                      @endforeach
                  @endif
              </tbody>
            </table>
            </div>
            <a class="btn btn-sm btn-primary">View More</a>
          </div>
        </div>
      </div>
    </div> 
  </div>
</div>
 @endsection
