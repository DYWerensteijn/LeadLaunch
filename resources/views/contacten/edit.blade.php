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

                    <form id="myForm" action="{{ route('contacten.editHandler', ['contacts' => $contact->id]) }}" method="POST" class="w-full md:w-1/2 lg:w-1/4 mx-auto">
                        @csrf
                        @method('post')
                        <div class="mb-4">
                            <label class="block">{{__('Naam') }}</label>
                            <input value="{{$contact->name}}" type="text" name="name" placeholder="John Doe" class="w-full px-3 py-2 border border-gray-300 rounded-md">
                        </div>
                        <div class="mb-4">
                            <label class="block">{{__('E-mail') }}</label>
                            <input value="{{$contact->email}}" type="text" name="email" placeholder="voorbeeld@mailservice.com" class="w-full px-3 py-2 border border-gray-300 rounded-md">
                        </div>
                        <div class="mb-4">
                            <label class="block">{{__('Telefoonnummer') }}</label>
                            <input value="0{{$contact->phone_number}}" type="tel" name="phone_number" maxlength="10" placeholder="0612345678" class="w-full px-3 py-2 border border-gray-300 rounded-md">
                        </div>
                        <div class="mb-4">
                            <label class="block">{{__('Primair bedrijf') }}</label>
                            <input value="{{$contact->primary_company}}" type="text" name="primary_company" placeholder="Bedrijf" class="w-full px-3 py-2 border border-gray-300 rounded-md">
                        </div>
                        <div class="mb-4">
                            <label class="block">{{__('Plaatsnaam') }}</label>
                            <input value="{{$contact->city}}" type="text" name="city" placeholder="Voorbeeldstad" class="w-full px-3 py-2 border border-gray-300 rounded-md">
                        </div>
                        <div class="mb-4">
                            <label class="block">{{__('Eigenaar contact') }}</label>
                            <input value="{{$contact->contact_owner}}" type="text" name="contact_owner" placeholder="Jane Doe" class="w-full px-3 py-2 border border-gray-300 rounded-md">
                        </div>
                        <div class="mb-4">
                            <label class="block">{{__('Status lead') }}</label>
                            <select name="lead_status" class="w-full px-3 py-2 border border-gray-300 rounded-md">
                                <option value="nieuw">{{__('Nieuw') }}</option>
                                <option value="openen">{{__('Openen') }}</option>
                                <option value="in behandeling">{{__('In behandeling') }}</option>
                                <option value="deal openen">{{__('Deal openen')}}</option>
                                <option value="ongekwalificeerd">{{__('Ongekwalificeerd') }}</option>
                                <option value="geprobeerd contact op te nemen met">{{__('Geprobeerd contact op te nemen met') }}</option>
                                <option value="verbonden">{{__('Verbonden') }}</option>
                                <option value="slechte timing">{{__('Slechte timing') }}</option>
                            </select>
                        </div>
                        <input type="submit" value="Verander contact informatie" class=" bg-green-400 text-white px-4 py-2 rounded-md hover:bg-green-500 cursor-pointer">
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
