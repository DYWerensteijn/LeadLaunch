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

<form id="myForm" action="{{ route('contacten.editHandler', ['contacts' => $contact->id]) }}" method="POST">
    @csrf
    @method('post')
        <div>
            <label>Naam</label>
            <input value="{{$contact->name}}" type="text" name="name" placeholder="John Doe">
        </div>
        <div>
            <label>E-mail</label>
            <input value="{{$contact->email}}" type="text" name="email" placeholder="voorbeeld@mailservice.com">
        </div>
        <div>
            <label>Telefoonnummer</label>
            <input value="{{$contact->phone_number}}" type="tel" name="phone_number" maxlength="10" placeholder="0612345678">
        </div>
        <div>
            <label>Primair bedrijf</label>
            <input value="{{$contact->primary_company}}" type="text" name="primary_company" placeholder="Bedrijf">
        </div>
        <div>
            <label>Plaatsnaam</label>
            <input value="{{$contact->city}}" type="text" name="city" placeholder="Voorbeeldstad">
        </div>
        <div>
            <label>Eigenaar contact</label>
            <input value="{{$contact->contact_owner}}" type="text" name="contact_owner" placeholder="Jane Doe">
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
        <input class="p-3 rounded bg-green-400" type="submit" value="Verander contact informatie">
</form>

</div>
</div>
</div>
</div>
</x-app-layout>