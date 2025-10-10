<x-app-layout>
    <div class="py-4 -mx-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <div class="flex items-center justify-between mb-8">
                        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                            Create Role
                        </h2>
                        <a href="{{ route('roles.index') }}" class="btn-primary">
                            Role List
                        </a>
                    </div>

                    <livewire:admin.role.role-create />

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
