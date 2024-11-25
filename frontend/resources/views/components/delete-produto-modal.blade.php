<x-dialog>
    <x-dialog.trigger>
        <span class="material-symbols-outlined text-red-600">delete</span>
    </x-dialog.trigger>
    <x-dialog.content class="sm:max-w-[425px] z-100">
        <div class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
        <div class="w-[500px] py-6 px-6 rounded grid gap-4 z-100 bg-white">
            <x-dialog.header>
                <x-dialog.title>
                    Deletar produto
                </x-dialog.title>
                <x-dialog.description>
                    Tem certeza que quer deletar o produto {{$produto->nome}}.
                </x-dialog.description>
            </x-dialog.header>
            <br/>
            <x-dialog.footer>
                <x-dialog.close class="z-100" variant="default">
                    <span class="px-4 py-2 rounded bg-gray-400 bg-opacity-80"> Cancelar </span>
                </x-dialog.close>
                <x-dialog.close class="z-100" variant="default">
                    {{$slot}}
                </x-dialog.close>
            </x-dialog.footer>
        </div>
    </x-dialog.content>
</x-dialog>
