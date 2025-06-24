<x-app-layout>
    <x-layout.header title="Novo Atendimento" />

    <div class="py-5 bg-black text-white">
        <div class="container">
            <x-cards.card-t-privado>

                <x-forms.form :action="route('atendimentos.store')" :cancelRoute="route('atendimentos.index')">
                    @include('atendimentos.partials.form', ['atendimento' => null])
                </x-forms.form>

            </x-cards.card-t-privado>
        </div>
    </div>
</x-app-layout>
