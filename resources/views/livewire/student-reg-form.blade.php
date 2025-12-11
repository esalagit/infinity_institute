<div>



        <form wire:submit="submit()" method="post" class="registration-form w-100" enctype="multipart/form-data">
            @csrf
            <label>Student ID</label>
            <input type="text" class="form-control"  wire:model="sid" placeholder="Enter Regi No" required>
            <br>
            <label>Full Name</label>
            <input type="text" class="form-control"  wire:model="name" placeholder="Enter FULL Name" required>
            <br>
            <label>Address</label>
            <input type="text"  class="form-control"  wire:model="address"  placeholder="Enter Address" required>
            <br>
            <label>Email</label>
            <input type="email" class="form-control"  wire:model="email"  placeholder="Enter Phone No" required>
            <br>
            <label>Phone No 1</label>
            <input type="number" class="form-control"  wire:model="phone1"  placeholder="Enter Phone No" required>
            <br>
            <label>Phone No 2</label>
            <input type="number" class="form-control"  wire:model="phone2"  placeholder="Enter Phone No" required>
            <br>
            <label>NIC Photo Front</label>
            <input type="file" class="form-control" wire:model="nicf"  placeholder="Upload NIC Front" >
            <br>
            <label>NIC Photo Back</label>
            <input type="file" class="form-control"  wire:model="nicb" placeholder="Upload NIC Front">
            <br>

            <label>Parent's Contact No</label>
            <input type="number" class="form-control"  wire:model="pphone" placeholder="Enter Phone No" required>
            <br>

            <label>Course</label>
            <select class="form-control" wire:model="course" required>
                <option value="">Select Course</option>
                @foreach($courses as $courseItem)
                    <option value="{{ $courseItem->coursename }}">
                        {{ $courseItem->coursename }}
                    </option>
                @endforeach
            </select>
            <br>



            <label>Grade</label>
            <select class="form-control" wire:model="grade" required>
                <option value="">Select Grade</option>
                @foreach($grades as $gradeItem)
                    <option value="{{ $gradeItem->gradename }}">
                        {{ $gradeItem->gradename }}
                    </option>
                @endforeach
            </select>
            <br>

            <label>Class Name</label>
            <select class="form-control" wire:model="class" required>
                <option value=""> Select Class</option>
                @foreach($classes as $classItem)
                    <option value="{{ $classItem->classname }}">
                        {{ $classItem->classname }}
                    </option>
                @endforeach
            </select>
            <br>

            <label>Password</label>
            <input type="password" class="form-control"  wire:model="password"  placeholder="Create and Enter Password" required>
            <br>
            <button type="submit" class="btn btn-success w-100 mt-5 mb-3">Register Student</button>
        </form>



</div>
