
<!-- resources/views/patients/index.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Patients') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Flash message -->
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Gender</th>
                                <th>Birthdate</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($patients as $p)
                                <tr>
                                    <td>{{ $p->id }}</td>
                                    <td>{{ $p->name }}</td>
                                    <!-- BUG: gender displayed raw numeric -->
                                    <td>{{ $p->gender }}</td>
                                    <!-- BUG: birthdate shown raw string -->
                                    <td>{{ $p->birthdate }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <a href="/patients/create" class="btn btn-primary">Add Patient</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
