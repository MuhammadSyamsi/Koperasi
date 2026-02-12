<!-- app/Views/landing_kantin.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Landing Page Kantin Surabaya</title>
  <link rel="shortcut icon" type="image/png" href="assets/images/logos/kantin.png" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-gray-100 text-gray-800">

<div class="max-w-6xl mx-auto px-4 py-10"
     x-data="{
        tab: 'topup',
        topupOpen: true,
        trxOpen: true,
        unliOpen: true,
        topupTotal: 6500000,
        trxTotal: 900000,
        unliTotal: 4500000,
        topup: [
            { tgl: '27/11/2025', val: 6334400 },{ tgl: '28/11/2025', val: 99000 },{ tgl: '29/11/2025', val: 384700 },
            { tgl: '30/11/2025', val: 844000 },{ tgl: '01/12/2025', val: 3913950 },{ tgl: '02/12/2025', val: 300000 },
            { tgl: '03/12/2025', val: 447300 },{ tgl: '04/12/2025', val: 498000 },{ tgl: '05/12/2025', val: 858500 },
            { tgl: '06/12/2025', val: 69000 },{ tgl: '07/12/2025', val: 599000 },{ tgl: '08/12/2025', val: 448000 },
            { tgl: '09/12/2025', val: 249000 },{ tgl: '10/12/2025', val: 298000 },{ tgl: '12/12/2025', val: 1170100 },
            { tgl: '13/12/2025', val: 397000 },{ tgl: '14/12/2025', val: 101000 },{ tgl: '02/01/2026', val: 5983000 },
            { tgl: '03/01/2026', val: 216000 },{ tgl: '04/01/2026', val: 42000 },{ tgl: '05/01/2026', val: 262000 },
            { tgl: '06/01/2026', val: 49000 },{ tgl: '08/01/2026', val: 284000 },{ tgl: '09/01/2026', val: 217000 },
            { tgl: '10/01/2026', val: 1651000 },{ tgl: '11/01/2026', val: 49000 },{ tgl: '12/01/2026', val: 868000 },
            { tgl: '13/01/2026', val: 52000 },{ tgl: '14/01/2026', val: 144000 },{ tgl: '15/01/2026', val: 99000 },
            { tgl: '16/01/2026', val: 99000 },{ tgl: '19/01/2026', val: 148000 },{ tgl: '22/01/2026', val: 61000 },
            { tgl: '23/01/2026', val: 23000 },{ tgl: '24/01/2026', val: 1199000 },{ tgl: '25/01/2026', val: 33000 },
            { tgl: '27/01/2026', val: 19000 },{ tgl: '28/01/2026', val: 885000 },{ tgl: '29/01/2026', val: 49000 },
            { tgl: '31/01/2026', val: 717000 }
        ],
        transaksi: [
            { tgl: '25/11/2025', val: 500 },{ tgl: '28/11/2025', val: 63000 },{ tgl: '30/11/2025', val: 211500 },
            { tgl: '01/12/2025', val: 138000 },{ tgl: '02/12/2025', val: 234500 },{ tgl: '03/12/2025', val: 165500 },
            { tgl: '04/12/2025', val: 25500 },{ tgl: '05/12/2025', val: 360500 },{ tgl: '06/12/2025', val: 332000 },
            { tgl: '07/12/2025', val: 441000 },{ tgl: '09/12/2025', val: 578500 },{ tgl: '10/12/2025', val: 72000 },
            { tgl: '12/12/2025', val: 340000 },{ tgl: '13/12/2025', val: 220000 },{ tgl: '14/12/2025', val: 34000 },
            { tgl: '03/01/2026', val: 460000 },{ tgl: '04/01/2026', val: 386400 },{ tgl: '05/01/2026', val: 189000 },
            { tgl: '06/01/2026', val: 398500 },{ tgl: '07/01/2026', val: 292000 },{ tgl: '08/01/2026', val: 221000 },
            { tgl: '09/01/2026', val: 251500 },{ tgl: '10/01/2026', val: 513000 },{ tgl: '11/01/2026', val: 98500 },
            { tgl: '12/01/2026', val: 198500 },{ tgl: '13/01/2026', val: 791000 },{ tgl: '14/01/2026', val: 578500 },
            { tgl: '15/01/2026', val: 226500 },{ tgl: '16/01/2026', val: 307000 },{ tgl: '17/01/2026', val: 286000 },
            { tgl: '18/01/2026', val: 95000 },{ tgl: '19/01/2026', val: 194500 },{ tgl: '20/01/2026', val: 500000 },
            { tgl: '21/01/2026', val: 321000 },{ tgl: '22/01/2026', val: 198500 },{ tgl: '23/01/2026', val: 386000 },
            { tgl: '24/01/2026', val: 291000 },{ tgl: '25/01/2026', val: 65000 },{ tgl: '26/01/2026', val: 71500 },
            { tgl: '27/01/2026', val: 232000 },{ tgl: '28/01/2026', val: 249500 },{ tgl: '29/01/2026', val: 235000 },
            { tgl: '30/01/2026', val: 116500 },{ tgl: '31/01/2026', val: 145500 }
        ],
        unlimited: [
            { ket: 'ambil uang', val: 392300 },{ ket: 'bayar hutang', val: 96000 },{ ket: 'bayar kalender', val: 100000 },
            { ket: 'bayar minus', val: 27000 },{ ket: 'bayar SPP', val: 300000 },{ ket: 'belanja shoppy', val: 360000 },
            { ket: 'biaya kartu', val: 30000 },{ ket: 'celana pandu', val: 400000 },{ ket: 'denda Tahfiz', val: 1025000 },
            { ket: 'kebutuhan', val: 1356500 },{ ket: 'kelebihan top up', val: 136700 },{ ket: 'ngambil uang', val: 2060000 },
            { ket: 'pengambilan uang mukhoyyamah', val: 4044500 },{ ket: 'salah kirim', val: 300000 }
        ]
     }">

<div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Laporan Keuangan Kantin</h1>
        <p class="text-sm text-gray-500">Periode: 25 November 2025 – 31 Januari 2026</p>
    </div>
    <!-- TABS -->
    <div class="flex flex-wrap gap-2 mb-6">
        <button @click="tab='topup'" :class="tab==='topup' ? 'bg-emerald-600 text-white' : 'bg-white'"
                class="px-5 py-2 rounded-xl shadow font-medium">Top Up Kantin<br><span class="text-sm">Rp 30.159.950</span></button>
        <button @click="tab='transaksi'" :class="tab==='transaksi' ? 'bg-sky-600 text-white' : 'bg-white'"
                class="px-5 py-2 rounded-xl shadow font-medium">Transaksi Kantin<br><span class="text-sm">Rp 11.514.900</span></button>
        <button @click="tab='unlimited'" :class="tab==='unlimited' ? 'bg-purple-600 text-white' : 'bg-white'"
                class="px-5 py-2 rounded-xl shadow font-medium">Unlimited<br><span class="text-sm">Rp 10.628.000</span></button>
    </div>

    <!-- TAB TOP UP -->
    <div x-show="tab==='topup'" x-transition>
        <div class="bg-white rounded-2xl shadow">
            <button @click="topupOpen=!topupOpen" class="w-full flex justify-between items-center px-6 py-5">
                <h2 class="text-lg font-semibold">Detail Top Up</h2>
                <span x-text="topupOpen?'−':'+'"></span>
            </button>
            <div x-show="topupOpen" x-collapse class="border-t p-6 space-y-3">
                <template x-for="item in topup" :key="item.tgl">
                    <div class="bg-gray-50 p-4 rounded-xl">
                        <div class="flex justify-between mb-2">
                            <span x-text="item.tgl"></span>
                            <span class="font-semibold" x-text="'Rp '+item.val.toLocaleString('id-ID')"></span>
                        </div>
                        <div class="h-2 bg-gray-200 rounded-full">
                            <div class="h-2 bg-emerald-500 rounded-full" :style="'width:'+(item.val/topupTotal*100)+'%'"></div>
                        </div>
                    </div>
                </template>
            </div>
        </div>
    </div>

    <!-- TAB TRANSAKSI -->
    <div x-show="tab==='transaksi'" x-transition>
        <div class="bg-white rounded-2xl shadow">
            <button @click="trxOpen=!trxOpen" class="w-full flex justify-between items-center px-6 py-5">
                <h2 class="text-lg font-semibold">Detail Transaksi Kantin</h2>
                <span x-text="trxOpen?'−':'+'"></span>
            </button>
            <div x-show="trxOpen" x-collapse class="border-t p-6 space-y-3">
                <template x-for="item in transaksi" :key="item.tgl">
                    <div class="bg-gray-50 p-4 rounded-xl">
                        <div class="flex justify-between mb-2">
                            <span x-text="item.tgl"></span>
                            <span class="font-semibold" x-text="'Rp '+item.val.toLocaleString('id-ID')"></span>
                        </div>
                        <div class="h-2 bg-gray-200 rounded-full">
                            <div class="h-2 bg-sky-500 rounded-full" :style="'width:'+(item.val/trxTotal*100)+'%'"></div>
                        </div>
                    </div>
                </template>
            </div>
        </div>
    </div>

    <!-- TAB UNLIMITED -->
    <div x-show="tab==='unlimited'" x-transition>
        <div class="bg-white rounded-2xl shadow">
            <button @click="unliOpen=!unliOpen" class="w-full flex justify-between items-center px-6 py-5">
                <h2 class="text-lg font-semibold">Detail Transaksi Unlimited</h2>
                <span x-text="unliOpen?'−':'+'"></span>
            </button>
            <div x-show="unliOpen" x-collapse class="border-t p-6 space-y-3">
                <template x-for="item in unlimited" :key="item.ket">
                    <div class="bg-gray-50 p-4 rounded-xl">
                        <div class="flex justify-between mb-2">
                            <span x-text="item.ket"></span>
                            <span class="font-semibold" x-text="'Rp '+item.val.toLocaleString('id-ID')"></span>
                        </div>
                        <div class="h-2 bg-gray-200 rounded-full">
                            <div class="h-2 bg-purple-500 rounded-full" :style="'width:'+(item.val/unliTotal*100)+'%'"></div>
                        </div>
                    </div>
                </template>
            </div>
        </div>
    </div>

</div>
</body>
</html>
