<link rel="stylesheet" href="/assets/css/style.css">
<form action="" method="POST">
    <legend>Edit Employee</legend>
    <input type="text" name="name" placeholder="name" value="<?= $employee->name ?>">
    <input type="text" name="address" placeholder="address" value="<?= $employee->address ?>">
    <input type="number" name="age" id="" placeholder="age" value="<?= $employee->age ?>">
    <input type="number" name="salary" id="" placeholder="salary" value="<?= $employee->salary ?>">
    <input type="number" name="tax" id="" placeholder="tax" step="0.01" value="<?= $employee->tax ?>">
    <input type="submit" value="add">
</form>