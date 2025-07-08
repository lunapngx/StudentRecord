<?= $this->extend('layouts/master') ?>
<?= $this->section('content') ?>

<div class="card w-100">
    <div class="card-body">
        <h2>Welcome, Students!</h2>
        <div class="table-responsive">
            <table class="table text-nowrap mb-0 align-middle">
                <thead class="text-dark fs-4">
                <tr>
                    <th>Name</th>
                    <th>Course</th>
                </tr>
                </thead>
                <tbody>
                <?php if (!empty($students)): ?>
                    <?php foreach ($students as $student): ?>
                        <tr>
                            <td>
                                <a href="<?= base_url('student/details/' . esc($student['student_id'])) ?>">
                                    <?= esc($student['given_name'] . ' ' . $student['surname']) ?>
                                </a>
                            </td>
                            <td><?= esc($student['course']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr><td colspan="2">No students found</td></tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
        <p>Total students added: <?= esc($total) ?></p>
    </div>
</div>

<?= $this->endSection() ?>
