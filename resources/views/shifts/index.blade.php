<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            All Shifts
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <style>
                        
                    </style>

                    <div class="flex items-center mb-6">
                        <a href="{{ route('shifts.create') }}" class="shift-btn btn-primary">
                            Create New Shift
                        </a>
                        <a href="{{ route('shifts.schedule') }}" class="shift-btn btn-secondary ml-3">
                            View Schedule
                        </a>
                    </div>

                    <table class="shift-table">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Assigned To</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($shifts as $shift)
                            <tr>
                                <td>{{ $shift->start_time->format('Y-m-d') }}</td>
                                <td>{{ $shift->start_time->format('H:i') }} - {{ $shift->end_time->format('H:i') }}</td>
                                <td>{{ $shift->user ? $shift->user->name : 'Unassigned' }}</td>
                                <td>
                                    <span class="status-badge status-{{ $shift->status }}">
                                        {{ ucfirst($shift->status) }}
                                    </span>
                                </td>
                                <td>
                                    @if($shift->status == 'assigned')
                                    <form action="{{ route('shifts.update-status', $shift) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="action-btn">
                                            Mark as Worked
                                        </button>
                                    </form>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>