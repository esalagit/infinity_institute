@extends('app')

@section('content')
    <!--begin::Row-->
    <div class="row">
        <!--begin::Col-->
        <div class="col-lg-3 col-6">
            <!--begin::Small Box Widget 1-->
            <div class="small-box text-bg-dark">
                <div class="inner">


                    <h3>{{ $studentCount }}</h3>
                    <p>Students</p>
                </div>
                <svg
                    class="small-box-icon"
                    fill="currentColor"
                    viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg"
                    aria-hidden="true"
                >
                    <path
                        d="M16 12h4m-2 2v-4M4 18v-1a3 3 0 0 1 3-3h4a3 3 0 0 1 3 3v1a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1Zm8-10a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"
                    ></path>
                </svg>

            </div>
            <!--end::Small Box Widget 1-->
        </div>
        <!--end::Col-->
        <div class="col-lg-3 col-6">
            <!--begin::Small Box Widget 2-->
            <div class="small-box text-bg-dark">
                <div class="inner">
                    <h3>{{ $teacherCount }}</h3>
                    <p>Teachers</p>
                </div>
                <svg
                    class="small-box-icon"
                    fill="currentColor"
                    viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg"
                    aria-hidden="true"
                >
                    <path
                        d="M16 12h4m-2 2v-4M4 18v-1a3 3 0 0 1 3-3h4a3 3 0 0 1 3 3v1a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1Zm8-10a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"
                    ></path>
                </svg>

            </div>
            <!--end::Small Box Widget 2-->
        </div>
        <!--end::Col-->

        <div class="col-lg-3 col-6">
            <!--begin::Small Box Widget 3-->
            <div class="small-box text-bg-dark">
                <div class="inner">
                    <h3>{{ $courseCount}}</h3>
                    <p>Courses</p>
                </div>
                <svg
                    class="small-box-icon"
                    fill="currentColor"
                    viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg"
                    aria-hidden="true"
                >
                    <path
                        d="M16 12h4m-2 2v-4M4 18v-1a3 3 0 0 1 3-3h4a3 3 0 0 1 3 3v1a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1Zm8-10a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"
                    ></path>
                </svg>

            </div>
            <!--end::Small Box Widget 2-->
        </div>
        <!--end::Col-->

        <div class="col-lg-3 col-6">
            <!--begin::Small Box Widget 2-->
            <div class="small-box text-bg-dark">
                <div class="inner">
                    <h3>{{ $subjectCount }}</h3>
                    <p>Subjects</p>
                </div>
                <svg
                    class="small-box-icon"
                    fill="currentColor"
                    viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg"
                    aria-hidden="true"
                >
                    <path
                        d="M16 12h4m-2 2v-4M4 18v-1a3 3 0 0 1 3-3h4a3 3 0 0 1 3 3v1a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1Zm8-10a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"
                    ></path>
                </svg>

            </div>
            <!--end::Small Box Widget 2-->
        </div>
        <!--end::Col-->

    </div>
    <!--end::Row-->
    <!--begin::Row-->

    <!-- /.row (main row) -->

@endsection

