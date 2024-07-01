<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Management</title>
    <!-- Link to Tailwind CSS -->
    <link rel="stylesheet" href="/css/tailwind.css">
    <!-- Other styles or scripts -->
</head>
<body>
    <!-- Your existing HTML content -->
    <div class="w-full max-w-6xl mx-auto p-4">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold">Employees</h1>
            <a href="/create" class="bg-[#20B486] hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Add
            </a>
        </div>
        <div class="border rounded-lg overflow-auto">
            <table class="w-full table-auto">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="px-4 py-2">First Name</th>
                        <th class="px-4 py-2">Last Name</th>
                        <th class="px-4 py-2">Email</th>
                        <th class="px-4 py-2">Phone</th>
                        <th class="px-4 py-2">Position</th>
                        <th class="px-4 py-2">Salary</th>
                        <th class="px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($employees as $employee): ?>
                        <tr class="border-b">
                            <td class="px-4 py-2">
                                <?= htmlspecialchars($employee['firstName']); ?>
                            </td>
                            <td class="px-4 py-2">
                                <?= htmlspecialchars($employee['lastName']); ?>
                            </td>
                            <td class="px-4 py-2">
                                <?= htmlspecialchars($employee['email']); ?>
                            </td>
                            <td class="px-4 py-2">
                                <?= htmlspecialchars($employee['phone']); ?>
                            </td>
                            <td class="px-4 py-2">
                                <?= htmlspecialchars($employee['position']); ?>
                            </td>
                            <td class="px-4 py-2">
                                $<?= number_format($employee['salary'], 2); ?>
                            </td>
                            <td class="px-4 py-2">
                                <div class="flex gap-2">
                                    <a href="/edit/<?= htmlspecialchars($employee['id']); ?>" class="bg-blue-300 hover:bg-gray-300 text-gray-800 font-bold py-2 px-4 rounded">
                                        Edit
                                    </a>
                                    <form action="/delete/<?= htmlspecialchars($employee['id']); ?>" method="POST">
                                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Other scripts or footer content -->
</body>
</html>

<script src="https://cdn.tailwindcss.com"></script>
