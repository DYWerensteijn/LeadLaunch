<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Contacten') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <button id="showFormBtn" class="form-styledbutton mb-4">Show Form</button>
                    {{$contacts->links()}}
                    <div id="formContainer" class="hidden bg-sand">
                        <button id="closeFormBtn" type="button" class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
                            <span class="sr-only">Close menu</span>
                            <!-- Heroicon name: outline/x -->
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                          </button>
                        <form id="myForm" action="{{ route('contacten.store') }}" method="POST" class="flex flex-wrap gap-4">
                            {{-- @csrf protects the form from cross-site request forgery --}}
                            @csrf
                            @method('post')
                            <div class="w-full md:w-1/2 flex-shrink-0 mt-6">
                                <label>Naam</label>
                                <input type="text" name="name" placeholder="John Doe" class="form-input">
                                {{--Class form input is a premade tailwind CSS styling, which I can repeat among the other input tags. I did this so the code looks cleaner. You can find the full styling in app.css--}}
                            </div>
                            <div class="w-full md:w-1/2 flex-shrink-0">
                                <label>E-mail</label>
                                <input type="text" name="email" placeholder="voorbeeld@mailservice.com" class="form-input">
                            </div>
                            <div class="w-full md:w-1/2 flex-shrink-0">
                                <label>Telefoonnummer</label>
                                <input type="tel" name="phone_number" maxlength="10" placeholder="0612345678" class="form-input">
                            </div>
                            <div class="w-full md:w-1/2 flex-shrink-0">
                                <label>Primair bedrijf</label>
                                <input type="text" name="primary_company" placeholder="Bedrijf" class="form-input">
                            </div>
                            <div class="w-full md:w-1/2 flex-shrink-0">
                                <label>Plaatsnaam</label>
                                <input type="text" name="city" placeholder="Voorbeeldstad" class="form-input">
                            </div>
                            <div class="w-full md:w-1/2 flex-shrink-0">
                                <label>Eigenaar contact</label>
                                <input type="text" name="contact_owner" placeholder="Jane Doe" class="form-input">
                            </div>
                            <div class="w-full md:w-1/2 flex-shrink-0">
                                <label>Status lead</label>
                                <select name="lead_status" class="form-input">
                                    <option value="nieuw">Nieuw</option>
                                    <option value="openen">Openen</option>
                                    <option value="in behandeling">In behandeling</option>
                                    <option value="deal openen">Deal openen</option>
                                    <option value="ongekwalificeerd">Ongekwalificeerd</option>
                                    <option value="geprobeerd contact op te nemen met">Geprobeerd contact op te nemen met</option>
                                    <option value="verbonden">Verbonden</option>
                                    <option value="slechte timing">Slechte timing</option>
                                </select>
                             </div>
                            <div class="w-full mt-4">
                                {{-- using "styledbutton" I desigend. Check app.css --}}
                                <button type="submit" class="form-styledbutton">Sla contact op</button>
                            </div>
                            <div class="w-full">
                                <button type="button" class="form-styledbutton">Annuleren</button>
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
                    {{-- End form elements --}}

                    <table>
                        <tr>
                            <th>Naam</th>
                            <th>E-mail</th>
                            <th>Telefoonnummer</th>
                            <th>Primair bedrijf</th>
                            <th>Plaatsnaam</th>
                            <th>Eigenaar contact</th>
                            <th>Status lead</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        @foreach($contacts as $contact)
                        <tr>
                            <td>{{ $contact->name }}</td>
                            <td>{{ $contact->email }}</td>
                            <td>0{{ $contact->phone_number }}</td>
                            <td>{{ $contact->primary_company }}</td>
                            <td>{{ $contact->city }}</td>
                            <td>{{ $contact->contact_owner }}</td>
                            <td>{{ $contact->lead_status }}</td>
                            <td>
                                <a href="{{route('contacten.edit', ['contacts' => $contact])}}">Edit</a>
                            </td>
                            <td>
                                <form method="post" action="{{ route('contacten.destroy', ['contacts' => $contact->id]) }}">
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
