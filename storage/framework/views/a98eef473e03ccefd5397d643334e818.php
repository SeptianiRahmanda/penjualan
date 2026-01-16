<?php $__env->startSection('title', 'Transaksi Penjualan'); ?>

<?php $__env->startSection('content'); ?>
<div class="row justify-content-center">
    <div class="col-md-10">

        <div class="card shadow mb-4">
            <div class="card-body">
                <h4 class="text-center fw-bold text-success mb-3">
                    🧾 Transaksi Penjualan
                </h4>

                <form action="/transaksi" method="POST" class="row g-2">
                    <?php echo csrf_field(); ?>
                    <div class="col-md-5">
                        <select name="produk_id" class="form-select" required>
                            <option value="">-- Pilih Produk --</option>
                            <?php $__currentLoopData = $produk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($p->id); ?>">
                                    <?php echo e($p->nama_produk); ?> - Rp <?php echo e(number_format($p->harga)); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <div class="col-md-3">
                        <input type="number" name="jumlah" class="form-control" placeholder="Jumlah" required>
                    </div>

                    <div class="col-md-2">
                        <button class="btn btn-success w-100 fw-bold">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="card shadow">
            <div class="card-body">
                <a href="<?php echo e(route('transaksi.export.excel')); ?>"
                    class="btn btn-success mb-3">
                        Export Excel
                </a>
                <a href="<?php echo e(route('transaksi.chart')); ?>" 
                        class="btn btn-info mb-3">
                            Lihat Grafik
                </a>
                <a href="<?php echo e(route('transaksi.export.pdf')); ?>"
                    class="btn btn-danger mb-3">
                        Export PDF
                </a>
                <table class="table table-bordered text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Produk</th>
                            <th>Jumlah</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $transaksi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($loop->iteration); ?></td>
                            <td><?php echo e($t->produk->nama_produk); ?></td>
                            <td><?php echo e($t->jumlah); ?></td>
                            <td class="text-end">
                                Rp <?php echo e(number_format($t->total, 0, ',', '.')); ?>

                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\ASUS TUF\Documents\penjualan\resources\views/transaksi/index.blade.php ENDPATH**/ ?>