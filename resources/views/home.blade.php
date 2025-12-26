 <x-layout>
    <main class="min-h-[calc(100vh-4rem)]">
        <section class="bg-gradient-to-r from-indigo-600 via-violet-600 to-pink-500 text-white">
            <div class="container mx-auto px-6 py-16 lg:py-24">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                    <div class="space-y-6">
                        <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold leading-tight">Rastreamento inteligente de encomendas</h1>
                        <p class="text-indigo-100 max-w-xl">Acompanhe suas remessas em tempo real, receba atualizações e visualize o histórico de entregas de forma simples e segura.</p>

                        <div class="mt-6 grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <form action="{{ route('frete.rastreamento') }}" method="GET" class="col-span-1">
                                <label class="sr-only">Código de rastreo</label>
                                <div class="relative">
                                    <input name="codigo_rastreio" type="text" placeholder="Código de rastreo" aria-label="Código de rastreamento"
                                        class="w-full rounded-lg py-3 px-4 pr-20 sm:pr-24 md:pr-28 lg:pr-32 text-gray-800 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-white">
                                    <button type="submit" class="absolute right-2 top-1 bottom-1 px-3 sm:px-4 md:px-5 rounded-lg bg-indigo-700 text-white hover:bg-indigo-800 flex items-center justify-center">Consultar</button>
                                </div>
                            </form>

                            <form action="{{ route('frete.historico') }}" method="GET" class="col-span-1">
                                <label class="sr-only">Telefone do cliente</label>
                                <div class="relative">
                                    <input name="phone" type="tel" oninput="aplicarMascaraTelefone(this)" placeholder="Telefone do cliente"
                                        class="w-full rounded-lg py-3 px-4 pr-20 sm:pr-24 md:pr-28 lg:pr-32 text-gray-800 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-white" maxlength="15">
                                    <button type="submit" class="absolute right-2 top-1 bottom-1 px-3 sm:px-4 md:px-5 rounded-lg bg-indigo-700 text-white hover:bg-indigo-800 flex items-center justify-center">Histórico</button>
                                </div>
                            </form>
                        </div>

                        <div class="flex flex-wrap gap-4 mt-4">
                            <span class="inline-flex items-center gap-2 bg-white/10 px-3 py-1 rounded-full text-sm">Entrega rápida</span>
                            <span class="inline-flex items-center gap-2 bg-white/10 px-3 py-1 rounded-full text-sm">Atualizações por SMS</span>
                            <span class="inline-flex items-center gap-2 bg-white/10 px-3 py-1 rounded-full text-sm">Painel intuitivo</span>
                        </div>
                    </div>

                    <div class="w-full rounded-lg overflow-hidden shadow-2xl bg-white/20">
                        <img src="assets/entrega.webp" alt="Entrega" class="w-full h-64 object-cover sm:h-80 lg:h-96">
                    </div>
                </div>
            </div>
        </section>

        <section class="container mx-auto px-6 py-12">
            <div class="text-center mb-8">
                <h2 class="text-2xl font-bold text-gray-800">Como funciona</h2>
                <p class="text-gray-600">Três passos simples para acompanhar suas encomendas.</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                <div class="p-6 bg-white rounded-lg shadow">
                    <div class="flex items-center justify-center w-12 h-12 bg-indigo-50 rounded-full mb-4">
                        <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7h18M3 12h18M3 17h18"/></svg>
                    </div>
                    <h3 class="font-semibold text-gray-800">1. Inserir código</h3>
                    <p class="text-gray-600 text-sm mt-2">Cole o código de rastreamento e consulte o status atual.</p>
                </div>

                <div class="p-6 bg-white rounded-lg shadow">
                    <div class="flex items-center justify-center w-12 h-12 bg-indigo-50 rounded-full mb-4">
                        <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-6a2 2 0 012-2h2a2 2 0 012 2v6M9 17a2 2 0 100 4h6a2 2 0 100-4M7 7h10"/></svg>
                    </div>
                    <h3 class="font-semibold text-gray-800">2. Receber atualizações</h3>
                    <p class="text-gray-600 text-sm mt-2">Receba notificações de cada etapa da entrega.</p>
                </div>

                <div class="p-6 bg-white rounded-lg shadow">
                    <div class="flex items-center justify-center w-12 h-12 bg-indigo-50 rounded-full mb-4">
                        <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    </div>
                    <h3 class="font-semibold text-gray-800">3. Ver histórico</h3>
                    <p class="text-gray-600 text-sm mt-2">Consulte o histórico completo do cliente por telefone.</p>
                </div>
            </div>
        </section>

        <footer class="bg-gray-50 border-t mt-12">
            <div class="container mx-auto px-6 py-8 flex flex-col md:flex-row items-center justify-between">
                <div class="text-gray-700">&copy; {{ date('Y') }} TW Transportes. Todos os direitos reservados.</div>
                <div class="flex gap-4 mt-4 md:mt-0">
                    <a href="#" class="text-gray-600 hover:text-gray-900">Política de privacidade</a>
                    <a href="#" class="text-gray-600 hover:text-gray-900">Contato</a>
                </div>
            </div>
        </footer>
    </main>

    <script>
        aplicarMascaraTelefone = function (input) {
            let valor = input.value.replace(/\D/g, '');
            if (valor.length > 0) valor = '(' + valor;
            if (valor.length > 3) valor = valor.slice(0, 3) + ') ' + valor.slice(3);
            if (valor.length > 10) valor = valor.slice(0, 10) + '-' + valor.slice(10);
            input.value = valor.slice(0, 15);
        }
    </script>
 </x-layout>