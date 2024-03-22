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
                    <button id="showFormBtn">Show Form</button>

                    <div id="formContainer" class="hidden">
                        <button id="closeFormBtn" class="close-btn">X</button>
                        <form id="myForm" action="{{ route('bedrijven.store') }}" method="POST" class="flex flex-wrap gap-4">
                            @csrf
                            @method('post')
                            <div class="w-full md:w-1/2 flex-shrink-0">
                                <label for="naam" class="block">Naam</label>
                                <input type="text" id="naam" name="naam" placeholder="John Doe" class="form-input">
                            </div>
                            <div class="w-full md:w-1/2 flex-shrink-0">
                                <label for="bedrijfseigenaar" class="block">Bedrijfseigenaar</label>
                                <input type="text" id="bedrijfseigenaar" name="bedrijfseigenaar" placeholder="Naamomi Namerland" class="form-input">
                            </div>
                            <div class="w-full md:w-1/2 flex-shrink-0">
                                <label for="straat" class="block">Straat</label>
                                <input type="text" id="straat" name="straat" placeholder="Voorbeeldstraat" class="form-input">
                            </div>
                            <div class="w-full md:w-1/2 flex-shrink-0">
                                <label for="huisnummer" class="block">Huisnummer</label>
                                <input type="text" id="huisnummer" name="huisnummer" placeholder="00" class="form-input">
                            </div>
                            <div class="w-full md:w-1/2 flex-shrink-0">
                                <label for="postcode" class="block">Postcode</label>
                                <input type="text" id="postcode" name="postcode" placeholder="1122AB" class="form-input">
                            </div>
                            <div class="w-full md:w-1/2 flex-shrink-0">
                                <label for="branche" class="block">Branche</label>
                                <input type="text" id="branche" name="branche" placeholder="Marketing" class="form-input">
                            </div>
                            <div class="w-full">
                                <button type="submit" class="form-submit">Sla Bedrijf Op</button>
                            </div>
                        </form>
                        <div>
                            @if($errors->any())
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                            @endif
                        </div>
                    </div>

                    <table border="3">
                        <tr>
                            <th>Naam</th>
                            <th>bedrijfseigenaar</th>
                            <th>Adres</th>
                            <th>Branche</th>
                            <th>Datum aanmaak</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        @foreach($bedrijven as $bedrijf)
                        <tr>
                            <td>{{ $bedrijf->naam }}</td>
                            <td>{{ $bedrijf->bedrijfseigenaar }}</td>
                            <td>{{ $bedrijf->straat }} {{ $bedrijf->huisnummer }} {{ $bedrijf->postcode }}</td>
                            <td>{{ $bedrijf->branche }}</td>
                            <td>{{ $bedrijf->datum_aanmaak }}</td>
                            <td>
                                <a href="{{route('bedrijven.edit', ['company' => $bedrijf])}}">Edit</a>
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

    #showFormBtn{
        background-color: #46d66d
    }

    #formContainer {
    position: fixed;
    top: 0;
    transition: right 0.3s ease-in-out; /* Transition effect */
    background-color: #F0ECE5;
    width: 30%;
    height: 100%;
    padding: 20px;
    box-shadow: 0px 0px 0px rgba(0, 0, 0, 0.1);
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

#saveForm{
background-color: red;
width: 20%;
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