<?php

namespace App\Http\Controllers\Superadmin\HumanResourse;

use App\Http\Controllers\Controller;
use App\Models\Admin\HumanResourse\Department;
use App\Models\Admin\HumanResourse\Designation;
use App\Models\Admin\HumanResourse\StaffDirectory;
use App\Models\User;
use Illuminate\Http\Request;
class StaffDirectoryController extends Controller
{
    public function staffDirectory()
    {
        $staff_directory = StaffDirectory::all();
        return view('superadmin.humnaresourse.view_staff_directory',compact('staff_directory'));
    }
    public function staffDirectoryCreate()
    {       
        $roles = User::pluck('role','role');
        $designations = Designation::pluck('name','name');
        $departments = Department::pluck('name','name');

        return view('superadmin.humnaresourse.create_staff_directory',compact('roles','designations','departments'));
    }
    public function staffDirectoryInsert(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'staff_id' => 'required|numeric',
            'role' => 'required',
            'first_name' => 'required',
            'email' => 'required|email|unique:staff_directorys',
            'gender' => 'required',
            'date_of_birth' => 'required',
            'pan_number' => 'required|numeric',
        ]);

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $filename = time() . '.' . $photo->getClientOriginalExtension();
            $photo->move('photos', $filename);
        }
        

    // Store file paths in variables
    $resumePath = $request->file('resume') ? $request->file('resume')->store('resumes', 'public') : null;
    $joiningLetterPath = $request->file('joining_letter') ? $request->file('joining_letter')->store('joining_letters', 'public') : null;
    $resignationLetterPath = $request->file('resignation_letter') ? $request->file('resignation_letter')->store('resignation_letters', 'public') : null;
    $otherDocumentsPath = $request->file('other_documents') ? $request->file('other_documents')->store('other_documents', 'public') : null;

        StaffDirectory::create([
            'staff_id' => $request->input('staff_id'),
            'role' => $request->input('role'),
            'designation' => $request->input('designation'),
            'department' => $request->input('department'),
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'father_name' => $request->input('father_name'),
            'mother_name' => $request->input('mother_name'),
            'email' => $request->input('email'),
            'gender' => $request->input('gender'),
            'date_of_birth' => $request->input('date_of_birth'),
            'date_of_joining' => $request->input('date_of_joining'),
            'phone' => $request->input('phone'),
            'emergency_contact_number' => $request->input('emergency_contact_number'),
            'photo' => $photo,
            'address' => $request->input('address'),
            'permanent_address' => $request->input('permanent_address'),
            'work_experience' => $request->input('work_experience'),
            'note' => $request->input('note'),
            'qualification' => $request->input('qualification'),
            'pan_number' => $request->input('pan_number'),
            'epf_number' => $request->input('epf_number'),
            'basic_salary' => $request->input('basic_salary'),
            'work_shift' => $request->input('work_shift'),
            'work_location' => $request->input('work_location'),
            'bank_account_title' => $request->input('bank_account_title'),
            'bank_account_number' => $request->input('bank_account_number'),
            'bank_name' => $request->input('bank_name'),
            'ifsc_code' => $request->input('ifsc_code'),
            'bank_branch_name' => $request->input('bank_branch_name'),
            'facebook_url' => $request->input('facebook_url'),
            'twitter_url' => $request->input('twitter_url'),
            'linkedin_url' => $request->input('linkedin_url'),
            'instagram_url' => $request->input('instagram_url'),
            'resume' => $resumePath,
            'joining_letter' => $joiningLetterPath,
            'resignation_letter' => $resignationLetterPath,
            'other_documents' => $otherDocumentsPath,
        ]);
        
        return redirect()->route('staff.directory');
    }
    public function staffDirectoryEdit($id)
    {
        $staff_directory = StaffDirectory::find($id);
        $roles = User::pluck('role','role');
        $designations = Designation::pluck('name','name');
        $departments = Department::pluck('name','name');
        return view('superadmin.humnaresourse.create_staff_directory',compact('staff_directory','roles','designations','departments'));
    }
    public function staffDirectoryUpdate(Request $request, $id)
    {
        // Find the staff directory entry by ID
        $staff_directory = StaffDirectory::findOrFail($id);
    
        // Handle document uploads
        $resumePath = $request->file('resume') ? $request->file('resume')->store('resumes', 'public') : $staff_directory->resume;
        $joiningLetterPath = $request->file('joining_letter') ? $request->file('joining_letter')->store('joining_letters', 'public') : $staff_directory->joining_letter;
        $resignationLetterPath = $request->file('resignation_letter') ? $request->file('resignation_letter')->store('resignation_letters', 'public') : $staff_directory->resignation_letter;
        $otherDocumentsPath = $request->file('other_documents') ? $request->file('other_documents')->store('other_documents', 'public') : $staff_directory->other_documents;
    
        // Handle photo upload
        
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $filename = time() . '.' . $photo->getClientOriginalExtension();
            $photo->move('photos', $filename);
    
            // Update user's photo information in the database
            $staff_directory->photo = $filename;
        }
    
        // Update the staff directory entry
        $staff_directory->update([
            'staff_id' => $request->input('staff_id'),
            'role' => $request->input('role'),
            'designation' => $request->input('designation'),
            'department' => $request->input('department'),
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'father_name' => $request->input('father_name'),
            'mother_name' => $request->input('mother_name'),
            'email' => $request->input('email'),
            'gender' => $request->input('gender'),
            'date_of_birth' => $request->input('date_of_birth'),
            'date_of_joining' => $request->input('date_of_joining'),
            'phone' => $request->input('phone'),
            'emergency_contact_number' => $request->input('emergency_contact_number'),
            'address' => $request->input('address'),
            'permanent_address' => $request->input('permanent_address'),
            'work_experience' => $request->input('work_experience'),
            'note' => $request->input('note'),
            'qualification' => $request->input('qualification'),
            'pan_number' => $request->input('pan_number'),
            'epf_number' => $request->input('epf_number'),
            'basic_salary' => $request->input('basic_salary'),
            'work_shift' => $request->input('work_shift'),
            'work_location' => $request->input('work_location'),
            'bank_account_title' => $request->input('bank_account_title'),
            'bank_account_number' => $request->input('bank_account_number'),
            'bank_name' => $request->input('bank_name'),
            'ifsc_code' => $request->input('ifsc_code'),
            'bank_branch_name' => $request->input('bank_branch_name'),
            'facebook_url' => $request->input('facebook_url'),
            'twitter_url' => $request->input('twitter_url'),
            'linkedin_url' => $request->input('linkedin_url'),
            'instagram_url' => $request->input('instagram_url'),
            'resume' => $resumePath,
            'joining_letter' => $joiningLetterPath,
            'resignation_letter' => $resignationLetterPath,
            'other_documents' => $otherDocumentsPath,
        ]);
    
        // Redirect back or to a specific route
        return redirect()->route('staff.directory');
    }
    
    
}
