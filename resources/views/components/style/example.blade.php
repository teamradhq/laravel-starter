<section class="style example my-8">
    <header class="py-12 border-b border-t border-blue-700  mb-8">
        <x-ui.heading level="3">{{$title}}</x-ui.heading>
        @if($template ?? false)
            <p class="py-2"><strong>Template</strong>: <code class="bg-gray-200 text-sm px-2 py-1 rounded-md">{{$template}}</code></p>
        @endif
    </header>

    {{$slot}}
</section>
