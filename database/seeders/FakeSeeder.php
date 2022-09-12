<?php

namespace Database\Seeders;

use App\Models\Aux;
use App\Models\Employee;
use App\Models\ShiftSchedule;
use App\Models\Team;
use Illuminate\Database\Seeder;

class FakeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // TEAMS
        Team::create([
            'name' => 'Diavox',
            'desc' => 'Team Diavox',
            'timezone' => 'Asia/Manila'
        ]);
        Team::create([
            'name' => 'Zonic',
            'desc' => 'Team Zonic',
            'timezone' => 'America/Los_Angeles'
        ]);

        // SHIFT SCHEDULES
        ShiftSchedule::create([
            'title' => 'Day Shift',
            'shift_start' => '08:00',
            'shift_end' => '17:00',
        ]);
        ShiftSchedule::create([
            'title' => 'Mid Shift',
            'shift_start' => '11:00',
            'shift_end' => '20:00',
        ]);
        ShiftSchedule::create([
            'title' => 'Night Shift',
            'shift_start' => '01:00',
            'shift_end' => '23:00',
        ]);

        // AUXES
        Aux::create([
            'aux_main' => 'LOGOUT',
            'aux_sub' => 'LOGOUT',
        ]);
        Aux::create([
            'aux_main' => 'OFF',
            'aux_sub' => 'OFF',
        ]);
        Aux::create([
            'aux_main' => 'ON',
            'aux_sub' => 'Calling',
        ]);
        Aux::create([
            'aux_main' => 'ON',
            'aux_sub' => 'Coaching',
        ]);
        Aux::create([
            'aux_main' => 'ON',
            'aux_sub' => 'Training',
        ]);
        Aux::create([
            'aux_main' => 'BREAK',
            'aux_sub' => 'Snack Break',
        ]);
        Aux::create([
            'aux_main' => 'BREAK',
            'aux_sub' => 'Bio Break',
        ]);
        Aux::create([
            'aux_main' => 'BREAK',
            'aux_sub' => 'Personal Break',
        ]);
        Aux::create([
            'aux_main' => 'OTHER',
            'aux_sub' => 'Pre-shift OT',
        ]);
        Aux::create([
            'aux_main' => 'OTHER',
            'aux_sub' => 'Post-Shift OT',
        ]);
        Aux::create([
            'aux_main' => 'OTHER',
            'aux_sub' => 'Rest-Day OT',
        ]);

        // EMPLOYEES
        Employee::create([
            'first' => 'Kyrie',
            'last' => 'Irving',
            'team' => 'Diavox'
        ]);
        Employee::create([
            'first' => 'Kevin',
            'last' => 'Durant',
            'team' => 'Diavox'
        ]);
        Employee::create([
            'first' => 'James',
            'last' => 'Harden',
            'team' => 'Diavox'
        ]);
        Employee::create([
            'first' => 'Stephen',
            'last' => 'Curry',
            'team' => 'Zonic'
        ]);
        Employee::create([
            'first' => 'Draymond',
            'last' => 'Green',
            'team' => 'Zonic'
        ]);
        Employee::create([
            'first' => 'Klay',
            'last' => 'Thompson',
            'team' => 'Zonic'
        ]);
    }
}
