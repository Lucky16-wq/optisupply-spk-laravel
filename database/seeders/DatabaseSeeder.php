<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Criterion;
use App\Models\Alternative;
use App\Models\Value;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Kriteria default (4)
        $c1 = Criterion::create(['name'=>'Harga','type'=>'cost','weight'=>0.30]);
        $c2 = Criterion::create(['name'=>'Kualitas','type'=>'benefit','weight'=>0.30]);
        $c3 = Criterion::create(['name'=>'Ketepatan Pengiriman','type'=>'benefit','weight'=>0.20]);
        $c4 = Criterion::create(['name'=>'Konsistensi Stok','type'=>'benefit','weight'=>0.20]);

        // 15 supplier contoh
        for ($i=1; $i<=15; $i++) {
            $alt = Alternative::create([
                'name' => "Supplier " . chr(64+$i), // A..O
                'description' => "Supplier contoh nomor {$i}"
            ]);

            // nilai: harga (cost) -> skala 1000..10000, lainnya 1..100
            Value::create(['alternative_id'=>$alt->id,'criterion_id'=>$c1->id,'value'=>rand(2000,10000)]);
            Value::create(['alternative_id'=>$alt->id,'criterion_id'=>$c2->id,'value'=>rand(40,100)]);
            Value::create(['alternative_id'=>$alt->id,'criterion_id'=>$c3->id,'value'=>rand(40,100)]);
            Value::create(['alternative_id'=>$alt->id,'criterion_id'=>$c4->id,'value'=>rand(30,100)]);
        }

        // Admin user
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('password')
        ]);
    }
}
