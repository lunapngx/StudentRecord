<?= $this->extend('layouts/master') ?>

<?= $this->section('content') ?>
    <div class="row">
        <div class="col-lg-12 d-flex align-items-stretch">
            <div class="card w-100">
                <div class="card-body">
                    <h2><?= $title ?? 'Student List' ?></h2>

                    <?php if (session()->getFlashdata('success')) : ?>
                        <div class="alert alert-success">
                            <?= session()->getFlashdata('success') ?>
                        </div>
                    <?php endif; ?>
                    <?php if (session()->getFlashdata('error')) : ?>
                        <div class="alert alert-danger">
                            <?= session()->getFlashdata('error') ?>
                        </div>
                    <?php endif; ?>

                    <a href="<?= base_url('student/add') ?>" class="btn btn-primary mb-3">Add New Student</a>

                    <?php if (!empty($students) && is_array($students)) : ?>
                        <div class="table-responsive">
                            <table class="table text-nowrap mb-0 align-middle">
                                <thead class="text-dark fs-4">
                                <tr>
                                    <th class="border-bottom-0"><b>ID</b></th>
                                    <th class="border-bottom-0"><b>Given Name</b></th>
                                    <th class="border-bottom-0"><b>Surname</b></th>
                                    <th class="border-bottom-0"><b>Course</b></th>
                                    <th class="border-bottom-0"><b>Year Level</b></th>
                                    <th class="border-bottom-0"><b>Email</b></th>
                                    <th class="border-bottom-0"><b>Actions</b></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($students as $student) : ?>
                                    <tr>
                                        <td class="border-bottom-0"><h6 class="fw-semibold mb-0"><?= esc($student['student_id']) ?></h6></td>
                                        <td class="border-bottom-0"><p class="mb-0 fw-normal"><?= esc($student['given_name']) ?></p></td>
                                        <td class="border-bottom-0"><p class="mb-0 fw-normal"><?= esc($student['surname']) ?></p></td>
                                        <td class="border-bottom-0"><p class="mb-0 fw-normal"><?= esc($student['course']) ?></p></td>
                                        <td class="border-bottom-0"><p class="mb-0 fw-normal"><?= esc($student['year_level']) ?></p></td>
                                        <td class="border-bottom-0"><p class="mb-0 fw-normal"><?= esc($student['email']) ?></p></td>
                                        <td class="border-bottom-0">
                                            <a href="<?= base_url('student/edit/' . $student['student_id']) ?>" class="btn btn-info btn-sm">Edit</a>
                                            <a href="<?= base_url('student/delete/' . $student['student_id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this student record?');">Delete</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php else : ?>
                        <p>No student records found.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>