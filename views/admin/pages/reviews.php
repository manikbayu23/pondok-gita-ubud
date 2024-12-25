<?php
include_once 'connection.php';

$pageTitle = 'Ulasan';
include __DIR__ . '/../layouts/header.php';

$sql = "SELECT * FROM reviews ORDER BY id_review DESC";
$stmt = $db->prepare($sql);
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="main-content container-fluid">
    <div class="page-title">
        <h3>Ulasan</h3>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-body">
                <table class="table table-striped table-border" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Country</th>
                            <th>Subject</th>
                            <th>Message</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (count($rows) > 0):
                            foreach ($rows as $key => $row) {
                                ?>
                                <tr>
                                    <td><?= $key + 1 ?></td>
                                    <td><?= $row['name'] ?></td>
                                    <td><?= $row['email'] ?></td>
                                    <td><?= $row['country'] ?></td>
                                    <td><?= $row['subject'] ?></td>
                                    <td><?= $row['message'] ?></td>
                                </tr>
                                <?php
                            }
                        else:
                            ?>
                            <tr>
                                <td colspan="5" class="text-center">Tidak ada data.</td>
                            </tr>
                        <?php endif ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>

<div class="modal fade text-left" id="modalForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"> </h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form id="facility-form">
                <div class="modal-body">
                    <input type="hidden" id="form-id" name="id_facility">
                    <div class="form-group">
                        <label>Nama Fasilitas: </label>
                        <input type="text" name="facility_name" id="form-name" placeholder="Nama Fasilitas"
                            class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Icon: </label>
                        <input type="text" name="icon" id="form-icon" placeholder="Nama Fasilitas" class="form-control"
                            required>
                    </div>
                    <div class="form-group">
                        <label>Deskripsi: </label>
                        <textarea name="description" id="form-description" placeholder="Deskripsi Fasilitas"
                            class="form-control" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </button>
                    <button type="submit" class="btn btn-primary ml-1">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Submit</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
include __DIR__ . '/../layouts/footer.php';
?>