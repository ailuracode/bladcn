 <div {{ $attributes->twMerge('-my-2 h-5 text-sm group-data-[variant=outline]/field-group:-mb-2 relative') }}
     data-content='{{ $slot->isEmpty() ? 'false' : 'true' }}'
     data-slot="field-separator">
     <x-separator class="absolute inset-0 top-1/2" />
     @if ($slot->isNotEmpty())
         <span class="text-muted-foreground bg-background relative mx-auto block w-fit px-2"
             data-slot="field-separator-content">
             {{ $slot }}
         </span>
     @endif
 </div>
