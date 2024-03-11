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
                        <form id="myForm" action="{{ route('contacten.store') }}" method="POST">
                            @csrf
                            @method('post')
                                <div>
                                    <label>Naam</label>
                                    <input type="text" name="naam" placeholder="John Doe">
                                </div>
                                <div>
                                    <label>bedrijfseigenaar</label>
                                    <input type="text" name="bedrijfseigenaar" placeholder="Naamomi Namerland">
                                </div>
                                <div>
                                    <label>straat</label>
                                    <input type="text" name="" placeholder="Voorbeeldstad">
                                </div>
                                <div>
                                    <label>huisnummer</label>
                                    <input type="text" name="huisnummer" placeholder="Jane Doe">
                                </div>
                                <div>
                                    <label>postcode</label>
                                    <input type="text" name="postcode" placeholder="Jane Doe">
                                </div>
                                <div>
                                    <label>Branche</label>
                                    <input type="text" name="branche" placeholder="Jane Doe">
                                </div>
                                <div>
                                    <label>Datum aanmaak</label>
                                    <input type="text" name="datum aanmaak" placeholder="Jane Doe">
                                </div>
                                <div>
                                    <label>Datum laatse activiteit</label>
                                    <input type="text" name="datum laatste activiteit" placeholder="Jane Doe">
                                </div>
                                 <button class="btn btn-primary">
                                         <input type="submit" value="sla bedrijf op">
                                </button>
                        </form>
                        <div>
                            @if($errors->any())
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>

                            @else
                            @endif
                        </div>
                    </div>
                    <table border="3">
                        <tr>
                            <th>Naam</th>
                            <th>bedrijfseigenaar</th>
                            <th>Telefoonnummer</th>
                            <th>Adres</th>
                            <th>Branche</th>
                            <th>Datum aanmaak</th>
                            <th>Datum laatste activiteit</th>
                        </tr>
                        {{-- @foreach($contacts as $contact)
                        <tr>
                            <td>{{ $contact->name }}</td>
                            <td>{{ $contact->email }}</td>
                            <td>{{ $contact->phone_number }}</td>
                            <td>{{ $contact->primary_company }}</td>
                            <td>{{ $contact->city }}</td>
                            <td>{{ $contact->contact_owner }}</td>
                            <td>{{ $contact->lead_status }}</td>
                        </tr>
                        @endforeach --}}
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
formContainer.style.right = '-40%'; // Slide form away
});
</script>

<style>
#formContainer {
position: fixed;
top: 0;
transition: right 0.3s ease-in-out; /* Transition effect */
background-color: #4b6b64;
width: 40%;
height: 100%;
padding: 20px;
box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
}

#saveForm{
background-color: red;
width: 20%;
}

.hidden {
display: none;
}

label, input, select{
width: 40%;
margin-right: 200px;
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