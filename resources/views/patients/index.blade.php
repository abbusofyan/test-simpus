
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

					<form method="POST" action="{{ route('patients.create') }}">
						@csrf
						<div class="mb-2">
							<x-label value="{{ __('Name') }}" />
							<x-input class="block mt-1 w-full" name="name" :value="old('name')"  autofocus autocomplete="name" />
							@error('name')
					            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
					        @enderror
						</div>
						<div class="mb-2">
						    <x-label for="gender" value="{{ __('Gender') }}" />
						    <select name="gender" id="gender" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
						        <option value="">-- Select Gender --</option>
						        <option value="1" {{ old('gender') == '1' ? 'selected' : '' }}>Male</option>
						        <option value="2" {{ old('gender') == '2' ? 'selected' : '' }}>Female</option>
						    </select>

						    @error('gender')
						        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
						    @enderror
						</div>

						<div class="mb-2">
							<x-label value="{{ __('Birthdate') }}" />
							<x-input class="block mt-1 w-full" type="date" name="birthdate" :value="old('birthdate')"  autofocus autocomplete="birthdate" />
							@error('birthdate')
					            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
					        @enderror
						</div>

						<div class="flex items-center justify-start mt-4">
							<x-button class="ms-4">
								{{ __('Add Patient') }}
							</x-button>
						</div>
					</form>
					<hr class="mt-4 mb-4">

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
									<td>{{ \Carbon\Carbon::parse($p->birthdate)->format('d M Y') }}</td>
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
