<div {{ $attributes->merge(['class' => 'space-y-1', 'id' => 'contact']) }}>
    <h3 class="text-4xl font-bold">{{ __('Contact') }}</h3>
    @foreach($contactDetails as $contact)
        <x-contact :for="$contact->name">{{ $contact->content }}</x-contact>
    @endforeach
</div>
