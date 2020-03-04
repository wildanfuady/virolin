<?php
  
namespace App\Exports;
  
use App\Subscribers;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Maatwebsite\Excel\Concerns\WithHeadings;
  
class SubscribersExport implements FromCollection, WithCustomCsvSettings, WithHeadings
{

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function collection()
    {
        $select = "subscriber_name, subscriber_email";
        return Subscribers::where('list_sub_id', $this->id)->where('subscriber_status', 'valid')->selectRaw($select)->get();
    }

    public function getCsvSettings(): array
    {
        return [
            'delimiter' => ','
        ];
    }

    public function headings(): array
    {
        return [
            'Nama Lengkap',
            'Email',
        ];
    }
}