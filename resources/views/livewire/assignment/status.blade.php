<div>
    <x-input-error :messages="$errors->get('assignment.status')"></x-input-error>
{{--    @dd($this->rules())--}}
    <select name="" id="" wire:model="assignment.status">
        @foreach(\App\Enums\AssignmentStatusses::cases() as $status)
            <option value="{{ $status->value }}" @selected($assignment->status === $status->name)>{{ $status->value }}</option>
        @endforeach
    </select>
</div>
