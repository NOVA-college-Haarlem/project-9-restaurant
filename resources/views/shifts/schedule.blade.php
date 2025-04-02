<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-2xl font-bold mb-4">Staff Schedule</h1>

                    <div class="mb-4">
                        <a href="{{ route('shifts.schedule', ['view' => 'week']) }}"
                            class="btn {{ $viewType === 'week' ? 'bg-blue-500 text-white' : 'bg-gray-200' }}">
                            Weekly View
                        </a>
                        <a href="{{ route('shifts.schedule', ['view' => 'month']) }}"
                            class="btn {{ $viewType === 'month' ? 'bg-blue-500 text-white' : 'bg-gray-200' }}">
                            Monthly View
                        </a>
                    </div>

                    @foreach($shiftsByDay as $date => $shifts)
                    <div class="mb-8">
                        <h2 class="text-xl font-semibold mb-2">
                            {{ \Carbon\Carbon::parse($date)->format('l, F j, Y') }}
                        </h2>

                        <div class="space-y-2">
                            @foreach($shifts as $shift)
                            <div class="p-4 border rounded-lg flex justify-between items-center">
                                <div>
                                    <span class="font-medium">
                                        {{ $shift->start_time->format('H:i') }} - {{ $shift->end_time->format('H:i') }}
                                    </span>
                                    <span class="ml-4">
                                        @if($shift->user)
                                        Assigned to: {{ $shift->user->name }}
                                        @else
                                        Unassigned
                                        @endif
                                    </span>
                                </div>

                                @if(!$shift->user)
                                <form action="{{ route('shifts.assign', $shift) }}" method="POST" class="flex items-center">
                                    @csrf
                                    <select name="user_id" class="mr-2 border rounded p-1">
                                        @foreach($staff as $staffMember)
                                        <option value="{{ $staffMember->id }}">{{ $staffMember->name }}</option>
                                        @endforeach
                                    </select>
                                    <button type="submit" class="px-3 py-1 bg-blue-500 text-white rounded">
                                        Assign
                                    </button>
                                </form>
                                @endif
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>