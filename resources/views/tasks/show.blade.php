<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Task Details') }}
            </h2>
            <div>
                <a href="{{ route('tasks.edit', $task) }}" class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded mr-2">
                    {{ __('Edit') }}
                </a>
                <a href="{{ route('tasks.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                    {{ __('Back to Tasks') }}
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="mb-6">
                        <h3 class="text-2xl font-bold text-gray-900 mb-2">{{ $task->title }}</h3>
                        
                        @php
                            $statusColors = [
                                'pending' => 'bg-yellow-100 text-yellow-800',
                                'in_progress' => 'bg-blue-100 text-blue-800',
                                'completed' => 'bg-green-100 text-green-800',
                            ];
                            $statusLabels = [
                                'pending' => 'Pending',
                                'in_progress' => 'In Progress',
                                'completed' => 'Completed',
                            ];
                        @endphp
                        <span class="px-3 py-1 inline-flex text-sm leading-5 font-semibold rounded-full {{ $statusColors[$task->status] }}">
                            {{ $statusLabels[$task->status] }}
                        </span>
                    </div>

                    <div class="mb-6">
                        <h4 class="text-lg font-semibold text-gray-700 mb-2">Description</h4>
                        <p class="text-gray-600">{{ $task->description ?: 'No description provided.' }}</p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                        <div>
                            <h4 class="text-sm font-semibold text-gray-500 mb-1">Due Date</h4>
                            <p class="text-gray-900">{{ $task->due_date ? $task->due_date->format('F d, Y') : 'No due date set' }}</p>
                        </div>
                        <div>
                            <h4 class="text-sm font-semibold text-gray-500 mb-1">Created At</h4>
                            <p class="text-gray-900">{{ $task->created_at->format('F d, Y g:i A') }}</p>
                        </div>
                        <div>
                            <h4 class="text-sm font-semibold text-gray-500 mb-1">Last Updated</h4>
                            <p class="text-gray-900">{{ $task->updated_at->format('F d, Y g:i A') }}</p>
                        </div>
                    </div>

                    <div class="mt-6 pt-6 border-t border-gray-200">
                        <form action="{{ route('tasks.destroy', $task) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this task? This action cannot be undone.');">
                            @csrf
                            @method('DELETE')
                            <x-danger-button>
                                {{ __('Delete Task') }}
                            </x-danger-button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
