<x-app-layout>
    <x-layout.header title="Editar Atendimento" />

    <div class="py-5 bg-black text-white">
        <div class="container">
            <x-cards.card-t-privado>

                <x-forms.form :action="route('atendimentos.update', $atendimento)" :cancelRoute="route('atendimentos.index')">
                    @method('PUT')
                    @include('atendimentos.partials.form', ['atendimento' => $atendimento])
                </x-forms.form>

            </x-cards.card-t-privado>
        </div>
    </div>
</x-app-layout>
