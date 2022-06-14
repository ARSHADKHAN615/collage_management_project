<x-app-layout>
    <div class="bg-white md:rounded-3xl dark:bg-gray-700">
        <div class="py-10">
            <h1 class="text-4xl font-medium pl-5 mb-10 underline underline-offset-8">Profile</h1>
            <div class="flex">
                <div class="w-1/2 flex justify-center">
                    @isset($userData->student_image)
                        <img src="{{ $userData->student_image }}" alt="{{ $userData->student_name }}"
                            class="rounded-full" style="width: 150px; height: 150px;">
                    @endisset
                    @empty($userData->student_image)
                        <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png"
                            alt="{{ $userData->name }}" class="rounded-circle" style="width: 150px; height: 150px;">
                    @endempty

                </div>
                <div>
                    <div class="mb-4">
                        <span class="font-bold">Name :</span>
                        <h1 class="text-base inline">{{ $userData->student_name }}</h1>
                    </div>
                    <div class="mb-4">
                        <span class="font-bold">Email :</span>
                        <h1 class="text-base inline">{{ $userData->student_email }}</h1>
                    </div>
                    <div class="mb-4">
                        <span class="font-bold">Date of Birth :</span>
                        <h1 class="text-base inline">
                            {{ \Carbon\Carbon::parse($userData->student_dob)->isoFormat('ll') }}
                        </h1>
                    </div>
                    <div class="mb-4">
                        <span class="font-bold">Roll Number :</span>
                        <h1 class="text-base inline">{{ $userData->roll_no }}</h1>
                    </div>
                    <div class="mb-4">
                        <span class="font-bold">Course :</span>
                        <h1 class="text-base inline">{{ $courseData->course_name }}</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="py-10">
            <h1 class="text-4xl font-medium pl-5 mb-10 underline underline-offset-8">Other Details</h1>
            <div class="flex justify-around">
                <div class="">
                    <div class="mb-4">
                        <span class="font-bold">Name :</span>
                        <h1 class="text-base inline">{{ $userData->student_name }}</h1>
                    </div>
                    <div class="mb-4">
                        <span class="font-bold">Email :</span>
                        <h1 class="text-base inline">{{ $userData->student_email }}</h1>
                    </div>
                    <div class="mb-4">
                        <span class="font-bold">Date of Birth :</span>
                        <h1 class="text-base inline">
                            {{ \Carbon\Carbon::parse($userData->student_dob)->isoFormat('ll') }}
                        </h1>
                    </div>
                    <div class="mb-4">
                        <span class="font-bold">Roll Number :</span>
                        <h1 class="text-base inline">{{ $userData->roll_no }}</h1>
                    </div>
                    <div class="mb-4">
                        <span class="font-bold">Course :</span>
                        <h1 class="text-base inline">{{ $courseData->course_name }}</h1>
                    </div>
                </div>
                
                <div>
                    <div class="mb-4">
                        <span class="font-bold">Name :</span>
                        <h1 class="text-base inline">{{ $userData->student_name }}</h1>
                    </div>
                    <div class="mb-4">
                        <span class="font-bold">Email :</span>
                        <h1 class="text-base inline">{{ $userData->student_email }}</h1>
                    </div>
                    <div class="mb-4">
                        <span class="font-bold">Date of Birth :</span>
                        <h1 class="text-base inline">
                            {{ \Carbon\Carbon::parse($userData->student_dob)->isoFormat('ll') }}
                        </h1>
                    </div>
                    <div class="mb-4">
                        <span class="font-bold">Roll Number :</span>
                        <h1 class="text-base inline">{{ $userData->roll_no }}</h1>
                    </div>
                    <div class="mb-4">
                        <span class="font-bold">Course :</span>
                        <h1 class="text-base inline">{{ $courseData->course_name }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
