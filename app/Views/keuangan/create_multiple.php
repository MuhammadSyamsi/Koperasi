<?= $this->extend('template'); ?>
<?= $this->section('konten'); ?>

<div class="container mt-3">
    <h4>Tambah Multiple Transaksi Keuangan</h4>
    <form action="<?= base_url('keuangan/multipleStore'); ?>" method="post" id="multiForm">
        <?= csrf_field(); ?>
        <div id="formRows">
            <div class="row g-2 mb-3 form-row">
                <div class="col-md-2">
                    <select name="unit[]" class="form-control" required>
                        <option value="kantin">Kantin</option>
                        <option value="laundry">Laundry</option>
                        <option value="pembiayaan">Pembiayaan</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <select name="catatan[]" class="form-control" required>
                        <option value="Pemasukan">Pemasukan</option>
                        <option value="Pengeluaran">Pengeluaran</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <input type="date" name="tanggal[]" class="form-control" required>
                </div>
                <div class="col-md-2">
                    <input type="text" name="jumlah[]" class="form-control jumlah" placeholder="Nominal" required>
                </div>
                <div class="col-md-3">
                    <input type="text" name="keterangan[]" class="form-control" placeholder="Keterangan" required>
                </div>
                <div class="col-md-1 d-flex align-items-center">
                    <button type="button" class="btn btn-danger btn-sm remove-row"><i class="bi bi-x-lg"></i></button>
                </div>
            </div>
        </div>
        <button type="button" class="btn btn-secondary" id="addRow"><i class="bi bi-plus-lg"></i> Tambah Baris</button>
        <button type="submit" class="btn btn-primary">Simpan Semua</button>
    </form>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    // Tambah baris
    document.getElementById("addRow").addEventListener("click", function () {
        let formRows = document.getElementById("formRows");
        let newRow = formRows.firstElementChild.cloneNode(true);
        newRow.querySelectorAll("input").forEach(input => input.value = "");
        formRows.appendChild(newRow);

        // re-init Cleave pada input baru
        initCleave();
    });

    // Hapus baris
    document.getElementById("formRows").addEventListener("click", function (e) {
        if (e.target.closest(".remove-row")) {
            if (document.querySelectorAll("#formRows .form-row").length > 1) {
                e.target.closest(".form-row").remove();
            }
        }
    });

    // Inisialisasi Cleave
    function initCleave() {
        document.querySelectorAll(".jumlah").forEach(function (el) {
            if (!el.cleave) {
                el.cleave = new Cleave(el, {
                    numeral: true,
                    numeralThousandsGroupStyle: 'thousand',
                    delimiter: '.',
                    numeralDecimalMark: ',',
                    numeralDecimalScale: 0
                });
            }
        });
    }
    initCleave();
});
</script>

<?= $this->endSection(); ?>
