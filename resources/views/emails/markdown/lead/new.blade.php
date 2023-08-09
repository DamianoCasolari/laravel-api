<x-mail::message>
# Info nuovo contatto
**Nome :{{ $lead->name }}** <br>
**Email :{{ $lead->email }}** <br>

<x-mail::panel>
    
    {{ $lead->message }}
</x-mail::panel>


</x-mail::message>
