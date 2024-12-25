<?php
include_once 'connection.php';

$pageTitle = 'Fasilitas';
include __DIR__ . '/../layouts/header.php';

$sql = "SELECT * FROM facilities ORDER BY id_facility ASC";
$stmt = $db->prepare($sql);
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="main-content container-fluid">
    <div class="page-title">
        <h3>Fasilitas</h3>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <div class="text-end">
                    <button class="btn btn-primary" type="button" id="btn-add-facility"><span
                            data-feather="plus"></span>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped table-border" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Fasilitas</th>
                            <th>Deskripsi</th>
                            <th>Icon</th>
                            <th>Action</th>
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
                                    <td><?= $row['description'] ?></td>
                                    <td><?= $row['icon'] ?></td>
                                    <td>
                                        <div class="btn-group mb-1">
                                            <div class="dropdown">
                                                <button class="btn btn-default btn-sm me-1" type="button"
                                                    id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <i data-feather="menu" width="20"></i>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item btn-action" data-id="<?= $row['id_facility'] ?>"
                                                        data-name="<?= $row['name'] ?>"
                                                        data-description="<?= $row['description'] ?>"
                                                        data-icon="<?= $row['icon'] ?>" data-action="edit" href="#"><i
                                                            data-feather="edit" width="20"></i>
                                                        Edit</a>
                                                    <a class="dropdown-item btn-action" data-id="<?= $row['id_facility'] ?>"
                                                        data-name="<?= $row['name'] ?>" data-action="delete" href="#"><i
                                                            data-feather="trash-2" width="20"></i>Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
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
ob_start();
?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
$js = ob_get_clean();
?>

<?php
ob_start();
?>
<script>
    var endpoint = '<?= route('/admin/facilities-controller') ?>';

    $('#btn-add-facility').click(function () {
        $('#form-id').val('');
        $('#form-name').val('');
        $('#form-icon').val('');
        $('#form-description').val('');
        $('#modalForm .modal-title').text('Tambah Fasilitas');
        $('#modalForm').modal('show');
    })

    $('#facility-form').submit(function (e) {
        e.preventDefault();
        let form = $(this).serialize();
        if ($('#form-id').val() != '') {
            form = form + '&name=update';
        } else {
            form = form + '&name=store';
        }

        $.ajax({
            method: 'POST',
            url: endpoint,
            data: form,
            dataType: 'json',
            success: function (response) {
                if (response.success) {
                    Swal.fire({
                        title: 'Success',
                        text: response.message,
                        icon: 'success',
                        timer: 1500,
                    }).then((result) => {
                        window.location.reload();
                    })
                    $('#modalForm').modal('hide');
                } else {
                    Swal.fire({
                        title: 'Gagal',
                        text: response.message,
                        icon: 'error'
                    })
                }
            }, error: function (error) {
                Swal.fire({
                    title: 'Error',
                    text: 'Terjadi kesalahan jaringan.',
                    icon: 'error'
                })
            }
        })
    })

    $('.btn-action').click(function () {
        const id = $(this).data('id');
        const name = $(this).data('name');
        const action = $(this).data('action');
        if (action == 'delete') {
            Swal.fire({
                title: 'Attention',
                text: `Yakin ingin menghapus fasilitas ${name}`,
                icon: 'info',
                showCancelButton: true
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        method: 'GET',
                        url: `${endpoint}?name=destroy&id=${id}`,
                        dataType: 'json',
                        success: function (response) {
                            if (response.success) {
                                Swal.fire({
                                    title: 'Success',
                                    text: response.message,
                                    icon: 'success',
                                    timer: 1500,
                                }).then((result) => {
                                    window.location.reload();
                                })
                            } else {
                                Swal.fire({
                                    title: 'Gagal',
                                    text: response.message,
                                    icon: 'error'
                                })
                            }
                        }, error: function (error) {
                            Swal.fire({
                                title: 'Error',
                                text: 'Terjadi kesalahan jaringan.',
                                icon: 'error'
                            })
                        }
                    })
                }
            })
        } else {
            const description = $(this).data('description');
            const icon = $(this).data('icon');
            $('#form-id').val(id);
            $('#form-name').val(name);
            $('#form-icon').val(icon);
            $('#form-description').val(description);
            $('#modalForm .modal-title').text('Edit Fasilitas');
            $('#modalForm').modal('show');
        }
    })
</script>
<?php
$scripts = ob_get_clean();
?>

<?php
include __DIR__ . '/../layouts/footer.php';
?>