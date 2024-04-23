<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Verander contact informatie') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

<form id="myForm" action="{{ route('bedrijven.editHandler', ['company' => $company->id]) }}" method="POST">
    @csrf
    @method('post')
    <div>
        <label>{{__('Naam')}}</label>
        <input value="{{$bedrijf->naam}}" type="text" name="naam" placeholder="John Doe">
    </div>
    <div>
        <label>{{__('bedrijfseigenaar')}}</label>
        <input value="{{$bedrijf->bedrijfseigenaar}}" type="text" name="bedrijfseigenaar" placeholder="Naamomi Namerland">
    </div>
    <div>
        <label>{{__('straat')}}</label>
        <input value="{{$bedrijf->straat}}" type="text" name="straat" placeholder="Voorbeeldstraat">
    </div>
    <div>
        <label>{{__('huisnummer')}}</label>
        <input value="{{$bedrijf->huisnummer}}" type="text" name="huisnummer" placeholder="00">
    </div>
    <div>
        <label>{{__('postcode')}}</label>
        <input value="{{$bedrijf->postcode}}" type="text" name="postcode" placeholder="1122AB">
    </div>
    <div>
        <label>{{__('Branche')}}</label>
        <input value="{{$bedrijf->branche}}" type="text" name="branche" placeholder="Marketing">
    </div>
     <button class="btn btn-primary">
             <input type="submit" value="sla bedrijf op">
    </button>
        <input class="p-3 rounded bg-green-400" type="submit" value="Verander contact informatie">
</form>

</div>
</div>
</div>
</div>
</x-app-layout>