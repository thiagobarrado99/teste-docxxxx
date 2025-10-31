<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teste Docteka</title>
    <link rel="canonical" href="http://localhost:8000/">
    <meta property="og:locale" content="pt_BR">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Teste Docteka">
    <meta property="og:description" content="Teste Docteka">
    <meta property="og:url" content="http://localhost:8000/">
    <meta property="og:site_name" content="Teste Docteka">
    <meta property="article:modified_time" content="2022-09-14T18:28:19+00:00">
    <meta property="og:image" content="http://localhost:8000/images/faviconx192.png">
    <meta property="og:image:width" content="192">
    <meta property="og:image:height" content="192">
    <meta property="og:image:type" content="image/png">
    <meta property="description" content="Teste Docteka">
    
    <meta name="google" content="notranslate" />
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:label1" content="Est. tempo de leitura">
    <meta name="twitter:data1" content="5 minutos">
    <meta name="keywords" content="Teste, Docteka" />
    <meta name="description" content="Teste Docteka">

    <!-- / Yoast SEO plugin. -->
    <link rel="dns-prefetch" href="//s.w.org">
    <link rel="alternate" type="application/rss+xml" title="Teste Docteka" href="http://localhost:8000/">

    <link rel="shortlink" href="http://localhost:8000/">

    <link rel="icon" href="/images/faviconx192.png" sizes="192x192">
    <link rel="apple-touch-icon" href="/images/faviconx192.png">
    <meta name="msapplication-TileImage" content="/images/faviconx192.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">

    <meta name="csrf_token" content="{{ csrf_token() }}" />

    <!-- Bootstrap 5 CSS -->
    <link rel="stylesheet" href="/styles/bootstrap.min.css">
	<link rel="stylesheet" href="/styles/style.css?ver=2">
    <link rel="stylesheet" href="/styles/jquery.dataTables.min.css">
    <link rel="stylesheet" href="/styles/responsive.dataTables.min.css">
    <link rel="stylesheet" href="/styles/jquery-ui.css">

    <!-- Font Awesome -->
    <script type="module" src="https://kit.fontawesome.com/11551bd62e.js" crossorigin="anonymous"></script>
	
	<script src="/scripts/jquery.min.js"></script>
    <script src="/scripts/jquery-ui.js"></script>
    <script src="/scripts/jquery.dataTables.min.js"></script>
    <script src="/scripts/jquery.dataTables.accent-neutralise.js"></script>
    <script src="/scripts/dataTables.responsive.min.js"></script>
    <script src="/scripts/jquery.maskMoney.min.js" type="text/javascript"></script>
    <script src="/scripts/jquery.mask.min.js" type="text/javascript"></script>

    <audio id="notificationSound" src="/audio/notification.mp3" preload="auto"></audio>

    <!-- Custom CSS -->
    <style>
        :root {
            --primary-color: #8a2be2;
            --secondary-color: #6a0dad;
            --dark-color: #343a40;
            --light-color: #f8f9fa;
            --success-color: #28a745;
            --warning-color: #ffc107;
            --info-color: #17a2b8;
            --danger-color: #dc3545;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f7fa;
            overflow-x: hidden;
            padding-top: 56px;
        }
        
        /* Navbar Styling */
        .navbar {
            background: linear-gradient(135deg, var(--dark-color), #1c1e22);
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.3);
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1030;
        }
        
        .navbar-brand {
            color: white !important;
            font-weight: 600;
        }
        
        .navbar-brand i {
            color: var(--primary-color);
            margin-right: 8px;
        }
        
        .notification-icon {
            position: relative;
            margin-right: 15px;
        }
        
        .notification-badge {
            margin-left: -24px;
            top: -12px;
            right: -12px;
            background-color: var(--danger-color);
            color: white;
            font-size: 0.7rem;
            padding: 2px 5px;
            border-radius: 50%;
        }
        
        .user-avatar {
            background-color: var(--primary-color);
            color: white;
            width: 35px;
            height: 35px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
        }
        
        /* Sidebar Styling */
        .sidebar {
            background: linear-gradient(180deg, #2c2f33, #23272a);
            color: white;
            height: calc(100vh - 56px);
            position: fixed;
            top: 56px;
            left: 0;
            width: 250px;
            transition: all 0.3s;
            overflow-y: auto;
            z-index: 1020;
            box-shadow: 3px 0 15px rgba(0, 0, 0, 0.2);
        }
        
        @media (max-width: 992px) {
            .sidebar {
                transform: translateX(-100%);
                width: 260px;
                z-index: 1040;
            }
            
            .sidebar.active {
                transform: translateX(0);
            }
            
            .main-content {
                margin-left: 0 !important;
                padding: 0 !important;
            }
        }
        
        .sidebar::-webkit-scrollbar {
            width: 6px;
        }
        
        .sidebar::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.05);
        }
        
        .sidebar::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.2);
            border-radius: 10px;
        }
        
        .sidebar-header {
            padding: 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .category-title {
            color: rgba(255, 255, 255, 0.7);
            font-size: 0.85rem;
            text-transform: uppercase;
            padding: 10px 20px 0px 20px;
            /*margin-top: 15px;*/
            letter-spacing: 1px;
        }
        
        .nav-item {
            margin: 2px 15px;
            border-radius: 8px;
            transition: all 0.2s;
        }
        
        .nav-item:hover {
            background: rgba(255, 255, 255, 0.1);
        }
        
        .nav-item.active {
            background: linear-gradient(90deg, var(--primary-color), var(--secondary-color));
        }
        
        .nav-link {
            color: rgba(255, 255, 255, 0.85);
            padding: 12px 15px;
            display: flex;
            align-items: center;
            transition: all 0.3s;
        }
        
        .nav-link:hover {
            color: white;
        }
        
        .nav-link i {
            font-size: 1.1rem;
            width: 24px;
            text-align: center;
            margin-right: 12px;
        }
        
        /* Main Content Styling */
        .main-content {
            margin-left: 250px;
            padding: 20px;
            transition: all 0.3s;
            padding-top: 20px;
        }
        
        .page-header {
            margin-bottom: 30px;
            padding-bottom: 15px;
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
        }
        
        .page-title {
            font-weight: 600;
            margin-bottom: 0;
            position: relative;
        }
        
        .page-title:after {
            content: "";
            position: absolute;
            bottom: 0px;
            left: 0;
            width: 50px;
            height: 3px;
            background: var(--primary-color);
        }
        
        .page-subtitle {
            color: #6c757d;
            margin-top: 5px;
        }
        
        /* Card Styling */
        .dashboard-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            transition: all 0.3s;
            height: 100%;
            overflow: hidden;
            margin-bottom: 25px;
        }
        
        .dashboard-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.12);
        }
        
        .card-header {
            background-color: white;
            border-bottom: 1px solid rgba(0, 0, 0, 0.2);
            font-weight: 600;
            padding: 15px 20px;
            border-radius: 15px 15px 0 0 !important;
        }
        
        .card-body {
            padding: 25px;
        }
        
        /* Metric Card Styling */
        .metric-card {
            border-left: 4px solid var(--primary-color);
            padding: 20px;
            height: 100%;
        }
        
        .metric-icon {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 15px;
            font-size: 1.5rem;
        }
        
        .icon-primary {
            background-color: rgba(138, 43, 226, 0.15);
            color: var(--primary-color);
        }
        
        .icon-success {
            background-color: rgba(40, 167, 69, 0.15);
            color: var(--success-color);
        }
        
        .icon-warning {
            background-color: rgba(255, 193, 7, 0.15);
            color: var(--warning-color);
        }
        
        .icon-danger {
            background-color: rgba(220, 53, 69, 0.15);
            color: var(--danger-color);
        }
        
        .metric-number {
            font-size: 1.8rem;
            font-weight: 600;
            margin-bottom: 5px;
        }
        
        .metric-title {
            color: #6c757d;
            font-size: 0.95rem;
            margin-bottom: 10px;
        }
        
        .metric-trend {
            font-size: 0.85rem;
            display: flex;
            align-items: center;
        }
        
        .trend-up {
            color: var(--success-color);
        }
        
        .trend-down {
            color: var(--danger-color);
        }
        
        /* Table Styling */
        .dashboard-table {
            border-collapse: separate;
            border-spacing: 0;
            width: 100%;
        }
        
        .dashboard-table th {
            background-color: #f8f9fa;
            font-weight: 600;
            padding: 12px 15px;
            border-top: none;
        }
        
        .dashboard-table tr {
            transition: background-color 0.2s;
        }
        
        .dashboard-table tr:hover {
            background-color: #f8f9fa;
        }
        
        .dashboard-table td {
            padding: 15px;
            border-top: 1px solid #eee;
        }
        
        .table-badge {
            padding: 5px 10px;
            border-radius: 50px;
            font-size: 0.8rem;
            font-weight: 500;
        }
        
        .badge-confirmed {
            background-color: rgba(40, 167, 69, 0.15);
            color: var(--success-color);
        }
        
        .badge-pending {
            background-color: rgba(255, 193, 7, 0.15);
            color: var(--warning-color);
        }
        
        .badge-waiting {
            background-color: rgba(23, 162, 184, 0.15);
            color: var(--info-color);
        }
        
        .badge-cancelled {
            background-color: rgba(220, 53, 69, 0.15);
            color: var(--danger-color);
        }
        
        /* Artist List Styling */
        .artist-item {
            display: flex;
            align-items: center;
            padding: 12px 0;
            border-bottom: 1px solid #eee;
        }
        
        .artist-item:last-child {
            border-bottom: none;
        }
        
        .artist-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 15px;
        }
        
        .artist-info {
            flex-grow: 1;
        }
        
        .artist-name {
            font-weight: 500;
            margin-bottom: 2px;
        }
        
        .artist-shows {
            font-size: 0.8rem;
            color: #6c757d;
        }
        
        .artist-genre {
            font-size: 0.75rem;
            padding: 3px 8px;
            border-radius: 50px;
        }
        
        /* Mobile Sidebar Toggle */
        .sidebar-toggle {
            display: none;
        }
        
        @media (max-width: 992px) {
            .sidebar-toggle {
                display: inline-block;
                margin-right: 15px;
                font-size: 1.25rem;
                color: white;
            }
        }
        
        .overlay {
            position: fixed;
            top: 56px;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1035;
            display: none;
        }

        .popover-body {
            padding: 0em !important;
        }
    </style>

    <script>
        var BRLFormatter = new Intl.NumberFormat('pt-BR', {
            style: 'currency',
            currency: 'BRL',
        });

        function ReadNotifications() {
            $("#notification_counter").toggleClass("d-none", true);
            $.ajax({
                url: `/dashboard/view-notifications`,
                type: 'POST'
            });
        }

        function applyMoneyMask()
        {
            $(".mask-money").maskMoney({
                prefix: 'R$ ',
                allowNegative: true,
                thousands: '.',
                decimal: ',',
                affixesStay: false
            });
        }

        var last_keep_alive = Math.floor(Date.now() / 1000);
        function keepTokenAlive() {
            $.ajax({
                url: '/dashboard/keep-token-alive',
                method: 'post',
                data: { last : last_keep_alive } ,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                }
            }).done(function(data) {
                last_keep_alive = Math.floor(Date.now() / 1000);

                $("#notification_counter").html(data.unread_count);
                $("#notification_counter").toggleClass("d-none", (data.unread_count <= 0));

                Object.entries(data.item_counts).forEach(([key, value]) => {
                    $(`#${key}_total`).html(value);
                });

                console.log(data.notifications);
                if(data.notifications.length > 0)
                {
                    console.log("Playing sound");
                    $('#notificationSound')[0].play();

                    data.notifications.forEach(element => {
                        let d = new Date(element.created_at);
                        let not_date = ("0" + d.getDate()).slice(-2) + "/" + ("0"+(d.getMonth()+1)).slice(-2) + "/" + d.getFullYear() + " " + ("0" + d.getHours()).slice(-2) + ":" + ("0" + d.getMinutes()).slice(-2) + ":" + ("0" + d.getSeconds()).slice(-2);
                        if(element.url)
                        {
                            $("#notification_list").prepend(`<li>
                                <a class="dropdown-item hover-darken-light" href="${element.url}">
                                    <div>
                                        <h6 class="mb-0 fw-bold">${element.title}</h6>
                                        <p style="white-space: break-spaces;" class="mb-0 text-muted">${element.body}</p>
                                        <p style="font-size: 70%;" class="mb-0 text-muted text-end"><i class="fas fa-clock" aria-hidden="true"></i>&nbsp;${not_date}</p>
                                    </div>
                                </a>
                            </li>
                            <hr class="my-0">`);
                        }else{
                            $("#notification_list").prepend(`<li>
                                <div class="dropdown-item hover-darken-light">
                                    <div>
                                        <h6 class="mb-0 fw-bold">${element.title}</h6>
                                        <p style="white-space: break-spaces;" class="mb-0 text-muted">${element.body}</p>
                                        <p style="font-size: 70%;" class="mb-0 text-muted text-end"><i class="fas fa-clock" aria-hidden="true"></i>&nbsp;${not_date}</p>
                                    </div>
                                </div>
                            </li>
                            <hr class="my-0">`);
                        }
                    });
                }
            });
        }

        $(document).on('click', function(e) {
            if (!$(e.target).closest('#sidebar, #mobileToggle').length) {
                $('#sidebar').removeClass('active');
            }
        });

        $(document).ready(function() {
            $('[data-bs-toggle="tooltip"]').tooltip();
            $('[data-bs-toggle="popover"]').popover({
                html: true,
                container: 'body',
                sanitize: false
            });

            setInterval(keepTokenAlive, 20 * 1000); // every 20 secs

            $('[data-bs-toggle="dropdown"]').on('show.bs.dropdown', function () {
                $('body').addClass('noscroll');
                $('#app').addClass('noscroll');
            });

            $('[data-bs-toggle="dropdown"]').on('hidden.bs.dropdown', function () {
                $('body').removeClass('noscroll');
                $('#app').removeClass('noscroll');
            });

            $('body').on('click', function(e) {
                $('[data-bs-toggle=popover]').each(function() {
                    // hide any open popovers when the anywhere else in the body is clicked
                    if (!$(this).is(e.target) && $(this).has(e.target).length === 0 && $('.popover')
                        .has(e.target).length === 0) {
                        $(this).popover('hide');
                    }
                });
            });

            $.ajaxSetup({
                "headers": {
                    'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                }
            });

            $("#logout_button").on("click", function() {
                $("#logout_form").submit();
            });

            $('#notificationDropdown').on('click', function() {
                ReadNotifications();
            });

            $('#notificationDropdown').on('hidden.bs.dropdown', function () {
                $('#notification_list > li > .dropdown-item > div:not(.opacity-75)').toggleClass("opacity-75", true);
            });

            applyMoneyMask();
            
            $("[title]").tooltip({
                trigger: "hover"
            });

            // Toggle sidebar on mobile
            $("#mobileToggle").click(function() {
                $("#sidebar").toggleClass("active");
                $("#sidebarOverlay").fadeIn();
            });
            
            // Close sidebar when clicking overlay
            $("#sidebarOverlay").click(function() {
                $("#sidebar").removeClass("active");
                $(this).fadeOut();
            });
            
            // Draw dataTables
            $("table[data-table=true]").each(function(index) {
                let order = ($(this).data('order') !== undefined ? parseInt($(this).data('order')) : 0);
                let order_type = ($(this).data('order-type') !== undefined ? $(this).data('order-type') :
                    "asc");

                let searching = ($(this).data('searching') !== undefined ? false : true);
                let paging = ($(this).data('paging') !== undefined ? false : true);
                let info = ($(this).data('info') !== undefined ? false : true);
                let columnDefs = ($(this).data('column-defs') !== undefined ? $(this).data('column-defs') : []);

                let table = $(this).DataTable({
                    "lengthMenu": [100, 200, 500, 1000, 5000],
                    "responsive": true,
                    "columnDefs": columnDefs,
                    "searching": searching,
                    "paging": paging,
                    "info": info,
                    "language": {
                        "emptyTable": "Nenhum registro encontrado",
                        "info": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                        "infoEmpty": "Mostrando 0 até 0 de 0 registros",
                        "infoFiltered": "(Filtrados de _MAX_ registros)",
                        "infoThousands": ".",
                        "loadingRecords": "Carregando...",
                        "processing": "Processando...",
                        "zeroRecords": "Nenhum registro encontrado",
                        "search": "Pesquisar",
                        "paginate": {
                            "next": "Próximo",
                            "previous": "Anterior",
                            "first": "Primeiro",
                            "last": "Último"
                        },
                        "aria": {
                            "sortAscending": ": Ordenar colunas de forma ascendente",
                            "sortDescending": ": Ordenar colunas de forma descendente"
                        },
                        "select": {
                            "rows": {
                                "_": "Selecionado %d linhas",
                                "1": "Selecionado 1 linha"
                            },
                            "cells": {
                                "1": "1 célula selecionada",
                                "_": "%d células selecionadas"
                            },
                            "columns": {
                                "1": "1 coluna selecionada",
                                "_": "%d colunas selecionadas"
                            }
                        },
                        "buttons": {
                            "copySuccess": {
                                "1": "Uma linha copiada com sucesso",
                                "_": "%d linhas copiadas com sucesso"
                            },
                            "collection": "Coleção  <span class=\"ui-button-icon-primary ui-icon ui-icon-triangle-1-s\"><\/span>",
                            "colvis": "Visibilidade da Coluna",
                            "colvisRestore": "Restaurar Visibilidade",
                            "copy": "Copiar",
                            "copyKeys": "Pressione ctrl ou u2318 + C para copiar os dados da tabela para a área de transferência do sistema. Para cancelar, clique nesta mensagem ou pressione Esc..",
                            "copyTitle": "Copiar para a Área de Transferência",
                            "csv": "CSV",
                            "excel": "Excel",
                            "pageLength": {
                                "-1": "Mostrar todos os registros",
                                "_": "Mostrar %d registros"
                            },
                            "pdf": "PDF",
                            "print": "Imprimir",
                            "createState": "Criar estado",
                            "removeAllStates": "Remover todos os estados",
                            "removeState": "Remover",
                            "renameState": "Renomear",
                            "savedStates": "Estados salvos",
                            "stateRestore": "Estado %d",
                            "updateState": "Atualizar"
                        },
                        "autoFill": {
                            "cancel": "Cancelar",
                            "fill": "Preencher todas as células com",
                            "fillHorizontal": "Preencher células horizontalmente",
                            "fillVertical": "Preencher células verticalmente"
                        },
                        "lengthMenu": "Exibir _MENU_ resultados por página",
                        "searchBuilder": {
                            "add": "Adicionar Condição",
                            "button": {
                                "0": "Construtor de Pesquisa",
                                "_": "Construtor de Pesquisa (%d)"
                            },
                            "clearAll": "Limpar Tudo",
                            "condition": "Condição",
                            "conditions": {
                                "date": {
                                    "after": "Depois",
                                    "before": "Antes",
                                    "between": "Entre",
                                    "empty": "Vazio",
                                    "equals": "Igual",
                                    "not": "Não",
                                    "notBetween": "Não Entre",
                                    "notEmpty": "Não Vazio"
                                },
                                "number": {
                                    "between": "Entre",
                                    "empty": "Vazio",
                                    "equals": "Igual",
                                    "gt": "Maior Que",
                                    "gte": "Maior ou Igual a",
                                    "lt": "Menor Que",
                                    "lte": "Menor ou Igual a",
                                    "not": "Não",
                                    "notBetween": "Não Entre",
                                    "notEmpty": "Não Vazio"
                                },
                                "string": {
                                    "contains": "Contém",
                                    "empty": "Vazio",
                                    "endsWith": "Termina Com",
                                    "equals": "Igual",
                                    "not": "Não",
                                    "notEmpty": "Não Vazio",
                                    "startsWith": "Começa Com",
                                    "notContains": "Não contém",
                                    "notStarts": "Não começa com",
                                    "notEnds": "Não termina com"
                                },
                                "array": {
                                    "contains": "Contém",
                                    "empty": "Vazio",
                                    "equals": "Igual à",
                                    "not": "Não",
                                    "notEmpty": "Não vazio",
                                    "without": "Não possui"
                                }
                            },
                            "data": "Data",
                            "deleteTitle": "Excluir regra de filtragem",
                            "logicAnd": "E",
                            "logicOr": "Ou",
                            "title": {
                                "0": "Construtor de Pesquisa",
                                "_": "Construtor de Pesquisa (%d)"
                            },
                            "value": "Valor",
                            "leftTitle": "Critérios Externos",
                            "rightTitle": "Critérios Internos"
                        },
                        "searchPanes": {
                            "clearMessage": "Limpar Tudo",
                            "collapse": {
                                "0": "Painéis de Pesquisa",
                                "_": "Painéis de Pesquisa (%d)"
                            },
                            "count": "{total}",
                            "countFiltered": "{shown} ({total})",
                            "emptyPanes": "Nenhum Painel de Pesquisa",
                            "loadMessage": "Carregando Painéis de Pesquisa...",
                            "title": "Filtros Ativos",
                            "showMessage": "Mostrar todos",
                            "collapseMessage": "Fechar todos"
                        },
                        "thousands": ".",
                        "datetime": {
                            "previous": "Anterior",
                            "next": "Próximo",
                            "hours": "Hora",
                            "minutes": "Minuto",
                            "seconds": "Segundo",
                            "amPm": [
                                "am",
                                "pm"
                            ],
                            "unknown": "-",
                            "months": {
                                "0": "Janeiro",
                                "1": "Fevereiro",
                                "10": "Novembro",
                                "11": "Dezembro",
                                "2": "Março",
                                "3": "Abril",
                                "4": "Maio",
                                "5": "Junho",
                                "6": "Julho",
                                "7": "Agosto",
                                "8": "Setembro",
                                "9": "Outubro"
                            },
                            "weekdays": [
                                "Domingo",
                                "Segunda-feira",
                                "Terça-feira",
                                "Quarta-feira",
                                "Quinte-feira",
                                "Sexta-feira",
                                "Sábado"
                            ]
                        },
                        "editor": {
                            "close": "Fechar",
                            "create": {
                                "button": "Novo",
                                "submit": "Criar",
                                "title": "Criar novo registro"
                            },
                            "edit": {
                                "button": "Editar",
                                "submit": "Atualizar",
                                "title": "Editar registro"
                            },
                            "error": {
                                "system": "Ocorreu um erro no sistema (<a target=\"\\\" rel=\"nofollow\" href=\"\\\">Mais informações<\/a>)."
                            },
                            "multi": {
                                "noMulti": "Essa entrada pode ser editada individualmente, mas não como parte do grupo",
                                "restore": "Desfazer alterações",
                                "title": "Multiplos valores",
                                "info": "Os itens selecionados contêm valores diferentes para esta entrada. Para editar e definir todos os itens para esta entrada com o mesmo valor, clique ou toque aqui, caso contrário, eles manterão seus valores individuais."
                            },
                            "remove": {
                                "button": "Remover",
                                "confirm": {
                                    "_": "Tem certeza que quer deletar %d linhas?",
                                    "1": "Tem certeza que quer deletar 1 linha?"
                                },
                                "submit": "Remover",
                                "title": "Remover registro"
                            }
                        },
                        "decimal": ",",
                        "stateRestore": {
                            "creationModal": {
                                "button": "Criar",
                                "columns": {
                                    "search": "Busca de colunas",
                                    "visible": "Visibilidade da coluna"
                                },
                                "name": "Nome:",
                                "order": "Ordernar",
                                "paging": "Paginação",
                                "scroller": "Posição da barra de rolagem",
                                "search": "Busca",
                                "searchBuilder": "Mecanismo de busca",
                                "select": "Selecionar",
                                "title": "Criar novo estado",
                                "toggleLabel": "Inclui:"
                            },
                            "duplicateError": "Já existe um estado com esse nome",
                            "emptyError": "Não pode ser vazio",
                            "emptyStates": "Nenhum estado salvo",
                            "removeConfirm": "Confirma remover %s?",
                            "removeError": "Falha ao remover estado",
                            "removeJoiner": "e",
                            "removeSubmit": "Remover",
                            "removeTitle": "Remover estado",
                            "renameButton": "Renomear",
                            "renameLabel": "Novo nome para %s:",
                            "renameTitle": "Renomear estado"
                        }
                    }
                });
                if (order >= 0) {
                    table.order([order, order_type]).draw();
                }
            });
        });
    </script>
</head>