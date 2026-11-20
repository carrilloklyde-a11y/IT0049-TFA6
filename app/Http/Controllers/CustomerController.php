<?php

namespace App\Http\Controllers;

use App\Models\Customer;

class CustomerController extends Controller
{
    public static function samples(): array
    {
        return [
            ['full_name' => 'Isabel Santos', 'email' => 'isabel@example.com', 'phone' => '0917 555 0101'],
            ['full_name' => 'Miguel Reyes', 'email' => 'miguel@example.com', 'phone' => '0917 555 0102'],
            ['full_name' => 'Sofia Cruz', 'email' => 'sofia@example.com', 'phone' => '0917 555 0103'],
            ['full_name' => 'Lucas Garcia', 'email' => 'lucas@example.com', 'phone' => '0917 555 0104'],
            ['full_name' => 'Amara Flores', 'email' => 'amara@example.com', 'phone' => '0917 555 0105'],
            ['full_name' => 'Ethan Lim', 'email' => 'ethan@example.com', 'phone' => '0917 555 0106'],
        ];
    }

    public function index()
    {
        $records = config('cafe.data_source') === 'arrays'
            ? self::samples()
            : Customer::orderBy('full_name')->get()->toArray();

        return view('accounts', ['records' => $records, 'kind' => 'customers']);
    }
}
