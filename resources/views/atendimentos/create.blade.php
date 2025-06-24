<x-app-layout>
    <x-layout.header title="Novo Atendimento" />

    <div class="py-5 bg-black text-white">
        <div class="container">
            <x-cards.card-t-privado>

                @if ($errors->any())
                    <x-alerts.alert type="danger" class="mb-4">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </x-alerts.alert>
                @endif

                <x-forms.form :action="route('atendimentos.store')" :cancelRoute="route('atendimentos.index')">
                    @include('atendimentos.partials.form', ['atendimento' => null])
                </x-forms.form>

            </x-cards.card-t-privado>
        </div>
    </div>
</x-app-layout>
