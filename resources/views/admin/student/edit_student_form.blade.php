@extends('admin.template.admin_master')

@section('content')
<style>
    .error{
        color:red;
    }
</style>


<div class="right_col" role="main">
    <div class="row">
    	{{-- <div class="col-md-2"></div> --}}
    	<div class="col-md-12" style="margin-top:50px;">
    	    <div class="x_panel">

    	        <div class="x_title">
    	            <h2>Register Student</h2>
    	            <div class="clearfix"></div>
    	        </div>
                <div>
                     @if (Session::has('message'))
                        <div class="alert alert-success" >{{ Session::get('message') }}</div>
                     @endif
                     @if (Session::has('error'))
                        <div class="alert alert-danger">{{ Session::get('error') }}</div>
                     @endif

                </div>
    	        <div>
                    <form method="POST" action="{{ route('admin.update_student',['id'=>$student_details->id,'branch_id'=>$student_details->student->branch_id]) }}" enctype="multipart/form-data">
                        @method('put')
                        @csrf
    	            <div class="x_content">
                        <div class="well" style="overflow: auto">
                            <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                <label for="course"> Select Course<span><b style="color: red"> * </b></span></label>
                                <select class="form-control"  name="course" id="course_chg">
                                    <option value="" >Select Course</option>
                                    @foreach($courses as $data)
                                      <option value="{{ $data->id }}" {{ $data->id == $student_details->student->course_id?'selected':'' }}>{{ $data->name }}</option>
                                    @endforeach
                                </select>
                            @if($errors->has('course'))
                                <span class="invalid-feedback" role="alert" style="color:red">
                                    <strong>{{ $errors->first('course') }}</strong>
                                </span>
                            @enderror
                            </div>

                            <div class="col-md-6 col-sm-12 col-xs-12 mb-3" id="fees_div" >
                                <label for="course_fees">Course Fees<span><b style="color: red"> * </b></span></label>
                                <input type="number"  class="form-control" value="{{ $student_details->student->course->course_fees }}" readonly="readonly" name="course_fees" id="course_fees" >
                            </div>
                        </div>
    	                <div class="well" style="overflow: auto">
                            <div class="form-row mb-10">
                                <div class="col-md-6 col-sm-12 col-xs-12 mb-3" id="doc_div">
                                    <label for="student_name">Name<span><b style="color: red"> * </b></span></label>
                                    <input type="text" class="form-control" value="{{ $student_details->name }}" name="student_name">
                                    
                                @if($errors->has('student_name'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('student_name') }}</strong>
                                    </span>
                                @enderror
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12 mb-3" id="amount_div" >
                                    <label for="father_name">Father Name<span><b style="color: red"> * </b></span></label>
                                    <input type="text"  class="form-control" name="father_name" value="{{ $student_details->father_name }}" >
                                    @if($errors->has('father_name'))
                                        <span class="invalid-feedback" role="alert" style="color:red">
                                            <strong>{{ $errors->first('father_name') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12 mb-3" id="amount_div" >
                                    <label for="mother_name">Mother Name<span><b style="color: red"> * </b></span></label>
                                    <input type="text"  class="form-control" name="mother_name" value="{{ $student_details->mother_name }}" >
                                    @if($errors->has('mother_name'))
                                        <span class="invalid-feedback" role="alert" style="color:red">
                                            <strong>{{ $errors->first('mother_name') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12 mb-3" id="amount_div" >
                                    <label for="hus_name">Husband Name</label>
                                    <input type="text"  class="form-control" name="hus_name" value="{{ $student_details->husband_name }}" >
                                    @if($errors->has('hus_name'))
                                        <span class="invalid-feedback" role="alert" style="color:red">
                                            <strong>{{ $errors->first('hus_name') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-row mb-10">
                                    <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                        <label for="tel_no" >Telephone Number</label>
                                        <input type="tel" class="form-control" name="tel_no"  value="{{ $student_details->tel_no }}" >
                                        @if($errors->has('tel_no'))
                                        <span class="invalid-feedback" role="alert" style="color:red">
                                            <strong>{{ $errors->first('tel_no') }}</strong>
                                        </span>
                                    @enderror
                                    </div>
                                </div>
                                <div class="form-row mb-10">
                                    <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                        <label for="mob_no" >Mobile Number<span><b style="color: red"> * </b></span></label>
                                        <input type="tel" class="form-control" name="mob_no" value="{{ $student_details->mob_no }}" >
                                        @if($errors->has('mob_no'))
                                        <span class="invalid-feedback" role="alert" style="color:red">
                                            <strong>{{ $errors->first('mob_no') }}</strong>
                                        </span>
                                    @enderror
                                    </div>
                                </div>
                                <div class="form-row mb-10">
                                    <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                        <label for="email" >Email</label>
                                        <input type="email" class="form-control" name="email"  value="{{ $student_details->email }}" >
                                        @if($errors->has('email'))
                                        <span class="invalid-feedback" role="alert" style="color:red">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @enderror
                                    </div>
                                </div>
                                <div class="form-row mb-10">
                                    <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                        <label for="dob" >DOB<span><b style="color: red"> * </b></span></label>
                                        <input type="date" class="form-control" name="dob"  value="{{ $student_details->dob }}" >
                                        @if($errors->has('dob'))
                                        <span class="invalid-feedback" role="alert" style="color:red">
                                            <strong>{{ $errors->first('dob') }}</strong>
                                        </span>
                                    @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="well" style="overflow: auto">
                            <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                <label for="state" >State<span><b style="color: red"> * </b></span></label>
                                <input type="text" class="form-control" name="state"  value="{{ $student_details->state_code }}" >
                                @if($errors->has('state'))
                                <span class="invalid-feedback" role="alert" style="color:red">
                                    <strong>{{ $errors->first('state') }}</strong>
                                </span>
                            @enderror
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                <label for="city" >City<span><b style="color: red"> * </b></span></label>
                                <input type="text" class="form-control" name="city"  value="{{ $student_details->city }}" >
                                @if($errors->has('city'))
                                <span class="invalid-feedback" role="alert" style="color:red">
                                    <strong>{{ $errors->first('city') }}</strong>
                                </span>
                            @enderror
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                <label for="country" >Country<span><b style="color: red"> * </b></span></label>
                                <input type="text" class="form-control" name="country"  value="{{ $student_details->country }}" >
                                @if($errors->has('country'))
                                <span class="invalid-feedback" role="alert" style="color:red">
                                    <strong>{{ $errors->first('country') }}</strong>
                                </span>
                            @enderror
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                <label for="pin" >PIN<span><b style="color: red"> * </b></span></label>
                                <input type="number" class="form-control" name="pin"  value="{{ $student_details->pin }}" >
                                @if($errors->has('pin'))
                                <span class="invalid-feedback" role="alert" style="color:red">
                                    <strong>{{ $errors->first('pin') }}</strong>
                                </span>
                            @enderror
                            </div>
                            <div class="form-row mb-10">
                                <div class="col-md-12 col-sm-12 col-xs-12 mb-3">
                                    <label for="address" >Address</label>
                                    <textarea  class="form-control" name="address"  >{{ $student_details->address }}</textarea>
                                    @if($errors->has('address'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @enderror
                                </div>
                            </div>

                        </div>
                        <div class="well" style="overflow: auto">
                            <div class="form-row mb-3">     
                                <div class="col-md-6 col-sm-12 col-xs-12 mb-3" style="margin-top: 20px;">
                                    <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                        <label for="gender">Category</label>
                                    </div>
                                    <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                        <p >  
                                            <input type="radio" name="category"  value="1" {{ $student_details->category=='1'?'checked':'' }}>GEN 
                                            <input type="radio" name="category"  value="2" {{ $student_details->category=='2'?'checked':'' }}>SC 
                                            <input type="radio" name="category"  value="3" {{ $student_details->category=='3'?'checked':'' }}>ST 
                                            <input type="radio" name="category"  value="4" {{ $student_details->category=='4'?'checked':'' }}>Handicapped 
                                        </p>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="form-row mb-3">     
                                <div class="col-md-6 col-sm-12 col-xs-12 mb-3" style="margin-top: 20px;">
                                    <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                        <label for="gender">Gender</label>
                                    </div>
                                    <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                        <p>  
                                            <input type="radio" name="gender"  value="1" {{ $student_details->gender=='1'?'checked':'' }}>Male 
                                            <input type="radio" name="gender"  value="2" {{ $student_details->gender=='2'?'checked':'' }}>Female 
                                        </p>
                                    </div>
                                </div>
                            </div>  
                            <div class="form-row mb-3">     
                                <div class="col-md-6 col-sm-12 col-xs-12 mb-3" style="margin-top: 20px;">
                                    <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                        <label for="medium">Medium</label>
                                    </div>
                                    <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                        <p >  
                                            <input type="radio" name="medium"  value="1" {{ $student_details->medium=='1'?'checked':'' }}>English 
                                            <input type="radio" name="medium"  value="2" {{ $student_details->medium=='2'?'checked':'' }}>Hindi 
                                        </p>
                                    </div>
                                </div>
                            </div>     
                        </div>   
                        <div class="well" style="overflow: auto">
                            <div class="form-row mb-10">
                                <div class="col-md-12 col-sm-12 col-xs-12 mb-3">
                                    <label for="profile" >Profile Image <span><b style="color: red"> * </b></span></label>
                                    <input class="form-control" type="file" name="profile" id="imgprev">
                                    <img style="width:150px;height:150px;" src="{{ asset('images/student/thumb/'.$student_details->image) }}" id="preview"/>
                                    @if($errors->has('profile'))
                                        <span class="invalid-feedback" role="alert" style="color:red">
                                            <strong>{{ $errors->first('profile') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row mb-10">
                                <div class="col-md-12 col-sm-12 col-xs-12 mb-3">
                                    <label for="sign" >Signature <span><b style="color: red"> * </b></span></label>
                                    <input class="form-control" type="file" name="sign" id="signprev">
                                    @if(isset($student_details->sign) &7 !empty($student_details->sign))
                                        <img style="width:150px;height:150px;" src="{{ asset('images/student/thumb/'.$student_details->sign) }}" id="signpreview"/>
                                    @endif
                                    @if($errors->has('sign'))
                                        <span class="invalid-feedback" role="alert" style="color:red">
                                            <strong>{{ $errors->first('sign') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="well" style="overflow: auto" id="addDiv">
                            <h4>Qualification:</h4>
                            @foreach($qualification as  $value)
                                
                                <div class="form-row mb-10" >
                                    <div class="col-md-2 col-sm-12 col-xs-12 mb-3">
                                        <label for="exam" >Exam Name <span><b style="color: red"> * </b></span></label>
                                        <input class="form-control" type="text" value="{{ $value->exam_name }}" name="exam[]">
                                        <input type="hidden" name="quali_id[]" value="{{ $value->id }}"> 
                                        @if($errors->has('exam'))
                                            <span class="invalid-feedback" role="alert" style="color:red">
                                                <strong>{{ $errors->first('exam') }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-3 col-sm-12 col-xs-12 mb-3">
                                        <label for="board" >Board <span><b style="color: red"> * </b></span></label>
                                        <input class="form-control" type="text" value="{{ $value->board }}" name="board[]">
                                        @if($errors->has('board'))
                                            <span class="invalid-feedback" role="alert" style="color:red">
                                                <strong>{{ $errors->first('board') }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-3 col-sm-12 col-xs-12 mb-3">
                                        <label for="college" >College <span><b style="color: red"> * </b></span></label>
                                        <input class="form-control" type="text" value="{{ $value->college }}" name="college[]">
                                        @if($errors->has('college'))
                                            <span class="invalid-feedback" role="alert" style="color:red">
                                                <strong>{{ $errors->first('college') }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-2 col-sm-12 col-xs-12 mb-3">
                                        <label for="year" >Year Of Passing <span><b style="color: red"> * </b></span></label>
                                        <input class="form-control" type="text" value="{{ $value->year_of_passing }}" name="year[]">
                                        @if($errors->has('year'))
                                            <span class="invalid-feedback" role="alert" style="color:red">
                                                <strong>{{ $errors->first('year') }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-2 col-sm-12 col-xs-12 mb-3">
                                        <label for="marks" >Marks <span><b style="color: red"> * </b></span></label>
                                        <input class="form-control" type="number" value="{{ $value->marks_obtained }}" name="marks[]">
                                        @if($errors->has('marks'))
                                            <span class="invalid-feedback" role="alert" style="color:red">
                                                <strong>{{ $errors->first('marks') }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    
                                  
                                </div>
                                @if ($loop->first)
                                    <a onclick="addMoreDiv()"  class='btn btn-primary'>Add More</a>
                                @else
                                    <a href="{{ route('admin.remove_qual',['qual_id'=>$value->id]) }}"  class='btn btn-danger'>Remove</a>
                                @endif 
                            @endforeach
                            
                        </div>
                        <div class="form-group">    
                            <button type="submit" class='btn btn-success'>Submit</button>
    	            	</div>
    	            </div>
                    </form>
    	        </div>
    	    </div>
    	</div>
    	
    </div>
</div>


 @endsection

@section('script')

<script>
    
$('#course_chg').change(function(){
    var course_id = $(this).val();
    console.log(course_id);
    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type:"GET",
            url:"{{ url('branch/student/retrive/course/fees')}}"+"/"+course_id,
            success:function(response){
                if(response == 2){

                }else{
                   
                    $('#fees_div').show();
                    $('#course_fees').val(response);
                }
            } 
        });

    });

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#preview').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
    function readSign(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#signpreview').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imgprev").change(function(){
        readURL(this);
    });

    $("#signprev").change(function(){
        readSign(this);
    });

    $('#course_chg').change(function(){
        var course_id = $(this).val();
        console.log(course_id);
        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type:"GET",
                url:"{{ url('admin/student/retrive/course/fees')}}"+"/"+course_id,
                success:function(response){
                    if(response == 2){
                        $('#course_fees').val();
                    }else{
                    
                       
                        $('#course_fees').val(response);
                    }
                } 
            });

    });

    var div_counter = 1;
    function addMoreDiv(){
        var html = ` <div class="form-row mb-10" id="divs${div_counter}" >
                <div class="col-md-2 col-sm-12 col-xs-12 mb-3">
                    <label for="exam" >Exam Name </label>
                    <input class="form-control" type="text" name="exam[]">
                    
                </div>
                <div class="col-md-3 col-sm-12 col-xs-12 mb-3">
                    <label for="board" >Board </label>
                    <input class="form-control" type="text" name="board[]">
                    
                </div>
                <div class="col-md-3 col-sm-12 col-xs-12 mb-3">
                    <label for="college" >College </label>
                    <input class="form-control" type="text" name="college[]">
                    
                </div>
                <div class="col-md-2 col-sm-12 col-xs-12 mb-3">
                    <label for="year" >Year Of Passing </label>
                    <input class="form-control" type="text" name="year[]">
                    
                </div>
                    <div class="col-md-2 col-sm-12 col-xs-12 mb-3">
                    <label for="marks" >Marks </label>
                    <input class="form-control" type="number" name="marks[]">
                    
                </div>
                <a onclick="removeDiv(${div_counter})"  class='btn btn-danger'>Remove</a>
            </div>`;
        
            $('#addDiv').append(html);
        
        div_counter++;
    }

    function removeDiv(div_id){
        $('#divs'+div_id).remove();
        div_counter --;
    }

    

</script>
@endsection


        
    