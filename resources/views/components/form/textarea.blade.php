<textarea {{ $attributes->merge(['rows' => '5', 'class' => 'resize-y border-0 border-b-2 border-b-gray-900 bg-transparent text-gray-900 placeholder:text-gray-900/50']) }}>{{ $slot }}</textarea>
