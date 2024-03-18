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
                        <button id="showFormBtn">Show Form</button>

                        <div id="formContainer" class="hidden">
                            <button id="closeFormBtn" class="close-btn">X</button>
                            <form id="myForm" action="{{ route('contacten.store') }}" method="POST">
                                @csrf
                                @method('post')
                                    <div>
                                        <label>Naam</label>
                                        <input type="text" name="name" placeholder="John Doe">
                                    </div>
                                    <div>
                                        <label>E-mail</label>
                                        <input type="text" name="email" placeholder="voorbeeld@mailservice.com">
                                    </div>
                                    <div>
                                        <label>Telefoonnummer</label>
                                        <input type="tel" name="phone_number" maxlength="10" placeholder="0612345678">
                                    </div>
                                    <div>
                                        <label>Primair bedrijf</label>
                                        <input type="text" name="primary_company" placeholder="Bedrijf">
                                    </div>
                                    <div>
                                        <label>Plaatsnaam</label>
                                        <input type="text" name="city" placeholder="Voorbeeldstad">
                                    </div>
                                    <div>
                                        <label>Eigenaar contact</label>
                                        <input type="text" name="contact_owner" placeholder="Jane Doe">
                                    </div>
                                    <div>
                                        <label>Status lead</label>
                                        <select name="lead_status">
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
                                     <button class="btn btn-primary">
                                             <input type="submit" value="sla contact op">
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
    formContainer.style.right = '-40%'; // Slide form away
});

document.getElementById('closeFormBtn').addEventListener('click', function() {
    var formContainer = document.getElementById('formContainer');
    formContainer.style.right = '-40%'; // Slide form away

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
    background-color: #4b6b64;
    width: 40%;
    height: 100%;
    padding: 20px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
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