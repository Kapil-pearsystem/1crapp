<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::select('id','first_name','last_name','email','mobile_number','email_verified_at','role_id','status','created_at','updated_at')->get();
    }
    
    public function headings(): array
    {
        return ["ID", "First Name", "Last Name", "Email ID", "Mobile", "Email Verified", "Role ID", "Status", "Created At", "Updated At"];
    }
}
