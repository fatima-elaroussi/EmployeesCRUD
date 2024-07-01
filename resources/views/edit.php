<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/css/tailwind.css" rel="stylesheet">
    <title>Edit Employee</title>
</head>
<body>
    <div class="w-full max-w-6xl mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Edit Employee</h1>
        <form action="/update/<?= $employee['id'] ?>" method="POST">
            <div class="mb-4">
                <label for="firstName" class="block text-sm font-medium text-gray-700">First Name</label>
                <input type="text" id="firstName" name="firstName" value="<?= $employee['firstName'] ?>" class="mt-1 p-2 border w-full">
            </div>
            <div class="mb-4">
                <label for="lastName" class="block text-sm font-medium text-gray-700">Last Name</label>
                <input type="text" id="lastName" name="lastName" value="<?= $employee['lastName'] ?>" class="mt-1 p-2 border w-full">
            </div>
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" name="email" value="<?= $employee['email'] ?>" class="mt-1 p-2 border w-full">
            </div>
            <div class="mb-4">
                <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                <input type="text" id="phone" name="phone" value="<?= $employee['phone'] ?>" class="mt-1 p-2 border w-full">
            </div>
            <div class="mb-4">
                <label for="position" class="block text-sm font-medium text-gray-700">Position</label>
                <input type="text" id="position" name="position" value="<?= $employee['position'] ?>" class="mt-1 p-2 border w-full">
            </div>
            <div class="mb-4">
                <label for="salary" class="block text-sm font-medium text-gray-700">Salary</label>
                <input type="number" id="salary" name="salary" value="<?= $employee['salary'] ?>" class="mt-1 p-2 border w-full">
            </div>
            <div class="flex gap-2">
                <button type="submit" class="bg-green-500 text-white px-4 py-2">Save</button>
                <a href="/" class="bg-gray-500 text-white px-4 py-2">Cancel</a>
            </div>
        </form>
    </div>
</body>

<script src="https://cdn.tailwindcss.com"></script>

</html>
