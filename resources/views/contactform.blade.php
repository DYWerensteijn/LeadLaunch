<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{-- translatable tag --}}
            {{ __('formulier') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div>
                        @if($errors->any())
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{$error}}</li>

                            @endforeach
                        </ul>
                        @endif
                    </div>
                    <form method="post" action="{{route('contacten.store')}}">
                        @csrf
                        @method('post')
                        <div>
                            <label>Naam</label>
                            <input type="text" name="name" placeholder="John Doe">
                        </div>
                        <div>
                            <label>E-mail</label>
                            <input type="text" name="e-mail" placeholder="voorbeeld@mailservice.com">
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
                        <input type="submit" value="sla contact op">
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>