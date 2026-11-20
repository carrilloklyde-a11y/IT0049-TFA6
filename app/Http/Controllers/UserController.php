<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public static function samples(): array
    {
        return [
            ['username' => 'ella.manager', 'full_name' => 'Ella Mendoza', 'role' => 'Manager'],
            ['username' => 'nico.barista', 'full_name' => 'Nico Ramos', 'role' => 'Barista'],
            ['username' => 'mia.cashier', 'full_name' => 'Mia Torres', 'role' => 'Cashier'],
            ['username' => 'leo.barista', 'full_name' => 'Leo Bautista', 'role' => 'Barista'],
            ['username' => 'ava.kitchen', 'full_name' => 'Ava Tan', 'role' => 'Kitchen'],
            ['username' => 'noah.cashier', 'full_name' => 'Noah Villanueva', 'role' => 'Cashier'],
        ];
    }

    public function index()
    {
        $records = config('cafe.data_source') === 'arrays'
            ? self::samples()
            : User::orderBy('full_name')->get()->toArray();

        return view('accounts', ['records' => $records, 'kind' => 'users']);
    }
}
