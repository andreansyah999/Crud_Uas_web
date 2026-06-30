<?php

namespace Database\Seeders;

use App\Models\PemainOlahraga;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class PemainOlahragaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Definisikan folder sumber gambar sementara & nama file gambar
        // Letakkan gambar 'badminton.jpg', 'futsal.jpg', dan 'marathon.jpg' di folder ini sebelum running db:seed
        $sourceDir = database_path('seeders/images');
        
        $images = [
            'badminton.jpg',
            'futsal.jpg',
            'marathon.jpg'
        ];

        // 2. Pastikan folder tujuan di Storage disk 'public/events' sudah ada
        if (!Storage::disk('public')->exists('events')) {
            Storage::disk('public')->makeDirectory('events');
        }

        // 3. Pindahkan file fisik gambar ke Storage disk 'public/events'
        foreach ($images as $filename) {
            $sourcePath = $sourceDir . '/' . $filename;
            $destinationPath = 'events/' . $filename;

            if (File::exists($sourcePath)) {
                // Membaca file asli lalu menyimpannya ke storage public
                $fileContent = File::get($sourcePath);
                Storage::disk('public')->put($destinationPath, $fileContent);
                $this->command->info("Gambar {$filename} berhasil disalin ke Storage public/events.");
            } else {
                $this->command->warn("Peringatan: File gambar {$filename} tidak ditemukan di {$sourceDir}.");
            }
        }

        // 4. Masukkan data dummy UAS sesuai ketentuan soal
        $eventData = [
            [
                'nama_event' => 'Turnamen Bulutangkis Tunggal Putra',
                'tanggal' => '2026-07-15',
                'tempat' => 'GOR Bulutangkis Unpam',
                'penanggung_jawab' => 'Jonatan Christie',
                'gambar' => 'events/badminton.jpg',
            ],
            [
                'nama_event' => 'Liga Futsal Antar Kelas SI',
                'tanggal' => '2026-08-20',
                'tempat' => 'Futsal Corner Serpong',
                'penanggung_jawab' => 'Bambang Bayu Saptaji',
                'gambar' => 'events/futsal.jpg',
            ],
            [
                'nama_event' => 'Marathon City Festival 10K',
                'tanggal' => '2026-09-10',
                'tempat' => 'Jalan Raya Puspitek',
                'penanggung_jawab' => 'Agus Prayogo',
                'gambar' => 'events/marathon.jpg',
            ],
        ];

        // Kosongkan tabel terlebih dahulu untuk menghindari duplikasi data
        PemainOlahraga::truncate();

        // Lakukan pengisian data
        foreach ($eventData as $data) {
            PemainOlahraga::create($data);
        }

        $this->command->info("Seeder PemainOlahragaSeeder berhasil dijalankan dengan 3 data event dummy.");
    }
}
