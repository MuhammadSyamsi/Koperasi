<?= $this->extend('template'); ?>
<?= $this->section('konten'); ?>

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Daftar Invoice</h3>
        <a href="<?= base_url('invoice/create'); ?>" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Tambah Invoice
        </a>
    </div>

    <table class="table table-bordered table-striped" id="table-invoice">
        <thead>
            <tr>
                <th>No</th>
                <th>Nomor Invoice</th>
                <th>Tanggal</th>
                <th>Total</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
</div>

<script>
async function loadInvoice() {
    const res = await fetch("<?= base_url('invoice/getData'); ?>");
    const data = await res.json();
    const tbody = document.querySelector('#table-invoice tbody');
    tbody.innerHTML = '';
    data.forEach((inv, i) => {
        tbody.innerHTML += `
            <tr>
                <td>${i+1}</td>
                <td>${inv.nomor_invoice}</td>
                <td>${inv.tanggal}</td>
                <td>Rp ${new Intl.NumberFormat('id-ID').format(inv.total_tagihan)}</td>
                <td>
                    <span class="badge bg-${inv.status === 'PAID' ? 'success' : inv.status === 'PARTIAL' ? 'warning' : 'danger'}">
                        ${inv.status}
                    </span>
                </td>
<td>
    <a href="<?= base_url('invoice/view'); ?>/${inv.id_invoice}" class="btn btn-sm btn-info">
        <i class="bi bi-eye"></i> Detail
    </a>
    <?php //if (logged_in()): ?>
    <a href="<?= base_url('invoice/edit'); ?>/${inv.id_invoice}" class="btn btn-sm btn-warning ms-1">
        <i class="bi bi-pencil-square"></i> Edit
    </a>
    <?php //endif; ?>
</td>
            </tr>
        `;
    });
}
loadInvoice();
</script>

<?= $this->endSection(); ?>
