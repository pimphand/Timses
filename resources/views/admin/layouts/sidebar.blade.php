<!-- ========== Left Sidebar Start ========== -->
<div class="leftside-menu">

    <!-- Brand Logo Light -->
    <a href="index.html" class="logo logo-light">
        <span class="logo-lg">
            <img src="{{ asset('assets') }}/images/logo.png" alt="logo">
        </span>
        <span class="logo-sm">
            <img src="{{ asset('assets') }}/images/logo-sm.png" alt="small logo">
        </span>
    </a>

    <!-- Brand Logo Dark -->
    <a href="index.html" class="logo logo-dark">
        <span class="logo-lg">
            <img src="{{ asset('assets') }}/images/logo-dark.png" alt="dark logo">
        </span>
        <span class="logo-sm">
            <img src="{{ asset('assets') }}/images/logo-sm.png" alt="small logo">
        </span>
    </a>
    <!-- Full Sidebar Menu Close Button -->
    <div class="button-close-fullsidebar">
        <i class="ri-close-fill align-middle"></i>
    </div>

    <!-- Sidebar -left -->
    <div class="h-100" id="leftside-menu-container" data-simplebar>
        <!-- Leftbar User -->
        <div class="leftbar-user">
            <a href="pages-profile.html">
                <img src="{{ asset('assets') }}/images/users/avatar-1.jpg" alt="user-image" height="42"
                    class="rounded-circle shadow-sm">
                <span class="leftbar-user-name mt-2">Michael Berndt</span>
            </a>
        </div>

        <!--- Sidemenu -->
        <ul class="side-nav">

            <li class="side-nav-title">Main</li>

            <li class="side-nav-item">
                <a href="index.html" class="side-nav-link">
                    <i class="ri-dashboard-2-fill"></i>
                    <span> Dashboard </span>
                </a>
            </li>

            <li class="side-nav-item">
                <a href="apps-calendar.html" class="side-nav-link">
                    <i class="ri-calendar-event-fill"></i>
                    <span> Calendar </span>
                </a>
            </li>

            <li class="side-nav-item">
                <a href="apps-chat.html" class="side-nav-link">
                    <i class="ri-message-3-fill"></i>
                    <span> Chat </span>
                </a>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarEmail" aria-expanded="false" aria-controls="sidebarEmail"
                    class="side-nav-link">
                    <i class="ri-mail-fill"></i>
                    <span> Email </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarEmail">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="apps-email-inbox.html">Inbox</a>
                        </li>
                        <li>
                            <a href="apps-email-read.html">Read Email</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-title">Components</li>

            <li class="side-nav-item">
                <a href="{{ route('volunteers.index') }}" aria-expanded="false" aria-controls="sidebarBaseUI"
                    class="side-nav-link">
                    <i class="ri-briefcase-fill"></i>
                    <span> Relawan </span>
                </a>

            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarExtendedUI" aria-expanded="false"
                    aria-controls="sidebarExtendedUI" class="side-nav-link">
                    <i class="ri-stack-fill"></i>
                    <span> Extended UI </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarExtendedUI">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="extended-dragula.html">Dragula</a>
                        </li>
                        <li>
                            <a href="extended-range-slider.html">Range Slider</a>
                        </li>
                        <li>
                            <a href="extended-ratings.html">Ratings</a>
                        </li>
                        <li>
                            <a href="extended-scrollbar.html">Scrollbar</a>
                        </li>
                        <li>
                            <a href="extended-scrollspy.html">Scrollspy</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarIcons" aria-expanded="false" aria-controls="sidebarIcons"
                    class="side-nav-link">
                    <i class="ri-service-fill"></i>
                    <span> Icons </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarIcons">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="icons-remixicons.html">Remix Icons</a>
                        </li>
                        <li>
                            <a href="icons-bootstrap.html">Bootstrap Icons</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarCharts" aria-expanded="false" aria-controls="sidebarCharts"
                    class="side-nav-link">
                    <i class="ri-bar-chart-fill"></i>
                    <span> Apex Charts </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarCharts">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="charts-apex-area.html">Area</a>
                        </li>
                        <li>
                            <a href="charts-apex-bar.html">Bar</a>
                        </li>
                        <li>
                            <a href="charts-apex-bubble.html">Bubble</a>
                        </li>
                        <li>
                            <a href="charts-apex-candlestick.html">Candlestick</a>
                        </li>
                        <li>
                            <a href="charts-apex-column.html">Column</a>
                        </li>
                        <li>
                            <a href="charts-apex-heatmap.html">Heatmap</a>
                        </li>
                        <li>
                            <a href="charts-apex-line.html">Line</a>
                        </li>
                        <li>
                            <a href="charts-apex-mixed.html">Mixed</a>
                        </li>
                        <li>
                            <a href="charts-apex-timeline.html">Timeline</a>
                        </li>
                        <li>
                            <a href="charts-apex-boxplot.html">Boxplot</a>
                        </li>
                        <li>
                            <a href="charts-apex-treemap.html">Treemap</a>
                        </li>
                        <li>
                            <a href="charts-apex-pie.html">Pie</a>
                        </li>
                        <li>
                            <a href="charts-apex-radar.html">Radar</a>
                        </li>
                        <li>
                            <a href="charts-apex-radialbar.html">RadialBar</a>
                        </li>
                        <li>
                            <a href="charts-apex-scatter.html">Scatter</a>
                        </li>
                        <li>
                            <a href="charts-apex-polar-area.html">Polar Area</a>
                        </li>
                        <li>
                            <a href="charts-apex-sparklines.html">Sparklines</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarForms" aria-expanded="false" aria-controls="sidebarForms"
                    class="side-nav-link">
                    <i class="ri-survey-fill"></i>
                    <span> Forms </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarForms">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="form-elements.html">Basic Elements</a>
                        </li>
                        <li>
                            <a href="form-advanced.html">Form Advanced</a>
                        </li>
                        <li>
                            <a href="form-validation.html">Validation</a>
                        </li>
                        <li>
                            <a href="form-wizard.html">Wizard</a>
                        </li>
                        <li>
                            <a href="form-fileuploads.html">File Uploads</a>
                        </li>
                        <li>
                            <a href="form-editors.html">Editors</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarTables" aria-expanded="false" aria-controls="sidebarTables"
                    class="side-nav-link">
                    <i class="ri-table-fill"></i>
                    <span> Tables </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarTables">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="tables-basic.html">Basic Tables</a>
                        </li>
                        <li>
                            <a href="tables-datatable.html">Data Tables</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarMaps" aria-expanded="false" aria-controls="sidebarMaps"
                    class="side-nav-link">
                    <i class="ri-treasure-map-fill"></i>
                    <span> Maps </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarMaps">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="maps-google.html">Google Maps</a>
                        </li>
                        <li>
                            <a href="maps-vector.html">Vector Maps</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-title">Custom</li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarPages" aria-expanded="false" aria-controls="sidebarPages"
                    class="side-nav-link">
                    <i class="ri-pages-fill"></i>
                    <span> Pages </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarPages">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="pages-invoice.html">Invoice</a>
                        </li>
                        <li>
                            <a href="pages-faq.html">FAQ</a>
                        </li>
                        <li>
                            <a href="pages-pricing.html">Pricing</a>
                        </li>
                        <li>
                            <a href="pages-maintenance.html">Maintenance</a>
                        </li>
                        <li>
                            <a href="pages-starter.html">Starter Page</a>
                        </li>
                        <li>
                            <a href="pages-preloader.html">With Preloader</a>
                        </li>
                        <li>
                            <a href="pages-timeline.html">Timeline</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarPagesAuth" aria-expanded="false"
                    aria-controls="sidebarPagesAuth" class="side-nav-link">
                    <i class="ri-shield-user-fill"></i>
                    <span> Auth Pages </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarPagesAuth">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="auth-login.html">Login</a>
                        </li>
                        <li>
                            <a href="auth-register.html">Register</a>
                        </li>
                        <li>
                            <a href="auth-logout.html">Logout</a>
                        </li>
                        <li>
                            <a href="auth-recoverpw.html">Recover Password</a>
                        </li>
                        <li>
                            <a href="auth-lock-screen.html">Lock Screen</a>
                        </li>
                        <li>
                            <a href="auth-confirm-mail.html">Confirm Mail</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarPagesError" aria-expanded="false"
                    aria-controls="sidebarPagesError" class="side-nav-link">
                    <i class="ri-error-warning-fill"></i>
                    <span> Error Pages </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarPagesError">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="error-404.html">Error 404</a>
                        </li>
                        <li>
                            <a href="error-404-alt.html">Error 404-alt</a>
                        </li>
                        <li>
                            <a href="error-500.html">Error 500</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarLayouts" aria-expanded="false" aria-controls="sidebarLayouts"
                    class="side-nav-link">
                    <i class="ri-layout-fill"></i>
                    <span> Layouts </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarLayouts">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="layouts-compact.html" target="_blank">Compact</a>
                        </li>
                        <li>
                            <a href="layouts-icon-view.html" target="_blank">Icon View</a>
                        </li>
                        <li>
                            <a href="layouts-full.html" target="_blank">Full View</a>
                        </li>
                        <li>
                            <a href="layouts-fullscreen.html" target="_blank">Fullscreen View</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarMultiLevel" aria-expanded="false"
                    aria-controls="sidebarMultiLevel" class="side-nav-link">
                    <i class="ri-share-fill"></i>
                    <span> Multi Level </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarMultiLevel">
                    <ul class="side-nav-second-level">
                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarSecondLevel" aria-expanded="false"
                                aria-controls="sidebarSecondLevel">
                                <span> Second Level </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarSecondLevel">
                                <ul class="side-nav-third-level">
                                    <li>
                                        <a href="javascript: void(0);">Item 1</a>
                                    </li>
                                    <li>
                                        <a href="javascript: void(0);">Item 2</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarThirdLevel" aria-expanded="false"
                                aria-controls="sidebarThirdLevel">
                                <span> Third Level </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarThirdLevel">
                                <ul class="side-nav-third-level">
                                    <li>
                                        <a href="javascript: void(0);">Item 1</a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a data-bs-toggle="collapse" href="#sidebarFourthLevel" aria-expanded="false"
                                            aria-controls="sidebarFourthLevel">
                                            <span> Item 2 </span>
                                            <span class="menu-arrow"></span>
                                        </a>
                                        <div class="collapse" id="sidebarFourthLevel">
                                            <ul class="side-nav-forth-level">
                                                <li>
                                                    <a href="javascript: void(0);">Item 2.1</a>
                                                </li>
                                                <li>
                                                    <a href="javascript: void(0);">Item 2.2</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </li>


        </ul>
        <!--- End Sidemenu -->

        <div class="clearfix"></div>
    </div>
</div>
<!-- ========== Left Sidebar End ========== -->