@php
    $currentRoute = \Request::route()->getName();
@endphp
<aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class=" my-3 d-flex">
            <img src="{{ asset('assets/dist/img/esg.png') }}" width="100%" height="100px" alt="User Image">
            {{-- </div> --}}
            {{-- <div class="info">
                <a href="#" class="d-block"> {{ Auth::user()->name }}</a>
            </div> --}}
        </div>
        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                {{-- <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Dashboard
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="./index.html" class="nav-link">
                                <i class="far fa-circle nav-icon-right"></i>
                                <p>Waste</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./index2.html" class="nav-link">
                                <i class="far fa-circle nav-icon-right"></i>
                                <p>Water</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./index3.html" class="nav-link">
                                <i class="far fa-circle nav-icon-right"></i>
                                <p>Social</p>
                            </a>
                        </li>
                    </ul>
                </li> --}}
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link{{ $currentRoute == 'home' ? ' active' : '' }}">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Home
                        </p>
                    </a>
                </li>
                <li
                    class="nav-item{{ in_array($currentRoute, [
                        'entity.index',
                        'location.index',
                        'legalStatus.index',
                        'lineofbusiness.index',
                        'function.index',
                        'process.index',
                        'productService.index',
                    ])
                        ? ' menu-is-opening menu-open'
                        : '' }}">
                    <a href="#"
                        class="nav-link {{ in_array($currentRoute, [
                            'entity.index',
                            'location.index',
                            'legalStatus.index',
                            'lineofbusiness.index',
                            'function.index',
                            'process.index',
                            'productService.index',
                        ])
                            ? 'active'
                            : '' }}">
                        <i class="nav-icon fas fa-building"></i>
                        <p>
                            Entity Information
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('entity.index', ['entity' => 'all']) }}"
                                class="nav-link{{ $currentRoute == 'entity.index' ? ' active' : '' }}">
                                <i class="nav-icon-right fas fa-arrow-right "></i>
                                <p>
                                    Entity
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('location.index', ['location' => 'all']) }}"
                                class="nav-link{{ $currentRoute == 'location.index' ? ' active' : '' }}">
                                <i class="nav-icon-right fas fa-arrow-right "></i>
                                <p>
                                    Locations
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('legalStatus.index', ['legalStatus' => 'all']) }}"
                                class="nav-link{{ $currentRoute == 'legalStatus.index' ? ' active' : '' }}">
                                <i class="nav-icon-right fas fa-arrow-right "></i>
                                <p>
                                    Legal Status
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('lineofbusiness.index', ['lob' => 'all']) }}"
                                class="nav-link{{ $currentRoute == 'lineofbusiness.index' ? ' active' : '' }}">
                                <i class="nav-icon-right fas fa-arrow-right "></i>
                                <p>
                                    Line of Business
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('function.index', ['function' => 'all']) }}"
                                class="nav-link{{ $currentRoute == 'function.index' ? ' active' : '' }}">
                                <i class="nav-icon-right fas fa-arrow-right "></i>
                                <p>
                                    Functions
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('process.index', ['process' => 'all']) }}"
                                class="nav-link{{ $currentRoute == 'process.index' ? ' active' : '' }}">
                                <i class="nav-icon-right fas fa-arrow-right "></i>
                                <p>
                                    Process
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('productService.index', ['productService' => 'all']) }}"
                                class="nav-link{{ $currentRoute == 'productService.i' ? ' active' : '' }}">
                                <i class="nav-icon-right fas fa-arrow-right "></i>
                                <p>
                                    Product Services
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-bars "></i>
                        <p>
                            Org. Governance
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('board_of_directors.index') }}"
                                class="nav-link{{ $currentRoute == 'board_of_directors.index' ? ' active' : '' }}">
                                <i class="nav-icon-right fas fa-arrow-right "></i>
                                <p>
                                    Board Of Directors
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('board_committee.index') }}"
                                class="nav-link{{ $currentRoute == 'board_committee.index' ? ' active' : '' }}">
                                <i class="nav-icon-right fas fa-arrow-right "></i>
                                <p>
                                    Board Committee
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('executive_committee.index') }}"
                                class="nav-link{{ $currentRoute == 'executive_committee.index' ? ' active' : '' }}">
                                <i class="nav-icon-right fas fa-arrow-right "></i>
                                <p>
                                    Executive Committee
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-----------   Dropdown       -------->
                {{-- <li class="nav-item"> --}}
                {{-- <a href="#" class="nav-link{{ $currentRoute == 'dashboard' ? ' active' : '' }} "> --}}
                {{-- <i class="nav-icon-right fas fa-arrow-right "></i> --}}
                {{-- <p> --}}
                {{-- Org. Governance --}}
                {{-- <i class="right fas fa-angle-left"></i> --}}
                {{-- </p> --}}
                {{-- </a> --}}
                {{-- <ul class="nav nav-treeview"> --}}
                {{-- <li class="nav-item"> --}}
                {{-- <a href="#" class="nav-link{{ $currentRoute == 'dashboard' ? ' active' : '' }}"> --}}
                {{-- <i class="nav-icon-right fas fa-arrow-right "></i> --}}
                {{-- <p> --}}
                {{-- Board of Directors --}}
                {{-- </p> --}}
                {{-- </a> --}}
                {{-- </li> --}}
                {{-- </ul> --}}
                {{-- </li> --}}
                <li
                    class="nav-item{{ in_array($currentRoute, [
                        'auditor.index',
                        'framework.index',
                        'reporting_convention.index',
                        'esg_report.index',
                    ])
                        ? ' menu-is-opening menu-open'
                        : '' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-file "></i>
                        <p>
                            Sustainab. Reporting
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('auditor.index') }}"
                                class="nav-link{{ $currentRoute == 'auditor.index' ? ' active' : '' }}">
                                <i class="nav-icon-right fas fa-arrow-right "></i>
                                <p>
                                    Auditor
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('framework.index') }}"
                                class="nav-link{{ $currentRoute == 'framework.index' ? ' active' : '' }}">
                                <i class="nav-icon-right fas fa-arrow-right "></i>
                                <p>
                                    Reporting Framework
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('reporting_convention.index') }}"
                                class="nav-link{{ $currentRoute == 'reporting_convention.index' ? ' active' : '' }}">
                                <i class="nav-icon-right fas fa-arrow-right "></i>
                                <p>
                                    Reporting Convention
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('esg_report.index') }}"
                                class="nav-link{{ $currentRoute == 'esg_report.index' ? ' active' : '' }}">
                                <i class="nav-icon-right fas fa-arrow-right "></i>
                                <p>
                                    ESG Report
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class=" nav-icon fa fa-chart-line" aria-hidden="true"></i>
                        <p>
                            Stakeholder Analysis
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link{{ $currentRoute == 'dashboard' ? ' active' : '' }}">
                                <i class="nav-icon-right fas fa-arrow-right "></i>
                                <p>
                                    Stakeholder
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li
                    class="nav-item{{ in_array($currentRoute, ['sdg.index', 'sdg_sub_category.index', 'material_topic_create.index'])
                        ? ' menu-is-opening menu-open'
                        : '' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tasks "></i>
                        <p>
                            Manage Material Topic
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('sdg.index') }}"
                                class="nav-link{{ $currentRoute == 'sdg.index' ? ' active' : '' }}">
                                <i class="nav-icon-right fas fa-arrow-right "></i>
                                <p>
                                    SDG
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('sdg_sub_category.index') }}"
                                class="nav-link{{ $currentRoute == 'sdg_sub_category.index' ? ' active' : '' }}">
                                <i class="nav-icon-right fas fa-arrow-right "></i>
                                <p>
                                    SDGs (Sub Category)
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('material_topic_create.index') }}"
                                class="nav-link{{ $currentRoute == 'material_topic_create.index' ? ' active' : '' }}">
                                <i class="nav-icon-right fas fa-arrow-right "></i>
                                <p>
                                    Material Topic Create
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- <li
                    class="nav-item{{ in_array($currentRoute, ['sdg.index', 'sdg_sub_category.index', 'material_topic_create.index'])
                        ? ' menu-is-opening menu-open'
                        : '' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-arrow-right "></i>
                        <p>
                            Org. Governance
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon-right fas fa-arrow-right "></i>
                                <p>
                                    Board of Directors
                                </p>
                            </a>
                        </li>
                    </ul>
                </li> --}}
                <li
                    class="nav-item{{ in_array($currentRoute, [
                        'vChainStage.index',
                        'wasteType.index',
                        'measureUnit.index',
                        'wasteComposition.index',
                        'recoveryMethod.index',
                        'compCheckProcedure.index',
                        'disposalMethod.index',
                        'significances.index',
                        'manageBy.index',
                        'obligation.index',
                        'WastePreventActionType.index',
                        'wasteGenerationImpact.index',
                        'waste_gen.index',
                        'wg_from_disposal.index',
                        'wg_to_disposal.index',
                        'wg_from_disposal.index',
                    ])
                        ? ' menu-is-opening menu-open'
                        : '' }}">
                    <a href="#"
                        class="nav-link {{ in_array($currentRoute, [
                            'vChainStage.index',
                            'wasteType.index',
                            'measureUnit.index',
                            'wasteComposition.index',
                            'recoveryMethod.index',
                            'compCheckProcedure.index',
                            'disposalMethod.index',
                            'significances.index',
                            'manageBy.index',
                            'obligation.index',
                            'WastePreventActionType.index',
                        ])
                            ? ' active'
                            : '' }}">
                        <i class="nav-icon far fa-plus-square"></i>
                        <p>
                            Environmental
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview"
                        {{ in_array($currentRoute, [
                            'vChainStage.index',
                            'wasteType.index',
                            'measureUnit.index',
                            'wasteComposition.index',
                            'recoveryMethod.index',
                            'compCheckProcedure.index',
                            'disposalMethod.index',
                            'significances.index',
                            'manageBy.index',
                            'obligation.index',
                            'WastePreventActionType.index',
                        ])
                            ? `style=display: block`
                            : 'style=display: none;' }}>
                        <li
                            class="nav-item{{ in_array($currentRoute, [
                                'vChainStage.index',
                                'wasteType.index',
                                'measureUnit.index',
                                'wasteComposition.index',
                                'recoveryMethod.index',
                                'compCheckProcedure.index',
                                'disposalMethod.index',
                                'significances.index',
                                'manageBy.index',
                                'obligation.index',
                                'WastePreventActionType.index',
                            ])
                                ? ' menu-is-opening menu-open'
                                : '' }}">
                            <a href="#"
                                class="nav-link {{ in_array($currentRoute, [
                                    'vChainStage.index',
                                    'wasteType.index',
                                    'measureUnit.index',
                                    'wasteComposition.index',
                                    'recoveryMethod.index',
                                    'compCheckProcedure.index',
                                    'disposalMethod.index',
                                    'significances.index',
                                    'manageBy.index',
                                    'obligation.index',
                                    'WastePreventActionType.index',
                                ])
                                    ? ' active'
                                    : '' }}">
                                <i class=" fa fa-arrow-right nav-icon-right"></i>
                                <p>
                                    Waste
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview"
                                {{ in_array($currentRoute, [
                                    'vChainStage.index',
                                    'wasteType.index',
                                    'measureUnit.index',
                                    'wasteComposition.index',
                                    'recoveryMethod.index',
                                    'compCheckProcedure.index',
                                    'disposalMethod.index',
                                    'significances.index',
                                    'manageBy.index',
                                    'obligation.index',
                                    'WastePreventActionType.index',
                                ])
                                    ? `style=display: block`
                                    : 'style=display: none;' }}>
                                <li  class="nav-item {{ in_array($currentRoute, [
                                    'vChainStage.index',
                                    'wasteType.index',
                                    'measureUnit.index',
                                    'wasteComposition.index',
                                    'recoveryMethod.index',
                                    'compCheckProcedure.index',
                                    'disposalMethod.index',
                                    'significances.index',
                                    'manageBy.index',
                                    'obligation.index',
                                    'WastePreventActionType.index',
                                ])
                                    ? 'active menu-is-opening menu-open'
                                    : '' }}">
                                    <a href="" class="nav-link {{ in_array($currentRoute, [
                                        'vChainStage.index',
                                        'wasteType.index',
                                        'measureUnit.index',
                                        'wasteComposition.index',
                                        'recoveryMethod.index',
                                        'compCheckProcedure.index',
                                        'disposalMethod.index',
                                        'significances.index',
                                        'manageBy.index',
                                        'obligation.index',
                                        'WastePreventActionType.index',
                                    ])
                                        ? 'active'
                                        : '' }}">
                                        <i class="nav-icon-right far fa-circle "></i>
                                        <p>
                                            Setup
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview" {{ in_array($currentRoute, [
                                        'vChainStage.index',
                                        'wasteType.index',
                                        'measureUnit.index',
                                        'wasteComposition.index',
                                        'recoveryMethod.index',
                                        'compCheckProcedure.index',
                                        'disposalMethod.index',
                                        'significances.index',
                                        'manageBy.index',
                                        'obligation.index',
                                        'WastePreventActionType.index',
                                    ])
                                        ? `style=display: block`
                                        : 'style=display: none;' }}>
                                        {{-- <li class="nav-item">
                                            <a href="{{ route('vChainStage.index', ['vChainStage' => 'all']) }}"
                                                class="nav-link{{ $currentRoute == 'vChainStage.index' ? ' active' : '' }}">
                                                <i class="far fa-dot-circle nav-icon-right"></i>
                                                <p>
                                                    Value Chain Stages
                                                </p>
                                            </a>
                                        </li> --}}
                                        {{-- <li class="nav-item">
                                            <a href="{{ route('wasteType.index', ['wasteType' => 'all']) }}"
                                                class="nav-link{{ $currentRoute == 'wasteType.index' ? ' active' : '' }}">
                                                <i class="far fa-dot-circle nav-icon-right"></i>
                                                <p>
                                                    Waste Types
                                                </p>
                                            </a>
                                        </li> --}}
                                        <li class="nav-item">
                                            <a href="{{ route('measureUnit.index', ['measureUnit' => 'all']) }}"
                                                class="nav-link{{ $currentRoute == 'measureUnit.index' ? ' active' : '' }}">
                                                <i class="far fa-dot-circle nav-icon-right"></i>
                                                <p>
                                                    Unit Of Measure
                                                </p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('wasteComposition.index', ['wasteComposition' => 'all']) }}"
                                                class="nav-link{{ $currentRoute == 'wasteComposition.index' ? ' active' : '' }}">
                                                <i class="far fa-dot-circle nav-icon-right"></i>
                                                <p>
                                                    Waste Compositions
                                                </p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('recoveryMethod.index', ['recoveryMethod' => 'all']) }}"
                                                class="nav-link{{ $currentRoute == 'recoveryMethod.index' ? ' active' : '' }}">
                                                <i class="far fa-dot-circle nav-icon-right"></i>
                                                <p>
                                                    Recovery Method
                                                </p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('compCheckProcedure.index', ['compCheckProcedure' => 'all']) }}"
                                                class="nav-link{{ $currentRoute == 'compCheckProcedure.index' ? ' active' : '' }}">
                                                <i class="far fa-dot-circle nav-icon-right"></i>
                                                <p>
                                                    compliance checking
                                                </p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('disposalMethod.index', ['disposalMethod' => 'all']) }}"
                                                class="nav-link{{ $currentRoute == 'disposalMethod.index' ? ' active' : '' }}">
                                                <i class="far fa-dot-circle nav-icon-right"></i>
                                                <p>
                                                    Disposal Method
                                                </p>
                                            </a>
                                        </li>
                                        {{-- <li class="nav-item">
                                                <a href="{{ route('significances.index') }}"
                                                    class="nav-link{{ $currentRoute == 'significances.index' ? ' active' : '' }}">
                                                  <i class="far fa-dot-circle nav-icon-right"></i>
                                                    <p>
                                                        Significances
                                                    </p>
                                                </a>
                                            </li> --}}
                                        {{-- <li class="nav-item">
                                            <a href="{{ route('manageBy.index', ['manageBy' => 'all']) }}"
                                                class="nav-link{{ $currentRoute == 'manageBy.index' ? ' active' : '' }}">
                                                <i class="far fa-dot-circle nav-icon-right"></i>
                                                <p>
                                                    manage By
                                                </p>
                                            </a>
                                        </li> --}}
                                        {{-- <li class="nav-item">
                                            <a href="{{route('obligation.index',['obligation'=>'all']) }}"
                                                class="nav-link{{ $currentRoute == 'obligation.index' ? ' active' : '' }}">
                                                <i class="far fa-dot-circle nav-icon-right"></i>
                                                <p>
                                                    Compliance Obligation
                                                </p>
                                            </a>
                                        </li> --}}
                                        <li class="nav-item">
                                            <a href="{{ route('WastePreventActionType.index',['WastePreventActionType'=>'all']) }}"
                                                class="nav-link{{ $currentRoute == 'WastePreventActionType.index' ? ' active' : '' }}">
                                                <i class="far fa-dot-circle nav-icon-right"></i>
                                                <p>
                                                    Waste Prevent Action Type
                                                </p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li
                                    class="nav-item {{ in_array($currentRoute, [
                                        'wasteGenerationImpact.index',
                                        'waste_gen.index',
                                        'wg_from_disposal.index',
                                        'wg_to_disposal.index',
                                        'wg_from_disposal.index',
                                    ])
                                        ? ' menu-is-opening menu-open'
                                        : '' }}">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon-right far fa-circle "></i>
                                        <p>
                                            Our Workbook
                                            <i class="fas fa-angle-left right"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{ route('wasteGenerationImpact.index',['wasteGenerationImpact'=>'all']) }}"
                                                class="nav-link{{ $currentRoute == 'wasteGenerationImpact.index' ? ' active' : '' }} {{ Route::is('wasteGenerationImpact.index') ? 'active' : '' }}">
                                                <i class="far fa-dot-circle nav-icon-right"></i>
                                                <p>Waste and its Impact</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('waste_gen.index') }}"
                                                class="nav-link{{ $currentRoute == 'waste_gen.index' ? ' active' : '' }}">
                                                <i class="far fa-dot-circle nav-icon-right"></i>
                                                <p>
                                                    {{-- Waste Generated 306(3) --}}
                                                    Waste Tracking
                                                </p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('wg_from_disposal.index') }}"
                                                class="nav-link{{ $currentRoute == 'wg_from_disposal.index' ? ' active' : '' }}">
                                                <i class="far fa-dot-circle nav-icon-right"></i>
                                                <p>
                                                    {{-- Waste Diverted 306(4) --}}
                                                    Waste Recovered
                                                </p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('wg_to_disposal.index') }}"
                                                class="nav-link{{ $currentRoute == 'wg_to_disposal.index' ? ' active' : '' }}">
                                                <i class="far fa-dot-circle nav-icon-right"></i>
                                                <p>
                                                    {{-- Waste Directed 306(5) --}}
                                                    Waste Disposed
                                                </p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li
                    class="nav-item{{ in_array($currentRoute, ['stages.index']) ? ' menu-is-opening menu-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>
                            Settings
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="nav-icon-right fas fa-arrow-right "></i>
                                <p>
                                    Access Management
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="nav-icon-right fas fa-arrow-right "></i>
                                <p>
                                    Profile settings
                                </p>
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a href="{{ route('stages.index') }}"
                                class="nav-link{{ $currentRoute == 'stages.index' ? ' active' : '' }}">
                                <i class="nav-icon-right fas fa-arrow-right "></i>
                                <p>
                                    Stages
                                </p>
                            </a>
                        </li> --}}
                    </ul>
                </li>
                {{-- <li class="nav-item">
                    <a href="{{ route('data_compilation.index') }}"
                        class="nav-link{{ $currentRoute == 'data_compilation.index' ? ' active' : '' }}">
                        <i class="nav-icon-right fas fa-arrow-right "></i>
                        <p>
                            Data Compilation
                        </p>
                    </a>
                </li>
                  <li class="nav-item">
                    <a href="{{ route('esg_report_loc.index') }}"
                        class="nav-link{{ $currentRoute == 'esg_report_loc.index' ? ' active' : '' }}">
                        <i class="nav-icon-right fas fa-arrow-right "></i>
                        <p>
                            Esg Report Locations
                        </p>
                    </a>
                </li> --}}

            </ul>
        </nav>
    </div>
</aside>
