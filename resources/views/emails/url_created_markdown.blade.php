<x-mail::message>
    # New url created
    > Title: {{ $url->title }}

    > Orignal Url: {{ $url->orignal_url }}

    > Short Url: {{ $url->shortened_url }}

    Thanks,
    {{ 'Trimly' }}
</x-mail::message>
