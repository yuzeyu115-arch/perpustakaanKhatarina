<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Book;
use App\Models\Member;
use App\Models\Borrow;
use App\Models\Purchase;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Seed Books
        $book1 = Book::create([
            'title' => 'Broken Home',
            'author' => 'Ma\'ma Mumajad, S.Pd, M.Pd.',
            'publisher' => 'Penerbit Utama',
            'year' => 2024,
            'category' => 'Novel',
            'description' => 'Kisah pelik sebuah keluarga yang menghadapi kehancuran, menceritakan sudut pandang anak yang menjadi korban broken home.',
            'cover' => 'broken_home.png',
            'price' => 0,
        ]);

        $book2 = Book::create([
            'title' => 'Broken Strings',
            'author' => 'Aurélie Moeremans',
            'publisher' => 'Penerbit Kita',
            'year' => 2025,
            'category' => 'Memoir',
            'description' => 'Sebuah memoar mendalam mengenai kepingan masa muda yang patah, merajut kembali harapan dari benang yang terputus.',
            'cover' => 'broken_strings.png',
            'price' => 75000,
        ]);

        $book3 = Book::create([
            'title' => 'Ayah, Ini Arahnya Ke Mana, Ya?',
            'author' => 'Khoirul Trian',
            'publisher' => 'Penerbit Utama',
            'year' => 2023,
            'category' => 'Novel',
            'description' => 'Kisah hangat dan penuh emosi menceritakan tentang perjalanan seorang ayah dan anak kecil yang kehilangan arah jalan pulang.',
            'cover' => 'ayah_ini_arahnya_ke_mana.png',
            'price' => 0,
        ]);

        $book4 = Book::create([
            'title' => 'Hikmah Di Balik Broken Home',
            'author' => 'Khoirul Anwar, S.Th.I., Gr.',
            'publisher' => 'Indocamp',
            'year' => 2022,
            'category' => 'Self-Improvement',
            'description' => 'Buku ini menyajikan hikmah dan motivasi mendalam bagi individu yang mengalami masa-masa sulit dalam broken home.',
            'cover' => 'hikmah_di_balik_broken_home.png',
            'price' => 65000,
        ]);

        $book5 = Book::create([
            'title' => 'Rumah yang Hampir Runtuh',
            'author' => 'Agung Setiyo Wibowo',
            'publisher' => 'Penerbit Kita',
            'year' => 2021,
            'category' => 'Finansial',
            'description' => 'Membahas secara mendalam tentang beberapa kesalahan finansial yang mengikis keberkahan hidup tanpa sadar, dan cara membangun pondasi rumah tangga yang kokoh.',
            'cover' => 'rumah_yang_hampir_runtuh.png',
            'price' => 85000,
        ]);

        // 2. Seed Members
        $member1 = Member::create([
            'membership_id' => 'LIB-MEMBER1',
            'name' => 'Budi Santoso',
            'email' => 'budi@itsk.ac.id',
            'phone' => '081234567890',
            'address' => 'Jl. Soekarno Hatta No. 12, Malang',
        ]);

        $member2 = Member::create([
            'membership_id' => 'LIB-MEMBER2',
            'name' => 'Siti Aminah',
            'email' => 'siti@itsk.ac.id',
            'phone' => '081298765432',
            'address' => 'Jl. RS dr. Soepraoen No. 5, Malang',
        ]);

        // 3. Seed Borrows (Peminjaman)
        Borrow::create([
            'book_id' => $book1->id,
            'member_id' => $member1->id,
            'borrow_date' => now()->subDays(5)->toDateString(),
            'return_deadline' => now()->addDays(2)->toDateString(),
            'status' => 'borrowed',
        ]);

        // 4. Seed Purchases (Pembelian)
        Purchase::create([
            'book_id' => $book2->id,
            'member_id' => $member2->id,
            'amount' => 75000,
            'payment_method' => 'QRIS',
            'status' => 'paid',
        ]);

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
