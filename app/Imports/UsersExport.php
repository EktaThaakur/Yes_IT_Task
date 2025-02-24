<?php

namespace App\Imports;

use App\Models\Profile;
use Illuminate\Support\Collection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ToCollection;

class UsersExport implements FromView
{


    public function view(): View
    {
        return view('exports.profiles', [
            'profiles' => Profile::get()
        ]);
    }
}
