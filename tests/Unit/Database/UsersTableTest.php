<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

$table = 'users';
$columns = [
    'id' => 'bigint', 
    'email' => 'string', 
    'password' => 'string', 
    'email_verified_at' => 'datetime', 
    'remember_token' => 'string', 
    'created_at' => 'datetime', 
    'updated_at' => 'datetime'
];

it('exists', function() use ($table) {
    expect(Schema::hasTable('users'))->toBeTrue();
});

foreach ($columns as $column => $datatype) {
    it("has $column column", function() use ($table, $column) {
        expect(
            Schema::hasColumn($table, $column)
            && DB::getSchemaBuilder()->getColumnType($table, $column)
        )->toBeTrue();
    });
}




