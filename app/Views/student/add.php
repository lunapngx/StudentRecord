<?= $this->extend('layouts/master') ?>

<?= $this->section('content') ?>
    <div class="row">
        <div class="col-lg-12 d-flex align-items-stretch">
            <div class="card w-100">
                <div class="card-body">
                    <h2>Add New Student</h2>
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
                    <?php if (session()->getFlashdata('errors')) : ?>
                        <div class="alert alert-danger">
                            <ul>
                                <?php foreach (session()->getFlashdata('errors') as $error) : ?>
                                    <li><?= $error ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                    <form method="POST" action="<?= base_url('student/store') ?>">
                        <?= csrf_field() ?>
                        <div class="form-group mb-3">
                            <label for="given_name">Given Name</label>
                            <input type="text" class="form-control" id="given_name" name="given_name" value="<?= old('given_name') ?>" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="middle_name">Middle Name</label>
                            <input type="text" class="form-control" id="middle_name" name="middle_name" value="<?= old('middle_name') ?>">
                        </div>
                        <div class="form-group mb-3">
                            <label for="surname">Surname</label>
                            <input type="text" class="form-control" id="surname" name="surname" value="<?= old('surname') ?>" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="course">Course</label>
                            <input type="text" class="form-control" id="course" name="course" value="<?= old('course') ?>" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="year_level">Year Level</label>
                            <input type="number" class="form-control" id="year_level" name="year_level" value="<?= old('year_level') ?>" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?= old('email') ?>" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="age">Age</label>
                            <input type="number" class="form-control" id="age" name="age" value="<?= old('age') ?>" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="phone_number">Phone Number</label>
                            <input type="text" class="form-control" id="phone_number" name="phone_number" value="<?= old('phone_number') ?>" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="contact_person_name">Contact Person Name</label>
                            <input type="text" class="form-control" id="contact_person_name" name="contact_person_name" value="<?= old('contact_person_name') ?>" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="contact_person_number">Contact Person Number</label>
                            <input type="text" class="form-control" id="contact_person_number" name="contact_person_number" value="<?= old('contact_person_number') ?>" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="address">Address</label>
                            <textarea class="form-control" id="address" name="address" required><?= old('address') ?></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Student</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>