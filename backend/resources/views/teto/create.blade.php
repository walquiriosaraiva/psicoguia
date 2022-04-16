<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Contrato de Objetivos</title>
    <!-- Fonte Rawline-->
    <link rel="stylesheet"
          href="https://cdn.dsgovserprodesign.estaleiro.serpro.gov.br/design-system/fonts/rawline/css/rawline.css"/>
    <!-- Fonte Raleway-->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700,800,900&amp;display=swap"/>
    <!-- Design System de Governo-->
    <link rel="stylesheet" href="{{ URL::asset('dist/dsgov.css') }}"/>

    <!-- Fontawesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css"/>
</head>
<body>
<div class="template-base">
    <nav id="skip-links">
        <div class="skip-links"><a accesskey="1" href="#main-content">Ir para o Conteúdo<strong
                    class="accesskey">1</strong></a><a accesskey="2" href="#main-navigation">Ir para para
                Navegação<strong
                    class="accesskey">2</strong></a><a accesskey="3" href="#main-searchbox">Ir para para Busca<strong
                    class="accesskey">3</strong></a>
        </div>
    </nav>
    <header class="br-header" id="header" data-sticky="data-sticky">
        <div class="container-lg">
            <div class="header-top">
                <div class="header-logo"><img
                        src="https://cdn.dsgovserprodesign.estaleiro.serpro.gov.br/design-system/images/logo-positive.png"
                        alt="logo"/><span class="br-divider vertical mx-half mx-sm-1"></span>
                    <div class="header-sign">Assinatura</div>
                </div>
                <div class="header-actions">
                    <div class="header-functions dropdown">
                        <button class="br-button circle small" type="button" data-toggle="dropdown"
                                aria-label="Abrir Funcionalidades do Sistema"><i class="fas fa-th"
                                                                                 aria-hidden="true"></i>
                        </button>
                        <div class="br-list">
                            <div class="header">
                                <div class="title">Funcionalidades do Sistema</div>
                            </div>

                            <div class="align-items-center br-item">
                                <button class="br-button circle small" type="button" aria-label="Funcionalidade 4"><i
                                        class="fas fa-adjust" aria-hidden="true"></i><span
                                        class="text">Funcionalidade 4</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="header-search-trigger">
                        <button class="br-button circle" type="button" aria-label="Abrir Busca" data-toggle="search"
                                data-target=".header-search"><i class="fas fa-search" aria-hidden="true"></i>
                        </button>
                    </div>
                    <div class="header-login">
                        <div class="header-sign-in">
                            <button class="br-button sign-in small" type="button" data-trigger="login"><i
                                    class="fas fa-user"
                                    aria-hidden="true"></i><span class="d-sm-inline">Entrar</span>
                            </button>
                        </div>
                        <div class="header-avatar d-none">
                            <div class="avatar dropdown"><span class="br-avatar" title="Fulana da Silva"><span
                                        class="image"><img
                                            src="https://picsum.photos/id/823/400" alt="Avatar"/></span></span>
                                <button class="br-button circle small" type="button" aria-label="Abrir Menu de usuário"
                                        data-toggle="dropdown"><i class="fas fa-angle-down" aria-hidden="true"></i>
                                </button>
                                <div class="br-notification show">
                                    <div class="notification-header">
                                        <div class="row">
                                            <div class="col-10"><span class="text-bold">Walquirio Saraiva
                            Rocha</span><br/><small><a>walquirio.rocha@gov.br</a></small></div>
                                        </div>
                                    </div>
                                    <div class="notification-body">
                                        <div class="br-tab">
                                            <nav class="tab-nav">
                                                <ul>
                                                    <li class="tab-item">
                                                        <button type="button" data-panel="notif-item149"
                                                                aria-label="notif-item149"><span
                                                                class="name"><span class="icon"><i class="fas fa-image"
                                                                                                   aria-hidden="true"></i></span><span
                                                                    class="name">Item</span></span></button>
                                                    </li>
                                                    <li class="tab-item is-active">
                                                        <button type="button" data-panel="notif-item150"
                                                                aria-label="notif-item150"><span
                                                                class="name"><span class="icon"><i class="fas fa-image"
                                                                                                   aria-hidden="true"></i></span><span
                                                                    class="name">Item</span></span></button>
                                                    </li>
                                                </ul>
                                            </nav>
                                            <div class="tab-content">
                                                <div class="tab-panel" id="notif-item149">
                                                    <div class="br-list">
                                                        <button class="br-item" type="button"><i
                                                                class="fas fa-heartbeat"
                                                                aria-hidden="true"></i>Link de Acesso
                                                        </button>
                                                        <span class="br-divider"></span>
                                                        <button class="br-item" type="button"><i
                                                                class="fas fa-heartbeat"
                                                                aria-hidden="true"></i>Link de Acesso
                                                        </button>
                                                        <span class="br-divider"></span>
                                                        <button class="br-item" type="button"><i
                                                                class="fas fa-heartbeat"
                                                                aria-hidden="true"></i>Link de Acesso
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="tab-panel is-active" id="notif-item150">
                                                    <div class="br-list">
                                                        <button class="br-item" type="button"><span
                                                                class="br-tag status small warning"></span><span
                                                                class="text-bold">Título</span><span
                                                                class="text-medium mb-2">25 de out</span><span>Nostrud consequat culpa ex mollit aute.
                                  Ex ex veniam ea labore laboris duis duis elit. Ex aute dolor enim aute Lorem dolor.
                                  Duis labore ad anim culpa. Non aliqua excepteur sunt eiusmod ex consectetur ex esse
                                  laborum velit ut aute.</span>
                                                        </button>
                                                        <span class="br-divider"></span>
                                                        <button class="br-item" type="button"><span class="text-bold">Título</span><span
                                                                class="text-medium mb-2">24 de out</span><span>Labore nulla elit laborum nulla duis.
                                  Deserunt ad nulla commodo occaecat nulla proident ea proident aliquip dolore sunt
                                  nulla. Do sit eu consectetur quis culpa. Eiusmod minim irure sint nulla incididunt
                                  occaecat ipsum mollit in ut. Minim adipisicing veniam adipisicing velit nostrud duis
                                  consectetur aute nulla deserunt culpa aliquip.</span>
                                                        </button>
                                                        <span class="br-divider"></span>
                                                        <button class="br-item" type="button"><span
                                                                class="br-tag status small warning"></span><span
                                                                class="text-bold">Título</span><span
                                                                class="text-medium mb-2">03 de out</span><span>Duis qui dolor dolor qui sint
                                  consectetur. Ipsum eu dolore ex anim reprehenderit laborum commodo. Labore do ut nulla
                                  eiusmod consectetur.</span>
                                                        </button>
                                                        <span class="br-divider"></span>
                                                        <button class="br-item" type="button"><span class="text-bold">Título</span><span
                                                                class="text-medium mb-2">16 de mai</span><span>Sunt velit dolor enim mollit incididunt
                                  irure est. Ad ea Lorem culpa quis occaecat sunt in exercitation nisi. Sit laborum
                                  laborum dolor culpa ipsum velit. Non nulla nisi dolore et anim consequat officia
                                  deserunt amet qui. Incididunt exercitation irure labore ut Lorem culpa. Dolore ea
                                  irure pariatur ullamco culpa veniam amet dolor in fugiat pariatur ut. Sit non ut enim
                                  et incididunt tempor irure pariatur ex proident labore cillum dolore nisi.</span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-bottom">
                <div class="header-menu">
                    <div class="header-menu-trigger">
                        <div class="br-menu" id="main-navigation">
                            <div class="menu-trigger">
                                <button class="br-button circle small" type="button" data-toggle="menu"
                                        aria-label="Abrir Menu Principal"><i class="fas fa-bars" aria-hidden="true"></i>
                                </button>
                            </div>
                            <div class="menu-container">
                                <div class="row">
                                    <div class="col-sm-4 col-lg-3">
                                        <div class="menu-panel">
                                            <div class="menu-header">
                                                <div class="menu-close">
                                                    <button class="br-button circle" type="button"
                                                            aria-label="Fechar o menu"
                                                            data-dismiss="menu"><i class="fas fa-times"
                                                                                   aria-hidden="true"></i>
                                                    </button>
                                                </div>
                                                <div class="menu-title"><img
                                                        src="https://cdn.dsgovserprodesign.estaleiro.serpro.gov.br/design-system/images/logo-positive.png"
                                                        alt="Imagem ilustrativa"/></div>
                                            </div>
                                            <nav class="menu-body">
                                                <div class="menu-folder"><a class="menu-item"
                                                                            href="javascript: void(0)"><span
                                                            class="content">Agrupamento de menu 1</span></a>
                                                    <ul>
                                                        <li><a class="menu-item" href="javascript: void(0)"><span
                                                                    class="content">Item de
                                    menu</span></a></li>
                                                        <li><a class="menu-item" href="javascript: void(0)"><span
                                                                    class="content">Item de
                                    menu</span></a>
                                                            <ul>
                                                                <li><a class="menu-item"
                                                                       href="javascript: void(0)"><span class="content">Filho do
                                        item de menu 1</span></a></li>
                                                                <li><a class="menu-item"
                                                                       href="javascript: void(0)"><span class="content">Filho do
                                        item de menu 1</span></a>
                                                                    <ul>
                                                                        <li><a class="menu-item"
                                                                               href="javascript: void(0)"><span
                                                                                    class="content">Último
                                            nível de menu</span></a></li>
                                                                        <li><a class="menu-item"
                                                                               href="javascript: void(0)"><span
                                                                                    class="content">Último
                                            nível de menu</span></a></li>
                                                                        <li><a class="menu-item"
                                                                               href="javascript: void(0)"><span
                                                                                    class="content">Último
                                            nível de menu</span></a></li>
                                                                    </ul>
                                                                </li>
                                                                <li><a class="menu-item"
                                                                       href="javascript: void(0)"><span class="content">Filho do
                                        item de menu 1</span></a></li>
                                                            </ul>
                                                        </li>
                                                        <li><a class="menu-item" href="javascript: void(0)"><span
                                                                    class="content">Item de
                                    menu</span></a></li>
                                                    </ul>
                                                </div>
                                                <div class="menu-folder"><a class="menu-item"
                                                                            href="javascript: void(0)"><span
                                                            class="content">Agrupamento de menu 2</span></a>
                                                    <ul>
                                                        <li><a class="menu-item" href="javascript: void(0)"><span
                                                                    class="content">Item de
                                    menu</span></a></li>
                                                        <li><a class="menu-item" href="javascript: void(0)"><span
                                                                    class="content">Item de
                                    menu</span></a>
                                                            <ul>
                                                                <li><a class="menu-item"
                                                                       href="javascript: void(0)"><span class="content">Filho do
                                        item de menu 2</span></a></li>
                                                                <li><a class="menu-item"
                                                                       href="javascript: void(0)"><span class="content">Filho do
                                        item de menu 2</span></a>
                                                                    <ul>
                                                                        <li><a class="menu-item"
                                                                               href="javascript: void(0)"><span
                                                                                    class="content">Último
                                            nível de menu</span></a></li>
                                                                        <li><a class="menu-item"
                                                                               href="javascript: void(0)"><span
                                                                                    class="content">Último
                                            nível de menu</span></a></li>
                                                                        <li><a class="menu-item"
                                                                               href="javascript: void(0)"><span
                                                                                    class="content">Último
                                            nível de menu</span></a></li>
                                                                    </ul>
                                                                </li>
                                                                <li><a class="menu-item"
                                                                       href="javascript: void(0)"><span class="content">Filho do
                                        item de menu 2</span></a></li>
                                                            </ul>
                                                        </li>
                                                        <li><a class="menu-item" href="javascript: void(0)"><span
                                                                    class="content">Item de
                                    menu</span></a></li>
                                                    </ul>
                                                </div>
                                                <div class="menu-folder"><a class="menu-item"
                                                                            href="javascript: void(0)"><span
                                                            class="content">Agrupamento de menu 3</span></a>
                                                    <ul>
                                                        <li><a class="menu-item" href="javascript: void(0)"><span
                                                                    class="content">Item de
                                    menu</span></a></li>
                                                        <li><a class="menu-item" href="javascript: void(0)"><span
                                                                    class="content">Item de
                                    menu</span></a>
                                                            <ul>
                                                                <li><a class="menu-item"
                                                                       href="javascript: void(0)"><span class="content">Filho do
                                        item de menu 3</span></a></li>
                                                                <li><a class="menu-item"
                                                                       href="javascript: void(0)"><span class="content">Filho do
                                        item de menu 3</span></a>
                                                                    <ul>
                                                                        <li><a class="menu-item"
                                                                               href="javascript: void(0)"><span
                                                                                    class="content">Último
                                            nível de menu</span></a></li>
                                                                        <li><a class="menu-item"
                                                                               href="javascript: void(0)"><span
                                                                                    class="content">Último
                                            nível de menu</span></a></li>
                                                                        <li><a class="menu-item"
                                                                               href="javascript: void(0)"><span
                                                                                    class="content">Último
                                            nível de menu</span></a></li>
                                                                    </ul>
                                                                </li>
                                                                <li><a class="menu-item"
                                                                       href="javascript: void(0)"><span class="content">Filho do
                                        item de menu 3</span></a></li>
                                                            </ul>
                                                        </li>
                                                        <li><a class="menu-item" href="javascript: void(0)"><span
                                                                    class="content">Item de
                                    menu</span></a></li>
                                                    </ul>
                                                </div>
                                            </nav>
                                            <div class="menu-footer">
                                                <div class="menu-logos"><img
                                                        src="https://cdn.dsgovserprodesign.estaleiro.serpro.gov.br/design-system/images/logo-positive.png"
                                                        alt="Imagem ilustrativa"/><img
                                                        src="https://cdn.dsgovserprodesign.estaleiro.serpro.gov.br/design-system/images/logo-positive.png"
                                                        alt="Imagem ilustrativa"/></div>
                                                <div class="menu-links"><a href="javascript: void(0)">Órgãos do Governo&nbsp;<i
                                                            class="fas fa-external-link-square-alt"
                                                            aria-hidden="true"></i></a><a
                                                        href="javascript: void(0)">Legislação&nbsp;<i
                                                            class="fas fa-external-link-square-alt"
                                                            aria-hidden="true"></i></a></div>
                                                <div class="menu-social">
                                                    <div class="text-semi-bold mb-1">Título</div>
                                                    <div class="sharegroup">
                                                        <div class="share"><a class="br-button circle"
                                                                              href="javascript: void(0)"
                                                                              aria-label="Compartilhar por Facebook"><i
                                                                    class="fab fa-facebook-f"
                                                                    aria-hidden="true"></i></a></div>
                                                        <div class="share"><a class="br-button circle"
                                                                              href="javascript: void(0)"
                                                                              aria-label="Compartilhar por Twitter"><i
                                                                    class="fab fa-twitter"
                                                                    aria-hidden="true"></i></a></div>
                                                        <div class="share"><a class="br-button circle"
                                                                              href="javascript: void(0)"
                                                                              aria-label="Compartilhar por Linkedin"><i
                                                                    class="fab fa-linkedin-in"
                                                                    aria-hidden="true"></i></a></div>
                                                        <div class="share"><a class="br-button circle"
                                                                              href="javascript: void(0)"
                                                                              aria-label="Compartilhar por Whatsapp"><i
                                                                    class="fab fa-whatsapp"
                                                                    aria-hidden="true"></i></a></div>
                                                    </div>
                                                </div>
                                                <div class="menu-info">
                                                    <div class="text-center text-down-01">Todo o conteúdo deste site
                                                        está publicado sob a
                                                        licença <strong>Creative Commons Atribuição-SemDerivações
                                                            3.0</strong></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="menu-scrim" data-dismiss="menu" tabindex="0"></div>
                            </div>
                        </div>
                    </div>
                    <div class="header-info">
                        <div class="header-title">Sistema de Contrato de Objetivos</div>
                        <div class="header-subtitle">Subtítulo</div>
                    </div>
                </div>
                <div class="header-search">
                    <div class="br-input has-icon">
                        <label for="main-searchbox">Texto da pesquisa</label>
                        <input class="has-icon" id="main-searchbox" type="search" placeholder="O que você procura?"/>
                        <button class="br-button circle small" type="button" aria-label="Pesquisar"><i
                                class="fas fa-search"
                                aria-hidden="true"></i>
                        </button>
                    </div>
                    <button class="br-button circle search-close" type="button" aria-label="Fechar Busca"
                            data-dismiss="search"><i class="fas fa-times" aria-hidden="true"></i>
                    </button>
                </div>
            </div>
        </div>
    </header>
    <main id="main">
        <div class="container-lg">
            <div class="row" id="container-grid">
                <div class="col-sm-4 col-md-3" id="container-navigation">
                    <div class="br-menu auxiliary">
                        <div class="br-menu auxiliary">
                            <div class="menu-trigger">
                                <button class="br-button primary block" type="button" data-toggle="menu">Menu Auxiliar<i
                                        class="fas fa-angle-up" aria-hidden="true"></i>
                                </button>
                            </div>
                            <div class="menu-container">
                                <div class="menu-panel">
                                    <nav class="menu-body">
                                        <div class="folder">
                                            <ul>
                                                <li><a class="menu-item active" href="javascript: void(0)"><span
                                                            class="content">Prazos para
                                estimativa de Tetos</span></a></li>
                                                <li><a class="menu-item" href="javascript: void(0)"><span
                                                            class="content">Prazos para
                                elaboração e alteração dos Planos de Aplicação</span></a></li>
                                                <li><a class="menu-item" href="javascript: void(0)"><span
                                                            class="content">Prazos para análise
                                dos Planos de Aplicação</span></a></li>
                                            </ul>
                                        </div>
                                    </nav>
                                </div>
                                <div class="menu-scrim" data-dismiss="menu" tabindex="0"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="main-content pl-3 col-lg-9" id="main-content">
                    <form class="form-horizontal col-md-offset-1" role="form"
                          action="{{ route('teto.register') }}"
                          method="post"
                          name="formTeto"
                          id="formTeto">
                        {{ csrf_field() }}
                        <div class="main-content p-2x">
                            <p class="h2">Prazos para estimativa de tetos</p>
                            <button class="br-button primary mt-3 mt-sm-0 ml-sm-3"
                                    type="button"
                                    id="petanoSel"
                                    name="petanoSel"
                                    value="2022">
                                2022
                            </button>
                        </div>

                        <!--accordion-->
                        <div class="br-accordion br-accordion-sco" negative="negative">
                            <div class="item item-sco">
                                <button class="header" type="button" aria-controls="id5" aria-expanded="false"><span
                                        class="icon"><i
                                            class="fas fa-angle-down" aria-hidden="true"></i></span><span
                                        class="title">Formalização</span>
                                    <input type="hidden" name="petdsc" id="petdsc" value="Formalização">
                                    <input type="hidden" name="petano" id="petano" value="2022">
                                </button>
                            </div>
                            <div class="content content-sco" id="id5"
                                 aria-hidden="true">

                                <div class="tab-content">

                                    <div class="br-table" data-search="data-search" data-selection="data-selection">
                                        <div class="table-header">

                                            <table>
                                                <caption>Título da Tabela</caption>
                                                <thead>
                                                <tr>
                                                    <th scope="col" class="col-1">
                                                        <div class="br-checkbox hidden-label">
                                                            <input id="check-all-57672" name="check-all-57672"
                                                                   type="checkbox" data-toggle="check-all"/>
                                                            <label for="check-all-57672">Selecionar todas as
                                                                linhas</label>
                                                        </div>
                                                    </th>

                                                    <th scope="col" class="col-3">
                                                        Tipo de teto
                                                        <button class="br-button secondary small mt-3 mt-sm-0 ml-sm-3"
                                                                type="button" id="botao">+
                                                        </button>
                                                    </th>
                                                    </th>
                                                    <th scope="col" class="col-3">Prazo</th>
                                                    <th scope="col" class="col-3">Dias restantes</th>
                                                    <th scope="col" class="col-3">Devolvido</th>
                                                </tr>
                                                </thead>
                                                <tbody id="tabela">

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>


                                </div>

                            </div>

                            <div class="item item-sco">
                                <button class="header" type="button" aria-controls="id8" aria-expanded="false"><span
                                        class="icon"><i class="fas fa-angle-down" aria-hidden="true"></i></span><span
                                        class="title">Janela 1</span>
                                </button>
                            </div>
                            <div class="content content-sco" id="id8" aria-hidden="true">Janela 1</div>

                            <div class="item item-sco">
                                <button class="header" type="button" aria-controls="id9" aria-expanded="false"><span
                                        class="icon"><i class="fas fa-angle-down" aria-hidden="true"></i></span><span
                                        class="title">Janela 2</span>
                                </button>
                            </div>
                            <div class="content content-sco" id="id9" aria-hidden="true">Janela 2
                            </div>
                        </div>
                    </form>

                    <div class="main-content row justify-content-center p-2x">
                        <div class="col-md-8 col-sm-6 mb-5 mb-lg-10x">
                            <button class="br-button primary mt-3 mt-sm-0 ml-sm-3" type="button">Adicionar janela
                            </button>
                        </div>
                        <div class="col-md-2 col-sm-6 mb-5 mb-lg-10x">
                            <button class="br-button primary mt-3 mt-sm-0 ml-sm-3" type="button" id="salvar">Salvar
                            </button>
                        </div>
                        <div class="col-md-2 col-sm-6 mb-5 mb-lg-10x">
                            <button class="br-button primary mt-3 mt-sm-0 ml-sm-3" type="button" disabled="disabled">
                                Tramitar
                            </button>
                        </div>
                    </div>

                </div>


            </div>
        </div>
    </main>

    <div class="br-modal text-hide" id="modal" style="
        display: none;
        width: 85%; max-width: 600px;
        background: #fff; padding: 15px;
        border-radius: 5px;
        -webkit-box-shadow: 0px 6px 14px -2px rgba(0,0,0,0.75);
        -moz-box-shadow: 0px 6px 14px -2px rgba(0,0,0,0.75);
        box-shadow: 0px 6px 14px -2px rgba(0,0,0,0.75);
        position: fixed;
        top: 50%; left: 50%;
        transform: translate(-50%,-50%);
        z-index: 99999999; text-align: center;">
        <div class="br-card">
            <div class="container-fluid p-1 p-sm-4">
                <div class="br-modal-header">
                    <div class="br-modal-title" title="Título">Título</div>
                    <button class="br-button close circle small" id="botaoModal" type="button" data-dismiss="br-modal"
                            aria-label="Close"><i class="fas fa-times" aria-hidden="true"></i>
                    </button>
                </div>
                <div class="br-modal-body">
                </div>
                <div class="row">
                    <div class="col-sm-12 my-2">
                        <div class="br-select">
                            <div class="br-input">
                                <label for="select-simple" style="color: #000000;">Tipo de teto</label>
                                <input id="select-simple" type="text" placeholder="Selecione o item"/>
                                <button class="br-button circle small" type="button" aria-label="Exibir lista"
                                        tabindex="-1" data-trigger="data-trigger"><i class="fas fa-angle-down"></i>
                                </button>
                            </div>
                            <div class="br-list" tabindex="0">
                                @foreach($tipoteto as $key=>$value)
                                    <div class="br-item" tabindex="-1">
                                        <div class="br-radio">
                                            <input id="{{$value->tptid}}" type="radio" name="tptid"
                                                   about="{{$value->tptdsc}}"
                                                   alt="{{$value->tptdsc}}"
                                                   value="{{$value->tptid}}"/>
                                            <label for="{{$value->tptid}}">{{$value->tptdsc}}</label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <button class="br-button secondary small mt-3 mt-sm-0 ml-sm-3" type="button" name="adicionar"
                            id="adicionar">Adicionar
                    </button>

                </div>
            </div>
        </div>
    </div>

    <footer class="br-footer" id="footer">
        <div class="container-lg">
            <div class="logo text-center"><img
                    src="https://cdn.dsgovserprodesign.estaleiro.serpro.gov.br/design-system/images/logo-negative.png"
                    alt="Imagem"/></div>
        </div>
        <span class="br-divider my-3"></span>
        <div class="container-lg">
            <div class="info">
                <div class="text-down-01 text-medium pb-3">Texto destinado a exibição de informações relacionadas
                    à&nbsp;<strong>licença de uso.</strong></div>
            </div>
        </div>
    </footer>
</div>
<script src="{{ URL::asset('dist/dsgov.min.js') }} "></script>
<script src="{{ URL::asset('js/jquery-3.6.0.min.js') }} "></script>
<script src="{{ URL::asset('js/crud.js') }} "></script>
</body>
</html>
