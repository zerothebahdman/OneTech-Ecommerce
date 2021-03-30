<nav id="sidebar" class="sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="{{ route('welcome') }}">
            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                y="0px" width="20px" height="20px" viewBox="0 0 20 20" enable-background="new 0 0 20 20"
                xml:space="preserve">
                <path d="M19.4,4.1l-9-4C10.1,0,9.9,0,9.6,0.1l-9,4C0.2,4.2,0,4.6,0,5s0.2,0.8,0.6,0.9l9,4C9.7,10,9.9,10,10,10s0.3,0,0.4-0.1l9-4
                                          C19.8,5.8,20,5.4,20,5S19.8,4.2,19.4,4.1z" />
                <path d="M10,15c-0.1,0-0.3,0-0.4-0.1l-9-4c-0.5-0.2-0.7-0.8-0.5-1.3c0.2-0.5,0.8-0.7,1.3-0.5l8.6,3.8l8.6-3.8c0.5-0.2,1.1,0,1.3,0.5
                                          c0.2,0.5,0,1.1-0.5,1.3l-9,4C10.3,15,10.1,15,10,15z" />
                <path d="M10,20c-0.1,0-0.3,0-0.4-0.1l-9-4c-0.5-0.2-0.7-0.8-0.5-1.3c0.2-0.5,0.8-0.7,1.3-0.5l8.6,3.8l8.6-3.8c0.5-0.2,1.1,0,1.3,0.5
                                          c0.2,0.5,0,1.1-0.5,1.3l-9,4C10.3,20,10.1,20,10,20z" />
            </svg>

            <span class="align-middle mr-3">OneTech</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Pages
            </li>
            <li class="sidebar-item active">
                <a href="{{ route('admin.dashboard') }}" class="sidebar-link">
                    <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboards</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="#pages" data-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle" data-feather="layout"></i> <span class="align-middle">Product
                        Categories</span>
                </a>
                <ul id="pages" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link"
                            href="{{ route('admin.category.index') }}">Category</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="{{ route('admin.subCategory.index') }}">Sub
                            Category</a>
                    </li>
                    <li class="sidebar-item"><a class="sidebar-link" href="{{ route('admin.brand.index') }}">Brand</a>
                    </li>
                </ul>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('admin.coupon.index') }}">
                    <i class="fa fa-ticket-alt align-middle"></i> <span class="align-middle">Coupon</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('admin.newsletter.index') }}">
                    <i class="fa fa-ticket-alt align-middle"></i> <span class="align-middle">News Letter</span>
                </a>
            </li>

            <li class="sidebar-header">
                Tools & Components
            </li>
            <li class="sidebar-item">
                <a href="#forms" data-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle" data-feather="check-square"></i> <span class="align-middle">Forms</span>
                </a>
                <ul id="forms" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="forms-layouts.html">Layouts</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="forms-basic-inputs.html">Basic
                            Inputs</a>
                    </li>
                    <li class="sidebar-item"><a class="sidebar-link" href="forms-input-groups.html">Input
                            Groups</a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="tables-bootstrap.html">
                    <i class="align-middle" data-feather="list"></i> <span class="align-middle">Tables</span>
                </a>
            </li>

            <li class="sidebar-header">
                Plugin & Addons
            </li>
            <li class="sidebar-item">
                <a href="#form-plugins" data-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle" data-feather="check-square"></i> <span class="align-middle">Form
                        Plugins</span>
                </a>
                <ul id="form-plugins" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="forms-advanced-inputs.html">Advanced
                            Inputs</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="forms-editors.html">Editors</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="forms-validation.html">Validation</a>
                    </li>
                    <li class="sidebar-item"><a class="sidebar-link" href="forms-wizard.html">Wizard</a></li>
                </ul>
            </li>
            <li class="sidebar-item">
                <a href="#datatables" data-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle" data-feather="list"></i> <span class="align-middle">DataTables</span>
                </a>
                <ul id="datatables" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="tables-datatables-responsive.html">Responsive
                            Table</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="tables-datatables-buttons.html">Table
                            with Buttons</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="tables-datatables-column-search.html">Column
                            Search</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="tables-datatables-multi.html">Multi
                            Selection</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="tables-datatables-ajax.html">Ajax
                            Sourced
                            Data</a></li>
                </ul>
            </li>
            <li class="sidebar-item">
                <a href="#multi" data-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle" data-feather="share-2"></i> <span class="align-middle">Multi
                        Level</span>
                </a>
                <ul id="multi" class="sidebar-dropdown list-unstyled collapse" data-parent="#sidebar">
                    <li class="sidebar-item">
                        <a href="#multi-2" data-toggle="collapse" class="sidebar-link collapsed">
                            Two Levels
                        </a>
                        <ul id="multi-2" class="sidebar-dropdown list-unstyled collapse">
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="#">Item 1</a>
                                <a class="sidebar-link" href="#">Item 2</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-item">
                        <a href="#multi-3" data-toggle="collapse" class="sidebar-link collapsed">
                            Three Levels
                        </a>
                        <ul id="multi-3" class="sidebar-dropdown list-unstyled collapse">
                            <li class="sidebar-item">
                                <a href="#multi-3-1" data-toggle="collapse" class="sidebar-link collapsed">
                                    Item 1
                                </a>
                                <ul id="multi-3-1" class="sidebar-dropdown list-unstyled collapse">
                                    <li class="sidebar-item">
                                        <a class="sidebar-link" href="#">Item 1</a>
                                        <a class="sidebar-link" href="#">Item 2</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="#">Item 2</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
