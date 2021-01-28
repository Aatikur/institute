@extends('branch.template.branch_master')

@section('content')

<div class="right_col" role="main">
     <!-- top tiles -->
    <div class="row tile_count">
      <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count" style="text-align: center">
        <span class="count_top"><i class="fa fa-user"></i> Total Students</span>
        <div class="count green">{{$student_cnt}}</div>
      </div>
      {{--<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count"  style="text-align: center">
        <span class="count_top"><i class="fa fa-clock-o"></i> Total Retailers</span>
        <div class="count green">10</div>
      </div>
      <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count"  style="text-align: center">
          <span class="count_top"><i class="fa fa-user"></i> Total Products</span>
          <div class="count green">10</div>
      </div>
      <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count"  style="text-align: center">
        <span class="count_top"><i class="fa fa-user"></i> Total Categories</span>
        <div class="count green">10</div>
      </div>
      <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count"  style="text-align: center">
        <span class="count_top"><i class="fa fa-user"></i> Total New Orders</span>
        <div class="count green">10</div>
      </div>--}}
      
    </div> 
    <!-- /top tiles -->

  <div class="row">

    <div class="col-md-12">
      <div class="x_panel">
        <div class="x_title">
            <h2>Last 10 Students</h2>
            <div class="clearfix"></div>
        </div>
        <div>
          <div class="x_content">
            <div class="table-responsive">
            <table class="table table-striped jambo_table bulk_action">
              <thead>
                <tr>
                    <th>SL No.</th>
                    <th>Student Name</th>
                    <th>Father Name</th>
                    <th>Date Of Birth</th>
                    <th>Enrollment Id</th>
                </tr>
              </thead>
              <tbody class="form-text-element">
                  @if (isset($student) && !empty($student))
                      @foreach ($student as $item)
                        <tr>
                          <td>{{$loop->iteration}}</td>
                          <td>{{$item->name}}</td>
                          <td>{{$item->father_name}}</td>
                          <td>{{$item->dob}}</td>
                          <td>{{$item->student->enrollment_id??null}}</td>
                        </tr>
                      @endforeach
                  @endif
              </tbody>
            </table>
            </div>
          </div>
            <a class="btn btn-primary btn-sm" href="{{route('branch.student_list')}}">View More</a>
         </div>
      </div>
    </div>
  </div>
</div>
 @endsection
