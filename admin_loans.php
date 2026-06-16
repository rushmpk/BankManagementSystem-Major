<?php
include 'db.php';

$result = $conn->query("SELECT * FROM loans");
?>

<div style="font-family: Arial, sans-serif; padding:30px; background:#f4f4f9; min-height:100vh;">
    <h2 style="color:#333;">All Loan Applications</h2>

    <table style="border-collapse: collapse; width: 100%; background:#fff; box-shadow:0 0 10px rgba(0,0,0,0.1); margin-top:20px;">
        <tr style="background-color:#007BFF; color:white;">
            <th style="padding:12px; border:1px solid #ddd;">ID</th>
            <th style="padding:12px; border:1px solid #ddd;">Name</th>
            <th style="padding:12px; border:1px solid #ddd;">Type</th>
            <th style="padding:12px; border:1px solid #ddd;">Amount</th>
            <th style="padding:12px; border:1px solid #ddd;">Status</th>
            <th style="padding:12px; border:1px solid #ddd;">Action</th>
        </tr>

        <?php while($row = $result->fetch_assoc()): ?>
        <tr style="text-align:center; border:1px solid #ddd; background-color:#f9f9f9;">
            <td style="padding:10px; border:1px solid #ddd;"><?= $row['id'] ?></td>
            <td style="padding:10px; border:1px solid #ddd;"><?= htmlspecialchars($row['name']) ?></td>
            <td style="padding:10px; border:1px solid #ddd;"><?= $row['loan_type'] ?></td>
            <td style="padding:10px; border:1px solid #ddd;"><?= $row['loan_amount'] ?></td>
            <td style="padding:10px; border:1px solid #ddd;"><?= $row['status'] ?></td>
            <td style="padding:10px; border:1px solid #ddd;">
                <?php if($row['status'] != 'Approved'): ?>
                    <a href="approve.php?id=<?= $row['id'] ?>" style="padding:5px 10px; background-color:#28A745; color:white; text-decoration:none; border-radius:4px;">Approve</a>
                <?php else: ?>
                    <span style="color:green; font-weight:bold;">Approved</span>
                <?php endif; ?>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>

    <a href="admin_home.php" style="display:inline-block; margin-top:20px; padding:10px 20px; background-color:#007BFF; color:white; text-decoration:none; border-radius:5px;">Back to Home</a>
</div>

<?php
$conn->close();
?>