<x-layout>
    <div class="container mx-auto px-4 py-8">
        <header class="bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-lg p-6 mb-6">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <div>
                    <h1 class="text-2xl font-bold">Histórico de encomendas</h1>
                    <p class="text-sm text-white/90 mt-1">Cliente: <span class="font-semibold">{{ $cliente->name }}</span>
                    </p>
                </div>

                <div class="flex items-center gap-2">
                    <input id="historico-search" type="search" placeholder="Buscar por código ou destino"
                        class="rounded-md px-3 py-2 w-64 text-gray-700" />
                    <button id="historico-clear" type="button"
                        class="px-3 py-2 bg-white text-blue-600 rounded-md">Limpar</button>
                </div>
            </div>
        </header>

        <div class="mb-4 flex items-center justify-between gap-4">
            <div class="flex items-center gap-2" id="hist-tabs">
                <button data-tab="all"
                    class="tab-btn px-3 py-2 bg-white text-gray-700 rounded-md shadow-sm">Todos</button>
                <button data-tab="enviados"
                    class="tab-btn px-3 py-2 bg-gray-100 text-gray-700 rounded-md">Enviados</button>
                <button data-tab="recebidos"
                    class="tab-btn px-3 py-2 bg-gray-100 text-gray-700 rounded-md">Recebidos</button>
            </div>
            <div class="text-sm text-gray-600">Total enviados: {{ $cliente->enviados->count() }} — Recebidos:
                {{ $cliente->recebidos->count() }}</div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <section data-type="enviados" class="hist-section bg-white rounded-lg shadow overflow-hidden">
                <div class="p-4 border-b">
                    <h2 class="text-lg font-semibold text-gray-800">Itens enviados</h2>
                </div>
                <div class="overflow-x-auto">
                    <table id="table-enviados" class="min-w-full text-sm text-left">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-4 py-3 font-medium text-gray-700">Código</th>
                                <th class="px-4 py-3 font-medium text-gray-700">Origem</th>
                                <th class="px-4 py-3 font-medium text-gray-700">Destino</th>
                                <th class="px-4 py-3 font-medium text-gray-700">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cliente->enviados as $frete)
                                <tr class="hover:bg-gray-50 border-b">
                                    <td class="px-4 py-3 whitespace-nowrap">
                                        <a href="{{ route('frete.rastreamento', ['codigo_rastreio' => $frete->codigo_rastreio]) }}"
                                            class="text-indigo-600 hover:underline">{{ $frete->codigo_rastreio }}</a>
                                    </td>
                                    <td class="px-4 py-3">{{ $frete->origem }}</td>
                                    <td class="px-4 py-3">{{ $frete->destino }}</td>
                                    <td class="px-4 py-3 whitespace-nowrap">
                                        <span
                                            class="px-2 py-1 rounded-full text-sm {{ $frete->status->pegarCorEtiqueta() }}">{{ $frete->status }}</span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="p-4 border-t flex items-center justify-between">
                    <div class="text-sm text-gray-600">Mostrando <span
                            id="enviados-count">{{ $cliente->enviados->count() }}</span> itens</div>
                    <div id="enviados-pagination" class="flex items-center gap-2"></div>
                </div>
            </section>

            <section data-type="recebidos" class="hist-section bg-white rounded-lg shadow overflow-hidden">
                <div class="p-4 border-b">
                    <h2 class="text-lg font-semibold text-gray-800">Itens recebidos</h2>
                </div>
                <div class="overflow-x-auto">
                    <table id="table-recebidos" class="min-w-full text-sm text-left">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-4 py-3 font-medium text-gray-700">Código</th>
                                <th class="px-4 py-3 font-medium text-gray-700">Origem</th>
                                <th class="px-4 py-3 font-medium text-gray-700">Destino</th>
                                <th class="px-4 py-3 font-medium text-gray-700">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cliente->recebidos as $frete)
                                <tr class="hover:bg-gray-50 border-b">
                                    <td class="px-4 py-3 whitespace-nowrap">
                                        <a href="{{ route('frete.rastreamento', ['codigo_rastreio' => $frete->codigo_rastreio]) }}"
                                            class="text-indigo-600 hover:underline">{{ $frete->codigo_rastreio }}</a>
                                    </td>
                                    <td class="px-4 py-3">{{ $frete->origem }}</td>
                                    <td class="px-4 py-3">{{ $frete->destino }}</td>
                                    <td class="px-4 py-3 whitespace-nowrap">
                                        <span
                                            class="px-2 py-1 rounded-full text-sm {{ $frete->status->pegarCorEtiqueta() }}">{{ $frete->status }}</span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="p-4 border-t flex items-center justify-between">
                    <div class="text-sm text-gray-600">Mostrando <span
                            id="recebidos-count">{{ $cliente->recebidos->count() }}</span> itens</div>
                    <div id="recebidos-pagination" class="flex items-center gap-2"></div>
                </div>
            </section>
        </div>

        <div class="mt-6 flex justify-end gap-2">
            <a href="/" class="px-3 py-2 bg-gray-100 rounded-md text-gray-700">Voltar</a>
        </div>
    </div>
    <script>
        (function() {
            const input = document.getElementById('historico-search');
            const clearBtn = document.getElementById('historico-clear');
            const tabButtons = document.querySelectorAll('#hist-tabs .tab-btn');
            const sections = document.querySelectorAll('.hist-section');

            const tablesInfo = {
                enviados: {
                    table: document.getElementById('table-enviados'),
                    pagination: document.getElementById('enviados-pagination'),
                    count: document.getElementById('enviados-count'),
                    page: 1
                },
                recebidos: {
                    table: document.getElementById('table-recebidos'),
                    pagination: document.getElementById('recebidos-pagination'),
                    count: document.getElementById('recebidos-count'),
                    page: 1
                }
            };

            const rowsPerPage = 8;

            function normalize(text) {
                return (text || '').toString().toLowerCase();
            }

            function applyInitialMatch() {
                Object.values(tablesInfo).forEach(info => {
                    if (!info.table) return;
                    const rows = Array.from(info.table.querySelectorAll('tbody tr'));
                    rows.forEach(r => r.dataset.matched = '1');
                });
            }

            function applyFilter(query) {
                const q = normalize(query).trim();
                Object.values(tablesInfo).forEach(info => {
                    if (!info.table) return;
                    const rows = Array.from(info.table.querySelectorAll('tbody tr'));
                    rows.forEach(row => {
                        const text = normalize(row.innerText);
                        row.dataset.matched = (q === '' || text.indexOf(q) !== -1) ? '1' : '0';
                    });
                    info.page = 1; // reset page when filtering
                });
            }

            function renderPaginationFor(key, info) {
                if (!info.table) return;
                const rows = Array.from(info.table.querySelectorAll('tbody tr'));
                const matched = rows.filter(r => r.dataset.matched === '1');
                const total = matched.length;
                const pages = Math.max(1, Math.ceil(total / rowsPerPage));
                if (info.page > pages) info.page = pages;

                // hide all rows, then show only those for current page
                rows.forEach(r => r.style.display = 'none');
                const start = (info.page - 1) * rowsPerPage;
                const end = start + rowsPerPage;
                matched.slice(start, end).forEach(r => r.style.display = '');

                // update counts
                if (info.count) info.count.textContent = total;

                // render pagination controls
                if (info.pagination) {
                    info.pagination.innerHTML = '';
                    if (pages <= 1) return;
                    const prev = document.createElement('button');
                    prev.className = 'px-2 py-1 bg-gray-100 rounded';
                    prev.textContent = '<';
                    prev.disabled = info.page === 1;
                    prev.addEventListener('click', () => {
                        info.page--;
                        renderAll();
                    });
                    info.pagination.appendChild(prev);

                    for (let i = 1; i <= pages; i++) {
                        const b = document.createElement('button');
                        b.className = 'px-2 py-1 rounded ' + (i === info.page ? 'bg-indigo-600 text-white' :
                            'bg-gray-100');
                        b.textContent = i;
                        b.addEventListener('click', () => {
                            info.page = i;
                            renderAll();
                        });
                        info.pagination.appendChild(b);
                    }

                    const next = document.createElement('button');
                    next.className = 'px-2 py-1 bg-gray-100 rounded';
                    next.textContent = '>';
                    next.disabled = info.page === pages;
                    next.addEventListener('click', () => {
                        info.page++;
                        renderAll();
                    });
                    info.pagination.appendChild(next);
                }
            }

            function renderAll() {
                // respect current tab
                const activeTab = document.querySelector('#hist-tabs .tab-btn.bg-white')?.dataset.tab || 'all';
                sections.forEach(sec => {
                    const type = sec.dataset.type;
                    if (activeTab === 'all' || activeTab === type) sec.style.display = '';
                    else sec.style.display = 'none';
                });

                Object.entries(tablesInfo).forEach(([key, info]) => renderPaginationFor(key, info));
            }

            // debounce helper
            let timeout;

            // events
            if (input) {
                input.addEventListener('input', function(e) {
                    clearTimeout(timeout);
                    timeout = setTimeout(() => {
                        applyFilter(e.target.value);
                        renderAll();
                    }, 180);
                });
            }
            if (clearBtn) {
                clearBtn.addEventListener('click', function() {
                    if (input) input.value = '';
                    applyFilter('');
                    renderAll();
                });
            }

            tabButtons.forEach(btn => {
                btn.addEventListener('click', () => {
                    tabButtons.forEach(b => b.classList.remove('bg-white', 'shadow-sm'));
                    tabButtons.forEach(b => b.classList.add('bg-gray-100'));
                    btn.classList.add('bg-white', 'shadow-sm');
                    btn.classList.remove('bg-gray-100');
                    renderAll();
                });
            });

            // init
            applyInitialMatch();
            applyFilter('');
            // default active tab 'all'
            document.querySelector('#hist-tabs .tab-btn[data-tab="all"]')?.classList.add('bg-white', 'shadow-sm');
            renderAll();
        })();
    </script>
</x-layout>
