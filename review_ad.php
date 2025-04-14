<?php
include 'connector.php';

// Proses update status dan unggah sertifikat
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $status = $_POST['status'];

    $sertifikatFile = null;
    if (isset($_FILES['sertifikat']) && $_FILES['sertifikat']['error'] === 0) {
        $ext = pathinfo($_FILES['sertifikat']['name'], PATHINFO_EXTENSION);
        $sertifikatFile = 'uploads/sertifikat_' . $id . '.' . $ext;
        move_uploaded_file($_FILES['sertifikat']['tmp_name'], $sertifikatFile);
    }

    $check = mysqli_query($conn, "SELECT * FROM review_ad WHERE detailpermohonan_id='$id'");
    if (mysqli_num_rows($check) > 0) {
        $query_update = "UPDATE review_ad SET status=?, sertifikat=? WHERE detailpermohonan_id=?";
    } else {
        $query_update = "INSERT INTO review_ad (status, sertifikat, detailpermohonan_id) VALUES (?, ?, ?)";
    }

    $stmt = $conn->prepare($query_update);
    $stmt->bind_param("sss", $status, $sertifikatFile, $id);
    $stmt->execute();
    $stmt->close();
}

$query = "SELECT dp.id, dp.jenis_ciptaan AS judul, dp.uraian_singkat, 
               d.Scan_ktp, d.Contoh_karya, d.SP AS surat_pernyataan, d.SPH AS surat_pengalihan_hak_cipta,
               ra.status, ra.sertifikat 
        FROM detail_permohonan dp 
        JOIN dokumen d ON dp.id = d.id 
        LEFT JOIN review_ad ra ON dp.id = ra.detailpermohonan_id";

$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Permohonan</title>
    <link href="style.css" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            width: 90%;
            margin: 20px auto;
            background: #ffff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .header {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .search-bar {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 20px;
        }

        .search-bar input {
            width: 300px;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            text-align: left;
            padding: 10px;
            border-bottom: 1px solid #ddd;
            vertical-align: middle;
        }

        th {
            background-color: #f9f9f9;
            font-weight: bold;
        }

        .text-center {
            text-align: center;
        }

        .btn-status {
            border: none;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 12px;
        }

        .status-diproses {
            background-color: yellow;
        }

        .status-revisi {
            background-color: red;
            color: white;
        }

        .status-terproses {
            background-color: green;
            color: white;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="header">DAFTAR PERMOHONAN</div>

    <div class="search-bar">
        <input type="text" placeholder="Cari Judul">
    </div>

    <table>
        <thead>
        <tr>
            <th class="text-center">JUDUL</th>
            <th>SCAN KTP</th>
            <th>CONTOH KARYA</th>
            <th>URAIAN SINGKAT</th>
            <th>SURAT PERNYATAAN</th>
            <th>SURAT PENGALIHAN HAK CIPTA</th>
            <th>STATUS</th>
            <th>SERTIFIKAT</th>
        </tr>
        </thead>
        <tbody>
        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <tr>
                <td><?= htmlspecialchars($row['judul']) ?></td>
                <td><a href="unduh.php?id=<?= urlencode($row['Scan_ktp']) ?>">Unduh</a></td>
                <td><a href="unduh.php?id=<?= urlencode($row['Contoh_karya']) ?>">Unduh</a></td>
                <td><?= htmlspecialchars($row['uraian_singkat']) ?></td>
                <td><a href="unduh.php?id=<?= urlencode($row['surat_pernyataan']) ?>">Unduh</a></td>
                <td><a href="unduh.php?id=<?= urlencode($row['surat_pengalihan_hak_cipta']) ?>">Unduh</a></td>
                <td>
                    <form method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                        <select name="status" class="form-select form-select-sm mb-1">
                            <option value="Diproses" <?= $row['status'] === 'Diproses' ? 'selected' : '' ?>>Diproses</option>
                            <option value="Revisi" <?= $row['status'] === 'Revisi' ? 'selected' : '' ?>>Revisi</option>
                            <option value="Terproses" <?= $row['status'] === 'Terproses' ? 'selected' : '' ?>>Terproses</option>
                        </select>
                        <input type="file" name="sertifikat" class="form-control form-control-sm mb-1">
                        <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                    </form>
                </td>
                <td>
                    <?php if (!empty($row['sertifikat'])): ?>
                        <a href="<?= $row['sertifikat'] ?>">Unduh</a>
                    <?php else: ?>
                        <span class="text-muted">Belum tersedia</span>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>

    <div class="mt-4">
        <a href="login_user.php" class="btn btn-success">SEBELUMNYA</a>
    </div>
</div>
</body>
</html>
