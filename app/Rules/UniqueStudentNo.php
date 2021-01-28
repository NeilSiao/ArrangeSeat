<?php

namespace App\Rules;

use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Validation\Rule;

class UniqueStudentNo implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $student = Student::where('no', $value)->where('user_id', Auth::id())->first();
        if($student == null){
            return true;
        }
        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return '已存在重複的學生編號';
    }
}
