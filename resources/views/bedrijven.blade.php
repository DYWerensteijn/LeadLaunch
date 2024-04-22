<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Bedrijven') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <button id="showFormBtn" class="form-styledbutton mb-4">{{__('Show Form')}}</button>
                    {{-- Adds pagination buttons. --}}
                    {{$bedrijven->links()}}

                    <div id="formContainer" class="hidden bg-sand">
                        <button id="closeFormBtn" type="button" class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
                            <span class="sr-only">{{__('Close menu' )}}</span>
                            <!-- Heroicon name: outline/x -->
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                          </button>
                        <form id="myForm" action="{{ route('bedrijven.store') }}" method="POST" class="flex flex-wrap gap-4">
                            @csrf
                            @method('post')
                            <div class="w-full md:w-1/2 flex-shrink-0 mt-6">
                                <label for="naam" class="block">{{__('Naam onderneming')}}</label>
                                <input type="text" id="naam" name="naam" placeholder="Bedrijf BV" class="form-input">
                                {{--Class "form input" is a premade tailwind CSS styling, which I can repeat among the other input tags. I did this so the code looks cleaner. You can find the full styling in app.css--}}
                            </div>
                            <div class="w-full md:w-1/2 flex-shrink-0">
                                <label for="bedrijfseigenaar" class="block">{{__('Bedrijfseigenaar')}}</label>
                                <input type="text" id="bedrijfseigenaar" name="bedrijfseigenaar" placeholder="Naamomi Namerland" class="form-input">
                            </div>
                            <div class="w-full md:w-1/2 flex-shrink-0">
                                <label for="straat" class="block">{{__('Straat')}}</label>
                                <input type="text" id="straat" name="straat" placeholder="Voorbeeldstraat" class="form-input">
                            </div>
                            <div class="w-full md:w-1/2 flex-shrink-0">
                                <label for="huisnummer" class="block">{{__('Huisnummer')}}</label>
                                <input type="text" id="huisnummer" name="huisnummer" placeholder="00" class="form-input">
                            </div>
                            <div class="w-full md:w-1/2 flex-shrink-0">
                                <label for="postcode" class="block">{{__('Postcode')}}</label>
                                <input type="text" id="postcode" name="postcode" placeholder="1122AB" class="form-input">
                            </div>
                            <div class="w-full md:w-1/2 flex-shrink-0">
                                <label for="branche" class="block">{{__('Branche')}}</label>
                                <input type="text" id="branche" name="branche" placeholder="Marketing" class="form-input">
                            </div>
                            <div class="w-full mt-4">
                                <button type="submit" class="form-styledbutton">{{__('Sla Bedrijf Op')}}</button>
                            </div>
                            <div class="w-full">
                                <button type="button" class="form-styledbutton">{{__('Annuleren')}}</button>
                            </div>
                        </form>
                        <div>
                            {{-- Add error message is form is empty --}}
                            @if($errors->any())
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                            @endif
                        </div>
                    </div>

                    <table>
                        <tr>
                            <th>{{__('Naam onderneming')}}</th>
                            <th>{{__('Bedrijfseigenaar')}}</th>
                            <th>{{__('Adres')}}</th>
                            <th>{{__('Branche')}}</th>
                            <th>{{__('Datum aanmaak')}}</th>
                            <th>{{__('Edit')}}</th>
                            <th>{{__('Delete')}}</th>
                        </tr>
                            {{-- Posts records from tabble --}}
                        @foreach($bedrijven as $bedrijf)
                        <tr>
                            <td class="text-transform: capitalize">{{ $bedrijf->naam }}</td>
                            <td class="text-transform: capitalize">{{ $bedrijf->bedrijfseigenaar }}</td>
                            <td class="text-transform: capitalize">{{ $bedrijf->straat }} {{ $bedrijf->huisnummer }} {{ $bedrijf->postcode }}</td>
                            <td class="text-transform: capitalize">{{ $bedrijf->branche }}</td>
                            <td>{{ $bedrijf->datum_aanmaak }}</td>
                            <td>
                                <a href="{{route('bedrijven.edit', ['company' => $bedrijf])}}">{{__('Edit')}}</a>
                            </td>
                            <td>
                                <form method="post" action="{{ route('bedrijven.destroy', ['company' => $bedrijf->id]) }}">
                                    @csrf
                                    @method('delete')
                                    <input type="submit" value="Delete">
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


<script>
    document.getElementById('showFormBtn').addEventListener('click', function() {
    var formContainer = document.getElementById('formContainer');
    formContainer.classList.remove('hidden');
    formContainer.style.right = '0'; // Slide form into view
});

document.getElementById('myForm').addEventListener('submit', function() {
    var formContainer = document.getElementById('formContainer');
    formContainer.style.right = '-30%'; // Slide form away
});

document.getElementById('closeFormBtn').addEventListener('click', function() {
    var formContainer = document.getElementById('formContainer');
    formContainer.style.right = '-30%'; // Slide form away

    // Delay the form reset by 1 second
    setTimeout(function() {
        var form = document.getElementById('myForm'); // Get the form element
        form.reset(); // Reset the form fields
    }, 1000); // 1000 milliseconds = 1 second
});
</script>

<style>

    #formContainer {
    position: fixed;
    top: 0;
    transition: right 0.3s ease-in-out; /* Transition effect */
    width: 30%;
    height: 100%;
    padding: 20px;
    box-shadow: 0px 0px 50px rgba(0, 0, 0, 0.123);
}
.close-btn {
    position: absolute;
    top: 10px;
    right: 10px;
    cursor: pointer;
    color: white;
    background-color: red;
    border: none;
    padding: 5px 10px;
    border-radius: 50%;
}

table {
        border-collapse: collapse;
        width: 100%;
    }

    th, td {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    th {
        background-color: #f2f2f2;
    }
</style>