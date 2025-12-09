<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <!--begin::Sidebar Brand-->
    <div class="sidebar-brand">
        <!--begin::Brand Link-->
        <a href="{{route('student.welcome')}}" class="brand-link">
            <!--begin::Brand Image-->
            <img
                src="{{asset('assets/img/theme_img/Logo.png')}}"
                alt="Infinity logo"
                class="brand-image opacity-75 shadow"
            />
            <!--end::Brand Image-->
            <!--begin::Brand Text-->
            <span class="brand-text fw-light">Dashboard</span>

            <!--end::Brand Text-->
        </a>
        <!--end::Brand Link-->
    </div>
    <!--end::Sidebar Brand-->
    <!--begin::Sidebar Wrapper-->
    <div class="sidebar-wrapper">
        <nav class="mt-5">
            <!--begin::Sidebar Menu-->
            <ul
                class="nav sidebar-menu flex-column"
                data-lte-toggle="treeview"
                role="navigation"
                aria-label="Main navigation"
                data-accordion="false"
                id="navigation"
            >
                <li class="nav-item ">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon bi bi-mortarboard-fill"></i>
                        <p>
                           Student Section
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('student.sregiform')}}" class="nav-link active">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Student Register</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('student.studentlistview')}}" class="nav-link active">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Students List</p>
                            </a>
                        </li>

                    </ul>

</li>
{{--Teacher Section begin--}}
                <li class="nav-item ">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon bi bi-file-earmark-person"></i>
                        <p>
                           Teacher Section
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('teacher.tregiform')}}" class="nav-link active">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Teacher Register</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('teacher.teacherlistview')}}" class="nav-link active">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Teacher List</p>
                            </a>
                        </li>

                    </ul>

                </li>

                    {{--Course Section begin--}}


                <li class="nav-item ">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon bi bi-speedometer"></i>
                        <p>
                          Course Section
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('course.courseregiform')}}" class="nav-link active">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Course Register</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('course.courselistview')}}" class="nav-link active">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Course List</p>
                            </a>
                        </li>

                    </ul>

                </li>


                {{--Subject Section begin--}}


                <li class="nav-item ">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon bi bi-speedometer"></i>
                        <p>
                            Subject Section
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('subject.subregiform')}}" class="nav-link active">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Subject Register</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('subject.subjectlistview')}}" class="nav-link active">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Subjects List</p>
                            </a>
                        </li>

                    </ul>

                </li>


                <li class="nav-item ">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon bi bi-mortarboard-fill"></i>
                        <p>
                            Grade Section
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('grade.graderegiform')}}" class="nav-link active">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Grade Register</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href='{{route('grade.gradelistview')}}' class="nav-link active">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Grade List List</p>
                            </a>
                        </li>

                    </ul>

                </li>


                <li class="nav-item ">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon bi bi-mortarboard-fill"></i>
                        <p>
                            Class Section
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('class.classregiform')}}" class="nav-link active">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Class Register</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('class.classlistview')}}" class="nav-link active">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Class List</p>
                            </a>
                        </li>

                    </ul>

                </li>





                {{--                Report Section--}}


                <li class="nav-item ">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon bi bi-speedometer"></i>
                        <p>
                           Reports Section
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
            </ul>
            <!--end::Sidebar Menu-->
        </nav>
    </div>
    <!--end::Sidebar Wrapper-->
</aside>
