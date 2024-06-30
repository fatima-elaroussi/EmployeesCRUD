<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/css/tailwind.css" rel="stylesheet">
    <title>Employee List</title>
</head>
<body>
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold">Employees</h1>
        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="py-2">Name</th>
                    <th class="py-2">Position</th>
                    <th class="py-2">Salary</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($employees as $employee): ?>
                <tr>
                    <td class="border px-4 py-2"><?= $employee['name'] ?></td>
                    <td class="border px-4 py-2"><?= $employee['position'] ?></td>
                    <td class="border px-4 py-2"><?= $employee['salary'] ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <form action="/store" method="POST" class="mt-4">
            <input type="text" name="name" placeholder="Name" class="border p-2">
            <input type="text" name="position" placeholder="Position" class="border p-2">
            <input type="number" name="salary" placeholder="Salary" class="border p-2">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2">Add</button>
        </form>
    </div>
</body>
</html>
