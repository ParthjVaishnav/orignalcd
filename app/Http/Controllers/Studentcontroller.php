<?php
namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Studentcontroller extends Controller
{
    public function getinfo(Request $request)
    {
        $student = new Student();
        $student->name = $request->name;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->address = $request->address;
        $student->save();

        if ($student) {
            return redirect('show-data');
        }
    }

    public function showData()
    {
        $students = DB::select('select * from students'); // Fetch all student data
        return view('show-data', ['students' => $students]); // Pass data to the view
    }

    public function delete($id)
    {
        $isDeleted = Student::destroy($id); // Use Eloquent to delete the record
        return redirect('show-data');
    }

    public function edit($id)
    {
       $student=Student::find($id);
        return view('edit-student',['data'=>$student]);;
    }
}


function vailidation(){
    $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'phone' => 'required|numeric',
        'address' => 'required',
        ],
        [
            'name.required' => 'Name is required',
            'email.required' => 'Email is required',
            'email.email' => 'Email is not valid',
            'phone.required' => 'Phone is required',
            'phone.numeric' => 'Phone is not valid',
            'address.required' => 'Address is required',
            ]
    
    
    
    
    
);
        }
