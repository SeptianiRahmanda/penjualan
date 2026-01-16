<?php $__env->startSection('title', 'Data Kategori'); ?>

<?php $__env->startSection('content'); ?>

<div class="card shadow">
    <div class="card-body">

        <h4 class="fw-bold mb-3">📂 Data Kategori</h4>

        <form action="/kategori" method="POST" class="mb-3">
            <?php echo csrf_field(); ?>
            <div class="input-group">
                <input type="text" name="nama_kategori" class="form-control" placeholder="Nama Kategori" required>
                <button class="btn btn-primary">Tambah</button>
            </div>
        </form>

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>

                <?php $__currentLoopData = $kategori; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($loop->iteration); ?></td>
                    <td><?php echo e($k->nama_kategori); ?></td>
                    <td>
                        <a href="/kategori/<?php echo e($k->id); ?>/edit" class="btn btn-warning btn-sm">
                            Edit
                        </a>

                        <form action="/kategori/<?php echo e($k->id); ?>" method="POST" class="d-inline">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button class="btn btn-danger btn-sm"
                                onclick="return confirm('Yakin hapus data?')">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </tbody>
        </table>

    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\ASUS TUF\Documents\penjualan\resources\views/kategori/index.blade.php ENDPATH**/ ?>