<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Carousel;
use App\Models\Kategori;
use App\Models\Layanan;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index()
    {
        $kategoris = Kategori::with('layanans')->get();
        $carousel = Carousel::latest()->get();
        // === BERITA 10 terbaru ===
        $beritaRes = Http::acceptJson()->get(config('services.wp_berita.base', 'https://berita.murungrayakab.go.id/wp-json/wp/v2/posts'), ['_embed' => 1, 'per_page' => 10, 'page' => 1]);

        $berita = collect($beritaRes->ok() ? $beritaRes->json() : [])->map(
            fn($p) => [
                'id' => $p['id'],
                'title' => strip_tags(data_get($p, 'title.rendered', 'Tanpa Judul')),
                'link' => $p['link'],
                'image' => data_get($p, '_embedded.wp:featuredmedia.0.source_url'),
                'excerpt' => Str::limit(strip_tags((string) data_get($p, 'excerpt.rendered', '')), 160),
                'date' => Carbon::parse($p['date'])->translatedFormat('d M Y'),
            ],
        );

        // === PENGUMUMAN 10 terbaru ===
        $pengumumRes = Http::acceptJson()->get(config('services.wp_pengumuman.base', 'https://pengumuman.murungrayakab.go.id/wp-json/wp/v2/posts'), ['_embed' => 1, 'per_page' => 10, 'page' => 1]);

        $pengumuman = collect($pengumumRes->ok() ? $pengumumRes->json() : [])->map(
            fn($p) => [
                'id' => $p['id'],
                'title' => strip_tags(data_get($p, 'title.rendered', 'Tanpa Judul')),
                'link' => $p['link'],
                'image' => data_get($p, '_embedded.wp:featuredmedia.0.source_url'),
                'excerpt' => Str::limit(strip_tags((string) data_get($p, 'excerpt.rendered', '')), 160),
                'date' => Carbon::parse($p['date'])->translatedFormat('d M Y'),
            ],
        );

        return view('frontend.home', compact('berita', 'pengumuman','kategoris','carousel'));
    }

    public function read(string $id)
    {
        //get by ID
        $layanans = Layanan::get();
        $kategoris = Kategori::with('layanans')->findOrFail($id);
        //dd($kategoris->layanans);

        return view('frontend.layanan.show', compact('kategoris'));
    }
}
