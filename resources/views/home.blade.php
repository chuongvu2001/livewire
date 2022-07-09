<!DOCTYPE html>
<html>
<head>
    <title>Laravel 8 Livewire Datatables</title>
    @livewireStyles
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
<div class="container mx-auto">
    <h1 class="py-2 text-xl text-center">Laravel 8 Livewire Datatables</h1>
    <div class="py-4">
        <livewire:users-table model="App\Models\User"
                              include="id, name, email, phone, address, created_at"
                              dates="created_at"
                              searchable="name, email, phone"
                              exportable/>
    </div>
</div>
</body>
@livewireScripts
</html>
