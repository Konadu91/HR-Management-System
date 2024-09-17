<form class="container-sm" action="{{$action}}" method="POST" enctype="multipart/form-data">
    <div class="row g-3">
        <div class="col">
            <x-textfield name="firstname" label="Firstname" type="text" placeholder="Enter employee firstname" />
        </div>
        <div class="col">
            <x-textfield name="lastname" label="Lastname" type="text" placeholder="Enter employee lastname" />
        </div>
    </div>   
    <div class="row g-3">
        <div class="col">
            <x-textfield name="employee_id" label="Employee ID" type="text" placeholder="Enter employee ID" />
        </div>
        <div class="col">
            <x-textfield name="user_id" label="User ID" type="text" placeholder="Enter user ID" />
        </div>
        <div class="col">
            <x-textfield name="email" label="Employee Email" type="email" placeholder="Enter employee email" />
        </div>

       
    
       

        @php
        $gender = [
            ['value'=>'male', 'label'=>'Male'],
            ['value'=>'female','label'=>'Female'],
        ];     
    @endphp
         
    <x-selectfield :options="$gender" name="gender" label="Select Gender"  />


<x-textfield name="phone" label="Employee Phonenumber" type="tel" placeholder="Enter employee phonenumber" />

<x-textfield name="dob" label="Employee DOB" type="date" placeholder="Enter employee date of birth" />
        
<x-textfield name="hiredate" label="Hired Date" type="date" placeholder="Enter date employee was hired" />

@php
$position = [
    ['value'=>'director', 'label'=>'Director'],
    ['value'=>'accountant','label'=>'Accountant'],
    ['value'=>'itsupport', 'label'=>'IT Support'],
    ['value'=>'Projectmanager','label'=>'Project Manager'],
];     
@endphp
 
<x-selectfield :options="$position" name="position" label="Select Position"  />

    </div>


    @csrf


    
   
    
    <button type="submit" class="btn btn-primary">Submit</button>
</form>