<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Cetak Laporan - GDSS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* CSS Khusus Cetak */
        @media print {
            body {
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
                background-color: white !important;
            }
            .no-print { display: none; }
            /* Paksa ukuran kertas A4 margin standar */
            @page { size: A4; margin: 2cm; }
        }
    </style>
</head>
<body class="bg-white text-gray-900 font-serif p-8">

    <div class="no-print mb-6">
        <button onclick="window.history.back()" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
            &larr; Kembali
        </button>
        <button onclick="window.print()" class="bg-blue-600 text-white px-4 py-2 rounded ml-2 hover:bg-blue-700">
            🖨️ Print Sekarang
        </button>
    </div>

    <div class="border-b-4 border-double border-black pb-4 mb-8 text-center">
        <h2 class="text-xl font-bold uppercase tracking-widest">Universitas Islam Negeri Maulana Malik Ibrahim Malang</h2>
        <h1 class="text-2xl font-bold uppercase text-blue-900">Sistem Pendukung Keputusan (GDSS)</h1>
        <p class="text-sm text-gray-600 mt-1">Jl. Gajayana. 123, Kota Malang, Jawa Timur</p>
    </div>

    <div class="mb-6">
        <h3 class="text-xl font-bold text-center underline mb-6">{{ $judulLaporan }}</h3>

        <table class="w-full text-sm mb-4">
            <tr>
                <td class="w-32 font-bold">Dicetak Oleh</td>
                <td>: {{ Auth::user()->username }}</td>
                <td class="w-32 font-bold text-right">Tanggal</td>
                <td class="w-40 text-right">: {{ date('d F Y') }}</td>
            </tr>
            <tr>
                <td class="font-bold">Jenis Laporan</td>
                <td>: {{ ucfirst($jenis) }}</td>
                <td></td>
                <td></td>
            </tr>
        </table>
    </div>

    <div class="w-full">
        <table class="w-full border-collapse border border-black">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border border-black px-4 py-2 w-16 text-center">No.</th>
                    <th class="border border-black px-4 py-2 text-left">Kode MK</th>
                    <th class="border border-black px-4 py-2 text-left">Nama Matakuliah</th>
                    <th class="border border-black px-4 py-2 text-center">Nilai Akhir</th>
                </tr>
            </thead>
            <tbody>
                @forelse($data as $index => $item)
                    <tr> 
                        <td class="border border-black px-4 py-2 text-center">{{ $index + 1 }}</td>
                        <td class="border border-black px-4 py-2">{{ $item->kode_mp }}</td>
                        <td class="border border-black px-4 py-2">{{ $item->nama_mp }}</td>
                        <td class="border border-black px-4 py-2 text-center font-bold">
                            {{ number_format($item->nilai, 5) }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="border border-black px-4 py-8 text-center text-gray-500 italic">
                            Tidak ada data untuk semester ini.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-16 flex justify-end">
        <div class="text-center w-64">
            <p class="mb-1">Malang, {{ date('d F Y') }}</p>
            <p class="mb-20">Mengetahui,<br>Kepala Program Studi</p>
            <p class="font-bold underline text-lg">( Kaprodi )</p>
            <p class="text-sm">NIP. 19283719283</p>
        </div>
    </div>

    <script>
        window.onload = function() {
            // Uncomment baris bawah ini kalau mau langsung nge-print pas halaman dibuka
            // window.print();
        }
    </script>

</body>
</html>
