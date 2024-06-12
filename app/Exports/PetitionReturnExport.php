<?php

namespace App\Exports;

use App\HighSchoolAdmin;
use App\Petition;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\FromCollection;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;

class PetitionReturnExport implements FromView, ShouldAutoSize, ShouldQueue
{
    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;
   public function view(): View
    {
        ini_set('memory_limit','512M');

      $petitions = Petition::with([
            'country:id,name_uz,name_ru,name_en' ,
            'region:id,name_uz,name_ru,name_en',
            'area:id,name_uz,name_ru,name_en',
            'type_education:id,name_uz,name_ru,name_en',
            'type_language:id,name_uz,name_ru,name_en',
            'type_school_student:id,name_uz,name_ru,name_en',
            'english_degree_student:id,name_uz,name_ru,name_en',
            'faculty:id,name_uz,name_ru,name_en',
            'disability_status:id,name_uz,name_ru,name_en',
            'user',
        ])
        ->where('status', 1)->where(function ($query) {
            $user = Auth::user();
            if ($user->role == 4) {
                $admin = HighSchoolAdmin::where('user_id', $user->id)->first();
                $query->where('high_school_id', $admin->high_school_id);
            }
        })->get();
        return view('admin.exports.petitions.all', [
            'petitions' => $petitions,
        ]);
    }
}
