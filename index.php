<?php
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $id = $_POST['id'];
    $name = $_POST['name'];
    $dob = $_POST['dob'];
    $address = $_POST['address'];

    // Create an employee array
    $employee = [
        'id' => $id,
        'name' => $name,
        'dob' => $dob,
        'address' => $address
    ];

    // Save the employee data in a session variable
    $_SESSION['employees'][] = $employee;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1>Employee Form</h1>
    <form method="POST" class="mb-4">
        <div class="mb-3">
            <label for="id" class="form-label">Employee ID</label>
            <input type="text" class="form-control" id="id" name="id" required>
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="dob" class="form-label">Date of Birth</label>
            <input type="date" class="form-control" id="dob" name="dob" required>
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <textarea class="form-control" id="address" name="address" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <?php if (isset($_SESSION['employees']) && count($_SESSION['employees']) > 0): ?>
        <h2>Employee List</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Date of Birth</th>
                    <th>Address</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($_SESSION['employees'] as $employee): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($employee['id']); ?></td>
                        <td><?php echo htmlspecialchars($employee['name']); ?></td>
                        <td><?php echo htmlspecialchars($employee['dob']); ?></td>
                        <td><?php echo htmlspecialchars($employee['address']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>