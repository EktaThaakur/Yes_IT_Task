<?php

namespace App\Imports;

use App\Models\Profile;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImport implements ToCollection, WithHeadingRow
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        foreach ($collection as $row) {

            $user = Profile::create([
                'name' => $row['name'],
                'phone' => $row['phone'],
                'email' => $row['email'],
                'street_address' => $row['street'],
                'city' => $row['city'],
                'state' => $row['state'],
                'country' => $row['country'],
            ]);
        }

        //
    }
}
