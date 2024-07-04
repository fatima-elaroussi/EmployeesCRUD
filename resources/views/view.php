<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/css/tailwind.css" rel="stylesheet">
    <title>View Employee Details</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="w-full max-w-6xl mx-auto p-4">
        <h1 class="text-2xl font-bold mb-12">View Employee Details</h1>
        <div class="mb-4  flex">
                <!-- <label for="firstName" class="block text-lg font-medium text-black">Image :</label> -->
                <img src="<?= htmlspecialchars($employee['image']); ?>" alt="Employee Image" class="w-16 h-16 object-cover rounded-full">

                
            </div>
            <div class="mb-4 gap-x-20 flex">
                <label for="firstName" class="block text-lg font-medium text-black">First Name :</label>
                <label for="firstName" class="block text-lg font-medium text-gray-700"><?= $employee['firstName'] ?></label>
                
            </div>
            <div class="mb-4 gap-x-20 flex">
                <label for="lastName" class="block text-lg font-medium text-black">Last Name :</label>
                <label for="lastName" class="block text-lg font-medium text-gray-700"><?= $employee['lastName'] ?></label>
                
            </div>
            <div class="mb-4 gap-x-16 flex">
                <label for="date_of_birth" class="block text-lg font-medium text-black">Date of Birth :</label>
                <label for="date_of_birth" class="block text-lg font-medium text-gray-700"><?= $employee['date_of_birth'] ?></label>
                
            </div>
            <div class="mb-4 gap-x-28 flex">
                <label for="email" class="block text-xl font-medium text-black">Email     :</label>
                <label for="email" class="block text-lg font-medium text-gray-700"><?= $employee['email'] ?></label>
                
            </div>
            <div class="mb-4 gap-x-28 flex">
                <label for="phone" class="block text-lg font-medium text-black">Phone :</label>
                <label for="phone" class="block text-lg font-medium text-gray-700"><?= $employee['phone'] ?></label>
                
            </div>
            <div class="mb-4 gap-x-24 flex">
                <label for="position" class="block text-lg font-medium text-black">Position :</label>
                <label for="position" class="block text-lg font-medium text-gray-700"><?= $employee['position'] ?></label>
                
            </div>
            <div class="mb-4 gap-x-28 flex">
                <label for="salary" class="block text-lg font-medium text-black">Salary :</label>
                <label for="salary" class="block text-lg font-medium text-gray-700"><?= $employee['salary'] ?></label>
                
            </div>
            <div class="flex gap-2 mt-8">
            
            <a href="/" class="bg-orange-500 text-white px-4 py-2 rounded">Back To Dashboard</a>
            </div>
      
    </div>
</body>



</html>
