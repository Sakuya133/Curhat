<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MentalTestController extends Controller
{
    // Tampilkan halaman form tes mental
    public function index()
    {
        return view('mentalTest.mental-test');
    }

    // Proses hasil submit tes mental
    public function submit(Request $request)
{
    $totalQuestions = 14;
    $totalScore = 0;

    for ($i = 0; $i < $totalQuestions; $i++) {
        $answer = (int) $request->input("q{$i}", 0);
        $score = max(0, $answer - 1);
        $totalScore += $score;
    }

    // Default
    $category = '';
    $description = '';
    $recommendations = [];

    if ($totalScore < 27) {
        $category = 'Rendah';
        $description = 'Skor Anda menunjukkan bahwa tingkat stres atau tekanan mental Anda tergolong rendah. Terus jaga kesehatan mental Anda!';
        $recommendations = [
            "Kembali kepada rutinitas semula. Sempatkan 1 hari untuk melakukan rutinitas tanpa adanya gangguan.",
            "Bersosialisasi yang tidak intense. Bersosialisasilah dengan teman atau keluargamu yang tidak memakan banyak tenaga.",
            "Salurkan kreativitasmu. Mulailah aktivitas kreatif yang ringan untuk menyalurkan energimu.",
            "Therapeutic support. Cobalah untuk mengikuti sesi konseling atau sesi support group.",
            "Pencapaian kecil. Buatlah pencapaian kecil pada tugasmu di hari itu."
        ];
    } elseif ($totalScore <= 54) {
        $category = 'Sedang';
        $description = 'Skor Anda menunjukkan tingkat stres sedang. Anda mungkin sedang mengalami tekanan, penting untuk istirahat dan mencari dukungan.';
        $recommendations = [
            "Gratitude practice. Tulislah 3 hal yang kamu banggakan hari ini.",
            "Berolahraga. Luangkan 20-30 menit untuk berolahraga sebanyak 3 kali/minggu.",
            "Connection goals. Bersosialisasi kembali dengan teman atau masuklah ke dalam grup.",
            "Micro-journaling. Luangkan waktu selama 5 menit untuk meringkas harimu.",
            "Skill-building. Coba atau latih skill-mu."
        ];
    } else {
        $category = 'Tinggi';
        $description = 'Skor Anda menunjukkan tingkat stres tinggi. Pertimbangkan untuk berbicara dengan profesional atau mencari bantuan segera.';
        $recommendations = [
            "Give back. Cobalah kegiatan sukarela atau jadilah mentor.",
            "Creative expression. Cobalah berkecimpung ke dalam dunia kreatif.",
            "Growth challenge. Buatlah sebuah personal goals.",
            "Mindfulness expansion. Bermeditasi ataupun mulailah membuat journal.",
            "Social expansion. Bergabunglah ke komunitas yang baru atau buatlah koneksi baru."
        ];
    }
    
    return view('mentalTest.result', [
        'totalScore' => $totalScore,
        'category' => $category,
        'description' => $description,
        'recommendations' => $recommendations,
        
    ]);
}

}
