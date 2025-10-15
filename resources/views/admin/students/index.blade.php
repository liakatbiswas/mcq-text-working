<x-app-layout>
    <div class="py-4 -mx-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <div class="flex items-center justify-between mb-8">
                        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                            Students
                        </h2>
                        <a href="{{ route('admission.create') }}" class="btn-primary text-center">
                            Add Student
                            <p class="text-[10px] text-black hover:text-red-400">Frontend থেকে রেজিস্ট্রেশন হবে</p>
                        </a>
                    </div>

                    <livewire:admin.student.student-index />

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
