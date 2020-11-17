<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BranchDetails extends Model
{
    protected $table = 'branch_details';
    protected $primarykey = 'id';
    protected $fillable = [
        'branch_id','contact_person','email_address','residence_address','city','state','dob','qualification',	'center_name','center_address','center_city','center_state','center_district','center_affiliated_by','ph_no','theory_room','practical_room','no_of_computers','no_of_faculties','no_of_colleges','no_of_schools','computer_spec','course_interested',
    	'center_photo','voter_card','pan_card','trade_licence','theory_room_photo','practical_room_photo','office_room_photo','front_side_photo'	
    ];
}
