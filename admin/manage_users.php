<?php
require_once "../config/database.php";
require_once "../public/session.php"; // Quản lý phiên
checkAdmin(); // Kiểm tra xem user có phải admin không

$stmt = $conn->prepare("SELECT * FROM users");
$stmt->execute();
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?php include 'header_admin.php'; ?>

<body>
    <div class="pc-container">
        <div class="pc-content">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mb-4">Quản lý người dùng</h2>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Tên người dùng</th>
                                    <th>Email</th>
                                    <th>Vai trò</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($users as $user): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($user["id"]) ?></td>
                                        <td><?= htmlspecialchars($user["username"]) ?></td>
                                        <td><?= htmlspecialchars($user["email"]) ?></td>
                                        <td><?= htmlspecialchars($user["role"]) ?></td>
                                        <td>
                                            <a href="edit_role.php?id=<?= htmlspecialchars($user["id"]) ?>" class="btn btn-sm btn-warning">Sửa vai trò</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<?php include 'footer_admin.php'; ?>