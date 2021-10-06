<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use DataTables;

class StudentController extends Controller
{
    public function index()
    {
        $students=Student::all();
        return view('student.index', compact('students'));
    }


    public function create()
    {
        return view("student.create", );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        //check validation

        $request->validate([
            'name' => ['required','max:100'] ,
            'username' => ['required'] ,
            'email' => 'required|unique:students', //check if already exist email
            'phone' => 'required',



        ], [
            //validation message
            'name.required' => 'Student name is required',
            'username.required' => 'Username name is required',
            'email.required' => 'Email name is required',



        ]);


        //insert student
        $student = new Student();
        $student->name = $request->name;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->username = $request->username;
        $student->dob = $request->bdate;
        $student->save();



        session()->flash('message', 'Inserted Successfully ');
        session()->flash('type', 'success');
        return redirect()->route('students.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $student = Student::find($id);
        return view("student.edit", compact('student'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

//find student by $id
        $student=Student::findOrfail($id);

        $request->validate([
            'name' => ['required','max:100'] ,
            'username' => ['required'] ,
            'email' => 'required|unique:students,email,'. $id, //check if already exist email and isnot equel is this updated id
            'phone' => 'required',



        ], [
            'name.required' => 'Student name is required',
            'username.required' => 'Username name is required',
            'email.required' => 'Email name is required',



        ]);

        $student->name = $request->name;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->username = $request->username;
        $student->dob = $request->bdate;
        $student->save();

        session()->flash('message', 'Updated Successfully ');
            session()->flash('type', 'success');
            return redirect()->route('students.index');







    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //delete student
        $student= Student::find($id);
        if (!is_null($student)) {
            $student->delete();
            session()->flash('message', 'Deleted Successfully ');
            session()->flash('type', 'danger');
            return redirect()->route('students.index');

        }

    }
}
